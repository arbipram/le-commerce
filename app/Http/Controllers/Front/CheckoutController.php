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
use Cart;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $data['store_settings'] = StoreSetting::get();
        $data['banks'] = StoreSetting::where('type','payment-direct-bank-transfer')->where('meta_key','bank')->get();
        $data['account_name'] = StoreSetting::where('type','payment-direct-bank-transfer')->where('meta_key','account_name')->get();
        $data['account_number'] = StoreSetting::where('type','payment-direct-bank-transfer')->where('meta_key','account_number')->get();
        $data['items'] = Cart::getContent();
        return view('front.checkout',$data);
    }

    public function store(Request $request)
    {
        $order_id = Order::latest()->first();
        if($order_id == null){
            $id = 1 ;
        } else {
            $id = (int) $order_id->id + 1;
        }
        $order_no = "Order".date("Ymd").$id;
        
        \DB::beginTransaction();
        try {
            $customer = new Customer;
            foreach($request->customer as $key => $value){
                $customer->$key = $value;
            }
            $customer->save();
            
            $order = new Order;
            $order->name = $order_no;
            $order->date = date("Y-m-d");
            $order->total_sales = Cart::getSubTotal();
            $order->customer_id = $customer->id;
            $order->payment_method = $request->payment_method;
            $order->status = "Pending Payment";
            $order->save();
            
            $items = Cart::getContent();
            foreach($items as $i => $item){
                $order_meta['product_id'][] = $item->attributes["product_id"]; 
                $order_meta['price'][] = $item->price; 
                $order_meta['qty'][] = $item->quantity; 
                $order_meta['total'][] = $item->price * $item->quantity; 
            }

            $product = new OrderMeta;
            $product->orders_id = $order->id;
            $product->meta_key = "data";
            $product->meta_value = json_encode($order_meta);
            $product->save();
            
            //mengurangi stock
            foreach($order_meta["product_id"] as $key => $value){
                $product_id = Product::find($value);
                $product = ProductMeta::where('products_id',$value)->first();
                $product->qty =  (int) $product->qty - (int) $order_meta["qty"][$key];
                if($product->qty < 0){
                    return "Maaf Stock ".$product_id->name." Tidak Mencukupi";
                }
                $product->save();
            }

            //delete cart
            $carts = Cart::getContent();
            foreach($carts as $cart){
                Cart::remove($cart->id);
            }
            
            \DB::commit();


        } catch (\Throwable $th) {
            \DB::rollback();
            dd($th);
        }

        return redirect('/confirmation?order_no='.$order_no."&email=".$customer->email);
    }
}
