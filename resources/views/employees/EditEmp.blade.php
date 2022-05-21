 @extends('index')
 @section('content')



 <div class="row">
   <section class="content-header">
        <div class="container">
          <h3>
            الموظفين
            <small>التفاصيل</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('Projects') }}">تفاصيل الموظف</a></li>



          </ol>
          </div>
        </section>
 </div>


<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">بيانات الموظف الاساسيه</h3>

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
            {{ Form::model($Single3, ['method' => 'PATCH', 'route' => ['Employee.update', $Single3->EMPID]]) }}
          <table class="table table-striped" >

            <thead>
            </thead>
            <tbody>
            <tr>
              <td>اسم الموظف</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('NameAR', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>
            <tr>
              <td>جنسية الموظف</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('Nationality', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                </div>
              </td>

            </tr>
            <tr>
              <td>المؤهل الاكاديمي</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('Qualify', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>
            <tr>
              <td>البريد</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('Email', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>

            <tr>
              <td>الحالة الاجتماعية</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('Status', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>
            <tr>
              <td>تاريخ الميلاد</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('BirthDate', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>
            <tr>
              <td>مكان الميلاد</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('BirthPlace', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>
             <tr>
              <td>هاتف المنزل</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('HomePhone', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>
            <tr>
              <td>الجوال</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('MobPhone', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>
            </tr>
            <tr>
              <td>المدينة</td>
              <td>
                <div class="col-sm-10">
                    {!! Form::text('City', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>
            </tr>
            <tr>
              <td>المحليه</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('Quarter', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>
            </tr>
            <tr>
              <td>العنوان</td>
              <td>
                <div class="col-sm-10">
                    {!! Form::text('Address', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>
            </tr>


            </tbody>

          </table>
        </div>
        <!-- /.col -->
      </div>
      <div class="box-footer">
      </div>

    </div>

    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>


<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">بيانات الموظف الوظيفية</h3>

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

            <thead>
            </thead>
            <tbody>
              <tr>
              <td>تاريخ التعين</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('AssignDate', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>
            <tr>
              <td>نوع العميل</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('AgentType', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>
            <tr>
              <td>نوع العميل</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('AssignType', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>

            <tr>
              <td>الفرع </td>
              <td>
                <div class="col-sm-10">
                  {!! Form::select('Branch',App\Models\Branchs::pluck('BranchName','id'),null, ['id'=>'AppType','class' => 'form-control select2','style'=>'width:80%;']) !!}


                 </div>
              </td>

            </tr>
            <tr>
              <td>ساعات العمل</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('WorkHours', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>

            </tr>
            <tr>
              <td>الادارة</td>
              <td>
                <div class="col-sm-10">
             {!! Form::select('ManageName',App\Models\ManagesName::pluck('ManageName','id'),null, ['id'=>'AppType','class' => 'form-control select2','style'=>'width:80%;']) !!}

                 </div>
              </td>

            </tr>
            <tr>
              <td>المدير المباشر </td>
              <td>
                <div class="col-sm-10">
                  {!! Form::select('MainDirector',App\Models\Emplyee::pluck('NameAR','id'),null, ['id'=>'AppType','class' => 'form-control select2','style'=>'width:80%;']) !!}

                 </div>
              </td>

            </tr>
            <tr>
              <td>المسمي الوظيفي</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::select('JobTitle',App\Models\JobTitle::pluck('JobTName','id'),null, ['id'=>'AppType','class' => 'form-control select2','style'=>'width:80%;']) !!}

                 </div>
              </td>

            </tr>

            <tr>
              <td>الدرجه الوظيفية</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('JobDegree', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>

            </tr>
            <tr>
              <td>الوظيفة</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('JobName', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>

            </tr>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>

    <div class="box-footer">
    </div>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">بيانات الموظف المالية</h3>

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

            <thead>
            </thead>
            <tbody>
            <tr>
              <td>المرتب الاساسي</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('MainSalary', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>
            <tr>
              <td>بدل السكن</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('LivePremium', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>

            <tr>
              <td>بدل النقل</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('TransPremium', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>

            </tr>
            <tr>
              <td>اسم بنك الموظف</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('BankName', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>
            </tr>
            <tr>
              <td>اسم فرع بنك الموظف</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('BankBranch', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>
            </tr>
            <tr>
              <td>رقم حسلب بنك الموظف</td>
              <td>
                <div class="col-sm-10">
                    {!! Form::text('BankAccount', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>
            </tr>



            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>

    <div class="box-footer">
    </div>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
  <div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">بيانات الوثائق الرسمية للموظف</h3>

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
            <thead>
            </thead>
            <tbody>
            <tr>
              <td>رقم الهوية</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('IdentityID', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>
            <tr>
              <td>مصدر الهوية</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('IdentitySrc', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </td>

            </tr>

            <tr>
              <td>تاريخ الاصدار</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('IdentityDate', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>

            </tr>
            <tr>
              <td>تاريخ النتهاء</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('IdenDateEnd', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>
            </tr>
            <tr>
              <td>رقم الجواز</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('PassportID', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>
            </tr>
            <tr>
              <td>مصدر الجواز</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('PassportSrc', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>
            </tr>
            <tr>
              <td>تاريخ الاصدار</td>
              <td>
                <div class="col-sm-10">
                  {!! Form::text('PassportDate', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>
            </tr>
            <tr>
              <td>تاريخ النتهاء</td>
              <td>
                <div class="col-sm-10">
                   {!! Form::text('PasDateEnd', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                 </div>
              </td>
            </tr>
            </tbody>
          </table>

        </div>
        <!-- /.col -->
      </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-left">تعديل البيانات</button>
    </div>
    {{ Form::close() }}
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>



@endsection
