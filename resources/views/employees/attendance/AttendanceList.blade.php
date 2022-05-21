@extends('index')

@section('content')
    <div class="">
        <section class="content-header">
            <div class="">

                <ol class="breadcrumb">
                    <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                    <li class="active"> قوائم الحضور والغياب</li>

                </ol>
            </div>
        </section>
    </div>
<div class="row">
    <div class="col-lg-3">
        <button class="btn bg-maroon btn-flat margin" id="ProSumm1">حضور اليوم - {{ date('F d, Y', strtotime(\Carbon\Carbon::today())) }}</button>
    </div>
    <div class="col-lg-3">
        <button class="btn bg-purple btn-flat margin" id="ProSumm">حضور الامس {{ date('F d, Y', strtotime(\Carbon\Carbon::yesterday())) }} </button>
    </div>
    <div class="col-lg-2">
        <button class="btn bg-olive btn-flat margin" id="ProSumm2">حضور الاسبوع </button>
    </div>
    <div class="col-lg-2">
        <button class="btn bg-orange btn-flat margin">حضور الشهر الماضي</button>
    </div>
    <div class="col-lg-2">
        <button class="btn bg-teal btn-flat margin">اختر التاريخ</button>
    </div>
</div>

    <div id="puthere">
        <div class="row ">
            <div class="box box-warning" style="min-height: 500px;">
                <?php
                $da = \Carbon\Carbon::today();
                $today = \Carbon\Carbon::parse($da)
                ?>
                <div class="box-header">
                    <h4 class="modal-title"> الحضور اليوم - {{ date('F d, Y', strtotime($today)) }} </h4>
                </div>
                <div class="box-body table-responsive pad">
                    {{-- <p>
                         Horizontal button groups are easy to create with bootstrap. Just add your buttons
                         inside <code>&lt;div class="btn-group"&gt;&lt;/div&gt;</code>
                     </p>--}}


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
            </div>
        </div>
    </div>
<script>
    $("#ProSumm").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('yesterdayAttendanceList')}}",
            type: "GET",
            success: function(data){
                //$("#prosummary").html(data);
                $("#puthere").html(data);

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $("#ProSumm1").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('todayAttendanceList')}}",
            type: "GET",
            success: function(data){
                //$("#prosummary").html(data);
                $("#puthere").html(data);

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $("#ProSumm2").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('weekAttendanceList')}}",
            type: "GET",
            success: function(data){
                //$("#prosummary").html(data);
                $("#puthere").html(data);

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });
</script>
@endsection