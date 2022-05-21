 @extends('index')
@section('content')
    <script>
        function Findmatch2()
        {
            var xmlhttp;
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    var audio = document.getElementById("audioSuccess");
                    audio.play();
                    document.getElementById("pls").innerHTML=xmlhttp.responseText;
                }
                if(xmlhttp.readyState==4 && xmlhttp.status==404) {
                    var audio = document.getElementById("audioError");
                    audio.play();
                    swal("خطأ","اكتب رقم المشروع" , "error");
                }
            }
            xmlhttp.open("GET","{{ url('') }}/Archivesearch/"+document.search.search_text.value,true);
            xmlhttp.send();
        }


        function _(el) {
            return document.getElementById(el);
        }

        function uploadFile() {
            var file = _("file1").files[0];
            // alert(file.name+" | "+file.size+" | "+file.type);
            var formdata = new FormData();
            formdata.append("file1", file);
            var ajax = new XMLHttpRequest();
            ajax.upload.addEventListener("progress", progressHandler, false);
            //ajax.addEventListener("load", completeHandler, false);
            //ajax.addEventListener("error", errorHandler, false);
            //ajax.addEventListener("abort", abortHandler, false);
            ajax.open("POST", "{{ route('Documents.store') }}"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
            //use file_upload_parser.php from above url
            ajax.send(formdata);
        }

        function progressHandler(event) {
            _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
            var percent = (event.loaded / event.total) * 100;
            _("progressBar").value = Math.round(percent);
            _("status").innerHTML = Math.round(percent) + "% جاري رفع الملف... رجاءا انتظر ";
        }

        function completeHandler(event) {
            _("status").innerHTML = event.target.responseText;
            _("progressBar").value = 0; //wil clear progress bar after successful upload
        }

        function errorHandler(event) {
            _("status").innerHTML = "فشل في التحميل";
        }

        function abortHandler(event) {
            _("status").innerHTML = "تم الغاء التحميل";
        }

    </script>
    <section class="content-header">
        <div class="">
            <h3>
                المكتب
                <small>المستندات</small>
            </h3>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active">مستندات المكتب</li>

            </ol>
        </div>
    </section>
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">مستندات المكتب</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="callout callout-warning col-lg-12">
                    <h4>مركز رفع الملفات لنظام مستندات المكتب!</h4>

                    <p>من هنا يمكن للادارة او المهندسين بإضافة اي مستند
                        خاص بالمكتب </p><p>(اي مستند له اهمية للشركة يمكن حفظه لمراجعته لاحقا)</p>

                </div>


            </div>


            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div id="pls">
        <div class="col-md-5">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">قائمة الملفات مصنفة علي حسب المشاريع</h3>
                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <form class="form form-inline" id="search" name="search">
                                {!! csrf_field() !!}
                                <input type="text" name="search_text" class="form-control input-sm" placeholder="ابحث برقم المشروع">
                                <a href="#" class="btn btn-success"  onclick="Findmatch2();">بحث</a>
                            </form>

                        </div>
                    </div>

                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 table-responsive" >
                            <ul class="mailbox-attachments clearfix">

                                @foreach($Docs as $Single )
                                    <li>
                                        <span class="mailbox-attachment-icon"><a href="#" id="folder{{$Single->Bennar}}"><i class="fa fa-folder-open" style="font-weight: 0px !important;"></i></a></span>
                                        <div class="mailbox-attachment-info">
                                            <a href="#" data-toggle="modal" data-target="#{{$Single->Bennar}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>

                                                {{Str::limit($Single->FileCode, 20)}}
                                            </a>
                                            <span class="mailbox-attachment-size">
                         رقم المشروع  {{$Single->Bennar}}
                                                <a href="#" class="btn btn-default btn-xs pull-right"></a>
                        </span>
                                        </div>
                                    </li>
                                    <script>


                                        $(document).ajaxStart(function () {
                                            $(".loa").show();
                                        }).ajaxStop(function () {
                                            $(".loa").fadeOut();
                                            $("#Command").fadeIn(3000);
                                        });

                                        $("#folder{{$Single->Bennar}}").click(function(){
                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                            $.ajax({
                                                url: "{{url('/')}}/DocsByPro/{{$Single->Bennar}}",
                                                type: "GET",
                                                success: function(data){
                                                    $("#DocsByProplace").html(data);
                                                },
                                                error: function(){
                                                    console.log("No results for " + data + ".");
                                                }
                                            });
                                        });
                                    </script>
                                @endforeach



                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="box-footer">
                    </div>

                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>


    <div class="col-md-7">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">اخر الملفات المضافة
                </h3>
                <button data-toggle="modal" data-target="#Modal2222" class="btn btn-info pull-left">إضافة ملف</button>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row" id="DocsByProplace">
                    <div class="col-xs-12 table-responsive" >
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>اسم المستند</th>
                                <th>ملاحظات</th>
                                <th>التاريخ</th>
                                <th>خيارات</th>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach($Data as $Single)
                                <tr>
                                    <td>{{ $Single->DocName }}</td>
                                    <td>{{ $Single->Docdetails }}</td>

                                    <td>{{ date('F d, Y', strtotime($Single->created_at)) }}</td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>خيارات
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ url('storage/app/public') }}/{{ $Single->Docs }}" target="_blank">عرض</a>
                                                </li>
                                                <li>
                                                    <a href="#" id="{{ $Single->id }}" data-id="{{$Single->id}}" data-token="{{csrf_token()}}" onclick='
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
                                                            var id = $("#{{ $Single->id }}").data("id");
                                                            var token = $("#{{ $Single->id }}").data("token");
                                                            $.ajax({
                                                            type: "GET",
                                                            url : "deleteDocuments/"+id,
                                                            data : {
                                                            "":id,
                                                            "_method":"DELETE",
                                                            "_token":token,
                                                            },
                                                            //dataType: "json",
                                                            cache:false,

                                                            success  : function(data) {
                                                            swal("تهانينا!",data , "success");
                                                            setTimeout(function() {
                                                            var href = "{{url('OfficeFiles')}}";
                                                            window.location.href = href;
                                                            },1000);
                                                            },
                                                            error: function(xhr, textStatus, thrownError){
                                                            // console.log(thrownError);
                                                            swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                                            }

                                                            });

                                                            }, 1000);
                                                            });
                                                            '>حذف</a>

                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#usr{{ $Single->DocID }}">صلاحيات الملف</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="usr{{ $Single->DocID }}" role="dialog">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">صلاحيات الملف</h4>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="nav nav-stacked">
                                                    <li>
                                                        <a>
                                                            @if($Single->for_client == '0')
                                                                <span class="text-red">العميل ليس لديه صلاحية لعرض الملف</span>
                                                                {{ Form::open(array('route'=>'DocUpdate','id'=>'')) }}
                                                                <input type="hidden" name="for_client" value="1">
                                                                <input type="hidden" name="DocID" value="{{ $Single->DocID }}">
                                                                <button class=" btn btn-info">منح</button>
                                                                {{ Form::close() }}
                                                            @elseif($Single->for_client == '1')
                                                                <span class="text-green">العميل لديه صلاحية</span>
                                                                {{ Form::open(array('route'=>'DocUpdate','id'=>'')) }}
                                                                <input type="hidden" name="for_client" value="0">
                                                                <input type="hidden" name="DocID" value="{{ $Single->DocID }}">
                                                                <button class="btn btn-danger">نزع</button>
                                                                {{ Form::close() }}
                                                            @endif



                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a>

                                                            @if($Single->for_eng == '0')
                                                                <span class="text-red">المهندس ليس لديه صلاحية لعرض الملف</span>
                                                                {{ Form::open(array('route'=>'DocUpdate','id'=>'')) }}
                                                                <input type="hidden" name="for_eng" value="1">
                                                                <input type="hidden" name="DocID" value="{{ $Single->DocID }}">
                                                                <button class=" btn btn-info">منح</button>
                                                                {{ Form::close() }}
                                                            @elseif($Single->for_eng == '1')
                                                                <span class="text-green">المهندس لديه صلاحية</span>
                                                                {{ Form::open(array('route'=>'DocUpdate','id'=>'')) }}
                                                                <input type="hidden" name="for_eng" value="0">
                                                                <input type="hidden" name="DocID" value="{{ $Single->DocID }}">
                                                                <button class="btn btn-danger">نزع</button>
                                                                {{ Form::close() }}
                                                            @endif

                                                        </a>
                                                    </li>
                                                </ul>
                                                {{ Form::open(array('route'=>'AgentsNames.store','id'=>'Addnch333')) }}
                                                {{--<div class="form-group">
                                                    <label>مسمي العملاء</label>
                                                    <input type="text" name="Agnames" class="form-control" placeholder="مسمي العميل">

                                                </div>
                                                <button id="Branchs" class="btn btn-success">اضافة</button>--}}
                                                {{ Form::close() }}

                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="box-footer">

                </div>
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="modal fade" id="Modal2222" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">اضافة مستند جديد للمكتب</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="AddCon" method="POST" action="{{ route('Documents.store') }}" enctype="multipart/form-data" >


                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label">اسم المستند </label>
                            <div class="col-sm-8">
                                <input type="text" name="DocName" class="form-control " id="DocName" placeholder="اسم المستند" style="margin-bottom: 9px;" required="required">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="Stage" class="col-sm-4 control-label">رمز المشروع </label>
                            <div class="col-sm-8">
                                <?php $pro = App\Models\ActivateFile::all(); ?>
                                <select name="projectID" class="form-control select2" id="projectID"  style="margin-bottom: 9px; width: 100%" required="required">
                                    @foreach($pro as $item)
                                        <option value="{{ $item->Bennar }}">{{ $item->Bennar }} - {{ $item->FileCode }}</option>
                                    @endforeach
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
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> تحميل المستند
                                <input type="file" name="Docs" id="file1" required="required" onchange="uploadFile()">
                            </div>
                        </div>
                        <button id="Consend" class="btn btn-success">حفظ</button>
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
        /********************************************************************/
        /********************************************************************/
        $('#Consend').click(function () {

            $( "#AddCon" ).on( "submit", function( event ) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                event.preventDefault();

                var myForm = document.getElementById('AddCon');
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
                        $("#AddCon").trigger("reset");
                        setTimeout(function() {
                            var href = "{{url('OfficeFiles')}}";
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
