<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductMeta;
use App\Models\ProductCategory;
use App\Models\StoreSetting;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::latest()->get();
        $data['product_category'] = ProductCategory::get();
        return view('admin.products.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['max_product_image'] = StoreSetting::where('type','product-general')->where('meta_key','max_product_image')->first();
        $data['products_categories'] = ProductCategory::get();
        return view('admin.products.create',$data);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $product = new Product;
            foreach($request->product as $key => $value){
                $product->$key = $value;
            };
            $product->save();
            
            $meta = new ProductMeta;
            $meta->products_id = $product->id;
            foreach($request->meta as $key => $value){
                $meta->$key = $value;
            };
            
            for ($i=1; $i <= 4 ; $i++) { 
                if ($request->hasFile('image_'.$i)) {
                    $key = "image_".$i;
                    $image = $request->$key;
                    $fileName = Str::random(30).'.'.$image->getClientOriginalExtension();
                    $image->move('uploads/', $fileName);
                    $meta->$key = $fileName;
                };
            }

            $meta->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            // something went wrong
        }
        return redirect('admin/products');
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
        $data['product'] = Product::find($id);
        $data['meta'] = ProductMeta::where('products_id',$id)->first();
        $data['products_categories'] = ProductCategory::get();
        return view('admin.products.edit',$data);        
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
        DB::beginTransaction();
        try{
            $product = Product::find($id);
            foreach($request->product as $key => $value){
                $product->$key = $value;
            };
            $product->save();
            
            $meta = ProductMeta::where('products_id',$product->id);
            $meta->products_id = $product->id;
            foreach($request->meta as $key => $value){
                $meta->$key = $value;
            };
            
            for ($i=1; $i <= 4 ; $i++) { 
                if ($request->hasFile('image_'.$i)) {
                    $key = "image_".$i;
                    $image = $request->$key;
                    $fileName = Str::random(30).'.'.$image->getClientOriginalExtension();
                    $image->move('uploads/', $fileName);
                    $meta->$key = $fileName;
                };
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            // something went wrong
        }
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        ProductMeta::where('products_id',$id)->delete();
        return redirect('admin/products');
    }

    public function getJson($id)
    {
        $product = Product::find($id);
        return $product->meta;
    }
}
