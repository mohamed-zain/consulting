@extends('layouts.index')
@section('content')
    <div class="col-md-12">
        <h3>
            المستخدمين
            <small>قائمة المستخدمين</small>
        </h3>

        <ol class="breadcrumb">
            <li><a href="{{url('ConsultingDashboard')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('Users') }}"><i class="fa fa-folder-open"></i>المستخدمين</a></li>
        </ol>
    </div>

    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">كل المستخدمين </h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المستخدم</th>
                            <th>البريد الالكتروني</th>
                            <th>الصلاحية</th>
                            <th>فعالية الحساب</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Data as $Single)
                            @php
                                $access = DB::table('sys_access')->where('UID',$Single->id)->first();
                            @endphp
                            <tr>
                                <td>{{ $Single->id }}</td>
                                <td>{{ $Single->name }}</td>
                                <td>{{ $Single->email }}</td>
                                <td>
                                    @if(isset($access->haveAccess))
                                        @if( $access->haveAccess == 1)
                                            <span class="badge bg-green">لديه صلاحية الدخول</span>

                                        @elseif($access->haveAccess == 0)
                                            <span class="badge bg-red">الحساب مجمد</span>
                                        @endif
                                    @else
                                        <span class="badge bg-yellow"> غير معروف</span>
                                    @endif
                                </td>

                                <td>
                                    <form action="{{route('UpdateAuth')}}"  id="{{ $Single->id }}" method="post">
                                        {{csrf_field()}}
                                        <div class="form-inline">
                                            <input type="hidden" id="UID" name="UID" value="{{$Single->id}}">
                                            <select class="form-control select2" id="{{$Single->id}}" name="Level" style="width: 50%">
                                                <option value="">---أختر إجراء---</option>
                                                @if(isset($access->haveAccess))
                                                    @if($access->haveAccess == 1)
                                                        <option value="0">تجميد الحساب</option>
                                                    @elseif($access->haveAccess == 0)
                                                        <option value="1">تفعيل الحساب</option>
                                                    @endif
                                                @else
                                                    <option value="2"> ydv luv,t</option>
                                                @endif
                                            </select>
                                            <button type="submit" class="btn bg-navy margin">حفظ</button>
                                        </div>
                                    </form>
                                </td>

                            </tr>

                            <script>
                                /********************************************************************/
                                /********************************************************************/
                                $('#{{$Single->id}}').change(function (event) {


                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });


                                    event.preventDefault();

                                    var data2    = $( '#{{ $Single->id }}' ).serialize();
                                    var headers = $('meta[name="csrf-token"]').attr('content');

                                    $.ajax({
                                        type: 'POST',
                                        url : "UpdateAuth",
                                        data : data2,
                                        //dataType: 'json',
                                        cache:false,

                                        success  : function(data) {
                                            swal("تهانينا!",data , "success");
                                            $.ajax({
                                                url: "UsersPrivileges",
                                                type: "GET",
                                                success: function(data){
                                                    $("#Command").html(data)

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
                                    $("#AddBranch").trigger("reset");



                                });

                                /*********************************************************************/
                            </script>
                        @endforeach



                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">

            </div>
        </div>
        <!-- /. box -->
    </div>
    <script>
        $(".select2").select2();
        $("#example1").DataTable();
    </script>
@endsection