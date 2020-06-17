@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-photo icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Medias
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="col-md-9 mb-3">
                <a href="{{url('/admin/medias/create')}}" class="btn btn-success">Create</a>
            </div>
            <div class="col-md-3 mb-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="table-responsive" style="padding:10px">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>File</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($medias))
                                    @foreach($medias as $i => $media)
                                    <tr>
                                        <td> {{$i+1}}</td>
                                        <td> {{$media->name}}</td>
                                        <td> <a href="{{url('/uploads/'.$media->file)}}">{{$media->file}}</a></td>
                                        <td>
                                            <a href="{{url('/admin/medias/edit/'.$media->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('/admin/medias/delete/'.$media->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.footer')
</div>
@stop

@section('script')
@stop