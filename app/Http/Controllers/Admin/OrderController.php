<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\Product;
use App\Models\ProductMeta;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['orders'] = Order::get();
        return view('admin.orders.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['products'] = Product::get();
        return view('admin.orders.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order_id = Order::latest()->first();
        if($order_id == null){
            $id = 1 ;
        } else {
            $id = (int) $order_id->id + 1;
        }
        $order_no = "Order".date("Ymd",strtotime($request->order["date"])).$id;
        
        \DB::beginTransaction();
        try {
            $customer = new Customer;
            foreach($request->customer as $key => $value){
                $customer->$key = $value;
            }
            $customer->save();
            
            $order = new Order;
            foreach($request->order as $key => $value){
                $order->$key = $value;
            }
            $order->name = $order_no;
            $order->customer_id = $customer->id;
            $order->save();
            
            $product = new OrderMeta;
            $product->orders_id = $order->id;
            $product->meta_key = "data";
            $product->meta_value = json_encode($request->product);
            $product->save();
            
            //mengurangi stock
            foreach($request->product["product_id"] as $key => $value){
                $product_id = Product::find($value);
                $product = ProductMeta::where('products_id',$value)->first();
                $product->qty =  (int) $product->qty - (int) $request->product["qty"][$key];
                if($product->qty < 0){
                    return "Maaf Stock ".$product_id->name." Tidak Mencukupi";
                }
                $product->save();
            }

            
            \DB::commit();
        } catch (\Throwable $th) {
            \DB::rollback();
            dd($th);
        }

        return redirect("admin/orders");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['products'] = Product::get();
        $data['order'] = Order::find($id);
        $data['customer'] = Customer::find($data['order']->customer_id);
        
        $orders_meta = OrderMeta::where('orders_id',$data['order']->id)->first();
        $data['orders_meta'] = json_decode($orders_meta->meta_value);
        
        return view('admin.orders.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order_no = "Order".date("Ymd",strtotime($request->order["date"])).$id;
        \DB::beginTransaction();
        try {
            //mengembalikan stock
            foreach($request->old_product["product_id"] as $old_key => $old_value){
                $old_product = ProductMeta::where('products_id',$old_value)->first();
                $old_product->qty =  (int) $old_product->qty + (int) $request->old_product["qty"][$old_key];
                $old_product->save();
            }

            $order = Order::find($id);
            foreach($request->order as $key => $value){
                $order->$key = $value;
            }
            $order->name = $order_no;
            $order->customer_id = $order->customer_id;
            $order->save();

            $product = OrderMeta::where('orders_id',$order->id)->first();
            $product->orders_id = $order->id;
            $product->meta_key = "data";
            $product->meta_value = json_encode($request->product);
            $product->save();

            //mengurangi stock
            foreach($request->product["product_id"] as $key => $value){
                $product_id = Product::find($value);
                $product = ProductMeta::where('products_id',$value)->first();
                $product->qty =  (int) $product->qty - (int) $request->product["qty"][$key];
                if($product->qty < 0){
                    return "Maaf Stock ".$product_id->name." Tidak Mencukupi";
                }
                $product->save();
            }
            
            \DB::commit();
        } catch (\Throwable $th) {
            \DB::rollback();
            dd($th);
        }

        return redirect("admin/orders");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ambil orders
        $orders = json_decode(OrderMeta::where('orders_id',$id)->first()->meta_value);
        //pecah data orders
        $i = 0;
        foreach($orders->product_id as $order){
            //ambil order qty
            $order_qty = $orders->qty[$i];
            //ambil qty product
            $product = ProductMeta::where('products_id',$orders->product_id[$i])->first();
            $product->qty = (int)$order_qty + (int) $product->qty;
            $product->save();
            $i++;
        }

        Order::find($id)->delete();
        OrderMeta::where('orders_id',$id)->delete();

        return redirect("admin/orders");        
    }
}
