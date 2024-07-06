<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{-- <img src="{{ asset('admin-assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light"><img src="{{ asset('front-assets/chemtix_images/logo_white.png') }}" alt="" class="" style="height: 50px;margin-left:40px;"></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                           Content Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{route('slider.list')}}" class="nav-link @if(Request::segment(2) == 'slider') active @endif">
                                <i class="nav-icon fa fa-sliders"></i>
                                <p>Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('description.list')}}" class="nav-link @if(Request::segment(2) == 'home') active @endif">
                                <i class="nav-icon fa fa-sliders"></i>
                                <p>Description</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('service.list')}}" class="nav-link @if(Request::segment(2) == 'our-service') active @endif">
                                <i class="nav-icon fa fa-sliders"></i>
                                <p>Our Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('industry.create')}}" class="nav-link">
                                <i class="nav-icon fa fa-sliders"></i>
                                <p>Description</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('served.list')}}" class="nav-link">
                                <i class="nav-icon fa fa-sliders"></i>
                                <p>Industry Served</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about.create')}}" class="nav-link @if(Request::segment(2) == 'about') active @endif">
                                <i class="nav-icon fa fa-sliders"></i>
                                <p>About Us</p>
                            </a>
                        </li>
        
                        <li class="nav-item">
                            <a href="{{route('setting.create')}}" class="nav-link @if(Request::segment(2) == 'general-setting') active @endif">
                                <!-- <i class="nav-icon fas fa-tag"></i> -->
                                <i class="nav-icon fa fa-sliders"></i>
                                <p>General Setting</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('category.list')}}" class="nav-link @if(Request::segment(2) == 'product-category') active @endif">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Product Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('products.list')}}" class="nav-link @if(Request::segment(2) == 'products') active @endif ">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Product</p>
                    </a>
                </li>
                
               
                
                <li class="nav-item">
                    <a href="{{route('supplier.list')}}" class="nav-link @if(Request::segment(2) == 'supplier') active @endif">
                        <!-- <i class="nav-icon fas fa-tag"></i> -->
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Suppliers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('customer.list')}}" class="nav-link @if(Request::segment(2) == 'customer') active @endif">
                        <!-- <i class="nav-icon fas fa-tag"></i> -->
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Customers</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
