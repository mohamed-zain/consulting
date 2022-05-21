   @extends('index')
@section('content')
    <style>
        .card-body {
            min-height: 200px;
            min-width: 200px;
            margin-right: 5px;
        }
    </style>
   <section class="content-header">
        <div class="container">
          <h3>
            الاعدادات
            <small>الصلاحيات </small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('MainSetting') }}">الاعدادات</a></li>
            <li class="active">صلاحيات المستخدمين</li>

          </ol>
          </div>
        </section>
   <div class="container-fluid py-2">
       <h2 class="font-weight-light">Bootstrap 4 Horizontal Scrolling Cards with Flexbox</h2>
       <div class="d-flex flex-row flex-nowrap">
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
           <div class="card card-body">Card</div>
       </div>
   </div>
        <div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">الصلاحيات
      </h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
<table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>الرقم</th>
                  <th>اسم الصلاحية</th>
                  <th>الوصف </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>المدير</td>
                  <td><a><p>تسمح صلاحية المدير بالتحكم في جميع اجزاء</p>
                  <p>النظام بداية بمرحلة توقيع العقد وتوكيل المهام للمهندسين</p>
                  <p>ورفع ملفات المشروع الازمة واستخراج التقارير المالية والادارية </p>
                  <p>وارشفة الملفات
                والتحكم في بيانات الموظفين ....الخ</p></a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>المستخدم</td>
                  <td>
                    <a><p>تسمح صلاحية المستخدم للمهندس بعرض المهام الموكلة اليه</p>
                    <p>وعرضها والرد عليها كما تسمح له بتصفح المكتبة الهندسية</p>
                     <p>وارشيف الملفات كما يتيح له امكانية رفع المخططات الهندسية </p>
                      <p>النهائية للمكتبة الهندسية وكذلك رفع الملفات النهائية للمشاريع </p></a>
                  </td>

                </tr>
                </tbody>
              </table>


    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

@endsection
