<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    protected $table='category_articles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'category_id',
        'article_id',

    ];
    protected $casts = [
        'id' => 'uuid',
        'category_id' => 'uuid',
        'article_id' => 'uuid',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
