<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Widget;

class ProductController extends Controller
{
    public function index()
    {
        $data['categories'] = ProductCategory::get();
        $data['widgets'] = Widget::get();
        return view('front.products.index',$data);
    }
}
