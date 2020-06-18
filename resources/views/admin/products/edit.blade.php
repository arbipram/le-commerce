@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-shopbag icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Products
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <form action="{{url('admin/products/update/'.$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body"><h5 class="card-title">Create Products</h5>
                    <div class="position-relative form-group"><label class="">Name</label><input name="product[name]" value="{{$product->name}}" placeholder="Product Name" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Slug</label><input name="product[slug]" value="{{$product->slug}}" placeholder="" type="text" class="form-control"></div>
                    <div class="position-relative form-group">
                        <label for="">Description</label>
                        <textarea name="product[description]" id="" cols="30" rows="10">{{$product->description}}</textarea>
                    </div>
                    <div class="position-relative form-group">
                        <label for="">Short Description</label>
                        <textarea name="product[short_description]" id="" cols="30" rows="10">{{$product->short_description}}</textarea>
                    </div>
                </div>
                <div class="mt-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                            Products Data
                        </div>
                        <ul class="nav">
                            <li class="nav-item"><a data-toggle="tab" href="#general" class="nav-link active">General</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#inventory" class="nav-link">Inventory</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#shipping" class="nav-link">Shipping</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#advanced" class="nav-link">Advanced</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="general" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label class="">Regular Price</label>
                                    <input name="meta[regular_price]" value="{{$meta->where('meta_key','regular_price')->first() ? $meta->where('meta_key','regular_price')->first()->meta_value : ''}}" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Sale Price</label>
                                    <input name="meta[sale_price]" value="{{$meta->where('meta_key','sale_price')->first() ? $meta->where('meta_key','sale_price')->first()->meta_value : ''}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane" id="inventory" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label class="">SKU</label>
                                    <input name="meta[sku]" value="{{$meta->where('meta_key','sku')->first() ? $meta->where('meta_key','sku')->first()->meta_value : ''}}" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Stock Quantity</label>
                                    <input name="meta[qty]" value="{{$meta->where('meta_key','qty')->first() ? $meta->where('meta_key','qty')->first()->meta_value : ''}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane" id="shipping" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label class="">Weight</label>
                                    <input name="meta[weight]" value="{{$meta->where('meta_key','weight')->first() ? $meta->where('meta_key','weight')->first()->meta_value : ''}}" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Length</label>
                                    <input name="meta[length]" value="{{$meta->where('meta_key','length')->first() ? $meta->where('meta_key','length')->first()->meta_value : ''}}" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Width</label>
                                    <input name="meta[width]" value="{{$meta->where('meta_key','width')->first() ? $meta->where('meta_key','width')->first()->meta_value : ''}}" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Height</label>
                                    <input name="meta[height]" value="{{$meta->where('meta_key','height')->first() ? $meta->where('meta_key','height')->first()->meta_value : ''}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane" id="advanced" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label class="">Purchase Note</label>
                                    <textarea name="meta[purchase_note]" id="" cols="30" rows="10" class="form-control">{{$meta->where('meta_key','purchase_note')->first() ? $meta->where('meta_key','purchase_note')->first()->meta_value : ''}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-body"><h5 class="card-title">Publish</h5>
                    <div class="position-relative form-group">
                        <label class="">Status</label>
                        <select name="product[status]"id="" class="form-control">
                            <option value="{$product->status}}">{{$product->status}}</option>
                            <option value="Draft">Draft</option>
                            <option value="Publish">Publish</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Publish</button>
                </div>
                <div class="card card-body mt-3"><h5 class="card-title">Product Categories</h5>
                    <div class="position-relative form-group">
                        <label class="">Categories</label>
                        <select name="meta[categories]" id="" class="form-control">
                            @foreach($products_categories as $products_category)
                            <option value="{{$products_category->id}}">{{$products_category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card card-body mt-3"><h5 class="card-title">Product Images</h5>
                    <label for="">Images</label>
                    @for($i=1;$i <= 4;$i++)
                    <img src="{{$meta->where('meta_key','image_'.$i)->first() ? url('uploads/'.$meta->where('meta_key','image_'.$i)->first()->meta_value) : ''}}" alt="No Image" width="100px" height="100px">
                    <input type="file" name="image[]" class="form-control">
                    @endfor
                </div>
            </div>
        </div>
        </form>
    </div>
    @include('admin.partials.footer')
</div>
@stop
@section('scripts')
<script>
    CKEDITOR.replace( 'product[description]');
    CKEDITOR.replace( 'product[short_description]');
</script>
@stop