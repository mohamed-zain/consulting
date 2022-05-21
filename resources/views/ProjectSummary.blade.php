<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li  class="active"><a href="#tab_2" data-toggle="tab">انجاز المشاريع</a></li>
                <li><a href="#tab_1" data-toggle="tab">المخططات المعتمدة</a></li>
                <li><a href="#tab_3" data-toggle="tab">المخططات الغير معتمدة</a></li>
                <li><a href="#tab_4" data-toggle="tab">في انتظار التعميد</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane " id="tab_1">
                    <table id="example4" class="table table-bordered table-striped table-responsive example">
                        <thead>
                        <tr>

                            <th> االحالة</th>
                            <th>االمهندس </th>
                            <th>المشروع </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pro_aprove = \App\Models\ActivateFile::join('documents','documents.projectID','=','activate_files.Bennar')
                            ->join('users','users.id','=','documents.Usr_id')
                            ->where('documents.reject_accept','2')->get();
                        ?>
                        @foreach($pro_aprove as $Single)
                            <tr>
                                <td>تم اعتماد   {{ $Single->DocName }} </td>
                                <td>{{ $Single->name }}</td>
                                <td>{{ $Single->FileCode }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div><!-- /.tab-pane -->
                <div class="tab-pane active" id="tab_2">
                    <table id="example1" class="table table-bordered table-striped table-responsive example">
                        <thead>
                        <tr>
                            <th>العميل</th>
                            <th>البينار</th>
                            <th>الجوال</th>
                            <th> رمز المشروع</th>
                            <th>E0 </th>
                            <th>E1 </th>
                            <th>E2 </th>
                            <th>E3 </th>
                            <th>E4 </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pro_aprove = \App\Models\ActivateFile::where('Status','Approved')->get();
                        //->join('users','users.id','=','documents.Usr_id')->get();
                        //->where('documents.reject_accept','1')->get();
                        // $users = \App\Models\User::where('roll','AdmissionEmp')->get()
                        ?>
                        @foreach($pro_aprove as $Single)
                            <?php
                            $ps0 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E0')->first();
                            $ps1 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E1')->first();
                            $ps2 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E2')->first();
                            $ps3 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E3')->first();
                            $ps4 = \App\Models\ProjectServices::where('Bennar_Code',$Single->Bennar)->where('ServiceCode','E4')->first();

                            $eng0 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E0')->first();
                            $eng1 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E1')->first();
                            $eng2 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E2')->first();
                            $eng3 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E3')->first();
                            $eng4 = \App\Models\Tasks::where('Bennar_Code','=',$Single->Bennar)->where('Mission','=','E4')->first();
                            //dd($eng0->EmpID);
                            ?>
                            <tr>
                                <td>{{ $Single->Name }}</td>
                                <td>{{ $Single->Bennar }}</td>
                                <td style="direction: initial"><span>{{ $Single->Phone }}</span></td>
                                <td><a href="{{ url('ProProduction') }}/{{ $Single->Bennar }}">{{ $Single->FileCode }}</a></td>
                                <td>
                                    @if($ps0->status == 'yes')
                                        <small class="label label-success"><i class="fa fa-fw fa-check"></i> </small>
                                    @else
                                        <small class="label label-danger"><i class="fa fa-fw fa-close"></i> </small>
                                    @endif
                                    <br>
                                    <br>
                                    <small class="" style="font-size: 40%">
                                        @if(empty($eng0))
                                            none
                                        @else
                                            <?php $na0 = \App\Models\User::where('id',$eng0->EmpID)->first() ?>

                                            {{ $na0->name }}
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    @if($ps1->status == 'yes')
                                        <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                    @else
                                        <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                    @endif
                                    <br>
                                    <br>
                                    <small class="" style="font-size: 40%">
                                        @if(empty($eng1))
                                            none
                                        @else
                                            <?php $na1 = \App\Models\User::where('id',$eng1->EmpID)->first() ?>

                                            {{ $na1->name }}
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    @if($ps2->status == 'yes')
                                        <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                    @else
                                        <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                    @endif
                                    <br>
                                    <br>
                                    <small class="" style="font-size: 40%">
                                        @if(empty($eng2))
                                            none
                                        @else
                                            <?php $na2 = \App\Models\User::where('id',$eng2->EmpID)->first() ?>

                                            {{ $na2->name }}
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    @if($ps3->status == 'yes')
                                        <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                    @else
                                        <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                    @endif
                                    <br>
                                    <br>
                                    <small class="" style="font-size: 40%">
                                        @if(empty($eng3))
                                            none
                                        @else
                                            <?php $na3 = \App\Models\User::where('id',$eng3->EmpID)->first() ?>

                                            {{ $na3->name }}
                                        @endif
                                    </small>
                                </td>
                                <td>
                                    @if($ps4->status == 'yes')
                                        <span class="label label-success"><i class="fa fa-fw fa-check"></i> </span>
                                    @else
                                        <span class="label label-danger"><i class="fa fa-fw fa-close"></i> </span>
                                    @endif
                                    <br>
                                    <br>
                                    <small class="" style="font-size: 40%">
                                        @if(empty($eng4))
                                            none
                                        @else
                                            <?php $na4 = \App\Models\User::where('id',$eng4->EmpID)->first() ?>

                                            {{ $na4->name }}
                                        @endif
                                    </small>
                                </td>

                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <?php
                    $reject = \App\Models\Documents::join('users','users.id','=','documents.Usr_id')
                        ->join('activate_files','activate_files.Bennar','=','documents.projectID')
                        ->where('documents.mission','!=',null)
                        ->where('documents.reject_accept','1')
                        ->get()
                    ?>
                    <table id="example5" class="table table-bordered table-striped table-responsive example">
                        <thead>
                        <tr>
                            <th>المشروع</th>
                            <th> المهندس</th>
                            <th>المهمة </th>
                            <th>الملف </th>
                            <th>سبب الرفض </th>
                            <th>التاريخ </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reject as $item)
                            <tr>
                                <td>{{ $item->FileCode }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->mission }}</td>
                                <td><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank">عرض</a> </td>
                                <td>{{ $item->reject_reason }}</td>
                                <td>{{ $item->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_4">
                    <?php
                    $reject = \App\Models\Documents::join('users','users.id','=','documents.Usr_id')
                        ->join('activate_files','activate_files.Bennar','=','documents.projectID')
                        ->where('documents.mission','=','E0')
                        ->where('documents.reject_accept','0')
                        ->orderBy('documents.created_at','desc')
                        ->get()
                    ?>
                    <table id="example5" class="table table-bordered table-striped table-responsive ">
                        <thead>
                        <tr>
                            <th>المشروع</th>
                            <th> المهندس</th>
                            <th>المهمة </th>
                            <th>الملف </th>
                            <th> الحالة </th>
                            <th>التاريخ </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reject as $item)
                            <tr>
                                <td>{{ $item->FileCode }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->mission }}</td>
                                <td><a href="{{ url('storage/app/public') }}/{{ $item->Docs }}" target="_blank">عرض</a> </td>
                                <td><span class="label label-warning">في انتظار التعميد</span></td>
                                <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
    </div><!-- /.col -->
</div>
@push('scripts')
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>

    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    @livewireScripts
    <script type="text/javascript">
        $(function () {
            $("#example1").DataTable();
            $("#example3").DataTable();
            $("#example4").DataTable();
            $("#example5").DataTable();
            $("#example6").DataTable();
            $("#example7").DataTable();
            $(".example").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endpush
