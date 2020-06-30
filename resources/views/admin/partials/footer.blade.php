@php
$settings = App\Models\Setting::get();
@endphp
<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            {!!$settings->where('meta_key','footer')->first()->meta_value!!}
            <!-- <div class="app-footer-right">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            Footer Link 3
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <div class="badge badge-success mr-1 ml-0">
                                <small>NEW</small>
                            </div>
                            Footer Link 4
                        </a>
                    </li>
                </ul>
            </div> -->
        </div>
    </div>
</div>    