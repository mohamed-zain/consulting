<?php
$Data = \App\Models\User::join('activate_files','activate_files.Bennar','=','users.File_code')->where('users.File_code',auth()->user()->File_code)->first();

?>
<header class="main-header">
    <!-- Logo -->
    <a href="{{url('index')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>K</b>O</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"> <img src="{{ asset('dist/img/koyellow.png') }}" class="" alt="User Image" style="height: 30px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->




                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('dist/img/logo.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ $Data->Name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">

                                <img src="{{ asset('dist/img/logo.png') }}" class="img-circle" alt="User Image">


                            <p style="color: #e39548;">عميل خير عون</p>
                        </li>

                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">الملف الشخصي</a>
                            </div>
                            <div class="pull-left">
                                <form action="{{ url('logout') }}" method="post">
                                    @csrf
                                    <button class="btn btn-default btn-flat">تسجيل الخروج</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->

            </ul>
        </div>
    </nav>
</header>
