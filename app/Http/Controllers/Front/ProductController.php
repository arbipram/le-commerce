<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Widget;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if($request->min_price == null){
            $request->min_price = 0;
        }
        
        $query = \DB::table('products')->select('products.*','product_meta.*','products.id as pid')->join('product_meta','products.id','product_meta.products_id');
        
        if($request->keyword != null){
            $data['products'] = $query->where('name','like','%'.$request->keyword.'%')->get();
        }

        if($request->max_price != null){
            $data['products'] = $query->whereBetween('regular_price', [$request->min_price, $request->max_price])->get();
        }
        
        if($request->sorting == null || $request->sorting == "All" ){
            $data['products'] = $query->get();
        }
        
        if($request->sorting == 'Lower Price'){
            $data['products'] = $query->orderBy('regular_price','asc')->get();
        }
        
        if($request->sorting == 'Higher Price'){
            $data['products'] = $query->orderBy('regular_price','desc')->get();
        }
        
        $data['request'] = $request;
        $data['categories'] = ProductCategory::get();
        $data['widgets'] = Widget::get();
        return view('front.products.index',$data);
    }

    public function category(Request $request, $slug)
    {
        if($request->min_price == null){
            $request->min_price = 0;
        }

        //get product category
        $category = ProductCategory::where('slug',$slug)->first();

        $query = \DB::table('products')->select('products.*','product_meta.*','products.id as pid')->join('product_meta','products.id','product_meta.products_id')->where('categories',$category->id);
        
        if($request->max_price != null){
            $data['products'] = $query->whereBetween('regular_price', [$request->min_price, $request->max_price])->get();
        }
        
        if($request->sorting == null || $request->sorting == "All" ){
            $data['products'] = $query->get();
        }
        
        if($request->sorting == 'Lower Price'){
            $data['products'] = $query->orderBy('regular_price','asc')->get();
        }
        
        if($request->sorting == 'Higher Price'){
            $data['products'] = $query->orderBy('regular_price','desc')->get();
        }

        $data['request'] = $request;
        $data['categories'] = ProductCategory::get();
        $data['widgets'] = Widget::get();
        return view('front.products.category',$data);
    }

    public function detail(Request $request,$slug)
    {
        $data['widgets'] = Widget::get();

        $data['product'] = Product::where('slug',$slug)->first();
        return view('front.products.detail',$data);
    }
}
