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
        .info-box{
            border: 1px solid #3a9fda;
            border-radius: 15px;
            padding: 20px;
        }

        element.style {
        }
        .info-box-content {
            padding: 0px 0px;
            margin-left: 0px;
        }
    </style>

    <div class="">
        <section class="content-header">
            <div class="">
                <h3>
                    لوحة التحكم
                    <small>ملخص المشاريع</small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                    <li class="active">ادارة المشاريع</li>
                    <li class="active">ملخص المشاريع</li>
                </ol>
            </div>
        </section>
    </div>
    <div class="row">
        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="info-box-content">
                    <span class="info-box-text">كل المشاريع</span>
                    <span class="info-box-number"> <?php echo e($pro_aproveCount); ?> <small>مشروع</small></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="info-box-content">
                    <span class="info-box-text"> مخلصة بالكامل</span>
                    <span class="info-box-number"> <?php echo e($count1); ?> <small>مشروع</small></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="info-box-content">
                    <span class="info-box-text">مشاريع تحت التنفيذ</span>
                    <span class="info-box-number"> <?php echo e(($pro_aproveCount - $count1) - $notBeg); ?> <small>مشروع</small></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        
        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="info-box-content">
                    <span class="info-box-text">في انتظار التعميد</span>
                    <span class="info-box-number">  <?php echo e($waiting); ?> <small>مشروع</small></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="info-box">
                <div class="info-box-content">
                    <span class="info-box-text">لم يتم البدء فيها</span>
                    <span class="info-box-number"> <?php echo e($notBeg); ?> <small>مشروع</small></span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li  class="active"><a href="#tab_2" data-toggle="tab">انجاز المشاريع</a></li>
                    <li><a href="#tab_1" data-toggle="tab">المخططات المعتمدة</a></li>
                    <li><a href="#tab_3" data-toggle="tab">المخططات الغير معتمدة</a></li>
                    <li><a href="#tab_4" data-toggle="tab">في انتظار التعميد</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane " id="tab_1">
                        <table id="example4" class="table table-bordered table-striped table-responsive example" style="font-size: 14px">
                            <thead>
                            <tr>

                                <th> االحالة</th>
                                <th>االمهندس </th>
                                <th>المشروع </th>
                                <th> الملف </th>
                                <th> تم رفعة في </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $pro_aprove = \App\Models\ActivateFile::join('documents','documents.projectID','=','activate_files.Bennar')
                                ->select('documents.*','activate_files.*','users.*',DB::raw('documents.created_at as DAT'))
                                ->join('users','users.id','=','documents.Usr_id')
                                ->where('documents.reject_accept','2')->get();
                            ?>
                            <?php $__currentLoopData = $pro_aprove; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>تم اعتماد   <?php echo e($Single->DocName); ?> </td>
                                    <td><?php echo e($Single->name); ?></td>
                                    <td><?php echo e($Single->FileCode); ?></td>
                                    <td><a href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($Single->Docs); ?>" target="_blank">عرض الملف</a></td>
                                    <td> <?php echo e(date('F d, Y', strtotime($Single->DAT))); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane active" id="tab_2">
                        <table id="example1" class="table table-bordered table-striped table-responsive example">
                            <thead>
                            <tr>
                                <th>العميل</th>
                                <th>البينار</th>
                                <th>الجوال</th>
                                <th> رمز المشروع</th>
                                <th>E0 </th>
                                <th>E1 </th>
                                <th>E2 </th>
                                <th>E3 </th>
                                <th>E4 </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $pro_aprove = \App\Models\ActivateFile::where('Status','Approved')->get();
                            //->join('users','users.id','=','documents.Usr_id')->get();
                            //->where('documents.reject_accept','1')->get();
                            // $users = \App\Models\User::where('roll','AdmissionEmp')->get()
                            ?>
                            <?php $__currentLoopData = $pro_aprove; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $ps0 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E0')->first();
                                $ps1 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E1')->first();
                                $ps2 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E2')->first();
                                $ps3 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E3')->first();
                                $ps4 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E4')->first();

                                $eng0 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E0')->first();
                                $eng1 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E1')->first();
                                $eng2 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E2')->first();
                                $eng3 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E3')->first();
                                $eng4 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E4')->first();
                                //dd($eng0->EmpID);
                                ?>
                                <tr>
                                    <td><?php echo e($Single->Name); ?></td>
                                    <td><?php echo e($Single->Bennar); ?></td>
                                    <td style="direction: initial"><span><?php echo e($Single->Phone); ?></span></td>
                                    <td><a href="<?php echo e(url('ProProduction')); ?>/<?php echo e($Single->Bennar); ?>"><?php echo e($Single->FileCode); ?></a></td>
                                    <td>
                                        <?php if($ps0->status == 'yes'): ?>
                                            <small class="label label-success"><i class="fa fa-fw fa-check"></i> </small>
                                        <?php else: ?>
                                            <small class="label label-danger"><i class="fa fa-fw fa-close"></i> </small>
                                        <?php endif; ?>
                                        <br>
                                        <br>
                                        <small class="" style="font-size: 70%">
                                            <?php if(empty($eng0)): ?>
                                                none
                                            <?php else: ?>
                                                <?php $na0 = \App\Models\User::where('id',$eng0->EmpID)->first() ?>

                                                <?php echo e($na0->name); ?>

                                            <?php endif; ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?php if($ps1->status == 'yes'): ?>
                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                        <?php else: ?>
                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                        <?php endif; ?>
                                        <br>
                                        <br>
                                        <small class="" style="font-size: 70%">
                                            <?php if(empty($eng1)): ?>
                                                none
                                            <?php else: ?>
                                                <?php $na1 = \App\Models\User::where('id',$eng1->EmpID)->first() ?>

                                                <?php echo e($na1->name); ?>

                                            <?php endif; ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?php if($ps2->status == 'yes'): ?>
                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                        <?php else: ?>
                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                        <?php endif; ?>
                                        <br>
                                        <br>
                                        <small class="" style="font-size: 70%">
                                            <?php if(empty($eng2)): ?>
                                                none
                                            <?php else: ?>
                                                <?php $na2 = \App\Models\User::where('id',$eng2->EmpID)->first() ?>

                                                <?php echo e($na2->name); ?>

                                            <?php endif; ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?php if($ps3->status == 'yes'): ?>
                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                        <?php else: ?>
                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                        <?php endif; ?>
                                        <br>
                                        <br>
                                        <small class="" style="font-size: 70%">
                                            <?php if(empty($eng3)): ?>
                                                none
                                            <?php else: ?>
                                                <?php $na3 = \App\Models\User::where('id',$eng3->EmpID)->first() ?>

                                                <?php echo e($na3->name); ?>

                                            <?php endif; ?>
                                        </small>
                                    </td>
                                    <td>
                                        <?php if($ps4->status == 'yes'): ?>
                                            <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                        <?php else: ?>
                                            <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                        <?php endif; ?>
                                        <br>
                                        <br>
                                        <small class="" style="font-size: 70%">
                                            <?php if(empty($eng4)): ?>
                                                none
                                            <?php else: ?>
                                                <?php $na4 = \App\Models\User::where('id',$eng4->EmpID)->first() ?>

                                                <?php echo e($na4->name); ?>

                                            <?php endif; ?>
                                        </small>
                                    </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                        <?php
                        $reject = \App\Models\Documents::join('users','users.id','=','documents.Usr_id')
                            ->join('activate_files','activate_files.Bennar','=','documents.projectID')
                            ->where('documents.mission','!=',null)
                            ->where('documents.reject_accept','1')
                            ->select('documents.*','users.*','activate_files.*',DB::raw('documents.created_at as Dac'))
                            ->orderBy('documents.id','asc')
                            ->get()
                        ?>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">المخططات الغير معتمدة</h3>
                                <div class="box-tools pull-right">
                                    
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <div class="table-responsive mailbox-messages">
                                    <table class="table table-hover table-striped example" style="font-size: 14px" id="example6">
                                        <tbody>
                                        <?php $__currentLoopData = $reject; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                                                <td class="mailbox-name"><a href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($item->Docs); ?>" target="_blank"><?php echo e($item->FileCode); ?></a></td>
                                                <td class="mailbox-subject"><b><?php echo e($item->name); ?></b> - <span data-toggle="tooltip" data-placement="top" title="<?php echo e($item->reject_reason); ?>"><?php echo e(Str::limit($item->reject_reason, 40)); ?></span> </td>
                                                <td class="mailbox-attachment"><a href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($item->Docs); ?>" target="_blank"><i class="fa fa-paperclip"></i></a></td>
                                                <td class="mailbox-date"><?php echo e(date('F d, Y', strtotime($item->Dac))); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.mail-box-messages -->
                            </div><!-- /.box-body -->
                        </div>
                        

                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_4">
                        <?php
                        $renone = \App\Models\Documents::join('users','users.id','=','documents.Usr_id')
                            ->join('activate_files','activate_files.Bennar','=','documents.projectID')
                            ->where('documents.mission','=','E0')
                            ->where('documents.reject_accept','0')
                            ->select('users.*','activate_files.*','documents.*',DB::raw('documents.created_at as DCA, documents.id as DID'))
                            ->orderBy('documents.created_at','desc')
                            ->get()


                        ?>
                        <table id="example5" class="table table-bordered table-striped table-responsive " style="font-size: 12px !important;">
                            <thead>
                            <tr>
                                <th>المشروع</th>
                                <th> المهندس</th>
                                <th>المهمة </th>
                                <th>اسم الملف </th>
                                <th>الملف </th>
                                <th> الحالة </th>
                                <th>تاريخ الرفع </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $renone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $br = \App\Models\Documents::where('projectID',$item->projectID)
                                    ->where('reject_accept','2')
                                    ->where('cat',1)
                                    ->where('mission','=','E0')
                                    ->first();
                                ?>
                                <?php if(isset($br->id)): ?>

                                <?php else: ?>
                                    <tr>
                                        <td><?php echo e($item->FileCode); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->mission); ?></td>
                                        <td><?php echo e($item->DocName); ?></td>
                                        <td><a href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($item->Docs); ?>" target="_blank">عرض</a> </td>
                                        <td><span class="label label-warning">في انتظار التعميد</span></td>
                                        <td><?php echo e(Carbon\Carbon::parse($item->DCA)->diffForHumans()); ?></td>
                                    </tr>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make($ex, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/skyapp/resources/views/projects/summary.blade.php ENDPATH**/ ?>