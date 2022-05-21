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


<div class="">
  <section class="content-header">
        <div class="">
          <h3>
            لوحة التحكم
            <small>المشاريع المجمدة</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">ادارة المشاريع</li>
            <li class="active">قائمة المشاريع المجمدة</li>
          </ol>
          </div>
        </section>
</div>

<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">قائمة المشاريع التي تم تجميدها</h3>

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
                  <th>تاريخ تفعيل الملف </th>
                    <th> مده الانتظار</th>
                  <th> رقم البينار</th>
                  <th> رقم الهاتف</th>
                  <th>  البريد الإلكتروني</th>
                    <th>خيارات</th>
                  <th>عرض</th>
                </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mmmmmm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                      $exx = \App\Models\Tasks::where('Bennar_Code',$mmmmmm->number)->first();
                      $sha = DB::table('Schedule_tasks')
                          ->where('Bennar_Code',$mmmmmm->number)
                          //->where('Scheduled',$single['number'])
                          ->first();
                      if (!isset($exx)){
                          $fdate = $mmmmmm->DRP;
                          $tdate = \Carbon\Carbon::today();
                          $datetime1 = new DateTime($fdate);
                          $datetime2 = new DateTime($tdate);
                          $interval = $datetime1->diff($datetime2);
                          $days = $interval->format('%a');
                      }

                      ?>
                      <?php if(!isset($exx)): ?>
                <tr>
                  

                  <td><?php echo e($mmmmmm->name); ?></td>
                  <td><a href="<?php echo e(url('ShowProject')); ?>/<?php echo e($mmmmmm->first_name); ?>"><?php echo e($mmmmmm->last_name); ?></a></td>
                  <td><?php echo e($mmmmmm->FileCode); ?></td>
                  <td><?php echo e($mmmmmm->DRP); ?></td>
                    <td class="<?php if($days > 10 && $days <= 40): ?> text-green <?php elseif($days > 40 && $days < 100): ?> text-blue <?php elseif($days > 100 ): ?> text-danger <?php endif; ?>"><?php echo e($days); ?> يوم </td>
                    <td><span class="badge bg-red "><?php echo e($mmmmmm->number); ?></span></td>
                  <td style="direction: ltr"><?php echo e($mmmmmm->phone); ?></td>
                  <td> <a><?php echo e($mmmmmm->email); ?></a> </td>

                  <td>
                      <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> خيارات
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              <?php if($mmmmmm->EngID == null): ?>
                                  <?php if(isset($sha)): ?>
                                      <li> <a class="text-green " href="#" >مجدولة لتاريخ  <?php echo e($sha->assign_date); ?></a></li>
                                  <?php else: ?>
                                      <li> <a class="text-blue" href="#"  data-toggle="modal" data-target="#jobCard<?php echo e($mmmmmm->number); ?>">فتح JobCard</a></li>
                                  <?php endif; ?>
                              <?php else: ?>
                                  <?php $uer = DB::table('users')->where('id',$mmmmmm->EngID)->first() ?>
                                      <li><a class="text-red" href="#" >مسند للمهندس <?php echo e($uer->name); ?></a></li>

                              <?php endif; ?>

                          </ul>
                      </div>

                  </td>
                    <td><a href="<?php echo e(url('ProProduction')); ?>/<?php echo e($mmmmmm->number); ?>"><i class="fa  fa-eye btn btn-info"></i></a></td>
                </tr>
                <div class="modal fade" id="jobCard<?php echo e($mmmmmm->number); ?>" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">بدء العمل علي المخططات الهندسية</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="<?php echo e(route('OpenJobCard')); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>


                                            <label for="BranchID" class="control-label"> أختر المهندس</label>
                                            <input type="hidden" name="Bennar_Code" value="<?php echo e($mmmmmm->number); ?>">
                                            <?php

                                            $Services = App\Models\ProjectServices::where('Bennar_Code',$mmmmmm->number)->first();
                                            ?>

                                            <input type="hidden" name="Mission" value="<?php echo e($Services->ServiceCode); ?>">
                                            <div class="form-inline">
                                                <select name="EmpID" class="form-control select2" id="EmpID"   style="margin-bottom: 9px; width: 80%" required>
                                                    <?php $__currentLoopData = App\Models\User::where('roll','=','AdmissionEmp')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($ser->id); ?>"><?php echo e($ser->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <br>
                                            <div id="shadu" style="">
                                                <label>تاريخ فتح بطاقة العمل للمهندس:</label>
                                                <div class="input-group date">

                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="date" class="form-control pull-right" name="assign_date" required>
                                                </div>
                                            </div>

                                            <br>
                                            <label>تاريخ تسليم المهمة:</label>
                                            <div class="input-group date">

                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="date" class="form-control pull-right" name="Deadline" required>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-success">إرسال</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

                      <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
              </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make($ex, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/skyapp/resources/views/projects/FrozenProjects.blade.php ENDPATH**/ ?>