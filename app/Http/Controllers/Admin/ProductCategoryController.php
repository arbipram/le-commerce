<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product_categories'] = ProductCategory::latest()->get();
        return view('admin.product-categories.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_category = new ProductCategory;
        foreach($request->meta as $meta => $value){
            $product_category->$meta = $value;
        };
        
        if ($request->hasFile('meta')) {
            $image = $request->meta['image'];
            $imageName = Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $imageName);
            $product_category->image = $imageName;
        }
        
        $product_category->save();
        return redirect('admin/product-categories');
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
        $data['product_category'] = ProductCategory::find($id);
        return view('admin.product-categories.edit',$data);
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
        $product_category = ProductCategory::find($id);
        foreach($request->meta as $meta => $value){
            $product_category->$meta = $value;
        };
        
        if ($request->hasFile('meta')) {
            $image = $request->meta['image'];
            $imageName = Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $imageName);
            $product_category->image = $imageName;
        }
        
        $product_category->save();
        return redirect('admin/product-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::find($id)->delete();
        return redirect('admin/product-categories');
    }
}