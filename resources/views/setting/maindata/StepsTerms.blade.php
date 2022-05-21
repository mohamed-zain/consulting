 @extends('index')
@section('content')
    @php $pack = App\Models\ProjectsSteps::all(); @endphp
<section class="content-header">
        <div class="">
          <h3>
            الاعدادات
            <small>البيانات الاساسية</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('MainSetting') }}">الاعدادات</a></li>
            <li class="active">البيانات الاساسية</li>
            <li class="active">بنود مراحل المشروع </li>

          </ol>
          </div>
        </section>
    <div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">بنود مراحل المشروع</h3>

      <div class="box-tools pull-right">
          <a href="" class="uppercase btn btn-primary" data-toggle="modal" data-target="#Modal">اضافة بند</a>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="col-md-12">
            <!-- Custom Tabs (Pulled to the right) -->
            <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>#</th>
                    <th>اسم البند</th>
                    <th> المرحلة</th>
                    <th>تعديل </th>
                    <th>حذف </th>
                </tr>
                </thead>
                <tbody>
                @foreach($Data as $Single)

                    <tr>
                        <td>{{ $Single->id }}</td>
                        <td>{{ $Single->TermName }}</td>
                        <td>{{ $Single->StepOFTerm->LevelName }}</td>
                        <td><i class="fa fa-edit btn btn-primary"></i></td>
                        <td><button id="{{ $Single->id }}" class="fa fa-trash btn btn-danger" data-id="{{$Single->id}}" data-token="{{csrf_token()}}" onclick='
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
                                    url : "deleteStepsTerm/"+id,
                                    data : {
                                    "":id,
                                    "_method":"DELETE",
                                    "_token":token,
                                    },
                                    //dataType: "json",
                                    cache:false,

                                    success  : function(data) {
                                    swal("تهانينا!",data , "success");
                                    setTimeout(function() {
                                    var href = "{{url('StepsTerms')}}";
                                    window.location.href = href;
                                    },1000);
                                    },
                                    error: function(xhr, textStatus, thrownError){
                                    // console.log(thrownError);
                                    swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                    }

                                    });

                                    }, 1000);
                                    });
                                    '></button></td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

         <div class="modal fade" id="Modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اضافة بند </h4>
        </div>
        <div class="modal-body">
    {{ Form::open(array('route'=>'StepsTerms.store','id'=>'protepssend')) }}
            <div class="form-group">
            <label> اختر المرحلة</label>
            <select  name="StepID" class="form-control select2" style="width: 100%">
                <option value="">-------اختر المرحلة-----</option>

                @foreach($pack as $packs)
                <option value="{{ $packs->id }}">{{ $packs->LevelName }}</option>
                    @endforeach
            </select>
            </div>
            <div class="form-group">
                <label> اسم البند</label>
                <input type="text" name="TermName" class="form-control" placeholder="اكتب  اسم البند ">
            </div>
         <button id="Addproteps" class="btn btn-success">اضافة</button>
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
/********************************************************************/
               $('#Addproteps').click(function () {

                    $( "#protepssend" ).on( "submit", function( event ) {

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
                                swal("تهانينا!",data , "success");
                                setTimeout(function() {
                                    var href = "{{url('StepsTerms')}}";
                                    window.location.href = href;
                                },1000);
                            },
                             error: function(xhr, textStatus, thrownError){
                             // console.log(thrownError);
                              swal("للأسف!", "لم اضافة بنجاح!", "error");
                            }

                        });
                        $("#protepssend").trigger("reset");

                    });

                });

      /********************************************************************/
</script>
@endsection
