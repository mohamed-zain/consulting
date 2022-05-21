 @extends('index')
@section('content')
<?php
$cont = DB::table('contact_infos')->first();
$MInfo = DB::table('mobile_infos')->first();
 ?>
   <section class="content-header">
        <div class="">
          <h3>
            الاعدادات 
            <small>اعدادات النظام</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('MainSetting') }}">الاعدادات</a></li>
            <li class="active">اعدادات النظام</li>          

          </ol>
          </div>
        </section>
   <div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">الشعار</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
  <div class="callout callout-warning col-lg-10">
                <h4>الشعار الخاص بالمكتب او المؤسسة!</h4>

                <p>يظهر الشعار في التقارير التي ترسل للعميل عبر الايميل. كما يظهر في بعض تقارير الطباعة</p>
                <p>أضغط لتحميل صور</p>
              
  </div>
  <div class="col-lg-2"  >
     <div class="btn  btn-file" style="font-size: 27px">
        <i class="fa fa-picture-o fa-lg fa-5x"></i>
        <input type="file" name="file" multiple="multiple" id="file" accept="'image/*" class="btn btn-success btn-lg btn-block" >
       
      </div>
     
    </div>

    </div>

    
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div> 

<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">معلومات التواصل</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
   <div class="row">
        <div class="col-xs-12 table-responsive" >
          <table class="table table-striped" >
            {{ Form::model($cont, ['method' => 'PATCH', 'route' => ['ContactInfo.update', $cont->id]]) }}
            <thead>
            </thead>
            <tbody>
            <tr>
              <td>اسم المؤسسة او الشركة</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('CompanyName', null, ['class' => 'form-control', 'placeholder' => 'اسم المؤسسة او الشركة']) !!}
                </div>
              </td>
              
            </tr>
            <tr>
              <td>رقم جوال مدير النظام</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('AdminPhone', null, ['class' => 'form-control', 'placeholder' => 'رقم جوال مدير النظام']) !!}
                </div>
              </td>
              
            </tr>
            <tr>
              <td>حساب ايميل التواصل</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::email('CompanyEmail', null, ['class' => 'form-control', 'placeholder' => 'حساب ايميل التواصل']) !!}
                </div>
              </td>
              
            </tr>
            <tr>
              <td>كلمة مرور ايميل التواصل</td>
              <td>
                <div class="col-sm-10">
                   {{ Form::password('ComPass', ['class' => 'form-control']) }}
                </div>
              </td>
              
            </tr>
            </tbody>
            
          </table>
        </div>
        <!-- /.col -->
      </div>
      <div class="box-footer">
                <button type="submit" class="btn btn-info pull-left">حفظ البيانات</button>
      </div>
       {{ Form::close() }}
    </div>

    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div> 


@endsection