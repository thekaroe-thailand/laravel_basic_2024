<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_type';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function products() {
        return $this->hasMany(Product::class, 'product_type_id', 'id');
    }
}
