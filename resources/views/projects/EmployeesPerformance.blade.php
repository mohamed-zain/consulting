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
 <div class="row">
   <section class="content-header">
        <div class="container">
          <h3>
            المشاريع
            <small>التفاصيل</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('Projects') }}">المشاريع</a></li>
            <li class="active"> اداء الموظفين في انجاز المشاريع</li>
          </ol>
          </div>
        </section>
 </div>

 <div class="row">
     <div class="col-md-12">
         <div class="box box-default">
             <div class="box-header with-border">
                 <h3 class="box-title"> اداء المهندسين في المشاريع</h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                 </div>
                 <!-- /.box-tools -->
             </div>
             <!-- /.box-header -->
             <div class="box-body">
                 <div class="row">
                     <div class="col-xs-12 table-responsive" style="direction: rtl;">


                             <ul class="mailbox-attachments clearfix" >

                                 @foreach($usr as $Single )
                                     <?php
                                     $pro = App\Models\ActivateFile::where('EngID',$Single->id)->count();
                                     $allt = App\Models\Tasks::where('EmpID',$Single->id)->count();
                                     $tdone = App\Models\Tasks::where('EmpID',$Single->id)->where('TaskDone','yes')->count();
                                     $tndone = App\Models\Tasks::where('EmpID',$Single->id)->where('TaskDone','no')->count();
                                     $onprogress = App\Models\Tasks::where('EmpID',$Single->id)->where('Status','onprogress')->value('Bennar_Code');
                                     $onOrNot = App\Models\ActivateFile::where('Bennar',$onprogress)->value('FileCode');
                                     ?>
                                     <li style="float: right !important;">
                                        <span class="mailbox-attachment-icon">
                                            <a href="#"  data-toggle="modal" data-target="#{{$Single->id}}"><i class="fa fa-user"></i></a>
                                        </span>
                                         <div class="mailbox-attachment-info" style="min-height: 80px;">
                                             <a href="#" data-toggle="modal" data-target="#{{$Single->id}}" class="mailbox-attachment-name"><i class="fa fa-pie-chart"></i>
                                                 {{Str::limit($Single->name, 30)}}
                                             </a>
                                             @if(isset( $onOrNot ))
                                             <span class="mailbox-attachment-size text-green">المشروع الحالي
                                                {{ $onOrNot }}
                                                </span>
                                             @endif
                                         </div>
                                     </li>
                                     <div class="modal fade" id="{{$Single->id}}" role="dialog">
                                         <?php $Data =  App\Models\Tasks::join('activate_files','tasks.Bennar_Code','=','activate_files.Bennar')
                                             ->where('tasks.EmpID',$Single->id)
                                             ->orderBy('tasks.id','DESC')
                                             ->get(); ?>
                                         <div class="modal-dialog modal-lg">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                     <h4 class="modal-title"> اداء الموظف - {{$Single->name}} </h4>
                                                 </div>
                                                 <div class="modal-body">

                                                     <!-- /.col -->
                                                     <div class="col-md-4 col-sm-4 col-xs-12">
                                                         <div class="info-box" style="background: #eeeeee">
                                                             <div class="info-box-content" style="margin-left: 1px;">
                                                                 <span class="info-box-text"> المهام المسندة</span>
                                                                 <span class="info-box-number">{{ $allt }}</span>
                                                             </div>
                                                             <!-- /.info-box-content -->
                                                         </div>
                                                         <!-- /.info-box -->
                                                     </div>
                                                     <!-- /.col -->

                                                     <!-- fix for small devices only -->
                                                     <div class="clearfix visible-sm-block"></div>

                                                     <div class="col-md-4 col-sm-6 col-xs-12">
                                                         <div class="info-box" style="background: #eeeeee">
                                                             <div class="info-box-content" style="margin-left: 1px;">
                                                                 <span class="info-box-text">المهام المنجزة</span>
                                                                 <span class="info-box-number">{{ $tdone }}</span>
                                                             </div>
                                                             <!-- /.info-box-content -->
                                                         </div>
                                                         <!-- /.info-box -->
                                                     </div>
                                                     <!-- /.col -->
                                                     <div class="col-md-4 col-sm-6 col-xs-12">
                                                         <div class="info-box" style="background: #eeeeee">
                                                             <div class="info-box-content" style="margin-left: 1px;">
                                                                 <span class="info-box-text" >المهام الغير منجزة </span>
                                                                 <span class="info-box-number">{{ $tndone }}</span>
                                                             </div>
                                                             <!-- /.info-box-content -->
                                                         </div>
                                                         <!-- /.info-box -->
                                                     </div>
                                                     <table id="" class="table table-bordered table-striped table-responsive">
                                                         <thead>
                                                         <tr>
                                                             <th>اسم العميل</th>
                                                             <th> رقم الملف</th>
                                                             <th> رقم الهاتف</th>
                                                             <th>  البريد الإلكتروني</th>
                                                             <th>عرض</th>

                                                         </tr>
                                                         </thead>
                                                         <tbody>
                                                         @foreach($Data as $mmmmmm)
                                                             <tr @if($mmmmmm->TaskDone == 'yes') style="background: lightgreen;" @elseif($mmmmmm->TaskDone == 'no') style="background: gold;" @endif>
                                                                 <td>{{ $mmmmmm->Name }}</td>
                                                                 <td><a href="{{url('ShowProject')}}/{{ $mmmmmm->Bennar }}">{{ $mmmmmm->FileCode }}</a></td>
                                                                 <td style="direction: ltr">{{ $mmmmmm->Phone  }}</td>
                                                                 <td> <a>{{ $mmmmmm->Email  }}</a> </td>
                                                                 <td><a href="{{url('ShowProject')}}/{{ $mmmmmm->Bennar }}" target="_blank"><i class="fa  fa-eye btn btn-info"></i></a></td>
                                                             </tr>
                                                         @endforeach



                                                         </tbody>
                                                     </table>
                                                 </div>


                                                 <div class="modal-footer">

                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 @endforeach

                             </ul>

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
 </div>
@endsection

