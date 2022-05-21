@extends('users.layout')
  @section('content')
  <div class="col-md-12">
          <h3>
            المشاريع
            <small>مهام المشاريع</small>
            <a href="{{ url('NewTaskU') }}" id="NewestTasks" class="btn btn-app pull-left">
                <span class="badge bg-green">اسناد مهمة جديده</span>
                <i class="fa fa-edit"></i>اسناد مهمة جديده
              </a>
            <a href="{{ url('NewestTasks') }}" class="btn btn-app pull-left">
                <span class="badge bg-green">مهمة جديده</span>
                <i class="fa fa-edit"></i>مهام جديده
              </a>
              <a href="{{ url('AllTasks') }} " class="btn btn-app pull-left" >
                <span class="badge bg-purple">المهام</span>
                <i class="fa fa-list"></i> قائمة المهام
              </a>
              <a href="{{ url('ComplateTasks') }} " class="btn btn-app pull-left" >
                <span class="badge bg-red">المهام</span>
                <i class="fa fa-tasks"></i> مهامي المنجزة
              </a>
               <a href="#" class="btn btn-app pull-left" data-toggle="modal" data-target="#Modal">
                <span class="badge bg-red">الطابات والاذونات</span>
                <i class="fa fa-tasks"></i> الطلبات والاذونات
              </a>
              <a href="{{ url('OutCome') }} " class="btn btn-app pull-left" >
                  <span class="badge bg-purple">المهام</span>
                  <i class="fa fa-list"></i> مهامي المرسلة
              </a>
          </h3>

      <ol class="breadcrumb" style="width: 13.5%">
          <li><a href="{{url('UsersTasks')}}"><i class="fa fa-dashboard"></i> المهام</a></li>
          <li class="active"><a href="{{ url('UsersTasks') }}"><i class="fa fa-folder-open"></i>قائمة المهام</a></li>
      </ol>
          </div>
<div class="col-md-12">
<div class="row">

        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">كل المهام </h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <div class="table-responsive mailbox-messages">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>رقم المشروع</th>
                  <th>الموكل اليه</th>
                  <th>عنوان المشروع</th>
                  <th>محتوي المهمة</th>
                  <th>الحالة</th>
                  <th>التاريخ</th>


                </tr>
                </thead>
                <tbody>
                  @foreach($Data as $Single)
                <tr>
                  <td>{{ $Single->Proid }}</td>
                  <td>{{ $Single->NameAR }}</td>
                  <td>{{ $Single->ProName }}</td>
                  <td><a href="{{ url('ReadeUTask') }}/{{ $Single->TID }}">{{Str::limit($Single->TaskContent, 50)}}</a></td>
                  <td>
                    @if( $Single->TState == 1)
                    <span class="badge bg-green">منجزة</span>

                    @elseif($Single->TState == 0)
                    <span class="badge bg-red">لم يتم انجازها</span>
                    @endif
                  </td>

                  <td>{{ date('F d, Y', strtotime($Single->T_Date)) }}</td>

                </tr>
                @endforeach



                </tbody>
              </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">

            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      </div>

   @endsection
