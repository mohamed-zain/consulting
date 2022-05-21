 <div class="row">
     <section class="content-header">
        <div class="container">
          
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">قائمة الطلبات المالية</li>          

          </ol>
          </div>
        </section>
   </div>

        <div class="col-md-12" >
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">الجدول يوضح قائمة الموظفين الذين ارسلو طلبات مالية</h3>

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
                  <th>اسم الموظف</th>
                  <th>نوع الطلب</th>
                  <th>التاريخ</th>
                  <th>الحاله</th>
                  
                  
                  
                </tr>
                </thead>
                <tbody>
                  @foreach($Data as $Single)
                <tr>
                  
                  <td>{{$Single->name}}</td>
                  <td>{{$Single->Name}}</td>
                  <td>{{ date('F d, Y', strtotime($Single->R_Date)) }}</td>
                  <td>
                    @if($Single->RStatus == 0)
                    <span class="badge bg-red">في الانتظار</span>
                    @elseif($Single->RStatus==1)
                     <span class="badge bg-green">مقبول</span>
                    @endif
                  </td>

                </tr>
                @endforeach
                
                    
                </tbody>
                <tfoot>
              
                </tfoot>
              </table>
    </div>
  </div>
</div>
         