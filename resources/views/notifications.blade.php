@extends('index')

<?php
$pro = \App\Models\ActivateFile::count();
$aproval = \App\Models\Documents::where('reject_accept',1)->count();
$eng = \App\Models\User::where('roll','AdmissionEmp')->count();
?>
@section('content')
    <div class="col-md-12">
        <h3>
            لوحة التحكم
            <small>التنبيهات</small>

        </h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>   التنبيهات </a></li>

        </ol>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="#" class="btn btn-info"  data-toggle="modal" data-target="#Modal2222"><i class="fa fa-plus"></i>ارسال نتبيه لعميل</a>
            <a href="#" class="btn btn-warning"  data-toggle="modal" data-target="#Modal3333"><i class="fa fa-plus"></i>ارسال نتبيه لكل العملاء</a>
            <div class="modal fade" id="Modal2222" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">اختار العميل </h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('SendNotificationToClient') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <select name="bennar" class="form-control select2" style="width: 90%">
                                        @foreach(\App\Models\User::where('roll','appUser')->get() as $item)
                                        <option value="{{ $item->File_code }}">{{ $item->File_code }} - {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="عنوان التنبيه">
                                </div>
                                <div class="form-group">
                                    <textarea name="body" cols="4" class="form-control">

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
            <div class="modal fade" id="Modal3333" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> ارسال تنبيه لكل العملاء </h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('SendNotificationToAllClient') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="عنوان التنبيه">
                                </div>
                                <div class="form-group">
                                    <textarea name="body" cols="4" class="form-control">

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

            <!-- Custom Tabs -->
            <br>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">العملاء</a></li>
                    <li><a href="#tab_2" data-toggle="tab"> المهندسين</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table id="" class="table table-bordered table-striped table-responsive example">
                            <thead>
                            <tr>

                                <th> العميل</th>
                                <th>عنوان التنبيه </th>
                                <th>نص التنبيه </th>
                                <th> التاريخ </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $client_noti = DB::table('app_notification')
                            ->join('users','app_notification.bennar','=','users.File_code')
                                ->where('users.roll','appUser')
                                ->get();

                            ?>
                            @foreach($client_noti as $Single)
                                <tr>

                                    <td>  {{ $Single->name }} </td>
                                    <td>  {{ $Single->Title }} </td>
                                    <td>  {{ $Single->Body }} </td>
                                    <td>  {{ $Single->created_at }} </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <table id="" class="table table-bordered table-striped table-responsive example">
                            <thead>
                            <tr>

                                <th> العميل</th>
                                <th>عنوان التنبيه </th>
                                <th>نص التنبيه </th>
                                <th> التاريخ </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $eng_noti = DB::table('notifications')
                                ->join('users','notifications.notifiable_id','=','users.id')
                                ->where('users.roll','AdmissionEmp')
                                ->get();

                            ?>
                            @foreach($eng_noti as $Single)
                                <?php
                                $datas = json_decode($Single->data);

                                ?>
                                <tr>

                                    <td>  {{ $Single->name }} </td>
                                    <td>  {{ $datas->pass }} </td>
                                    <td>  {{ $datas->message }} </td>
                                    <td>  {{ $Single->created_at }} </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

    </div>

@endsection