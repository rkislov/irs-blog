<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'title',
        'description',
    ];
    protected $casts = [
        'id' => 'uuid',
        'title' => 'string',
        'description' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

}
