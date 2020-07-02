@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-settings icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Store Settings
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="col-md-12">
            <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Store Settings</h5>
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item"><a data-toggle="tab" href="#general" class="nav-link active">General</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#product" class="nav-link ">Product</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#payment" class="nav-link ">Payment</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="general" role="tabpanel">
                                <form action="{{url('admin/store/settings/store')}}" method="post">
                                    <input name="type" value="general" type="hidden" class="form-control">
                                    <div class="position-relative form-group">
                                        <label class="">Address Line 1</label>
                                        <input name="meta[address_1]" value="{{$general->where('meta_key','address_1')->first() ? $general->where('meta_key','address_1')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Address Line 2</label>
                                        <input name="meta[address_2]" value="{{$general->where('meta_key','address_2')->first() ? $general->where('meta_key','address_2')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">City</label>
                                        <input name="meta[city]" value="{{$general->where('meta_key','city')->first() ? $general->where('meta_key','city')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Country</label>
                                        <input name="meta[country]" value="{{$general->where('meta_key','country')->first() ? $general->where('meta_key','country')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">State</label>
                                        <input name="meta[state]" value="{{$general->where('meta_key','state')->first() ? $general->where('meta_key','state')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Postcode</label>
                                        <input name="meta[postcode]" value="{{$general->where('meta_key','postcode')->first() ? $general->where('meta_key','postcode')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Phone No</label>
                                        <input name="meta[phone_no]" value="{{$general->where('meta_key','phone_no')->first() ? $general->where('meta_key','phone_no')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Email</label>
                                        <input name="meta[email]" value="{{$general->where('meta_key','email')->first() ? $general->where('meta_key','email')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Maps</label>
                                        <textarea name="meta[maps]" cols="30" rows="4" class="form-control">{{$general->where('meta_key','maps')->first() ? $general->where('meta_key','maps')->first()->meta_value : ''}}</textarea>
                                    </div>
                                @csrf
                                <button type="submit" class="btn btn-success">Save Changes</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="product" role="tabpanel">
                                <div class="card-body">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a data-toggle="tab" href="#product_general" class="nav-link active">General</a></li>
                                        <li class="nav-item"><a data-toggle="tab" href="#inventory" class="nav-link">Inventory</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="product_general" role="tabpanel">
                                            <form action="{{url('admin/store/settings/store')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="type" value="product-general">
                                                <h5>Measurement</h5>
                                                <br>
                                                <div class="position-relative form-group">
                                                    <label class="">Weight Unit</label>
                                                    <input name="meta[weight_unit]" value="{{$product->where('type','product-general')->where('meta_key','weight_unit')->first() ? $product->where('type','product-general')->where('meta_key','weight_unit')->first()->meta_value : ''}}" type="text" class="form-control">
                                                </div>
                                                <div class="position-relative form-group">
                                                    <label class="">Dimension Unit</label>
                                                    <input name="meta[dimension_unit]" value="{{$product->where('type','product-general')->where('meta_key','dimension_unit')->first() ? $product->where('type','product-general')->where('meta_key','dimension_unit')->first()->meta_value : ''}}" type="text" class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-success"> Save Changes </button>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="inventory" role="tabpanel">
                                        <form action="{{url('admin/store/settings/store')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="type" value="product-inventory">
                                            <h5>Inventory</h5>
                                            <br>
                                            <div class="position-relative form-group">
                                                <label class="">Notification Reicipent</label>
                                                <input name="meta[notification_recipient]" value="{{$inventory->where('type','product-inventory')->where('meta_key','notification_recipient')->first() ? $inventory->where('type','product-inventory')->where('meta_key','notification_recipient')->first()->meta_value : ''}}" type="text" class="form-control" placeholder="arbipram@gmail.com">
                                            </div>
                                            <div class="position-relative form-group">
                                                <label class="">Low Stock Treshold</label>
                                                <input name="meta[low_stock_treshold]" value="{{$inventory->where('type','product-inventory')->where('meta_key','low_stock_treshold')->first() ? $inventory->where('type','product-inventory')->where('meta_key','low_stock_treshold')->first()->meta_value : ''}}" type="text" class="form-control">
                                            </div>
                                            <div class="position-relative form-group">
                                                <label class="">Out of Stock Treshold</label>
                                                <input name="meta[out_of_stock_treshold]" value="{{$inventory->where('type','product-inventory')->where('meta_key','out_of_stock_treshold')->first() ? $inventory->where('type','product-inventory')->where('meta_key','out_of_stock_treshold')->first()->meta_value : ''}}" type="text" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-success"> Save Changes </button>
                                        </form>    
                                        </div>
                                        <div class="tab-pane" id="tab-eg10-2" role="tabpanel">
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen book. It has
                                            survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="payment" role="tabpanel" style="overflow-x:scroll">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Direct Bank Transfer</td>
                                            <td></td>
                                            <td><a href="{{url('/admin/store/settings/payment-direct-bank-transfer')}}" class="btn btn-info">Manage</a></td>
                                        </tr>
                                        <tr>
                                            <td>Cash on Delivery</td>
                                            <td></td>
                                            <td><a href="{{url('/admin/store/settings/payment-cod')}}" class="btn btn-info">Manage</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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