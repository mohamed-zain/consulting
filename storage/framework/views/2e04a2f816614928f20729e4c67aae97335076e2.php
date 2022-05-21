<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="<?php echo e(asset('dist/img/logo.png')); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" style="">
                <p> <?php if(Auth::check()): ?>
                        <?php echo e(Auth::user()->name); ?>

                    <?php endif; ?></p>
                <a href="#">المدير</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">قائمة التحكم</li>
            <li><a href="<?php echo e(url('MainPort')); ?>"><i class="fa fa-tachometer-alt  fa-lg" style="font-size: 30px;"></i> <span>اللوحة الرئيسية</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder-open fa-lg 2x" style="font-size: 30px;"></i> <span>ادارة المشاريع</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                   
                    <li>
                        <a href="<?php echo e(url('/Projects')); ?>" id="" name="projectsList">
                            <i class="fa fa-list-alt  fa-lg"></i>
                            <span>جميع المشاريع</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('WaitingProjects')); ?>" id="" name="projectsList">
                            <i class="fa fa-praying-hands  fa-lg"></i>
                            <span>قائمة الانتظار</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('ArchiveProjects')); ?>" id="" name="projectsList">
                            <i class="fa fa-archive  fa-lg"></i>
                            <span> المشاريع المؤرشفة</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('FrozenProjects')); ?>" id="" name="projectsList">
                            <i class="fa fa-ice-cream  fa-lg"></i>
                            <span> المشاريع المجمدة</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" id=""  data-toggle="modal" data-target="#PStages">
                            <i class="fa fa-search  fa-lg"></i>
                            <span> البحث في المشاريع </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('EmployeesPerformance')); ?>" id="">
                            <i class="fa fa-chart-area  fa-lg"></i>
                            <span> متابعة اداء الموظفين </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('projects_progress')); ?>" id="">
                            <i class="fa fa-prescription  fa-lg"></i>
                            <span> إنجاز المشاريع </span>
                        </a>
                    </li>

                </ul>
            </li>
            

      
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users fa-lg" style="font-size: 30px;"></i> <span>الشؤون الادارية</span>
                    <i class="fa fa-angle-left pull-right fa-lg" ></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                    <li><a href="<?php echo e(url('Employee')); ?>" id=""><i class="fa fa-shield "></i> <span>سجل الموظفين</span></a>
                    </li>
                    <li><a href="<?php echo e(url('Attendance')); ?>" ><i class="fa fa-shield "></i> <span>سجل الحضور والغياب</span></a>
                    </li>
                    

                </ul>
            </li>
            





            <li>
                <a href="<?php echo e(url('OfficeFiles')); ?>" id="Documents" name="ex">
                    <i class="fa fa-journal-whills fa-lg " style="font-size: 30px;"></i>
                    <span>ملفات المشاريع</span>
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
                        <a href="<?php echo e(url('packages')); ?>" id="Documents" name="ex">
                            <i class="fa fa-shield fa-lg " style=""></i>
                            <span>قائمة الباقات</span></a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('/Services')); ?>" id="" name="projectsList">
                            <i class="fa fa-shield  fa-lg"></i>
                            <span>خدمات الباقات </span>
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
                        <a href="<?php echo e(url('ProjectsReports')); ?>">
                            <i class="fas fa-align-center "></i>
                            <span> تقارير المشاريع</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('TasksReports')); ?>">
                            <i class="fab fa-audible "></i>
                            <span> تقارير المهام</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('EngReports')); ?>">
                            <i class="far fa-address-book "></i>
                            <span> تقارير المهندسين</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-cog fa-lg" style="font-size: 30px;"></i> <span>المستخدمين</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                    <li><a href="<?php echo e(url('UsersPrivileges')); ?>"><i class="fa fa-shield "></i> <span>قائمة المستخدمين</span></a>
                    </li>
                    <li><a href="<?php echo e(url('usersLog')); ?>" id="" name="form" id="prolist"><i class="fa fa-shield "></i>
                            <span>سجل النشاطات</span></a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs" style="font-size: 30px;"></i> <span>الاعدادات</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="margin-right: 20px;">
                    <li><a href="<?php echo e(url('MainSetting')); ?>" name="form" id="prolist"><i class="fa fa-shield "></i> <span>البيانات الاساسية</span></a>
                    </li>
                    <li><a href="<?php echo e(url('SystemInfo')); ?>" name="form" id="prolist"><i class="fa fa-shield "></i> <span>اعدادات النظام</span></a>
                    </li>


                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/layouts/aside.blade.php ENDPATH**/ ?>