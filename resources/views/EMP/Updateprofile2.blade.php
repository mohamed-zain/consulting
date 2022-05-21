@extends('EMP.layout')
@section('content')

    <div id=""></div>
    <section class="content-header">
      <div class="">
        <h3>
          إدارة القبول
          <small>البروفايل</small>
        </h3>
        <ol class="breadcrumb">
          <li><a href="{{url('UsersTasks')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
          <li class="active"><a href="#"><i class="fa fa-folder-open"></i>  البروفايل</a></li>
          <li class="active"><i class="fa fa-folder"></i> تعديل البيانات</li>
        </ol>
      </div>
    </section>
r
    <div class="col-lg-12">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('dist/img/bb.png') }}" alt="User profile picture" style="margin-right:20%">

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

              <p class="text-muted text-center">موظف خيرعون</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>الفرع</b> <a class="pull-left">{{ $Data->BranchName }}</a>
                </li>
                <li class="list-group-item">
                  <b>الادارة</b> <a class="pull-left">{{ $Data->ManageName }}</a>
                </li>
                <li class="list-group-item">
                  <b> المسمي الوظيفي</b> <a class="pull-left"> {{ $Data->JobName}}  </a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>تواصل مع الادارة</b></a>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab"> بياناتك الشخصية</a></li>
              <li><a href="#settings" data-toggle="tab">تعديل البيانات</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">

                <div class="row">

                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="box box-success box-solid">
                      <div class="box-header with-border">
                        <h3 class="box-title"> البيانات الاساسية</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">

                        <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>الاسم بالكامل</b> <a class="pull-left">{{ $Data->NameAR }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>الايميل</b> <a class="pull-left">{{ $Data->Email }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> الجنسية</b> <a class="pull-left"> {{ $Data->Nationality }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> المؤهل</b> <a class="pull-left"> {{ $Data->Qualify }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> الحالة الاجتماعية</b> <a class="pull-left"> {{ $Data->Status }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> رقم الجوال</b> <a class="pull-left"> {{ $Data->MobPhone }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>  المدينة</b> <a class="pull-left"> {{ $Data->City }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> الحي</b> <a class="pull-left">{{ $Data->Quarter }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> العنوان</b><a class="pull-left"> {{ $Data->Address }} </a>
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
                        <h3 class="box-title"> البيانات الوظيفية</h3>

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
                            <b> تاريخ التعيين</b> <a class="pull-left">{{ $Data->AssignDate }}</a>
                          </li>
                          <li class="list-group-item">
                      <b>نوع التعيين</b> <a class="pull-left">{{ $Data->AssignType }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>  ساعات العمل الاسبوعية </b> <a class="pull-left"> {{ $Data->WorkHours }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>  المسمي الوظيفي </b> <a class="pull-left"> {{ $Data->JobTitle }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>  الدرجة الوظيفية </b> <a class="pull-left"> {{ $Data->JobDegree }}</a>
                          </li>
                          <li class="list-group-item">
                            <b>  المدير المباشر </b> <a class="pull-left"> {{ $Data->MainDirector }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> الراتب الاساسي </b> <a class="pull-left"> {{ $Data->MainSalary }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> بدل السكن </b> <a class="pull-left"> {{ $Data->LivePremium }}</a>
                          </li>
                          <li class="list-group-item">
                            <b> بدل النقل </b> <a class="pull-left"> {{ $Data->TransPremium }}</a>
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
