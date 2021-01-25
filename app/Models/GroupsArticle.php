<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupsInArticle extends Model
{
    protected $table    = 'groups_in_articles';
    protected $fillable = ['article_id', 'subs_id'];
    protected $hidden   = ['created_at', 'updated_at'];
}
