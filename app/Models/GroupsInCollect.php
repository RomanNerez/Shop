<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupsInCollect extends Model
{
    protected $table    = 'groups_in_collects';
    protected $fillable = ['collections_id', 'subs_id'];
    protected $hidden   = ['created_at', 'updated_at'];
}
