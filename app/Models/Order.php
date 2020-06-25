<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function meta(){
        return $this->hasMany(OrderMeta::class, 'orders_id','id'); //kiri fk dari stock, kanan dari product 
    }
}