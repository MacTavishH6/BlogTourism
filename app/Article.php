<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'title', 'description', 'image'
    ];

    /**
     * The table for this model
     * 
     * @var table
     */
    protected $table = "articles";

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
