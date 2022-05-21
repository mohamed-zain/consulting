
@extends('logo2')
@section('content')
    @if(session()->has('logout'))
        <script>
            swal("عفوا!", "{{ session()->get('logout') }}", "error");
        </script>
        {{ session()->forget('message') }}
    @endif
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="{{ url('login') }}"><b>خير</b>عون</a>
        </div>
        <!-- User name -->
        <div class="lockscreen-name">استعادة كلمة المرور</div>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <!-- START LOCK SCREEN ITEM -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="{{ asset('img/logo.png') }}" alt="User Image">
            </div>
                <div class="input-group">
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email')}}" required autofocus placeholder="اكتب البريد الالكتروني">
                </div>
        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            <button type="submit" class="btn btn-primary" onclick=''>
                <i class="fa fa-btn fa-sign-in"></i> ارسال رابط استعادة كلمة المرور
            </button>
        </div>
        </form>
        <div class="text-center">
            <a href="{{url('login')}}">او تسجيل الدخول في حال تذكرت كلمة لمرور</a>
        </div>
        <div class="lockscreen-footer text-center">
            Copyright © {{ date('Y') }} <b><a href="https://KO-DESIGN.AE" class="text-black">KhayrOawn</a></b><br>
            All rights reserved
        </div>
    </div>
@endsection
