<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\PaymentConfirmation;
use App\Models\StoreSetting;
use SweetAlert;

class PaymentConfirmationController extends Controller
{
    public function index()
    {
        $data['store_settings'] = StoreSetting::get();  
        return view('front.payment-confirmation',$data);
    }

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

        alert()->success('Data Berhasil Dikirim', '');
        return redirect('/');
    }
}
