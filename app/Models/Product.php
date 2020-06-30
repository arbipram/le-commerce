<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function meta(){
        return $this->hasOne(ProductMeta::class, 'products_id','id'); //kiri fk dari stock, kanan dari product 
    }
}
