@extends('index')
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
                <li class="active">الزيارات الفنية</li>

            </ol>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">الزيارات الفنية لأرض المشروع

                    </h3>

                    <div class="box-tools pull-right">
                        <a href="#" class="uppercase btn btn-primary" data-toggle="modal" data-target="#Modal">اضافة جديد</a>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 table-responsive" >
                            <div class="col-md-12">
                                <!-- Custom Tabs (Pulled to the right) -->
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        @foreach(App\Models\ClassesSiteVisit::all() as $key => $ClassV)
                                        <li class="@if($ClassV->id == '1') active @endif"><a href="#tab_{{ $ClassV->id }}" data-toggle="tab">{{ $ClassV->class_name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach(App\Models\ClassesSiteVisit::all() as $key => $ClassV)
                                            @php $jhfgf = App\Models\ClassesSiteVisit::find($ClassV->id)->visitCat; @endphp
                                        <div class="tab-pane @if($ClassV->id == '1') active @endif" id="tab_{{ $ClassV->id }}">
                                            <table id="" class="table table-bordered table-striped table-responsive example">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>اسم الزيارة</th>
                                                    <th> المرحلة</th>
                                                    <th>رقم الزيارة </th>
                                                    <th>تعديل </th>
                                                    <th>حذف </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($jhfgf as $Single)
                                                    <tr>
                                                        <td>{{ $Single->id }}</td>
                                                        <td>{{ $Single->category_title }}</td>
                                                        <td>{{ $Single->VisitClass->class_name }}</td>
                                                        <td>{{ $Single->category_number }}</td>
                                                        <td><i class="btn btn-warning fa fa-pen-nib"  data-toggle="modal" data-target="#editvisit{{ $Single->id }}"></i> </td>
                                                        <td><button id="{{ $Single->id }}" class="fa fa-trash-alt btn btn-danger" data-id="{{$Single->id}}" data-token="{{csrf_token()}}" onclick='
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
                                                                    url : "delete_SiteVisitCategory/"+id,
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
                                                                    setTimeout(function() {
                                                                    var href = "{{url('SiteVisitCategory')}}";
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

                                                    <div class="modal fade" id="editvisit{{ $Single->id }}" role="dialog">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">اضافة نوع زيارة جديده </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{ Form::model($Single, ['method' => 'PATCH','class'=>'form-horizontal', 'route' => ['SiteVisitCategory.update', $Single->id]]) }}
                                                                    <div class="form-group col-lg-12">
                                                                        <label> اسم الزيارة</label>
                                                                        {!! Form::text('category_title', null, ['class' => 'form-control', 'placeholder' => 'اكتب اسم الزيارة']) !!}
                                                                    </div>
                                                                    <div class="form-group col-lg-12">
                                                                        <label> اسم المرحلة</label>
                                                                        {!! Form::select('category_class',App\Models\ClassesSiteVisit::pluck('class_name','id'),null, ['class' => 'form-control select2','style' => 'width:100%']) !!}
                                                                    </div>

                                                                    <div class="form-group col-lg-12">
                                                                        <label> تفاصيل الزيارة</label>
                                                                        {!! Form::textarea('category_details', null, ['class' => 'form-control textarea', 'id' => 'editor1', 'placeholder' => 'تفاصيل الزيارة']) !!}
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
                                            </div>
                                    @endforeach

                                        <!-- /.tab-pane -->

                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div>
                                <!-- nav-tabs-custom -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="modal fade" id="Modal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">اضافة نوع زيارة جديده </h4>
                                </div>
                                <div class="modal-body">
                                    {{ Form::open(array('route'=>'SiteVisitCategory.store','id'=>'protepssend')) }}
                                    <div class="form-group col-lg-12">
                                        <label> اسم الزيارة</label>
                                        <input type="text" name="category_title" class="form-control" placeholder="اكتب اسم الزيارة" required>

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label> اسم المرحلة</label>
                                        @php $class = App\Models\ClassesSiteVisit::all(); @endphp
                                        <select name="category_class" class="from-control select2" style="width: 100%">

                                            <option value="">----------اختر المرحلة----------</option>
                                            @foreach($class as $item)
                                            <option value="{{ $item->id }}">{{ $item->class_name }}</option>
                                                @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label> رقم الزيارة</label>
                                        @php $class = App\Models\ClassesSiteVisit::all();   @endphp
                                        <select name="category_number" class="from-control select2" style="width: 100%">

                                            <option value="">----------اختر رقم الزيارة----------</option>
                                            @include('setting.maindata.sitevisit.visitNoInclude')
                                        </select>

                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label> تفاصيل الزيارة</label>
                                        <textarea  name="category_details" class="form-control textarea" placeholder="اكتب اسم الزيارة" required rows="8" id="editor1"></textarea>

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
                    swal("خطأ", "اكتب اسم الباقة", "error");
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
                            setTimeout(function() {
                                var href = "{{url('SiteVisitCategory')}}";
                                window.location.href = href;
                            },1000);


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
