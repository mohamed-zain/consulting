@extends('index')
  @section('content')
  @if(Session::has('Flash44'))
<script type="text/javascript">
  swal("خطأ", "{{ Session::get('Flash44') }}", "error");
</script>  
           @endif
    <div class="">
      <div id=""></div>
      <section class="content-header">
        <div class="">
          <h3>
            لوحة التحكم
            <small>الملف الشخصي</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{url('MainPort')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="#"><i class="fa fa-folder-open"></i>  البروفايل</a></li>
            <li class="active"><i class="fa fa-folder"></i> تعديل البيانات</li>
          </ol>
        </div>
      </section>
    </div>





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


@endsection
