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
                            <p>Home / Tracking</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

  <!--================Tracking Box Area =================-->
  <section class="tracking_box_area section_padding">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-12">
          <div class="tracking_box_inner">
            <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was
              given
              to you on your receipt and in the confirmation email you should have received.</p>
            <form class="row tracking_form" action="{{url('/confirmation')}}" method="get" novalidate="novalidate">
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="order" name="order_no" placeholder="Order ID">
              </div>
              <div class="col-md-12 form-group">
                <button type="submit" value="submit" class="btn_3">Track Order</button>
              </div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!--================End Tracking Box Area =================-->

    @include('front.partials.footer')

    @include('front.partials.scripts')
</body>

</html>