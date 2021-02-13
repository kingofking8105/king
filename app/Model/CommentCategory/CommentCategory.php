<?php

namespace App\Model\CommentCategory;

use Illuminate\Database\Eloquent\Model;

class CommentCategory extends Model
{
   public $timestamps = false;
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'comment_category',
    ];
   
}
