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
                    <li class="active"><a href="#">طلبات العملاء لتطوير الباقات</a></li>
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
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">طلبات تطوير الباقات</h3>

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
                            <th>اسم العميل</th>
                            <th>رقم البينار </th>
                            <th>الباقة الاساسية </th>
                            <th>الخدمة المطلوبة </th>
                            <th>خيارات </th>
                        </tr>
                        </thead>
                        <tbody id="comm">
                        @foreach($Data as $Single)
                            <?php $ser = DB::table('user_upgrade')
                                ->where('uid',$Single->Bennar)
                                ->get(); ?>
                            <tr>
                                <td>{{ $Single->id }}</td>
                                <td>{{ $Single->Name }}</td>
                                <td>{{ $Single->Bennar }}</td>
                                <td>{{ $Single->FileCode }}</td>
                                <td>
                                    <ul>
                                         @foreach($ser as $item)
                                             <li> <span style="color: green">{{ $item->Sname }}</span> - <span style="color: red">{{ $item->SPrice }}</span></li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">خيارات <span class="caret"></span></button>

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">قبول</a></li>
                                            <li><a href="#">رفض</a></li>
                                            <li><a href="#">تعليق</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="Modal" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">اضافة فرع جديد</h4>
                                </div>
                                <div class="modal-body">
                                    {{ Form::open(array('route'=>'branchs.store','id'=>'Addnch')) }}
                                    <div class="form-group">
                                        <label>اسم الفرع</label>
                                        <input type="text" name="BranchName" class="form-control" placeholder="اسم الفرع">

                                    </div>
                                    <button id="Branchs" class="btn btn-success">اضافة</button>
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
        </div>
    </div>

@endsection
