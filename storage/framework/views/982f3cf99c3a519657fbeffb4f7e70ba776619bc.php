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

            var selected_bennar = $('#Bennar').val();
            var selected_mains = $('#MainS').val();
            $.ajax({
                url: "<?php echo e(url('getSS')); ?>",
                type: "POST",
                data:{
                    Bennar : selected_bennar,
                    MainS : selected_mains,
                },
                success: function(data){
                    $("#SS").html(data);
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
                <li><a href="<?php echo e(url('/ConsultingDashboard')); ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
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
                                <select name="search_text" class="form-control select2" id="search778" onchange="submit();">
                                    <option selected="selected">Select Project</option>
                                    <?php $__currentLoopData = $activeFi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->Bennar); ?>" <?php if($item->Bennar == $fn->Bennar): ?> selected="selected" <?php endif; ?>><?php echo e($item->Bennar); ?> - <?php echo e($item->FileCode); ?></option>
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
                <span style="color: red; padding: 10px;font-size: 15px"><?php echo e($fn->FileCode); ?></span> -
                <span style="color: red; padding: 10px;font-size: 15px"><?php echo e($fn->Bennar); ?></span>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-xs-12 table-responsive" >

                    <button data-toggle="modal" data-target="#Modal2222" class="btn btn-info pull-left" id="Modal3333id">إضافة ملف مشروع</button>

                    <table id="" class="table table-bordered table-striped table-responsive example">
                        <thead>
                        <tr>
                            <th>اسم المستند</th>
                            <th>تفاصيل الملف</th>
                            <th>خيارات</th>
                            <th>التاريخ</th>
                        </tr>
                        </thead>
                        <tbody >
                        <?php $__currentLoopData = $Data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($Single->DocName); ?></td>
                                <td><?php echo e($Single->Docdetails); ?></td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <span class="caret"></span>خيارات
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a class="btn btn-success" href="<?php echo e(url('storage/app/public')); ?>/<?php echo e($Single->Docs); ?>" target="_blank">عرض</a>
                                            </li>
                                            <li>
                                                <a class="btn btn-dark" href="#" id="<?php echo e($Single->id); ?>" data-id="<?php echo e($Single->id); ?>" data-token="<?php echo e(csrf_token()); ?>" onclick='
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
                                                        var audio = document.getElementById("audioSuccess");
                                                        audio.play();
                                                        swal("تهانينا!",data , "success");
                                                        setTimeout(function() {
                                                        window.location.reload();
                                                        },1000);
                                                        },
                                                        error: function(xhr, textStatus, thrownError){
                                                        // console.log(thrownError);
                                                        swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                                        }

                                                        });

                                                        }, 1000);
                                                        });
                                                        '>حذف</a>

                                            </li>


                                        </ul>
                                    </div>
                                </td>
                                <td><?php echo e(date('F d, Y', strtotime($Single->created_at))); ?></td>


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


<div class="modal fade" id="Modal2222" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">اضافة ملف  للمشروع </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="Consend22" method="POST" action="<?php echo e(route('Documents.store')); ?>" enctype="multipart/form-data" >
                    <?php echo csrf_field(); ?>

                    <input name="Bennar" type="hidden" id="Bennar" value="<?php echo e($fn->Bennar); ?>">
                    <div class="form-group">
                        <label for="Stage" class="col-sm-4 control-label"> اختر الخدمة </label>
                        <div class="col-sm-8">
                            <select  class="form-control select2" name="MainS" style="width: 100%" required id="MainS" onchange="getMission()">
                                <?php
                                $ef = DB::table('require_services')->join('main_services','main_services.id','=','require_services.serviceName')->get();
                                ?>
                                <option>----إختر الخدمة----</option>
                                <?php $__currentLoopData = $ef; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($dct->id); ?>"><?php echo e($dct->MainServiceName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Stage" class="col-sm-4 control-label">اسم المستند </label>
                        <div class="col-sm-8" >
                            <select  class="form-control select2" name="DocName" style="width: 100%" required id="SS">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Stage" class="col-sm-4 control-label">رمز المشروع </label>
                        <div class="col-sm-8">
                            <?php $pro = App\Models\Projects::all(); ?>
                            <input type="hidden" name="Bennar" value="<?php echo e($fn->Bennar); ?>">
                            <input type="text" name="" class="form-control" value="<?php echo e($fn->Bennar); ?> - <?php echo e($fn->FileCode); ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Docdetails" class="col-sm-4 control-label"  required="required">ملاحظات</label>
                        <div class="col-sm-8">
                            <textarea name="Docdetails" class="form-control" id="Docdetails" placeholder="اكتب ملاحظتك هنا" rows="5" ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Stage" class="col-sm-4 control-label">اختر المستند </label>
                        <input type="file" name="Docs" id="filoo" required="required" data-max-file-size="60MB">
                    </div>
                    <button id="Conse123" class="btn btn-success" >حفظ</button>
                </form>

            </div>
            <div class="modal-footer">
                <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                <h3 id="status"></h3>
                <p id="loaded_n_total"></p>
            </div>
        </div>
    </div>
</div>
<script>
    $('#Modal3333id').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url : "<?php echo e(url('RefreshTempFiles')); ?>",
            data : [] ,
            //dataType: 'json',
            cache:false,
            contentType: false,
            processData: false,

            success  : function(data) {
            },
            error: function(xhr, textStatus, thrownError){
                // console.log(thrownError);
                swal("للأسف!", "لم يتم حفظ البيانات!", "error");
            }

        });



    });
    /********************************************************************/
    /********************************************************************/
    const inputElement = document.querySelector('input[type="file"]');
    // Create a FilePond instance
    const pond = FilePond.create(inputElement);
    FilePond.setOptions({
        server: {
            url: '<?php echo e(url("uploadeTemp")); ?>',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
    });
    /********************************************************************/
    $('#Conse123').click(function () {

        $( "#Consend22" ).on( "submit", function( event ) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            event.preventDefault();

            var myForm = document.getElementById('Consend22');
            var formData = new FormData(myForm);
            var headers = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'POST',
                url : $(this).attr('action'),
                data : formData ,
                //dataType: 'json',
                cache:false,
                contentType: false,
                processData: false,
                success  : function(data) {
                    swal("تهانينا!",data , "success");
                    window.location.reload();
                },
                error: function(xhr, textStatus, thrownError){
                    // console.log(thrownError);
                    swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                    myForm.reset();
                }

            });


        });


    });

    /*********************************************************************/
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/documents/DocsByPro.blade.php ENDPATH**/ ?>