<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $order_id = Order::latest()->first()->id;
        $id = (int) $order_id + 1;
        $order_no = "#Order ".date("Ymd",strtotime($request->order["date"])).$id;

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

            foreach($request->product_id as $key => $value){
                $product_id = new OrderMeta;
                $product_id->orders_id = $order->id;
                $product_id->meta_key = "product_id";
                $product_id->meta_value = $value;
                $product_id->save();
            }

            foreach($request->price as $key => $value){
                $price = new OrderMeta;
                $price->orders_id = $order->id;
                $price->meta_key = "price";
                $price->meta_value = $value;
                $price->save();
            }

            foreach($request->qty as $key => $value){
                $qty = new OrderMeta;
                $qty->orders_id = $order->id;
                $qty->meta_key = "qty";
                $qty->meta_value = $value;
                $qty->save();
            }

            $payment = new OrderMeta;
            $payment->orders_id = $order->id;
            $payment->meta_key = "payment_method";
            $payment->meta_value = $request->payment_method;
            $payment->save();
            
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        OrderMeta::where('orders_id',$id)->delete();
        return redirect("admin/orders");        
    }
}
