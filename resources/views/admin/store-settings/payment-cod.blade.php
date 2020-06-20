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
                    <div>Settings > Payments
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="card card-body"><h5 class="card-title">Cash on Delivery</h5>
                <form action="{{url('admin/store/settings/store')}}" method="post">
                    <input name="type" value="payment-cod" type="hidden" class="form-control">
                    <div class="position-relative form-group"><label class="">Status</label>
                        <select name="meta[status]" id="" class="form-control">
                            <option value="{{$paymentCod->where('meta_key','status')->first() ? $paymentCod->where('meta_key','status')->first()->meta_value : ''}}">{{$paymentCod->where('meta_key','status')->first() ? $paymentCod->where('meta_key','status')->first()->meta_value : ''}}</option>
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                    <label class="">Address Cash on Delivery</label>
                    <textarea name="meta[address_cod]" cols="30" rows="10" class="form-control">{{$paymentCod->where('meta_key','address_cod')->first() ? $paymentCod->where('meta_key','address_cod')->first()->meta_value : ''}}</textarea>
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
    CKEDITOR.replace( 'meta[address_cod]' );
</script>
@stop