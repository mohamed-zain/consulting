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
		@media only screen and (max-width: 720px) {
			.logo {
				display: none;
			}
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
	                <img src="{{ asset('logo20221.png') }}">
	            </div>
	            <div class="brand">خيرعون جدة </div>
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
		                <div class="card wizard-card" data-color="blue" id="wizard">
						<form action="{{ route('CheckUp') }}" method="POST" enctype="multipart/form-data"  id="Registrationform">
							{{ csrf_field() }}
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
											<img src="{{ asset('logo20221.png') }}" style="max-height: 80px;width: auto" class="img-responsive center logo">
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
											<h3 class="wizard-title">
												التسجيل كإستشاري - خير عون جدة
											</h3>
											<h5>قم بتعبئة النموذج وتأكد من صحة البيانات المدخلة</h5>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
											<img src="{{ asset('logo20221.png') }}" style="max-height: 80px;float: left!important;" class="img-responsive center logo">
										</div>
									</div>


		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#details" data-toggle="tab">البيانات الاساسية</a></li>
										<li><a href="#legal" data-toggle="tab">الملفات المطلوبة</a></li>
										<li><a href="#other" data-toggle="tab">الشروط والأحكام</a></li>

			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="details">
										<h4 class="info-text">تكرم بإدخال المعلومات الشخصية عزيزنا العميل </h4>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>المنطقة</label>
													<input name="idcard_id" class="form-control"  id="idcard_id">
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>  المدينة </label>
													<select name="idcard_type" id="idcard_type" class="form-control" >
														{{--@foreach($idtyype as $itype)
                                                            <option value="{{$itype->cardtype_id}}">{{$itype->cardtype_name}}</option>
                                                        @endforeach--}}
													</select>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>  الحي واسم الشارع </label>
													<input type="text" name="idcard_id" class="form-control"  id="idcard_id">

												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>نوع الكيان</label>
													<select name="local_id" id="localID" class="form-control" >
														<option value="">مؤسسة</option>
														<option value="">شركة</option>
														<option value="">مكتب استشاري عام </option>
														<option value="">مكتب استشاري متخصص</option>
														<option value="">مجموعة</option>

													</select>
												</div>

											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label>اسم الكيان كما في السجل التجاري</label>
													<input type="text" name="phone1" class="form-control mynum"  id="phone1" minlength="1" maxlength="10" >

												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label> رقم السجل التجاري </label>
													<input type="text" name="phone1" class="form-control mynum"  id="phone1" minlength="1" maxlength="10" >

												</div>

											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label> نوع النشاط كما هو في السجل التجاري </label>
													<select name="local_id" id="localID" class="form-control" >
														<option value="">A.	استشارات هندسية ( مخططات وتصاميم )</option>
														<option value="">B.	استشارت هندسية ( مخططات ،تصاميم  واشراف)</option>
														<option value="">C.	استشارات هندسية إدارة مشاريع انشائية</option>
														<option value="">D.	استشارات هندسية تصاميم داخليه </option>
														<option value="">E.	مكتب مساحة معتمد. </option>
														<option value="">F.	مختبر معتمد. (تربة ، تكنلوجيا خرسانية )</option>

													</select>
												</div>
											</div>
											<div class="col-sm-6">
												{{--<div class="form-group label-floating">
													<label></label>
													<div class="choice" data-toggle="wizard-radio" rel="tooltip" title="" data-original-title="يجب ان يكون الملف بصيغة PDF">
														<input type="file" name="type" value="House">
														<div class="icon">
															<i class="material-icons">تحميل</i>
														</div>
														<h4></h4>
													</div>
												</div>--}}

											</div>
										</div>

										<div class="row">
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>  البريد الالكتروني الرسمي للمنشأة </label>
													<input type="email" name="home_no" class="form-control">

												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group label-floating">
													<label>الهاتف الرسمي </label>
													<input type="number" name="home_no" class="form-control">

												</div>

											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-sm-4">
												<div class="form-group label-floating">
													<label> اسم مدير المكتب المفوض من قبل المالك</label>
													<input type="text" name="home_no" class="form-control">
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
													<label>الايميل</label>
													<input type="email" name="neighborhood" class="form-control" >
												</div>

											</div>

											{{--<div class="col-sm-4">
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

											</div>--}}
										</div>

		                            </div>
									<div class="tab-pane" id="legal">
										<div class="row">
											<div class="col-sm-12 col-sm-offset-1">
												<div class="col-sm-4 col-sm-offset-2">
													<div class="choice" data-toggle="wizard-radio" rel="tooltip" title="" data-original-title="يجب ان تكون النسخة بصيغة PDF">
														<input type="radio" name="type" value="House">
														<div class="icon">
															<i class="material-icons">Upload</i>
														</div>
														<h4>نسخة من رخصة هيئة المهندسين</h4>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="choice active" data-toggle="wizard-radio" rel="tooltip" title="" data-original-title="يجب ان تكون النسخة بصيغة PDF">
														<input type="radio" name="type" value="Appartment" checked="checked">
														<div class="icon">
															<i class="material-icons">Upload</i>
														</div>
														<h4>نسخة من السجل التجاري</h4>
													</div>
												</div>
											</div>
										</div>
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
	                                    <input type='button' class='btn btn-next btn-fill btn-info btn-wd' name='next' value='التالي' />
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
