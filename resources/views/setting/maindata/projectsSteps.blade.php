 @extends('layouts.index')
@section('content')
    @php $pack = App\Models\packages::all(); @endphp
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
            <li class="active">مراحل المشروع </li>

          </ol>
          </div>
        </section>
    <div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">مراحل المشروع</h3>

      <div class="box-tools pull-right">
          <a href="" class="uppercase btn btn-primary" data-toggle="modal" data-target="#Modal">اضافة مرحلة</a>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="col-md-12">
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    @foreach($pack as $key => $item)
                    <li class="@if($key == 1) active @endif"><a href="#{{ $item->id }}" data-toggle="tab">{{ $item->packageName }}</a></li>
                    @endforeach
                    <li class="pull-left header">مراحل المشروع حسب الباقة<i class="fa fa-th"></i> </li>
                </ul>
                <div class="tab-content">
                    @foreach($pack as $key => $item)
                    <div class="tab-pane @if($key == 1) active @endif" id="{{ $item->id }}">
                        <b>How to use:</b>

                        <table id="example" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المرحلة</th>
                                <th>تعديل </th>
                                <th>حذف </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $dat = App\Models\ProjectsSteps::where('PackageID','=',$item->id)->get(); @endphp
                            @foreach($dat as $Single)

                                <tr>
                                    <td>{{ $Single->id }}</td>
                                    <td>{{ $Single->LevelName }}</td>
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
                                                url : "deletprojectsSteps/"+id,
                                                data : {
                                                "":id,
                                                "_method":"DELETE",
                                                "_token":token,
                                                },
                                                //dataType: "json",
                                                cache:false,

                                                success  : function(data) {
                                                swal("تهانينا!",data , "success");

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
                    @endforeach
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>

         <div class="modal fade" id="Modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اضافة مرحلة </h4>
        </div>
        <div class="modal-body">
    {{ Form::open(array('route'=>'projectsSteps.store','id'=>'protepssend')) }}
            <div class="form-group">
            <label> اختر الباقة</label>
            <select  name="PackageID" class="form-control select2" style="width: 100%">
                <option value="">-------اختر الباقة-----</option>

                @foreach($pack as $packs)
                <option value="{{ $packs->id }}">{{ $packs->packageName }}</option>
                    @endforeach
            </select>
            </div>
            <div class="form-group">
                <label>مرحلة جديده</label>
                <input type="text" name="LevelName" class="form-control" placeholder="اكتب مرحلة جديده">
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
                            data : data2 ,
                            //dataType: 'json',
                            cache:false,

                            success  : function(data) {
                                swal("تهانينا!",data , "success");

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
