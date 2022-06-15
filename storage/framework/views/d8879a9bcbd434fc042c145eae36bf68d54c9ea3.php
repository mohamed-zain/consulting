<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <h3>
            المستخدمين
            <small>قائمة المستخدمين</small>
        </h3>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('ConsultingDashboard')); ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="<?php echo e(url('Users')); ?>"><i class="fa fa-folder-open"></i>المستخدمين</a></li>
        </ol>
    </div>

    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">كل المستخدمين </h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المستخدم</th>
                            <th>البريد الالكتروني</th>
                            <th>الصلاحية</th>
                            <th>فعالية الحساب</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $Data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $access = DB::table('sys_access')->where('UID',$Single->id)->first();
                            ?>
                            <tr>
                                <td><?php echo e($Single->id); ?></td>
                                <td><?php echo e($Single->name); ?></td>
                                <td><?php echo e($Single->email); ?></td>
                                <td>
                                    <?php if(isset($access->haveAccess)): ?>
                                        <?php if( $access->haveAccess == 1): ?>
                                            <span class="badge bg-green">لديه صلاحية الدخول</span>

                                        <?php elseif($access->haveAccess == 0): ?>
                                            <span class="badge bg-red">الحساب مجمد</span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="badge bg-yellow"> غير معروف</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <form action="<?php echo e(route('UpdateAuth')); ?>"  id="<?php echo e($Single->id); ?>" method="post">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="form-inline">
                                            <input type="hidden" id="UID" name="UID" value="<?php echo e($Single->id); ?>">
                                            <select class="form-control select2" id="<?php echo e($Single->id); ?>" name="Level" style="width: 50%">
                                                <option value="">---أختر إجراء---</option>
                                                <?php if(isset($access->haveAccess)): ?>
                                                    <?php if($access->haveAccess == 1): ?>
                                                        <option value="0">تجميد الحساب</option>
                                                    <?php elseif($access->haveAccess == 0): ?>
                                                        <option value="1">تفعيل الحساب</option>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <option value="2"> ydv luv,t</option>
                                                <?php endif; ?>
                                            </select>
                                            <button type="submit" class="btn bg-navy margin">حفظ</button>
                                        </div>
                                    </form>
                                </td>

                            </tr>

                            <script>
                                /********************************************************************/
                                /********************************************************************/
                                $('#<?php echo e($Single->id); ?>').change(function (event) {


                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });


                                    event.preventDefault();

                                    var data2    = $( '#<?php echo e($Single->id); ?>' ).serialize();
                                    var headers = $('meta[name="csrf-token"]').attr('content');

                                    $.ajax({
                                        type: 'POST',
                                        url : "UpdateAuth",
                                        data : data2,
                                        //dataType: 'json',
                                        cache:false,

                                        success  : function(data) {
                                            swal("تهانينا!",data , "success");
                                            $.ajax({
                                                url: "UsersPrivileges",
                                                type: "GET",
                                                success: function(data){
                                                    $("#Command").html(data)

                                                },
                                                error: function(){
                                                    console.log("No results for " + data + ".");
                                                }
                                            });

                                        },
                                        error: function(xhr, textStatus, thrownError){
                                            // console.log(thrownError);
                                            swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                        }

                                    });
                                    $("#AddBranch").trigger("reset");



                                });

                                /*********************************************************************/
                            </script>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



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
    <script>
        $(".select2").select2();
        $("#example1").DataTable();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/Users/index.blade.php ENDPATH**/ ?>