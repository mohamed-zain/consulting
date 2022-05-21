@extends('SUPPORT.layout')
@section('content')
    <div class="">
        <section class="content-header">
            <div class="">
                <h3>
                    الدعم الفني
                    <small> وادارة التطبيق</small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> تطبيق خير عون</a></li>
                    <li class="active"><a href="#"> بيانات الباقات داخل التطبيق</a></li>
                </ol>
            </div>
        </section>
    </div>
<div class="row ">
    <div class="col-md-3">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">روابط التنقل</h3>
                <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body no-padding">
                @include('SUPPORT.sub_aside')
            </div><!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-9" style="margin-left:0px !important">
        <div class="box box-solid" >
            <div class="box-header with-border">
                <h3 class="box-title">قائمة الباقات</h3>
                <div class="box-tools">
                    <a href="" class="uppercase btn btn-primary" data-toggle="modal" data-target="#Modal">اضافة باقة جديدة</a>
                </div>
            </div>
            <div class="box-body table-responsive" style="min-height:350px">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الباقة</th>
                        <th>الصورة </th>
                        <th>رمز الباقة </th>
                        <th>السعر </th>
                        <th>عن الباقة </th>
                        <th>تفاصيل ١ </th>
                        <th>تفاصيل ٢ </th>
                        <th>رابط الاشتراك </th>
                        <th>تعديل </th>
                        <th>حذف </th>
                    </tr>
                    </thead>
                    <tbody id="comm">
                    @foreach($Data as $Single)
                        <tr>
                            <td>{{ $Single->id }}</td>
                            <td>{{ $Single->name }}</td>
                            <td><a href="{{ $Single->picture }}" target="_blank"><img src="{{ $Single->picture }}" style="height:100px;width:100px;"/></a></td>
                            <td>{{  $Single->code }}</td>
                            <td>{{ $Single->price }}</td>
                            <td>{{ Str::limit($Single->about, $limit = 10, $end = '...الخ') }}</td>
                            <td>{{ Str::limit($Single->about2, $limit = 10, $end = '...الخ') }}</td>
                            <td>{{ Str::limit($Single->about3, $limit = 10, $end = '...الخ') }}</td>
                            <td><a href="{{ $Single->pro_url }}" target="_blank">URL</a></td>
                            <td><i class="fa fa-edit btn btn-primary" data-toggle="modal" data-target="#edit{{ $Single->id }}"></i></td>
                            <td>
                                <button id="{{ $Single->id }}" class="fa fa-trash-o btn btn-danger" data-id="{{$Single->id}}" data-token="{{csrf_token()}}" onclick='
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
                                    url : "deAppPackage/"+id,
                                    data : {
                                    "":id,
                                    "_method":"DELETE",
                                    "_token":token,
                                    },
                                    //dataType: "json",
                                    cache:false,

                                    success  : function(data) {
                                    $.ajax({
                                    url: "Getag",
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
                                    '><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <div class="modal fade" id="edit{{ $Single->id }}" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">تعديل بيانات الباقة  </h4>
                                    </div>
                                    <div class="modal-body">
                                        {{ Form::model($Single, ['method' => 'PATCH','class'=>'form-horizontal', 'route' => ['KoAppData.update', $Single->id]]) }}
                                        <input type="hidden" name="cat" value="p">
                                        <div class="form-group">
                                            <label> اسم  الباقة</label>
                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                        </div>
                                        <div class="form-group">
                                            <label> رابط الصورة</label>
                                            {!! Form::text('picture', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                        </div>
                                        <div class="form-group">
                                            <label> رمز  الباقة</label>
                                            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                        </div>

                                        <div class="form-group">
                                            <label> السعر</label>
                                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                        </div>

                                        <div class="form-group">
                                            <label> رابط الاشتراك في الباقة</label>
                                            {!! Form::text('pro_url', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                        </div>
                                        <div class="form-group">
                                            <label> تفاصيل الخدمة الهندسية</label>
                                            {!! Form::text('about', null, ['class' => 'form-control ckeditor cke_rtl ', 'placeholder' => ' ']) !!}

                                        </div>

                                        <div class="form-group">
                                            <label> تفاصيل الخدمة 2</label>
                                            {!! Form::text('about2', null, ['class' => 'form-control ckeditor cke_rtl ', 'placeholder' => ' ']) !!}

                                        </div>

                                        <div class="form-group">
                                            <label> تفاصيل الخدمة 3</label>
                                            {!! Form::text('about3', null, ['class' => 'form-control ckeditor cke_rtl ', 'placeholder' => ' ']) !!}

                                        </div>
                                        <button id="Addproteps" class="btn btn-success">تعديل</button>
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
                                <h4 class="modal-title">اضافة باقة جديدة</h4>
                            </div>
                            <div class="modal-body">
                                {{ Form::open(array('route'=>'add_new_package','id'=>'Addnch333')) }}
                                <div class="form-group">
                                    <label>اسم الباقة</label>
                                    <input type="text" name="name" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>رابط الصورة - من الموقع</label>
                                    <input type="text" name="picture" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label> رمز الباقة</label>
                                    <input type="text" name="code" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label> السعر</label>
                                    <input type="text" name="price" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>  المستفيد من الباقة</label>
                                    <input type="text" name="about" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label> ماهية التصميم في الباقة</label>
                                    <input type="text" name="about2" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label> المرافق الاساسية</label>
                                    <input type="text" name="about3" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label> رابط الاشتراك - للموقع الالكتروني</label>
                                    <input type="text" name="pro_url" class="form-control" placeholder="">
                                </div>

                                <button id="Branchs" class="btn btn-success">اضافة</button>
                                {{ Form::close() }}

                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.box-body -->
        </div>
    </div>
</div>
    <script>
        /********************************************************************/
        /********************************************************************/
        $('#Branchs').click(function () {

            $( "#Addnch333" ).on( "submit", function( event ) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                event.preventDefault();

                var data2    = $( this ).serialize();

                $.ajax({
                    type: 'POST',
                    url : $(this).attr('action'),
                    data : data2,
                    //dataType: 'json',
                    cache:false,

                    success  : function(data) {
                        $.ajax({
                            url: "Getag",
                            type: "GET",
                            success: function(data){
                                $("#comm").html(data)

                            },
                            error: function(){
                                console.log("No results for " + data + ".");
                            }
                        });
                        swal("تهانينا!",data , "success");
                        $( this ).trigger("reset");

                    },
                    error: function(xhr, textStatus, thrownError){
                        // console.log(thrownError);
                        swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                    }

                });

            });

        });

        /*********************************************************************/
    </script>
@endsection
