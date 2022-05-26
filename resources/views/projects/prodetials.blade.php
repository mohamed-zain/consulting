@extends('index')
@section('content')
<div class="row">
  <section class="content-header">
        <div class="col-md-12">
          
          <ol class="breadcrumb" style="width: 40%">
            <li><a href="{{url('MainPort')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('projectsList') }}"><i class="fa fa-folder-open"></i>  المشاريع</a></li>
            <li class="active"><i class="fa fa-folder"></i>المهام</li>
          </ol>
          </div>
           
          
        </section>
</div>
    

       <div class="col-md-6">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-default direct-chat direct-chat-info">
            <div class="box-header with-border">
              <h3 class="box-title"> المهام التي اسندت في هذا للمشروع</h3>

              <div class="box-tools pull-right">
               
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">المحامي ابراهيمم</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="dist/img/bb.png" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">

                    تم رفع جميع الملفات الخاصة بالقضية
                    كم تم تصنيف الملفات المرفوعة في الارشيف
                    تكليف مقترح:
                    رفع جميع الملفات الخاصة بجميع القضايا في البرنامج وارشفتها للعودة لها عند الحاجة
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                   <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">المحامي ابراهيمم</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="dist/img/bb.png" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">

                    تم رفع جميع الملفات الخاصة بالقضية
                    كم تم تصنيف الملفات المرفوعة في الارشيف
                    تكليف مقترح:
                    رفع جميع الملفات الخاصة بجميع القضايا في البرنامج وارشفتها للعودة لها عند الحاجة
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                   <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">المحامي ابراهيمم</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="dist/img/bb.png" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">

                    تم رفع جميع الملفات الخاصة بالقضية
                    كم تم تصنيف الملفات المرفوعة في الارشيف
                    تكليف مقترح:
                    رفع جميع الملفات الخاصة بجميع القضايا في البرنامج وارشفتها للعودة لها عند الحاجة
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                   <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">المحامي ابراهيمم</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="dist/img/bb.png" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">

                    تم رفع جميع الملفات الخاصة بالقضية
                    كم تم تصنيف الملفات المرفوعة في الارشيف
                    تكليف مقترح:
                    رفع جميع الملفات الخاصة بجميع القضايا في البرنامج وارشفتها للعودة لها عند الحاجة
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">المحامي جعفر</span>
                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="dist/img/bb.png" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    
                    تم رفع جميع الملفات الخاصة بالقضية
                    كم تم تصنيف الملفات المرفوعة في الارشيف
                    تكليف مقترح:
                    رفع جميع الملفات الخاصة بجميع القضايا في البرنامج وارشفتها للعودة لها عند الحاجة!
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
              </div>
           
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
         
  <!-- /.box -->
<div class="col-md-6">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-default direct-chat direct-chat-info">
            <div class="box-header with-border">
              <h3 class="box-title">اختر المهندس واسند له المهمة</h3>
              <div class="box-tools pull-right">
               
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
              <ul class="users-list clearfix">
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Today</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Norman</a>
                      <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Jane</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">John</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Alexander</a>
                      <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Sarah</a>
                      <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Nora</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Nadia</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Nora</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Nadia</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Nora</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="dist/img/bb.png" alt="User Image">
                      <a class="users-list-name" href="#">Nadia</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                  </ul>
                  
            
                <!-- /.direct-chat-msg -->
              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
             
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>

     @endsection