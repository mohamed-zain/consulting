<?php
use App\Models\Branchs;
use App\Models\Emplyee;
use App\Models\Agent;
use App\Models\ProjectsSteps;
?>
 @extends('index')
@section('content')
<div class="row">
  <section class="content-header">
        <div class="col-md-12">
          <h3>
            المشاريع
            <small>تفاصيل المشاريع</small>

            <a href="{{url('ProjectFiles')}}/{{$Data->ProID}}" class="btn btn-app pull-left">
                <span class="badge bg-green">300</span>
                <i class="fa fa-barcode"></i>ملفات المشروع
              </a>
              <a class="btn btn-app pull-left" data-toggle="modal" data-target="#Modal3">
                <span class="badge bg-purple">891</span>
                <i class="fa fa-users"></i> حالة المشروع
              </a>

               <a class="btn btn-app pull-left" data-toggle="modal" data-target="#Modal55">
                <span class="badge bg-teal">67</span>
                <i class="fa fa-inbox"></i>مرحلة المشروع
              </a>
          </h3>

          <ol class="breadcrumb" style="width: 35%">
            <li><a href="{{url('MainPort')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('projectsList') }}"><i class="fa fa-folder-open"></i>   تعديل المشروع</a></li>

          </ol>
          </div>


        </section>
</div>



<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">تعديل بيانات المشروع</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

            {{ Form::model($Data, ['method' => 'PATCH','class'=>'form-horizontal', 'route' => ['Projects.update', $Data->ProID]]) }}

            <div class="form-group">
                  <label for="ProName" class="col-sm-2 control-label">اسم المشروع</label>

                  <div class="col-sm-4">
                    {!! Form::text('ProName', null, ['class' => 'form-control', 'placeholder' => 'اسم المؤسسة او الشركة']) !!}

                  </div>

                  <label for="BranchID" class="col-sm-2 control-label">الفرع</label>

                  <div class="col-sm-4">

                    {!! Form::select('BranchID',Branchs::pluck('BranchName','id'),null, ['class' => 'form-control select2']) !!}


                  </div>
                </div>

                    <div class="form-group">
                  <label for="ProType" class="col-sm-2 control-label">نوع المشروع</label>

                  <div class="col-sm-4">
                     {!! Form::select('ProType',[
                  'اشراف'=>'اشراف',
                  'دراسات'=>'دراسات',
                  'تصميم معماري'=>'تصميم معماري',
                  'تصميم معماري وسلامه'=>'تصميم معماري وسلامه',
                  'تصميم معماري وبلديه'=>'تصميم معماري وبلديه',
                  'سلامة ودفاع مدني'=>'سلامة ودفاع مدني',
                  'اعتماد مخططات معمارية'=>'اعتماد مخططات معمارية',
                  'اعتماد رخصة هيئة مدن'=>'اعتماد رخصة هيئة مدن',
                  'اعتماد سلامة هيئة مدن'=>'اعتماد سلامة هيئة مدن',
                  'اعمال مساحية'=>'اعمال مساحية',
                  'تقاريرفنية وتحكيم'=>'تقارير فنية وتحكيم',
                  'خدمات اخري'=>'خدمات اخري',
                     'فكرة'=>'فكرة'

                     ],$Data->ProType, ['class' => 'form-control select2']) !!}

                  </div>

                  <label for="ProManager" class="col-sm-2 control-label">مدير المشروع</label>

                  <div class="col-sm-4">
                    {!! Form::select('ProManager', App\Models\User::pluck('name','id'),null, ['class' => 'form-control select2']) !!}

                  </div>
                </div>

                <div class="form-group">
                  <label for="AgenName" class="col-sm-2 control-label">اسم العميل</label>

                  <div class="col-sm-4">
                     {!! Form::select('AgenName', App\Models\Agent::pluck('AgentName','id'),null, ['class' => 'form-control select2']) !!}

                  </div>

                  <label for="Price" class="col-sm-2 control-label">تكلفة المشروع</label>

                  <div class="col-sm-4">
                    {!! Form::number('Price', null, ['class' => 'form-control', 'placeholder' => 'تكلف المشروع']) !!}

                  </div>
                </div>
                <div class="form-group">
                  <label for="Cash" class="col-sm-2 control-label">المبلغ المدفوع</label>

                  <div class="col-sm-10">
                     {!! Form::number('Cash', null, ['class' => 'form-control', 'placeholder' => 'المبلغ المدفوع']) !!}

                  </div>


                </div>

                <div class="form-group">
                  <label for="ProDesc" class="col-sm-2 control-label">وصف المشروع</label>
                  <div class="col-sm-10">
                     {!! Form::textarea('ProDesc', null, ['class' => 'form-control', 'placeholder' => 'وصف المشروع']) !!}

                  </div>

                </div>
                <div class="box-footer">
                    <button class="btn btn-info pull-left">تعديل</button>
                </div>

          {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>



  <div class="modal fade" id="Modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اعداد مده زمنية للمشروع</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="POST" action="{{ route('UpdateDuration') }}">
  {!! csrf_field() !!}
  <input type="hidden" name="ProID" value="{{$Data->ProID}}">
             <div class="form-group">
            <label for="Duration" class="col-sm-2 control-label">المده الزمنية للمشروع</label>
            <div class="col-sm-8">
            {!! Form::select('Duration',[
                     'ثلاثة اشهر'=>'ثلاثة اشهر',
                     'تصميم معماري'=>'ستة أشهر',
                     'سنة واحده'=>'سنة واحده',
                     'سنة ونصف'=>'سنة ونصف',
                     'سنتين'=>'سنتين',
                     'سنتين ونصف'=>'سنتين ونصف',
                     'ثلاث سنوات'=>'ثلاث سنوات',
                     'ثلاث سنوات ونصف'=>'ثلاث سنوات ونصف',
                     'ابعة سنوات'=>'اربعة سنوات'
                     ],null, ['class' => 'form-control  select2','style' => 'width:100%']) !!}
                   </div>
            </div>
           <button id="registrationID" class="btn btn-success">حفظ</button>
         </form>

        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>

   <div class="modal fade" id="Modal55" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اعداد المرحلة الحالية للمشروع</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="POST" action="{{ route('UpdateStage') }}">
  <input type="hidden" name="ProID" value="{{$Data->ProID}}">
  {!! csrf_field() !!}
             <div class="form-group">
            <label for="Stage" class="col-sm-4 control-label">مرحلة المشروع الحالية</label>
            <div class="col-sm-8">
              {!! Form::select('Stage', ProjectsSteps::pluck('LevelName','LevelName'),null, ['class' => 'form-control select2','style' => 'width:90%']) !!}

                   </div>
            </div>
           <button id="registrationID" class="btn btn-success">حفظ</button>
         </form>

        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>

   <div class="modal fade" id="Modal3" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اعداد الحالة الحالية للمشروع</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="POST" action="{{ route('UpdateState') }}">
   <input type="hidden" name="ProID" value="{{$Data->ProID}}">
  {!! csrf_field() !!}
             <div class="form-group">
            <label for="State" class="col-sm-4 control-label">حالة المشروع الحالية</label>
            <div class="col-sm-8">
              {!! Form::select('State',[
                     'متوقف'=>'متوقف',
                     'جاري'=>'جاري',
                     'منتهي'=>'منتهي',
                     'قيد التنفيذ'=>'قيد التنفيذ',
                     ],null, ['class' => 'form-control  select2','style' => 'width:100%']) !!}
                   </div>
            </div>
           <button id="registrationID" class="btn btn-success">حفظ</button>
         </form>

        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>



    @endsection
