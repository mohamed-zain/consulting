 @extends('index')
@section('content')
<?php
use App\Models\ProjectsSteps;
use App\Models\Charttype;

$moh = DB::table('charts')->join('charttypes','charttypes.id','=','charts.Title')
->where('ProjectID','=',$Data->ProID)->get();

?>
<style type="text/css">
  .time-label{
    margin-right: 25px;
  }
</style>
<script>
  $(document).ready(function(){
      $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
    });
     $("#branchname").change(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "GetCartype",
        type: "POST",
        data: { id : $(this).val() },
        success: function(data){
            $("#mnmn").html(data);
        }
    });
});
  });

</script>
 <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    اسم المشروع -- {{ $Data->ProName }}
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>

              <div class="timeline-item">
                <span class="time pull-left"><i class="fa fa-clock-o"></i>تم انشاء المشروع بتاريخ -- {{ $Data->created_at }}</span>

                <h3 class="timeline-header"><a href="#">ملخص تفاصيل المشروع </a></h3>

                <div class="timeline-body">
                 {{ $Data->ProDesc }}..
                </div>
                <div class="timeline-footer">

                  <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Modal2">
                  تضمين خطاب التسليم و اغلاق المشروع وارشفته</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li class="time-label">
                  <span class="bg-aqua">
                    المهندسين الذين سلمو مهامهم
                  </span>
            </li>
             <div class="modal fade" id="Modal2" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اغلاق المشروع</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="POST" action="{{ route('FinalProStage') }}" enctype="multipart/form-data">
  <input type="hidden" name="ProID" value="{{$Data->ProID}}">
  {!! csrf_field() !!}
             <div class="form-group">
            <label for="Stage" class="col-sm-4 control-label">اختر المرحلة الحالية للمشروع</label>
            <div class="col-sm-8">
              {!! Form::select('Stage', ProjectsSteps::pluck('LevelName','LevelName'),null, ['class' => 'form-control select2','style' => 'width:90%']) !!}

                   </div>

            </div>
            <div class="form-group">
                    <div class="col-sm-8">
                     <div class="btn btn-default btn-file pull-left">
                  <i class="fa fa-paperclip"></i> تضمين خطاب التسليم
                  <input type="file" name="Final" id="Own" required>
                </div>
              </div>
                   </div>
           <button id="registrationID" class="btn btn-success">حفظ</button>
         </form>

        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
            @if(isset($task))
             @foreach($task as $team)

            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">
                <span class="time pull-left"><i class="fa fa-clock-o "></i> 5 mins ago</span>

                <h3 class="timeline-header no-border"><a href="#">المهندس - {{ $team->NameAR}}</a> سلم مهمته (ملخص المهمة)<br><br>{{ $team->ReContent}}</h3>
              </div>
            </li>
             @endforeach
             @endif
            <!-- END timeline item -->

            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    ملفات المشروع المكتملة
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-camera bg-purple"></i>

              <div class="timeline-item">

                <h3 class="timeline-header"><a href="#">قائمة بالملفات المكتملة لهذا المشروع</a>--<a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Modal2222">تحميل المخططات النهائية</a></h3>

                <div class="timeline-body">
                  @if(isset($Data2->Checkfile))
                  <div style="margin-bottom: 10px;">
                    @if($Data2->Checkfile==null)
                    <a class="btn btn-primary btn-xs pull-left">لا يوجد ملف</a>
                    @endif
                  <div class="mailbox-attachment-info">
                    <a href="{{url('')}}/{{$Data2->Checkfile}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                      مرفق صورة الصك

                    </a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </div>
                @endif
                @if(isset($Data2->IDeintyfile))
                <div style="margin-bottom: 10px;">
                  @if($Data2->IDeintyfile==null)
                    <a class="btn btn-primary btn-xs pull-left">لا يوجد ملف</a>
                    @endif
                  <div class="mailbox-attachment-info">
                    <a href="{{url('')}}/{{$Data->IDeintyfile}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                      مرفق صورة الهوية

                    </a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </div>
                @endif
                @if(isset($Data2->Desitionfile))
                <div style="margin-bottom: 10px;">
                   @if(! isset($Data2->Desitionfile))
                    <a class="btn btn-primary btn-xs pull-left">لا يوجد ملف</a>
                    @endif
                  <div class="mailbox-attachment-info">
                    <a href="{{url('')}}/{{$Data->Desitionfile}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                      مرفق القرار المساحي

                    </a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </div>
                 @endif
                @if(isset($Data2->Bulldingfile))
                <div style="margin-bottom: 10px;">
                  @if(! isset($Data2->Bulldingfile))
                    <a class="btn btn-primary btn-xs pull-left">لا يوجد ملف</a>
                    @endif
                  <div class="mailbox-attachment-info">
                    <a href="{{url('')}}/{{$Data->Bulldingfile}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                      مرفق نظام البناء

                    </a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </div>
                @endif
                @if(isset($moh))
             @foreach($moh as $moh2)
            <div class="mailbox-attachment-info">
                    <a href="{{url('')}}/{{$moh2->Chart}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                     {{$moh2->titlename}}--{{$moh2->Brand}}

                    </a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
             @endforeach
             @endif
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->

            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <div class="modal fade" id="Modal2222" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">اضافة المخططات النهائية</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="POST" action="{{ route('ChartsControl.store') }}" enctype="multipart/form-data" >
  <input type="hidden" name="ProjectID" value="{{$Data->ProID}}">
  {!! csrf_field() !!}
             <div class="form-group">
            <label for="Stage" class="col-sm-4 control-label">اسم المخطط  </label>
            <div class="col-sm-8">
              {!! Form::select('Title',Charttype::pluck('titlename','id'),null, ['id'=>'branchname','class' => 'form-control select2','style'=>'width:100%;']) !!}

                   </div>
            </div>
            <div class="form-group">
            <label for="Brand" class="col-sm-4 control-label">نوع المخطط  </label>
            <div class="col-sm-8">
              <select name="Brand" class="form-control select2" style="width:90%" id="mnmn" required="required">


              </select>

                   </div>
            </div>
            <div class="form-group">
              <label for="Stage" class="col-sm-4 control-label">اختر الملف </label>
              <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> تحميل المخطط
                  <input type="file" name="Chart" id="Own" required="required">
                </div>
            </div>
           <button id="registrationID" class="btn btn-success">حفظ</button>
         </form>

        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
      @endsection
