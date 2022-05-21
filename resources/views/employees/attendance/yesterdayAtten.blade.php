<div class="row ">
    <div class="box box-warning" style="min-height: 500px;">
        <?php
        $da = \Carbon\Carbon::yesterday();
        $today = \Carbon\Carbon::parse($da)
        ?>
        <div class="box-header">
            <h4 class="modal-title"> الحضور الامس - {{ date('F d, Y', strtotime($today)) }} </h4>
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
                    <th> البريد </th>
                    <th> المنطقة </th>
                    <th> المدينة </th>
                    <th> زمن تسجيل الحضور </th>
                    <th> زمن تسجيل الخروج </th>
                    <th> ساعات الدوام  </th>
                </tr>
                </thead>
                <tbody>
                <?php $usr = \App\Models\User::where('roll','AdmissionEmp')->whereNotIn('id',[24,25,28,23])->get() ?>
                @foreach($usr as $item)
                    <?php
                    $atten = \App\Models\CheckinOut::where('usr_id',$item->id)
                        ->where('checkin','yes')
                        ->whereDate('datetime',\Carbon\Carbon::yesterday())->first();
                   if (isset($atten)){
                       $checkin_at = Carbon\Carbon::parse($atten->checkin_at) ;
                       $checkout_at = Carbon\Carbon::parse($atten->checkout_at) ;
                   }

                    ?>
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if(isset($atten->regionName))
                            {{ $atten->regionName }}
                            @else
                                ---
                                @endif
                        </td>
                        <td>
                            @if(isset($atten->cityName))
                            {{ $atten->cityName }}
                            @else
                                ---
                            @endif
                        </td>
                        {{--<td><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank">عرض</a> </td>
                        <td><span class="label label-warning">في انتظار التعميد</span></td>--}}
                        <td>
                            @if(isset($atten))
                                @if(isset($checkin_at))
                            {{ date('H:i A', strtotime($checkin_at)) }}

                                @else
                                    ------
                                @endif
                            @else
                                <span class="label label-danger">غياب</span>
                            @endif
                        </td>
                        <td>
                            @if(isset($atten))
                                @if(isset($atten->checkout_at))
                            {{ date('H:i A', strtotime($checkout_at)) }}
                                @else
                                    <span class="label label-warning">لم يسجل خروج</span>
                                    @endif
                            @else
                                <span class="label label-danger">غياب</span>
                            @endif
                        </td>
                        <td>
                            @if(isset($atten))
                                @if(isset($atten->du))
                            {{ $atten->du }}
                                @else
                                    <span class="label label-warning">لم يسجل خروج</span>
                                    @endif
                            @else
                                <span class="label label-danger">غياب</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>