@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ribbon icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Product Categories
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="col-md-9 mb-3">
                <a href="{{url('/admin/product-categories/create')}}" class="btn btn-success">Create</a>
            </div>
            <div class="col-md-3 mb-3">
                <form action="#" method="get">
                    <!-- <div class="input-group">
                        <input type="text" class="form-control" name="keyword" value="@if(!empty($_REQUEST['keyword'])){{$_REQUEST['keyword']}}@endif">
                        <div class="input-group-append">
                            @csrf
                            <button class="btn btn-secondary">Search</button>
                        </div>
                    </div> -->
                </form>
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
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($product_categories))
                                    @foreach($product_categories as $i => $product_category)
                                    <tr>
                                        <td> {{$i+1}}</td>
                                        <td> <img src="{{url('/uploads/'.$product_category->image)}}" alt="No Image" style="width:50px;height:50px"></td>
                                        <td> {{$product_category->name}}</td>
                                        <td> {{$product_category->description}}</td>
                                        <td> {{$product_category->slug}}</td>
                                        <td>
                                            <a href="{{url('/admin/product-categories/edit/'.$product_category->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('/admin/product-categories/delete/'.$product_category->id)}}" class="btn btn-danger">Delete</a>
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