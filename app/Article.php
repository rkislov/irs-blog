<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Article extends Model
{
   protected $table='articles';

   protected $primaryKey = 'id';

   protected $fillable = [
       'id',
       'title',
       'author',
       'short_text',
       'full_text',

   ];
    protected $casts = [
        'id' => 'uuid',
        'title' => 'string',
        'short_text' => 'string',
        'full_text' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];
   protected $dates = [
       'created_at',
       'updated_at',
   ];
   public function categories()
   {
       return $this->belongsToMany('App\Category', 'category_articles','article_id','category_id' );
   }
}
