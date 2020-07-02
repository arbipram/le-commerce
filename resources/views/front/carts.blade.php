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
                            <p>Home / Carts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
    <div class="container">
    @include('sweet::alert')
        <div class="cart_inner">
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <form action="{{url('/cart/update')}}" method="get">
                @foreach($items as $i => $item)
                <tr>
                    <input type="hidden" name="row_id[]" value="{{$item->id}}">
                    <input type="hidden" name="product[]" value="{{$item->attributes['product_id']}}">
                    <td>
                        <div class="media">
                        <div class="d-flex">
                            <img src="{{url('/uploads/'.$item->attributes['image'])}}" alt="" />
                        </div>
                        <div class="media-body">
                            <p>{{$item->name}}</p>
                        </div>
                        </div>
                    </td>
                    <td>
                        <h5>Rp. {{number_format($item->price,0,',','.')}}</h5>
                    </td>
                    <td>
                        <div class="product_count">
                            <input type="number" value="{{$item->quantity}}" min="0" name="quantity[]">
                        </div>
                    </td>
                    <td>
                        <h5>Rp. {{number_format(Cart::get($item->id)->getPriceSum(),0,',','.')}}</h5>
                    </td>
                    <td>
                        <a href="{{url('/cart/delete/'.$i)}}" class="btn btn-danger"> Delete </a>
                    </td>
                </tr>
                @endforeach
            @csrf
            <tr class="bottom_button">
                <td>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <button class="btn_1">Update Cart</button>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <h5>Subtotal</h5>
                    </td>
                    <td>
                        <h5>Rp. {{number_format(Cart::getSubTotal(),0,',','.')}}</h5>
                    </td>
                </tr>
            </form>
            </tbody>
            </table>
            <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{url('/')}}">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="{{url('/checkout')}}">Proceed to checkout</a>
            </div>
        </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    @include('front.partials.footer')

    @include('front.partials.scripts')
</body>

</html>