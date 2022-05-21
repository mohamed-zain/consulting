<?php
$Data = \App\Models\User::join('emplyees','emplyees.id','=','users.EmpiD')->where('users.id',auth()->user()->id)->first();
?>
<div class="box box-primary">
    <div class="box-body box-profile">

        <h3 class="profile-username text-center">@if(isset($Data->name)) {{ $Data->name }} @else {{ auth()->user()->id }} @endif</h3>

        <p class="text-muted text-center">مهندس خيرعون</p>

        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>البريد</b> <a class="pull-left">@if(isset($Data->email)) {{ $Data->email }} @else {{ auth()->user()->email }} @endif</a>
            </li>
            <li class="list-group-item">
                <b>الجوال</b> <a class="pull-left">@if(isset($Data->MobPhone)) {{ $Data->MobPhone }} @else {{ auth()->user()->phone }} @endif</a>
            </li>
            <li class="list-group-item">
                <b> العنوان</b> <a class="pull-left">@if(isset($Data->Address)) {{ $Data->Address }} @else '' @endif </a>
            </li>
        </ul>

    </div>
    <!-- /.box-body -->
</div>