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