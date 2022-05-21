
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
                    <div class="col-md-12">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title">كل ردود المهام المرسلة مني </h3>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">


                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer no-padding">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th>رقم المشروع</th>
                                        <th>الموكل اليه</th>
                                        <th>عنوان المشروع</th>
                                        <th>نص المهمة</th>
                                        <th>نص الرد</th>
                                        <th>المهلة الزمنية</th>
                                        <th>الحالة</th>
                                        <th>التاريخ</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Data as $Single)
                                        <?php $RE = App\Models\User::where('id',$Single->EMPID)->first() ;?>
                                        <tr>
                                            <td>{{ $Single->Proid }}</td>
                                            <td>{{ $RE->name }}</td>
                                            <td>{{ $Single->ProName }}</td>
                                            <td>{{ $Single->TaskContent }}</td>
                                            <td><a href="{{ url('ReadeUReplay') }}/{{ $Single->TaskID }}">{{$Single->ReContent}}</a></td>

                                            <td><small>{{ $Single->Period }} يوم و {{ $Single->Days }} ساعة و {{ $Single->Minutes }} دقيقة
                                                </small></td>
                                            <td>
                                                @if( $Single->TState == 1)
                                                    <span class="badge bg-green">تم الرد</span>

                                                @elseif($Single->TState == 0)
                                                    <span class="badge bg-red">لم يتم الرد</span>
                                                @endif
                                            </td>

                                            <td>{{ date('F d, Y', strtotime($Single->T_Date)) }}</td>
                                            <td>
                                                <button id="{{ $Single->TaskID }}" class="btn btn-danger" data-id="{{ $Single->TaskID }}" data-token="{{csrf_token()}}" onclick='
                                                        swal({
                                                        title: "هل انت متأكد?",
                                                        text: "عند حذف هذه البيانات لا يمكنك استرجاعها مرة اخري!",
                                                        type: "info",
                                                        showCancelButton: true,
                                                        closeOnConfirm: false,
                                                        showLoaderOnConfirm: true,
                                                        },
                                                        function(){
                                                        setTimeout(function(){
                                                        var id = $("#{{ $Single->TaskID }}").data("id");
                                                        var token = $("#{{ $Single->TaskID }}").data("token");
                                                        $.ajax({
                                                        type: "GET",
                                                        url : "deltasks/"+id,
                                                        data : {
                                                        "":id,
                                                        "_method":"DELETE",
                                                        "_token":token,
                                                        },
                                                        //dataType: "json",
                                                        cache:false,

                                                        success  : function(data) {
                                                        swal("تهانينا!",data , "success");
                                                        $.ajax({
                                                        url: "CompletedTasks22",
                                                        type: "GET",
                                                        success: function(data){
                                                        $("#Command").html(data);
                                                        },
                                                        error: function(){
                                                        console.log("No results for " + data + ".");
                                                        }
                                                        });
                                                        },
                                                        error: function(xhr, textStatus, thrownError){
                                                        // console.log(thrownError);
                                                        swal("للأسف!", "لم يتم حذف المشروع!", "error");
                                                        }

                                                        });

                                                        }, 1000);
                                                        });
                                                        '>حذف</button>
                                            </td>

                                        </tr>
                                    @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /. box -->
                    </div>

                    <!-- /.col -->




                @endsection
