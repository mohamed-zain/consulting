 @extends('layouts.index')
@section('content')

<section class="content-header">
        <div class="container">
          <h3>
            الاعدادات 
            <small>البيانات الاساسية</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('MainSetting') }}">الاعدادات</a></li>
            <li class="active">البيانات الاساسية</li>          
            <li class="active">مسميات الادارات </li>

          </ol>
          </div>
        </section>
    <div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">مسميات الادارات   <a href="" class="uppercase btn btn-warning" data-toggle="modal" data-target="#Modal">اضافة ادارة</a></h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
<table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>اسم الادارة</th>                  
                  <th>الوصف</th>
                  <th>تعديل </th>
                  <th>حذف </th>
                </tr>
                </thead>
                <tbody id="comm">
               @foreach($Data as $Single)
                <tr>
                  <td>{{ $Single->id }}</td>
                  <td>{{ $Single->ManageName }}</td>
                  <td>{{ $Single->Discription }}</td>
                  <td><i class="fa fa-edit btn btn-primary"></i></td>
                  <td> <button id="{{ $Single->id }}" class="btn btn-danger" data-id="{{$Single->id}}" data-token="{{csrf_token()}}" onclick='
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
            var id = $("#{{ $Single->id }}").data("id");
      var token = $("#{{ $Single->id }}").data("token");
        $.ajax({
                            type: "GET",
                            url : "deletmanagesName/"+id,
                            data : {
                                "":id,
                                 "_method":"DELETE",
                                  "_token":token,
                            },
                            //dataType: "json",
                            cache:false,
                         
                            success  : function(data) {
                               $.ajax({
                                  url: "Getman",
                                  type: "GET",
                                  success: function(data){
                                      $("#comm").html(data)

                                  },
                                  error: function(){
                                              console.log("No results for " + data + ".");
                                      }
                              });
                                swal("تهانينا!",data , "success");
                                
                            },
                             error: function(xhr, textStatus, thrownError){
                             // console.log(thrownError);
                              swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                            }

                        });
    
  }, 1000);
});
                              '>حذف</button></td>  
                </tr>
                    @endforeach
                </tbody>
              </table>
          <div class="modal fade" id="Modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اضافة فرع جديد</h4>
        </div>
        <div class="modal-body">
    {{ Form::open(array('route'=>'managesName.store','id'=>'Managesend')) }}
            <div class="form-group">
            <label>اسم الادارة</label>
            <input type="text" name="ManageName" class="form-control" placeholder="اسم الادارة">            

            </div>
            <div class="form-group">
            <label>الوصف</label>
            <textarea name="Discription" class="form-control" placeholder="الوصف"></textarea>
            <input type="hidden" name="test" class="form-control" placeholder="اسم الفرع">
            </div>
         <button id="AddManage" class="btn btn-success">اضافة</button>
         {{ Form::close() }}

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div> 
<script>

                        $('#AddManage').click(function () {

                    $( "#Managesend" ).on( "submit", function( event ) {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


                    event.preventDefault();

                        var data2    = $( this ).serialize();
                        var headers = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            type: 'POST',
                            url : $(this).attr('action'),
                            data : data2,
                            //dataType: 'json',
                            cache:false,
                         
                            success  : function(data) {
                              $.ajax({
                                  url: "Getman",
                                  type: "GET",
                                  success: function(data){
                                      $("#comm").html(data)

                                  },
                                  error: function(){
                                              console.log("No results for " + data + ".");
                                      }
                              });
                                swal("تهانينا!",data , "success");
                                
                            },
                             error: function(xhr, textStatus, thrownError){
                             // console.log(thrownError);
                              swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                            }

                        });
                        $("#Managesend").trigger("reset");

                    });

                });
                
                /********************************************************************/  
</script>
@endsection
