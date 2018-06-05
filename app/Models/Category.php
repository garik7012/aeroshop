<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['ru_title', 'uk_title', 'en_title', 'parent_id', 'is_active'];

    /**
     * category product sort by availability
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('availability_id');
    }

    /**
     * category seo lang
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lang()
    {
        return $this->hasOne(CategoryLang::class)->where('locale', app()->getLocale());
    }
}
