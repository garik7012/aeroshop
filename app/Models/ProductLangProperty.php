<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLangProperty extends Model
{
    protected $table = 'product_lang_properties';
    public $timestamps = false;

    public function key()
    {
        return $this->belongsTo(ProductPropertyKey::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
