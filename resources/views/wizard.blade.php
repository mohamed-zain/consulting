<!doctype html>
<html lang="en" style=" direction:rtl;">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>خيرعون  - تسجيل استشاري معتمد</title>
	<meta name="description" content="البوابة الرقمية لتسجيل المكاتب الاستشارية المعتمدة" />
	<meta name="keywords" content="برنامج ادارة خدمات المكاتب الاستشارية من خير عون" />
	<meta name="author" content=" خيرعون - المملكة العربية السعودية"/>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('logo20221.png') }}" />
	<link rel="icon" type="image/png" href="{{ asset('logo20222.png') }}" />
	<!--     Fonts and icons     -->
	<!-- CSS Files -->
	<link href="{{ asset('/assets2/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/assets2/css/material-bootstrap-wizard.css') }}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{ asset('/assets2/css/demo.css') }}" rel="stylesheet" />
	<link href="{{ asset('/style.css') }}" rel="stylesheet" />
	<link href="{{asset('/assets/css/notify.css')}}" rel='stylesheet' type='text/css' />
	<script src="{{ asset('/assets2/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
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
	<div class="image-container set-full-height" style="background-image: url('public/slide3.jpg')">
	    <!--   Creative Tim Branding   -->
	    <a href="https://consulting.ko-sky.com">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="{{ asset('logo202221.png') }}">
	            </div>
	            <div class="brand">خيرعون المملكة العربية السعودية </div>
	        </div>
	    </a>

		<!--  Made With Material Kit  -->
		<a href="https://consulting.ko-sky.com" class="made-with-mk">
			<div class="brand"> KO </div>
			<div class="made-with"> خيرعون <strong>  جدة  </strong></div>
		</a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-12 ">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="orange" id="wizard">
						<form action="{{ route('CheckUp') }}" method="POST" enctype="multipart/form-data"  id="Registrationform">
							{{ csrf_field() }}
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<img src="{{ asset('logo20221.png') }}" style="max-height: 80px;width: auto" class="img-responsive center">
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
											<h3 class="wizard-title">
												التسجيل كإستشاري - خير عون جدة
											</h3>
											<h5>قم بتعبئة النموذج وتأكد من صحة البيانات المدخلة</h5>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<img src="{{ asset('logo20221.png') }}" style="max-height: 80px;float: left!important;" class="img-responsive center">
										</div>
									</div>


		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#details" data-toggle="tab">البيانات الشخصية</a></li>
										<li><a href="#captain" data-toggle="tab"> بيانات التمويل </a></li>
										<li><a href="#activity" data-toggle="tab">  مكونات المشروع </a></li>
										<li><a href="#live" data-toggle="tab">الطابق الثاني </a></li>
										<li><a href="#attach" data-toggle="tab"> الاستشاري السابق  </a></li>
										<li><a href="#construct" data-toggle="tab"> رسالة من الشركة   </a></li>
										<li><a href="#andtate" data-toggle="tab"> مقاول مرشح    </a></li>
										<li><a href="#legal" data-toggle="tab"> 	الضوابط القانونية</a></li>
										<li><a href="#other" data-toggle="tab"> 	معلومات اخري</a></li>

			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="details">

										<h4 class="info-text">تكرم بإدخال المعلومات الشخصية عزيزنا العميل </h4>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label> الاسم بالكامل </label>
													<input name="idcard_id" class="form-control"  id="idcard_id">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label> من مواطني </label>
													<select name="idcard_type" id="idcard_type" class="form-control" >
														{{--@foreach($idtyype as $itype)
                                                            <option value="{{$itype->cardtype_id}}">{{$itype->cardtype_name}}</option>
                                                        @endforeach--}}
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label> رقم الهوية </label>
													<input type="text" name="idcard_id" class="form-control"  id="idcard_id">

												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>   رقم الجواز </label>
													<input type="text" name="phone1" class="form-control mynum"  id="phone1" minlength="1" maxlength="10" >
												</div>

											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label> رقم الجوال (1) </label>
													<input type="text" name="phone1" class="form-control mynum"  id="phone1" minlength="1" maxlength="10" >

												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label> رقم الجوال (2) </label>
													<input type="text" name="phone1" class="form-control mynum"  id="phone1" minlength="1" maxlength="10" >

												</div>

											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label> الامارة </label>
													<select name="local_id" id="localID" class="form-control" >
														<option value="">---اختر الامارة---</option>

													</select>												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label> هاتف المنزل</label>
													<input type="text" name="birthplace" class="form-control" >
												</div>

											</div>
										</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>  البريد الالكتروني (1) </label>
													<input type="email" name="home_no" class="form-control">

												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>البريد الالكتروني (2) </label>
													<input type="email" name="home_no" class="form-control">

												</div>

											</div>
										</div>
										<br>
										<p class="" style="color: red">بيانات الوكيل</p>
										<hr>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label> اسم الوكيل او من ينوب عنه</label>
													<input type="text" name="home_no" class="form-control">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>الجنسية</label>
													<input type="text" name="neighborhood" class="form-control" >
												</div>

											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>تاريخ الميلاد</label>
													<input type="text" name="neighborhood" class="form-control" >
												</div>

											</div>

											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>رقم الهويه</label>
													<input type="text" name="neighborhood" class="form-control" >
												</div>

											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>رقم الجوال</label>
													<input type="text" name="neighborhood" class="form-control" >
												</div>

											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>البريد الالكتروني </label>
													<input type="email" name="neighborhood" class="form-control" >
												</div>

											</div>
										</div>

		                            </div>
		                            <div class="tab-pane" id="captain">
										<div class="alert alert-warning alert-dismissible" role="alert" id="alert" style="display: none">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong>Warning!</strong> <div id="message"></div>
										</div>
		                                <h4 class="info-text">تكرم بإدخال معلومات التمويل  </h4>

										<div class="row">
											<h4 class="info-text">حدد نوع تمويل المشروع؟</h4>
											<div class="col-sm-4">
												<div class="radio">
													<label>
														<input type="radio" name="activity" value="5666666">
													</label>
													<span> قرض سكني </span>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="radio">
													<label>
														<input type="radio" name="activity" value="5666666">
													</label>
													<span> تمويل خاص </span>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="radio">
													<label>
														<input type="radio" name="activity" value="5666666">
													</label>
													<span> قرض سكني وتمويل الفارق </span>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>	كم هي قيمة القرض السكني </label>
													<input type="text" name="activity"  class="form-control">

												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>	حدد قيمة التمويل الخاص ان وجد </label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>		اسم البنك الممول (في حالة القرض السكني)</label>
													<input type="text" name="activity"  class="form-control">

												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>	رقم القرض السكني في البنك الممول</label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>	رقم الحساب البنكي للعميل </label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
										</div>
										<br/>
										<p class="" style="color: red">معلومات الأرض السكنية</p>
										<hr>
										<div class="row">

											<div class="col-sm-3">
												<div class="radio">
													<span> استخدام الارض : </span>
												</div>

											</div>
											<div class="col-sm-3">
												<div class="radio">
													<label>
														<input type="radio" name="tttt" value="5666666">
													</label>
													<span> سكن خاص </span>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="radio">
													<label>
														<input type="radio" name="tttt" value="5666666">
													</label>
													<span> مسكن شعبي </span>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="radio">
													<label>
														<input type="radio" name="tttt" value="5666666">
													</label>
													<span> تجاري </span>
												</div>

											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>الامارة </label>
													<input type="text" name="activity"  class="form-control">

												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>	المنطقة</label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>	الحي </label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>رقم القسيمة </label>
													<input type="text" name="activity"  class="form-control">

												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>	مساحة القطعه</label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>	تاريخ اصدار القسيمة </label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>	الشارع </label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
										</div>

		                            </div>

									<div class="tab-pane" id="activity">
										<h5 class="info-text"><strong> عزيزنا عميل خيرعون </strong>
											في هذه المرحله يتم الاستبيان بكثافة معلوماتية لكي نتمكن من خدمة بشكل أفضل.  حيث يتم تصنيف خيرعون الامارات كطرف أول ويتم تصنيف عميلنا الكريم بطرف ثاني. 										</h5>
										<div class="row">
												<h4 class="info-text">الفيلا وهي فيلا مكونة من ؟</h4>
												<div class="col-sm-4">
													<div class="radio">
														<span>A : </span>
														<label>
															<input type="radio" name="activity" value="5666666">
														</label>
														<span>  مبنى واحد وكتله واحده  </span>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="radio">
														<span>B : </span>
														<label>
															<input type="radio" name="activity" value="5666666">
														</label>
														<span> مبنى رئيسي للسكن ومبنى مستقل للضيافة </span>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="radio">
														<span>C : </span>
														<label>
															<input type="radio" name="activity" value="5666666">
														</label>
														<span>عدة مباني مستقله ومتعددة الاستخدام  </span>
													</div>
												</div>

										</div>
										<div class="row">
											<div class="col-sm-10">
												<div class="form-group label-floating">
													<label>	حسب التصميم المرفق والمعتمد من البلد يه، مع المحافظة على الارتدادات المطلوبة من قبل نظام البلد يه المتبع في مدينة  </label>
													<input type="text" name="activity"  class="form-control" placeholder="اكتب المدينة">

												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group label-floating">
													<label>	 في إمارة</label>
													<input type="text" name="activity"  class="form-control"  placeholder="اكتب الامارة">

												</div>

											</div>
										</div>
										<div class="row">
											<h4 class="info-text" style="float: right"> النظام السكني : </h4>
											<br/>
											<br/>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="radio">
													<span>يحتوي الاستاندرد الخاص بالطرف الاول (خيرعون الامارات) على عدة خيارات متعددة
													ويحق الطرف الثاني اختيار و تحديد المتطلبات حسب المخطط فيما يلي:
													الطابق الاول (الأرضي)</span>

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>A : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> مجالس الضيافة ( رجال )  </span>
													<label>اذكر عددها</label>
													<input type="text" name="activity" class="form-control" placeholder="اذكر عددها">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>B : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> مجالس الضيافة ( نساء )  </span>
													<label>اذكر عددها</label>
													<input type="text" name="activity" class="form-control" placeholder="اذكر عددها">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="checkbox">
													<span>C : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>غرفة طعام ضيافة مستقلة  </span>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="checkbox">
													<span>D : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>صالة البيت الرئيسية   </span>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="checkbox">
													<span>E : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>مطبخ خارجي مستقل  </span>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="checkbox">
													<span>F : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>مستودع خاص بالمطبخ الخارجي   </span>
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="checkbox">
													<span>G : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>مطبخ داخلي   </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>H : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> جناح النوم  ( الضيافة )  </span>
													<label>اذكر عددها</label>
													<input type="text" name="activity" class="form-control" placeholder="اذكر عددها">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="checkbox">
													<span>I : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> مصعد  </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="checkbox">
													<span>I : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> الدرج (جانبي او مفتوح على الصاله)    </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>H : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>مرافق أخرى.. يلزم ذكرها   </span>
													<label>اذكرها </label>
													<input type="text" name="activity" class="form-control" placeholder="اذكر المرافق الأخري">
												</div>
											</div>
										</div>
									</div>

									<div class="tab-pane" id="live">
										<h4 class="info-text">
											ينظم استاندرد خيرعون الطابق الثاني على اجنحة النوم وتحتوي على (غرفة النوم+ خزانة الملابس + دورة المياه)
										</h4>

										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>A : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>جناح النوم الرئيسي   </span>
													</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>B : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>جناح النوم المفرد.. اذكر عددها </span>
													<label>اذكرها </label>
													<input type="text" name="activity" class="form-control" placeholder="اذكر  عددها">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>C : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>جناح النوم المزدوج.. اذكر عددها  </span>
													<label>اذكرها </label>
													<input type="text" name="activity" class="form-control" placeholder="اذكر  عددها">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>D : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>صالة الطابق الثاني   </span>
													</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>E : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>بوفية مفتوح ع الصاله   </span>
												</div>
											</div>
										</div>
										<h4 class="info-text" style="">	الطابق الثالث: (السطح)</h4>
										<br/>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>A : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>غرف العمالة المنزلية    </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>B : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>منطقة الغسيل    </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>C : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>صالة رياضيه    </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>D : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>صالة السنما    </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>E : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>حديقة معلقه   </span>
												</div>
											</div>
										</div>

										<h4 class="info-text" style="">	الملاحق والاضافات الجانبية  </h4>
										<br/>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>A : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>ملحق السطح للفيلا حسب نظام البلدية المتبع</span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>B : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>ملحق المجلس الخارجي. (ديوانيه)</span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>C : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>المطبخ الخارجي    </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>D : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>السور الخارجي.    </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>E : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> غرفة حارس وحمامه.</span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>F : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>  موقف مظلة سيارة داخلي.</span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>G : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>  غرفة كهرباء حسب نظام البلدية المتبع</span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>H : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> خزان صرف صحي حسب نظام البلدية المتبع</span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>I : </span>
													<label> اضافة اخري يلزم تدوينها</label>
													<textarea type="text" name="activity" class="form-control" rows="4"></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<label>	المساحة الاجمالية للإشراف حسب المخططات </label>
													<input type="text" name="activity" class="form-control">
												</div>
											</div>
										</div>

									</div>
									<div class="tab-pane" id="attach">
										<h4 class="info-text"></h4>
										<div class="row">
											<div class="col-sm-6">
												<div class="choice btn-next" data-toggle="wizard-checkbox ">
													<div class="icon">
														<i class="fa fa-pencil "></i>
													</div>
													<h3>تصاميم من خيرعون الاستشاري</h3>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="choice" data-toggle="wizard-checkbox">
													<input type="checkbox" name="jobb" value="Design" id="oko">
													<div class="icon">
														<i class="fa fa-pencil"></i>
													</div>
													<h3>تصاميم من مكتب استشاري اخر</h3>
												</div>
											</div>
										</div>
										<hr>
										<h4 class="info-text">نتشرف بانضمامك الينا كما نتشرف بتقديم الدعم الفني للمشروع وعليه نرجوا التكرم بإدخال المعلومات الخاصة بالاستشاري المصمم للمشروع مسبقاً </h4>
										<div class="row">
											<div class="col-sm-3">
												<div class="form-group label-floating">
													<label>الامارة </label>
													<input type="text" name="activity"  class="form-control">

												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group label-floating">
													<label>	المدينه</label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
											<div class="col-sm-3">
												<div class="form-group label-floating">
													<label>	الحي </label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
											<div class="col-sm-3">
												<div class="form-group label-floating">
													<label>	اسم البناية </label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>	رقم هاتف الاستشاري </label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>	رقم المهندس المسئول عن التصميم </label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>	 رقم الفاكس الرسمي </label>
													<input type="text" name="activity"  class="form-control">

												</div>

											</div>
										</div>
										<h4 class="info-text">نتشرف بانضمامك الينا كما نتشرف بتقديم الدعم الفني للمشروع وعليه نرجوا التكرم بإدخال المعلومات الخاصة بالاستشاري المصمم للمشروع مسبقاً </h4>
										<p><small>يرجى التكرم بتحديد أنواع المخططات المعتمدة والصادرة من قبل الاستشاري المصمم مسبقاً و المتوفره لديك</small></p>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>A : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> المخططات المعمارية </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>A : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> المخططات الانشائية  </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>A : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> المخططات الخدمية (ماء، كهرباء، اتصالات ، صرف صحي ، تكييف). </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>A : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> التصميم الداخلي (في حال وجوده) </span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox">
													<span>A : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span> مخططات التنفيذية للتصميم الداخلي (في حال وجوده) </span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-12">
												<div class="checkbox">
													<span>A : </span>
													<label>
														<input type="checkbox" name="activity" value="5666666">
													</label>
													<span>إضافة تصاميم أو مخططات أخرى تكون موضوع طلب الاشراف الهندسي لخير عون عليها. </span>
												</div>
											</div>
										</div>
										<code><p>ملاحظة هامة (يتحمل الاستشاري السابق كافة التعديلات المطلوبة لأي مخططات تنفيذية تطلبها الدوائر الرسمية الأخرى+ عمل أي تعديل آخر يكون بطلب من المالك في المخططات).</p></code>


									</div>
									<div class="tab-pane" id="construct">
										<h4 class="info-text"> رسالة من ادارة الشركة</h4>
										<p>يقدم خيرعون الامارات باقة الاشراف ESPM وفق نظام اداري وهندسي وقانوني مُحكم، ليتم التعامل مع المشروع وفق الخطوات القانونية لحمايتكم بشكل احترافي ، حيثُ يُلزم خيرعون الامارات  كل مقاول برغب ببناء المشروع ، التسجيل في موقع الالكتروني المخصص لخدمة الاشراف ، وبعد التسجيل يتم تصنيف المقاول والتأكد من جميع الثبوتيات القانونيه وملائمته لتنفيذ المشروع واطلاعه على جميع الملفات و الاستاندرد الخاصه بخيرعون والكراسة التنفيذية عالية الوضوح في الية تنفيذ الاعمال وماهية الاشراف والاستلام والضبط المالي ونظام التقارير  وتوقيع عقد صادر من المحامي الخاص بخيرعون، كل هذا يقدم لخدمتكم ولضمان الحق لجميع الأطراف ، وإنتاج مشروع خالي من العيوب والاجتهادات الشخصيه، بإذن الله وتحد تلك الخطوات  من توقف المشروع بسبب المقاول او مقاول الباطن  او انسحاب المقاول من المشروع والعديد من المعوقات الضارة بالمشروع لاسمح الله وعليه نرجوا التكرم  بالتعاون معنا في هذه المرحله . لخدمتكم بشكل أفضل...  </p>


									</div>
									<div class="tab-pane" id="andtate">
										<h4 class="info-text">مقاول مرشح من قبل الطرف الثاني (مالك المشروع او من ينوب عنه) يرجى منكم التكرم بتعبئة الاستبيان التالي </h4>
										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	إسم المنشأه</label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	 نوع المنشأة للمقاول </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	 رقم الرخصة التجارية </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	مقـــر المقـــاول   </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	 رقم الرخصة التجارية </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	تصنيف الحكومي المقاول </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	 تاريخ التأسيس  </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	 تاريخ إصدار الرخصة التجارية </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	 تاريخ انتهاء الرخصة التجاريه </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>

										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	عدد العمالة للمقاول </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>

										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>رقم هاتف المقاول </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>

										<div class="col-sm-4">
											<div class="form-group label-floating">
												<label>	صندوق البريـــد</label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>


										<div class="col-sm-3">
											<div class="form-group label-floating">
												<label>	 المدينه </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>


										<div class="col-sm-3">
											<div class="form-group label-floating">
												<label>	الحي </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>

										<div class="col-sm-3">
											<div class="form-group label-floating">
												<label>	 اسم البناية </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>


										<div class="col-sm-3">
											<div class="form-group label-floating">
												<label>	 الطابق </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>

										<div class="col-sm-6">
											<div class="form-group label-floating">
												<label>	رقم الفاكـــــس </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-6">
											<div class="form-group label-floating">
												<label>	 الإيميل الرسمي للمقاول  </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-6">
											<div class="form-group label-floating">
												<label>	 الموقع الالكتروني للشركة </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>
										<div class="col-sm-6">
											<div class="form-group label-floating">
												<label>للتواصل (يرجى تحديد شخص ) </label>
												<input type="text" name="activity"  class="form-control">

											</div>

										</div>

									<code><p>	بعد قبول طلب الاشتراك بالباقة وتقيع العقد النهائي بين الطرف الاول ( خيرعون الامارات ) والطرف الثاني...                                ( عميل خيرعون ) يتم التواصل مع المقاول للبدء بتسجيل طلب الاعتماد من قبل المقاول في موقعنا المخصص لباقة الاشراف ،لكي يتم قبول الاعتماد للمقاول</p></code>

									</div>
									<div class="tab-pane" id="legal">

										<h4 class="info-text">الضوابط القانونية الخاصة بتسجيل الطلب، حيث يصنف الاستشاري (خيرعون الامارات)  بالطرف الاول والعميل المشترك بالباقة او من ينوب عنه بالطرف الثاني </h4>


										<p> 1.	يقدم الطرف الاول العقود اللازمة للطرف الثاني للتوقيع مع المقاول، وفق عقد مخصص ينظم علاقة المقاول بالطرف الثاني، كما يلتزم بعدم توقيع أي إتفاقية أو عقد يقُدم من قبل المقاول نهائياً، وان وجد ذلك مسبقاً فيلزم إلغائه </p>
										<p>2.	يلتزم الطرفان الاول والثاني، عبر إلزام المقاول بالتسجيل في منظومة خيرعون الامارات. قبل البدء في اعتماده من البلدية. </p>
										<p>3.	يقر الطرف الثاني بالموافقة التامة على سياسة الطرف الأول. (الاشتراطات والاحكام) وسيتم تزويدكم بها في مكتب الشركة قبل توقيع العقد النهائي. </p>
										<p>4.	الطرف الثاني يفوض الطرف الاول بمهام الاستشاري المعتمد للمشروع وفق نظام باقة ESPM بصفه حصريه</p>
										<p>5.	يحدد الطرف الأول مقاس 900 متر مربع او ما يعادلها بالقدم مسطح الأرض او اجمالي مسطحات المبنى كحد اقصى لباقة ESPM وفي حال كان أكثر من ذلك، يقدم الطرف الاول إعادة تسعير للمشروع حسب المخططات المرفقة</p>
										<p>6.	يقر الطرف الثاني بصحة جميع المعلومات المدخلة على مسؤوليته التامه. </p>
										<p>7.	يقر الطرف الثاني بالاطلاع التام على ملف باقة الاشراف ESPM الخاصة المقدمه من الطرف الاول، والموافقة على جميع بنودها</p>
										<p>8.	بعد قبول الطرف الاول الطلب المقدم من الطرف الثاني، وقبل تسديد قيمة الباقة يتكرم الطرف الثاني بزيارة مقر الطرف الاول الواقع في مدينة العين، والاطلاع جميع الملفات والعقود والتوقيع على العقود النهائية</p>
										<p>9.	يعتمد الطرف الاول محامي خاص به في صياغة العقود وعليه يلتزم الطرفان الاول والثاني بعدم توقيع أي عقود مع المقاول، او أي جهه أخرى ضماناً لحقه، وفي حال تم ذلك مسبقاً، يلزم ابلاغ الطرف الاول بذلك قبل توقيع العقد النهائي. </p>
										<p>10.	في حال كان الطرف الثاني يمتلك المخططات مسبقاً من قبل استشاري أخر فيلتزم الطرف الثاني بتزويد الطرف الاول بجميع المخططات بصيغة الاتوكاد قبل توقيع العقد النهائي بين الطرفان.</p>

									</div>
									<div class="tab-pane" id="other">

										<h4 class="info-text">بعد استلام العميل الرد بقبول الطلب نرجوا التكرم بتزويد المكتب الإستشاري (خيرعون) بالتالي </h4>

										<p>1.	تكليف الاستشاري بأوراق البلدية الرسمية للإشراف أو أي ورقة تعهدات تطلبها البلدية أو الدوائر الأخرى</p>
										<p>2.	سايت بلان لا تقل مدة اصداره عن 3 اشهر</p>
										<p>3.	سند ملكية الأرض للمالك</p>
										<p>4.	صورة عن الهوية لصاحب القسيمة سارية المفعول</p>
										<p>5.	صورة عن جواز السفر لصاحب القسيمة سارية المفعول</p>
										<p>6.	صورة عن خلاصة القيد لصاحب القسيمة سارية المفعول</p>
										<p>7.	في حالة وجود وكالة أو سند من المحكمة للوكيل عن صاحب القسيمة يتم تزويد الاستشاري بها</p>
										<p>8.	في حالة تمويل بنك يتم تزويد الاستشاري صورة عن رقم القرض وحالته.</p>
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



    $(document).ajaxStart(function () {
        $(".spinner").show();
    }).ajaxStop(function () {
        $(".spinner").hide();
    });

    $(document).ready(function(){


 city = function(stateID,localID){

    var url  = "{{url('Getlocal')}}";
		
	$.ajax(
        {
            url : url,
            type: "GET",
            data :  {
            	'stateID' : $('#'+stateID).val()	 
			},
            success:function(data, textStatus, jqXHR)
            {
				$('#'+localID).html(data);
	        },
            error: function(jqXHR, textStatus, errorThrown)
            {
               console.log('jqXHR = '+jqXHR+'textStatus = '+textStatus+'errorThrown ='+errorThrown);
               
            }
        });
        
};

        $("#parent").change(function(){

						//console.log($('#parent').val());
				if($('#parent').val()=='on'){
                    $("#parent_dis").css("display", "block");
				}else {
                    $("#parent_dis").css("display", "none");
				}





        });

        $("#choice1").click(function(){

            $('input[name=gender]').val('1');
        });
        $("#choice2").click(function(){

            $('input[name=gender]').val('2');
        });
        $("#Pay").click(function(){
            $("#rec").css("display", "inline");

        });
        $("#Pay2").click(function(){
            $("#rec").css("display", "none");

        });
         $("#parenOn").click(function(){
             $('input[name=father_exist]').val('1');
             $("#parent_dis").css("display", "none");

   			 });
        $("#parenOff").click(function(){
            $('input[name=father_exist]').val('');
            $("#parent_dis").css("display", "block");

        });
    });
    $('#btsubmit').click(function () {

        var phone1 = document.getElementById("phone1").value;
        var gender = document.getElementById("gender").value;
        var idcard_type = document.getElementById("idcard_type").value;
        var idcard_id = document.getElementById("idcard_id").value;
        var nid = document.getElementById("nid").value;
        var birthdate = document.getElementById("birthdate").value;
        var localID = document.getElementById("localID").value;
        var chargername = document.getElementById("chargername").value;
        var job_place = document.getElementById("job_place").value;
        var phone = document.getElementById("phone").value;
        var profilePic = document.getElementById("wizard-picture").value;
        var Attach0 = document.getElementById("Attach0").value;




        if (gender == "") {

            text = "الرجاء اختيار الجنس ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (phone1 == "") {

            text = "الرجاء ادخال رقم الهاتف ";
            swal("عفوا!", text, "error");
            return false;

        }

        if (isNaN(phone1)) {
            text = "رجاء كتابه رقم في حقل رقم الهاتف";
            swal("عفوا!", text, "error");
            return false;

        }

        if (idcard_type == "") {

            text = "الرجاء اختيار نوع اثبات الشخصية ";
            swal("عفوا!", text, "error");
            return false;

        }

        if (idcard_id == "") {

            text = "الرجاء كتابة رقم اثبات الشخصية ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (nid == "") {

            text = "الرجاء اختيار الجنسية ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (birthdate == "") {

            text = "الرجاء اختيار تاريخ الميلاد ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (localID == "") {

            text = "الرجاء اختيار المحلية ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (chargername == "") {

            text = "الرجاء كتابة اسم ولي الأمر ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (job_place == "") {

            text = "الرجاء كتابة مكان عمل ولي الامر ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (phone == "") {

            text = "الرجاء كتابة  رقم هاتف ولي الامر ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (profilePic == "") {

            text = "الرجاء ارفاق الصورة الشخصية ";
            swal("عفوا!", text, "error");
            return false;

        }
        if (Attach0 == "") {

            text = "الرجاء ارفاق اثبات الشخصية ";
            swal("عفوا!", text, "error");
            return false;

        }
        $( "#Registrationform" ).on( "submit", function( event ) {
            event.preventDefault();
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

                    if (data.status === 2){
                        swal("عفوا", "لقد قمت بتسجيل بياناتك سابقا , يرجي الانتظار ...", "error");
                        setTimeout(function(){

                            window.location.href = "http://ereg.neelain.edu.sd/Complete/"+"444";
                        }, 3000);
					}else {
                        swal("شكرا", "تم ارسال بياناتك بنجاح , يرجي الانتظار ...", "success");
                        setTimeout(function(){

                            window.location.href = "http://ereg.neelain.edu.sd/Complete/"+"555";
                        }, 3000);
					}
                    //console.log(data);

                },
                error: function(xhr, textStatus, thrownError){
                    swal("عفوا!", "تأكد من صحة البيانات وحاول مرة أخري", "error");
                }

            });
            $("#Appintsend").trigger("reset");

        });

    });
</script>

<script src="{{ asset('jquery-confirm.js') }}" type="text/javascript"></script>
<script src="{{ asset('jquery-ui.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets2/js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('assets2/js/jquery.bootstrap.js') }}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('assets2/js/material-bootstrap-wizard.js') }}"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{ asset('assets2/js/jquery.validate.min.js') }}"></script>

</body>
	<!--   Core JS Files   -->


</html>
