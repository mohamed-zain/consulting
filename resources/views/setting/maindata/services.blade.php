@extends('layouts.index')
@section('content')

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
                <li class="active">الخدمات الهندسية </li>

            </ol>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">الخدمات الهندسية
                        <a href="#" class="uppercase btn btn-primary" data-toggle="modal" data-target="#Modal">اضافة خدمة هندسية</a>
                    </h3>

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
                            <th>اسم الخدمة</th>
                            <th>رمز الخدمة</th>
                            <th>تعديل </th>
                            <th>حذف </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Data as $Single)
                            <tr>
                                <td>{{ $Single->id }}</td>
                                <td>{{ $Single->ServiceName }}</td>
                                <td>{{ $Single->ServiceCode }}</td>
                                {{--<td>{!! $Single->ServiceDetails !!}  </td>--}}
                                <td><i class="fa fa-edit btn btn-primary" data-toggle="modal" data-target="#edit{{ $Single->id }}"></i></td>
                                <td><button id="{{ $Single->id }}" class="far fa-trash-alt btn btn-danger" data-id="{{$Single->id}}" data-token="{{csrf_token()}}" onclick='
                                            var audio = document.getElementById("audioError");
                                            audio.play();
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
                                            url : "deleteServices/"+id,
                                            data : {
                                            "":id,
                                            "_method":"DELETE",
                                            "_token":token,
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
                                            swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                            }

                                            });

                                            }, 1000);
                                            });
                                            '></button></td>
                            </tr>
                            <script>


                                $(document).ajaxStart(function () {
                                    $(".loa").show();
                                }).ajaxStop(function () {
                                    $(".loa").fadeOut();
                                    $("#Command").fadeIn(3000);
                                });

                                $("#ser{{$Single->id}}").click(function(){
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url: "{{url('/')}}/PackageDetails/{{$Single->id}}",
                                        type: "GET",
                                        success: function(data){
                                            $("#DocsByProplace").html(data);
                                        },
                                        error: function(){
                                            console.log("No results for " + data + ".");
                                        }
                                    });
                                });
                            </script>
                            <div class="modal fade" id="edit{{ $Single->id }}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">تعديل الخدمة الهندسية  </h4>
                                        </div>
                                        <div class="modal-body">
                                            {{ Form::model($Single, ['method' => 'PATCH','class'=>'form-horizontal', 'route' => ['Services.update', $Single->id]]) }}

                                            <input type="hidden" name="ServiceType" value="1">
                                            <div class="form-group">
                                                <label> اسم الخدمة الهندسية</label>
                                                {!! Form::text('ServiceName', null, ['class' => 'form-control', 'placeholder' => 'اكتب اسم الخدمة']) !!}

                                            </div>
                                            <div class="form-group">
                                                <label> رمز الخدمة الهندسية</label>
                                                {!! Form::text('ServiceCode', null, ['class' => 'form-control', 'placeholder' => 'اكتب رمز الخدمة']) !!}

                                            </div>

                                            <div class="form-group">
                                                <label> المدة الزمنية للخدمة</label>
                                                {!! Form::text('Time', null, ['class' => 'form-control', 'placeholder' => 'اكتب الزمنية للخدمة']) !!}

                                            </div>
                                            <div class="form-group">
                                                <label> تفاصيل الخدمة الهندسية</label>
                                                    {!! Form::textarea('ServiceDetails', null, ['class' => 'form-control ckeditor cke_rtl ', 'placeholder' => ' ']) !!}

                                            </div>
                                            <button id="Addproteps" class="btn btn-success">اضافة</button>
                                            {{ Form::close() }}

                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="Modal" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">اضافة خدمة هندسية جديده </h4>
                                </div>
                                <div class="modal-body">
                                    {{ Form::open(array('route'=>'Services.store','id'=>'protepssend')) }}
                                    <input type="hidden" name="ServiceType" value="1">
                                    <div class="form-group">
                                        <label> اسم الخدمة الهندسية</label>
                                        <input type="text" name="ServiceName" class="form-control" placeholder="اكتب اسم الخدمة" required>

                                    </div>
                                    <div class="form-group">
                                        <label> رمز الخدمة الهندسية</label>
                                        <input type="text" name="ServiceCode" class="form-control" placeholder="اكتب رمز الخدمة" required>

                                    </div>
                                    <div class="form-group">
                                        <label> المدة الزمنية للخدمة</label>
                                        <input type="text" name="Time" class="form-control" placeholder="اكتب المدة الزمنية" required>

                                    </div>
                                    <div class="form-group">
                                        <label> تفاصيل الخدمة الهندسية</label>
                                        <textarea id="editor1" name="ServiceDetails" class="form-control" placeholder="اكتب رمز الباقة" required>
                                        </textarea>

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
                if (data2 === ""){
                    var audio = document.getElementById("audioError");
                    audio.play();
                    swal("خطأ", "اكتب اسم الخدمة", "error");
                }else{
                    $.ajax({
                        type: 'POST',
                        url : $(this).attr('action'),
                        data : data2 ,
                        //dataType: 'json',
                        cache:false,

                        success  : function(data) {
                            var audio = document.getElementById("audioSuccess");
                            audio.play();
                            swal("تهانينا!",data , "success");

                        },
                        error: function(xhr, textStatus, thrownError){
                            var audio = document.getElementById("audioError");
                            audio.play();
                            // console.log(thrownError);
                            swal("للأسف!", "لم تتم الاضافة!", "error");
                        }

                    });
                    $("#protepssend").trigger("reset");
                }


            });

        });

        /********************************************************************/
    </script>
@endsection
