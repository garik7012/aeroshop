<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $timestamps = false;

    public function lang()
    {
        return $this->hasOne(PageLang::class)->where('locale', app()->getLocale());
    }
}
