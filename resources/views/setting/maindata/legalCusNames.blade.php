 @extends('index')
@section('content')
<section class="content-header">
        <div class="container">
          <h3>
            الاعدادات 
            <small>البيانات الاساسية</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('MainSetting') }}">الاعدادات</a></li>
            <li class="active">البيانات الاساسية</li>          
            <li class="active">الصفات القانونية للعملاء </li>

          </ol>
          </div>
        </section>

    <div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">الصفات القانونية للعملاء </h3>

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
                  <th>#</th>
                  <th>ايام متبقية </th>
                  <th>نص تكليف المدير </th>
                  <th>اسم المشروع </th>
                  <th>مدير المشروع  </th>
                  <th>المكلف</th>
                  <th>مؤشر انقضاء الفترة</th>
                 
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>3 ايام</td>
                  <td>كتابة نص العقد وارسالة للعميل للاطلاع عليه</td>
                  <td>قضية مؤسسة كنوز</td>
                  <td>سحر حسن</td>
                  <td>محمد الحافظ</td>
                  <td>  <div class="progress">
    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
      40% Complete (success)
    </div>
  </div></td>
                  
                </tr>
                 <tr>
                  <td>1</td>
                  <td>3 ايام</td>
                  <td>كتابة نص العقد وارسالة للعميل للاطلاع عليه</td>
                  <td>قضية مؤسسة كنوز</td>
                  <td>سحر حسن</td>
                  <td>محمد الحافظ</td>
                  <td>  <div class="progress">
    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
      60% Complete (success)
    </div>
  </div></td>
                  
                </tr>
                 <tr>
                  <td>1</td>
                  <td>3 ايام</td>
                  <td>كتابة نص العقد وارسالة للعميل للاطلاع عليه</td>
                  <td>قضية مؤسسة كنوز</td>
                  <td>سحر حسن</td>
                  <td>محمد الحافظ</td>
                  <td>  <div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
      90% Complete (success)
    </div>
  </div></td>
                  
                </tr>
                 <tr>
                  <td>1</td>
                  <td>3 ايام</td>
                  <td>كتابة نص العقد وارسالة للعميل للاطلاع عليه</td>
                  <td>قضية مؤسسة كنوز</td>
                  <td>سحر حسن</td>
                  <td>محمد الحافظ</td>
                  <td>  <div class="progress">
    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
      20% Complete (success)
    </div>
  </div></td>
                  
                </tr>
                 <tr>
                  <td>1</td>
                  <td>3 ايام</td>
                  <td>كتابة نص العقد وارسالة للعميل للاطلاع عليه</td>
                  <td>قضية مؤسسة كنوز</td>
                  <td>سحر حسن</td>
                  <td>محمد الحافظ</td>
                  <td>  <div class="progress">
    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%">
      30% Complete (success)
    </div>
  </div></td>
                  
                </tr>
                    
                </tbody>
              </table>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div> 
@endsection
 