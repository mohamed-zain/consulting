<ul class="products-list product-list-in-box">
    <li class="item">
        <a href="#" class="uppercase btn btn-warning"  data-toggle="modal" data-target="#AddServ">اضافة خدمه للباقة</a>
    </li>
    @if(($pservices))
@foreach($pservices as $Item)
    <li class="item">
        <div class="product-img pull-right">
            <img src="{{ asset('dist/img/default-50x50.gif') }}" alt="Product Image">
        </div>
        <div class="product-info">
            <a href="#" class="product-title">{{ $Item->ServiceCode }}
                <span class="label label-danger pull-left" id="{{ $Item->DELID }}" class="btn btn-danger" data-id="{{$Item->DELID}}" data-token="{{csrf_token()}}" onclick='
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
                        var id = $("#{{ $Item->DELID }}").data("id");
                        var token = $("#{{ $Item->DELID }}").data("token");
                        $.ajax({
                        type: "GET",
                        url : "deletePackagesServ/"+id,
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
                        $.ajax({
                        url: "{{url('/')}}/PackageDetails/{{$id}}",
                        type: "GET",
                        success: function(data){
                        $("#DocsByProplace").html(data);
                        },
                        error: function(){
                        console.log("No results for " + data + ".");
                        }
                        });

                        },
                        error: function(xhr, textStatus, thrownError){
                        // console.log(thrownError);
                        swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                        }

                        });

                        }, 1000);
                        });
                        '>حذف</span>
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

                            <div class="modal fade" id="AddServ" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">اضافة خدمة جديده </h4>
                                        </div>
                                        <div class="modal-body">
                                            {{ Form::open(array('route'=>'Addserv','id'=>'servsend')) }}
                                            <input type="hidden" name="PID" value="{{ $id }}">
                                            <div class="form-group">
                                                <label> اسم الخدمه</label>

                                                {{ Form::select('SID',\App\Models\Services::pluck('ServiceCode','id'),null,['class'=>'form-control select2','style'=>'width:100%']) }}
                                            </div>
                                            <button id="Addservs" class="btn btn-success">اضافة</button>
                                            {{ Form::close() }}

                                        </div>
                                        <div class="modal-footer">
                                            <script>
                                                /********************************************************************/
                                                $('#Addservs').click(function () {

                                                    $( "#servsend" ).on( "submit", function( event ) {

                                                        $.ajaxSetup({
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                        });


                                                        event.preventDefault();

                                                        var data2    = $( this ).serialize();
                                                        var headers = $('meta[name="csrf-token"]').attr('content');

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
                                                                    $.ajax({
                                                                        url: "{{url('/')}}/PackageDetails/{{$id}}",
                                                                        type: "GET",
                                                                        success: function(data){
                                                                            $("#DocsByProplace").html(data);
                                                                        },
                                                                        error: function(){
                                                                            console.log("No results for " + data + ".");
                                                                        }
                                                                    });

                                                                },
                                                                error: function(xhr, textStatus, thrownError){
                                                                    var audio = document.getElementById("audioError");
                                                                    audio.play();
                                                                    // console.log(thrownError);
                                                                    swal("للأسف!", "لم تتم الاضافة!", "error");
                                                                }

                                                            });
                                                            $("#servsend").trigger("reset");



                                                    });

                                                });

                                                /********************************************************************/
                                            </script>
                                            <script>
                                                $(".select2").select2();
                                                </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
