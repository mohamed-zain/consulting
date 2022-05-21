<?php $__env->startSection('content'); ?>
    <?php if(session()->has('logout')): ?>
        <script>
            swal("عفوا!", "<?php echo e(session()->get('logout')); ?>", "error");
        </script>
        <?php echo e(session()->forget('message')); ?>

    <?php endif; ?>
    <div class="login-box">
        <div class="login-logo">
        <img src="<?php echo e(asset('logo20221.png')); ?>" class="user-image " alt="User Image" style="width: 150px;height: 150px;border-radius: 22px;">
      </div><!-- /.login-logo -->
      <div class="login-logo">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">قم بكتابة البريد الالكتروني وكلمة المرور</p>
        <form role="form" method="POST" action="<?php echo e(route('login')); ?>">
             <?php echo e(csrf_field()); ?>

            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
             <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="البريد الالكتروني" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
              <?php if($errors->has('email')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('email')); ?></strong>
                  </span>
              <?php endif; ?>
            </div>
               <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="كلمة المرور" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
           <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
            </div>
          <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-block btn-social btn-facebook btn-flat" onclick=''>
                    تسجيل الدخول
                </button>
                <div class="social-auth-links text-right">
                    <a href="<?php echo e(url('forgot-password')); ?>" class="btn btn-block btn-social btn-google btn-flat"> هل نسيت كلمة المرور</a>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">

            </div><!-- /.col -->

          </div>
        </form>        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/auth/login.blade.php ENDPATH**/ ?>