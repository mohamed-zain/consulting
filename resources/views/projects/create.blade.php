<?php
if (Auth::user()->Level == 1){
    $ex = 'index';
}elseif(Auth::user()->email == 'support@ko-design.ae'){
    $ex = 'EMP.layout' ;
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
    <script  src="{{ asset('dist/js/new_project_form_valid.js') }}"></script>
<style>
    .datepicker.dropdown-menu{
        width: fit-content;
        right: auto !important;
        left: auto !important;
    }
</style>

<script>

  $(document).ready(function(){
      $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
    });



  });

</script>

 <div class="no-print">
<div class="">
  <div id=""></div>
  <section class="content-header">
        <div class="">
          <h3>
            لوحة التحكم
            <small>المشاريع</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{url('projectCreate')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="#"><i class="fa fa-folder-open"></i>  المشاريع</a></li>
            <li class="active"><i class="fa fa-folder"></i> مشروع جديد</li>
          </ol>
          </div>
        </section>
</div>



<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">اضافة مشروع جديد</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>

      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

          {!! Form::open(array('route'=>'Projects.store','class'=>'form-horizontal','id'=>'PrintC','onsubmit'=>'return Provalid();','enctype' => 'multipart/form-data','files' => true)) !!}

            <div class="form-group">
                  <label for="first_name" class="col-sm-2 control-label">الاسم الاول للعميل </label>

                  <div class="col-sm-4">
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="الاسم الاول للعميل" style="margin-bottom: 9px;" required>
                  </div>

                  <label for="last_name" class="col-sm-2 control-label">الاسم الثاني للعميل</label>

                  <div class="col-sm-4 col-lg-4">
                      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="الاسم الثاني للعميل" style="margin-bottom: 9px;" required>

                  </div>
                </div>

                    <div class="form-group">
                  <label for="number" class="col-sm-2 col-lg-2 control-label"> رقم البينار</label>

                  <div class="col-sm-4">
                      <input type="text" name="number" class="form-control" id="number" placeholder="1234" style="margin-bottom: 9px;" required>

                  </div>

                  <label for="total" class="col-sm-2 control-label"> قيمة الاشتراك</label>

                  <div class="col-sm-2 col-lg-4">
                      <input type="text" name="total" class="form-control" id="total" placeholder=" قيمة الاشتراك" style="margin-bottom: 9px;" required>

                  </div>
                </div>

                <div class="form-group">
                  <label for="AgenName" class="col-sm-2 control-label"> الباقة</label>

                  <div class="col-sm-4">
                      <select class="form-control select2" name="name" id="name"  required>
                          <option selected="selected" value="" >اختر الباقة</option>
                          <?php $pack = App\Models\packages::all(); ?>
                          @foreach($pack as $packs)
                              <option value="{{$packs->packageName}}"> {{$packs->packageName}}</option>
                          @endforeach

                      </select>
                  </div>



                    <label for="quantity" class="col-sm-2 control-label"> عدد الباقات </label>

                    <div class="col-sm-4">

                        <input type="text" name="quantity" class="form-control" id="quantity" placeholder="1" style="margin-bottom: 9px;" required>

                    </div>
                </div>

        <div class="form-group">
            <label for="phone" class="col-sm-2 col-lg-2 control-label"> رقم الجوال</label>

            <div class="col-sm-4">
                <input type="text" name="phone" class="form-control" id="phone" placeholder="رقم الجوال" style="margin-bottom: 9px;" required>

            </div>

            <label for="email" class="col-sm-2 control-label">  البريد الالكتروني</label>

            <div class="col-sm-2 col-lg-4">
                <input type="text" name="email" class="form-control" id="email" placeholder="   البريد الالكتروني" style="margin-bottom: 9px;" required>

            </div>
        </div>



                <div class="form-group row">
                    <label for="ProName" class="col-sm-2 control-label">موقع المشروع</label>

                    <div class="col-sm-3">
                        <input type="text" name="country" class="form-control" id="country" placeholder=" الدولة" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="city" class="form-control" id="city" placeholder="المنطقة/الامارة" style="margin-bottom: 9px;" required>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="state" class="form-control" id="state" placeholder="الحي" style="margin-bottom: 9px;" required>
                    </div>


                </div>


        <div class="form-group">
            <label for="date_created" class="col-sm-2 control-label">تاريخ رفع الطلب</label>
            <div class="col-sm-2">
                <input type="date" name="date_created" class="form-control " id="date_created" placeholder="" style="margin-bottom: 9px;" required>
            </div>
            <label for="date_created2" class="col-sm-2 control-label">تاريخ تفعيل الباقة </label>
            <div class="col-sm-2">
                <input type="date" name="date_created2" class="form-control " id="date_created2" placeholder="" style="margin-bottom: 9px;" required>
            </div>


        </div>
        <div class="form-group">
            <label for="_billing_myfield16" class="col-sm-2 col-lg-2 control-label"> رقم الواتساب</label>

            <div class="col-sm-4">
                <input type="text" name="_billing_myfield16" class="form-control" id="_billing_myfield16" placeholder=" رقم الواتساب" style="margin-bottom: 9px;" required>

            </div>

            <label for="address_1" class="col-sm-2 control-label">   العنوان</label>

            <div class="col-sm-2 col-lg-4">
                <input type="text" name="address_1" class="form-control" id="address_1" placeholder=" العنوان" style="margin-bottom: 9px;" required>

            </div>
        </div>

        <div class="form-group">
            <label for="_billing_myfield14" class="col-sm-2 col-lg-2 control-label"> كيف عرف العميل خيرعون </label>

            <div class="col-sm-4">
                <input type="text" name="_billing_myfield14" class="form-control" id="_billing_myfield14" placeholder=" كيف عرف العميل خيرعون" style="margin-bottom: 9px;" required>

            </div>

            <label for="_billing_myfield15" class="col-sm-2 control-label">   اوقات الاتصال المناسبة</label>

            <div class="col-sm-2 col-lg-4">
                <input type="text" name="_billing_myfield15" class="form-control" id="_billing_myfield15" placeholder="   اوقات الاتصال المناسبة" style="margin-bottom: 9px;" required>

            </div>
        </div>
        <div class="form-group">


                <label for="ProDesc" class="col-sm-4 control-label"> هل المشروع داخل النطاق العمراني </label>
                <div class="col-sm-2">
                    <label>
                        <input type="radio" name="_billing_myfield13" class="minimal" id="ToBeLate" >
                        نعم
                    </label>
                    <label>
                        <input type="radio" name="_billing_myfield13" class="flat-red" id="ToBeLate">
                        لا
                    </label>
                </div>


        </div>
        <div class="form-group">
            <label for="Duration_Cat" class="col-sm-2 control-label"> مدة تنفيذ المشروع  </label>

            <div class="col-sm-4">
                <select class="form-control select2" name="Duration_Cat" required>
                    <option value="0">من غير مده</option>
                    <option value="1">9 أشهر </option>
                    <option value="2">6 أشهر </option>
                    <option value="3">3 أشهر </option>
                </select>
            </div>

            {{--<label for="last_name" class="col-sm-2 control-label">الاسم الثاني للعميل</label>

            <div class="col-sm-4 col-lg-4">
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="الاسم الثاني للعميل" style="margin-bottom: 9px;" required>

            </div>--}}
        </div>
                <div class="form-group">
                  <label for="customer_note" class="col-sm-2 control-label"> ملاحظات العميل</label>
                  <div class="col-sm-10">
                    <textarea name="customer_note" class="form-control" id="customer_note" placeholder=" ملاحظات العميل" style="margin-bottom: 9px;" required></textarea>
                  </div>

                </div>

                <div class="box-footer">

                    <button type="submit" class="btn btn-info pull-left">اضافة</button>
                 </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>
</div>


    @endsection


