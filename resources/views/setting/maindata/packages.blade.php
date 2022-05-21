@extends('index')
@section('content')

    <section class="content-header">
        <div class="">
            <h3>
                الاعدادات
                <small>البيانات الاساسية</small>
            </h3>
            <ol class="breadcrumb">
                <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                <li class="active"><a href="{{ url('MainSetting') }}">الاعدادات</a></li>
                <li class="active">البيانات الاساسية</li>
                <li class="active">الباقات </li>

            </ol>
        </div>
    </section>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">الباقات
                        <a href="#" class="uppercase btn btn-primary" data-toggle="modal" data-target="#Modal">اضافة باقة</a>
                    </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الباقة</th>
                            <th>رمز الباقة</th>
                            <th>الخدمات </th>
                            <th>تعديل </th>
                            <th>حذف </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Data as $Single)
                            <tr>
                                <td>{{ $Single->id }}</td>
                                <td>{{ $Single->packageName2 }}</td>
                                <td>{{ $Single->packageName }}</td>
                                <td><a class="fa fa-save btn btn-warning" id="ser{{$Single->id}}"> خدمات الباقة </a></td>
                                <td><i class="fa fa-edit btn btn-primary"></i></td>
                                <td><button id="{{ $Single->id }}" class="fa fa-trash-o btn btn-danger" data-id="{{$Single->id}}" data-token="{{csrf_token()}}" onclick='
                                            var audio = document.getElementById("audioError");
                                            audio.play();
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
                                            url : "deletePackages/"+id,
                                            data : {
                                            "":id,
                                            "_method":"DELETE",
                                            "_token":token,
                                            },
                                            //dataType: "json",
                                            cache:false,

                                            success  : function(data) {
                                            var audio = document.getElementById("audioSuccess");
                                            audio.play();
                                            swal("تهانينا!",data , "success");

                                            },
                                            error: function(xhr, textStatus, thrownError){
                                            // console.log(thrownError);
                                            swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                                            }

                                            });

                                            }, 1000);
                                            });
                                            '></button></td>
                            </tr>
                            <script>


                                $(document).ajaxStart(function () {
                                    $(".loa").show();
                                }).ajaxStop(function () {
                                    $(".loa").fadeOut();
                                    $("#Command").fadeIn(3000);
                                });

                                $("#ser{{$Single->id}}").click(function(){
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url: "{{url('/')}}/PackageDetails/{{$Single->id}}",
                                        type: "GET",
                                        success: function(data){
                                            $("#DocsByProplace").html(data);
                                            var audio = document.getElementById("audioSuccess");
                                            audio.play();
                                        },
                                        error: function(){
                                            console.log("No results for " + data + ".");
                                        }
                                    });
                                });
                            </script>

                        @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="Modal" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">اضافة باقة جديده </h4>
                                </div>
                                <div class="modal-body">
                                    {{ Form::open(array('route'=>'packages.store','id'=>'protepssend')) }}
                                    <div class="form-group">
                                        <label> اسم الباقة</label>
                                        <input type="text" name="packageName2" class="form-control" placeholder="اكتب اسم الباقة" required>

                                    </div>
                                    <div class="form-group">
                                        <label> رمز الباقة</label>
                                        <input type="text" name="packageName" class="form-control" placeholder="اكتب رمز الباقة" required>

                                    </div>
                                    <button id="Addproteps" class="btn btn-success">اضافة</button>
                                    {{ Form::close() }}

                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">الخدمات التي تحتويها الباقة</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
               <div id="DocsByProplace">
                   <ul class="products-list product-list-in-box">
                       <li class="item">
                           <a href="#" class="uppercase"> خدمات خيرعون الهندسية</a>
                       </li>
                       @if(($ser))
                           @foreach($ser as $Item)
                               <li class="item">
                                   <div class="product-img pull-right">
                                       <img src="{{ asset('dist/img/default-50x50.gif') }}" alt="Product Image">
                                   </div>
                                   <div class="product-info">
                                       <a href="#" class="product-title">{{ $Item->ServiceCode }}

                                       </a><br>
                                       <span class="product-description">{{ $Item->ServiceName }}</span>
                                   </div>
                               </li>
                           @endforeach
                       @else
                           <li class="item">
                               <a href="javascript:void(0)" class="uppercase">لا توج خدمات لهذه الباقة</a>
                           </li>
                       @endif

                   </ul>

               </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">

                </div>
                <!-- /.box-footer -->
            </div>
        </div>

    </div>

    <script>
        /********************************************************************/
        $('#Addproteps').click(function () {

            $( "#protepssend" ).on( "submit", function( event ) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                event.preventDefault();

                var data2    = $( this ).serialize();
                var headers = $('meta[name="csrf-token"]').attr('content');
                if (data2 === ""){
                    var audio = document.getElementById("audioError");
                    audio.play();
                    swal("خطأ", "اكتب اسم الباقة", "error");
                }else{
                    $.ajax({
                        type: 'POST',
                        url : $(this).attr('action'),
                        data : data2 ,
                        //dataType: 'json',
                        cache:false,

                        success  : function(data) {
                            var audio = document.getElementById("audioSuccess");
                            audio.play();
                            swal("تهانينا!",data , "success");

                        },
                        error: function(xhr, textStatus, thrownError){
                            var audio = document.getElementById("audioError");
                            audio.play();
                            // console.log(thrownError);
                            swal("للأسف!", "لم تتم الاضافة!", "error");
                        }

                    });
                    $("#protepssend").trigger("reset");
                }


            });

        });

        /********************************************************************/
    </script>
@endsection
