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
                    <select id="select_filter" name="filter" class="form-control col-md-3" required>
                        @if(!empty($filter))
                            <option value="{{$filter}}">{{$filter}}</option>
                        @else
                            <option value="">Select Filter</option>
                        @endif
                        <option value="Daily">Daily</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Yearly">Yearly</option>
                    </select>
                    <br>
                    <div id="append_form">
                    </div>
                    
                    @csrf
                    <button class="mt-2 btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="card-body">
                    @if(!empty($filter) && !empty($chartjs))
                        <h4 class="text-center mb-3">Analytics Data : <b>{{$filter_text}}</b></h4>
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
                        <div>
                            {!! $chartjs->render() !!}
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th class="text-center">Order #</th>
                                                <th class="text-center">Customer</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                            <tr>
                                                <td class="text-center"> {{$order->date}} </td>
                                                <td class="text-center"> #{{$order->name}} </td>
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
                    @else
                        @if(!empty($filter_text))
                        <div>
                            <h4 class="text-center">Maaf, Data {{$filter_text}} tidak ditemukan.</h4>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.footer')
</div>
@stop

@section('scripts')

<script>
    $("#select_filter").change(function(){
        if($(this).val() == "Daily"){
            $("#daily").remove()
            $("#monthly").remove()
            $("#yearly").remove()
            $("#append_form").append(`
                <div id="daily" class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>Start Date</label>
                            <input name="start_date" placeholder="Start Date" type="date" class="form-control" required value=""></div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label>End Date</label>
                            <input name="end_date" placeholder="End Date" type="date" class="form-control" required value=""></div>
                    </div>
                </div>    
            `)
        }
        if($(this).val() == "Monthly"){
            $("#daily").remove()
            $("#monthly").remove()
            $("#yearly").remove()
            $("#append_form").append(`
            <div id="monthly" class="form-row">
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label>Month</label>
                        <select name="month" class="col-md-3 form-control">
                            <option value="{{date('Y')}}-01">January</option>
                            <option value="{{date('Y')}}-02">February</option>
                            <option value="{{date('Y')}}-03">March</option>
                            <option value="{{date('Y')}}-04">April</option>
                            <option value="{{date('Y')}}-05">May</option>
                            <option value="{{date('Y')}}-06">June</option>
                            <option value="{{date('Y')}}-07">July</option>
                            <option value="{{date('Y')}}-08">August</option>
                            <option value="{{date('Y')}}-09">September</option>
                            <option value="{{date('Y')}}-10">Oktober</option>
                            <option value="{{date('Y')}}-11">November</option>
                            <option value="{{date('Y')}}-12">Desember</option>
                        </select>
                </div>
            </div>
            `)
        }
        if($(this).val() == "Yearly"){
            $("#daily").remove()
            $("#monthly").remove()
            $("#yearly").remove()
            @php
                $now = (int)date("Y") - 5;
            @endphp
            $("#append_form").append(`
                <div id="yearly" class="form-row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label>Year</label>
                            <select name="year" class="form-control">
                                @for($i = $now;$i <= $now + 15; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            `)

        }
    })
</script>
@stop