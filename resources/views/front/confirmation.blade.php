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
                            <p>Home / Confirmation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <section class="confirmation_part section_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span>Thank you. Your order has been received.</span>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Order Info</h4>
            <ul>
              <li>
                <p>order number</p><span>: #{{$order->name}}</span>
              </li>
              <li>
                <p>date</p><span>: {{date("d M, Y",strtotime($order->date))}}</span>
              </li>
              <li>
                <p>total</p><span>: Rp. {{number_format($order->total_sales,0,',','.')}}</span>
              </li>
              <li>
                <p>Payment method</p><span>: {{$order->payment_method}}</span>
              </li>
              <li>
                <p>Status</p><span>: {{$order->status}}</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Billing Address</h4>
            <ul>
              <li>
                <p>Name</p><span>: {{$customer->first_name." ".$customer->last_name}}</span>
              </li>
              <li>
                <p>address</p><span>: {{$customer->address}}</span>
              </li>
              <li>
                <p>country</p><span>: {{$customer->country}}</span>
              </li>
              <li>
                <p>state</p><span>: {{$customer->state}}</span>
              </li>
              <li>
                <p>city</p><span>: {{$customer->city}}</span>
              </li>
              <li>
                <p>postcode</p><span>: {{$customer->postcode}}</span>
              </li>
              <li>
                <p>phone number</p><span>: {{$customer->phone_number}}</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
            <h3>Order Details</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items->product_id as $i => $item)
                @php
                  $product = App\Models\Product::find($item)
                @endphp
                <tr>
                  <th colspan="2"><span>{{$product->name}}</span></th>
                  <th>x {{$items->qty[$i]}}</th>
                  <th> <span>Rp. {{number_format($items->price[$i],0,',','.')}}</span></th>
                </tr>
                @endforeach
                
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col" colspan="3"></th>
                  <th scope="col">Total : Rp. {{number_format($order->total_sales,0,',','.')}}</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

    @include('front.partials.footer')

    @include('front.partials.scripts')
</body>

</html>