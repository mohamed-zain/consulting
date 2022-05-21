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
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <h3 class="profile-username text-center">@if(isset($Data->name)) {{ $Data->name }} @else {{ auth()->user()->id }} @endif</h3>

                    <p class="text-muted text-center">مهندس خيرعون</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>البريد</b> <a class="pull-left">@if(isset($Data->email)) {{ $Data->email }} @else {{ auth()->user()->email }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>الجوال</b> <a class="pull-left">@if(isset($Data->MobPhone)) {{ $Data->MobPhone }} @else {{ auth()->user()->phone }} @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b> العنوان</b> <a class="pull-left">@if(isset($Data->Address)) {{ $Data->Address }} @else '' @endif </a>
                        </li>
                    </ul>

                </div>
                <!-- /.box-body -->
            </div>
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
                            <h3 class="box-title"> مشاريعك</h3>

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
                                    <th> المشروع</th>
                                    <th>البينار</th>
                                    <th>اسم العميل</th>
                                    <th>المدينة </th>
                                    <th> البريد</th>
                                    <th>تاريخ التفعيل</th>
                                    <th>خيارات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($projects))
                                    @foreach($projects as $item)
                                        <?php
                                        $dd = \App\Models\ActivateFile::where('Bennar',$item->Bennar)->first();
                                        ?>
                                        <tr>
                                            <td>{{$dd->FileCode}}</td>
                                            <td>{{$item->Bennar}}</td>
                                            <td>{{$dd->Name}}</td>
                                            <td>{{$dd->City}}</td>
                                            <td>{{$dd->Email}}</td>
                                            <td>{{$dd->DRP}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> خيارات
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#" target="_blank">ملفات العميل</a></li>
                                                        <li><a href="{{ url('engFilesByProject') }}/{{ $item->Bennar }}" target="_blank"> ملفاتك في المشروع</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
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
