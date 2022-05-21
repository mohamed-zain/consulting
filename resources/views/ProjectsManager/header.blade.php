
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
       
                <li class="header">
                    <a href="{{ url('Dispatcher') }}" >تبديل لإدارة أخرى</a>
                </li>
                <li class="header">
                    <a href="#" >تنبيهات</a>
                </li>

            <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('dist/img/logo.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            @if(Auth::check())
                                {{ Auth::user()->name }}
                            @endif</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php
                            if(Auth::check()){
                                $empid = Auth::user()->EmpiD;

                                $dtt = DB::table('emplyees')->select('Attached as at')->where('id','=',$empid)->get();
                            }

                            ?>
                            @if(isset($dt))
                                <img src="{{$dtt->dt}}" class="img-circle" alt="User Image">
                            @else
                                <img src="{{ asset('dist/img/logo.png') }}" class="img-circle" alt="User Image">

                            @endif
                            <p style="color: #e39548;">
                                @if(Auth::check())
                                    {{ Auth::user()->name }}
                                @endif
                            </p>
                        </li>

                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{url('/UpdateProfile')}}" class="btn btn-default btn-flat">الملف الشخصي</a>
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
