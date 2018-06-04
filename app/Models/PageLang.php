<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageLang extends Model
{
    public $timestamps = false;
    protected $table = 'page_lang';
    protected $fillable = ['title', 'description', 'seo_title', 'seo_description', 'keywords'];
}
