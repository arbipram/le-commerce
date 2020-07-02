@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-photo-gallery icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Contact
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="card card-body"><h5 class="card-title">Create Contact</h5>
                <form action="{{url('admin/contacts/store')}}" method="post" enctype="multipart/form-data">
                    <div class="position-relative form-group"><label class="">Name</label><input name="meta[name]" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Email</label><input name="meta[email]" type="email" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Subject</label><input name="meta[subject]" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Message</label>
                        <textarea name="meta[message]" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    @csrf
                    <button class="mt-2 btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
    @include('admin.partials.footer')
</div>
@stop
@section('scripts')
@stop