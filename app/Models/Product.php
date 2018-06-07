<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $guarded = ['url'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function lang()
    {
        return $this->hasOne(ProductPageLang::class)->where('locale', app()->getLocale());
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function properties()
    {
        return $this->hasMany(ProductLangProperty::class);
    }

    public function availability()
    {
        return $this->belongsTo(Availability::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_main', 1);
    }
}
