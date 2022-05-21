@extends('EngineerDashboard.layouts.layout')
@section('content')
    <div class="">
        <section class="content-header">
            <div class="">
                <h3>
                    مهندس خير عون
                    <small> برنامج خيرعون لإدارة الخدمات الهندسية </small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="{{ url('EngineerDashboard') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                    <li><a href="{{ url('EngineeringLibrary') }}"><i class="fa fa-dashboard"></i> المكتبة الهندسية</a></li>
                </ol>
            </div>
        </section>
    </div>

    <div class="col-md-12">
        <div class="col-md-3">
            @include('EngineerDashboard.layouts.aside')
            @include('EngineerDashboard.layouts.notes')
        </div>
        <div class="col-md-9">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title"> المكتبة الهندسية  - الملفات المؤقتة</h3>


                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-success col-lg-12">
                            <h4>المكتبة الهندسية ومشاركة الملفات</h4>

                            <p>يمكن للمهندسين مشاركة الملفات في المساحة المؤقتة لمده 72 ساعة</p><p>(كما يمكن رفع الملفات الهندسية الخاصة بشكل دائم جميع المهندسين)</p>

                        </div>


                    </div>


                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">المكتبة الهندسية</a></li>
                    <li><a href="#tab_2" data-toggle="tab"> الملفات المؤقتة</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1" style="min-height: 400px">
                        <div class="row">
                            <div class="col-lg-9"><h5 class="text-yellow">المكتبة الهندسية يتم فيها مشاركة الملفات المهمة والضرورية بين المهندسين بصورة دائمة</h5></div>
                            <div  class="col-lg-3">
                                <div class=" pull-left">
                                    <button data-toggle="modal" data-target="#Modal3333" class="btn btn-warning pull-left" id="Modal3333id"> مشاركة ملف للمكتبة </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php
                         $chart = DB::table('documents2')
                             ->join('users','users.id','=','documents2.Usr_id')->where('cat','1')
                             ->select('documents2.*','users.*',DB::raw('documents2.created_at as LCA'))
                             ->get();

                         $chart2 = DB::table('documents2')
                             ->join('users','users.id','=','documents2.Usr_id')->where('cat','2')
                             ->select('documents2.*','users.*',DB::raw('documents2.created_at as LCA'))
                             ->get();
                        //$Reports = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','2')->get();
                        //$Recomends = \App\Models\Documents::where('projectID',$bennar)->where('mission',$item88->ServiceCode)->where('cat','3')->get();

                        ?>

                        <ul class="mailbox-attachments clearfix">
                            @foreach($chart as $it)
                                <?php
                                $infoPath = pathinfo(public_path($it->Docs));
                                $extension = $infoPath['extension'];
                                if ($extension == 'pdf'){
                                    $icon = 'fa fa-file-pdf-o';
                                    $color = 'red';
                                }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                    $icon = 'fa fa-picture-o';
                                    $color = 'cadetblue';
                                }elseif ($extension == 'dwg'){
                                    $icon = 'fa fa-file-code-o';
                                    $color = 'violet';
                                }elseif ($extension == 'xls'){
                                    $icon = 'fa fa-excel-o';
                                    $color = 'darkcyan';
                                }elseif ($extension == 'zip' || $extension == 'rar'){
                                    $icon = 'fa fa-file-archive-o';
                                    $color = 'seagreen';
                                }else{
                                    $icon = 'fa fa-file';
                                    $color = 'seagreen';
                                }
                                ?>
                                <li>
                                    <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it->DocName, 40)}}</a>
                                        <span class="mailbox-attachment-size">
                                            {{ date('F d, Y', strtotime($it->LCA)) }}
                                                    <br>
                                            <span class="text-green">{{ $it->name }}</span>
                                            <a href="{{ url('storage/app/public') }}/{{$it->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                        </span>

                                    </div>
                                </li>

                            @endforeach
                        </ul>

                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2"  style="min-height: 400px">
                        <div class="row">
                            <div class="col-lg-9"><h5 class="text-green">الملفات المؤقتة يتم تشاركها بين المهندسين بصورة مؤقتة لفترة لا تتجاوز 72 ساعة</h5></div>
                            <div  class="col-lg-3">
                                <div class=" pull-left">
                                    <button data-toggle="modal" data-target="#Modal3333" class="btn btn-success pull-left"> مشاركة ملف بصورة مؤقتة </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <ul class="mailbox-attachments clearfix">
                            @foreach($chart2 as $it2)
                                <?php
                                $infoPath = pathinfo(public_path($it2->Docs));
                                $extension = $infoPath['extension'];
                                if ($extension == 'pdf'){
                                    $icon = 'fa fa-file-pdf-o';
                                    $color = 'red';
                                }elseif($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
                                    $icon = 'fa fa-picture-o';
                                    $color = 'cadetblue';
                                }elseif ($extension == 'dwg'){
                                    $icon = 'fa fa-file-code-o';
                                    $color = 'violet';
                                }elseif ($extension == 'xls'){
                                    $icon = 'fa fa-excel-o';
                                    $color = 'darkcyan';
                                }elseif ($extension == 'zip' || $extension == 'rar'){
                                    $icon = 'fa fa-file-archive-o';
                                    $color = 'seagreen';
                                }else{
                                    $icon = 'fa fa-file';
                                    $color = 'seagreen';
                                }
                                ?>
                                <li>
                                    <span class="mailbox-attachment-icon"><i class="{{ $icon }}" style="color: {{$color}}"></i></span>
                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> {{Str::limit($it2->DocName, 20)}}</a>
                                        <span class="mailbox-attachment-size">
                                            {{ date('F d, Y', strtotime($it2->LCA)) }}
                                                    <br>
                                            <span class="text-green">{{ $it2->name }}</span>
                                            <a href="{{ url('storage/app/public') }}/{{$it2->Docs}}" class="btn btn-default btn-xs pull-left"><i class="fa fa-cloud-download"></i></a>
                                        </span>

                                    </div>
                                </li>

                            @endforeach
                        </ul>
                    </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div>
        </div>
    </div>


    <div class="modal fade" id="Modal3333" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اضافة ملف للمكتبة الهندسية   </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="LibrarySend" method="POST" action="{{ route('LibraryCon.store') }}" enctype="multipart/form-data" >
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label">اسم الملف </label>
                            <div class="col-sm-8">
                                <input type="text" name="DocName" class="form-control " id="DocName" placeholder="اسم الملف" style="margin-bottom: 9px;" required="required" maxlength="20">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label"> نوع الملف </label>
                            <div class="col-sm-8">
                        <select name="cat" class="form-control select2" id="cat"  style="margin-bottom: 9px; width: 100%" required="required">
                            <option value="2">------إختر نوع الملف------</option>
                            <option value="2">ملف مؤقت</option>
                            <option value="1">ملف دائم للمكتبة</option>

                        </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Docdetails" class="col-sm-4 control-label"  required="required">ملاحظات</label>
                            <div class="col-sm-8">
                                <textarea name="Docdetails" class="form-control" id="Docdetails" placeholder="اكتب ملاحظتك هنا" rows="5" ></textarea>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label">اختر المستند </label>
                            <input type="file" name="Docs" id="Library" required="required" data-max-file-size="200MB">

                        </div>
                        <button id="Conse123" class="btn btn-success">حفظ</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                    <h3 id="status"></h3>
                    <p id="loaded_n_total"></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const inputElement = document.querySelector('input[type="file"]');
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                url: '{{ url("uploadeTemp2") }}',
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
        });
        /********************************************************************/
        /********************************************************************/

        $('#Modal3333id').click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url : "{{ url('RefreshTempFiles2') }}",
                data : [] ,
                //dataType: 'json',
                cache:false,
                contentType: false,
                processData: false,

                success  : function(data) {
                },
                error: function(xhr, textStatus, thrownError){
                    // console.log(thrownError);
                    swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                }

            });



        });
        $('#Conse123').click(function () {

            $( "#LibrarySend" ).on( "submit", function( event ) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                event.preventDefault();

                var myForm = document.getElementById('LibrarySend');
                var formData = new FormData(myForm);
                var headers = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url : $(this).attr('action'),
                    data : formData ,
                    //dataType: 'json',
                    cache:false,
                    contentType: false,
                    processData: false,

                    success  : function(data) {
                        swal("تهانينا!",data , "success");
                        $("#LibrarySend").trigger("reset");
                        setTimeout(function() {
                            var href = "{{url('EngineeringLibrary')}}";
                            window.location.href = href;
                        },1000);


                    },
                    error: function(xhr, textStatus, thrownError){
                        // console.log(thrownError);
                        swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                    }

                });


            });


        });

        /*********************************************************************/
    </script>
@endsection