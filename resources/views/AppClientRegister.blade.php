<!doctype html>
<html lang="en" style=" direction:rtl;">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>خيرعون الامارات - لوحة تحكم العميل</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dist/img/logo.png') }}" />
	<link rel="icon" type="image/jpg" href="{{ asset('dist/img/logo.png') }}" />
	<!--     Fonts and icons     -->
	<!-- CSS Files -->
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

    <link href="{{ asset('/assets2/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/assets2/css/material-bootstrap-wizard.css') }}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{ asset('/assets2/css/demo.css') }}" rel="stylesheet" />
	<link href="{{ asset('/style.css') }}" rel="stylesheet" />
	<link href="{{asset('/assets/css/notify.css')}}" rel='stylesheet' type='text/css' />
	<script src="{{asset('/assets2/css/sweetalert-dev.js')}}"></script>
	<link href="{{asset('/assets2/css/sweetalert.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('/jquery-ui.custom.min.css')}}" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<script type="text/javascript">
        $(window).load(function() {
            $(".base4loader").fadeOut("slow");
        });
	</script>


    <style>

		.spinner {
			margin: 25px auto;
			left: 50%;
			top: 50%;
			width: 100px;
			height: 40px;
			text-align: center;
			font-size: 10px;
			position: fixed;
			z-index: 9999;
			background-color:  #FFFF;

		}

		.spinner > div {
			background-color: #532009;
			height: 100%;
			width: 6px;
			display: inline-block;
			-webkit-animation: sk-stretchdelay 1.2s infinite ease-in-out;
			animation: sk-stretchdelay 1.2s infinite ease-in-out;
		}

		.spinner .rect2 {
			-webkit-animation-delay: -1.1s;
			animation-delay: -1.1s;
		}

		.spinner .rect3 {
			-webkit-animation-delay: -1.0s;
			animation-delay: -1.0s;
		}

		.spinner .rect4 {
			-webkit-animation-delay: -0.9s;
			animation-delay: -0.9s;
		}

		.spinner .rect5 {
			-webkit-animation-delay: -0.8s;
			animation-delay: -0.8s;
		}

		@-webkit-keyframes sk-stretchdelay {
			0%, 40%, 100% { -webkit-transform: scaleY(0.4) }
			20% { -webkit-transform: scaleY(1.0) }
		}

		@keyframes sk-stretchdelay {
			0%, 40%, 100% {
				transform: scaleY(0.4);
				-webkit-transform: scaleY(0.4);
			}20% {
				 transform: scaleY(1.0);
				 -webkit-transform: scaleY(1.0);
			 }
		}
		* {
			box-sizing: border-box;
		}

	</style>
</head>

<body>
<div class="base4loader">

</div>

<div class="spinner pull-right" style="display:none;">
	<div class="rect1"></div>
	<div class="rect2"></div>
	<div class="rect3"></div>
	<div class="rect4"></div>
	<div class="rect5"></div>
	<p>جاري معالجة البيانات ...</p>
</div>

@if(session('message'))
	<div class="notify top-right do-show" data-notification-status="error" style="direction: rtl;text-align: center;">
		{{session('message')}}
	</div>

@endif
@if(Session::has('Flash'))

	<div class="notify bottom-right do-show" data-notification-status="error" style="direction: rtl;text-align: center;">
		{{ Session::get('Flash') }}
	</div>
@endif
@if ($errors->any())

	<div class="notify bottom-right do-show" data-notification-status="error" style="direction: rtl;text-align: center;">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>

@endif
@php
          $SOA = session()->get('SOA');
          $Nameclient = session()->get('Nameclient');
          $DRP = session()->get('DRP');
          $Bank = session()->get('Bank');
          $RQS = session()->get('RQS');
          $Bennar = session()->get('Bennar');
          $FileCode = session()->get('FileCode');
          $Country = session()->get('Country');
          $City = session()->get('City');
          $Email = session()->get('Email');
          $Phone = session()->get('Phone');
