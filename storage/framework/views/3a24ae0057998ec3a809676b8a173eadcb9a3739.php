
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo e(url('index')); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>K</b>O</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"> <img src="<?php echo e(asset('dist/img/koyellow.png')); ?>" class="" alt="User Image" style="height: 30px;"></span>
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
              <?php if(Auth::user()->Level == 2): ?>

              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>

                  <span class="label label-warning">000</span>
                </a>
                <ul class="dropdown-menu">

                  <li class="header">تنبيهات من ادارة خير عون</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                 
                  </li>
                  <li class="footer"><a href="<?php echo e(url('AllTasks')); ?>">مشاهدة كل المهام</a></li>
                </ul>
              </li>
              <?php endif; ?>
              <li>
                <a href="<?php echo e(url('Dispatcher')); ?>" >تبديل لإدارة أخرى</a>
              </li>
              <li>
                <a href="#" data-toggle="control-sidebar">  الاعدادات</a>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo e(asset('dist/img/logo.png')); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs">
                    <?php if(Auth::check()): ?>
                  <?php echo e(Auth::user()->name); ?>

                <?php endif; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php
             $dtt = DB::table('emplyees')->select('Attached as at')->where('id','=',Auth::user()->EmpiD)->get();
                    ?>
                    <?php if(isset($dt)): ?>
                    <img src="<?php echo e($dtt->dt); ?>" class="img-circle" alt="User Image">
                    <?php else: ?>
                    <img src="<?php echo e(asset('dist/img/logo.png')); ?>" class="img-circle" alt="User Image">

                    <?php endif; ?>
                    <p style="color: #e39548;">
                     <?php if(Auth::check()): ?>
                  <?php echo e(Auth::user()->name); ?>

                <?php endif; ?>
                    </p>
                  </li>

                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo e(url('/UpdateProfile')); ?>" class="btn btn-default btn-flat">الملف الشخصي</a>
                    </div>
                    <div class="pull-left">
                        <form action="<?php echo e(url('logout')); ?>" method="post">
                            <?php echo csrf_field(); ?>
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
<?php /**PATH /Applications/MAMP/htdocs/skyapp/resources/views/header.blade.php ENDPATH**/ ?>