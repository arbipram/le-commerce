<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{
    protected $table = 'product_meta';

    public function category(){
        return $this->hasOne(ProductCategory::class, 'id','categories');
    }
}
