
<table id="example1" class="table table-bordered table-striped table-responsive">
    <thead>
    <tr>
        <th> المشروع </th>
        <th> اسم العميل</th>
        <th>تاريخ الاسناد</th>
    </tr>
    </thead>
    <tbody>

    @foreach($data1 as $item)
        <tr>
            <td>{{ $item->FileCode }}</td>
            <td>{{ $item->Name }}</td>
            <td><span  class="label label-danger">{{ $item->TCA }}</span></td>
        </tr>
    @endforeach

    </tbody>
</table>
