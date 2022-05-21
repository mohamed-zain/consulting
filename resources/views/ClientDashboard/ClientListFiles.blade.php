@extends('ClientDashboard.layouts.layout')
@section('content')
    <style>
        .btn-app{
            width: 100%;
            height: 200px;
            color: #e39548;
            border: solid 2px #e39548;
        }
        #dsaf{
            width: 520px;
            height: 200px;
            border: 4px dashed #001f3f ;
        }
        #dsaf > p{
            width: 100%;
            height: 100%;
            text-align: center;
            line-height: 170px;
            color: black;
            font-family: Arial;
        }
        #frt {
            position: absolute;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 50%;
            outline: none;
            opacity: 0;
        }
    </style>
    <div class="">
        <section class="content-header">
            <div class="">
                <h3>
                    عميل خير عون
                    <small> برنامج خيرعون لإدارة الخدمات الهندسية </small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('EngineerDashboard') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                </ol>
            </div>
        </section>
    </div>

    <div class="col-md-12">
        <div class="col-md-3">

            <!-- Profile Image -->
            @include('ClientDashboard.layouts.aside')

        </div>
        <!-- /.col -->
        <div class="col-md-9">

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">ملفات - {{$code}} - {{$na->ServiceID}} </h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" style="height: 400px;">
                    <div class="table-responsive" style="height: 400px;">

                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>اسم الملف</th>
                                <th>حالة الملف</th>
                                <th>سبب الرفض</th>
                                <th>تاريخ الرفع</th>
                                <th>خيارات</th>
                                <th>التصنيف</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($Single))
                            @foreach($Single as $item)
                            <tr>
                                <td>
                                    @if($item->mission=='E0')
                                        @if($item->reject_accept =='0')
                                            <span class="label label-warning">في انتظار التعميد</span>
                                        @elseif($item->reject_accept =='2')
                                            <span class="label label-success"> تم التعميد</span>
                                        @elseif($item->reject_accept =='1')
                                            <span class="label label-danger">مرفوض</span>

                                        @endif
                                    @else
                                        <span class="label label-warning"> لا يحتاج تعميد</span>
                                    @endif


                                </td>
                                <td>{{$item->DocName}}</td>
                                <td>
                                    @if($item->reject_reason==null)
                                        -----------
                                    @else
                                        {{$item->reject_reason}}
                                        @endif
                                </td>
                                <td><a href="#" style="direction: rtl">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</a></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank">عرض</a></li>
                                            @if($item->mission=='E0')
                                                @if($item->reject_accept =='0')
                                                    <li class="divider"></li>
                                                    <li>

                                                        <a  href="#" id="{{ $item->id }}" data-id="{{$item->id}}" data-token="{{csrf_token()}}" onclick='
                                                                swal({
                                                                title: "هل انت متأكد؟",
                                                                text: "عند الاستمرار سيتم تعميد المخططات المعمارية من طرفكم",
                                                                type: "info",
                                                                showCancelButton: true,
                                                                closeOnConfirm: false,
                                                                showLoaderOnConfirm: true,
                                                                },
                                                                function(){
                                                                setTimeout(function(){
                                                                var id = $("#{{ $item->id }}").data("id");
                                                                var token = $("#{{ $item->id }}").data("token");
                                                                $.ajax({
                                                                type: "POST",
                                                                url : "https://app.ko-sky.com/api/acceptFile",
                                                                data : {
                                                                "":id,
                                                                "_method":"POST",
                                                                "_token":token,
                                                                "f_id":"{{$item->id}}",
                                                                },
                                                                //dataType: "json",
                                                                cache:false,
                                                                success  : function(data) {
                                                                swal("تهانينا!","تم تعميد التصميم" , "success");
                                                                setTimeout(function() {
                                                                var href = "{{url('ClientListFiles')}}/{{ $code }}/{{ $benaar }}";
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
                                                                '> تعميد مخططات المعماري</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#Modal3333{{ $item->id }}">رفض التصميم</a>
                                                    </li>

                                                @endif
                                            @else

                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    @if($item->cat =='1')
                                        <span class="label label-success">المخططات</span>
                                    @elseif($item->cat =='2')
                                        <span class="label label-warning">تقارير كميات</span>
                                    @elseif($item->cat =='3')
                                        <span class="label label-danger">توصيات</span>
                                    @else
                                        <span class="label label-primary">اخرى</span>
                                    @endif
                                </td>

                            </tr>
                            <div class="modal fade" id="Modal3333{{ $item->id }}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"> اكتب اسباب الرفض </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('RejectFile') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="f_id" value="{{ $item->id }}">
                                                <div class="form-group">
                                                    <textarea name="reason" rows="9" class="form-control">

                                                    </textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-warning">ارسال</button>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="4"><span style="color: red">لا توجد ملفات</span></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <a href="{{ url('ClientEnd') }}" class="btn btn-sm btn-default btn-flat pull-right">رجوع للسابق</a>
                </div>
            </div>
        </div>
    </div>


@endsection
