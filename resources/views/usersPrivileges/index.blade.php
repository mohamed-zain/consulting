@extends('index')
@section('content')
  <div class="col-md-12">
          <h3>
            المستخدمين
            <small>قائمة المستخدمين</small>
            
           
              
          </h3>

          <ol class="breadcrumb">
            <li><a href="{{url('UsersTasks')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('UsersTasks') }}"><i class="fa fa-folder-open"></i>المستخدمين</a></li>
           
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
                  @foreach($Data as $Single)
                      @php
                          $access = DB::table('sys_access')->where('UID',$Single->id)->first();
                      @endphp
                <tr>
                  <td>{{ $Single->id }}</td>
                  <td>{{ $Single->name }}</td>
                  <td>{{ $Single->email }}</td>
                    <td>
                        @if(isset($access->haveAccess))
                    @if( $access->haveAccess == 1)
                    <span class="badge bg-green">لديه صلاحية الدخول</span>
                   
                    @elseif($access->haveAccess == 0)
                    <span class="badge bg-red">الحساب مجمد</span>
                    @endif
                            @else
                            <span class="badge bg-yellow"> غير معروف</span>

                        @endif
                  </td>
                  
                  <td><button type="button" class="btn bg-olive btn-flat margin" data-toggle="modal" data-target="#Modal{{ $Single->id }}">تفاصيل أكثر</button></td>
                  <td>
                    <form action="{{route('UpdateAuth')}}"  id="{{ $Single->id }}" method="post">
                      {{csrf_field()}}
                        <div class="form-inline">
                            <input type="hidden" id="UID" name="UID" value="{{$Single->id}}">
                            <select class="form-control select2" id="{{$Single->id}}" name="Level" style="width: 50%">
                                <option value="">---أختر إجراء---</option>
                                @if(isset($access->haveAccess))
                                    @if($access->haveAccess == 1)
                                        <option value="0">تجميد الحساب</option>
                                    @elseif($access->haveAccess == 0)
                                        <option value="1">تفعيل الحساب</option>
                                    @endif
                                @else
                                    <option value="2"> ydv luv,t</option>
                                @endif
                            </select>
                            <button type="submit" class="btn bg-navy margin">حفظ</button>
                        </div>

                        
                    </form>
                  </td>
                  
                </tr>

<script>
/********************************************************************/             
/********************************************************************/
                        $('#{{$Single->id}}').change(function (event) {


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


                    event.preventDefault();

                        var data2    = $( '#{{ $Single->id }}' ).serialize();
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
                      <div class="modal fade" id="Modal{{ $Single->id }}" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">صلاحيات - {{ $Single->name }} - علي الادارات</h4>
                                  </div>
                                  <div class="modal-body box-body">

                                      <?php
                                      $access = DB::table('our_sys')
                                          ->join('user_groups','user_groups.Sys','=','our_sys.SysName')
                                          ->select('our_sys.*','user_groups.*', DB::raw('our_sys.id as sysid'))
                                          ->where('user_groups.UID',$Single->id)
                                          ->get();
                                      ?>
                                      @foreach($access as $item)
                                          <a href="#" class="btn btn-app bg-gray" style="min-width: 254px">
                                              @if($item->accessH == 1)
                                              <span class="badge bg-green">لديه الصلاحية</span>
                                                  @else
                                                  <span class="badge bg-red"> ليس لديه صلاحية</span>
                                              @endif
                                              <i class="{{ $item->icon }}" style="font-size: 40px; color: #D65F0F"></i>
                                                  {{ $item->NameAR }}
                                                  @if($item->accessH == 1)
                                                  <button type="button" class="btn bg-navy btn-flat margin" id="{{ $Single->id }}" data-title="{{ $item->SysName }}" data-id="{{ $Single->id }}" data-token="{{ $item->SysName }}" onclick='
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
                                                          var id = $("#{{ $Single->id }}").data("id");
                                                          var token = $("#{{ $item->SysName }}").data("token");
                                                          $.ajax({
                                                          type: "GET",
                                                          url : "takeAccess/"+id+"/{{ $item->SysName }}",
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
                                                  @else
                                                      <button type="button" class="btn bg-olive btn-flat margin" id="giv{{ $Single->id }}" data-id="giv{{ $Single->id }}" data-token="{{csrf_token()}}" onclick='
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
                                                              var id = $("#giv{{ $Single->id }}").data("id");
                                                              var token = $("#giv{{ $Single->id }}").data("token");
                                                              $.ajax({
                                                              type: "GET",
                                                              url : "givAccess/"+"{{ $Single->id }}"+"/{{ $item->SysName }}",
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
                                                  @endif
                                          </a>
                                      @endforeach
                                      <div class="modal-footer">

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                @endforeach
                
                    
                   
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
@endsection