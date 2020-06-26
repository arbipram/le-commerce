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
                    <div>Analytics Dashboard
                        <div class="page-title-subheading">This is your store dashboard performance.
                        </div>
                    </div>
                </div>   
            </div>
        </div>           
        <div class="row">
            <div class="main-card mb-3 card col-md-12">
                <div class="card-body"><h5 class="card-title">Filter</h5>
                    <form class="#" method="get">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label>Start Date</label>
                                    <input name="start_date" placeholder="Start Date" type="date" class="form-control" required value="{{ $_REQUEST ? $_REQUEST['start_date'] : '' }}"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label>End Date</label>
                                    <input name="end_date" placeholder="End Date" type="date" class="form-control" required value="{{ $_REQUEST ? $_REQUEST['end_date'] : '' }}"></div>
                            </div>
                        </div>
                        <button class="mt-2 btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        @if(!empty($_REQUEST["start_date"]) && !empty($_REQUEST["end_date"])) 
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Sales</div>
                            <div class="widget-subheading">Previous Year : Rp. {{number_format($prev_total_sales,0,'.',',')}}</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>Rp. {{number_format($total_sales,0,'.',',')}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Orders</div>
                            <div class="widget-subheading">Previous Year : {{$prev_total_order}}</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$total_order}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Customers</div>
                            <div class="widget-subheading">Previous Year : {{$prev_total_customer}}</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$total_customer}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-premium-dark">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Products Sold</div>
                            <div class="widget-subheading">Revenue streams</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><span>$14M</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            Orders
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                            <canvas id="canvas"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th class="text-center">Order #</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Customer</th>
                                <th class="text-center">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td class="text-center"> {{$order->date}} </td>
                                <td class="text-center"> {{$order->name}} </td>
                                <td class="text-center"> {{$order->customer ? $order->customer->first_name." ".$order->customer->last_name : ''}} </td>
                                <td class="text-center"> {{$order->status}} </td>
                                <td class="text-center"> {{$order->total_sales}} </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    @include('admin.partials.footer')
</div>
@stop