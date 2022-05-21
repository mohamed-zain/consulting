<?php
if (Auth::user()->Level == 1){
    $ex = 'index';
}elseif(Auth::user()->email == 'support@ko-design.ae'){
    $ex = 'EMP.layout' ;
}else{
    $access = DB::table('user_groups')
        ->where('UID',auth()->user()->id)
        ->where('Sys','EngineeringManagement')
        ->first();
    $access2 = DB::table('user_groups')
        ->where('UID',auth()->user()->id)
        ->where('Sys','ActivateAccounts')
        ->first();
    //$arr = $access->toArray();
    //dd($access);
    if ($access->accessH == 1){
        $ex = 'ProjectsManager.layout' ;
    }elseif($access2->accessH == 1){
        $ex = 'ActivateAccount.layout' ;
    }else{
        $ex = '';
    }

}
?>


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

                  <th>باقة المشروع</th>
                  <th>اسم العميل</th>
                  <th>رقم الملف</th>
                  <th> متطلبات التصميم </th>
                  <th>  تعميد المعماري </th>
                  <th> رقم البينار</th>
                  <th> المبلغ المدفوع</th>
                  <th>عرض</th>

                </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mmmmmm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                      $DR = DB::table('out_design_required')->where('fileNumber',$mmmmmm->number)->first();
                      $aa = DB::table('documents')
                          ->where('projectID',$mmmmmm->number)
                          ->where('reject_accept',1)
                          ->where('mission','E0')
                          ->first();
                      ?>
                <tr>
                 
                  <td><?php echo e($mmmmmm->name); ?></td>
                  <td><a href="<?php echo e(url('ShowProject')); ?>/<?php echo e($mmmmmm->first_name); ?>"><?php echo e($mmmmmm->last_name); ?></a></td>
                  <td><?php echo e($mmmmmm->FileCode); ?></td>
                    <td>
                        <?php if(isset($DR)): ?>
                            <strong class="text-green"><i class="far fa-check-circle"></i></strong>
                        <?php else: ?>
                            <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(isset($aa)): ?>
                            <strong class="text-green"><i class="far fa-check-circle"></i></strong>
                        <?php else: ?>
                            <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                        <?php endif; ?>
                    </td>
                  
                    <td><span class="badge bg-red "><?php echo e($mmmmmm->number); ?></span></td>
                    <td><span class=" "><?php echo e(number_format($mmmmmm->SOA)); ?></span></td>
                 
                  <td><a href="<?php echo e(url('ProProduction')); ?>/<?php echo e($mmmmmm->number); ?>"><i class="fa  fa-eye btn btn-info"></i></a></td>
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

<?php echo $__env->make($ex, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/skyapp/resources/views/projects/index2.blade.php ENDPATH**/ ?>