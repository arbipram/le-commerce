@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ribbon icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Product Categories
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="card card-body"><h5 class="card-title">Edit Product Categories</h5>
                <form action="{{url('admin/product-categories/update/'.$product_category->id)}}" method="post" enctype="multipart/form-data">
                    <div class="position-relative form-group"><label class="">Name</label><input name="meta[name]" type="text" class="form-control" value="{{$product_category->name}}"></div>
                    <div class="position-relative form-group"><label class="">Slug</label><input name="meta[slug]" type="text" class="form-control" value="{{$product_category->slug}}"></div>
                    <div class="position-relative form-group">
                    <label class="">Description</label>
                    <textarea name="meta[description]" cols="30" rows="10" class="form-control">{{$product_category->description}}</textarea>
                    </div>
                    <div class="position-relative form-group">
                    <label class="">Image</label>
                    <br>
                    <img src="{{url('/uploads/'.$product_category->image)}}" alt="No Image" style="width:100px;height:100px">
                    <input name="meta[image]" type="file" class="form-control"></div>
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