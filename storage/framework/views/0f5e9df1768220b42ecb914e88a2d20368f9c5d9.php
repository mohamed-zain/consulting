<?php
$pro = \App\Models\ActivateFile::count();
$aproval = \App\Models\Documents::where('reject_accept',1)->count();
$eng = \App\Models\User::where('roll','AdmissionEmp')->count();
?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <h3>
            لوحة التحكم
            <small>التنبيهات</small>

        </h3>

        <ol class="breadcrumb" style="">
            <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="<?php echo e(url('/')); ?>"><i class="fa fa-folder-open"></i>   التنبيهات </a></li>

        </ol>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="#" class="btn btn-info"  data-toggle="modal" data-target="#Modal2222"><i class="fa fa-plus"></i>ارسال نتبيه لعميل</a>
            <a href="#" class="btn btn-warning"  data-toggle="modal" data-target="#Modal3333"><i class="fa fa-plus"></i>ارسال نتبيه لكل العملاء</a>
            <div class="modal fade" id="Modal2222" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">اختار العميل </h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo e(url('SendNotificationToClient')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <select name="bennar" class="form-control select2" style="width: 90%">
                                        <?php $__currentLoopData = \App\Models\User::where('roll','appUser')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->File_code); ?>"><?php echo e($item->File_code); ?> - <?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="عنوان التنبيه">
                                </div>
                                <div class="form-group">
                                    <textarea name="body" cols="4" class="form-control">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-warning">ارسال</button>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Modal3333" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> ارسال تنبيه لكل العملاء </h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo e(url('SendNotificationToAllClient')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="عنوان التنبيه">
                                </div>
                                <div class="form-group">
                                    <textarea name="body" cols="4" class="form-control">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-warning">ارسال</button>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Custom Tabs -->
            <br>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">العملاء</a></li>
                    <li><a href="#tab_2" data-toggle="tab"> المهندسين</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table id="" class="table table-bordered table-striped table-responsive example">
                            <thead>
                            <tr>

                                <th> العميل</th>
                                <th>عنوان التنبيه </th>
                                <th>نص التنبيه </th>
                                <th> التاريخ </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $client_noti = DB::table('app_notification')
                            ->join('users','app_notification.bennar','=','users.File_code')
                                ->where('users.roll','appUser')
                                ->get();

                            ?>
                            <?php $__currentLoopData = $client_noti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td>  <?php echo e($Single->name); ?> </td>
                                    <td>  <?php echo e($Single->Title); ?> </td>
                                    <td>  <?php echo e($Single->Body); ?> </td>
                                    <td>  <?php echo e($Single->created_at); ?> </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <table id="" class="table table-bordered table-striped table-responsive example">
                            <thead>
                            <tr>

                                <th> العميل</th>
                                <th>عنوان التنبيه </th>
                                <th>نص التنبيه </th>
                                <th> التاريخ </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $eng_noti = DB::table('notifications')
                                ->join('users','notifications.notifiable_id','=','users.id')
                                ->where('users.roll','AdmissionEmp')
                                ->get();

                            ?>
                            <?php $__currentLoopData = $eng_noti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $datas = json_decode($Single->data);

                                ?>
                                <tr>

                                    <td>  <?php echo e($Single->name); ?> </td>
                                    <td>  <?php echo e($datas->pass); ?> </td>
                                    <td>  <?php echo e($datas->message); ?> </td>
                                    <td>  <?php echo e($Single->created_at); ?> </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>

                    </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/notifications.blade.php ENDPATH**/ ?>