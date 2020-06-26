<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function meta(){
        return $this->hasMany(OrderMeta::class, 'orders_id','id'); 
    }

    public function customer(){
        return $this->hasOne(Customer::class, 'id','customer_id'); 
    }
}