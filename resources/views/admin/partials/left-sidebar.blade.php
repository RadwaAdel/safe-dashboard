
@php
    $current_route=request()->route()->getName();
@endphp
    <!-- Main Sidebar Container -->
<html>
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="    right: 0 !important;
    direction: rtl;
    text-align: right;left: unset !important;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        {{--      <img src="{{asset('admin-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        <span class="brand-text font-weight-light">لوحة التحكم</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin-assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                @can('manage_users')

                    <li class="nav-item has-submenu">
                        <a class="nav-link" href="{{route('all.users')}}">
                            <i class="nav-icon fas fa-users "style="color: #f2f2f2"></i>
                            <p>المستخدمين</p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{route('revenues.index')}}">
                        <i class="nav-icon fas fa-coins" style="color: #f2f4f8;"></i>
                        <p>الايرادات</p>
                    </a>
                </li>

                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{route('receipt.create')}}">
                        <i class="nav-icon fas fa-coins" style="color: #f2f4f8;"></i>
                        <p>اضافة ايصال ايراد</p>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{route('company.index')}}">
                        <i class="fas fa-building" style="color: #f2f4f8;"></i>
                        <p>الشركات</p>
                    </a>

                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{route('bank.index')}}">
                        <i class="fas fa-money-check" style="color: #ffffff;"></i>
                        <p>البنوك</p>
                    </a>


                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{route('expenses.index')}}">
                        <i class="nav-icon fas fa-coins" style="color: #f2f4f8;"></i>
                        <p>المصروفات</p>
                    </a>
                </li>

                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{route('exreceipt.create')}}">
                        <i class="nav-icon fas fa-coins" style="color: #f2f4f8;"></i>
                        <p>اضافة ايصال مصروف</p>
                    </a>
                </li>

                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{route('report-cash')}}">
                        <i class="nav-icon fas fa-coins" style="color: #f2f4f8;"></i>
                        <p>تقرير حركة الخزنة </p>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{route('report-bank')}}">
                        <i class="fas fa-money-check" style="color: #ffffff;"></i>
                        <p>تقرير حركة البنوك </p>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{route('all-report-cash')}}">
                        <i class="nav-icon fas fa-coins" style="color: #f2f4f8;"></i>
                        <p>تقرير اجمالى حركة الخزنة </p>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav-link" href="{{route('all-report-bank')}}">
                        <i class="fas fa-money-check" style="color: #ffffff;"></i>
                        <p>تقرير اجمالى حركة البنوك </p>
                    </a>
                </li>


            </ul>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
</html>
