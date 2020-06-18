@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-file icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Pages
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="card card-body"><h5 class="card-title">Create Pages</h5>
                <form action="{{url('admin/pages/update/'.$page->id)}}" method="post" enctype="multipart/form-data">
                    <div class="position-relative form-group"><label class="">Title</label><input name="meta[title]" value="{{$page->title}}" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Slug</label><input name="meta[slug]" value="{{$page->slug}}" type="text" class="form-control"></div>
                    <label class="">Content</label>
                    <textarea name="meta[content]" id="content" cols="30" rows="10" class="form-control"> {{$page->content}} </textarea>
                    <div class="position-relative form-group"><label class="">Image</label>
                    <br>
                    <img src="{{url('/uploads/'.$page->image)}}"  alt="No Image" width="100px" height="100px">
                    <input name="meta[image]" type="file" class="form-control"></div>
                    <div class="position-relative form-group">
                        <label class="">Status</label>
                        <select name="meta[status]" id="" class="form-control">
                            <option value="{{$page->status}}">{{$page->status}}</option>
                            <option value="Draft">Draft</option>
                            <option value="Publish">Publish</option>
                        </select>
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
<script>
    CKEDITOR.replace( 'meta[content]' );
</script>
@stop