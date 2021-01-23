<?php
namespace App\Traits;

trait LocalContentTrait
{
    protected $request;
    protected $locale;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->request   = request();
        $this->locale    = $this->request->input('locale');
        $this->hidden[]  = 'localeData';
        $this->appends[] = 'content';

        if ( isset($this->preAppend) ) {
            foreach ($this->preAppend as $item) {
                if ( !$this->request->input($item[1]) ) {
                    $this->appends[] = 'subs';
                }
            }
        }
    }

    public function localeData()
    {
        if ( is_array($this->translate) ) {
            $query = $this->hasMany($this->translate[0], $this->translate[1]);
        }else{
            $query = $this->hasMany($this->translate);
        }

        if ($this->locale) {
            $query = $query->where('local',  $this->locale);
        }
        return $query;
    }

    public function getContentAttribute()
    {
        if ($this->locale) {
            return $this->localeData->first();
        }

        $data = [];
        foreach ($this->localeData as $item) {
            $data[$item->local] = $item;
        }
        return $data;
    }
}