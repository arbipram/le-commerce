<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['medias'] = Media::latest()->get();
        return view('admin.medias.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medias.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $media = new Media;
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
        $data['media'] = Media::find($id);
        return view('admin.medias.edit',$data);        
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
        Media::find($id)->delete();
        return redirect('admin/medias');
    }
}
