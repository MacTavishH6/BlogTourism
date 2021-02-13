<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The table for this model
     * 
     * @var table
     */
    protected $table = "categories";
}
