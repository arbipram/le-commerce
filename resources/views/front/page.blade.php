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
                            <p>{{$page->title}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section padding_top">
    <div class="container">
        <div class="row">
            <h1>{{$page->title}}</h1>
            <div class="col-md-12 mt-5 mb-5">
                <img src="{{url('/uploads/'.$page->image)}}" alt="" class="mb-5">
                {!!$page->content!!}
            </div>
        </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

    @include('front.partials.footer')

    @include('front.partials.scripts')
</body>

</html>