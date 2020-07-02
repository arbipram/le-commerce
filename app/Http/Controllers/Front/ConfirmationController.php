<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StoreSetting;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\Product;
use App\Models\ProductMeta;

class ConfirmationController extends Controller
{
    public function index(Request $request)
    {
        $data['order'] = Order::where('name',$request->order_no)->first();
        $data['order_meta'] = OrderMeta::where('orders_id',$data['order']->id)->first();
        $data['items'] = json_decode($data['order_meta']->where('meta_key','data')->first()->meta_value);
        $data['customer'] = Customer::find($data['order']->customer_id);
        return view('front.confirmation',$data);
    }
}
