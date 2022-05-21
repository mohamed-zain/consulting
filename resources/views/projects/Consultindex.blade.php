 @extends('index')
@section('content')
<script>
  $(document).ready(function(){

      $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
    });

     $("#RepoAgents").change(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: $(this).val(),
        type: "GET",
        success: function(data){
            $("#results").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

     $("#Tasks").change(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: $(this).val(),
        type: "GET",
        success: function(data){
            $("#results").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

     $("#Pro").change(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: $(this).val(),
        type: "GET",
        success: function(data){
            $("#results").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

      $("#Town").change(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "GetTown",
        type: "POST",
        data: { id : $(this).val() },
        success: function(data){
            $("#mnmn").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});


  });
 
</script>
<div class="col-md-12 no-print">
           
           <div class="row">
            
               <div class="margin">
                <div class="btn-group">
                  <button type="button" class="btn btn-default">استشارات هندسية</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">معمارية</a></li>
                    <li><a href="#">انشائية</a></li>
                    <li><a href="#">كهربائية</a></li>
                    <li><a href="#">ميكانيكية</a></li>
                    
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-info">استشارات السلامة</button>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-danger">استشارات التحكيم</button>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-success">استشارات مرورية</button>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-warning">استشارات هيدروليكية</button>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-info">استشارات بيئية</button>
                </div>
              </div>
              </div> 
          </div>
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">الاستشارات</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <section class="invoice">
      <!-- title row -->
      
     

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive" id="results">
          <table id="example1"  class="table table-bordered table-striped table-responsive" style="font-size: 12px;">
                <thead>
                <tr>
                  <th>#</th>
                  <th>نوع المشروع</th>
                  <th>اسم المشروع</th>
                  <th>اسم العميل</th>
                  <th>رقم هاتف العميل</th>
                  <th>قيمة العقد</th>
                  <th>المدفوع</th>
                  <th>المتبقي</th>
                  <th>مدير الفريق</th>
                 
                </tr>
                </thead>
                <tbody>
                  @foreach($Data as $mmmmmm)
                <tr>
                  <td>{{ $mmmmmm->ProID }}</td>
                  
                  <td>{{ $mmmmmm->ProType }}</td>
                  <td>{{ $mmmmmm->ProName }}</td>
                  <td>{{ $mmmmmm->AgentName }}</td>
                  <td>{{ $mmmmmm->AgentPhone }}</td>
                  <td>{{ $mmmmmm->Price }} - ر.س</td>
                  <td>{{ $mmmmmm->Cash }} - ر.س</td>
                  <td>{{ $mmmmmm->Price - $mmmmmm->Cash }}.00 - ر.س</td>
                  <td>{{ $mmmmmm->NameAR }}</td>

                </tr>
              
                @endforeach
                
                    
                   
                </tbody>
              </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="#" onclick="window.print();"  class="btn btn-default"><i class="fa fa-print"></i> طباعة</a>
         
          
        </div>
      </div>
    </section>
      <div class="box-footer">
      </div>
       
    </div>

    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div> 

     
<div class="modal fade" id="Modal2" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اختر التقرير</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="" action="">
  {!! csrf_field() !!}
             <div class="form-group">
            <label for="Stage" class="col-sm-4 control-label">انواع التقارير عن المهام</label>
            <div class="col-sm-8">
              <select name="Tasks" id="Tasks" class="form-control select2" style="width:90%" id="branchname">
                <option value="RepoTasksAll">كل المهام</option>
                <option value="RepoTasksD">المهام المنجزة</option>
                <option value="RepoTasksUN">المهام الغير منجزة</option>
              </select>
            
                   </div>
            </div>
         </form>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="Modal1" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اختر التقرير</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="" action="">
  {!! csrf_field() !!}
             <div class="form-group">
            <label for="Pro" class="col-sm-4 control-label">انواع تقارير المشروع</label>
            <div class="col-sm-8">
              <select name="Pro" id="Pro" class="form-control select2" style="width:90%">
                <option value="RepoPrpjectAll">كل المشاريع</option>
                <option value="RepoPrpjectD">قائمة المشاريع المنتهية</option>
                <option value="RepoProDM">المشاريع المنتهية ومستحقة السداد</option>
                <option value="RepoProDM2">المشاريع المنتهية ومدفوعة قيمتها</option>
                <option value="RepoPrpjectAll">المشاريع الجارية</option>
              </select>
            
                   </div>
            </div>
         </form>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="Modal3" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اختر نوع التقرير</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="" action="">
  {!! csrf_field() !!}
             <div class="form-group">
            <label for="Stage" class="col-sm-4 control-label">الموظفين والعملاء</label>
            <div class="col-sm-8">
              <select name="RepoAgents" id="RepoAgents" class="form-control select2" style="width:90%">
                <option value="RepoEmp">كل الموظفين</option>
                <option value="RepoAgents">كل العملاء</option>
                
              </select>
            
                   </div>
            </div>
         </form>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>

 @endsection