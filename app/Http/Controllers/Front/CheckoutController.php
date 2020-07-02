<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\StoreSetting;

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
        dd($request);
    }
}
