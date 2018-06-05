<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryLang extends Model
{
    protected $table = 'category_lang';
    public $timestamps = false;
    protected $fillable = ['seo_title', 'description', 'seo_description', 'keywords'];
}
