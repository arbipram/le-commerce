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
            <div class="card card-body"><h5 class="card-title">Create Customers</h5>
                <form action="{{url('admin/customers/store')}}" method="post">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label class="">First Name</label>
                            <input name="meta[first_name]" placeholder="First Name" type="text" class="form-control"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group"><label class="">Last Name</label>
                            <input name="meta[last_name]" placeholder="Last Name" type="text" class="form-control"></div>
                        </div>
                    </div>
                    <div class="position-relative form-group"><label class="">Email</label><input name="meta[email]" placeholder="arbipram@gmail.com" type="email" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Phone Number</label><input name="meta[phone_number]" placeholder="+6281290080600" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Country</label>
                        <select name="meta[country]" id="country" class="form-control">
                        </select>
                    </div>
                    <div class="position-relative form-group"><label class="">State</label>
                        <select name="meta[state]" id="state" class="form-control">
                        </select>
                    </div>
                    <div class="position-relative form-group"><label class="">City</label><input name="meta[city]" placeholder="City" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Postcode</label><input name="meta[postcode]" placeholder="Postcode" type="text" class="form-control"></div>
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
$.ajax({
  url: "https://gist.githubusercontent.com/ebaranov/41bf38fdb1a2cb19a781/raw/fb097a60427717b262d5058633590749f366bd80/gistfile1.json",
  type: "get", // Jika GET "POST" diubah jadi "GET"
  success: function(res){
      var country = JSON.parse(res).countries
      for (let index = 0; index < country.length; index++) {
        $('#country').append(`<option value=`+country[index].country+` selected="selected">`+country[index].country+`</option>`);
      }
  }
});

$("#country").change(function(){
    $("#state option").remove();
    $.ajax({
    url: "https://gist.githubusercontent.com/ebaranov/41bf38fdb1a2cb19a781/raw/fb097a60427717b262d5058633590749f366bd80/gistfile1.json",
    type: "get", // Jika GET "POST" diubah jadi "GET"
    success: function(res){
            var country = JSON.parse(res).countries
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