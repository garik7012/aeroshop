<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPageLang extends Model
{
    protected $table = 'product_page_lang';
    public $timestamps = false;
    protected $fillable = ['description', 'title', 'seo_description', 'keywords'];
}
