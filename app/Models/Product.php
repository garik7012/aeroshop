<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pageLang()
    {
        return $this->hasOne(ProductPageLang::class)->where('locale', \App::getLocale());
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
}
