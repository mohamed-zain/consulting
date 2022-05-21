<?php $__env->startSection('content'); ?>
  <div class="col-md-12">
          <h3>
            المستخدمين
            <small>قائمة المستخدمين</small>
            
           
              
          </h3>

          <ol class="breadcrumb">
            <li><a href="<?php echo e(url('UsersTasks')); ?>"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="<?php echo e(url('UsersTasks')); ?>"><i class="fa fa-folder-open"></i>المستخدمين</a></li>
           
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
                  <th>تفاصيل</th>
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
                  
                  <td><button type="button" class="btn bg-olive btn-flat margin" data-toggle="modal" data-target="#Modal<?php echo e($Single->id); ?>">تفاصيل أكثر</button></td>
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
                      <div class="modal fade" id="Modal<?php echo e($Single->id); ?>" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">صلاحيات - <?php echo e($Single->name); ?> - علي الادارات</h4>
                                  </div>
                                  <div class="modal-body box-body">

                                      <?php
                                      $access = DB::table('our_sys')
                                          ->join('user_groups','user_groups.Sys','=','our_sys.SysName')
                                          ->select('our_sys.*','user_groups.*', DB::raw('our_sys.id as sysid'))
                                          ->where('user_groups.UID',$Single->id)
                                          ->get();
                                      ?>
                                      <?php $__currentLoopData = $access; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <a href="#" class="btn btn-app bg-gray" style="min-width: 254px">
                                              <?php if($item->accessH == 1): ?>
                                              <span class="badge bg-green">لديه الصلاحية</span>
                                                  <?php else: ?>
                                                  <span class="badge bg-red"> ليس لديه صلاحية</span>
                                              <?php endif; ?>
                                              <i class="<?php echo e($item->icon); ?>" style="font-size: 40px; color: #D65F0F"></i>
                                                  <?php echo e($item->NameAR); ?>

                                                  <?php if($item->accessH == 1): ?>
                                                  <button type="button" class="btn bg-navy btn-flat margin" id="<?php echo e($Single->id); ?>" data-title="<?php echo e($item->SysName); ?>" data-id="<?php echo e($Single->id); ?>" data-token="<?php echo e($item->SysName); ?>" onclick='
                                                          var audio = document.getElementById("audioError");
                                                          audio.play();
                                                          swal({
                                                          title: "هل انت متأكد?",
                                                          text: "نزع الصلاحية من المستخدم",
                                                          type: "info",
                                                          showCancelButton: true,
                                                          closeOnConfirm: false,
                                                          showLoaderOnConfirm: true,
                                                          },
                                                          function(){
                                                          setTimeout(function(){
                                                          var id = $("#<?php echo e($Single->id); ?>").data("id");
                                                          var token = $("#<?php echo e($item->SysName); ?>").data("token");
                                                          $.ajax({
                                                          type: "GET",
                                                          url : "takeAccess/"+id+"/<?php echo e($item->SysName); ?>",
                                                          data : {
                                                          "_token":token
                                                          },
                                                          //dataType: "json",
                                                          cache:false,

                                                          success  : function(data) {
                                                          var audio = document.getElementById("audioSuccess");
                                                          audio.play();
                                                          swal("تهانينا!",data , "success");

                                                          },
                                                          error: function(xhr, textStatus, thrownError){
                                                          // console.log(thrownError);
                                                          swal("للأسف!", "لم يتم نزع الصلاحية!", "error");
                                                          }

                                                          });

                                                          }, 1000);
                                                          });
                                                          ' style="font-size: 10px">نزع الصلاحية</button>
                                                  <?php else: ?>
                                                      <button type="button" class="btn bg-olive btn-flat margin" id="giv<?php echo e($Single->id); ?>" data-id="giv<?php echo e($Single->id); ?>" data-token="<?php echo e(csrf_token()); ?>" onclick='
                                                              var audio = document.getElementById("audioError");
                                                              audio.play();
                                                              swal({
                                                              title: "هل انت متأكد?",
                                                              text: "منح المستخدم صلاحية الوصول",
                                                              type: "info",
                                                              showCancelButton: true,
                                                              closeOnConfirm: false,
                                                              showLoaderOnConfirm: true,
                                                              },
                                                              function(){
                                                              setTimeout(function(){
                                                              var id = $("#giv<?php echo e($Single->id); ?>").data("id");
                                                              var token = $("#giv<?php echo e($Single->id); ?>").data("token");
                                                              $.ajax({
                                                              type: "GET",
                                                              url : "givAccess/"+"<?php echo e($Single->id); ?>"+"/<?php echo e($item->SysName); ?>",
                                                              data : {
                                                              "_token":token
                                                              },
                                                              //dataType: "json",
                                                              cache:false,

                                                              success  : function(data) {
                                                              var audio = document.getElementById("audioSuccess");
                                                              audio.play();
                                                              swal("تهانينا!",data , "success");

                                                              },
                                                              error: function(xhr, textStatus, thrownError){
                                                              // console.log(thrownError);
                                                              swal("للأسف!", "لم يتم منح الصلاحية!", "error");
                                                              }

                                                              });

                                                              }, 1000);
                                                              });
                                                              ' style="font-size: 10px">منح الصلاحية</button>
                                                  <?php endif; ?>
                                          </a>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <div class="modal-footer">

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
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
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/consulting/resources/views/usersPrivileges/index.blade.php ENDPATH**/ ?>