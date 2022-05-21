 @extends('index')
@section('content')
 
  <div class="col-md-12">
          <h3>
            المستخدمين
            <small>سجل النشاطات</small>



          </h3>

          <ol class="breadcrumb">
            <li><a href="{{url('UsersTasks')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('UsersTasks') }}"><i class="fa fa-folder-open"></i> تحركات المستخدمين في النظام</a></li>

          </ol>
  </div>
    <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">كل الانشطة الموجوده</h3>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>الرقم</th>
                  <th>الحدث</th>
                  <th>الرابط</th>
                  <th>الطلب</th>
                  <th>عنوان الانترنت</th>
                  <th>معلومات المتصفح</th>
                  <th>اسم المستخدم</th>
                  <th>التاريخ</th>


                </tr>
                </thead>
                <tbody>
                  @if($logs->count())
                    @foreach($logs as $key => $log)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $log->subject }}</td>
                      <td class="text-success">{{ $log->url }}</td>
                      <td><label class="label label-info">{{ $log->method }}</label></td>
                      <td class="text-warning">{{ $log->ip }}</td>
                      <td class="text-danger">{{ $log->agent }}</td>
                      <td>{{ $log->name }}</td>
                      <td>{{ $log->Date}}</td>
                    </tr>
                    @endforeach
                  @endif



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


@endsection
