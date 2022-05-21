@extends('EngineerDashboard.layouts.layout')
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
                    مهندس خير عون
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

            @include('EngineerDashboard.layouts.aside')
            @include('EngineerDashboard.layouts.notes')
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            @include('EngineerDashboard.layouts.statsBar')

            <div class="row">
                <div class="col-md-12">
                    <!-- USERS LIST -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title"> الملفات </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-responsive">
                                <thead>
                                <tr>

                                    <th>حالة الملف</th>
                                    <th>اسم الملف</th>
                                    <th>المشروع </th>
                                    <th>سبب الرفض</th>
                                    <th>تاريخ الرفع</th>
                                    <th>خيارات</th>
                                    <th>التصنيف</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($Data))
                                    @foreach($Data as $item)
                                        <tr>

                                            <td>
                                                @if($item->mission=='S3')
                                                    @if($item->reject_accept =='0')
                                                        <span class="label label-warning">في الانتظار</span>
                                                    @elseif($item->reject_accept =='2')
                                                        <span class="label label-success"> مقبول</span>
                                                    @elseif($item->reject_accept =='1')
                                                        <span class="label label-danger">مرفوض</span>
                                                    @endif
                                                @elseif($item->mission=='E0')
                                                    @if($item->reject_accept =='0')
                                                        <span class="label label-warning">في الانتظار</span>
                                                    @elseif($item->reject_accept =='2')
                                                        <span class="label label-success"> مقبول</span>
                                                    @elseif($item->reject_accept =='1')
                                                        <span class="label label-danger">مرفوض</span>

                                                    @endif
                                                @else
                                                    <span class="label label-warning"> لا يحتاج موافقة</span>
                                                @endif


                                            </td>
                                            <td>{{$item->DocName}}</td>
                                            <td>{{$item->FileCode}}</td>
                                            <td>
                                                @if($item->reject_reason==null)
                                                    -----------
                                                @else
                                                    {{$item->reject_reason}}
                                                @endif
                                            </td>
                                            <td><a href="#" style="direction: rtl">{{ date('F d, Y', strtotime($item->created_at)) }} </a></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> خيارات
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank">عرض</a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#accept{{ $item->DID }}"> تعديل</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                @if($item->mission == 'S3')
                                                    @if($item->cat =='11')
                                                        <span class="label label-success">المخططات المعتمدة</span>
                                                    @elseif($item->cat =='10')
                                                        <span class="label label-warning">Mood Board</span>
                                                    @elseif($item->cat =='12')
                                                        <span class="label label-warning">ملفات الاستاندرد</span>
                                                    @elseif($item->cat =='13')
                                                        <span class="label label-danger">التصميم الداخلي</span>
                                                    @elseif($item->cat =='14')
                                                        <span class="label label-danger">تصاميم الاثاث</span>
                                                    @elseif($item->cat =='15')
                                                        <span class="label label-primary">المخططات التنفيذية</span>
                                                    @elseif($item->cat =='16')
                                                        <span class="label label-primary"> ملفات الكميات</span>
                                                    @endif
                                                @else
                                                @if($item->cat =='1')
                                                    <span class="label label-success">المخططات</span>
                                                @elseif($item->cat =='2')
                                                    <span class="label label-warning">تقارير كميات</span>
                                                @elseif($item->cat =='3')
                                                    <span class="label label-danger">توصيات</span>
                                                @elseif($item->cat =='5')
                                                    <span class="label label-danger">واجهات</span>
                                                @else
                                                    <span class="label label-primary">اخرى</span>
                                                @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="accept{{ $item->DID }}" role="dialog">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">تعديل بيانات الملف</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ url('UpEngFile') }}" method="POST">
                                                        @csrf
                                                            <input type="hidden" name="id" value="{{ $item->DID }}">
                                                            <div class="form-group">
                                                                <label>تعديل الاسم</label>
                                                                <input type="text" name="DocName" class="form-control" value="{{ $item->DocName }}">
                                                            </div>
                                                        <div class="form-group">
                                                            <label>تعديل التصنيف</label>
                                                            <select name="cat" class="form-control select2" style="width: 90%">
                                                                @if($item->mission == 'S3')
                                                                    <option value="10" @if($item->cat=='10') selected @endif>Mood Board</option>
                                                                    <option value="11" @if($item->cat=='11') selected @endif>المخططات المعتمدة</option>
                                                                    <option value="12" @if($item->cat=='12') selected @endif> ملفات الاستاندرد</option>
                                                                    <option value="13" @if($item->cat=='13') selected @endif> التصميم الداخلي</option>
                                                                    <option value="14" @if($item->cat=='14') selected @endif> تصاميم الاثاث</option>
                                                                    <option value="15" @if($item->cat=='15') selected @endif> المخططات التنفيذية</option>
                                                                    <option value="16" @if($item->cat=='16') selected @endif> ملفات الكميات</option>
                                                                @else
                                                                    <option value="1" @if($item->cat=='1') selected @endif>المخططات</option>
                                                                    <option value="2" @if($item->cat=='2') selected @endif>الكميات</option>
                                                                    <option value="3" @if($item->cat=='3') selected @endif>التوصيات</option>
                                                                    <option value="4" @if($item->cat=='4') selected @endif>اخرى</option>
                                                                    <option value="5" @if($item->cat=='5') selected @endif>واجهات</option>
                                                                @endif


                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-warning">حفظ</button>
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
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">  رجوع</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!--/.box -->
                </div>

            </div>
        </div>
    </div>


@endsection
