@extends('EMP.layout')
@section('content')

<style>
     a i{
        color: #e39548;
        margin-bottom: 5px;
    }
</style>
<style>

    .spinner {
        margin: 25px auto;
        left: 50%;
        top: 9%;
        width: 150px;
        height: 40px;
        text-align: center;
        font-size: 10px;
        position: fixed;
        z-index: 9999;

    }

    .spinner > div {
        background-color: #e39548;
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
 <div class="">
   <section class="content-header">
        <div class="">
          <h3>
           إدارة القبول
            <small> برنامج خيرعون لإدارة العملاء </small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('EmpDashboard') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
          </ol>
          </div>
        </section>
 </div>
 <div class="" style="margin-left: 0px !important;">
     <div class="col-md-4 col-sm-6 col-xs-12">
         <a href="#" id="count1">
             <div class="info-box">
                 <span class="info-box-icon bg-aqua"><i class="fa fa-project-diagram" style="margin-top: 20px;color: white;"></i></span>
                 <div class="info-box-content">
                     <span class="info-box-text">عملاء في مرحلة التواصل </span>
                     <span class="info-box-number">{{ $count1 }}<small> </small></span>
                 </div>
                 <!-- /.info-box-content -->
             </div>
         </a>

         <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-md-4 col-sm-6 col-xs-12">
         <a href="#" id="count2">
             <div class="info-box">
                 <span class="info-box-icon bg-red"><i class="fa fa-hard-hat" style="margin-top: 20px;color: white;"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text">المحولين للادارة الهندسية</span>
                     <span class="info-box-number">{{ $count2 }}</span>
                 </div>
                 <!-- /.info-box-content -->
             </div>
         </a>

         <!-- /.info-box -->
     </div>
     <!-- /.col -->

     <!-- fix for small devices only -->
     <div class="clearfix visible-sm-block"></div>

     <div class="col-md-4 col-sm-6 col-xs-12">
         <a href="#" id="count3">
             <div class="info-box">
                 <span class="info-box-icon bg-green"><i class="fa fa-user-friends" style="margin-top: 20px;color: white;"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text"> المحولين للادارة العليا</span>
                     <span class="info-box-number">{{ $count3 }}</span>
                 </div>
                 <!-- /.info-box-content -->
             </div>
         </a>

         <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-md-4 col-sm-6 col-xs-12">
         <a href="#" id="count4">
             <div class="info-box">
                 <span class="info-box-icon bg-yellow"><i class="fa fa-chart-line" style="margin-top: 20px;color: white;"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text"> عملاء جاهزين للدفع </span>
                     <span class="info-box-number">{{ $count4 }}</span>
                 </div>
                 <!-- /.info-box-content -->
             </div>
         </a>

         <!-- /.info-box -->
     </div>
     <div class="col-md-4 col-sm-6 col-xs-12">
         <a href="#" id="count5" name="5">
             <div class="info-box">
                 <span class="info-box-icon bg-yellow"><i class="fa fa-chart-line" style="margin-top: 20px;color: white;"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text"> الطلبات الملغية </span>
                     <span class="info-box-number">{{ $count5 }}</span>
                 </div>
                 <!-- /.info-box-content -->
             </div>
         </a>
         <!-- /.info-box -->
     </div>
     <div class="col-md-4 col-sm-6 col-xs-12">
         <a href="#" id="count6">
             <div class="info-box">
                 <span class="info-box-icon bg-yellow"><i class="fa fa-chart-line" style="margin-top: 20px;color: white;"></i></span>

                 <div class="info-box-content">
                     <span class="info-box-text"> الطلبات المقبولة </span>
                     <span class="info-box-number">{{ $count6 }}</span>
                 </div>
                 <!-- /.info-box-content -->
             </div>
         </a>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->
     @php
//$empid = $emp;
  $from = Carbon\Carbon::parse(now()->subDays(1))->format('Y-m-d');
    $to = Carbon\Carbon::parse(now())->format('Y-m-d');

    $ord = App\Models\Orders::where('status','processing')->whereBetween('date_created', [$from, $to])->get();

     @endphp
 </div>
        <div class="">
            <div class="spinner pull-right">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
                <p>جاري معالجة البيانات ...</p>
            </div>
            <div class="col-lg-12">
                <div class="col-md-3">
                    <a href="{{url('EmpProfile')}}" class="btn btn-app" style="width: 100%;height: 200px;">
                        <i class="fa fa-user fa-3x"  style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>الملف الشخصي
                    </a>
                </div>
                <div class="col-md-3" style="align-items: center;">
                    <a href="#" id="" class="btn btn-app NewOrders" style="width: 100%;height: 200px;">
                        <span class="badge bg-red" style="font-size: 20px">{{ count($ord) }}</span>
                        <i class="fab fa-wordpress-simple fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>
                        <p>الطلبات الجديدة</p>
                    </a>
                </div>
                <div class="col-md-3" style="align-items: center;">

                    <a href="#" id="completedOrders" class="btn btn-app " style="width: 100%;height: 200px;">
                        <i class="fa fa-check-circle fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>
                        الطلبات المقبولة
                    </a>
                </div>
                <div class="col-md-3" style="align-items: center;">

                    <a href="#" id="ChartsLibrary" class="btn btn-app" style="width: 100%;height: 200px;" data-toggle="modal" data-target="#Modalorder">
                        <i class="fa fa-question fa-lg" style="font-size: 55px;margin-top: 10%;margin-bottom: 10px;"></i>  استعلام برقم البينار
                    </a>
                </div>
            </div>
            @if(Auth::user()->roll == 'AdmissionAdmin')
           {{-- <div class="row">

                <div class="col-lg-6 container">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">نظام البونس للموظفين  </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                @foreach(App\User::where('roll','AdmissionEmp')->get() as $item)
                                    @php
                                    $pa = DB::table('pack_emp')->where('empID',$item->id)->pluck('PackageName');

                                    $count1 = App\BennarStatus::whereIn('PackName',$pa)->where('bennar_status',1)->count();
                                    $count2 = App\BennarStatus::whereIn('PackName',$pa)->where('bennar_status',6)->count();
                                    //dd($pa[]) ;
                                    @endphp
                                <li class="item">
                                    <div class="product-img" style="float: right">
                                        <img src="{{ asset('dist/img/default-50x50.gif') }}" alt="Product Image">
                                    </div>

                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">{{ $item->name }}
                                            <span class="label label-warning pull-left">$0.00</span></a>
                                        <span class="product-description">
                                          عدد المشاريع التي تم التواصل مع العميل فيها <span style="color: red;">{{ $count1 }}</span> - عدد المقبولة <span style="color: red;">{{ $count2 }}</span>
                                        </span>
                                    </div>

                                </li>
                                    @endforeach

                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">مشاهدة الكل</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
            </div>--}}
            @else

            @endif

        </div>
@if(Auth::user()->roll == 'AdmissionAdmin')
<div class="">
    <?php
    $Data = App\Models\User::join('emplyees','emplyees.id','=','users.EmpiD')
        ->join('branchs','branchs.id', '=','emplyees.Branch')
        ->join('manages_names','manages_names.id','=','emplyees.Managment')
        ->select('emplyees.*','manages_names.*','branchs.*','users.*', DB::raw('emplyees.id as emp_id, users.email as email,users.id as uid'))
        ->where('users.roll','=','AdmissionEmp')->get();
    ?>
    @foreach($Data as $item)
        @php
            $emcco1 = App\Models\BennarStatus::where('Emp','=',$item->uid)->where('bennar_status','=',1)->count();
            $emcco2 = App\Models\BennarStatus::where('Emp','=',$item->uid)->where('bennar_status','=',6)->count();
            $emcco3 = App\Models\BennarStatus::where('Emp','=',$item->uid)->where('bennar_status','=',5)->count();
            $date = Carbon\Carbon::parse(now()->subDays(3))->format('Y-m-d');

    $from = Carbon\Carbon::parse(now()->subDays(3))->format('Y-m-d');
    $to = Carbon\Carbon::parse(now())->format('Y-m-d');

    //$empid = $emp;
 $ord2 = App\Models\Orders::
 join('bennars_status','bennars_status.bennar_number','=','orders.number')
 ->where('orders.status','processing')
 ->whereNotIn('bennars_status.bennar_status',[1,2,3,4,5,6])
 ->whereBetween('orders.date_created', [$from, $to])->get();
        $co1 = 0;
        $co2 = 0;
        $co3 = 0;


$array = array('KZ-MA','KZ-Kpro','KZ-DKO','KZ-project','KZ-Spro','KZ-AP','KZ-CHPRO');

 $array2 = array('KZ-MA','KZ-Kpro','KZ-DKO','KZ-project','KZ-Spro','KZ-AP','KZ-CHPRO');

 $array3 = array('KZ-MA','KZ-Kpro','KZ-DKO','KZ-project','KZ-Spro','KZ-AP','KZ-CHPRO');


        foreach ($ord2 as $or){
        if (in_array($or['name'] ,$array)){
        $co1++;
        }elseif(in_array($or['name'] ,$array2)){
        $co2++;
        }elseif(in_array($or['name'] ,$array3)){
        $co3++;
        }

        }
        @endphp
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header " style="padding:20px;background-color: #323232 ;color: white">
                <div class="widget-user-image">
                    <img class="img-circle" src="{{ asset('dist/img/5.png') }}" alt="User Avatar" style="width: 90px">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{ $item->name }}
                    @if($item->isOnline())
                        <a href="#" style="font-size: 10px;color: white"><i class="fa fa-circle text-success"></i> متصل الان ..</a>
                             @else
                        <a href="#" style="font-size: 10px;color: white"><i class="fa fa-circle text-danger"></i> غير متصل الان</a>
                    @endif
                </h3>
                <h5 class="widget-user-desc">{{ $item->ManageName }}</h5>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <li><a href="#">آخر دخول للنظام <span class="pull-left badge bg-aqua">
                                {{ Carbon\Carbon::parse($item->last_login_at)->diffForHumans() }}
                            </span></a></li>
                    <li><a href="#" data-toggle="modal" data-target="#mod{{ $item->uid }}" id="res{{ $item->uid }}" data-id="1">تم التواصل مع العميل <span class="pull-left badge bg-aqua">{{ $emcco1 }}</span></a></li>
                    <li><a href="#" data-toggle="modal" data-target="#mod2{{ $item->uid }}" id="res2{{ $item->uid }}" data-id="6">تمت الموافقة عليها  <span class="pull-left badge bg-green">{{ $emcco2 }}</span></a></li>
                    <li><a href="#" data-toggle="modal" data-target="#mod3{{ $item->uid }}" id="res3{{ $item->uid }}"  data-id="5">  طلبات تم الغاءها  <span class="pull-left badge bg-green">{{ $emcco3 }}</span></a></li>
                    <li><a href="#" data-toggle="modal" data-target="#mod4{{ $item->uid }}" id="res4{{ $item->uid }}"  data-id="5">  جميع مشاريع المهندس (خلال اخر شهر)  <span class="pull-left badge bg-green">{{ $emcco3 }}</span></a></li>
                    <li><a href="#" data-toggle="modal" data-target="#mod5{{ $item->uid }}">المشاريع المتأخرة عن 72 ساعه <span class="pull-left badge bg-red">
                            @if($item->uid == 23)
                                    {{ $co1 }}
                            @endif
                                @if($item->uid == 24)
                                    {{ $co2 }}
                                @endif
                                @if($item->uid == 25)
                                    {{ $co3 }}
                                @endif
                            </span></a></li>

                </ul>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
            <script>
                $(document).ready(function(){
                    $('#mod{{ $item->uid }}').on('shown.bs.modal', function (e) {
                        var emp = "{{ $item->uid }}";
                        $.ajax({
                            url: "{{url('Order_byStatus_and_emp')}}/"+"1"+"/"+emp,
                            type: "GET",
                            success: function(data){
                                $("#Droping{{ $item->uid }}").html(data);
                            },
                            error: function(){
                                console.log("No results for " + data + ".");
                            }
                        });
                    });
                    $('#mod2{{ $item->uid }}').on('shown.bs.modal', function (e) {
                        var emp = "{{ $item->uid }}";
                        $.ajax({
                            url: "{{url('Order_byStatus_and_emp')}}/"+"6"+"/"+emp,
                            type: "GET",
                            success: function(data){
                                $("#Droping2{{ $item->uid }}").html(data);
                            },
                            error: function(){
                                console.log("No results for " + data + ".");
                            }
                        });
                    });

                    $('#mod3{{ $item->uid }}').on('shown.bs.modal', function (e) {
                        var emp = "{{ $item->uid }}";
                        $.ajax({
                            url: "{{url('Order_byStatus_and_emp')}}/"+"5"+"/"+emp,
                            type: "GET",
                            success: function(data){
                                $("#Droping3{{ $item->uid }}").html(data);
                            },
                            error: function(){
                                console.log("No results for " + data + ".");
                            }
                        });
                    });


                    $('#mod5{{ $item->uid }}').on('shown.bs.modal', function (e) {
                        var emp = "{{ $item->uid }}";
                        $.ajax({
                            url: "{{url('Orders_Late')}}/"+emp,
                            type: "GET",
                            success: function(data){
                                $("#Droping5{{ $item->uid }}").html(data);
                            },
                            error: function(){
                                console.log("No results for " + data + ".");
                            }
                        });
                    });

                });
            </script>
            <div class="modal fade" id="mod{{ $item->uid }}" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">متابعة طلبات المهندس {{ $item->name }}</h4>
                        </div>
                        <div class="modal-body" style="min-height: 500px">
                            <div id="Droping{{ $item->uid }}">

                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="mod2{{ $item->uid }}" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">متابعة طلبات المهندسين</h4>
                        </div>
                        <div class="modal-body" style="min-height: 500px">
                            <div id="Droping2{{ $item->uid }}">

                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="mod3{{ $item->uid }}" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">متابعة طلبات المهندسين</h4>
                        </div>
                        <div class="modal-body" style="min-height: 500px">
                            <div id="Droping3{{ $item->uid }}">

                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="mod5{{ $item->uid }}" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">متابعة طلبات المهندسين</h4>
                        </div>
                        <div class="modal-body" style="min-height: 500px">
                            <div id="Droping5{{ $item->uid }}">

                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

        @endforeach
</div>
@endif
@endsection
