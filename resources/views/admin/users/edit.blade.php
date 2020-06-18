@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-rocket icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Users
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="row">
            <div class="card card-body"><h5 class="card-title">Create Users</h5>
                <form action="{{url('admin/users/update/'.$user->id)}}" method="post">
                    <div class="position-relative form-group"><label class="">Name</label><input name="meta[name]" value="{{$user->name}}" placeholder="Your Name" type="text" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Email</label><input name="meta[email]" value="{{$user->email}}" placeholder="arbipram@gmail.com" type="email" class="form-control"></div>
                    <div class="position-relative form-group"><label class="">Password</label><input name="meta[password]" type="password" class="form-control"></div>
                    <div class="position-relative form-group">
                        <label class="">Role</label>
                        <select name="meta[role]" id="" class="form-control">
                            <option value="{{$user->role}}">{{$user->role}}</option>
                            <option value="Administrator">Administrator</option>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Status</label>
                        <select name="meta[status]" id="" class="form-control">
                            <option value="{{$user->status}}">{{$user->status}}</option>
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
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