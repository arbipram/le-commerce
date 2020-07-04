<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['banners'] = Banner::latest()->get();
        return view('admin.banners.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner;
        foreach($request->meta as $meta => $value){
            $banner->$meta = $value;
        };

        if ($request->hasFile('meta')) {
            $image = $request->meta['image'];
            $imageName = Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $imageName);
            $banner->image = $imageName;
        }
        $banner->save();
        return redirect('admin/banners');
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
        $data['banner'] = Banner::find($id);
        return view('admin.banners.edit',$data);        
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
        $banner = Banner::find($id);
        foreach($request->meta as $meta => $value){
            $banner->$meta = $value;
        };
        if ($request->hasFile('meta')) {
            $image = $request->meta['image'];
            $imageName = Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $imageName);
            $banner->image = $imageName;
        }
        $banner->save();
        return redirect('admin/banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::find($id)->delete();
        return redirect('admin/banners');
    }
}

