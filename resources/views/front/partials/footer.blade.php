@php
    $categories = App\Models\ProductCategory::get();
    $store_settings = App\Models\StoreSetting::get();
    $settings = App\Models\Setting::get();
    $pages = App\Models\Page::get();
@endphp

<!--::footer_part start::-->
<footer class="footer_part">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Category</h4>
                        @foreach($categories as $category)
                        <ul class="list-unstyled">
                            <li><a href="{{url('/products/category/'.$category->slug)}}">{{$category->name}}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Company</h4>
                        <ul class="list-unstyled">
                            @foreach($pages as $page)
                            <li><a href="{{url('/page/'.$page->slug)}}">{{$page->title}}</a></li>
                            @endforeach
                            <li><a href="{{url('/payment-confirmation')}}">Payment Confirmation</a></li>
                            <li><a href="{{url('/contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="single_footer_part">
                        <h4>Address</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">{{$store_settings->where('meta_key','address_1')->first()->meta_value}}</a></li>
                            <li><a href="#">{{$store_settings->where('meta_key','address_2')->first()->meta_value}}</a></li>
                            <li><a href="tel:{{$store_settings->where('meta_key','phone_no')->first()->meta_value}}">{{$store_settings->where('meta_key','phone_no')->first()->meta_value}}</a></li>
                            <li><a href="mailto:{{$store_settings->where('meta_key','email')->first()->meta_value}}">{{$store_settings->where('meta_key','email')->first()->meta_value}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Newsletter</h4>
                        <div>
                              @include('sweet::alert')
                            <form action="{{url('/contact/newsletter')}}" method="post" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address">
                                @csrf
                                <button name="submit" class="email_icon">Subscribe</button>
                            </form>
                        </div>
                        <div class="social_icon">
                            <a href="{{$settings->where('meta_key','facebook')->first()->meta_value}}"><i class="ti-facebook"></i></a>
                            <a href="{{$settings->where('meta_key','youtube')->first()->meta_value}}"><i class="ti-youtube"></i></a>
                            <a href="{{$settings->where('meta_key','instagram')->first()->meta_value}}"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P>{!!$settings->where('meta_key','footer')->first()->meta_value!!}</P>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->