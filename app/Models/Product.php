<?php

namespace App\Models;

use App\Traits\GetUrlTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use GetUrlTrait;

    protected $request;
    protected $table    = 'products';
    protected $fillable = ['categories_id', 'slug', 'status', 'new', 'hit', 'currency', 'price', 'count', 'images', 'bulk_price'];
    protected $hidden   = ['reviews', 'category', 'currency', 'product_trans', 'bulk_price', 'product_attr', 'product_subs', 'currency_data'];
    protected $appends  = ['content', 'subs', 'url'];
    protected $casts    = [
        'images'     => 'array',
        'bulk_price' => 'array',
        'created_at' => 'datetime:d.m.Y',
        'updated_at' => 'datetime:d.m.Y'
    ];

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->request = request();

        if ( !$this->request->input('is-catalog') ) {
            $this->appends[] = 'attr';
        }
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review')->orderBy('id', 'desc');
    }

    public function related()
    {
        return $this->hasMany('App\Models\RelatedProduct');
    }

    public function product_attr()
    {
        return $this->hasMany('App\Models\AttrInProduct');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'categories_id');
    }

    public function product_subs()
    {
        return $this->hasMany('App\Models\SubsInProducts');
    }

    public function product_trans()
    {
        $query = $this->hasMany('App\Models\TransProduct');

        if ($this->request->input('locale')) {
            $query = $query->where('local',  $this->request->input('locale'));
        }
        return $query;
    }

    public function currency_data()
    {
        return $this->hasOne('App\Models\CurrencyList', 'id', 'currency');
    }

    public function getAttrAttribute()
    {
        $items = [];
        foreach ($this->product_attr as $item) {
            foreach ($item->collection as $collection) {
                if ( !isset($items[$collection->attribute_id]) ) {
                    $items[$collection->attribute_id] = [];
                }
                if ( !in_array($collection->attribute_list_id, $items[$collection->attribute_id]) ) {
                    $items[$collection->attribute_id][] = $collection->attribute_list_id;
                }
            }
        }
        return $items;
    }

    public function getSubsAttribute()
    {
        $items = [];
        foreach ($this->product_subs as $item) {
            $items[] = $item['subs_id'];
        }
        return $items;
    }

    public function getPriceAttribute($value)
    {
        $price    = (float) $value;
        $currency = $this->currency;
        $selected_currency = $this->request->input('currency');

        if ($selected_currency) {
            $currency = $this->currency_data;
            if ( $selected_currency !== $currency->code ) {
                $selected_currency = CurrencyList::where('code', $selected_currency)->firstOrFail();
                $currency_values   = CurrencyValue::where([
                        ['first', $selected_currency->id],
                        ['last', $currency->id]
                    ])
                    ->orWhere([
                        ['last', $selected_currency->id],
                        ['first', $currency->id]
                    ])
                    ->firstOrFail();

                $currency = $selected_currency;
            }

            if (isset($currency_values)) {
                if ( $currency_values->first === $selected_currency->id ) {
                    $price = $price / $currency_values->value;
                }else{
                    $price = $price * $currency_values->value;
                }
            }

            $price = [
                'origin' => (float) $price,
                'view'   => number_format($price, 2, '.', ' ')
            ];
        }

        $output = [
            'currency' => $currency,
            'bulk'     => $this->bulk_price ?? [],
            'base'     => $price
        ];

        $attrs = [];

        foreach ($this->product_attr as $item) {
            $collection = $item->list_collection();
            $id    = (int) implode('', $collection);
            $input = [
                'id'   => $id,
                'keys' => $collection
            ];

            if ($selected_currency) {
                if ($item['price'] !== null) {
                    if (isset($currency_values)) {
                        if ( $currency_values->first === $selected_currency->id ) {
                            $item['price'] = $item['price'] / $currency_values->value;
                        }else{
                            $item['price'] = $item['price'] * $currency_values->value;
                        }
                    }
                    $input['value'] = [
                        'origin' => (float) $item['price'],
                        'view'   => number_format($item['price'], 2, '.', ' ')
                    ];
                }else{
                    $input = null;
                }
            }else{
                $input['value'] = $item['price'];
            }
            if ( $input ) {
                $attrs[] = $input;

                if ($this->request->input('is-catalog')) {
                    $output['base'] = $input['value'];
                    break;
                }
            }
        }

        if (!$this->request->input('is-catalog')) {
            $output['attrs'] = $attrs;
        }else if ($this->bulk_price) {
            $bulk  = [];
            $price = $output['base']['origin'];

            foreach ($this->bulk_price as $item) {
                $calc = round(($price - ($price * ($item['sale']/100))) * 100) / 100;
                $item['count'] = number_format($item['count'], 0, '. ', ' ');
                $item['sale']  = [
                    'origin' => $calc,
                    'view'   => number_format($calc, 2, '. ', ' ')
                ];
                $bulk[] = $item;
            }
            $output['bulk'] = $bulk;
        }

        return $output;
    }

    public function getCountAttribute($value)
    {
        $attrs    = [];
        $currency = $this->request->input('currency');

        foreach ($this->product_attr as $item) {
            $collection = $item->list_collection();
            $id    = (int) implode('', $collection);
            $input = [
                'id'   => $id,
                'keys' => $collection
            ];

            if ($currency) {
                if ($item['count'] !== null) {
                    $input['value'] = [
                        'origin' => $item['count'],
                        'view'   => number_format($item['count'], 0, '.', ' ')
                    ];
                }else{
                    $input = null;
                }
            }else{
                $input['value'] = $item['count'];
            }
            if ( $input ) {
                $attrs[] = $input;
            }
        }

        if ( !$this->request->input('is-catalog') ) {
            return [
                'attrs' => $attrs,
                'base'  => !$currency ? $value : [
                    'origin' => $value,
                    'view'   => number_format($value, 0, '.', ' ')
                ]
            ];
        }else{
            return [
                'base' => count($attrs) ? $attrs[0]['value']['origin'] : $value,
                'attr' => count($attrs) ? $attrs[0]['keys'] : null
            ];
        }
    }

    public function getImagesAttribute($value)
    {
        $data = json_decode($value);
        foreach ($data as $item) {
            if ($item->source) {
                $item->source = url('upload/'. $item->source);
            }
        }
        if ( !$this->request->input('is-catalog') ) {
            $attrs    = [];
            $currency = $this->request->input('currency');

            foreach ($this->product_attr as $item) {
                $collection = $item->list_collection();
                $id    = (int) implode('', $collection);
                $input = [
                    'id'   => $id,
                    'keys' => $collection
                ];

                if ($currency) {
                    if ($item['images'] !== null) {
                        $input['value'] = $item['images'];
                    }else{
                        $input = null;
                    }
                }else{
                    $input['value'] = $item['images'] ?? [];
                }
                if ( $input ) {
                    $attrs[] = $input;
                }
            }
            return [
                'base'  => $data,
                'attrs' => $attrs
            ];
        }
        return $data;
    }

    public function getContentAttribute()
    {
        $data = [];
        foreach ($this->product_trans as $item) {
            $params = $item->params;
            if ( $this->request->input('currency') ) {
                foreach ($params as &$param) {
                    $param['show'] = true;
                }
            }
            $data[$item->local] = [
                'title'  => $item->title,
                'params' => $params,
                'desc'   => $item->desc,
                'meta_title' => $item->meta_title,
                'meta_desc'  => $item->meta_desc,
            ];
            if ( !$this->request->input('is-catalog') ) {
                $data[$item->local]['params'] = [
                    'base'  => $data[$item->local]['params'],
                    'attrs' => []
                ];
                $data[$item->local]['desc'] = [
                    'base'  => $data[$item->local]['desc'],
                    'attrs' => []
                ];
                $data[$item->local]['meta_title'] = [
                    'base'  => $data[$item->local]['meta_title'],
                    'attrs' => []
                ];
                $data[$item->local]['meta_desc'] = [
                    'base'  => $data[$item->local]['meta_desc'],
                    'attrs' => []
                ];
                foreach ($item->attr as $attr) {
                    $list_collection = $attr->list_collection();
                    $key_collection = (int) implode('', $list_collection);
                    $_params = [];

                    if ( $this->request->input('currency') && $attr['params']) {
                        foreach ($attr['params'] as $params) {
                            $params['show'] = true;
                            $_params[] = $params;
                        }
                    }else{
                        $_params = $attr['params'];
                    }

                    $data[$item->local]['params']['attrs'][] = [
                        'id'    => $key_collection,
                        'keys'  => $list_collection,
                        'value' => $_params
                    ];
                    $data[$item->local]['desc']['attrs'][] = [
                        'id'    => $key_collection,
                        'keys'  => $list_collection,
                        'value' => $attr['desc']
                    ];
                    $data[$item->local]['meta_title']['attrs'][] = [
                        'id'    => $key_collection,
                        'keys'  => $list_collection,
                        'value' => $attr['meta_title']
                    ];
                    $data[$item->local]['meta_desc']['attrs'][] = [
                        'id'    => $key_collection,
                        'keys'  => $list_collection,
                        'value' => $attr['meta_desc']
                    ];
                }
            }
        }

        if ($this->request->input('locale')) {
            return $data[$this->request->input('locale')];
        }

        return $data;
    }

    public function getUrlAttribute()
    {
        return $this->urlLocal($this->request->input('locale'), 'product/'. $this->slug);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($model) {
            $model->product_subs()->delete();
            $model->related()->delete();
            $model->reviews()->delete();
            $model->product_trans->each(function ($trans) {
                $trans->delete();
            });
            $model->product_attr->each(function ($attr) {
                $attr->delete();
            });
        });
    }
}