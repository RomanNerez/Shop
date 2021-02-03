<?php

namespace App\Http\Controllers\Cabinet\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\AttrCollection;
use App\Models\AttrInProduct;
use App\Models\Product;
use App\Models\RelatedProduct;
use App\Models\SubsInProducts;
use App\Models\TransAttrProduct;
use App\Models\TransProduct;
use App\Repositories\SearchActionRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function create(ProductRequest $request)
    {
        return response()->json( self::insert($request->input('data')) );
    }

    public function copy(Request $request)
    {
        $product = Product::find( $request->input('id') );
        $slug    = explode('-', $product->slug);
        $related = $product->related->pluck('related');

        if (count($slug) > 1) {
            $last = array_pop($slug);
            if (!is_numeric($last)) {
                $slug[] = $last;
            }
        }

        $product->slug   = implode('-', $slug) .'-'. (Product::latest()->value('id') + 1);
        $product->status = 0;

        $product = $product->toArray();
        $product['related'] = $related;

        return response( self::insert($product) );
    }

    public function insert($data)
    {
        sleep(1);
        return DB::transaction(function () use ($data) {
            $images = $data['images']['base'];
            foreach ($images as &$img) {
                $source = is_object($img) ? $img->source : $img['source'];
                $path   = Str::afterLast($source, 'upload/');

                if (is_object($img)) {
                    $img->source = $path;
                }else{
                    $img['source'] = $path;
                }
            }

            $product = Product::create([
                'categories_id' => $data['categories_id'],
                'bulk_price'    => $data['price']['bulk'],
                'related_to'    => $data['related_to'],
                'slug'     => $data['slug'],
                'status'   => $data['status'],
                'new'      => $data['new'],
                'hit'      => $data['hit'],
                'currency' => $data['price']['currency'],
                'price'    => $data['price']['base'],
                'count'    => $data['count']['base'],
                'draw'     => $data['draw'],
                'images'   => $images
            ]);

            foreach ($data['subs'] as $value) {
                SubsInProducts::create([
                    'product_id' => $product->id,
                    'subs_id'    => $value
                ]);
            }

            foreach ($data['related'] as $value) {
                RelatedProduct::create([
                    'product_id' => $product->id,
                    'related'    => $value
                ]);
            }

            $attrData = [];;

            foreach ($data['price']['attrs'] as $price) {
                $attrData[] = [
                    'id'    => $price['id'],
                    'keys'  => $price['keys'],
                    'price' => $price['value']
                ];
            }

            foreach ($data['count']['attrs'] as $count) {
                $index = array_search($count['id'], array_column($attrData, 'id'));

                if ( $index === false ) {
                    $attrData[] = [
                        'id'    => $count['id'],
                        'keys'  => $count['keys'],
                        'count' => $count['value']
                    ];
                }else{
                    $attrData[$index]['count'] = $count['value'];
                }
            }

            foreach ($data['images']['attrs'] as $images) {
                if ( count((array) $images['value']) ) {
                    $index   = array_search($images['id'], array_column($attrData, 'id'));
                    $_images = $images['value'];

                    foreach ($_images as &$img) {
                        $source = is_object($img) ? $img->source : $img['source'];
                        $path   = Str::afterLast($source, 'upload/');

                        if (is_object($img)) {
                            $img->source = $path;
                        }else{
                            $img['source'] = $path;
                        }
                    }

                    if ( $index === false ) {
                        $attrData[] = [
                            'id'     => $images['id'],
                            'keys'   => $images['keys'],
                            'images' => $_images
                        ];
                    }else{
                        $attrData[$index]['images'] = $_images;
                    }
                }
            }

            foreach ($attrData as &$value) {
                $attr_product = AttrInProduct::create([
                    'product_id' => $product->id,
                    'price'  => $value['price'] ?? null,
                    'count'  => $value['count'] ?? null,
                    'images' => $value['images'] ?? null
                ]);

                $value['insert'] = $attr_product->id;

                foreach ($value['keys'] as $key) {
                    AttrCollection::create([
                        'attribute_list_id'  => $key,
                        'attr_in_product_id' => $value['insert'],
                    ]);
                }
            }
            unset($value);

            foreach ($data['content'] as $local => $value) {
                $trans = TransProduct::create([
                    'product_id' => $product->id,
                    'local'      => $local,
                    'title'      => $value['title'],
                    'desc'       => $value['desc']['base'],
                    'params'     => $value['params']['base'],
                    'meta_title' => $value['meta_title']['base'],
                    'meta_desc'  => $value['meta_desc']['base']
                ]);

                foreach ($value['desc']['attrs'] as $key => $attr) {
                    $meta_title = $value['meta_title']['attrs'][$key]['value'];
                    $meta_desc  = $value['meta_desc']['attrs'][$key]['value'];
                    $params     = $value['params']['attrs'][$key]['value'];

                    if ($attr['value'] || $meta_title || $meta_desc || $params) {
                        $index = array_search($attr['id'], array_column($attrData, 'id'));

                        if ( !isset($attrData[$index]['images']) ) {
                            $attr_product = AttrInProduct::create([
                                'product_id' => $product->id
                            ]);
                            foreach ($attr['keys'] as $key) {
                                AttrCollection::create([
                                    'attribute_list_id'  => $key,
                                    'attr_in_product_id' => $attr_product->id,
                                ]);
                            }
                            $insert = $attr_product->id;
                            unset($keys);
                        }else{
                            $insert = $attrData[$index]['insert'];
                        }

                        TransAttrProduct::create([
                            'trans_product_id'   => $trans->id,
                            'attr_in_product_id' => $insert,
                            'desc'       => $attr['value'],
                            'params'     => $params,
                            'meta_title' => $meta_title,
                            'meta_desc'  => $meta_desc
                        ]);
                    }
                }
            }

            $product->save();
            $product->related;
            return $product;
        });
    }

    public function edit(ProductRequest $request)
    {
        sleep(1);
        $data = $request->input('data');

        $output = DB::transaction(function () use ($data) {
            $images = $data['images']['base'];
            foreach ($images as &$img) {
                $img['source'] = Str::afterLast($img['source'], 'upload/');
            }

            $product = Product::find($data['id']);
            $product->update([
                'slug'       => $data['slug'],
                'status'     => $data['status'],
                'new'        => $data['new'],
                'hit'        => $data['hit'],
                'currency'   => $data['price']['currency'],
                'price'      => $data['price']['base'],
                'count'      => $data['count']['base'],
                'draw'       => $data['draw'],
                'bulk_price' => $data['price']['bulk'],
                'images'     => $images
            ]);

            SubsInProducts::where('product_id', $data['id'])->delete();
            foreach ($data['subs'] as $value) {
                SubsInProducts::create([
                    'product_id' => $product->id,
                    'subs_id'    => $value
                ]);
            }

            RelatedProduct::where('product_id', $data['id'])->delete();
            foreach ($data['related'] as $value) {
                RelatedProduct::create([
                    'product_id' => $product->id,
                    'related'    => $value
                ]);
            }

            $attrData = [];;

            foreach ($data['price']['attrs'] as $price) {
                $attrData[] = [
                    'id'    => $price['id'],
                    'keys'  => $price['keys'],
                    'price' => $price['value']
                ];
            }

            foreach ($data['count']['attrs'] as $count) {
                $index = array_search($count['id'], array_column($attrData, 'id'));

                if ( $index === false ) {
                    $attrData[] = [
                        'id'    => $count['id'],
                        'keys'  => $count['keys'],
                        'count' => $count['value']
                    ];
                }else{
                    $attrData[$index]['count'] = $count['value'];
                }
            }

            foreach ($data['images']['attrs'] as $images) {
                if ( count($images['value']) ) {
                    $index   = array_search($images['id'], array_column($attrData, 'id'));
                    $_images = $images['value'];

                    foreach ($_images as &$img) {
                        $source = is_object($img) ? $img->source : $img['source'];
                        $path   = Str::afterLast($source, 'upload/');

                        if (is_object($img)) {
                            $img->source = $path;
                        }else{
                            $img['source'] = $path;
                        }
                    }

                    if ( $index === false ) {
                        $attrData[] = [
                            'id'     => $images['id'],
                            'keys'   => $images['keys'],
                            'images' => $_images
                        ];
                    }else{
                        $attrData[$index]['images'] = $_images;
                    }
                }
            }

            AttrInProduct::where('product_id', $data['id'])->each(function ($attr) {
                $attr->delete();
            });
            foreach ($attrData as &$value) {
                $attr_product = AttrInProduct::create([
                    'product_id' => $product->id,
                    'price'  => $value['price'] ?? null,
                    'count'  => $value['count'] ?? null,
                    'images' => $value['images'] ?? null
                ]);

                $value['insert'] = $attr_product->id;

                foreach ($value['keys'] as $key) {
                    AttrCollection::create([
                        'attribute_list_id'  => $key,
                        'attr_in_product_id' => $value['insert'],
                    ]);
                }
            }
            unset($value);

            TransProduct::where('product_id', $data['id'])->each(function ($trans) {
                $trans->delete();
            });

            foreach ($data['content'] as $local => $value) {
                $trans = TransProduct::create([
                    'product_id' => $product->id,
                    'local'      => $local,
                    'title'      => $value['title'],
                    'desc'       => $value['desc']['base'],
                    'params'     => $value['params']['base'],
                    'meta_title' => $value['meta_title']['base'],
                    'meta_desc'  => $value['meta_desc']['base']
                ]);

                foreach ($value['desc']['attrs'] as $key => $attr) {
                    $meta_title = $value['meta_title']['attrs'][$key]['value'];
                    $meta_desc  = $value['meta_desc']['attrs'][$key]['value'];
                    $params     = $value['params']['attrs'][$key]['value'];

                    if ($attr['value'] || $meta_title || $meta_desc) {
                        $index = array_search($attr['id'], array_column($attrData, 'id'));

                        if ( !isset($attrData[$index]['images']) ) {
                            $attr_product = AttrInProduct::create([
                                'product_id' => $product->id
                            ]);
                            foreach ($attr['keys'] as $key) {
                                AttrCollection::create([
                                    'attribute_list_id'  => $key,
                                    'attr_in_product_id' => $attr_product->id,
                                ]);
                            }
                            $insert = $attr_product->id;
                            unset($keys);
                        }else{
                            $insert = $attrData[$index]['insert'];
                        }

                        TransAttrProduct::create([
                            'trans_product_id'   => $trans->id,
                            'attr_in_product_id' => $insert,
                            'desc'       => $attr['value'],
                            'params'     => $params,
                            'meta_title' => $meta_title,
                            'meta_desc'  => $meta_desc
                        ]);
                    }
                }
            }

            $product->save();
            $product->related;
            return $product;
        });

        return response($output);
    }

    public function delete(Request $request)
    {
        sleep(1);
        $result = DB::transaction(function () use ($request) {
            return Product::destroy( $request->input('id') );
        });

        return response()->json([
            'done' => $result
        ]);
    }

    public function related(Request $request) {
        $data = $request->input('data');

        if ( count($data) ) {
            return Product::whereIn('id', $data)->get();
        }
        return [];
    }

    public function search(Request $request, SearchActionRepository $searchAction) {
        $products = $searchAction->get( $request->get('query'), TransProduct::class, Product::class, 'product_id' );

        return $products->orderBy('id', 'desc')->take(12)->get();
    }
}
