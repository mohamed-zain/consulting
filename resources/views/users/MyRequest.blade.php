 <div class="row">
     <section class="content-header">
        <div class="container">
          
          <ol class="breadcrumb">
            <li><a href="{{ url('UsersTasks') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">قائمة بجميع طلباتك</li>          

          </ol>
          </div>
        </section>
   </div>

        <div class="col-md-12" >
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">الجدول يوضح قائمة الطلبات التي ارسلتها للادارة</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="" style="margin-bottom: 20px">
  

</div>
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>نوع الطلب</th>
                  <th>تفاصيل</th>
                  <th>الحالة</th>
                  <th>التاريخ</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                  @foreach($Data as $Single)
                <tr>
                  
                  <td>{{$Single->Name}}</td>
                  <td>{{$Single->Extra}}</td>
                  <td>
                    @if($Single->RStatus == 0)
                    <a href="#" class="btn btn-warning">في الانتظار</a>
                    @elseif($Single->RStatus == 1)
                    <a href="#" class="btn btn-success">مقبول</a>
                    @elseif($Single->RStatus == 2)
                    <a href="#" class="btn btn-danger">مرفوض</a>
                    @endif

                  </td>
                  <td>{{$Single->created_at}}</td>

                   
                </tr>
                @endforeach
                
                    
                </tbody>
                <tfoot>
              
                </tfoot>
              </table>
    </div>
  </div>
</div>
         