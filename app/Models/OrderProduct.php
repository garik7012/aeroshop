<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = false;
    protected $table = 'order_products';
    protected $guarded = ['id'];

    public function getProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
