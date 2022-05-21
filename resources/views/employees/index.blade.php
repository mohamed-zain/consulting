 @extends('index')
@section('content')
     
      <script>
  $(document).ready(function(){

      $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
    });

      $("#Town2").click(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "emoployeeCreate",
        type: "GET",
        data: { id : $(this).val() },
        success: function(data){
            $("#Command").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});




  });
 
</script>

   <div class="">
     <section class="content-header">
        <div class="">
          
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">قائمة الموظفين</li>          

          </ol>
          </div>
        </section>
   </div>

        <div class="col-md-12" >
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">الجدول يوضح قائمة الموظفين المسجلين في الشركة</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="" style="margin-bottom: 20px">
  <a href="{{ url('emoployeeCreate') }}" class="btn btn-info" name="emoployeeCreate" id="Town"><i class="fa fa-plus"></i> اضافة موظف</a> 

</div>
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>اسم الموظف</th>
                  <th>الصورة</th>
                  <th>الفرع</th>
                  <th>الادارة</th>
                  <th>رقم الجوال</th>
                  <th>البريد الالكتروني</th>
                  <th>تعديل</th>
                  <th>عرض</th>

                  
                </tr>
                </thead>
                <tbody>
                  @foreach($Data as $Single)
                <tr>
                  
                  <td>{{$Single->NameAR}}</td>

                  <td>
                     
                    @if(isset($Single->Attached))
                    <img src="{{url('')}}/{{$Single->Attached}}" class="img-circle" alt="User Image" style="height: 40px;width: 50px">
                    @else
                   <img src="{{ asset('dist/img/bb.png') }}" style="height: 40px;width: 50px">

                    @endif
                    
                  </td>
                  <td>{{$Single->BranchName}}</td>
                  <td>{{$Single->ManageName}}</td>
                  <td>{{$Single->MobPhone}}</td>
                  <td>{{$Single->Email}}</td>
                <td><a href="{{url('EditEmp')}}/{{ $Single->emp_id }}" class="CMe"><i class="fa fa-edit btn btn-warning"></i></a></td>
                <td><a href="{{url('ShowEmp')}}/{{ $Single->emp_id }}"><i class="fa  fa-eye btn btn-info"></i></a></td>

                  
                </tr>
                @endforeach
                
                    
                </tbody>
                <tfoot>
              
                </tfoot>
              </table>
    </div>
  </div>
</div>
  @endsection        
     
             