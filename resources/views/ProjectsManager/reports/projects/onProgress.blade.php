<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> خير عون , للتصميم.
                <small class="pull-left">التاريخ : {{ Carbon\Carbon::today() }}</small>
            </h2>
        </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            مؤسسة
            <address>
                <strong>خير عون , للتصميم.</strong><br>
                العنوان : المملكة العربية السعودية ، جدة<br>
                الموقع : ko-design.ae
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            تقرير بواسطة
            <address>
                <strong>{{ auth()->user()->name }}</strong><br>
                الجوال : (555) 539-1037<br>
                البريد الالكتروني : {{ auth()->user()->email }}
            </address>
        </div><!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b> #تقارير المهام</b><br>
            <b>نوع المهام :</b>
            @if($entry1 == '1')  المشاريع المنجزة
            @elseif($entry1 == '2') المشاريع تحت التنفيذ
            @elseif($entry1 == 'sh')المهام المجدولة
            @elseif($entry1 == 'all') كل المهام
            @endif <br>
            <b>من تاريخ :</b> {{ $entry2 }}<br>
            <b>الى تاريخ :</b> {{ $entry3 }}
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>المشروع</th>
                    <th>العميل</th>
                    <th>البينار</th>
                    <th> البنك </th>
                    <th> المهام المنجزة </th>
                    <th>  نسبة الانجاز </th>
                    {{--<th> الدولة </th>--}}
                    {{--<th> البريد </th>--}}
                    {{--<th> الجوال </th>--}}
                    <th> الايراد - وفقا للانجاز </th>
                    <th> المبلغ </th>
{{--                    <th> المعماري </th>--}}

                </tr>
                </thead>
                <tbody>
                @if(isset($Data))
                    <?php $incom = 0; ?>
                @foreach($Data as $item)
                <?php
                $s = App\Models\ProjectServices::where('status','yes')->where('Bennar_Code',$item->Bennar)->get();
                $e0 = 0;
                $e1 = 0;
                $e2 = 0;
                $e3 = 0;
                $e4 = 0;
                foreach ($s as $p){
                    if ($p->ServiceCode == 'E0'){
                        $e0 = 50;
                    }elseif ($p->ServiceCode == 'E1'){
                        $e1 = 10;
                    }elseif ($p->ServiceCode == 'E2'){
                        $e2 = 10;
                    }elseif ($p->ServiceCode == 'E3'){
                        $e3 = 10;
                    }elseif ($p->ServiceCode == 'E4'){
                        $e4 = 20;
                    }
                }
                $per = $e0+$e1+$e2+$e3+$e4;
                $incom += $item->SOA * $per /100;
                ?>
                    <tr>
                        <td>{{ $item->FileCode }}</td>
                        <td>{{ $item->Name }}</td>
                        <td>{{ $item->Bennar }}</td>
                        <td>{{ $item->Bank }}</td>
                        <td>
                            @if(isset($s))
                                @foreach($s as $dd)
                                    {{ $dd->ServiceCode }}
                                @endforeach
                            @endif
                        </td>
                        <td>
                            {{ $per }} %
                        </td>

                        {{--<td>{{ $item->Country }}</td>--}}
                        {{--<td>{{ $item->Email }}</td>--}}
                       {{-- <td>{{ $item->Phone }}</td>--}}

                        <td>{{ number_format($item->SOA * $per /100) }}</td>

                        <td>{{ number_format($item->SOA) }} </td>
{{--                        <td>@if(isset($item->EngID)) {{ User::UrsName($item->EngID) }} @else ----- @endif</td>--}}
{{--                        <td>-----</td>--}}
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="">المجموع</td>
                        <td colspan=""></td>
                        <td colspan=""></td>
                        <td colspan=""></td>
                        <td colspan=""></td>
                        <td colspan=""></td>
                        <td colspan="">{{ number_format($incom) }}</td>
                        <td colspan="">{{ number_format($tota) }}</td>
                    </tr>
                    <tr>
                        <td colspan="">المجموع كتابة</td>
                        <td colspan=""></td>
                        <td colspan=""></td>
                        <td colspan=""></td>
                        <td colspan=""></td>
                        <td colspan=""></td>
                        <td colspan="">{{ \App\Helpers\Mysql::makeNumber2Text($incom)  }} </td>
                        <td colspan="">{{ \App\Helpers\Mysql::makeNumber2Text($tota) }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="12">لا توجد نتائج</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->


    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a href="#" target="_blank" class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> طباعة</a>
            <button class="btn btn-primary pull-left" style="margin-right: 5px;"><i class="fa fa-download"></i> تحميل كملف PDF</button>
        </div>
    </div>
</section>