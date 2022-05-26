<?php $__env->startSection('content'); ?>
    <style>
        .bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body{
            background-color: #4eadaf !important;
        }
        .mailbox-attachments{
            float: right;
        }
        .box-header>.box-tools{
            right: 20px !important;
        }
    </style>
    <script>

        function getMission(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var your_selected_value = $('#projectID').val();
            $.ajax({
                url: "<?php echo e(url('getMission')); ?>",
                type: "POST",
                data:{ bennar : your_selected_value},
                success: function(data){
                    $("#warpMission").html(data);
                },
                error: function(){
                    console.log("No results for " + data + ".");
                }
            });

        }
    </script>
    <section class="content-header">
        <div class="">
            <h3>
                المكتب
                <small>المستندات</small>
            </h3>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active">مستندات المكتب</li>

            </ol>
        </div>
    </section>
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">مستندات المكتب</h3>

                <div class="box-tools pull-right">
                    
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="callout callout-warning col-lg-12">
                    <h4>مركز رفع الملفات لنظام مستندات المكتب!</h4>

                    <p>من هنا يمكن للاستشاري رفع الملفات المطلوبة في المشروع
                        الخاصة بالمشروع </p><p>(يشمل العقود والاتفاقيات ورخص البناء وتقارير الاشراف وشهادات الإشغال)</p>

                </div>


            </div>


            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div id="pls">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>

                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <form action="<?php echo e(url('DocsByPro')); ?>" method="GET" class="form form-inline" id="search" name="search" >
                                <?php echo csrf_field(); ?>
                                <select name="search_text" class="form-control select2" id="search778" onchange="submit();" >
                                    <?php $__currentLoopData = $activeFi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->Bennar); ?>"><?php echo e($item->Bennar); ?> - <?php echo e($item->FileCode); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </form>

                        </div>
                    </div>

                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 table-responsive" >

                            <ul class="mailbox-attachments clearfix">

                                <?php $__currentLoopData = $Docs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li style="width: 120px">
                                        <span class="mailbox-attachment-icon" style="font-size:30px"><a href="<?php echo e(url('DocsByPro')); ?>?search_text=<?php echo e($Single->Bennar); ?>" id="<?php echo e($Single->Bennar); ?>"><i class="fa fa-folder-open" style="font-weight: 0px !important;"></i></a></span>
                                        <div class="mailbox-attachment-info" style="font-size: 10px">
                                            <a href="#" data-toggle="modal" data-target="#<?php echo e($Single->Bennar); ?>" class="mailbox-attachment-name">

                                                <?php echo e(Str::limit($Single->FileCode, 20)); ?>

                                            </a>
                                            <span class="mailbox-attachment-size" style="font-size: 8px">
                         رقم المشروع  <?php echo e($Single->Bennar); ?>

                                            </span>
                                        </div>
                                    </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </ul>
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


    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">اخر الملفات المضافة
                </h3>


                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row" id="DocsByProplace">
                    <div class="col-xs-12 table-responsive" >
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>اسم المستند</th>
                                <th>ملاحظات</th>
                                <th>صلاحية المهندس</th>
                                <th>صلاحية العميل</th>
                                <th>خيارات</th>
                                <th>التاريخ</th>

                            </tr>
                            </thead>
                            <tbody >




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


    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/documents/index.blade.php ENDPATH**/ ?>