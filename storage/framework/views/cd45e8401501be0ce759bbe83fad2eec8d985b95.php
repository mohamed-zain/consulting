 
<?php $__env->startSection('content'); ?>
 
  <div class="col-md-12">
          <h3>
            المستخدمين
            <small>سجل النشاطات</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="<?php echo e(url('UsersTasks')); ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="<?php echo e(url('UsersTasks')); ?>"><i class="fa fa-folder-open"></i> تحركات المستخدمين في النظام</a></li>
          </ol>
  </div>
    <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">كل الانشطة الموجوده</h3>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>الرقم</th>
                  <th>الحدث</th>
                  <th>الرابط</th>
                  <th>الطلب</th>
                  <th>عنوان الانترنت</th>
                  <th>معلومات المتصفح</th>
                  <th>اسم المستخدم</th>
                  <th>التاريخ</th>
                </tr>
                </thead>
                <tbody>
                  <?php if($logs->count()): ?>
                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e(++$key); ?></td>
                      <td><?php echo e($log->subject); ?></td>
                      <td class="text-success"><?php echo e($log->url); ?></td>
                      <td><label class="label label-info"><?php echo e($log->method); ?></label></td>
                      <td class="text-warning"><?php echo e($log->ip); ?></td>
                      <td class="text-danger"><?php echo e($log->agent); ?></td>
                      <td><?php echo e($log->name); ?></td>
                      <td><?php echo e($log->Date); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </tbody>
              </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">

            </div>
          </div>
          <!-- /. box -->
        </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/Users/log.blade.php ENDPATH**/ ?>