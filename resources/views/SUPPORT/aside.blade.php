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
                <a href="#">ادارة الدعم الفني</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">قائمة التحكم</li>
            <li><a href="{{url('/')}}"><i class="fa fa-tachometer-alt  fa-lg" style="font-size: 30px;"></i> <span>اللوحة الرئيسية</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open fa-lg 2x" style="font-size: 30px;"></i> <span>ادارة المشاريع</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                   {{-- <li>
                        <a href="{{ url('projectCreate') }}">
                            <i class="fa fa-shield  fa-lg"></i>
                            <span>انشاء مشروع</span>
                        </a>
                    </li>--}}
                    <li>
                        <a href="{{url('/Projects')}}" id="" name="projectsList">
                            <i class="fa fa-shield  fa-lg"></i>
                            <span>طلبات زيارة المكتب</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('EmployeesPerformance') }}" id="">
                            <i class="fa fa-shield  fa-lg"></i>
                            <span> متابعة اداء الموظفين </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('') }}" id="">
                            <i class="fa fa-shield  fa-lg"></i>
                            <span> إنجاز المشاريع </span>
                        </a>
                    </li>

                </ul>
            </li>
            {{--<li>
                <a href="#" id="Archive">
                    <i class="fa fa-file-archive-o  fa-lg" style="font-size: 30px;"></i>
                    <span>ارشيف المشاريع</span>
                </a>
            </li>--}}

      {{--      <li><a href="#" id="ChartsLibrary44"><i class="fa fa-book  fa-lg" style="font-size: 30px;"></i> <span>المكتبة الهندسية</span></a>
            </li>
            <li><a href="#" id="Archive"><i class="fa fa-file-archive-o  fa-lg" style="font-size: 30px;"></i> <span>ارشيف المشاريع</span></a>
            </li>

--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users fa-lg" style="font-size: 30px;"></i> <span>الشؤون الادارية</span>
                    <i class="fa fa-angle-left pull-right fa-lg" style="font-size: 30px;"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                    <li><a href="{{url('Employee')}}" id=""><i class="fa fa-shield "></i> <span>سجل الموظفين</span></a>
                    </li>
                    {{--<li><a href="#" id="EmpMrequest"><i class="fa fa-shield "></i> <span>سجل الطلبات المالية</span></a>
                    </li>
                    <li><a href="#" id="EmpVrequest"><i class="fa fa-shield "></i> <span>سجل الاجازات</span></a></li>
                    <li><a href="#" id="EmpPrequest"><i class="fa fa-shield "></i> <span>سجل الاذونات</span></a></li>
                    <li><a href="#" id="AllRequest" name="AllRequest"><i class="fa fa-shield "></i>
                            <span>ارشيف الطلبات</span></a></li>--}}

                </ul>
            </li>
            {{--<li>
                <a href="{{ url('accounting') }}" id="EmpPrequest" name="emoployeesList">
                    <i class="fa fa-credit-card fa-lg" style="font-size: 30px;"></i>
                    <span>المتابعة المالية</span>
                </a>
            </li>--}}





            <li>
                <a href="{{url('Documents')}}" id="Documents" name="ex">
                    <i class="fa fa-journal-whills fa-lg " style="font-size: 30px;"></i>
                    <span>كتاب الشركة</span>
                </a>
            </li>
            <li class="header">تحكم الباقات</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-box-open fa-lg 2x" style="font-size: 30px;"></i>
                    <span>باقات خيرعون</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                    <li>
                        <a href="{{url('packages')}}" id="Documents" name="ex">
                            <i class="fa fa-shield fa-lg " style=""></i>
                            <span>قائمة الباقات</span></a>
                    </li>
                    <li>
                        <a href="{{url('/Services')}}" id="" name="projectsList">
                            <i class="fa fa-shield  fa-lg"></i>
                            <span>خدمات الباقات </span>
                        </a>
                    </li>
                    {{--
                    <li><a href="{{url('TasksList')}}" id="" name="TasksList"><i class="fa fa-shield  fa-lg"></i> <span>ادارة المهام</span></a>
                    </li>
--}}

                </ul>
            </li>

            <li>
                <a href="#" id="Reports">
                    <i class="fa fa-bars fa-lg " style="font-size: 30px;"></i>
                    <span>التقارير</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-cog fa-lg" style="font-size: 30px;"></i> <span>المستخدمين</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                    <li><a href="{{ url('UsersPrivileges') }}"><i class="fa fa-shield "></i> <span>قائمة المستخدمين</span></a>
                    </li>
                    <li><a href="{{url('usersLog')}}" id="" name="form" id="prolist"><i class="fa fa-shield "></i>
                            <span>سجل النشاطات</span></a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs" style="font-size: 30px;"></i> <span>الاعدادات</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                    <li><a href="{{url('MainSetting')}}" name="form" id="prolist"><i class="fa fa-shield "></i> <span>البيانات الاساسية</span></a>
                    </li>
                    <li><a href="{{url('SystemInfo')}}" name="form" id="prolist"><i class="fa fa-shield "></i> <span>اعدادات النظام</span></a>
                    </li>


                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
