@extends('logo')
@section('content')
    @if(session()->has('logout'))
        <script>
            swal("عفوا!", "{{ session()->get('logout') }}", "error");
        </script>
        {{ session()->forget('message') }}
    @endif
    <div class="login-box">
        <div class="login-logo">
        <img src="{{ asset('logo20221.png') }}" class="user-image " alt="User Image" style="width: 150px;height: 150px;border-radius: 22px;">
      </div><!-- /.login-logo -->
      <div class="login-logo">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">قم بكتابة البريد الالكتروني وكلمة المرور</p>
        <form role="form" method="POST" action="{{ route('login') }}">
             {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="البريد الالكتروني" name="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="كلمة المرور" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
           @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            </div>
          <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-block btn-social btn-facebook btn-flat" onclick=''>
                    تسجيل الدخول
                </button>
                <div class="social-auth-links text-right">
                    <a href="{{ url('forgot-password') }}" class="btn btn-block btn-social btn-google btn-flat"> هل نسيت كلمة المرور</a>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">

            </div><!-- /.col -->

          </div>
        </form>        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection