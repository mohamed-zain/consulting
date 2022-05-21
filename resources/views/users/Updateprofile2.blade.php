@extends('users.layout')
@section('content')

    <div id=""></div>
    <section class="content-header">
      <div class="">
        <h3>
          لوحة التحكم
          <small>البروفايل</small>
        </h3>
        <ol class="breadcrumb">
          <li><a href="{{url('UsersTasks')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
          <li class="active"><a href="#"><i class="fa fa-folder-open"></i>  البروفايل</a></li>
          <li class="active"><i class="fa fa-folder"></i> تعديل البيانات</li>
        </ol>
      </div>
    </section>

    <div class="col-lg-12">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/bb.png') }}" alt="User profile picture" style="margin-right:20%">

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">عميل خيرعون</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>الدولة</b> <a class="pull-left">{{ $Data->Country }}</a>
                </li>
                <li class="list-group-item">
                  <b>الباقة</b> <a class="pull-left">{{ $Data->packageName }}</a>
                </li>
                <li class="list-group-item">
                  <b>قيمة الاشتراك</b> <a class="pull-left"> {{ number_format($Data->Price) }}  درهم</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>تواصل مع الادارة</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">معلومات العميل</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-mail-forward margin-r-5"></i> البريد</strong>

              <p class="text-muted">
                {{ $Data->email }}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> لعنوان</strong>

              <p class="text-muted">{{ $Data->AgentAddress }}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> الهواتف</strong>

              <p>
                <p class="text-muted"> {{ $Data->AgentPhone }} </p>
                <p class="text-muted"> {{ $Data->AgentMob }} </p>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> رقم الهوية</strong>

              <p>{{ $Data->Agentauth }}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">عن مشروعك</a></li>
              <li><a href="#timeline" data-toggle="tab">عن الباقة</a></li>
              <li><a href="#settings" data-toggle="tab">تعديل البيانات</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">


                <div class="row">
                  <div class="col-md-12">
                    <p><code>مؤشر سير العمل في المشروع</code></p>
                    <div class="progress">
                      <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                        <span class="sr-only">40% Complete (success)</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="box box-success box-solid">
                      <div class="box-header with-border">
                        <h3 class="box-title">موقع المشروع</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">

                        <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>الدولة</b> <a class="pull-left">{{ $Data->Country }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>المنطقة</b> <a class="pull-left">{{ $Data->Neighborhood }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> الامارة</b> <a class="pull-left"> {{ $Data->Emirate }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> الحي</b> <a class="pull-left"> {{ $Data->Neighborhood }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> الشارع</b> <a class="pull-left"> {{ $Data->Streetnumber }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> رقم القطعة</b> <a class="pull-left"> {{ $Data->PlotNO }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> رقم القسيمة</b> <a class="pull-left"> {{ $Data->VoucherNumber }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> رقم صك الارض</b> <a class="pull-left">{{ $Data->Instrumentnumber }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> رابط المشروع علي الخريطة</b> <a class="pull-left"> <a href="{{ $Data->MapsUrl }}" target="_blank">اضغط هنا</a> </a>
                          </li>
                        </ul>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="box box-warning box-solid">
                      <div class="box-header with-border">
                        <h3 class="box-title">التصنيف في خيرعون</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>رقم البينار</b> <a class="pull-left">{{ $Data->benarNO }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>رقم الاشتراك</b> <a class="pull-left">{{ $Data->KoNO }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>تاريخ رفع الطلب </b> <a class="pull-left"> {{ $Data->RequestDate }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>تاريخ تفعيل الباقة </b> <a class="pull-left"> {{ $Data->ActivatDate }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>تاريخ انتهاء الباقة </b> <a class="pull-left"> {{ $Data->ActivatDate }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> قيمة الاشتراك </b> <a class="pull-left"> {{ $Data->Price }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> هل طلبت تأجيل السداد </b> <a class="pull-left"> {{ $Data->ToBeLate }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>  هل يشمل باقة الاخوين </b> <a class="pull-left"> no</a>
                          </li>
                          <li class="list-group-item">
                            <b>   رمز باقة الاخوين </b> <a class="pull-left"> {{ $Data->KoNO }}</a>
                          </li>
                        </ul>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.col -->

                  <!-- /.col -->
                </div>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>

                </ul>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">

                <div class="row">
                  <div class="col-lg-6">

                    <div class="box">
                      <div class="register-logo">
                      </div>

                      <div class="register-box-body">
                        <p class="login-box-msg">تعديل بيانات الشخصيه</p>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('UserProfile') }}">
                          {{ csrf_field() }}
                            <?php
                            if($Data->id == 1)
                                $level = 'مدير';
                            else
                                $level = 'موظف';

                            ?>

                          <div class="form-group has-feedback">

                            {!! Form::text('name', $Data->name, ['class' => 'form-control', 'style' => 'width: 100%','disabled']) !!}
                          </div>

                          <div class="form-group has-feedback">
                            {!! Form::text('email', $Data->email, ['class' => 'form-control', 'style' => 'width: 100%']) !!}
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            {!! Form::text('Level', $level ,['class' => 'form-control', 'style' => 'width: 100%','disabled']) !!}
                          </div>

                          <div class="row">
                            <div class="col-xs-8">

                            </div><!-- /.col -->
                            <div class="col-xs-4">
                              <button type="submit" class="btn btn-primary btn-block btn-flat" >تعديل</button>
                            </div><!-- /.col -->
                          </div>
                        </form>



                      </div>
                    </div>

                  </div>
                  <div class="col-lg-6">

                    <div class="box">
                      <div class="register-logo">
                      </div>

                      <div class="register-box-body">
                        <p class="login-box-msg">تعديل كلمة المرور</p>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('updateuserpass') }}">
                          {{ csrf_field() }}


                          <div class="form-group has-feedback">
                            <input name="password" id="password" type="password" class="form-control" placeholder=" كلمه المرور القديمة" disabled>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input name="password" id="password" type="password" class="form-control" placeholder="كلمة المرور الجديدة">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="اعاده كلمه المرور">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                          </div>
                          <div class="row">
                            <div class="col-xs-8">

                            </div><!-- /.col -->
                            <div class="col-xs-4">
                              <button type="submit" class="btn btn-primary btn-block btn-flat">تعديل</button>
                            </div><!-- /.col -->
                          </div>
                        </form>



                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->

        </div>
        <!-- /.col -->
      </div>
    </div>

  <div class="container">
    @if(Session::has('Flash44'))
      <script type="text/javascript">
          swal("خطأ", "{{ Session::get('Flash44') }}", "error");
      </script>
    @endif
  </div>

@endsection
