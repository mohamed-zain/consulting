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


<div class="">
  <section class="content-header">
        <div class="">
          <h3>
            لوحة التحكم
            <small>المشاريع التي تم ارشفتها</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">ادارة المشاريع</li>
            <li class="active">المشاريع المؤرشفة </li>
          </ol>
          </div>
        </section>
</div>

<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">قائمة المشاريع المؤرشفة</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
         <div class="" style="margin-bottom: 20px">
</div>
<table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>

                  <th>باقة المشروع</th>
                  <th>اسم العميل</th>
                  <th>رقم الملف</th>
                  <th>تاريخ تفعيل الملف </th>
                    <th> مده الانتظار</th>
                  <th> رقم البينار</th>
                  <th> رقم الهاتف</th>
                  <th>  البريد الإلكتروني</th>
                    <th>خيارات</th>
                  <th>عرض</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($Data as $mmmmmm)
                      <?php
                      $exx = \App\Models\Tasks::where('Bennar_Code',$mmmmmm->number)->first();
                      $sha = DB::table('Schedule_tasks')
                          ->where('Bennar_Code',$mmmmmm->number)
                          //->where('Scheduled',$single['number'])
                          ->first();
                      if (!isset($exx)){
                          $fdate = $mmmmmm->DRP;
                          $tdate = \Carbon\Carbon::today();
                          $datetime1 = new DateTime($fdate);
                          $datetime2 = new DateTime($tdate);
                          $interval = $datetime1->diff($datetime2);
                          $days = $interval->format('%a');
                      }

                      ?>
                      @if(!isset($exx))
                <tr>
                  {{--<td>
                    @if( $mmmmmm->StatusActive == '1')
                    <span class="badge bg-green">مفعل</span>
                    @elseif($mmmmmm->StatusActive == '0')
                    <span class="badge bg-red ">غير مفعل</span>
                    @endif
                  </td>--}}

                  <td>{{ $mmmmmm->name }}</td>
                  <td><a href="{{url('ShowProject')}}/{{ $mmmmmm->first_name }}">{{ $mmmmmm->last_name }}</a></td>
                  <td>{{ $mmmmmm->FileCode }}</td>
                  <td>{{ $mmmmmm->DRP  }}</td>
                    <td class="@if($days > 10 && $days <= 40) text-green @elseif($days > 40 && $days < 100) text-blue @elseif($days > 100 ) text-danger @endif">{{ $days }} يوم </td>
                    <td><span class="badge bg-red ">{{ $mmmmmm->number  }}</span></td>
                  <td style="direction: ltr">{{ $mmmmmm->phone  }}</td>
                  <td> <a>{{ $mmmmmm->email  }}</a> </td>

                  <td>
                      <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> خيارات
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                              @if($mmmmmm->EngID == null)
                                  @if(isset($sha))
                                      <li> <a class="text-green " href="#" >مجدولة لتاريخ  {{ $sha->assign_date }}</a></li>
                                  @else
                                      <li> <a class="text-blue" href="#"  data-toggle="modal" data-target="#jobCard{{ $mmmmmm->number }}">فتح JobCard</a></li>
                                  @endif
                              @else
                                  <?php $uer = DB::table('users')->where('id',$mmmmmm->EngID)->first() ?>
                                      <li><a class="text-red" href="#" >مسند للمهندس {{ $uer->name }}</a></li>

                              @endif

                          </ul>
                      </div>

                  </td>
                    <td><a href="{{url('ProProduction')}}/{{ $mmmmmm->number }}"><i class="fa  fa-eye btn btn-info"></i></a></td>
                </tr>
                <div class="modal fade" id="jobCard{{ $mmmmmm->number }}" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">بدء العمل علي المخططات الهندسية</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('OpenJobCard')}}" method="post">
                                            {{ csrf_field() }}

                                            <label for="BranchID" class="control-label"> أختر المهندس</label>
                                            <input type="hidden" name="Bennar_Code" value="{{ $mmmmmm->number }}">
                                            <?php

                                            $Services = App\Models\ProjectServices::where('Bennar_Code',$mmmmmm->number)->first();
                                            ?>

                                            <input type="hidden" name="Mission" value="{{ $Services->ServiceCode }}">
                                            <div class="form-inline">
                                                <select name="EmpID" class="form-control select2" id="EmpID"   style="margin-bottom: 9px; width: 80%" required>
                                                    @foreach(App\Models\User::where('roll','=','AdmissionEmp')->get() as $ser)
                                                        <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <br>
                                            <div id="shadu" style="">
                                                <label>تاريخ فتح بطاقة العمل للمهندس:</label>
                                                <div class="input-group date">

                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="date" class="form-control pull-right" name="assign_date" required>
                                                </div>
                                            </div>

                                            <br>
                                            <label>تاريخ تسليم المهمة:</label>
                                            <div class="input-group date">

                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="date" class="form-control pull-right" name="Deadline" required>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-success">إرسال</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

                      @endif
                @endforeach

                </tbody>
              </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>



@endsection
