<?php
namespace App\Traits;

trait ModelSubsTrait
{
    public function subs()
    {
        if ( is_array($this->subs) ) {
            return $this->hasMany($this->subs[0], $this->subs[1]);
        }else{
            return $this->hasMany($this->subs);
        }
    }
}
