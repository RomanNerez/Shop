<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransArbitraryLinks extends Model
{
    protected $table = 'trans_arbitrary_links';
    protected $fillable = ['title', 'local'];
    public $timestamps = false;
}
