

<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Store</li>
                <li>
                    <a href="{{url('admin/dashboard')}}" class="@if(Request::segment(2)=='dashboard') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/orders')}}" class="@if(Request::segment(2)=='orders') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/customers')}}" class="@if(Request::segment(2)=='customers') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Customers
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/store/settings')}}" class="@if(Request::segment(2)=='store' && Request::segment(3)=='settings') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-settings"></i>
                        Settings
                    </a>
                </li>
                <li class="app-sidebar__heading">Products</li>
                <li>
                    <a href="{{url('admin/products')}}" class="@if(Request::segment(2)=='products' && Request::segment(3)=='') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-shopbag"></i>
                        All Products
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/products/create')}}" class="@if(Request::segment(2)=='products' && Request::segment(3)=='create') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-plus"></i>
                        Add New
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/product-categories')}}" class="@if(Request::segment(2)=='product-categories') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-ribbon"></i>
                        Categories
                    </a>
                </li>
                <li class="app-sidebar__heading">Frontend</li>
                <li>
                   <a href="{{url('admin/banners')}}" class="@if(Request::segment(2)=='banners') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-photo-gallery"></i>
                        Banner
                    </a>
                </li>
                <li>
                   <a href="{{url('admin/medias')}}" class="@if(Request::segment(2)=='medias') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-photo"></i>
                        Media
                    </a>
                </li>
                <li>
                   <a href="{{url('admin/pages')}}" class="@if(Request::segment(2)=='pages') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-file"></i>
                        Pages
                    </a>
                </li>
                <li>
                   <a href="{{url('admin/widgets')}}" class="@if(Request::segment(2)=='widgets') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-keypad"></i>
                        Widgets
                    </a>
                </li>
                <li>
                   <a href="{{url('admin/scripts')}}" class="@if(Request::segment(2)=='scripts') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-browser"></i>
                        Scripts
                    </a>
                </li>
                <li>
                   <a href="{{url('admin/contacts')}}" class="@if(Request::segment(2)=='contacts') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-file"></i>
                        Contact
                    </a>
                </li>
                <li>
                   <a href="{{url('admin/newsletters')}}" class="@if(Request::segment(2)=='newsletters') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-file"></i>
                        Newsletter
                    </a>
                </li>
                <li class="app-sidebar__heading">Settings</li>
                <li>
                   <a href="{{url('admin/users')}}" class="@if(Request::segment(2)=='users') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-user"></i>
                        Users
                    </a>
                </li>
                <li>
                   <a href="{{url('admin/settings')}}" class="@if(Request::segment(2)=='settings') mm-active @else @endif">
                        <i class="metismenu-icon pe-7s-config"></i>
                        General
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>    