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
                    <li class="active"><a href="#"> بيانات الخدمات</a></li>
                </ol>
            </div>
        </section>
    </div>
    <div class="row">
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
        <div class="col-md-8" style="margin-left:0px !important">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">الخدمات الهندسية</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">الخدمات التجارية</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"> خدمات التعديل في المخططات</a></li>
                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false"> خدمات الاستشاري</a></li>
                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box box-solid" >
                            <div class="box-header with-border">
                                <h3 class="box-title">قائمة الخدمات الهندسية</h3>
                                <div class="box-tools">
                                    <a href="" class="uppercase btn btn-primary" data-toggle="modal" data-target="#Modal">اضافة خدمة هندسية جديدة</a>
                                </div>
                            </div>
                            <div class="box-body table-responsive" style="min-height:350px">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الخدمة</th>
                                        <th>الصورة </th>
                                        <th>رمز الخدمة </th>
                                        <th>السعر </th>
                                        <th>عن الخدمة </th>
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
                                                        <h4 class="modal-title">تعديل بيانات الخدمة  </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ Form::model($Single, ['method' => 'PATCH','class'=>'form-horizontal', 'route' => ['KoAppData.update', $Single->id]]) }}

                                                        <div class="form-group">
                                                            <label> اسم  الخدمة</label>
                                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> رابط الصورة</label>
                                                            {!! Form::text('picture', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> رمز  الخدمة</label>
                                                            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>

                                                        <div class="form-group">
                                                            <label> السعر</label>
                                                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>

                                                        <div class="form-group">
                                                            <label> رابط الاشتراك في الخدمة</label>
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


                            </div><!-- /.box-body -->
                        </div>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="box box-solid" >
                            <div class="box-header with-border">
                                <h3 class="box-title">قائمة الخدمات التجاريه</h3>
                                <div class="box-tools">
                                    <a href="" class="uppercase btn btn-primary" data-toggle="modal" data-target="#Modal2">اضافة خدمة تجارية جديدة</a>
                                </div>
                            </div>
                            <div class="box-body table-responsive" style="min-height:350px">
                                <table id="example2" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الخدمة</th>
                                        <th>الصورة </th>
                                        <th>رمز الخدمة </th>
                                        <th>السعر </th>
                                        <th>عن الخدمة </th>
                                        <th>تفاصيل ١ </th>
                                        <th>تفاصيل ٢ </th>
                                        <th>رابط الاشتراك </th>
                                        <th>تعديل </th>
                                        <th>حذف </th>
                                    </tr>
                                    </thead>
                                    <tbody id="comm">
                                    @foreach($Data2 as $Single2)
                                        <tr>
                                            <td>{{ $Single2->id }}</td>
                                            <td>{{ $Single2->name }}</td>
                                            <td><a href="{{ $Single2->picture }}" target="_blank"><img src="{{ $Single2->picture }}" style="height:100px;width:100px;"/></a></td>
                                            <td>{{  $Single2->code }}</td>
                                            <td>{{ $Single2->price }}</td>
                                            <td>{{ Str::limit($Single2->about, $limit = 10, $end = '...الخ') }}</td>
                                            <td>{{ Str::limit($Single2->about2, $limit = 10, $end = '...الخ') }}</td>
                                            <td>{{ Str::limit($Single2->about3, $limit = 10, $end = '...الخ') }}</td>
                                            <td><a href="{{ $Single2->pro_url }}" target="_blank">URL</a></td>
                                            <td><i class="fa fa-edit btn btn-primary" data-toggle="modal" data-target="#edit2{{ $Single2->id }}"></i></td>
                                            <td>
                                                <button id="{{ $Single2->id }}" class="fa fa-trash-o btn btn-danger" data-id="{{$Single2->id}}" data-token="{{csrf_token()}}" onclick='
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
                                                    var id = $("#{{ $Single2->id }}").data("id");
                                                    var token = $("#{{ $Single2->id }}").data("token");
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

                                                    swal("Done!",data , "success");

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
                                        <div class="modal fade" id="edit2{{ $Single2->id }}" role="dialog">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">تعديل بيانات الخدمة  </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ Form::model($Single2, ['method' => 'PATCH','class'=>'form-horizontal', 'route' => ['KoAppData.update', $Single->id]]) }}

                                                        <div class="form-group">
                                                            <label> اسم  الخدمة</label>
                                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> رابط الصورة</label>
                                                            {!! Form::text('picture', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> رمز  الخدمة</label>
                                                            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>

                                                        <div class="form-group">
                                                            <label> السعر</label>
                                                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>

                                                        <div class="form-group">
                                                            <label> رابط الاشتراك في الخدمة</label>
                                                            {!! Form::text('pro_url', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> تفاصيل الخدمة </label>
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


                            </div><!-- /.box-body -->
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_3">
                        <div class="box box-solid" >
                            <div class="box-header with-border">
                                <h3 class="box-title">خدمات التعديل علي المخططات</h3>
                                <div class="box-tools">
                                    <a href="" class="uppercase btn btn-primary" data-toggle="modal" data-target="#Modal2">اضافة خدمة تجارية جديدة</a>
                                </div>
                            </div>
                            <div class="box-body table-responsive" style="min-height:350px">
                                <table id="example2" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الخدمة</th>
                                        <th>الصورة </th>
                                        <th>رمز الخدمة </th>
                                        <th>السعر </th>
                                        <th>عن الخدمة </th>
                                        <th>تفاصيل ١ </th>
                                        <th>تفاصيل ٢ </th>
                                        <th>رابط الاشتراك </th>
                                        <th>تعديل </th>
                                        <th>حذف </th>
                                    </tr>
                                    </thead>
                                    <tbody id="comm">
                                    @foreach($Data3 as $Single2)
                                        <tr>
                                            <td>{{ $Single2->id }}</td>
                                            <td>{{ $Single2->name }}</td>
                                            <td><a href="{{ $Single2->picture }}" target="_blank"><img src="{{ $Single2->picture }}" style="height:100px;width:100px;"/></a></td>
                                            <td>{{  $Single2->code }}</td>
                                            <td>{{ $Single2->price }}</td>
                                            <td>{{ Str::limit($Single2->about, $limit = 10, $end = '...الخ') }}</td>
                                            <td>{{ Str::limit($Single2->about2, $limit = 10, $end = '...الخ') }}</td>
                                            <td>{{ Str::limit($Single2->about3, $limit = 10, $end = '...الخ') }}</td>
                                            <td><a href="{{ $Single2->pro_url }}" target="_blank">URL</a></td>
                                            <td><i class="fa fa-edit btn btn-primary" data-toggle="modal" data-target="#edit2{{ $Single2->id }}"></i></td>
                                            <td>
                                                <button id="{{ $Single2->id }}" class="fa fa-trash-o btn btn-danger" data-id="{{$Single2->id}}" data-token="{{csrf_token()}}" onclick='
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
                                                    var id = $("#{{ $Single2->id }}").data("id");
                                                    var token = $("#{{ $Single2->id }}").data("token");
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

                                                    swal("Done!",data , "success");

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
                                        <div class="modal fade" id="edit2{{ $Single2->id }}" role="dialog">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">تعديل بيانات الخدمة  </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ Form::model($Single2, ['method' => 'PATCH','class'=>'form-horizontal', 'route' => ['KoAppData.update', $Single->id]]) }}

                                                        <div class="form-group">
                                                            <label> اسم  الخدمة</label>
                                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> رابط الصورة</label>
                                                            {!! Form::text('picture', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> رمز  الخدمة</label>
                                                            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>

                                                        <div class="form-group">
                                                            <label> السعر</label>
                                                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>

                                                        <div class="form-group">
                                                            <label> رابط الاشتراك في الخدمة</label>
                                                            {!! Form::text('pro_url', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> تفاصيل الخدمة </label>
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


                            </div><!-- /.box-body -->
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_4">
                        <div class="box box-solid" >
                            <div class="box-header with-border">
                                <h3 class="box-title">قائمة المكاتب الاستشارية</h3>
                                <div class="box-tools">
                                    <a href="" class="uppercase btn btn-primary" data-toggle="modal" data-target="#Modal2">اضافة خدمة تجارية جديدة</a>
                                </div>
                            </div>
                            <div class="box-body table-responsive" style="min-height:350px">
                                <table id="example2" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الخدمة</th>
                                        <th>الصورة </th>
                                        <th>رمز الخدمة </th>
                                        <th>السعر </th>
                                        <th>عن الخدمة </th>
                                        <th>تفاصيل ١ </th>
                                        <th>تفاصيل ٢ </th>
                                        <th>رابط الاشتراك </th>
                                        <th>تعديل </th>
                                        <th>حذف </th>
                                    </tr>
                                    </thead>
                                    <tbody id="comm">
                                    @foreach($Data3 as $Single2)
                                        <tr>
                                            <td>{{ $Single2->id }}</td>
                                            <td>{{ $Single2->name }}</td>
                                            <td><a href="{{ $Single2->picture }}" target="_blank"><img src="{{ $Single2->picture }}" style="height:100px;width:100px;"/></a></td>
                                            <td>{{  $Single2->code }}</td>
                                            <td>{{ $Single2->price }}</td>
                                            <td>{{ Str::limit($Single2->about, $limit = 10, $end = '...الخ') }}</td>
                                            <td>{{ Str::limit($Single2->about2, $limit = 10, $end = '...الخ') }}</td>
                                            <td>{{ Str::limit($Single2->about3, $limit = 10, $end = '...الخ') }}</td>
                                            <td><a href="{{ $Single2->pro_url }}" target="_blank">URL</a></td>
                                            <td><i class="fa fa-edit btn btn-primary" data-toggle="modal" data-target="#edit2{{ $Single2->id }}"></i></td>
                                            <td>
                                                <button id="{{ $Single2->id }}" class="fa fa-trash-o btn btn-danger" data-id="{{$Single2->id}}" data-token="{{csrf_token()}}" onclick='
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
                                                        var id = $("#{{ $Single2->id }}").data("id");
                                                        var token = $("#{{ $Single2->id }}").data("token");
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

                                                        swal("Done!",data , "success");

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
                                        <div class="modal fade" id="edit2{{ $Single2->id }}" role="dialog">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">تعديل بيانات الخدمة  </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ Form::model($Single2, ['method' => 'PATCH','class'=>'form-horizontal', 'route' => ['KoAppData.update', $Single->id]]) }}

                                                        <div class="form-group">
                                                            <label> اسم  الخدمة</label>
                                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> رابط الصورة</label>
                                                            {!! Form::text('picture', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> رمز  الخدمة</label>
                                                            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>

                                                        <div class="form-group">
                                                            <label> السعر</label>
                                                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>

                                                        <div class="form-group">
                                                            <label> رابط الاشتراك في الخدمة</label>
                                                            {!! Form::text('pro_url', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                                                        </div>
                                                        <div class="form-group">
                                                            <label> تفاصيل الخدمة </label>
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


                            </div><!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اضافة خدمة هندسية جديدة</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('route'=>'add_new_package','id'=>'Addnch333')) }}
                    <input type="hidden" name="cat" value="s">
                    <div class="form-group">
                        <label>اسم الخدمة</label>
                        <input type="text" name="name" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>رابط الصورة - من الموقع</label>
                        <input type="text" name="picture" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> رمز الخدمة</label>
                        <input type="text" name="code" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> السعر</label>
                        <input type="text" name="price" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>  المستفيد من الخدمة</label>
                        <input type="text" name="about" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> ماهية التصميم في الخدمة</label>
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
    <div class="modal fade" id="Modal2" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اضافة خدمة تجارية جديدة</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('route'=>'add_new_package','id'=>'Addnch222')) }}
                    <input type="hidden" name="cat" value="ts">
                    <div class="form-group">
                        <label>اسم الخدمة</label>
                        <input type="text" name="name" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>رابط الصورة - من الموقع</label>
                        <input type="text" name="picture" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> رمز الخدمة</label>
                        <input type="text" name="code" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> السعر</label>
                        <input type="text" name="price" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>  المستفيد من الخدمة</label>
                        <input type="text" name="about" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label> ماهية التصميم في الخدمة</label>
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

                    <button id="Branchs2" class="btn btn-success">اضافة</button>
                    {{ Form::close() }}

                </div>
                <div class="modal-footer">

                </div>
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
    <script>
        /********************************************************************/
        /********************************************************************/
        $('#Branchs2').click(function () {

            $( "#Addnch222" ).on( "submit", function( event ) {

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
