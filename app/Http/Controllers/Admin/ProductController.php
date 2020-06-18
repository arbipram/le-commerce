<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductMeta;
use App\Models\ProductCategory;
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

            foreach($request->meta as $key => $value){
                $meta = new ProductMeta;
                $meta->products_id = $product->id;
                $meta->meta_key = $key;
                $meta->meta_value = $value;
                $meta->save();
            };

            
            if ($request->hasFile('image')) {
                $i = 1;
                foreach($request->image as $key => $value){
                    $images = new ProductMeta;
                    $images->products_id = $product->id;
                    $images->meta_key = "image_".$i;
                    $image = $request->image[$key];
                    $fileName = Str::random(30).'.'.$image->getClientOriginalExtension();
                    $image->move('uploads/', $fileName);
                    $images->meta_value = $fileName;
                    $images->save();
                    $i++;
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
        $data['meta'] = ProductMeta::where('products_id',$id)->get();
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
        $media = Media::find($id);
        foreach($request->meta as $meta => $value){
            $media->$meta = $value;
        };
        if ($request->hasFile('meta')) {
            $image = $request->meta['file'];
            $fileName = Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $fileName);
            $media->file = $fileName;
        }
        $media->save();
        return redirect('admin/medias');
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
}
