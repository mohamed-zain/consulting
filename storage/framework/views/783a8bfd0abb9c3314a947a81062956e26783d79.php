<?php $__env->startSection('content'); ?>

   

    <!-- Main content -->
    <section class="content">
      <div class="error-page" style="margin-top: 30px">
        <h1 class="headline text-yellow"> 404</h1>

        <div class="error-content">
          <h3><i class="fa fa-warning fa-2x text-yellow"></i> عفوا ... الصفحة التي طلبتها غير موجوده</h3>

          <p>
           <a href="<?php echo e(url('index')); ?>">اضغط هنا للرجوع للرئيسية</a> 
          </p>

         
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/cons/resources/views/errors/404.blade.php ENDPATH**/ ?>