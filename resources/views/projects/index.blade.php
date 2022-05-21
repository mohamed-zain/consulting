
<div class="">
  <section class="content-header">
        <div class="">
          <h3>
            لوحة التحكم
            <small>المشاريع</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">ادارة المهام</li>
            <li class="active">المشاريع</li>
          </ol>
          </div>
        </section>
</div>
         
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">قائمة المشاريع</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
         <div class="" style="margin-bottom: 20px">
  <a href="{{url('projectCreate')}}" id="" class="btn btn-warning"><i class="fa fa-plus"></i> اضافة مشروع</a> 
</div>
<table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>حالة المشروع</th>
                  <th>نوع المشروع</th>
                  <th>اسم المشروع</th>
                  <th>مدير المشروع</th>
                  <th>عرض</th>
                  <th>تعديل</th>
                  <th>حذف</th>
                 
                </tr>
                </thead>
                <tbody>
                  @foreach($Data as $mmmmmm)
                <tr>
                  <td>{{ $mmmmmm->ProID }}</td>
                  <td>
                    @if( $mmmmmm->State == 'مفتوح')
                    <span class="badge bg-green">{{ $mmmmmm->State }}</span>
                    @elseif($mmmmmm->State == 'منتهي')
                    <span class="badge bg-red ">{{ $mmmmmm->State }}</span>
                    @elseif($mmmmmm->State == 'مغلق')
                    <span class="badge bg-red">{{ $mmmmmm->State }}</span>
                    @elseif($mmmmmm->State == 'قيد التنفيذ')
                    <span class="badge bg-yellow ">{{ $mmmmmm->State }}</span>
                    
                    @endif
                  </td>
                  <td>{{ $mmmmmm->ProType }}</td>
                  <td><a href="{{url('ShowProject')}}/{{ $mmmmmm->ProID }}">{{ $mmmmmm->ProName }}</a></td>
                  <td>{{ $mmmmmm->NameAR }}</td>
    <td><a href="{{url('ShowProject')}}/{{ $mmmmmm->ProID }}"><i class="fa fa-eye btn btn-info"></i></a></td>
                  <td><a href="{{url('Editpro')}}/{{ $mmmmmm->ProID }}" class="CMe"><i class="fa fa-edit btn btn-warning"></i></a></td>
                   <td>
                       <button id="{{ $mmmmmm->ProID }}" class="fa fa-trash-alt btn btn-danger" data-id="{{ $mmmmmm->ProID }}" data-token="{{csrf_token()}}" onclick='
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
            var id = $("#{{ $mmmmmm->ProID }}").data("id");
      var token = $("#{{ $mmmmmm->ProID }}").data("token");
        $.ajax({
                            type: "GET",
                            url : "deleteproject/"+id,
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
                                url: "projectsList",
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
                              '>حذف</button>
                  </td> 
                </tr>
                @endforeach
                
                    
                   
                </tbody>
              </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div> 
          
             