@extends('ActivateAccount.layout')
@section('content')
    <section class="content-header">
        <div class="">
            <h3>
                الادارة الهندسية
                <small>إدارة المهام</small>
            </h3>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active"> إدارة المهام</li>

            </ol>
        </div>
    </section>

    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">قائمة المهام

                </h3>

                <div class="box-tools pull-right">
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>المهمة</th>
                        <th> المشروع</th>
                        <th>البينار </th>
                        <th>المهندس المسؤول </th>
                        <th>تاريخ الاسناد </th>
                        <th> هل انجزت </th>
                        <th>  موعد الانتهاء </th>
                        <th>   خيارات </th>
                    </tr>
                    </thead>
                    <tbody id="comm">
                    @foreach($tasks as $Single)
                        <tr>
                            <td>{{ $Single->Mission }}</td>
                            <td>{{ $Single->FileCode }}</td>
                            <td>{{ $Single->Bennar }}</td>
                            <td>{{ $Single->name }}</td>
                            <td>{{ $Single->CA }}</td>
                            <td>
                                @if($Single->TaskDone == 'yes')
                                    <span class="label label-success">منجزة</span>
                                @else
                                    <span class="label label-danger">غير منجزة</span>
                                @endif
                            </td>
                            <td>{{ $Single->Deadline }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span> خيارات
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        @if($Single->TaskDone == 'yes')
                                            <li><a href="#">لا توجد خيارات</a></li>
                                        @else
                                            <li><a href="#" data-toggle="modal" data-target="#eng{{ $Single->TID }}">تغيير المهندس</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#dd{{ $Single->TID }}">تحديد الموعد النهائي </a></li>
                                        @endif

                                    </ul>
                                </div>
                            </td>

                        </tr>
                        <div class="modal fade" id="eng{{ $Single->TID }}" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">تغيير المهندس المسؤول عن المهمة</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{ Form::open(array('route'=>'ChangeEng','id'=>'')) }}
                                        <div class="form-group">
                                            <label for="BranchID" class="control-label"> أختر المهندس</label>
                                            <input type="hidden" name="TID" value="{{ $Single->TID }}">
                                            <div class="form-inline">
                                                <select name="EmpID" class="form-control select2" id="EmpID"   style="margin-bottom: 9px; width: 80%" required>
                                                    @foreach(App\Models\User::where('roll','=','AdmissionEmp')->get() as $ser)
                                                        <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-success">تغيير</button>

                                            </div>
                                        </div>
                                        {{ Form::close() }}

                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="dd{{ $Single->TID }}" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">تحديد تاريخ انجاز وتسليم المهمة</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{ Form::open(array('route'=>'SetDeadline','id'=>'')) }}
                                        <div class="form-group">
                                            <label for="BranchID" class="control-label">  قم بتحديد تاريخ تسليم المهمة</label>
                                            <input type="hidden" name="TID" value="{{ $Single->TID }}">
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <label>التاريخ:</label>

                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="date" class="form-control pull-right" name="Deadline">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <button type="submit" class="btn btn-success">تغيير</button>

                                            </div>
                                        </div>
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

@endsection
