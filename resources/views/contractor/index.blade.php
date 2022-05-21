@extends('index')
@section('content')<script>
  $(document).ready(function(){

      $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
    });





            $("#Agentscreate").click(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "ContractorCreate",
        type: "GET",
        success: function(data){
            $("#Command").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});


  });

</script>


<div class="">
  <section class="content-header">
        <div class="">
          <h3>
            لوحة التحكم
            <small>المهام</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">ادارة العملاء</li>
            <li class="active">سجل المقاولين</li>
          </ol>
          </div>
        </section>
</div>


                 <div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">سجل المقاولين</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    	   <div class="" style="margin-bottom: 20px">
  <a href="#" id="Agentscreate" class="btn btn-warning "><i class="fa fa-plus"></i> اضافة مقاول</a>

</div>
<table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>نوع المقاول</th>
                  <th>اسم المقاول</th>
                  <th>رقم الجوال</th>
                  <th>البريد الالكتروني</th>
                  <th>تاريخ الاضافة</th>
                  <th>حذف</th>
                  <th>تعديل</th>

                </tr>
                </thead>
                <tbody>
                @foreach($Data as $Single)
                <tr>
                  </td>
                  <td>{{$Single->id}}</td>
                  <td>{{$Single->ContractorType}}</td>
                  <td>{{$Single->ContractorName}} </td></td>
                  <td>{{$Single->ContractorPhone}}</td>
                  <td>{{$Single->ContractorEmail}}</td>
                  <td>{{ date('F d, Y', strtotime($Single->created_at)) }}</td>
                   <td>
                       <button id="{{ $Single->id * $Single->id +10 }}" class="fa fa-trash-o btn btn-danger" data-id="{{ $Single->id }}" data-token="{{csrf_token()}}" onclick='
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
            var id = $("#{{ $Single->id* $Single->id+10 }}").data("id");
      var token = $("#{{ $Single->id* $Single->id+10 }}").data("token");
       var href = "Contractor";
        $.ajax({
                            type: "GET",
                            url : "deleteContractor/"+id,
                            data : {
                                "":id,
                                 "_method":"DELETE",
                                  "_token":token,
                            },
                            //dataType: "json",
                            cache:false,

                            success  : function(data) {
                                swal("تهانينا!",data , "success");
                                setTimeout(function(){

                            window.location.href = href;
                              }, 1000);

                            },
                             error: function(xhr, textStatus, thrownError){
                             // console.log(thrownError);
                              swal("للأسف!", "لم يتم حذف العميل!", "error");
                            }

                        });

  }, 1000);
});
                              '></button>
                  </td>


                  <td><a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#{{$Single->id}}"><i class='fa fa-edit'></i>  تعديل البيانات</a></i></td>
                </tr>

                   <div class="modal fade" id="{{$Single->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">تعديل بيانات العميل</h4>
        </div>
        <div class="modal-body">

   <div class="col-md-12">
  <div class="box box-default">
    <!-- /.box-header -->
    <div class="box-body">
      {{ Form::model($Single,['class'=>'form-horizontal','method'=>'PATCH','route' => ['Contractor.update',$Single->id]]) }}
            <input type="hidden" name="id" value="{{$Single->id}}">
        <div class="row">
            <div class="form-group">
                <label for="AgentName" class="col-sm-2 control-label">اسم العميل</label>

                <div class="col-sm-10">
                    <input type="text" name="ContractorName" value="{{$Single->ContractorName}}" class="form-control" id="AgentName" placeholder="اسم العميل" style="margin-bottom: 9px;">
                </div>

            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">نوع المقاول</label>

                <div class="col-sm-4">

                    <select class="form-control select2" name="ContractorType" required="required" style="width: 100%">
                        <?php $AG = App\Models\ContractorType::all();?>
                            <option  value="">-------اختر نوع المقاول--------</option>
                        @foreach($AG as $AG3)
                            <option value="{{$AG3->id}}" selected="selected">{{$AG3->ContractorTypeName}}</option>
                        @endforeach
                    </select>

                </div>
                <label for="AgentMob" class="col-sm-2 control-label">الهاتف</label>
                <div class="col-sm-4">
                    <input type="text" name="ContractorMob" value="{{$Single->ContractorMob}}" class="form-control" id="ContractorMob" placeholder="الهاتف" style="margin-bottom: 9px;">
                </div>

            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="ContractorAuth" class="col-sm-2 control-label">رقم الهوية</label>

                <div class="col-sm-4">
                    <input type="text" name="ContractorAuth" value="{{$Single->ContractorAuth}}" class="form-control" id="ContractorAuth" placeholder="رقم الهوية" style="margin-bottom: 9px;">
                </div>
                <label for="ContractorNationType" class="col-sm-2 control-label">نوع الهوية</label>

                <div class="col-sm-4">
                    <input type="text" name="ContractorNationType" value="{{$Single->ContractorNationType}}" class="form-control" id="ContractorNationType" placeholder="نوع الهوية" style="margin-bottom: 9px;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="ContractorEmail" class="col-sm-2 control-label">البريد الالكتروني</label>

                <div class="col-sm-4">
                    <input type="text" name="ContractorEmail" value="{{$Single->ContractorEmail}}" class="form-control" id="ContractorEmail" placeholder="البريد الالكتروني" style="margin-bottom: 9px;">
                </div>

                <label for="ContractorPhone" class="col-sm-2 control-label">رقم الجوال</label>
                <div class="col-sm-4">
                    <input type="text" name="ContractorPhone" value="{{$Single->ContractorPhone}}" class="form-control" id="ContractorPhone" placeholder="رقم الجوال" style="margin-bottom: 9px;">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="ContractorAddress" class="col-sm-2 control-label">العنوان</label>
                <div class="col-sm-10">
                    <textarea name="ContractorAddress" class="form-control" id="ContractorAddress" placeholder="العنوان" style="margin-bottom: 9px;">
                        {{$Single->ContractorAddress}}
                    </textarea>
                </div>

            </div>
        </div>














                <div class="box-footer">
<button class="btn btn-info pull-left">حفظ</button>
              </div>

          {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>

                @endforeach

                </tbody>
              </table>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
@endsection






