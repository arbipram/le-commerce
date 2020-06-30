@php
    $categories = App\Models\ProductCategory::get();
    $store_settings = App\Models\StoreSetting::get();
    $settings = App\Models\Setting::get();
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
                            <li><a href="">About</a></li>
                            <li><a href="">News</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Contact</a></li>
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
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                    class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = ' Email Address '">
                                <button type="submit" name="submit" id="newsletter-submit"
                                    class="email_icon newsletter-submit button-contactForm">subscribe</button>
                                <div class="mt-10 info"></div>
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