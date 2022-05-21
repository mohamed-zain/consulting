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
            @if($entry1 == 'yes') المهام المنجزة
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
                    <th>المهمة</th>
                    <th>المشروع</th>
                    <th>العميل</th>
                    <th>المهندس</th>
                    <th> مجدولة لتاريخ </th>
                </tr>
                </thead>
                <tbody>
                @foreach($Data as $item)
                    <tr>
                        <td>{{ $item->Mission }}</td>
                        <td>{{ $item->FileCode }}</td>
                        <td>{{ $item->Name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->TCA }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.col -->
    </div><!-- /.row -->


    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> طباعة</a>
            <button class="btn btn-primary pull-left" style="margin-right: 5px;"><i class="fa fa-download"></i> تحميل كملف PDF</button>
        </div>
    </div>
</section>