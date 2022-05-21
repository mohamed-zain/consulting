
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
            <img src="{{ asset('img/logo.png') }}" class="user-image" alt="User Image" style="width: 300px">
        </div><!-- /.login-logo -->
        <div class="login-logo">
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">شكرا لك للانضمام لمنصة خير عون ، قبل البدء في الوصول لملفاتك نرجو منك تفعيل حسابك بالضغط علي الرابط المرسل لبريدك الالكتروني</p>
           <p class="login-box-msg">اذا لم يصلك الرابط ، سنكون سعيدين بإرساله لك مرة اخري</p>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('رابط جديد تم ارساله لك علي البريد المستخدم عند عمليه التسجيل') }}
                </div>
            @endif


                <div class="row">
                    <form role="form" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                    <div class="col-xs-8">
                        <button type="submit" class="btn btn-primary" onclick=''>
                            <i class="fa fa-btn fa-sign-in"></i> ارسال رابط التفعيل
                        </button>
                    </div>

                    <!-- /.col -->
                    </form>
                    <form method="POST" action="{{ url('logout') }}">
                        @csrf
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-danger text-gray-600 hover:text-gray-900">
                                {{ __('خروج') }}
                            </button>
                        </div>
                    </form>
                </div>


        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@endsection
