<section class="invoice">
    <?php use \App\Models\User; ?>
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
            @elseif($entry1 == 'no') المهام الغير منجزة
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
                   {{-- <th> المدينة </th>--}}
                    {{--<th> الدولة </th>--}}
                    {{--<th> البريد </th>--}}
                    {{--<th> الجوال </th>--}}
                    <th> البنك </th>
                    <th> المبلغ </th>
{{--                    <th> المعماري </th>--}}

                </tr>
                </thead>
                <tbody>
                @if(isset($Data))
                @foreach($Data as $item)

                    <tr>
                        <td>{{ $item->FileCode }}</td>
                        <td>{{ $item->Name }}</td>
                        <td>{{ $item->Bennar }}</td>
                        {{--<td>{{ $item->City }}</td>--}}
                        {{--<td>{{ $item->Country }}</td>--}}
                        {{--<td>{{ $item->Email }}</td>--}}
                       {{-- <td>{{ $item->Phone }}</td>--}}
                        <td>{{ $item->Bank }}</td>
                        <td>{{ number_format($item->SOA) }} SAR</td>
{{--                        <td>@if(isset($item->EngID)) {{ User::UrsName($item->EngID) }} @else ----- @endif</td>--}}
{{--                        <td>-----</td>--}}
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="6">المجموع</td>
                        <td colspan="6">{{ number_format($tota) }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="10">لا توجد نتائج</td>
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