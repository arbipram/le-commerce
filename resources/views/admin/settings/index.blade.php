@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-settings icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Store Settings
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="col-md-12">
            <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Store Settings</h5>
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item"><a data-toggle="tab" href="#general" class="nav-link active">General</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#social-media" class="nav-link ">Social Media</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="general" role="tabpanel">
                                <form action="{{url('admin/settings/store')}}" method="post" enctype="multipart/form-data">
                                    <input name="type" value="general" type="hidden" class="form-control">
                                    <div class="position-relative form-group">
                                        <label class="">Site Title</label>
                                        <input name="meta[site_title]" value="{{$general->where('meta_key','site_title')->first() ? $general->where('meta_key','site_title')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Tag Line</label>
                                        <input name="meta[tag_line]" value="{{$general->where('meta_key','tag_line')->first() ? $general->where('meta_key','tag_line')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">URL Logo</label>
                                        <input name="meta[logo]" value="{{$general->where('meta_key','logo')->first() ? $general->where('meta_key','logo')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>

                                @csrf
                                <button type="submit" class="btn btn-success">Save Changes</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="social-media" role="tabpanel">
                                <form action="{{url('admin/settings/store')}}" method="post">
                                    <input name="type" value="social-media" type="hidden" class="form-control">
                                    <div class="position-relative form-group">
                                        <label class="">Facebook</label>
                                        <input name="meta[facebook]" value="{{$social_media->where('meta_key','facebook')->first() ? $social_media->where('meta_key','facebook')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Instagram</label>
                                        <input name="meta[instagram]" value="{{$social_media->where('meta_key','instagram')->first() ? $social_media->where('meta_key','instagram')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label class="">Youtube</label>
                                        <input name="meta[youtube]" value="{{$social_media->where('meta_key','youtube')->first() ? $social_media->where('meta_key','youtube')->first()->meta_value : ''}}" type="text" class="form-control">
                                    </div>
                                @csrf
                                <button type="submit" class="btn btn-success">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.footer')
</div>
@stop

@section('script')
@stop