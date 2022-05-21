<script>
    $(function(){

        // Cache some selectors

        var clock = $('#clock'),
            alarm = clock.find('.alarm'),
            ampm = clock.find('.ampm');

        // Map digits to their names (this will be an array)
        var digit_to_name = 'zero one two three four five six seven eight nine'.split(' ');

        // This object will hold the digit elements
        var digits = {};

        // Positions for the hours, minutes, and seconds
        var positions = [
            'h1', 'h2', ':', 'm1', 'm2', ':', 's1', 's2'
        ];

        // Generate the digits with the needed markup,
        // and add them to the clock

        var digit_holder = clock.find('.digits');

        $.each(positions, function(){

            if(this == ':'){
                digit_holder.append('<div class="dots">');
            }
            else{

                var pos = $('<div>');

                for(var i=1; i<8; i++){
                    pos.append('<span class="d' + i + '">');
                }

                // Set the digits as key:value pairs in the digits object
                digits[this] = pos;

                // Add the digit elements to the page
                digit_holder.append(pos);
            }

        });

        // Add the weekday names

        var weekday_names = 'MON TUE WED THU FRI SAT SUN'.split(' '),
            weekday_holder = clock.find('.weekdays');

        $.each(weekday_names, function(){
            weekday_holder.append('<span>' + this + '</span>');
        });

        var weekdays = clock.find('.weekdays span');

        // Run a timer every second and update the clock

        (function update_time(){

            // Use moment.js to output the current time as a string
            // hh is for the hours in 12-hour format,
            // mm - minutes, ss-seconds (all with leading zeroes),
            // d is for day of week and A is for AM/PM

            var now = moment().format("hhmmssdA");

            digits.h1.attr('class', digit_to_name[now[0]]);
            digits.h2.attr('class', digit_to_name[now[1]]);
            digits.m1.attr('class', digit_to_name[now[2]]);
            digits.m2.attr('class', digit_to_name[now[3]]);
            digits.s1.attr('class', digit_to_name[now[4]]);
            digits.s2.attr('class', digit_to_name[now[5]]);

            // The library returns Sunday as the first day of the week.
            // Stupid, I know. Lets shift all the days one position down,
            // and make Sunday last

            var dow = now[6];
            dow--;

            // Sunday!
            if(dow < 0){
                // Make it last
                dow = 6;
            }

            // Mark the active day of the week
            weekdays.removeClass('active').eq(dow).addClass('active');

            // Set the am/pm text:
            ampm.text(now[7]+now[8]);

            // Schedule this function to be run again in 1 sec
            setTimeout(update_time, 1000);

        })();

        // Switch the theme

        $('a.button').click(function(){
            clock.toggleClass('light dark');
        });

    });
