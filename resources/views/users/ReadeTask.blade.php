@extends('users.layout')
  @section('content')

     <div class="col-md-12">
          <h3>
            المشاريع
            <small>مهام المشاريع</small>
            <a href="{{ url('NewTaskU') }}" id="NewestTasks" class="btn btn-app pull-left">
                <span class="badge bg-green">اسناد مهمة جديده</span>
                <i class="fa fa-edit"></i>اسناد مهمة جديده 
              </a>
            <a href="{{ url('NewestTasks') }}" class="btn btn-app pull-left">
                <span class="badge bg-green">مهمة جديده</span>
                <i class="fa fa-edit"></i>مهام جديده  
              </a>
              <a href="{{ url('AllTasks') }} " class="btn btn-app pull-left" >
                <span class="badge bg-purple">المهام</span>
                <i class="fa fa-list"></i> قائمة المهام
              </a>
              <a href="{{ url('ComplateTasks') }} " class="btn btn-app pull-left" >
                <span class="badge bg-red">المهام</span>
                <i class="fa fa-tasks"></i> المهام المنجزة
              </a>
               <a href="#" class="btn btn-app pull-left" data-toggle="modal" data-target="#Modal">
                <span class="badge bg-red">الطابات والاذونات</span>
                <i class="fa fa-tasks"></i> الطلبات والاذونات
              </a>
              <a href="{{ url('OutCome') }} " class="btn btn-app pull-left" >
                  <span class="badge bg-purple">المهام</span>
                  <i class="fa fa-list"></i> مهامي المرسلة
              </a>
          </h3>

         <ol class="breadcrumb" style="width: 13.5%">
             <li><a href="{{url('UsersTasks')}}"><i class="fa fa-dashboard"></i> المهام</a></li>
             <li class="active"><a href="{{ url('UsersTasks') }}"><i class="fa fa-folder-open"></i>قائمة المهام</a></li>
         </ol>
          </div>
<div class="col-md-12">
 <div class="row">
         
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">تفاصيل المهمة</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>موكلة للمهندس - {{ $Data->NameAR }}</h3><br>
                <a href=""><h5>اسم المشروع - {{ $Data->ProName }}
                  <span class="mailbox-read-time pull-left">التاريخ - {{ date('F d, Y', strtotime($Data->T_Date)) }}</span></h5></a>
                  <a href=""><h5>مده المهمة {{ $Data->Period }} يوم و {{ $Data->Days }} ساعة و {{ $Data->Minutes }} دقيقة
                      </h5></a>
              </div>
            
              <div class="mailbox-read-message">
                <p>مرحبا {{ $Data->NameAR }},</p>

                <p class="whitespace">{{ $Data->TaskContent }}.</p>

                

                <p>شكرا,<br>الادارة</p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                @foreach($File as $Single)
                    <div class="col-lg-3">
              <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                  <div class="mailbox-attachment-info">
                    <a href="{{url('storage/app/public')}}/{{ $Single->FTaskName }}" class="mailbox-attachment-name" target="_blank"><i class="fa fa-paperclip"></i> عرض المرفق</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>

                </li>
              </ul>
                    </div>
                @endforeach
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
           
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
</div>

  @endsection