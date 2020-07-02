@include('front.partials.head')

<body class="bg-white">
    <!--::header part start::-->
    @include('front.partials.header')   
    <!-- Header part end-->
    

    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <p>Home / Products / Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Products Product Area =================-->
    <section class="cat_product_area section_padding border_top">
        <div class="container">
            <div class="row">
                @include('sweet::alert')
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets sidebar_box_shadow">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($categories as $category)    
                                    <li>
                                        <a href="{{url('/products/category/'.$category->slug)}}">{{$category->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>

                        
                        <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                            <div class="l_w_title">
                                <h3>Price Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <div>
                                    <form action="#" method="get">
                                        <br>
                                        <select name="sorting" class="form-control">
                                            @if(!empty($request->sorting))
                                                <option value="{{$request->sorting}}">{{$request->sorting}}</option>
                                            @endif
                                            <option value="All">All</option>
                                            <option value="Higher Price">Higher Price</option>
                                            <option value="Lower Price">Lower Price</option>
                                        </select>
                                        <br>
                                        <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="@if(!empty($request->min_price)){{$request->min_price}}@endif">
                                        <br>
                                        <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="@if(!empty($request->max_price)){{$request->max_price}}@endif">
                                        <br>
                                    <button type="submit" class="btn btn-primary" style="width:100%">Filter</button>
                                    </form>
                                </div>
                            </div>
                        </aside> 
                       
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                <div class="single_product_menu product_bar_item">
                                    @php
                                        $category = \App\Models\ProductCategory::find($products[0]->categories);
                                    @endphp
                                    <h2>
                                        {{$category->name}}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        @foreach($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_category_product">
                                <div class="single_category_img">
                                    <img src="{{asset('/uploads/'.$product->image_1)}}" height="200px" width="200px">
                                    <div class="category_social_icon">
                                        <ul>
                                            <li><a href="{{url('/cart/add?product='.$product->pid.'&qty=1')}}"><i class="ti-bag"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="category_product_text">
                                        <a href="{{url('/products/'.$product->slug)}}"><h5>{{$product->name}}</h5></a>
                                        <p>Rp. 
                                        @if(!empty($product->sale_price))
                                        <strike>{{number_format($product->regular_price,0,',','.')}}</strike>
                                        {{number_format($product->sale_price,0,',','.')}}
                                        @else
                                        {{number_format($product->regular_price,0,',','.')}}
                                        @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- free shipping here -->
    <section class="shipping_details section_padding border_top">
        <div class="container">
            <div class="row">
                @foreach($widgets as $widget)
                    {!!$widget->widget!!}
                @endforeach
            </div>
        </div>
    </section>
    <!-- free shipping end -->
    
    @include('front.partials.footer')

    @include('front.partials.scripts')

</body>

</html>