<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pages'] = Page::latest()->get();
        return view('admin.pages.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page;
        foreach($request->meta as $meta => $value){
            $page->$meta = $value;
        };
        if ($request->hasFile('meta')) {
            $image = $request->meta['image'];
            $imageName = Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $imageName);
            $page->image = $imageName;
        }
        $page->save();
        return redirect('admin/pages');
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
        $data['page'] = Page::find($id);
        return view('admin.pages.edit',$data);        
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
        $page = Page::find($id);
        foreach($request->meta as $meta => $value){
            $page->$meta = $value;
        };
        if ($request->hasFile('meta')) {
            $image = $request->meta['image'];
            $imageName = Str::random(30).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $imageName);
            $page->image = $imageName;
        }
        $page->save();
        return redirect('admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::find($id)->delete();
        return redirect('admin/pages');
    }
}
