@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-keypad icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Widgets
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="card card-body"><h5 class="card-title">Edit Widgets</h5>
                <form action="{{url('admin/widgets/update/'.$widget->id)}}" method="post" enctype="multipart/form-data">
                    <div class="position-relative form-group"><label class="">Name</label><input name="meta[name]" type="text" class="form-control" value="{{$widget->name}}"></div>
                    <label class="">Widget</label>
                    <textarea name="meta[widget]" cols="30" rows="10" class="form-control">{{$widget->widget}}</textarea>
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
    CKEDITOR.replace( 'meta[widget]' );
</script>
@stop