<?php
if (Auth::user()->Level == 1){
    $ex = 'index';
}else{
    $access = DB::table('user_groups')
        ->where('UID',auth()->user()->id)
        ->where('Sys','EngineeringManagement')
        ->first();
    $access2 = DB::table('user_groups')
        ->where('UID',auth()->user()->id)
        ->where('Sys','ActivateAccounts')
        ->first();
    //$arr = $access->toArray();
    //dd($access);
    if ($access->accessH == 1){
        $ex = 'ProjectsManager.layout' ;
    }elseif($access2->accessH == 1){
        $ex = 'ActivateAccount.layout' ;
    }else{
        $ex = 'logo';
    }

}

?>

@extends($ex)

@section('content')



    <!-- Main content -->
    <section class="content">
        <div class="error-page" style="margin-top: 30px">
            <h1 class="headline text-yellow"> 500</h1>

            <div class="error-content">
                <h3><i class="fa fa-warning fa-2x text-yellow"></i> عفوا ... حاول مرة اخرى من فضلك</h3>

                <p>
                    <a href="{{url()->previous()}}">اضغط هنا للرجوع </a>
                </p>


            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->

@endsection