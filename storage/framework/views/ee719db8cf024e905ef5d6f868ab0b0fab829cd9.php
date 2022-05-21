<?php
if (Auth::user()->Level == 1){
    $ex = 'index';
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

        .users-list>li {
            width: 20% !important;
            float: right;
        }
        /*************************************/
        .tableone{
            width: 100%;
            /* align-content: center; */
            text-align: center;
            direction: ltr;
            font-family: 'STC Regular';
        }
        .tableone , .td, .th {
            border: 2px solid #595959;
            border-collapse: collapse;

        }
        .tableone ,.td, .th {
            padding: 10px;
            height: 25px;
        }
        .ta2 {
            border: solid 1px #FFF;
            width: 100%;
            /* align-content: center; */
            text-align: center;
            direction: ltr;
            font-family: 'STC Regular';
        }
        .ta2 {
            border: solid 1px #FFF;
            width: 100%;
            /* align-content: center; */
            text-align: center;
            direction: ltr;
            font-family: 'STC Regular';
        }

        .td2, .th {
            font-size: 2em;
            font-family: "STC Regular";
            border-collapse: collapse;

        }
        .td3 {
            font-size: 2em;
            font-family: "STC Regular";
            border-collapse: collapse;

        }
        .ta2 ,.td2, .th {
            padding: 10px;
            height: 25px;
        }
        .sercode{
            padding: 10px;
            background: #e39548;
            width: 100px ;
            -webkit-print-color-adjust: exact;

        }
        /**************************************8/
         */
        @media  print {
            .tableone{
                width: 100%;
                /* align-content: center; */
                text-align: center;
                direction: ltr;
                font-family: 'STC Regular';
            }
            .tableone , .td, .th {
                border: 2px solid #595959;
                border-collapse: collapse;

            }
            .tableone ,.td, .th {
                padding: 10px;
                height: 25px;
            }
            .ta2 {
                border: solid 1px #FFF;
                width: 100%;
                /* align-content: center; */
                text-align: center;
                direction: ltr;
                font-family: 'STC Regular';
            }
            .ta2 {
                border: solid 1px #FFF;
                width: 100%;
                /* align-content: center; */
                text-align: center;
                direction: ltr;
                font-family: 'STC Regular';
            }

            .td2, .th {
                font-size: 2em;
                font-family: "STC Regular";
                border-collapse: collapse;

            }
            .td3 {
                font-size: 2em;
                font-family: "STC Regular";
                border-collapse: collapse;

            }
            .ta2 ,.td2, .th {
                padding: 10px;
                height: 25px;
            }
            .sercode{
                padding: 10px;
                background: #e39548;
                width: 100px ;
                -webkit-print-color-adjust: exact !important;

            }
        }



        .stepwizard-step p {
            margin-top: 0px;
            color:#666;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }
        .stepwizard-step button[disabled] {
            /*opacity: 1 !important;
            filter: alpha(opacity=100) !important;*/
        }
        .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
            opacity:1 !important;
            color:#bbb;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content:" ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 50%;
        }
        .stp {
            border-radius: 50% !important;
            padding: 6px 2px !important;
        }
    </style>
   <div class="row">
  <section class="content-header">
        <div class="col-md-12">

            <h3>
                لوحة التحكم
                <small>المشاريع</small>
            </h3>
          <ol class="breadcrumb" >
            <li><a href="<?php echo e(url('MainPort')); ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="<?php echo e(url('Projects')); ?>"><i class="fa fa-folder-open"></i> نتائج بحث للمشروع  <?php echo e($Single->first_name); ?> <?php echo e($Single->last_name); ?> </a></li>
          </ol>
          </div>


        </section>
</div>

    <?php $Ser = \App\Models\ProjectServices::where('Bennar_Code',$Single->number)->get(); ?>
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> التعديل علي بيانات المشروع </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->

            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <a class="btn btn-app"  data-toggle="modal" data-target="#Modal3">
                    <i class="fa fa-exclamation-triangle" style="font-size: 55px;"></i> حالة المشروع
                </a>
                <a href="<?php echo e(url('ProServices')); ?>/<?php echo e($Single->number); ?>"  class="btn btn-app">
                    <i class="fa fa-tasks fa-2x" style="font-size: 55px;"></i> خدمات الباقة
                </a>
               
                <a href="#"  class="btn btn-app" data-toggle="modal" data-target="#Modal55">
                    <i class="fa fa-stream fa-2x" style="font-size: 55px;"></i>مرحلة المشروع
                </a>
                <a href="#"  class="btn btn-app" data-toggle="modal" data-target="#FilesPro">
                    <i class="fa fa-folder-open fa-2x" style="font-size: 55px;"></i>ملفات المشروع
                </a>

                <a href="#"  class="btn btn-app" data-toggle="modal" data-target="#chatProject">
                    <i class="fa fa-chalkboard-teacher fa-2x" style="font-size: 55px;"></i> دردشة في المشروع
                </a>


            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="modal fade" id="Modal55888" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">مهام الخدمات الهندسية</h4>
                </div>
                <div class="modal-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            <?php $__currentLoopData = $Ser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item45): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php if($item45->ServiceCode=='E0' or $item45->ServiceCode=='S0'): ?> active <?php endif; ?>"><a href="#<?php echo e($item45->ServiceCode); ?>" data-toggle="tab"><?php echo e($item45->ServiceCode); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                        <div class="tab-content">
                            <?php $__currentLoopData = $Ser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item45): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane <?php if($item45->ServiceCode=='E0' or $item45->ServiceCode=='S0'): ?> active <?php endif; ?>" id="<?php echo e($item45->ServiceCode); ?>">

                                    <?php $tts = \App\Models\Tasks::join('users','users.id','=','tasks.EmpID')->where('Bennar_Code',$Single->number)->where('Mission',$item45->ServiceCode)->first(); ?>
                                    <table id="" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                        <tr>
                                            <th>المهمة</th>
                                            <th>اسم المهندس المسندة له</th>
                                            <th>هل تم الاطلاع علي المهمة </th>
                                            <th>هل انجزت </th>
                                            <th>هل وافق عليها العميل </th>
                                            <th>تاريخ اسناد المهمة </th>
                                        </tr>
                                        </thead>
                                        <tbody id="comm">
                                        <?php if(isset($tts)): ?>
                                            <tr>

                                                <td><?php echo e($tts->Mission); ?></td>
                                                <td><?php echo e($tts->name); ?></td>
                                                <td>
                                                    <?php if($tts->TaskRead == 'yes'): ?>
                                                        <span class="label label-danger">تم الاطلاع المهمة</span>
                                                    <?php elseif($tts->TaskRead == 'no'): ?>
                                                        <span class="label label-warning">لم يتم الاطلاع</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($tts->TaskDone == 'yes'): ?>
                                                        <span class="label label-danger">تم انجاز المهمة</span>
                                                    <?php elseif($tts->TaskDone == 'no'): ?>
                                                        <span class="label label-warning">لم يتم الانجاز </span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($tts->TaskAccept == 'hold'): ?>
                                                        <span class="label label-danger">في الانتظار</span>
                                                    <?php elseif($tts->TaskAccept == 'accept'): ?>
                                                        <span class="label label-warning">تمت الموافقة </span>
                                                    <?php elseif($tts->TaskAccept == 'notaccept'): ?>
                                                        <span class="label label-warning">لم تتم الموافقة </span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($tts->created_at); ?></td>


                                            </tr>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6">no tasks fo now</td>
                                            </tr>
                                        <?php endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal55" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اعداد المرحلة الحالية للمشروع</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('UpdateStage')); ?>">
                        <input type="hidden" name="ProID" value="">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label">مرحلة المشروع الحالية</label>
                            <div class="col-sm-8">
                                <?php echo Form::select('Stage', \App\Models\ProjectsSteps::pluck('LevelName','LevelName'),null, ['class' => 'form-control select2','style' => 'width:90%']); ?>


                            </div>
                        </div>
                        <button id="registrationID" class="btn btn-success">حفظ</button>
                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal3" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اعداد الحالة الحالية للمشروع</h4><span style="color: red"></span>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('UpdateState')); ?>">
                        <input type="hidden" name="ProID" value="<?php echo e($Single->number); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="State" class="col-sm-4 control-label">حالة المشروع الحالية</label>
                            <div class="col-sm-8">
                                <?php echo Form::select('State',[
                                       'متوقف'=>'متوقف',
                                       'تحت التنفيذ'=>'تحت التنفيذ',
                                       'منتهي'=>'منتهي',
                                       'قيد التنفيذ'=>'قيد التنفيذ',
                                       ],null, ['class' => 'form-control  select2','style' => 'width:100%']); ?>

                            </div>
                        </div>
                        <button id="registrationID" class="btn btn-success">حفظ</button>
                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>



    <div class="col-md-6">
        <div class="box box-default" style="height: 207px ">
            <div class="box-header with-border">
                <h3 class="box-title"> مراحل التنفيذ </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->

            </div>
            <!-- /.box-header -->

            <div class="box-body" style="padding-top: 50px">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <?php $__currentLoopData = $Ser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$item78): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $tts44 = \App\Models\Tasks::where('Bennar_Code',$Single->number)->where('Mission',$item78->ServiceCode)->first(); ?>
                            <div class="stepwizard-step col-xs-1.5">
                                <a href="#step-1" type="button" class="<?php if(isset($tts44) && $tts44->TaskDone=='yes'): ?> btn btn-warning <?php elseif(isset($tts44) && $tts44->TaskDone=='no'): ?> btn btn-danger <?php else: ?> btn btn-default <?php endif; ?> btn-circle stp" ><?php if(isset($tts44) && $tts44->TaskDone=='yes'): ?> <i class="fa fa-check"></i> <?php else: ?> <?php echo e($key+1); ?> <?php endif; ?></a>
                                <p><small><?php echo e($item78->ServiceCode); ?></small></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>

            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>


    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">فريق عمل المشروع</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <ul class="users-list clearfix">
                    <?php  $tsk = App\Models\ProjectServices::where('Bennar_Code','=',$Single->number)->get(); ?>

                    <?php $__currentLoopData = $tsk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $eng = App\Models\Tasks::
                            where('tasks.Mission','=',$team->ServiceCode)
                            ->where('tasks.Bennar_Code','=',$Single->number)
                            ->join('users','users.id','=','tasks.EmpID')
                            ->first();
                        //dd($eng);
                        ?>
                        <li>
                            <img src="<?php echo e(asset('dist/architect.png')); ?>" alt="User Image">
                            <a class="users-list-name" href="#"><?php if(isset($eng)): ?> <small><?php echo e($eng->name); ?></small> <?php else: ?> <span style="color: red">لم يتم تحديده</span> <?php endif; ?></a>
                            <span class="users-list-date"><?php echo e($team->ServiceCode); ?></span>
                            <?php if($team->status == 'yes'): ?>
                                <span class="label label-success">تم الانجاز</span>
                            <?php else: ?>
                                <span class="label label-danger">لم يتم الانجاز</span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </ul><!-- /.users-list -->
            </div><!-- /.box-body -->
            

        </div>
    </div>
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title"> مراحل انجاز المشروع </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->

            </div>
            <!-- /.box-header -->

            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12 table-responsive" >
                        <div class="col-md-12">

                            <!-- Custom Tabs (Pulled to the right) -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs pull-right">
                                    <?php $__currentLoopData = $Ser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item45): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="<?php if($item45->ServiceCode=='E0' or $item45->ServiceCode=='S0'): ?> active <?php endif; ?>"><a href="#<?php echo e($item45->ServiceCode); ?>" data-toggle="tab"><?php echo e($item45->ServiceCode); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                                <div class="tab-content">
                                    <?php $__currentLoopData = $Ser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item45): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="tab-pane <?php if($item45->ServiceCode=='E0' or $item45->ServiceCode=='S0'): ?> active <?php endif; ?>" id="<?php echo e($item45->ServiceCode); ?>">
                                            <?php $tts = \App\Models\Tasks::join('users','users.id','=','tasks.EmpID')->where('Bennar_Code',$Single->number)->where('Mission',$item45->ServiceCode)->first(); ?>
                                            <table id="" class="table table-bordered table-striped table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>المهمة</th>
                                                    <th>اسم المهندس المسندة له</th>
                                                    <th>هل تم الاطلاع علي المهمة </th>
                                                    <th>هل انجزت </th>
                                                    <th>هل وافق عليها العميل </th>
                                                    <th>تاريخ اسناد المهمة </th>
                                                </tr>
                                                </thead>
                                                <tbody id="comm">
                                                <?php if(isset($tts)): ?>
                                                    <tr>

                                                        <td><?php echo e($tts->Mission); ?></td>
                                                        <td><?php echo e($tts->name); ?></td>
                                                        <td>
                                                            <?php if($tts->TaskRead == 'yes'): ?>
                                                                <span class="label label-danger">تم الاطلاع المهمة</span>
                                                            <?php elseif($tts->TaskRead == 'no'): ?>
                                                                <span class="label label-warning">لم يتم الاطلاع</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($tts->TaskDone == 'yes'): ?>
                                                                <span class="label label-danger">تم انجاز المهمة</span>
                                                            <?php elseif($tts->TaskDone == 'no'): ?>
                                                                <span class="label label-warning">لم يتم الانجاز </span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($tts->TaskAccept == 'hold'): ?>
                                                                <span class="label label-danger">في الانتظار</span>
                                                            <?php elseif($tts->TaskAccept == 'accept'): ?>
                                                                <span class="label label-warning">تمت الموافقة </span>
                                                            <?php elseif($tts->TaskAccept == 'notaccept'): ?>
                                                                <span class="label label-warning">لم تتم الموافقة </span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($tts->created_at); ?></td>


                                                    </tr>
                                                    <?php else: ?>
                                                <tr>
                                                    <td colspan="6">no tasks fo now</td>
                                                </tr>
                                                    <?php endif; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>


            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
   <div class="row">
       <div class="col-md-6">
           <div class="box box-default">
               <div class="box-header with-border">
                   <h3 class="box-title">بيانات المشروع</h3>

                   <div class="box-tools pull-right">
                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                       </button>
                   </div>
                   <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="row">
                       <div class="col-xs-12 table-responsive" >
                           <table class="table table-striped" >

                               <thead>
                               </thead>
                               <tbody>
                               <tr>
                                   <td>اسم العميل</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->first_name); ?> <?php echo e($Single->last_name); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> الباقة</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->name); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td>رقم الملف </td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->FileCode); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> رقم البينار</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->number); ?>

                                       </div>
                                   </td>

                               </tr>


                               <tr>
                                   <td>الهاتف </td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->phone); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td>  البريد</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->email); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td>تاريخ الاشتراك</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->date_created); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> رقم الواتساب</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->_billing_myfield16); ?>

                                       </div>
                                   </td>

                               </tr>
                               </tbody>

                           </table>
                       </div>
                       <!-- /.col -->
                   </div>
                   <div class="box-footer">
                   </div>

               </div>

               <!-- /.box-body -->
           </div>
           <!-- /.box -->
       </div>
       <div class="col-md-6">
           <div class="box box-default">
               <div class="box-header with-border">
                   <h3 class="box-title">بيانات المشروع</h3>

                   <div class="box-tools pull-right">
                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                       </button>
                   </div>
                   <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="row">
                       <div class="col-xs-12 table-responsive" >
                           <table class="table table-striped" >

                               <thead>
                               </thead>
                               <tbody>
                               <tr>
                                   <td> قيمة الاشتراك</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->total); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> العنوان</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->address_1); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td>مدينة العميل</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->city); ?>

                                       </div>
                                   </td>

                               </tr>

                               <tr>
                                   <td> المحافظة</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->state); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> الدولة</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->country); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> مرحلة المشروع الحالية</td>
                                   <td>
                                       <div class="col-sm-10">
                                           -------
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> كيف عرف عنا</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->_billing_myfield14); ?>

                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> اوقات الاتصال المفضلة</td>
                                   <td>
                                       <div class="col-sm-10">
                                           <?php echo e($Single->_billing_myfield15); ?>

                                       </div>
                                   </td>

                               </tr>
                               </tbody>
                           </table>
                       </div>
                       <!-- /.col -->
                   </div>

                   <div class="box-footer">
                   </div>

               </div>
               <!-- /.box-body -->
           </div>
           <!-- /.box -->
       </div>
   </div>
   <div class="row">
       <!-- /.col -->
       <div class="col-md-12">
           <section class="invoice">
               <!-- title row -->
               <div class="row">

                   <div class="col-lg-12 col-md-12 col-sm-12">

                   </div>

               </div>
               <!-- info row -->
               <div class="row invoice-info">
                   <div class="col-sm-12 invoice-col pull-right">

                   </div>

               </div>

               <!-- Table row -->
               <div class="col-xs-12">

                   <div class="">
                       <table class="tableone">
                           <tbody>
                           <tr>
                               <td class="td" colspan="12">
                                   <img src="<?php echo e(asset('img/koheader.png')); ?>"  class="stc pull-left" style="  width: 100%">
                               </td>
                           </tr>
                           <tr>
                               <td class="td" colspan="12"><strong>Activate The Account</strong></td>
                           </tr>
                           <tr style="background: #d3b5b5">
                               <td class="td" colspan="12">Client Info</td>
                           </tr>
                           <tr>
                               <td class="td" colspan="6" style="background: #ade1b8"><span>Amount Paid : <strong><?php echo e($Order->SOA); ?></strong></span></td>
                               <td class="td" colspan="2" style="background: #ffe8e8"><span>Date of receipt of payment : <strong><?php echo e($Order->DRP); ?></strong></span></td>
                               <td class="td" colspan="2" style="background: #ade1b8"><span>Bank : <strong><?php echo e($Order->Bank); ?></strong></span></td>
                               <td class="td" colspan="2" style="background: #ffe8e8"><span>RQS : <strong><?php echo e($Order->RQS); ?></strong></span></td>
                           </tr>
                           <tr>
                               <td class="td" style="background: #ffe8e8">#<?php echo e($Order->Bennar); ?></td>
                               <td class="td" colspan="3" style="background: #ffe8e8"><span>File code : <strong><?php echo e($Order->Bank); ?></strong></span></td>
                               <td class="td" colspan="4" style="background: #ade1b8"><span>Name : <strong><?php echo e($Order->Name); ?></strong></span></td>
                               <td class="td" colspan="2" style="background: #ffe8e8"><span>Country : <strong><?php echo e($Order->Country); ?></strong></span></td>
                               <td class="td" style="background: #ade1b8"><span>City : <strong><?php echo e($Order->City); ?></strong></span></td>
                               <td class="td" style="background: #ade1b8"><span>Port : <strong><?php echo e($Order->Port); ?></strong></span></td>
                           </tr>
                           <tr>
                               <td class="td" colspan="4" style="background: #ade1b8"><span>Phone : <strong><?php echo e($Order->Phone); ?></strong></span></td>
                               <td class="td" colspan="3" style="background: #ade1b8"><span>Email : <strong><?php echo e($Order->Email); ?></strong></span></td>
                               <td class="td" colspan="5" style="background: #ffe8e8"><span>Services : <strong>
                                        <?php $__currentLoopData = $Services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <?php echo e($item->ServiceCode); ?> -
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </strong></span></td>
                           </tr>
                           <tr>
                               <td class="td" colspan="12"></td>
                           </tr>
                           <tr>
                               <td class="td" colspan="12"><strong>Project financial details</strong></td>
                           </tr>
                           <tr>
                               <td class="td" colspan="4">Package Price :</td>
                               <td class="td"  colspan="3"><?php echo e(number_format($Order2->total)); ?> </td>
                               <td class="td"  colspan="5"><?php echo e(\App\Helpers\Mysql::makeNumber2Text($Order2->total)); ?> </td>

                           </tr>
                           <tr>
                               <td class="td" colspan="4">Amount Paid :</td>
                               <td class="td"  colspan="3"><?php echo e(number_format($Order->SOA)); ?> AED</td>
                               <td class="td"  colspan="5"><?php echo e(\App\Helpers\Mysql::makeNumber2Text($Order->SOA)); ?> </td>

                           </tr>
                           <tr>
                               <td class="td" colspan="4">Remaining amount :</td>
                               <td class="td"  colspan="3"><?php echo e(number_format($Order2->total - $Order->SOA)); ?></td>
                               <td class="td"  colspan="5"><?php echo e(\App\Helpers\Mysql::makeNumber2Text($Order2->total - $Order->SOA)); ?> </td>

                           </tr>



                           </tbody>
                       </table>


                   </div>
               </div>

               <!-- this row will not appear when printing -->
               <div class="row no-print">
                   <div class="col-xs-12" id="">
                       <br>

                   </div>
               </div>
           </section>

       </div>
       <!-- /.col -->
   </div>
   <div class="row">
       <div class="col-md-12">
           <div class="box box-default">
               <div class="box-header with-border">
                   <h3 class="box-title">ملفات المشروع  - المرفوعة من الادارة</h3>

                   <div class="box-tools pull-right">
                       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                       </button>
                   </div>
                   <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
               <?php $fil = \App\Models\Documents::where('projectID','=',$Order->Bennar)->get(); ?>
                   <div class="col-xs-12 table-responsive" >
                       <table id="example1" class="table table-bordered table-striped table-responsive">
                           <thead>
                           <tr>
                               <th>رقم المستند</th>
                               <th>اسم المستند</th>
                               <th>ملاحظات</th>
                               <th>عرض</th>
                               <th>التاريخ</th>
                               <th>حذف</th>


                           </tr>
                           </thead>
                           <tbody >
                           <?php $__currentLoopData = $fil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <tr>
                                   <td><?php echo e($Single->DocID); ?></td>
                                   <td><?php echo e($Single->DocName); ?></td>
                                   <td><?php echo e($Single->Docdetails); ?></td>

                                   <td><a href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($Single->Docs); ?>"><span class="label label-primary">عرض</span></a></td>
                                   <td><?php echo e(date('F d, Y', strtotime($Single->created_at))); ?></td>
                                   <td>
                                       <button id="<?php echo e($Single->id); ?>" class="label label-danger" data-id="<?php echo e($Single->id); ?>" data-token="<?php echo e(csrf_token()); ?>" onclick='
                                               swal({
                                               title: "هل انت متأكد?",
                                               text: "عند حذف هذه البيانات لا يمكنك استرجاعها مرة اخري!",
                                               type: "info",
                                               showCancelButton: true,
                                               closeOnConfirm: false,
                                               showLoaderOnConfirm: true,
                                               },
                                               function(){
                                               setTimeout(function(){
                                               var id = $("#<?php echo e($Single->id); ?>").data("id");
                                               var token = $("#<?php echo e($Single->id); ?>").data("token");
                                               $.ajax({
                                               type: "GET",
                                               url : "deleteDocuments/"+id,
                                               data : {
                                               "":id,
                                               "_method":"DELETE",
                                               "_token":token,
                                               },
                                               //dataType: "json",
                                               cache:false,

                                               success  : function(data) {
                                               swal("تهانينا!",data , "success");
                                               setTimeout(function() {
                                               var href = "<?php echo e(url('OfficeFiles')); ?>";
                                               window.location.href = href;
                                               },1000);
                                               },
                                               error: function(xhr, textStatus, thrownError){
                                               // console.log(thrownError);
                                               swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                               }

                                               });

                                               }, 1000);
                                               });
                                               '><span class="label label-danger">حذف</span></button>
                                   </td>
                               </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                           </tbody>
                       </table>
                   </div>
                   <div class="box-footer">
                   </div>

               </div>
               <!-- /.box-body -->
           </div>
           <!-- /.box -->
       </div>
   </div>
    <div class="modal fade" id="FilesPro" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ملفات الانتاج الهندسية</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body table-responsive">
                        <?php
                        $bennar = $id;
                        $Ser = \App\Models\ProjectServices::where('Bennar_Code',$bennar)->get();
                        ?>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs pull-right">

                                <?php $__currentLoopData = $Ser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item45): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="<?php if($item45->ServiceCode=='E0' or $item45->ServiceCode=='S0'): ?> active <?php endif; ?>"><a href="#<?php echo e($bennar); ?><?php echo e($item45->ServiceCode); ?>" data-toggle="tab"><?php echo e($item45->ServiceCode); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class=""><a href="#<?php echo e($bennar); ?>prFiles" data-toggle="tab">ملفات من العميل</a></li>
                            </ul>
                            <div class="tab-content">

                                <?php $__currentLoopData = $Ser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item88): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane <?php if($item88->ServiceCode=='E0' or $item88->ServiceCode=='S0'): ?> active <?php endif; ?>" id="<?php echo e($bennar); ?><?php echo e($item88->ServiceCode); ?>"  style="min-height: 300px">
                                        <?php
                                        $chart = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','1')->get();
                                        $Reports = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','2')->get();
                                        $Recomends = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','3')->get();

                                        ?>
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#<?php echo e($bennar); ?><?php echo e($item88->ServiceCode); ?>tab_1" data-toggle="tab"> المخططات</a></li>
                                                <li><a href="#<?php echo e($bennar); ?><?php echo e($item88->ServiceCode); ?>tab_2" data-toggle="tab">تقارير الكميات</a></li>
                                                <li><a href="#<?php echo e($bennar); ?><?php echo e($item88->ServiceCode); ?>tab_3" data-toggle="tab">التوصيات</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="<?php echo e($bennar); ?><?php echo e($item88->ServiceCode); ?>tab_1">
                                                    <ul class="mailbox-attachments clearfix">
                                                        <?php $__currentLoopData = $chart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                            $infoPath = pathinfo(public_path($it->Docs));
                                                            $extension = $infoPath['extension'];
                                                            if ($extension == 'pdf'){
                                                                $icon = 'fa fa-file-pdf-o';
                                                                $color = 'red';
                                                            }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                $icon = 'fa fa-picture-o';
                                                                $color = 'cadetblue';
                                                            }elseif ($extension == 'dwg'){
                                                                $icon = 'fa fa-file-code-o';
                                                                $color = 'violet';
                                                            }elseif ($extension == 'xls'){
                                                                $icon = 'fa fa-excel-o';
                                                                $color = 'darkcyan';
                                                            }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                $icon = 'fa fa-file-archive-o';
                                                                $color = 'seagreen';
                                                            }else{
                                                                $icon = 'fa fa-file';
                                                                $color = 'seagreen';
                                                            }
                                                            ?>
                                                            <li>
                                                                <span class="mailbox-attachment-icon"><i class="<?php echo e($icon); ?>" style="color: <?php echo e($color); ?>"></i></span>
                                                                <div class="mailbox-attachment-info">
                                                                    <a href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($it->Docs); ?>" target="_blank" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo e(Str::limit($it->DocName, 20)); ?></a>
                                                                    <span class="mailbox-attachment-size">
                                                                        <?php echo e(date('F d, Y', strtotime($it->created_at))); ?>

                                                                        <br>
                                                                        <?php if($it->reject_accept == '2'): ?>
                                                                        <span class="text-green">تم تعميد هذا الملف</span>
                                                                        <?php endif; ?>
                                                                        <?php if($it->reject_accept == '1'): ?>
                                                                        <span class="text-red">تم رفض هذا الملف</span>
                                                                        <?php endif; ?>
                                                                        <?php if($it->reject_accept == '0'): ?>
                                                                            <span class="text-yellow">في انتظار التعميد</span>
                                                                        <?php endif; ?>

                                                                    </span>
                                                                </div>
                                                            </li>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div><!-- /.tab-pane -->
                                                <div class="tab-pane" id="<?php echo e($bennar); ?><?php echo e($item88->ServiceCode); ?>tab_2">
                                                    <ul class="mailbox-attachments clearfix">
                                                        <?php $__currentLoopData = $Reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                            $infoPath = pathinfo(public_path($it->Docs));
                                                            $extension = $infoPath['extension'];
                                                            if ($extension == 'pdf'){
                                                                $icon = 'fa fa-file-pdf-o';
                                                                $color = 'red';
                                                            }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                $icon = 'fa fa-picture-o';
                                                                $color = 'cadetblue';
                                                            }elseif ($extension == 'dwg'){
                                                                $icon = 'fa fa-file-code-o';
                                                                $color = 'violet';
                                                            }elseif ($extension == 'xls'){
                                                                $icon = 'fa fa-excel-o';
                                                                $color = 'darkcyan';
                                                            }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                $icon = 'fa fa-file-archive-o';
                                                                $color = 'seagreen';
                                                            }else{
                                                                $icon = 'fa fa-file';
                                                                $color = 'seagreen';
                                                            }
                                                            ?>
                                                            <li>
                                                                <span class="mailbox-attachment-icon"><i class="<?php echo e($icon); ?>" style="color: <?php echo e($color); ?>"></i></span>
                                                                <div class="mailbox-attachment-info">
                                                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo e(Str::limit($it->DocName, 40)); ?></a>
                                                                    <span class="mailbox-attachment-size">
                                                                      <?php echo e(date('F d, Y', strtotime($it->created_at))); ?>

                                                                      <a href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($it->Docs); ?>" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                </div>
                                                            </li>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div><!-- /.tab-pane -->
                                                <div class="tab-pane" id="<?php echo e($bennar); ?><?php echo e($item88->ServiceCode); ?>tab_3">
                                                    <ul class="mailbox-attachments clearfix">
                                                        <?php $__currentLoopData = $Recomends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                            $infoPath = pathinfo(public_path($it->Docs));
                                                            $extension = $infoPath['extension'];
                                                            if ($extension == 'pdf'){
                                                                $icon = 'fa fa-file-pdf-o';
                                                                $color = 'red';
                                                            }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                                $icon = 'fa fa-picture-o';
                                                                $color = 'cadetblue';
                                                            }elseif ($extension == 'dwg'){
                                                                $icon = 'fa fa-file-code-o';
                                                                $color = 'violet';
                                                            }elseif ($extension == 'xls'){
                                                                $icon = 'fa fa-excel-o';
                                                                $color = 'darkcyan';
                                                            }elseif ($extension == 'zip' || $extension == 'rar'){
                                                                $icon = 'fa fa-file-archive-o';
                                                                $color = 'seagreen';
                                                            }else{
                                                                $icon = 'fa fa-file';
                                                                $color = 'seagreen';
                                                            }
                                                            ?>
                                                            <li>
                                                                <span class="mailbox-attachment-icon"><i class="<?php echo e($icon); ?>" style="color: <?php echo e($color); ?>"></i></span>
                                                                <div class="mailbox-attachment-info">
                                                                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo e(Str::limit($it->DocName, 40)); ?></a>
                                                                    <span class="mailbox-attachment-size">
                                                                      <?php echo e(date('F d, Y', strtotime($it->created_at))); ?>

                                                                      <a href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($it->Docs); ?>" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                                </div>
                                                            </li>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div><!-- /.tab-pane -->
                                            </div><!-- /.tab-content -->
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane" id="<?php echo e($bennar); ?>prFiles" style="min-height: 300px">
                                    <?php $tts = \App\Models\Documents::where('projectID',$bennar)
                                        //->where('for_eng','1')
                                        ->where('mission',null)
                                        ->where('cat',null)
                                        ->get(); ?>
                                    <?php if(isset($tts)): ?>
                                        <div class="col-lg-12 table-responsive" >
                                            <ul class="mailbox-attachments clearfix">
                                                <?php $__currentLoopData = $tts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                    $infoPath = pathinfo(public_path($it->Docs));

                                                    $extension = $infoPath['extension'];
                                                    //echo $extension;
                                                    if ($extension == 'pdf'){
                                                        $icon = 'fa fa-file-pdf-o';
                                                        $color = 'red';
                                                    }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                                        $icon = 'fa fa-picture-o';
                                                        $color = 'cadetblue';
                                                    }elseif ($extension == 'dwg'){
                                                        $icon = 'fa fa-file-code-o';
                                                        $color = 'violet';
                                                    }elseif ($extension == 'xls'){
                                                        $icon = 'fa fa-excel-o';
                                                        $color = 'darkcyan';
                                                    }elseif ($extension == 'zip' || $extension == 'rar'){
                                                        $icon = 'fa fa-file-archive-o';
                                                        $color = 'seagreen';
                                                    }else{
                                                        $icon = 'fa fa-file';
                                                        $color = 'seagreen';
                                                    }
                                                    ?>
                                                    <li>
                                                        <span class="mailbox-attachment-icon"><i class="<?php echo e($icon); ?>" style="color: <?php echo e($color); ?>"></i></span>
                                                        <div class="mailbox-attachment-info">
                                                            <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo e(Str::limit($it->DocName, 40)); ?></a>
                                                            <span class="mailbox-attachment-size">
                                                                      <?php echo e($it->projectID); ?>

                                                                      <a href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($it->Docs); ?>" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                                                    </span>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                        <center>لا توجد ملفات</center>
                                    <?php endif; ?>
                                </div>

                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="chatProject" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">الدردشة في المشروع بين المهندسين (ملاحظات)</h4>
                </div>
                <div class="modal-body">
                    <div class="box box-warning direct-chat direct-chat-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">دردشة في المشروع</h3>
                            <div class="box-tools pull-right">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts"><i class="fa fa-comments"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->


                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('show', ['messages' => $messages, 'bennar' => $bennar])->html();
} elseif ($_instance->childHasBeenRendered('cf7I3h6')) {
    $componentId = $_instance->getRenderedChildComponentId('cf7I3h6');
    $componentTag = $_instance->getRenderedChildComponentTagName('cf7I3h6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('cf7I3h6');
} else {
    $response = \Livewire\Livewire::mount('show', ['messages' => $messages, 'bennar' => $bennar]);
    $html = $response->html();
    $_instance->logRenderedChild('cf7I3h6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

  
 <?php $__env->stopSection(); ?>

<?php echo $__env->make($ex, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/skyapp/resources/views/projects/ProProduction.blade.php ENDPATH**/ ?>