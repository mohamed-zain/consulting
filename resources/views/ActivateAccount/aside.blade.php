<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{ asset('dist/img/logo.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" style="">
                <p> @if(Auth::check())
                        {{ Auth::user()->name }}
                    @endif</p>
                <a href="#"> الادارة المالية</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">قائمة التحكم</li>
            <li>
                <a href="{{url('ActivateAccounts')}}">
                    <i class="fa fa-tachometer-alt  fa-lg" style="font-size: 30px;"></i>
                    <span>اللوحة الرئيسية</span>
                </a>
            </li>
            <li>
                <a href="{{ url('NewFiles') }}">
                    <i class="fa fa-folder-open fa-lg 2x" style="font-size: 30px;"></i>
                    <span> تفعيل الملفات</span>
                </a>
            </li>

            <li>
                <a href="{{ url('ActiveFiles2') }}">
                    <i class="fa fa-low-vision fa-lg" style="font-size: 30px;"></i>
                    <span> الملفات المفعلة </span>
                </a>
            </li>

            <li>
                <a href="{{ url('Projects') }}">
                    <i class="fa fa-braille fa-lg" style="font-size: 30px;"></i>
                    <span>قائمة المشاريع</span>
                </a>
            </li>

            <li>
                <a href="#" id=""  data-toggle="modal" data-target="#PStages">
                    <i class="fa fa-search"  style="font-size: 30px;"></i>
                    <span> البحث في المشاريع </span>
                </a>
            </li>
            <li>
                <a href="{{ url('EmployeesPerformance') }}">
                    <i class="fa fa-balance-scale fa-lg" style="font-size: 30px;"></i>
                    <span> متابعة اداء الموظفين </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks fa-lg 2x" style="font-size: 30px;"></i> <span> إدارة المهام</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                    <li>
                        <a href="#">
                            <i class="fa fa-tasks  fa-lg"></i>
                            <span> مهام المشاريع</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bars fa-lg" style="font-size: 30px;"></i> <span>التقارير</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                    <li>
                        <a href="{{ url('ProjectsReports') }}">
                            <i class="fas fa-align-center "></i>
                            <span> تقارير المشاريع</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('TasksReports')}}">
                            <i class="fab fa-audible "></i>
                            <span> تقارير المهام</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('EngReports')}}">
                            <i class="far fa-address-book "></i>
                            <span> تقارير المهندسين</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="header"> الاعدادات</li>

            <li>
                <a href="#">
                    <i class="fas fa-tools fa-lg 2x" style="font-size: 30px;"></i>
                    <span> الاعدادات</span>
                </a>
            </li>




        </ul>
    </section>
    <!-- /.sidebar -->
</aside>