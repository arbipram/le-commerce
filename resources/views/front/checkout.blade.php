@include('front.partials.head')

<body class="bg-white">
    @include('front.partials.header')    
    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <p>Home / Checkout</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_padding">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" action="{{url('/checkout/store')}}" method="post">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="first" name="customer[first_name]" placeholder="First Name" required/>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="last" name="customer[last_name]" placeholder="Last Name" required/>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <textarea name="customer[address]" cols="30" rows="4" class="form-control" placeholder="Address" required></textarea>
                    </div>
                    <div class="col-md-6 form-group p_star">
                    <select name="customer[country]" id="country" class="form-control" required>
                        <option value="" disabled>Select Country</option>
                    </select>
                    </div>
                    <div class="col-md-6 form-group p_star">
                    <select name="customer[state]" id="state" class="form-control" required>
                        <option value="" disabled>Select State</option>
                    </select>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="city" name="customer[city]" placeholder="City" required/>
                    </div>
                    <div class="col-md-6 form-group">
                        <input type="text" class="form-control" id="zip" name="customer[postcode]" placeholder="Postcode/ZIP" required/>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="number" name="customer[phone_number]" placeholder="Phone number" required/>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="email" name="customer[email]" placeholder="Email Address" required />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                        <li>
                            <a href="#">Product
                            <span>Subtotal</span>
                            </a>
                        </li>
                        @foreach($items as $item)
                        <li>
                            <a href="#">{{$item->name}}
                            <span class="middle">x {{$item->quantity}}</span>
                            <span class="last">Rp. {{number_format($item->price*$item->quantity,0,',','.')}}</span>
                            </a>
                        </li>
                        @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li>
                                <a href="#">Total
                                <span>Rp. {{number_format(Cart::getSubTotal(),0,',','.')}}</span>
                                </a>
                            </li>
                        </ul>
                        @if($store_settings->where('type','payment-cod')->where('meta_key','status')->first()->meta_value == "Enable")
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option1" name="payment_method" value="Cash On Delivery" />
                                <label for="f-option1">Cash on Delivery</label>
                                <div class="check"></div>
                            </div>
                            <p>
                                {!!$store_settings->where('meta_key','address_cod')->first()->meta_value!!}
                            </p>
                        </div>
                        @endif
                        @if($store_settings->where('type','payment-direct-bank-transfer')->where('meta_key','status')->first()->meta_value == "Enable")
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option2" name="payment_method" value="Direct Bank Transfer"/>
                                <label for="f-option2">Direct Transfers</label>
                                <div class="check"></div>
                            </div>
                            <p>
                                Please, Transfer to : <br>
                                @foreach($banks as $i => $bank)
                                    {{$bank->meta_value}} a/n
                                    {{$account_name[$i]->meta_value}} <br>
                                    No Rek : {{$account_number[$i]->meta_value}}<br><br>
                                @endforeach
                            </p>
                        </div>
                        @endif
                    </div>
                    <br>
                    @csrf
                    <button class="btn btn-success" style="width:100%">Place Order</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </section>
    <!--================End Checkout Area =================-->

    @include('front.partials.footer')

    @include('front.partials.scripts')

    <script>
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
</body>

</html>