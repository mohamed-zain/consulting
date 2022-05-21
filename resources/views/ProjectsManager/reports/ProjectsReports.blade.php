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
        $ex = '';
    }

}

?>

@extends($ex)
@section('content')
    <div class="col-md-12 no-print">
        <h3> الادارة الهندسية  <small> تقارير المشاريع  </small></h3>

        <ol class="breadcrumb" style="">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> التقارير</a></li>
            <li class="active"><a href="{{ url('/') }}"><i class="fa fa-folder-open"></i>     تقارير المشاريع </a></li>

        </ol>
    </div>
    <div class="row col-lg-12" style="margin-right: 1px">
        <div class="box box-danger no-print">
            <div class="box-header with-border">
                <h3 class="box-title">التقارير</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('ProjectsReports') }}" method="POST" id="Consend22">
                @csrf
                <div class="box-body no-print">

                    <div class="form-group col-lg-3">
                        <label>نوع المشروع</label>
                        <select name="ProType" class="form-control select2" style="width: 100%" required>
                            <option value="">--------إختر نوع المشروع-------</option>
                            <option value="1">المنتهية</option>
                            <option value="2">تحت التنفيذ</option>
                            <option value="3">لم يتم بدء العمل عليها</option>
                            <option value="4">مخلص المعماري</option>
                            <option value="5">مخلص السباكة</option>
                            <option value="6">مخلص التكييف</option>
                            <option value="7">مخلص الكهرباء</option>
                            <option value="8">مخلص الانشائي</option>
                            <option value="9"> جميع المشاريع</option>

                        </select>
                    </div>
                    <div class="form-group  col-lg-3">
                        <label> من التاريخ <small><code>(تاريخ تفعيل الملف )</code></small> </label>
                        <input type="date" name="PFrom" class="form-control pull-right" id="" required>
                    </div>
                    <div class="form-group  col-lg-3">
                        <label>  الى التاريخ <small><code>(تاريخ تفعيل الملف)</code></small></label>
                        <input type="date" name="PTo" class="form-control pull-right" id="" required>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-danger pull-left" id="Conse123">عرض</button>
                </div>
            </form>
        </div>
        <div id="repodrop"></div>
    </div>
    <script>
        $('#Conse123').click(function () {

            $( "#Consend22" ).on( "submit", function( event ) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                event.preventDefault();

                var myForm = document.getElementById('Consend22');
                var formData = new FormData(myForm);
                var headers = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url : $(this).attr('action'),
                    data : formData ,
                    //dataType: 'json',
                    cache:false,
                    contentType: false,
                    processData: false,

                    success  : function(data) {
                        var audio = document.getElementById("audioSuccess");
                        audio.play();
                        $("#repodrop").html(data);

                    },
                    error: function(xhr, textStatus, thrownError){
                        // console.log(thrownError);
                        swal("للأسف!", "يوجد خطأ !", "error");
                    }

                });


            });


        });
    </script>
@endsection