@endphp
	<div class="image-container set-full-height" style="background-image: url('public/slide3.jpg')">
	    <!--   Creative Tim Branding   -->
	    <a href="https://ko-design.ae">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="{{ asset('dist/img/logo.png') }}">
	            </div>
	            <div class="brand">خيرعون الامارات </div>
	        </div>
	    </a>

		<!--  Made With Material Kit  -->
		<a href="https://ko-design.ae" class="made-with-mk">
			<div class="brand"> KO </div>
			<div class="made-with"> خيرعون <strong>  الامارات  </strong></div>
		</a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-lg-12">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="orange" id="wizard">
						<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"  id="Registrationform">
							{{ csrf_field() }}
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<img src="{{ asset('dist/img/logo.png') }}" style="max-height: 80px;width: auto" class="img-responsive center">
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
											<h3 class="wizard-title">
												التسجيل في برنامج خير عون - خدمات ما بعد الاشتراك
											</h3>
											<h5>قم بتعبئة النموذج وتأكد من صحة البيانات المدخلة</h5>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<img src="{{ asset('dist/img/logo.png') }}" style="max-height: 80px;float: left!important;" class="img-responsive center">
										</div>
									</div>


		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#details" data-toggle="tab">البيانات الشخصية</a></li>
										<li><a href="#other" data-toggle="tab"> 	معلومات اخري</a></li>

			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="details">

										<h4 class="info-text">تكرم بإدخال المعلومات الشخصية عزيزنا العميل </h4>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label> الاسم بالكامل </label>
													<input type="text" name="" class="form-control"  id="name" placeholder="{{ $Nameclient }}" disabled>
													<input type="hidden" name="name" value="{{ $Nameclient }}"  placeholder="{{ $Nameclient }}" >
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>  رقم الملف </label>
                                                    <input type="text" name="" class="form-control" value="{{ $Bennar }}"  id="File_code" placeholder="{{ $Bennar }}" disabled>
                                                    <input type="hidden" name="File_code" class="form-control" value="{{ $Bennar }}"  id="File_code" placeholder="{{ $Bennar }}" >

                                                </div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>    البريد الالكتروني </label>
													<input type="text" name="" value="{{ $Email }}" class="form-control mynum"  id="email" placeholder="{{ $Email }}" disabled>
													<input type="hidden" name="email" value="{{ $Email }}" class="form-control mynum"  id="email" >
												</div>

											</div>
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label> رقم الجوال  </label>
													<input type="text" name="phone" class="form-control mynum" value="{{ $Phone }}" id="phone" minlength="1" maxlength="10" placeholder="{{ $Phone }}" disabled>
													<input type="hidden" name="phone" class="form-control mynum" value="{{ $Phone }}" id="phone" minlength="1" maxlength="10" placeholder="{{ $Phone }}" >

												</div>
											</div>

										</div>


										<div class="row">
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>كلمة المرور</label>
													<input type="password" name="password" class="form-control" id="password" required>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>تأكيد كلمة المرور</label>
													<input type="password" name="password_confirmation" class="form-control" required>
												</div>

											</div>
										</div>

		                            </div>
									<div class="tab-pane" id="other">

										<h4 class="info-text">بعد استلام طلب التسجيل يمكنك الدخول علي البوابة الالكترونية </h4>

										<p>يمكنك الاطلاع وتحميل جميع الملفات الهندسية الخاصة بك</p>
										<p>يمكنك ايضا تحميل تطبيق خير عون لخدمات ما بعد الاشتراك واستخدام نفس بيانات الدخول للتطبيق	</p>

									</div>
		                        </div>
	                        	<div class="wizard-footer">
	                            	<div class="pull-left">
	                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='التالي' />
	                                    <input type='submit' id="btsubmit" class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='حفظ وارسال' />
	                                </div>
	                                <div class="pull-right">
	                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='السابق' />

										<div class="footer-checkbox">
											<div class="col-sm-12">
											  <div class="checkbox">
											  </div>
										  </div>
										</div>
	                                </div>
	                                <div class="clearfix"></div>
	                        	</div>
						</form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
				<a href=""> جميع الحقوق محفوظة © 2020 - 2030 - خيرعون     </a>
	        </div>
	    </div>
	</div>
<script>

    $(document).ready(function(){

        $(document).ajaxStart(function () {
            $(".spinner").show();
        }).ajaxStop(function () {
            $(".spinner").hide();
        });





        $('#btsubmit').click(function () {

            var name = document.getElementById("name").value;
            var phone = document.getElementById("phone").value;
            var file_code = document.getElementById("file_code").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var c_password = document.getElementById("c_password").value;





            if (name == "") {

                text = "الرجاء كتابة الاسم بالكامل ";
                swal("عفوا!", text, "error");
                return false;

            }
            if (email == "") {

                text = "الرجاء ادخال رقم الهاتف ";
                swal("عفوا!", text, "error");
                return false;

            }

            if (isNaN(phone)) {
                text = "رجاء كتابه رقم الهاتف في حقل رقم الهاتف";
                swal("عفوا!", text, "error");
                return false;

            }

            if (phone == "") {

                text = "رجاء كتابه رقم الهاتف في حقل رقم الهاتف";
                swal("عفوا!", text, "error");
                return false;

            }

            if (file_code == "") {

                text = "الرجاء كتابة رقم الملف";
                swal("عفوا!", text, "error");
                return false;

            }
            if (password == "") {

                text = "الرجاء كتابة كلمة المرور ";
                swal("عفوا!", text, "error");
                return false;

            }
            if (c_password == "") {

                text = "الرجاء كتابة تأكيد كلمة المرور ";
                swal("عفوا!", text, "error");
                return false;

            }


            $( "#Registrationform" ).on( "submit", function( e ) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });



                var myForm = document.getElementById('Registrationform');
                var formData = new FormData(myForm);
                //var data2    = $( "#Registrationform" ).serialize();
                console.log(formData);
                $.ajax({
                    type: 'POST',
                    url : $(this).attr('action'),
                    data : formData ,
                    cache:false,
                    contentType: false,
                    processData: false,

                    success  : function(data) {

                        if (data.success === false){
                            swal("عفوا", "لقد قمت بتسجيل بياناتك سابقا , يرجي الانتظار ...", "error");
                            setTimeout(function(){
                                window.location.href = "http://ko-design.com/ClientRegister/";
                            }, 3000);
                        }else {
                            swal("شكرا", "تم ارسال بياناتك بنجاح , يرجي الانتظار ...", "success");
                            setTimeout(function(){

                                window.location.href = "https://ko-sky.com/login/";
                            }, 3000);
                        }
                        //console.log(data);

                    },
                    error: function(xhr, textStatus, thrownError){
                        swal("عفوا!", "تأكد من صحة البيانات وحاول مرة أخري", "error");
                    }

                });
                $("#Registrationform").trigger("reset");

            });

        });

    });
</script>
<script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('jquery-confirm.js') }}" type="text/javascript"></script>
<script src="{{ asset('jquery-ui.custom.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets2/js/jquery.bootstrap.js') }}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('assets2/js/material-bootstrap-wizard.js') }}"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{ asset('assets2/js/jquery.validate.min.js') }}"></script>

</body>
	<!--   Core JS Files   -->


</html>
