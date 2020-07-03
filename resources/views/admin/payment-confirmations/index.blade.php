@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Payment Confirmations
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="col-md-9 mb-3">
                <a href="{{url('/admin/payment-confirmations/create')}}" class="btn btn-success">Create</a>
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
                                    <th>Order No</th>
                                    <th>Date</th>
                                    <th>Email</th>
                                    <th>Bank</th>
                                    <th>Amount</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($payment_confirmations))
                                    @foreach($payment_confirmations as $i => $payment_confirmation)
                                    <tr>
                                        <td> {{$i+1}}</td>
                                        <td> {{$payment_confirmation->order_no}}</td>
                                        <td> {{$payment_confirmation->created_at}}</td>
                                        <td> {{$payment_confirmation->email}}</td>
                                        <td> {{$payment_confirmation->bank}}</td>
                                        <td> {{$payment_confirmation->amount}}</td>
                                        <td> <img src="{{url('/uploads/'.$payment_confirmation->file)}}" alt="" width="100px" height="100px"> </td>
                                        <td>
                                            <a href="{{url('/admin/payment-confirmations/edit/'.$payment_confirmation->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{url('/admin/payment-confirmations/delete/'.$payment_confirmation->id)}}" class="btn btn-danger">Delete</a>
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