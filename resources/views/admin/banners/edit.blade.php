@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-photo-gallery icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Banners
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="card card-body"><h5 class="card-title">Edit Banners</h5>
                <form action="{{url('admin/banners/update/'.$banner->id)}}" method="post" enctype="multipart/form-data">
                    <div class="position-relative form-group"><label class="">Name</label><input name="meta[name]" value="{{$banner->name}}" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">H5</label><input name="meta[h5]" value="{{$banner->h5}}" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">H1</label><input name="meta[h1]" value="{{$banner->h1}}" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Button Text</label><input name="meta[button_text]" value="{{$banner->button_text}}" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Button Link</label><input name="meta[button_link]" value="{{$banner->button_link}}" type="text" class="form-control"></div>
                    <div class="position-relative form-group">
                        <label class="">Image</label>
                        <br>
                        <img src="{{url('/uploads/'.$banner->image)}}" alt="No Image" style="width:200px;height:100px">
                        <input name="meta[image]" type="file" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Status</label>
                        <select name="meta[status]" class="form-control">
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                    @csrf
                    <button class="mt-2 btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
    @include('admin.partials.footer')
</div>
@stop
@section('scripts')
@stop