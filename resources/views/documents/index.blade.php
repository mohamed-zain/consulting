@extends('layouts.index')
@section('content')
    <style>
        .bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body{
            background-color: #4eadaf !important;
        }
        .mailbox-attachments{
            float: right;
        }
        .box-header>.box-tools{
            right: 20px !important;
        }
    </style>
    <script>

        function getMission(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var your_selected_value = $('#projectID').val();
            $.ajax({
                url: "{{url('getMission')}}",
                type: "POST",
                data:{ bennar : your_selected_value},
                success: function(data){
                    $("#warpMission").html(data);
                },
                error: function(){
                    console.log("No results for " + data + ".");
                }
            });

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
                    {{--
                                        <button data-toggle="modal" data-target="#Modal3333" class="btn btn-danger pull-left">إضافة ملف مهمة</button>
                    --}}
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="callout callout-warning col-lg-12">
                    <h4>مركز رفع الملفات لنظام مستندات المكتب!</h4>

                    <p>من هنا يمكن للاستشاري رفع الملفات المطلوبة في المشروع
                        الخاصة بالمشروع </p><p>(يشمل العقود والاتفاقيات ورخص البناء وتقارير الاشراف وشهادات الإشغال)</p>

                </div>


            </div>


            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div id="pls">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>

                    <div class="box-tools pull-right">
                        <div class="has-feedback">
                            <form action="{{ url('DocsByPro') }}" method="GET" class="form form-inline" id="search" name="search" >
                                @csrf
                                <select name="search_text" class="form-control select2" id="search778" onchange="submit();" >
                                    @foreach($activeFi as $item)
                                        <option value="{{ $item->Bennar }}">{{ $item->Bennar }} - {{ $item->FileCode }}</option>
                                    @endforeach
                                </select>

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
                                    <li style="width: 120px">
                                        <span class="mailbox-attachment-icon" style="font-size:30px"><a href="{{ url('DocsByPro') }}?search_text={{$Single->Bennar}}" id="{{$Single->Bennar}}"><i class="fa fa-folder-open" style="font-weight: 0px !important;"></i></a></span>
                                        <div class="mailbox-attachment-info" style="font-size: 10px">
                                            <a href="#" data-toggle="modal" data-target="#{{$Single->Bennar}}" class="mailbox-attachment-name">

                                                {{Str::limit($Single->FileCode, 20)}}
                                            </a>
                                            <span class="mailbox-attachment-size" style="font-size: 8px">
                         رقم المشروع  {{$Single->Bennar}}
                                            </span>
                                        </div>
                                    </li>

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


    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">اخر الملفات المضافة
                </h3>


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
                                <th>صلاحية المهندس</th>
                                <th>صلاحية العميل</th>
                                <th>خيارات</th>
                                <th>التاريخ</th>

                            </tr>
                            </thead>
                            <tbody >




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


    {{--<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /********************************************************************/
        /********************************************************************/
        $("#fdcasfdasfasc").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var your_value = $('#search778').val();
            $.ajax({
                url: "{{url('/')}}/DocsByPro/"+your_value,
                type: "GET",
                success: function(data){
                    $("#DocsByProplace").html(data);
                },
                error: function(){
                    console.log("No results for " + data + ".");
                }
            });
        });

        /*********************************************************************/
    </script>--}}
@endsection
