  @extends('users.layout')
@section('content')
<?php
use App\Models\Emplyee;
use App\Models\Projects;
?>


<script>
  $(document).ready(function(){

      $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
        $("#Command").fadeIn(3000);
    });

      $("#TasksList22").click(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "{{url('/')}}/TasksList2",
        type: "GET",
        success: function(data){
            $("#Puthere").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

 $("#CompletedTasks22").click(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "{{url('/')}}/CompletedUTasks",
        type: "GET",
        success: function(data){
            $("#Puthere").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

 $("#TasksRatings").click(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "{{url('/')}}/TasksRatings",
        type: "GET",
        success: function(data){
            $("#Puthere").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

 $("#NewTask").click(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "{{url('/')}}/NewTask",
        type: "GET",
        success: function(data){
            $("#Puthere").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});




});
</script>
  <div class="col-md-12" >
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
                <i class="fa fa-tasks"></i> مهامي المنجزة
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
        <!-- /.col -->
        <div class="col-md-12" >
          <div class="box box-default" id="Puthere">
         {!! Form::open(array('route'=>'Tasks.store','class'=>'form-horizontal','onsubmit'=>'return validation();','enctype' => 'multipart/form-data','files' => true)) !!}
            <div class="box-header with-border">
              <h3 class="box-title">اسناد مهمة جديده</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

              <div class="col-sm-12" >
              <div class="form-group">
              	<label for="ProName" class="col-sm-2 control-label">اختر المهندس</label>
                 <select name="EmpID" class="form-control select2" style="width:80%;">
                  <?php $Pooo = App\Models\User::all() ?>
                  <option>اختر الموظف</option>
                  @foreach($Pooo as $PPmm)
                  <option value="{{ $PPmm->EmpiD }}">{{ $PPmm->name }}</option>
                  @endforeach
                </select>

              </div>
          </div>
          <div class="col-sm-12">
              <div class="form-group">
              	<label for="ProName" class="col-sm-2 control-label">اختر المشروع</label>
                <select name="Proid" class="form-control select2" style="width:80%;">
                  <?php $P = App\Models\Projects::all() ?>
                   <option>اختر المشروع</option>
                  @foreach($P as $PP)
                  <option value="{{ $PP->ProID }}">{{ $PP->ProID }} - {{ $PP->ProName }}</option>
                  @endforeach
                </select>

              </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="Price" class="col-sm-2 control-label">المده الزمنية للمهمة</label>

                <div class="col-sm-3">
                    {!! Form::number('Period', null, ['class' => 'form-control', 'placeholder' => 'عدد الايام','style'=>'width:80%;']) !!}

                </div>
                <div class="col-sm-3">
                    {!! Form::number('Days', null, ['class' => 'form-control', 'placeholder' => 'عدد الساعات','style'=>'width:80%;']) !!}

                </div>
                <div class="col-sm-3">
                    {!! Form::number('Minutes', null, ['class' => 'form-control', 'placeholder' => 'عدد الدقائق','style'=>'width:80%;']) !!}

                </div>

            </div>

          </div>
          <div class="col-sm-12">
              <div class="form-group">
              	 {!! Form::textarea('TaskContent', null, ['rows'=>'30','cols'=>'80','class' => 'form-control whitespace','id'=>'compose-textarea', 'placeholder' => ' اكتب نص المهمة هنا.','style'=>'height: 300px']) !!}

              </div>
          </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="btn btn-default btn-file">
                            <i class="fa fa-paperclip" id="upload"></i> مرفقات
                            <input type="file" name="TAttached2[]" multiple="multiple" id="myFile"  onchange="myFunction()">
                        </div>
                    </div>

                    <p id="demo"></p>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">

                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ارسال</button>
              </div>
            </div>
              {!! Form::close() !!}
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
<script>
    function myFunction(){
        var x = document.getElementById("myFile");
        var txt = "";
        if ('files' in x) {
            if (x.files.length == 0) {
                txt = "Select one or more files.";
            } else {
                for (var i = 0; i < x.files.length; i++) {
                    txt += "<br><strong>" + (i+1) + ". المرفق</strong><br>";
                    var file = x.files[i];
                    if ('name' in file) {
                        txt += "اسم الملف: " + file.name + "<br>";
                    }
                    if ('size' in file) {
                        txt += "حجم الملف: " + file.size + " bytes <br>";
                    }
                }
            }
        }
        else {
            if (x.value == "") {
                txt += "Select one or more files.";
            } else {
                txt += "The files property is not supported by your browser!";
                txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead.
            }
        }
        document.getElementById("demo").innerHTML = txt;
    }
</script>
@endsection
