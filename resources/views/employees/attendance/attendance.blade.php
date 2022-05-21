@extends('index')
<?php

$abs = \App\Models\User::where('roll','AdmissionEmp')->whereNotIn('id',[24,25,28,23])->get();
$absCount = 0;
$exist = [];
foreach ($abs as $ff){
    $ch = App\Models\CheckinOut::where('usr_id',$ff->id)->whereDate('datetime',Carbon\Carbon::today())->first();
    if (!isset($ch)){
        $absCount ++;
        $exist = Illuminate\Support\Arr::prepend($exist, $ff->id);
        //$exist = Illuminate\Support\Arr::add($ff->id);
    }elseif(isset($ch)){
        //$exist = Illuminate\Support\Arr::add()
        //'';
    }

}
//dd($exist);
$ab = \App\Models\User::where('roll','AdmissionEmp')->whereIn('id',$exist)->get();
$totalAb = $todayAbsencelist->toBase()->merge($ab);
?>
@section('content')
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
        a.block-feature1 {

            width: 300px;
            height: 150px;
            border-bottom-width: 0;
            border-radius: 15px;
            box-shadow: 7px 7px 70px 0 rgba(0,0,0,.2);
            transition: transform 0.2s ease 0s, box-shadow 0.2s ease 0s, -webkit-transform 0.2s ease 0s;
            text-decoration: none;
            color: #fff;
            position: relative;
            overflow: hidden;
            padding: 50px 55px;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            display:block;

            background-color: #053e32;
            background-image: -webkit-linear-gradient(315deg, #0c9478, #063a46);
            background-image: linear-gradient(135deg,#0c9478, #063a46);
        }
        a.block-feature2 {

            width: 300px;
            height: 150px;
            border-bottom-width: 0;
            border-radius: 15px;
            box-shadow: 7px 7px 70px 0 rgba(0,0,0,.2);
            transition: transform 0.2s ease 0s, box-shadow 0.2s ease 0s, -webkit-transform 0.2s ease 0s;
            text-decoration: none;
            color: #fff;
            position: relative;
            overflow: hidden;
            padding: 50px 55px;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            display:block;

            background-color: #9a6207;
            background-image: -webkit-linear-gradient(315deg, #cb881c, #705733);
            background-image: linear-gradient(135deg,#cb881c, #705733);
        }
        a.block-feature3 {

            width: 300px;
            height: 150px;
            border-bottom-width: 0;
            border-radius: 15px;
            box-shadow: 7px 7px 70px 0 rgba(0,0,0,.2);
            transition: transform 0.2s ease 0s, box-shadow 0.2s ease 0s, -webkit-transform 0.2s ease 0s;
            text-decoration: none;
            color: #fff;
            position: relative;
            overflow: hidden;
            padding: 50px 55px;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            display:block;

            background-color: #1c3469;
            background-image: -webkit-linear-gradient(315deg, #3d18e5, #8b2ab7);
            background-image: linear-gradient(135deg,#3d18e5, #8b2ab7);
        }

        a.block-feature1 a.block-feature2 a.block-feature3 :hover {
            z-index: 10;
            box-shadow: 7px 7px 70px 0 rgba(0,0,0,.5);
            -webkit-transform: scale(1.15);
            -ms-transform: scale(1.15);
            transform: scale(1.15);
        }

        .feature-block {


        }

        .feature-block-title {font-size: 15px; font-weight:500; }

        .si {float:left; font-size: 40px; margin-right: 10px; opacity:.5}
        .fas.fas2  {
            font-weight: 700;
            position: absolute;
            right: -50px;
            bottom: 0;
            z-index: 1;
            width: auto;
            height: 100%;
            opacity: .1;
            font-size: 260px;
        }

    </style>
    <div class="">
        <section class="content-header">
            <div class="">

                <ol class="breadcrumb">
                    <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                    <li class="active"> الحضور والغياب</li>

                </ol>
            </div>
        </section>
    </div>

    <section>
        <div class="col-lg-12" style="margin-bottom: 25px">
            <div class="col-lg-4">
                <a class="block-feature1" href="{{ url('AttendanceList') }}" style="transition: transform 0.2s ease 0s, box-shadow 0.2s ease 0s, -webkit-transform 0.2s ease 0s;">
                    <i class="fas fas2 fa-align-center"></i>
                    <i class="fas fa-fingerprint si"></i>
                    <div class="feature-block-title">الحضور والانصراف</div>
                    <p class="paragraph">قائمة الحضور والانصراف للموظفين</p>

            </a>


        </div>
            <div class="col-sm-4">
                <a class="block-feature2" href="#" style="transition: transform 0.2s ease 0s, box-shadow 0.2s ease 0s, -webkit-transform 0.2s ease 0s;">
                    <i class="fas fas2 fa-arrow-circle-down"></i>
                    <i class="far fa-clock si"></i>
                    <div class="feature-block-title">التأخير</div>
                    <p class="paragraph"> متوسط دقائق التأخير لكل موظف</p>

                </a>
            </div>
            <div class="col-sm-4">
                <a class="block-feature3" href="{{ url('AbsenceList') }}" style="transition: transform 0.2s ease 0s, box-shadow 0.2s ease 0s, -webkit-transform 0.2s ease 0s;">
                    <i class="fas fas2 fa-chevron-circle-left"></i>
                    <i class="far fa-dizzy si"></i>
                    <div class="feature-block-title">الغياب</div>
                    <p class="paragraph">ايام الغياب لكل موظف</p>

                </a>
            </div>

        </div>
    </section>


    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red-gradient">
                <div class="inner">
                    <h3>{{ $usr->count() }}</h3>
                    <p>الموظفين</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#Modal2">
                     <i class="fa fa-arrow-circle-right"></i> عرض الموظفين
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ $todayCount }}<sup style="font-size: 20px"></sup></h3>
                    <p>حضور اليوم</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer" data-toggle="modal" data-target="#Modal3">
                     <i class="fa fa-arrow-circle-right"></i> عرض
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-olive-active">
                <div class="inner">
                    <h3>0</h3>
                    <p>التأخير اليوم</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                     <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue-gradient">
                <div class="inner">
                    <h3>{{ $todayAbsenceCount+$absCount }}</h3>
                    <p>غياب اليوم</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer"  data-toggle="modal" data-target="#Modal4">
                     <i class="fa fa-arrow-circle-right"></i> عرض
                </a>
            </div>
        </div><!-- ./col -->
    </div>
    <div class="modal fade" id="Modal4" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <?php
                    $da = \Carbon\Carbon::today();
                    $today = \Carbon\Carbon::parse($da);
                    ?>
                    <h4 class="modal-title"> الغياب اليوم - {{ date('F d, Y', strtotime($today)) }} </h4>
                </div>
                <div class="modal-body" id="modalBody">
                    <table id="example3" class="table table-bordered table-striped table-responsive " style="font-size: 12px !important;">
                        <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الجوال </th>
                            <th> البريد </th>
                            <th> المنطقة </th>
                            <th> المدينة </th>
                            <th> زمن الدخول علي النظام </th>
                            <th> زمن تسجيل الحضور </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($totalAb as $item)
                            <?php
                            $at33 = Carbon\Carbon::parse($item->checkin_at) ;
                            $at2 = Carbon\Carbon::parse($item->RCA) ;
                            ?>
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->regionName }}</td>
                                <td>{{ $item->cityName }}</td>
                                <td>---</td>
                                <td>---</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal3" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <?php
                    $da = \Carbon\Carbon::today();
                    $today = \Carbon\Carbon::parse($da)
                    ?>
                    <h4 class="modal-title"> الحضور اليوم - {{ date('F d, Y', strtotime($today)) }} </h4>
                </div>
                <div class="modal-body" id="modalBody">
                    <table id="example3" class="table table-bordered table-striped table-responsive " style="font-size: 12px !important;">
                        <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الجوال </th>
                            <th> البريد </th>
                            <th> المنطقة </th>
                            <th> المدينة </th>
                            <th> زمن الدخول علي النظام </th>
                            <th> زمن تسجيل الحضور </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($todayAttendancelist as $item)
                            <?php
                            $at = Carbon\Carbon::parse($item->checkin_at) ;
                            $at2 = Carbon\Carbon::parse($item->RCA) ;
                            ?>
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->regionName }}</td>
                                <td>{{ $item->cityName }}</td>
                                {{--<td><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank">عرض</a> </td>
                                <td><span class="label label-warning">في انتظار التعميد</span></td>--}}
                                <td>{{ date('H:i A', strtotime($at2)) }}</td>
                                <td>{{ date('H:i A', strtotime($at)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal2" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> الموظفين </h4>
                </div>
                <div class="modal-body" id="modalBody">
                    <table id="example5" class="table table-bordered table-striped table-responsive " style="font-size: 12px !important;">
                        <thead>
                        <tr>
                            <th>الاسم</th>
                            <th> المسمى الوظيفي</th>
                            <th>الجوال </th>
                            <th> البريد </th>
                            <th>تاريخ الاضافة </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usr as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->JobName }}</td>
                                <td>{{ $item->MobPhone }}</td>
                                <td>{{ $item->ِEmail }}</td>
                                {{--<td><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank">عرض</a> </td>
                                <td><span class="label label-warning">في انتظار التعميد</span></td>--}}
                                <td>{{ Carbon\Carbon::parse($item->EEE)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection