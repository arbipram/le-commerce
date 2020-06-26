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
        <form action="{{url('admin/products/store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body"><h5 class="card-title">Create Products</h5>
                    <div class="position-relative form-group"><label class="">Name</label><input name="product[name]" placeholder="Product Name" type="text" class="form-control" required></div>
                    <div class="position-relative form-group"><label class="">Slug</label><input name="product[slug]" placeholder="" type="text" class="form-control" required></div>
                    <div class="position-relative form-group">
                        <label for="">Description</label>
                        <textarea name="product[description]" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="position-relative form-group">
                        <label for="">Short Description</label>
                        <textarea name="product[short_description]" id="" cols="30" rows="10" required></textarea>
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
                                    <input name="meta[regular_price]" type="text" class="form-control" required>
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Sale Price</label>
                                    <input name="meta[sale_price]" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane" id="inventory" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label class="">SKU</label>
                                    <input name="meta[sku]" type="text" class="form-control" required>
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Stock Quantity</label>
                                    <input name="meta[qty]" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="tab-pane" id="shipping" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label class="">Weight</label>
                                    <input name="meta[weight]" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Length</label>
                                    <input name="meta[length]" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Width</label>
                                    <input name="meta[width]" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group">
                                    <label class="">Height</label>
                                    <input name="meta[height]" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane" id="advanced" role="tabpanel">
                                <div class="position-relative form-group">
                                    <label class="">Purchase Note</label>
                                    <textarea name="meta[purchase_note]" id="" cols="30" rows="10" class="form-control"></textarea>
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
                        <select name="product[status]" id="" class="form-control" required>
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
                    @for($i=1; $i <= 4 ;$i++)
                        <input type="file" name="image_{{$i}}" class="form-control">
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
    CKEDITOR.replace( 'product[description]' );
    CKEDITOR.replace( 'product[short_description]');
</script>
@stop