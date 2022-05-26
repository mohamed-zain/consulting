<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{ asset('logo20222.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" style="">
                <p> @if(Auth::check())
                        {{ Auth::user()->name }}
                    @endif</p>
                <a href="#">مدير النظام</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">قائمة التحكم</li>
            <li>
                <a href="{{url('ConsultingDashboard')}}">
                    <i class="fa fa-tachometer-alt  fa-lg" style="font-size: 30px;"></i>
                    <span>اللوحة الرئيسية</span>
                </a>
            </li>
            <li class="header">تحكم المشاريع</li>
            <li>
                <a href="{{url('Projects')}}">
                    <i class="fa fa-list-alt  fa-lg" style="font-size: 30px;"></i>
                    <span>قائمة المشاريع</span>
                </a>
            </li>
            <li>
                <a href="{{url('OfficeDocs')}}">
                    <i class="fa fa-folder-open  fa-lg" style="font-size: 30px;"></i>
                    <span>ملفات المشاريع</span>
                </a>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#PStages">
                    <i class="fa fa-search  fa-lg" style="font-size: 30px;"></i>
                    <span>البحث في المشاريع </span>
                </a>
            </li>
            <li class="header">التقارير</li>
            <li>
                <a href="{{url('#')}}">
                    <i class="fa fa-bars  fa-lg" style="font-size: 30px;"></i>
                    <span>تقارير المشاريع</span>
                </a>
            </li>
            <li class="header">المستخدمين</li>
            <li>
                <a href="{{url('Users')}}">
                    <i class="fa fa-users-cog  fa-lg" style="font-size: 30px;"></i>
                    <span>قائمة المستخدمين </span>
                </a>
            </li>
            <li>
                <a href="{{url('usersLog')}}">
                    <i class="fa fa-user-shield  fa-lg" style="font-size: 30px;"></i>
                    <span>سجل النشاطات </span>
                </a>
            </li>
            <li class="header">الاعدادات</li>
            <li>
                <a href="{{url('MainPort')}}">
                    <i class="fa fa-cogs  fa-lg" style="font-size: 30px;"></i>
                    <span> البيانات الاساسية </span>
                </a>
            </li>
            <li>
                <a href="{{url('MainPort')}}">
                    <i class="fa fa-synagogue  fa-lg" style="font-size: 30px;"></i>
                    <span> اعدادات النظام </span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
