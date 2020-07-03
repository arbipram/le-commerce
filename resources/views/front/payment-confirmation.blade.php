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
                            <p>Home / Payment Confirmation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding">
        <div class="container">
            <div class="row">
            @include('sweet::alert')
                <div class="col-md-12">
                    <form action="{{url('/payment-confirmation/store')}}" method="post" enctype="multipart/form-data">
                        <label for="">Order No</label>
                        <input type="text" name="meta[order_no]" class="form-control" placeholder="#Order202007031" required>
                        <br>
                        <label for="">Email</label>
                        <input type="email" name="meta[email]" class="form-control" placeholder="arbipram@gmail.com" required>
                        <br>
                        <label for="">Bank Account</label>
                        <input type="text" name="meta[bank]" class="form-control" placeholder="BCA 5210666950 a/n Arbi Pramana" required>
                        <br>
                        <label for="">Amount</label>
                        <input type="number" name="meta[amount]" class="form-control" required>
                        <br>
                        <label for="">Order Date</label>
                        <input type="date" name="meta[order_date]" class="form-control" required>
                        <br>
                        <label for="">Note</label>
                        <textarea name="meta[note]" class="form-control" cols="30" rows=""></textarea>
                        <br>
                        <label for="">File</label>
                        <input type="file" name="file" class="form-control" required>
                        <br>
                        @csrf
                        <br>
                        <button class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    

    @include('front.partials.footer')

    @include('front.partials.scripts')
</body>

</html>