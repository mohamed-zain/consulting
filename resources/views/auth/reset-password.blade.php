

@extends('logo2')
@section('content')
    @if(session()->has('logout'))
        <script>
            swal("عفوا!", "{{ session()->get('logout') }}", "error");
        </script>
        {{ session()->forget('message') }}
    @endif
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('dist/img/koyellow.png') }}" class="user-image " alt="User Image" style="width: 300px">
        </div><!-- /.login-logo -->
        <div class="login-logo">
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg"> <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
            </p>



            <div class="row">

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="col-xs-8">
                        <div>
                            <x-label for="email" :value="__('البريد الالكتروني')" />
                            <div class="form-group has-feedback">
                                <input type="email" id="email" class="form-control"  name="email" value="{{old('email', $request->email)}}" required autofocus>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('كلمة المرور')" />
                            <div class="form-group has-feedback">
                                <input type="password" id="password" class="form-control"  name="password"  required >
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" />
                            <div class="form-group has-feedback">
                                <input type="password" id="password_confirmation" class="form-control"  name="password_confirmation"  required >
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>

                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary" onclick=''>
                                <i class="fa fa-btn fa-sign-in"></i> حفظ كلمة المرور الجديدة
                            </button>
                        </div>
                    </div>

                    <!-- /.col -->
                </form>

            </div>


        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection
