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
        $data['store_settings'] = StoreSetting::get();
        $data['order'] = Order::where('name',$request->order_no)->first();
        $data['order_meta'] = OrderMeta::where('orders_id',$data['order']->id)->first();
        $data['items'] = json_decode($data['order_meta']->where('meta_key','data')->first()->meta_value);
        $data['customer'] = Customer::find($data['order']->customer_id);
        $data['banks'] = StoreSetting::where('type','payment-direct-bank-transfer')->where('meta_key','bank')->get();
        $data['account_name'] = StoreSetting::where('type','payment-direct-bank-transfer')->where('meta_key','account_name')->get();
        $data['account_number'] = StoreSetting::where('type','payment-direct-bank-transfer')->where('meta_key','account_number')->get();
        
        return view('front.confirmation',$data);
    }
}
