
<table id="example1" class="table table-bordered table-striped table-responsive">
    <thead>
    <tr>
        <th> المشروع </th>
        <th> اسم العميل</th>
        <th>تاريخ الاسناد</th>
        <th>تاريخ التسليم</th>
        <th> الايام المتأخرة</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data1 as $item)
        <?php
        $d = Carbon\Carbon::parse($item->TCA);
        $d1 = $d->addDays(14);
        $d2 = \Carbon\Carbon::parse($d1);
        $diff = $d->diffInDays($d2);

        ?>
        <tr>
            <td>{{ $item->FileCode }}</td>
            <td>{{ $item->Name }}</td>
            <td><span  class="">{{ date('F d, Y', strtotime($item->TCA)) }}</span></td>
            <td><span  class="">{{ date('F d, Y', strtotime($d->addDays(14))) }}</span></td>
            <td><span  class="">{{ $diff }}</span></td>
        </tr>

    @endforeach

    </tbody>
</table>
