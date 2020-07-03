<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderMeta;
use App\Models\Product;
use App\Models\ProductMeta;
use App\Models\PaymentConfirmation;

class PaymentConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['payment_confirmations'] = PaymentConfirmation::get();
        return view('admin.payment-confirmations.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment-confirmations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment_confirmation = new PaymentConfirmation;
        foreach($request->meta as $meta => $value){
            $payment_confirmation->$meta = $value;
        };

        if ($request->hasFile('file')) {
            $image = $request->file;
            $fileName = Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $fileName);
            $payment_confirmation->file = $fileName;
        };

        $payment_confirmation->save();

        return redirect('/admin/payment-confirmations');
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
        $data['payment_confirmation'] = PaymentConfirmation::find($id);
        
        return view('admin.payment-confirmations.edit',$data);
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
        $payment_confirmation = PaymentConfirmation::find($id);
        foreach($request->meta as $meta => $value){
            $payment_confirmation->$meta = $value;
        };

        if ($request->hasFile('file')) {
            $image = $request->file;
            $fileName = Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $fileName);
            $payment_confirmation->file = $fileName;
        };

        $payment_confirmation->save();

        return redirect("admin/payment-confirmations");        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentConfirmation::find($id)->delete();

        return redirect("admin/payment-confirmations");        
    }
}
