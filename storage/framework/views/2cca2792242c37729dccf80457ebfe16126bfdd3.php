<?php $__env->startSection('content'); ?>
<style>
    th, td {
        text-align: center;
    }
</style>

<div class="">
  <section class="content-header">
        <div class="">
          <h3>
            لوحة التحكم
            <small>المشاريع</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">ادارة المشاريع</li>
            <li class="active">المشاريع</li>
          </ol>
          </div>
        </section>
</div>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">قائمة المشاريع</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <div class="" style="margin-bottom: 20px">
            </div>
            <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>رقم الملف</th>
                    <th> رقم البينار</th>
                    <th>المدينة</th>
                    <th>حالة المشروع</th>
                    <th>خيارات</th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><a href="<?php echo e(url('ProjectDetails')); ?>/<?php echo e($item->Bennar); ?>"><?php echo e($item->FileCode); ?></a></td>
                        <td><a href="<?php echo e(url('ProjectDetails')); ?>/<?php echo e($item->Bennar); ?>"><?php echo e($item->Bennar); ?></a></td>
                        <td><?php echo e($item->City); ?></td>
                        <td>
                            <?php if( $item->Status == '1'): ?>
                                <span class="badge bg-green"><?php echo e($item->StatusName); ?></span>
                            <?php elseif($item->Status == '2'): ?>
                                <span class="badge bg-yellow "> <?php echo e($item->StatusName); ?></span>
                            <?php elseif($item->Status == '3'): ?>
                                <span class="badge bg-purple "> <?php echo e($item->StatusName); ?></span>
                            <?php elseif($item->Status == '4'): ?>
                                <span class="badge bg-blue "> <?php echo e($item->StatusName); ?></span>
                            <?php elseif($item->Status == '5'): ?>
                                <span class="badge bg-pink "> <?php echo e($item->StatusName); ?></span>
                            <?php elseif($item->Status == '6'): ?>
                                <span class="badge bg-navy "> <?php echo e($item->StatusName); ?></span>
                            <?php elseif($item->Status == '7'): ?>
                                <span class="badge bg-red "> <?php echo e($item->StatusName); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> خيارات
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li> <a class="text-green " href="<?php echo e(url('ProjectDetails')); ?>/<?php echo e($item->Bennar); ?>" target="_blank"> تفاصيل المشروع </a></li>
                                    <li> <a class="text-blue" href="#"  data-toggle="modal" data-target="#jobCard"> تغيير حالة المشروع</a></li>
                                    <li><a class="text-red" href="#" > ملفات المشروع </a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/projects/index2.blade.php ENDPATH**/ ?>