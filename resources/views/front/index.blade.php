@php
use App\Models\Banner;
use App\Models\ProductCategory;

$banner = Banner::where('status','Enable')->latest()->first();
$product_category = ProductCategory::get();
@endphp
@extends('front.layouts.app')
@section('content')
<!-- banner part start-->
<section class="banner_part" style="background-image:url('{{url('/uploads/'.$banner->image)}}') !important">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_slider">
                        <div class="single_banner_slider">
                            <div class="banner_text">
                                <div class="banner_text_iner">
                                    <h5>{{$banner->h5}}</h5>
                                    <h1>{{$banner->h1}}</h1>
                                    <a href="{{$banner->button_link}}" class="btn_1">{{$banner->button_text}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part pt-4">
        <div class="container-fluid p-lg-0 overflow-hidden">
            <div class="row align-items-center justify-content-between">
                @foreach($product_category as $category)
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="{{url('uploads/'.$category->image)}}" alt="#">
                        <div class="hover_text">
                            <a href="{{url('/products/category/'.$category->slug)}}" class="btn_2">Shop For {{$category->name}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- new arrival part here -->
    <section class="new_arrival section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="arrival_tittle">
                        <h2>new arrival</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @include('sweet::alert')
                <div class="col-lg-12">
                    <div class="new_arrival_iner filter-container">
                        <div class="single_arrivel_item width_1 mix shoes">
                            <img src="{{url('/uploads/'.$products[0]->meta->image_1)}}" alt="#">
                            <div class="hover_text">
                                <p>{{$products[0]->meta->category->name}}</p>
                                <a href="{{url('/products/'.$products[0]->slug)}}"><h3>{{$products[0]->name}}</h3></a>
                                <h5>{{$products[0]->meta->sale_price ? "Rp ".number_format($products[0]->meta->sale_price,0,',','.') : "Rp. ".number_format($products[0]->meta->regular_price,0,',','.') }}</h5>
                                <div class="social_icon">
                                    <a href="{{url('/cart/add?product='.$products[0]->id.'&qty=1')}}"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item width_2 mix" id="men">
                            <img src="{{url('/uploads/'.$products[1]->meta->image_1)}}" alt="#">
                            <div class="hover_text">
                                <p>{{$products[1]->meta->category->name}}</p>
                                <a href="{{url('/products/'.$products[1]->slug)}}"><h3>{{$products[1]->name}}</h3></a>
                                <h5>{{$products[1]->meta->sale_price ? "Rp ".number_format($products[1]->meta->sale_price,0,',','.') : "Rp. ".number_format($products[1]->meta->regular_price,0,',','.') }}</h5>
                                <div class="social_icon">
                                    <a href="{{url('/cart/add?product='.$products[1]->id.'&qty=1')}}"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item width_3 mix shoes women" >
                            <img src="{{url('/uploads/'.$products[2]->meta->image_1)}}" alt="#">
                            <div class="hover_text">
                                <p>{{$products[2]->meta->category->name}}</p>
                                <a href="{{url('/products/'.$products[2]->slug)}}"><h3>{{$products[2]->name}}</h3></a>
                                <h5>{{$products[2]->meta->sale_price ? "Rp ".number_format($products[2]->meta->sale_price,0,',','.') : "Rp. ".number_format($products[2]->meta->regular_price,0,',','.') }}</h5>
                                <div class="social_icon">
                                    <a href="{{url('/cart/add?product='.$products[2]->id.'&qty=1')}}"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item width_3 mix women men">
                            <img src="{{url('/uploads/'.$products[3]->meta->image_1)}}" alt="#">
                            <div class="hover_text">
                                <p>{{$products[3]->meta->category->name}}</p>
                                <a href="{{url('/products/'.$products[3]->slug)}}"><h3>{{$products[3]->name}}</h3></a>
                                <h5>{{$products[3]->meta->sale_price ? "Rp ".number_format($products[3]->meta->sale_price,0,',','.') : "Rp. ".number_format($products[3]->meta->regular_price,0,',','.') }}</h5>
                                <div class="social_icon">
                                    <a href="{{url('/cart/add?product='.$products[3]->id.'&qty=1')}}"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item width_2 mix men women">
                            <img src="{{url('/uploads/'.$products[4]->meta->image_1)}}" alt="#">
                            <div class="hover_text">
                                <p>{{$products[4]->meta->category->name}}</p>
                                <a href="{{url('/products/'.$products[4]->slug)}}"><h3>{{$products[4]->name}}</h3></a>
                                <h5>{{$products[4]->meta->sale_price ? "Rp ".number_format($products[4]->meta->sale_price,0,',','.') : "Rp. ".number_format($products[4]->meta->regular_price,0,',','.') }}</h5>
                                <div class="social_icon">
                                    <a href="{{url('/cart/add?product='.$products[4]->id.'&qty=1')}}"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item width_1 mix shoes men">
                            <img src="{{url('/uploads/'.$products[5]->meta->image_1)}}" alt="#">
                            <div class="hover_text">
                                <p>{{$products[5]->meta->category->name}}</p>
                                <a href="{{url('/products/'.$products[5]->slug)}}"><h3>{{$products[5]->name}}</h3></a>
                                <h5>{{$products[5]->meta->sale_price ? "Rp ".number_format($products[5]->meta->sale_price,0,',','.') : "Rp. ".number_format($products[5]->meta->regular_price,0,',','.') }}</h5>
                                <div class="social_icon">
                                    <a href="{{url('/cart/add?product='.$products[5]->id.'&qty=1')}}"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <!-- new arrival part end -->

    <!-- widget here -->
    <section class="shipping_details section_padding">
        <div class="container">
            <div class="row">
                @foreach($widgets as $widget)
                    {!!$widget->widget!!}
                @endforeach
            </div>
        </div>
    </section>
    <!-- widget end -->

    <!-- subscribe_area part start-->
        <!-- @include('front.partials.instagram') -->
    <!--::subscribe_area part end::-->
@stop