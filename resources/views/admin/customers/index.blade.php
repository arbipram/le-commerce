@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-rocket icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Customers
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="col-md-9 mb-3">
                <a href="{{url('/admin/customers/create')}}" class="btn btn-success">Create</a>
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
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Postcode</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($customers))
                                    @foreach($customers as $i => $customer)
                                    <tr>
                                        <td> {{$i+1}}</td>
                                        <td> {{$customer->first_name.' '.$customer->last_name}}</td>
                                        <td> {{$customer->email}}</td>
                                        <td> {{$customer->country}}</td>
                                        <td> {{$customer->state}}</td>
                                        <td> {{$customer->city}}</td>
                                        <td> {{$customer->postcode}}</td>
                                        <td>
                                            <a href="{{url('/admin/customers/edit/'.$customer->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('/admin/customers/delete/'.$customer->id)}}" class="btn btn-danger">Delete</a>
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