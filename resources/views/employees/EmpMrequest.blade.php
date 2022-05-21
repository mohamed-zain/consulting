 <div class="row">
     <section class="content-header">
        <div class="container">
          
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">قائمة الطلبات المالية</li>          

          </ol>
          </div>
        </section>
   </div>

        <div class="col-md-12" >
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">الجدول يوضح قائمة الموظفين الذين ارسلو طلبات مالية</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="" style="margin-bottom: 20px">
  

</div>
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>اسم الموظف</th>
                  <th>نوع الطلب</th>
                  <th>المبلغ</th>
                  <th>قبول</th>
                  <th>رفض</th>
                  <th>التاريخ</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                  @foreach($Data as $Single)
                <tr>
                  
                  <td>{{$Single->name}}</td>
                  <td>{{$Single->Name}}</td>
                  <td>{{$Single->Extra}}</td></td>
                     
                        <td>
                       <button id="{{$Single->RID}}" class="btn btn-success" data-id="{{$Single->RID}}" data-token="{{csrf_token()}}" onclick='
                                  swal({
   title: "هل انت متأكد ?",
  text: "اضغط علي Ok لقبول طلب الموظف !",
  type: "info",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true,
},
function(){
  setTimeout(function(){
            var id = $("#{{$Single->RID}}").data("id");
      var token = $("#{{$Single->RID}}").data("token");
        $.ajax({
                            type: "GET",
                            url : "UpdateReqState/"+id,
                            data : {
                                "":id,
                                 "_method":"DELETE",
                                  "_token":token,
                            },
                            //dataType: "json",
                            cache:false,
                         
                            success  : function(data) {
                              $.ajax({
                                  url: "EmpMrequest",
                                  type: "GET",
                                  success: function(data){
                                      $("#Command").html(data);
                                  },
                                  error: function(){
                                              console.log("No results for " + data + ".");
                                      }
                              });
                                swal("تهانينا!",data , "success");
                                
                            },
                             error: function(xhr, textStatus, thrownError){
                             // console.log(thrownError);
                              swal("للأسف!", "لم يتم حذف المشروع!", "error");
                            }

                        });
    
  }, 1000);
});
                              '>قبول</button>
                  </td>
                   <td>
                       <button id="{{$Single->RID}}" class="btn btn-danger" data-id="{{$Single->RID}}" data-token="{{csrf_token()}}" onclick='
                                  swal({
   title: "هل انت متأكد?",
  text: "عند رفض الطلب سيتم حذفه نهائيا!",
  type: "info",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true,
},
function(){
  setTimeout(function(){
            var id = $("#{{$Single->RID}}").data("id");
      var token = $("#{{$Single->RID}}").data("token");
        $.ajax({
                            type: "GET",
                            url : "DeleteRequest/"+id,
                            data : {
                                "":id,
                                 "_method":"DELETE",
                                  "_token":token,
                            },
                            //dataType: "json",
                            cache:false,
                         
                            success  : function(data) {
                                swal("تهانينا!",data , "success");
                                $.ajax({
                                  url: "EmpMrequest",
                                  type: "GET",
                                  success: function(data){
                                      $("#Command").html(data);
                                  },
                                  error: function(){
                                              console.log("No results for " + data + ".");
                                      }
                              });
                                
                            },
                             error: function(xhr, textStatus, thrownError){
                             // console.log(thrownError);
                              swal("للأسف!", "لم يتم حذف المشروع!", "error");
                            }

                        });
    
  }, 1000);
});
                              '>رفض</button>
                  </td> 
                  <td>{{ date('F d, Y', strtotime($Single->edate)) }}</td>
                </tr>
                @endforeach
                
                    
                </tbody>
                <tfoot>
              
                </tfoot>
              </table>
    </div>
  </div>
</div>
         