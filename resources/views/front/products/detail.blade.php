@php
    use App\Models\StoreSetting;
@endphp
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
                            <p>Home / Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner">
        <div class="col-lg-5">
          <div class="product_slider_img">
            <div id="vertical">
              <div data-thumb="{{url('/uploads/'.$product->meta->image_1)}}" alt="">
                <img src="{{url('/uploads/'.$product->meta->image_1)}}" alt="" />
              </div>
              <div data-thumb="{{url('/uploads/'.$product->meta->image_2)}}" alt="">
                <img src="{{url('/uploads/'.$product->meta->image_2)}}" alt=""/>
              </div>
              <div data-thumb="{{url('/uploads/'.$product->meta->image_3)}}" alt="">
                <img src="{{url('/uploads/'.$product->meta->image_3)}}" alt="" />
              </div>
              <div data-thumb="{{url('/uploads/'.$product->meta->image_4)}}" alt="">
                <img src="{{url('/uploads/'.$product->meta->image_4)}}" alt="" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            @include('sweet::alert')

            <h3>{{$product->name}}</h3>
            <h2>Rp.
              @if(!empty($product->meta->sale_price))
                <strike>{{number_format($product->meta->regular_price,0,',','.')}}</strike>
                {{number_format($product->meta->sale_price,0,',','.')}}
              @else
                {{number_format($product->meta->regular_price,0,',','.')}}
              @endif
            </h2>
            <ul class="list">
              <li>
                <a>
                  <span>SKU</span> : {{$product->meta->sku}}</a>
              </li>
              <li>
                <a class="active" href="{{url('/products/category/'.$product->meta->category->slug)}}">
                  <span>Category</span> : {{$product->meta->category->name}}</a>
              </li>
              <li>
                <a href="#"> <span>Availibility</span> : {{$product->meta->qty}}</a>
              </li>
            </ul>
            <p>
            {{$product->short_description}}
            </p>
            <div class="card_area">
              <form action="{{url('/cart/add')}}" method="get">
              <div class="product_count d-inline-block">
                <input class="input-number" type="number" value="1" min="0" name="qty">
                <input type="hidden" name="product" value="{{$product->id}}">
              </div>
              <div class="add_to_cart">
                  @csrf
                  <button type="submit" class="btn_3">add to cart</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Specification</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          {!!$product->description!!}
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <h5>Length</h5>
                  </td>
                  <td>
                    <h5>{{$product->meta ? $product->meta->length : ''}} {{StoreSetting::where('meta_key','dimension_unit')->first()->meta_value}}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Width</h5>
                  </td>
                  <td>
                    <h5>{{$product->meta ? $product->meta->width : ''}} {{StoreSetting::where('meta_key','dimension_unit')->first()->meta_value}}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Height</h5>
                  </td>
                  <td>
                    <h5>{{$product->meta ? $product->meta->height : ''}} {{StoreSetting::where('meta_key','dimension_unit')->first()->meta_value}}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Weight</h5>
                  </td>
                  <td>
                    <h5>{{$product->meta ? $product->meta->weight : ''}} {{StoreSetting::where('meta_key','weight_unit')->first()->meta_value}}</h5>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h5>Purchase Note</h5>
                  </td>
                  <td>
                    <h5>{{$product->meta ? $product->meta->purchase_note : ''}}</h5>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->

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