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
                    <div>Orders
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <form action="{{url('admin/orders/store')}}" method="post">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Orders</h5>
                <div class="row">
                    <div class="col-md-6">
                        <h6>General</h6>
                        <div class="position-relative form-group">
                            <label class="">Date</label>
                            <input name="order[date]" type="date" class="form-control" required>
                        </div>
                        <div class="position-relative form-group">
                            <label for="">Status</label>
                            <select name="order[status]" class="form-control" required>
                                <option value="Pending Payment">Pending Payment</option>
                                <option value="Processing">Processing</option>
                                <option value="On Hold">On Hold</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Refunded">Refunded</option>
                            </select>
                        </div>
                        <div class="position-relative form-group">
                            <label for="">Payment Method</label>
                            <select name="order[payment_method]" class="form-control" required>
                                <option value="Direct Bank Transfer">Direct Bank Transfer</option>
                                <option value="Cash On Delivery">Cash On Delivery</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6>Billing</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">First Name</label>
                                    <input name="customer[first_name]" required type="text" class="form-control">
                                </div>        
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">Last Name</label>
                                    <input name="customer[last_name]" required type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Address</label>
                            <textarea name="customer[address]" required id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">Country</label>
                                    <select name="customer[country]" required id="country" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">State</label>
                                    <select name="customer[state]" required id="state" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">City</label>
                                    <input name="customer[city]" required type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">Postcode</label>
                                    <input name="customer[postcode]" required type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">Phone Number</label>
                                    <input name="customer[phone_number]" required type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label class="">Email</label>
                                    <input name="customer[email]" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Product Data</h5>
                <div class="row">
                    <div class="col-md-12">
                        <label class="btn btn-primary" id="addProduct">Add Products</label>
                        <table class="table table-striped table-hover">
                            <thead>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="showProduct">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <label><b>Total : </b></label>
                        <input type="hidden" name="order[total_sales]" id="total_sales">
                        <label id="label_total_sales" style="font-weight:bold"></label> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @csrf
                        <button type="submit" class="btn btn-success" style="width:100%">Create Order</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    @include('admin.partials.footer')
</div>
@stop

@section('scripts')
<script>
var $i = 0;
$("#addProduct").click(function(){
    $i++
    $("#showProduct").append(`
        <tr id="tr_`+$i+`">
            <td>
                <select name="product[product_id][]" onchange="productChange(`+$i+`)" id="product_id_`+$i+`" class="form-control">
                    <option value="">--Select Products--</option>
                    @foreach($products as $key => $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select> 
            </td>
            <td> <input type="text" name="product[price][]" class="form-control" id="price_`+$i+`" readonly> </td>
            <td> <input type="text" name="product[qty][]" class="form-control" id="qty_`+$i+`" onchange="changeQty(`+$i+`)"> </td>
            <td> <input type="text" name="product[total][]" class="form-control total" id="total_`+$i+`" readonly> </td>
            <td> <label class="btn btn-danger" onclick="hapustr(`+$i+`)">Delete</label> </td>
        </tr>
    `)
})

function hapustr(id) {
    $("#tr_"+id).remove()
}

function productChange(id){
    $.ajax({
        url: "{{url('admin/products')}}"+"/"+$("#product_id_"+id).val()+".json",
        type: "GET", // Jika GET "POST" diubah jadi "GET"
        success: function(res){
            if (res.sale_price != null) {
                $("#price_"+id).val(res.sale_price)
                price = res.sale_price
            } else {
                $("#price_"+id).val(res.regular_price)
                price = res.regular_price
            }
            $("#qty_"+id).val(1)
            $("#total_"+id).val(price * 1)
            
            var sum = 0;
            $('.total').each(function() {
                sum += Number($(this).val());
            });

            $("#label_total_sales").html(sum)
            $("#total_sales").val(sum)            
        }
    });
}

function changeQty(id) {
    price = $("#price_"+id).val()
    qty = $("#qty_"+id).val()
    $("#total_"+id).val(price * qty)

    var sum = 0;
    $('.total').each(function() {
        sum += Number($(this).val());
    });

    $("#label_total_sales").html(sum)
    $("#total_sales").val(sum) 

}

$.ajax({
  url: "{{url('/json/countries.json')}}",
  type: "get", // Jika GET "POST" diubah jadi "GET"
  success: function(res){
      var country = res.countries
      for (let index = 0; index < country.length; index++) {
        $('#country').append(`<option value=`+country[index].country+` selected="selected">`+country[index].country+`</option>`);
      }
  }
});

$("#country").change(function(){
    $("#state option").remove();
    $.ajax({
    url: "{{url('/json/countries.json')}}",
    type: "get", // Jika GET "POST" diubah jadi "GET"
    success: function(res){
            var country = res.countries
            var states = country.filter(function(state) {
                return state.country == ($("#country").val()) ;
            });
            state_name = states[0].states
            for (let index = 0; index < state_name.length; index++) {
                $('#state').append(`<option value="`+state_name[index]+`">`+state_name[index]+`</option>`);
            }
        }
    });
})

</script>
@stop