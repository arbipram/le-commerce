<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StoreSetting;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data['settings'] = StoreSetting::get();
        return view('front.contact',$data);
    }
}
