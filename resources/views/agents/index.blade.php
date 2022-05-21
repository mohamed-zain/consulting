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
        url: "Agentscreate",
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
            <li class="active">سجل العملاء</li>
          </ol>
          </div>
        </section>
</div>


                 <div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">سجل العملاء</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    	   <div class="" style="margin-bottom: 20px">
  <a href="#" id="Agentscreate" class="btn btn-warning "><i class="fa fa-plus"></i> اضافة عميل</a>

</div>
<table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>#</th>
                  <th>نوع العميل</th>
                  <th>اسم العميل</th>
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
                  <td>{{$Single->AgentType}}</td>
                  <td>{{$Single->AgentName}} {{$Single->AgentName2}} {{$Single->AgentName3}}</td></td>
                  <td>{{$Single->AgentPhone}}</td>
                  <td>{{$Single->AgentEmail}}</td>
                  <td>{{ date('F d, Y', strtotime($Single->created_at)) }}</td>
                   <td>
                       <button id="{{ $Single->id * $Single->id +10 }}" class="btn btn-danger" data-id="{{ $Single->id }}" data-token="{{csrf_token()}}" onclick='
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
       var href = "Agentslist";
        $.ajax({
                            type: "GET",
                            url : "deleteAgents/"+id,
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
                              '>حذف</button>
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
      {{ Form::model($Single,['class'=>'form-horizontal','method'=>'PATCH','route' => ['Agents.update',$Single->id]]) }}
            <input type="hidden" name="id" value="{{$Single->id}}">
        <div class="row">
            <div class="form-group">
                <label for="AgentName" class="col-sm-2 control-label">اسم العميل</label>

                <div class="col-sm-3">
                    <input type="text" name="AgentName" value="{{$Single->AgentName}}" class="form-control" id="AgentName" placeholder="اسم العميل" style="margin-bottom: 9px;">
                </div>
                <div class="col-sm-3">
                    <input type="text" name="AgentName2" value="{{$Single->AgentName2}}" class="form-control" id="AgentName" placeholder="اسم العميل" style="margin-bottom: 9px;">
                </div>
                <div class="col-sm-4">
                    <input type="text" name="AgentName3" value="{{$Single->AgentName3}}" class="form-control" id="AgentName" placeholder="اسم العميل" style="margin-bottom: 9px;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">نوع العميل</label>

                <div class="col-sm-4">

                    <select class="form-control select2" name="AgentType" required="required" style="width: 100%">
                        <?php $AG = App\Models\AgentsNames::all();?>
                        <option  value="">اختر نوع العميل</option>
                        @foreach($AG as $AG3)
                            <option value="{{$AG3->Agnames}}" selected="selected">{{$AG3->Agnames}}</option>
                        @endforeach
                    </select>

                </div>
                <label for="AgentMob" class="col-sm-2 control-label">الهاتف</label>
                <div class="col-sm-4">
                    <input type="text" name="AgentMob" value="{{$Single->AgentMob}}" class="form-control" id="AgentMob" placeholder="الهاتف" style="margin-bottom: 9px;">
                </div>

            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="Agentauth" class="col-sm-2 control-label">رقم الهوية</label>

                <div class="col-sm-4">
                    <input type="text" name="Agentauth" value="{{$Single->Agentauth}}" class="form-control" id="Agentauth" placeholder="رقم الهوية" style="margin-bottom: 9px;">
                </div>
                <label for="NationType" class="col-sm-2 control-label">نوع الهوية</label>

                <div class="col-sm-4">
                    <input type="text" name="NationType" value="{{$Single->NationType}}" class="form-control" id="NationType" placeholder="نوع الهوية" style="margin-bottom: 9px;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="AgentEmail" class="col-sm-2 control-label">البريد الالكتروني</label>

                <div class="col-sm-4">
                    <input type="text" name="AgentEmail" value="{{$Single->AgentEmail}}" class="form-control" id="AgentEmail" placeholder="البريد الالكتروني" style="margin-bottom: 9px;">
                </div>

                <label for="AgentPhone" class="col-sm-2 control-label">رقم الجوال</label>
                <div class="col-sm-4">
                    <input type="text" name="AgentPhone" value="{{$Single->AgentPhone}}" class="form-control" id="AgentPhone" placeholder="رقم الجوال" style="margin-bottom: 9px;">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="AgentAddress" class="col-sm-2 control-label">العنوان</label>
                <div class="col-sm-10">
                    <textarea name="AgentAddress" class="form-control" id="AgentAddress" placeholder="العنوان" style="margin-bottom: 9px;">
                        {{$Single->AgentAddress}}
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






