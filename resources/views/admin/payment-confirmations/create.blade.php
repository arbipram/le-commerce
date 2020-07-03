@extends('admin.layouts.app')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-note2 icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Payment Confirmations
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div> 
            </div>
        </div>           
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Payment Confirmations</h5>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{url('/admin/payment-confirmations/store')}}" method="post" enctype="multipart/form-data">
                            <label for="">Order No</label>
                            <input type="text" name="meta[order_no]" class="form-control" placeholder="#Order202007031" required>
                            <br>
                            <label for="">Email</label>
                            <input type="email" name="meta[email]" class="form-control" placeholder="arbipram@gmail.com" required>
                            <br>
                            <label for="">Bank Account</label>
                            <input type="text" name="meta[bank]" class="form-control" placeholder="BCA 5210666950 a/n Arbi Pramana" required>
                            <br>
                            <label for="">Amount</label>
                            <input type="number" name="meta[amount]" class="form-control" required>
                            <br>
                            <label for="">Order Date</label>
                            <input type="date" name="meta[order_date]" class="form-control" required>
                            <br>
                            <label for="">Note</label>
                            <textarea name="meta[note]" class="form-control" cols="30" rows=""></textarea>
                            <br>
                            <label for="">File</label>
                            <input type="file" name="file" class="form-control" required>
                            <br>
                            @csrf
                            <br>
                            <button class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    @include('admin.partials.footer')
</div>
@stop

@section('scripts')
@stop