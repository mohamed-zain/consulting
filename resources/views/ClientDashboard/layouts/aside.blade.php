<?php
$Data = \App\Models\User::join('activate_files','activate_files.Bennar','=','users.File_code')->where('users.File_code',auth()->user()->File_code)->first();

?>
<div class="box box-primary">
    <div class="box-body box-profile">

        <h3 class="profile-username text-center">{{ $Data->Name }}</h3>

        <p class="text-muted text-center">عميل خيرعون</p>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>البريد</b> <a class="pull-left">{{ $Data->Email }}</a>
            </li>
            <li class="list-group-item">
                <b>رقم الملف</b> <a class="pull-left">{{ $Data->FileCode }}</a>
            </li>
            <li class="list-group-item">
                <b> البينار</b> <a class="pull-left"> {{ $Data->Bennar }}  </a>
            </li>
            <li class="list-group-item">
                <b> الدولة</b> <a class="pull-left"> {{ $Data->Country }}  </a>
            </li>
            <li class="list-group-item">
                <b> المدينة</b> <a class="pull-left"> {{ $Data->City }}  </a>
            </li>
            <li class="list-group-item">
                <b> عدد الباقات</b> <a class="pull-left"> {{ $Data->RQS }}  </a>
            </li>
            <li class="list-group-item">
                <b> تاريخ الاشتراك</b> <a class="pull-left"> {{ $Data->DRP }}  </a>
            </li>
            <li class="list-group-item">
                <b> قيمة الباقة</b> <a class="pull-left"> {{ $Data->SOA }}  </a>
            </li>
            <li class="list-group-item">
                <b> البنك</b> <a class="pull-left"> {{ $Data->Bank }}  </a>
            </li>
        </ul>

    </div>
    <!-- /.box-body -->
</div>
