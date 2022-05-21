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
                <a href="#">مدير المشاريع</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">قائمة التحكم</li>
            <li>
                <a href="{{url('MainPort')}}">
                    <i class="fa fa-tachometer-alt  fa-lg" style="font-size: 30px;"></i>
                    <span>اللوحة الرئيسية</span>
                </a>
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
                            <i class="fa fa-list-alt  fa-lg"></i>
                            <span>جميع المشاريع</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('WaitingProjects')}}" id="" name="projectsList">
                            <i class="fa fa-praying-hands  fa-lg"></i>
                            <span>قائمة الانتظار</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" id=""  data-toggle="modal" data-target="#PStages">
                            <i class="fa fa-search  fa-lg"></i>
                            <span> البحث في المشاريع </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('EmployeesPerformance') }}" id="">
                            <i class="fa fa-chart-area  fa-lg"></i>
                            <span> متابعة اداء الموظفين </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('projects_progress') }}" id="">
                            <i class="fa fa-prescription  fa-lg"></i>
                            <span> إنجاز المشاريع </span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tasks fa-lg 2x" style="font-size: 30px;"></i> <span> إدارة المهام</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                    <li>
                        <a href="{{ url('TasksManagement') }}">
                            <i class="fa fa-tasks  fa-lg"></i>
                            <span> مهام المشاريع</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="{{ url('ApprovalPackageServices') }}">
                    <i class="fas fa-toolbox fa-lg" style="font-size: 30px;"></i>
                    <span> تعميد خدمات الباقة</span>
                </a>
            </li>
            <li>
                <a href="{{ url('Design_Requirements') }}">
                    <i class="fas fa-journal-whills fa-lg " style="font-size: 30px;"></i>
                    <span> فتح (Job Cards) </span>
                </a>
            </li>
          {{--  <li>
                <a href="{{ url('ActiveFiles') }}">
                    <i class="fas fa-info-circle fa-lg" style="font-size: 30px;"></i>
                    <span> الملفات المفعلة </span>
                </a>
            </li>--}}
            <li>
                <a href="{{ url('OfficeFiles') }}">
                    <i class="fas fa-file fa-lg" style="font-size: 30px;"></i>
                    <span> رفع المستندات </span>
                </a>
            </li>
            <li class="header"> التقارير</li>
            <li>
                <a href="{{ url('ProjectsReports') }}">
                    <i class="fab fa-pushed fa-lg 2x" style="font-size: 30px;"></i>
                    <span> تقارير المشاريع</span>
                </a>
            </li>
            <li>
                <a href="{{ url('TasksReports') }}">
                    <i class="fab fa-stack-exchange fa-lg 2x" style="font-size: 30px;"></i>
                    <span> تقارير المهام</span>
                </a>
            </li>
            <li>
                <a href="{{ url('EngReports') }}">
                    <i class="fab fa-searchengin fa-lg 2x" style="font-size: 30px;"></i>
                    <span> تقارير المهندسين</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