</script>
<style>
    .widget-user .widget-user-header {
        padding: 20px;
        height: 120px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
    .widget-user .widget-user-image {
        position: absolute;
        top: 65px;
        left: 50%;
        margin-left: -45px;
    }
    .widget-user .box-footer {
        padding-top: 50px;
    }

    #clock{
        width:450px;
        margin:0px auto 60px;
        position:relative;
    }

    #clock:after{
        content:'';
        position:absolute;
        width:400px;
        height:20px;
        border-radius:100%;
        left:50%;
        margin-left:-200px;
        bottom:2px;
        z-index:-1;
    }


    #clock .display{
        text-align:center;
        padding: 40px 20px 20px;
        border-radius:6px;
        position:relative;
        height: 115px;
    }


    /*-------------------------
        Light color theme
    --------------------------*/


    #clock.light{
        background-color:#f3f3f3;
        color:#272e38;
    }

    #clock.light:after{
        box-shadow:0 4px 10px rgba(0,0,0,0.15);
    }

    #clock.light .digits div span{
        background-color:#272e38;
        border-color:#272e38;
    }

    #clock.light .digits div.dots:before,
    #clock.light .digits div.dots:after{
        background-color:#272e38;
    }

    #clock.light .alarm{
        background:url('../img/alarm_light.jpg');
    }

    #clock.light .display{
        background-color:#dddddd;
        box-shadow:0 1px 1px rgba(0,0,0,0.08) inset, 0 1px 1px #fafafa;
    }


    /*-------------------------
        Dark color theme
    --------------------------*/


    #clock.dark{
        background-color:#272e38;
        color:#cacaca;
    }

    #clock.dark:after{
        box-shadow:0 4px 10px rgba(0,0,0,0.3);
    }

    #clock.dark .digits div span{
        background-color:#cacaca;
        border-color:#cacaca;
    }

    #clock.dark .alarm{
        background:url('../img/alarm_dark.jpg');
    }

    #clock.dark .display{
        background-color:#0f1620;
        box-shadow:0 1px 1px rgba(0,0,0,0.08) inset, 0 1px 1px #2d3642;
    }

    #clock.dark .digits div.dots:before,
    #clock.dark .digits div.dots:after{
        background-color:#cacaca;
    }


    /*-------------------------
        The Digits
    --------------------------*/
    #clock .digits {
        direction: ltr;
    }

    #clock .digits div{
        text-align:left;
        position:relative;
        width: 28px;
        height:50px;
        display:inline-block;
        margin:0 4px;
    }

    #clock .digits div span{
        opacity:0;
        position:absolute;

        -webkit-transition:0.25s;
        -moz-transition:0.25s;
        transition:0.25s;
    }

    #clock .digits div span:before,
    #clock .digits div span:after{
        content:'';
        position:absolute;
        width:0;
        height:0;
        border:5px solid transparent;
    }

    #clock .digits .d1{			height:5px;width:16px;top:0;left:6px;}
    #clock .digits .d1:before{	border-width:0 5px 5px 0;border-right-color:inherit;left:-5px;}
    #clock .digits .d1:after{	border-width:0 0 5px 5px;border-left-color:inherit;right:-5px;}

    #clock .digits .d2{			height:5px;width:16px;top:24px;left:6px;}
    #clock .digits .d2:before{	border-width:3px 4px 2px;border-right-color:inherit;left:-8px;}
    #clock .digits .d2:after{	border-width:3px 4px 2px;border-left-color:inherit;right:-8px;}

    #clock .digits .d3{			height:5px;width:16px;top:48px;left:6px;}
    #clock .digits .d3:before{	border-width:5px 5px 0 0;border-right-color:inherit;left:-5px;}
    #clock .digits .d3:after{	border-width:5px 0 0 5px;border-left-color:inherit;right:-5px;}

    #clock .digits .d4{			width:5px;height:14px;top:7px;left:0;}
    #clock .digits .d4:before{	border-width:0 5px 5px 0;border-bottom-color:inherit;top:-5px;}
    #clock .digits .d4:after{	border-width:0 0 5px 5px;border-left-color:inherit;bottom:-5px;}

    #clock .digits .d5{			width:5px;height:14px;top:7px;right:0;}
    #clock .digits .d5:before{	border-width:0 0 5px 5px;border-bottom-color:inherit;top:-5px;}
    #clock .digits .d5:after{	border-width:5px 0 0 5px;border-top-color:inherit;bottom:-5px;}

    #clock .digits .d6{			width:5px;height:14px;top:32px;left:0;}
    #clock .digits .d6:before{	border-width:0 5px 5px 0;border-bottom-color:inherit;top:-5px;}
    #clock .digits .d6:after{	border-width:0 0 5px 5px;border-left-color:inherit;bottom:-5px;}

    #clock .digits .d7{			width:5px;height:14px;top:32px;right:0;}
    #clock .digits .d7:before{	border-width:0 0 5px 5px;border-bottom-color:inherit;top:-5px;}
    #clock .digits .d7:after{	border-width:5px 0 0 5px;border-top-color:inherit;bottom:-5px;}


    /* 1 */

    #clock .digits div.one .d5,
    #clock .digits div.one .d7{
        opacity:1;
    }

    /* 2 */

    #clock .digits div.two .d1,
    #clock .digits div.two .d5,
    #clock .digits div.two .d2,
    #clock .digits div.two .d6,
    #clock .digits div.two .d3{
        opacity:1;
    }

    /* 3 */

    #clock .digits div.three .d1,
    #clock .digits div.three .d5,
    #clock .digits div.three .d2,
    #clock .digits div.three .d7,
    #clock .digits div.three .d3{
        opacity:1;
    }

    /* 4 */

    #clock .digits div.four .d5,
    #clock .digits div.four .d2,
    #clock .digits div.four .d4,
    #clock .digits div.four .d7{
        opacity:1;
    }

    /* 5 */

    #clock .digits div.five .d1,
    #clock .digits div.five .d2,
    #clock .digits div.five .d4,
    #clock .digits div.five .d3,
    #clock .digits div.five .d7{
        opacity:1;
    }

    /* 6 */

    #clock .digits div.six .d1,
    #clock .digits div.six .d2,
    #clock .digits div.six .d4,
    #clock .digits div.six .d3,
    #clock .digits div.six .d6,
    #clock .digits div.six .d7{
        opacity:1;
    }


    /* 7 */

    #clock .digits div.seven .d1,
    #clock .digits div.seven .d5,
    #clock .digits div.seven .d7{
        opacity:1;
    }

    /* 8 */

    #clock .digits div.eight .d1,
    #clock .digits div.eight .d2,
    #clock .digits div.eight .d3,
    #clock .digits div.eight .d4,
    #clock .digits div.eight .d5,
    #clock .digits div.eight .d6,
    #clock .digits div.eight .d7{
        opacity:1;
    }

    /* 9 */

    #clock .digits div.nine .d1,
    #clock .digits div.nine .d2,
    #clock .digits div.nine .d3,
    #clock .digits div.nine .d4,
    #clock .digits div.nine .d5,
    #clock .digits div.nine .d7{
        opacity:1;
    }

    /* 0 */

    #clock .digits div.zero .d1,
    #clock .digits div.zero .d3,
    #clock .digits div.zero .d4,
    #clock .digits div.zero .d5,
    #clock .digits div.zero .d6,
    #clock .digits div.zero .d7{
        opacity:1;
    }


    /* The dots */

    #clock .digits div.dots{
        width:5px;
    }

    #clock .digits div.dots:before,
    #clock .digits div.dots:after{
        width:5px;
        height:5px;
        content:'';
        position:absolute;
        right:0;
        top:14px;
    }

    #clock .digits div.dots:after{
        top:34px;
    }


    /*-------------------------
        The Alarm
    --------------------------*/


    #clock .alarm{
        width:16px;
        height:16px;
        bottom:20px;
        background:url('../img/alarm_light.jpg');
        position:absolute;
        opacity:0.2;
    }

    #clock .alarm.active{
        opacity:1;
    }


    /*-------------------------
        Weekdays
    --------------------------*/


    #clock .weekdays{
        font-size:12px;
        position:absolute;
        width:100%;
        top:10px;
        right:0;
        text-align:center;
    }


    #clock .weekdays span{
        opacity:0.2;
        padding:0 10px;
    }

    #clock .weekdays span.active{
        opacity:1;
    }


    /*-------------------------
            AM/PM
    --------------------------*/


    #clock .ampm{
        position:absolute;
        bottom:20px;
        right:20px;
        font-size:12px;
    }


    /*-------------------------
            Button
    --------------------------*/


    .button-holder{
        text-align:center;
        padding-bottom:100px;
    }

    a.button{
        background-color:#f6a7b3;

        background-image:-webkit-linear-gradient(top, #f6a7b3, #f0a3af);
        background-image:-moz-linear-gradient(top, #f6a7b3, #f0a3af);
        background-image:linear-gradient(top, #f6a7b3, #f0a3af);

        border:1px solid #eb9ba7;
        border-radius:2px;

        box-shadow:0 2px 2px #ccc;

        color:#fff;
        text-decoration: none !important;
        padding:15px 20px;
        display:inline-block;
        cursor:pointer;
    }

    a.button:hover{
        opacity:0.9;
    }


    /*----------------------------
        The Demo Footer
    -----------------------------*/


    footer{

        width: 770px;
        padding: 15px 35px;
        position: fixed;
        bottom: 0;
        left: 50%;
        margin-left: -420px;

        background-color:#1f1f1f;

        background-image:-webkit-linear-gradient(top, #1f1f1f, #101010);
        background-image:-moz-linear-gradient(top, #1f1f1f, #101010);
        background-image:linear-gradient(top, #1f1f1f, #101010);

        border-radius:2px 2px 0 0;

        box-shadow: 0 -1px 4px rgba(0,0,0,0.4);
        z-index:1;
    }

    footer a.tz{
        font-weight:normal;
        font-size:16px !important;
        text-decoration:none !important;
        display:block;
        margin-right: 300px;
        text-overflow:ellipsis;
        white-space: nowrap;
        color:#bfbfbf !important;
        z-index:1;
    }

    footer a.tz:before{
        content: '';
        width: 138px;
        height: 20px;
        display: inline-block;
        position: relative;
        bottom: -3px;
    }

    footer .close{
        position: absolute;
        cursor: pointer;
        width: 8px;
        height: 8px;
        top:10px;
        right:10px;
        z-index: 3;
    }

    footer #tzine-actions{
        position: absolute;
        top: 8px;
        width: 500px;
        right: 50%;
        margin-right: -650px;
        text-align: right;
        z-index: 2;
    }

    footer #tzine-actions iframe{
        display: inline-block;
        height: 21px;
        width: 95px;
        position: relative;
        float: left;
        margin-top: 11px;
    }
</style>

<header class="main-header">
    <!-- Logo -->
    <a href="{{url('index')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>K</b>O</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"> <img src="{{ asset('dist/img/koyellow.png') }}" class="" alt="User Image" style="height: 30px;"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <?php
                $kkk = DB::table('tasks')->where('EmpID',auth()->user()->id)->where('TaskRead','no')->get();

                $count = DB::table('tasks')->where('EmpID',auth()->user()->id)->where('TaskRead','no')->count();
                $inout = \App\Helpers\CheckinOut::todayCheckinOut();
                ?>

                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">{{ $count }}</span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="header">تنبيهات من ادارة خير عون</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                   <ul class="menu">

                                     @foreach($kkk as $ggggg)
                                         <?php $pro = DB::table('activate_files')->where('Bennar',$ggggg->Bennar_Code)->first(); ?>
                                     <li>
                                       <a href="#">
                                         <div class="pull-right">
                                           <img src="{{ asset('/img/logo.png') }}" class="img-circle" alt="User Image">
                                         </div>

                                         <h4>
                                            {{Str::limit($pro->Name, 10)}}
                                           <small><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($ggggg->created_at)->diffForHumans() }} </small>
                                         </h4>
                                         <p>{{ $pro->FileCode }} </p>
                                       </a>
                                     </li>
                                    @endforeach
                                   </ul>
                            </li>
                            <li class="footer"><a href="{{ url('') }}">مشاهدة كل المهام</a></li>
                        </ul>
                    </li>
                <li class="dropdown notifications-menu">
                    <a href="#" data-toggle="modal" data-target="#empatten">
                        الحضور والإنصراف
                    </a>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="{{ url('EngineeringLibrary') }}">
                        المكتبة الهندسية
                    </a>
                </li>
                <li>
                    <a href="#" data-toggle="control-sidebar">  الاعدادات</a>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('dist/img/logo.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                    @if(Auth::check())
                                {{ Auth::user()->name }}
                            @endif</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php
                            $dtt = DB::table('emplyees')->select('Attached as at')->where('id','=',Auth::user()->EmpiD)->get();
                            ?>
                            @if(isset($dt))
                                <img src="{{$dtt->dt}}" class="img-circle" alt="User Image">
                            @else
                                <img src="{{ asset('dist/img/logo.png') }}" class="img-circle" alt="User Image">

                            @endif
                            <p style="color: #e39548;">
                                @if(Auth::check())
                                    {{ Auth::user()->name }}
                                @endif
                            </p>
                        </li>

                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">الملف الشخصي</a>
                            </div>
                            <div class="pull-left">
                                <form action="{{ url('logout') }}" method="post">
                                    @csrf
                                    <button class="btn btn-default btn-flat">تسجيل الخروج</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
<div class="modal fade" id="empatten" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title">تسجيل الحضور والانصراف</h4></center>
            </div>
            <div class="modal-body">
                <div id="clock" class="light">
                    <div class="display">
                        <div class="weekdays"></div>
                        <div class="ampm"></div>
                        <div class="alarm"></div>
                        <div class="digits"></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                    <?php $job = \App\Models\Emplyee::where('id',auth()->user()->EmpiD)->first(); ?>
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('public/dist/img/photo1.png') center center;">
                            <h3 class="widget-user-username">{{ auth()->user()->name }}</h3>
                            <h5 class="widget-user-desc">{{ $job->JobName }}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{ url('public/img/logo.png') }}" alt="User Avatar" style="height: 100px">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-left">
                                    <div class="description-block">
                                        <h5 class="description-header">الساعات الاسبوعية</h5>
                                        <span class="description-text">48 ساعة </span>
                                    </div><!-- /.description-block -->
                                </div><!-- /.col -->
                                <div class="col-sm-4 border-left">
                                    <div class="description-block">
                                        <h5 class="description-header">الحضور</h5>
                                        <span class="description-text">--</span>
                                    </div><!-- /.description-block -->
                                </div><!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">الغياب</h5>
                                        <span class="description-text">--</span>
                                    </div><!-- /.description-block -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div>



                    </div><!-- /.widget-user -->
                    <div class="row">
                        <div class="col-sm-6">
                            @if($inout->checkin == 'no')
                                @if($inout->ip == '31.166.145.69')
                                    <button class="btn btn-default btn-block btn-flat" id="{{ $inout->id }}" data-id="{{$inout->id}}" data-token="{{csrf_token()}}" onclick='
                                            swal({
                                            title: "تسجيل حضورك للمكتب",
                                            text: "يجب عليك التأكد من تسجيل خروجك عند انتهاء الدوام",
                                            type: "info",
                                            showCancelButton: true,
                                            closeOnConfirm: false,
                                            showLoaderOnConfirm: true,
                                            },
                                            function(){
                                            setTimeout(function(){
                                            var id = $("#{{ $inout->id }}").data("id");
                                            var token = $("#{{ $inout->id }}").data("token");
                                            $.ajax({
                                            type: "GET",
                                            url : "EmpCheckin/"+id,
                                            data : {
                                            "":id,
                                            "_method":"GET",
                                            "_token":token,
                                            },
                                            //dataType: "json",
                                            cache:false,

                                            success  : function(data) {
                                            swal("شكرا","تم بنجاح" , "success");
                                            setTimeout(function() {
                                            var href = "{{url('EngineerDashboard')}}";
                                            window.location.href = href;
                                            },1000);
                                            },
                                            error: function(xhr, textStatus, thrownError){
                                            // console.log(thrownError);
                                            swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                            }

                                            });

                                            }, 1000);
                                            });
                                            '><i class="fa fa-warning text-yellow"></i> <span class="text-yellow">لم تقم بتسجيل حضورك لليوم</span></button>

                                @else
                                    <button class="btn btn-default btn-block btn-flat"><span class="text-red">لا يمكنك الدخول - انت خارج المكتب</span></button>
                                @endif
                            @elseif($inout->checkin == 'yes')
                                <button class="btn btn-default btn-block btn-flat"><i class="fa fa-check-circle text-green"></i> <span class="text-green">تم تسجيل حضورك اليوم</span></button>
                            @endif

                        </div>
                        <div class="col-sm-6">
                            @if($inout->checkin == 'yes' && $inout->checkout == 'no')
                                @if($inout->ip == '31.166.145.69')
                                    <button class="btn btn-default btn-block btn-flat" id="{{ $inout->id }}" data-id="{{$inout->id}}" data-token="{{csrf_token()}}" onclick='
                                            swal({
                                            title: "تسجيل خروجك من المكتب",
                                            text: "شكرا علي التزامك ",
                                            type: "info",
                                            showCancelButton: true,
                                            closeOnConfirm: false,
                                            showLoaderOnConfirm: true,
                                            },
                                            function(){
                                            setTimeout(function(){
                                            var id = $("#{{ $inout->id }}").data("id");
                                            var token = $("#{{ $inout->id }}").data("token");
                                            $.ajax({
                                            type: "GET",
                                            url : "EmpCheckout/"+id,
                                            data : {
                                            "":id,
                                            "_method":"GET",
                                            "_token":token,
                                            },
                                            //dataType: "json",
                                            cache:false,

                                            success  : function(data) {
                                            swal({
                                            title: "تسجيل خروجك من المكتب",
                                            text:  data,
                                            type: "info",
                                            showCancelButton: true,
                                            closeOnConfirm: false,
                                            showLoaderOnConfirm: true,
                                            },function (){
                                            swal("شكرا","تم بنجاح" , "success");
                                            setTimeout(function() {
                                            var href = "{{url('EngineerDashboard')}}";
                                            window.location.href = href;
                                            },1000);
                                            })
                                            },
                                            error: function(xhr, textStatus, thrownError){
                                            // console.log(thrownError);
                                            swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                            }

                                            });

                                            }, 1000);
                                            });
                                            '><i class="fa fa-warning text-yellow"></i> <span class="text-yellow"> لم تقم بتسجيل خروجك لليوم</span></button>


                                @else
                                    <button class="btn btn-default btn-block btn-flat"><i class="fa fa-warning text-red"></i> <span class="text-red">لا يمكنك الخروج - انت خارج المكتب</span></button>
                                @endif
                            @endif
                                @if($inout->checkout == 'yes')
                                    <button class="btn btn-default btn-block btn-flat"><i class="fa fa-check-circle text-green"></i> <span class="text-green">تم تسجيل خروجك اليوم</span></button>
                                @endif
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>