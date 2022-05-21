<style>
    td{
        text-align: center;
    }
</style>
<div class="row ">
    <div class="box box-warning" style="min-height: 500px;">
        <?php
        $da = \Carbon\Carbon::today();
        $today = \Carbon\Carbon::parse($da)
        ?>
        <div class="box-header">
            <h4 class="modal-title"> الحضور الاسبوعي  </h4>
        </div>
        <div class="box-body table-responsive pad">
            {{-- <p>
                 Horizontal button groups are easy to create with bootstrap. Just add your buttons
                 inside <code>&lt;div class="btn-group"&gt;&lt;/div&gt;</code>
             </p>--}}


            <table id="example3" class="table table-bordered table-striped table-responsive " style="font-size: 12px !important;">
                <thead>
                <tr>
                    <?php
                    $weekMap = [
                        0 => 'SU',
                        1 => 'MO',
                        2 => 'TU',
                        3 => 'WE',
                        4 => 'TH',
                        5 => 'FR',
                        6 => 'SA',
                    ];
                    $dayOfTheWeek = \Carbon\Carbon::now()->dayOfWeek;
                    $weekday = $weekMap[$dayOfTheWeek];
                    $monday = \Carbon\Carbon::now()->startOfWeek();
                    $nameday = '';

                    $sunday = \Carbon\Carbon::now()->startOfWeek(\Carbon\Carbon::SUNDAY);
                    $Monday = $sunday->copy()->addDay();
                    $Tuesday = $Monday->copy()->addDay();
                    $Wednesday = $Tuesday->copy()->addDay();
                    $Thursday = $Wednesday->copy()->addDay();
                    $Friday = $Thursday->copy()->addDay();
                    $Saturday = $Friday->copy()->addDay();
                    //dd($Saturday->format('Y-m-d'));
                    ?>
                    <th>الاسم</th>
                  {{--  <th> البريد </th>--}}
                    @foreach($weekMap  as $key => $dy)
                        <?php
                            if($dy == 'SU'){
                                $nameday = 'الاحد'.' - '.date('F d, Y', strtotime($sunday->format('Y-m-d')));
                            }elseif($dy == 'MO'){
                                $nameday = 'الاثنين'.' - '.date('F d, Y', strtotime($Monday->format('Y-m-d')));
                            }elseif($dy == 'TU'){
                                $nameday = 'الثلاثاء'.' - '.date('F d, Y', strtotime($Tuesday->format('Y-m-d')));
                            }elseif($dy == 'WE'){
                                $nameday = 'الاربعاء'.' - '.date('F d, Y', strtotime($Wednesday->format('Y-m-d')));
                            }elseif($dy == 'TH'){
                                $nameday = 'الخميس'.' - '.date('F d, Y', strtotime($Thursday->format('Y-m-d')));
                            }elseif($dy == 'FR'){
                                $nameday = 'الجمعة'.' - '.date('F d, Y', strtotime($Friday->format('Y-m-d')));
                            }elseif($dy == 'SA'){
                                $nameday = 'السبت'.' - '.date('F d, Y', strtotime($Saturday->format('Y-m-d')));
                            }
                            ?>
                        <td>
                            @if($weekday == $dy)
                            <strong style="color: red">{{ $nameday }}</strong>
                            @else
                                {{ $nameday }}
                            @endif
                        </td>
                    @endforeach

                </tr>
                </thead>
                <tbody>
                <?php $usr = \App\Models\User::where('roll','AdmissionEmp')->whereNotIn('id',[24,25,28,23])->get() ?>
                @foreach($usr as $item)
                    <?php
                    $atByDate1 = \App\Models\CheckinOut::where('usr_id',$item->id)->whereDate('datetime',$sunday->format('Y-m-d'))->first();
                    $atByDate2 = \App\Models\CheckinOut::where('usr_id',$item->id)->whereDate('datetime',$Monday->format('Y-m-d'))->first();
                    $atByDate3 = \App\Models\CheckinOut::where('usr_id',$item->id)->whereDate('datetime',$Tuesday->format('Y-m-d'))->first();
                    $atByDate4 = \App\Models\CheckinOut::where('usr_id',$item->id)->whereDate('datetime',$Wednesday->format('Y-m-d'))->first();
                    $atByDate5 = \App\Models\CheckinOut::where('usr_id',$item->id)->whereDate('datetime',$Thursday->format('Y-m-d'))->first();
                    $atByDate6 = \App\Models\CheckinOut::where('usr_id',$item->id)->whereDate('datetime',$Friday->format('Y-m-d'))->first();
                    $atByDate7 = \App\Models\CheckinOut::where('usr_id',$item->id)->whereDate('datetime',$Saturday->format('Y-m-d'))->first();
                    ?>
                    <tr>
                        <td>{{ $item->name }}</td>
                       {{-- <td>{{ $item->email }}</td>--}}
                        <td>
                            @if(\Carbon\Carbon::today() > $sunday->format('Y-m-d'))
                            @if(isset($atByDate1))
                                @if($atByDate1->checkin == 'yes')
                                <strong class="text-green"><i class="far fa-check-circle"></i></strong>
                                @else
                                    <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                                @endif
                            @else
                            <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                            @endif
                            @else
                            --
                            @endif
                        </td><td>
                            @if(\Carbon\Carbon::today() > $Monday->format('Y-m-d'))
                            @if(isset($atByDate2))
                                @if($atByDate2->checkin == 'yes')
                                <strong class="text-green"><i class="far fa-check-circle"></i></strong>
                                @else
                                    <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                                @endif
                            @else
                            <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                            @endif
                            @else
                                --
                            @endif
                        </td><td>
                            @if(\Carbon\Carbon::today() > $Tuesday->format('Y-m-d'))
                            @if(isset($atByDate3))
                                @if($atByDate3->checkin == 'yes')
                                <strong class="text-green"><i class="far fa-check-circle"></i></strong>
                                @else
                                    <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                                @endif
                            @else
                            <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                            @endif
                            @else
                                --
                            @endif
                        </td><td>
                            @if(\Carbon\Carbon::today() > $Wednesday->format('Y-m-d'))
                            @if(isset($atByDate4))
                                @if($atByDate4->checkin == 'yes')
                                <strong class="text-green"><i class="far fa-check-circle"></i></strong>
                                @else
                                    <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                                @endif
                            @else
                            <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                            @endif
                            @else
                            --
                            @endif
                        </td><td>

                            @if(\Carbon\Carbon::today() > $Thursday->format('Y-m-d'))
                            @if(isset($atByDate5))
                                @if($atByDate5->checkin == 'yes')
                                <strong class="text-green"><i class="far fa-check-circle"></i></strong>
                                @else
                                    <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                                @endif
                            @else
                            <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                            @endif
                            @else
                            --
                                @endif
                        </td>
                        <td>
                            {{--@if(\Carbon\Carbon::today() > $Friday->format('Y-m-d'))
                            @if(isset($atByDate6))
                                @if($atByDate6->checkin == 'yes')
                                <strong class="text-green"><i class="far fa-check-circle"></i></strong>
                                @else
                                    <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                                @endif
                            @else
                            <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                            @endif
                            @else
                            --
                            @endif--}}
                            <i class="fas fa-power-off"></i>
                        </td>
                        <td>
                            @if(\Carbon\Carbon::today() > $Saturday->format('Y-m-d'))
                            @if(isset($atByDate7))
                                @if($atByDate7->checkin == 'yes')
                                <strong class="text-green"><i class="far fa-check-circle"></i></strong>
                                @else
                                    <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                                @endif
                            @else
                            <strong class="text-red"><i class="far fa-times-circle"></i></strong>
                            @endif
                            @else
                            --
                                @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>