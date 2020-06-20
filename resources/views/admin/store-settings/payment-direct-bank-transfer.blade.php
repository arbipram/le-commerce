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
            <div class="card card-body"><h5 class="card-title">Direct Bank Transfer</h5>
                <form action="{{url('admin/store/settings/payment-direct-bank-transfer')}}" method="post">
                    <input name="type" value="payment-direct-bank-transfer" type="hidden" class="form-control">
                    <div class="position-relative form-group"><label class="">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="{{$status ? $status->meta_value : ''}}">{{$status ? $status->meta_value : ''}}</option>
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                    <label class="btn btn-primary" id="addBank">Add Bank Account</label>
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                            <th>Bank</th>
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="showBank">
                        @if(!empty($banks))
                            @foreach($banks as $index => $value)
                            <tr id="tr_{{$index}}" class="lengthtr">
                                <td><input type="text" class="form-control" name="bank[]" value="{{$banks[$index]->meta_value}}" required></td>
                                <td><input type="text" class="form-control" name="account_name[]" value="{{$account_names[$index]->meta_value}}" required></td>
                                <td><input type="text" class="form-control" name="account_number[]" value="{{$account_numbers[$index]->meta_value}}" required></td>
                                <td><label onclick="hapustr({{$index}})" class="btn btn-danger">Delete</label></td>
                            </tr>  
                            @endforeach
                        @else
                        <td colspan = 4 class="text-center">No Data</td>
                        @endif
                        </tbody>
                    </table>
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
var $i = $(".lengthtr").length
$("#addBank").click(function(){
    $i++
    $("#showBank").append(`
        <tr id="tr_`+$i+`">
            <td><input type="text" class="form-control" name="bank[]" required></td>
            <td><input type="text" class="form-control" name="account_name[]" required></td>
            <td><input type="text" class="form-control" name="account_number[]" required></td>
            <td><label onclick="hapustr(`+$i+`)" class="btn btn-danger">Delete</label></td>
        </tr>
    `)
})

function hapustr(id) {
    $("#tr_"+id).remove()
}
</script>
@stop