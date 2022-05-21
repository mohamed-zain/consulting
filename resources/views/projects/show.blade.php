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

 <div class="">
   <section class="content-header">
        <div class="">
          <h3>
            المشاريع
            <small>التفاصيل</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('Projects') }}">المشاريع</a></li>
            <li class="active">تفاصيل المشروع</li>
            <li><a href="{{ url('PrintProject') }}/{{ $Single->ProID }}" ><i class="fa fa-print"></i> طباعة</a></li>
          </ol>
          </div>
        </section>
 </div>
   <div class="row">
       <div class="col-md-6">
           <div class="box box-default">
               <div class="box-header with-border">
                   <h3 class="box-title">بيانات المشروع</h3>

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
                                   <td>اسم العميل</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->first_name }} {{ $Single->last_name }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> الباقة</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->name }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td>رقم الملف </td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->FileCode }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> رقم البينار</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->number }}
                                       </div>
                                   </td>

                               </tr>


                               <tr>
                                   <td>الهاتف </td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->phone }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td>  البريد</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->email }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td>تاريخ الاشتراك</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->date_created }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> رقم الواتساب</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->_billing_myfield16 }}
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
       <div class="col-md-6">
           <div class="box box-default">
               <div class="box-header with-border">
                   <h3 class="box-title">بيانات المشروع</h3>

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
                                   <td> قيمة الاشتراك</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->total }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> العنوان</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->address_1 }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td>مدينة العميل</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->city }}
                                       </div>
                                   </td>

                               </tr>

                               <tr>
                                   <td> المحافظة</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->state }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> الدولة</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->country }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> مرحلة المشروع الحالية</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{--{{ $Single->date_created }}--}}-------
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> كيف عرف عنا</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->_billing_myfield14 }}
                                       </div>
                                   </td>

                               </tr>
                               <tr>
                                   <td> اوقات الاتصال المفضلة</td>
                                   <td>
                                       <div class="col-sm-10">
                                           {{ $Single->_billing_myfield15 }}
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
   </div>
   <div class="row">
       <div class="col-md-12">
           <div class="box box-default">
               <div class="box-header with-border">
                   <h3 class="box-title">ملفات المشروع</h3>

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
                           <table class="table table-striped" >

                               <thead>
                               </thead>
                               <tbody>


                                   <ul class="mailbox-attachments clearfix" >
                                       <?php $Docs = App\Models\ProjectServices::where('Bennar_Code',$Single->number)->get(); ?>
                                       @foreach($Docs as $Single )
                                           <li style="float: right !important;">
                                        <span class="mailbox-attachment-icon">
                                            <a href="#"  data-toggle="modal" data-target="#{{$Single->ServiceCode}}"><i class="fa fa-folder-open"></i></a>
                                        </span>
                                               <div class="mailbox-attachment-info">
                                                   <a href="#" data-toggle="modal" data-target="#{{$Single->ServiceCode}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                                       {{Str::limit($Single->ServiceID, 30)}}
                                                   </a>
                                                   <span class="mailbox-attachment-size">
                         رمز المرحلة {{$Single->ServiceCode}}
                                                       <a href="#" class="btn btn-default btn-xs pull-right"></a>
                        </span>
                                               </div>
                                           </li>
                                               <div class="modal fade" id="{{$Single->ServiceCode}}" role="dialog">
                                                   <div class="modal-dialog modal-lg">
                                                       <div class="modal-content">
                                                           <div class="modal-header">
                                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                               <h4 class="modal-title"> ملفات المرحلة - {{$Single->ServiceCode}} </h4>
                                                           </div>
                                                           <div class="modal-body">
                                                               <ul class="mailbox-attachments clearfix" >
                                                                   <?php $filoo = App\Models\TasksFile::where('B_Code',$Single->Bennar_Code)->where('Mission',$Single->ServiceCode)->get(); ?>
                                                                   @foreach($filoo as $items )
                                                                       <li style="float: right !important;">
                                                                                <span class="mailbox-attachment-icon">
                                                                                    <a href="{{ url('storage/app/public') }}/{{ $items->FileName }}" target="_blank">
                                                                                        <i class="fa fa-file-pdf"></i></a>
                                                                                </span>
                                                                                                                   <div class="mailbox-attachment-info">
                                                                                                                       <a href="{{ url('storage/app/public') }}/{{ $items->FileName }}"  target="_blank" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                                                                                                           {{Str::limit($items->Mission, 30)}}
                                                                                                                       </a>
                                                                                                                       <span class="mailbox-attachment-size">
                                                                 رمز المرحلة {{$items->Mission}}
                                                                                                                           <a href="#" class="btn btn-default btn-xs pull-right"></a>
                                                                </span>
                                                                           </div>
                                                                       </li>
                                                                       @endforeach
                                                               </ul>
                                                           </div>
                                                           <div class="modal-footer">

                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                       @endforeach

                                   </ul>


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
   </div>








@endsection
