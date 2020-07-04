<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{\App\Models\Setting::where('meta_key','site_title')->first()->meta_value}} | {{\App\Models\Setting::where('meta_key','tag_line')->first()->meta_value}}</title>
    <link rel="icon" href="{{\App\Models\Setting::where('meta_key','logo')->first()->meta_value}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('winter/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{url('winter/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{url('winter/css/owl.carousel.min.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{url('winter/css/all.css')}}">
    <link rel="stylesheet" href="{{url('winter/css/nice-select.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{url('winter/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('winter/css/themify-icons.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{url('winter/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{url('winter/css/slick.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{url('winter/css/price_rangs.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{url('winter/css/style.css')}}">
    <!-- Swal -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>