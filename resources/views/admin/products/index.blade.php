@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-shopbag icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Products
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="col-md-9 mb-3">
                <a href="{{url('/admin/products/create')}}" class="btn btn-success">Create</a>
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
                                    <th>Name</th>
                                    <th>SKU</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Categories</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($products))
                                    @foreach($products as $i => $product)
                                    <tr>
                                        <td> {{$i+1}}</td>
                                        <td> {{$product->name}}</td>
                                        <td> {{ ($product->meta) ? $product->meta->sku : ''}}</td>
                                        <td> {{ ($product->meta) ? $product->meta->qty : ''}}</td>
                                        <td> {{ ($product->meta) ? $product->meta->regular_price : ''}}</td>
                                        @php
                                            $category = App\Models\ProductCategory::find($product->meta->categories);
                                        @endphp
                                        <td> {{$category ? $category->name : ''}} </td>
                                        <td> {{$product->created_at}}</td>
                                        <td>
                                            <a href="{{url('/admin/products/edit/'.$product->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('/admin/products/delete/'.$product->id)}}" class="btn btn-danger">Delete</a>
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