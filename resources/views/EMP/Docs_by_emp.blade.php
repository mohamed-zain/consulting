<div class="row">

    <div class="col-md-12">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#tab_1-1" data-toggle="tab">المخططات</a></li>
                <li><a href="#tab_2-2" data-toggle="tab">تقارير الكميات</a></li>
                <li><a href="#tab_3-2" data-toggle="tab">التوصيات</a></li>
                <li><a href="#tab_3-4" data-toggle="tab">اخري</a></li>

            </ul>
            <div class="tab-content" style="min-height: 400px">
                <div class="tab-pane active" id="tab_1-1">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th> المشروع </th>
                            <th> اسم الملف</th>
                            <th> حالة الملف</th>
                            <th> المهمة </th>
                            <th> اجراء</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data1 as $item)
                            <tr>
                                <td>{{ $item->FileCode }}</td>
                                <td>{{ $item->DocName }}</td>
                                <td>
                                    @if($item->mission == 'E0')
                                        @if($item->reject_accept == '0')
                                            <span style="color: #b06d0f">في الانتظار</span>
                                        @elseif($item->reject_accept == '1')
                                            <span style="color: red">مرفوض</span>
                                        @elseif($item->reject_accept == '2')
                                            <span style="color: green">مقبول</span>

                                        @endif
                                    @else
                                        <span  class="label label-danger">لا يحتاج موافقة العميل</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->mission == 'E0')
                                        <span class="label label-danger">E0</span>
                                    @elseif($item->mission == 'E1')
                                        <span class="label label-primary"> E1</span>
                                    @elseif($item->mission == 'E2')
                                        <span  class="label label-success">E2</span>
                                    @elseif($item->mission == 'E3')
                                        <span  class="label label-dark">E3</span>
                                    @elseif($item->mission == 'E4')
                                        <span class="label label-pink">E4</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">إختر إجراء
                                            <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" > تعديل</a></li>
                                            <li><a href="{{ url('storage/app/public') }}/{{ $item->Docs  }}"  target="_blank"> عرض</a></li>
                                            {{-- <li><a href="#"  data-toggle="modal" data-target="#TRAN{{ $single['number'] }}">تحويل لمهندس آخر</a></li>--}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2-2">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th> المشروع </th>
                            <th> اسم الملف</th>
                            <th> حالة الملف</th>
                            <th> المهمة </th>
                            <th> اجراء</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data2 as $item)
                            <tr>
                                <td>{{ $item->FileCode }}</td>
                                <td>{{ $item->DocName }}</td>
                                <td>
                                    @if($item->mission == 'E0')
                                        @if($item->reject_accept == '0')
                                            <span style="color: blue">في الانتظار</span>
                                        @elseif($item->reject_accept == '1')
                                            <span style="color: red">مرفوض</span>
                                        @elseif($item->reject_accept == '2')
                                            <span style="color: green">مقبول</span>

                                        @endif
                                    @else
                                        <span  class="label label-danger">لا يحتاج موافقة العميل</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->mission == 'E0')
                                        <span class="label label-danger">E0</span>
                                    @elseif($item->mission == 'E1')
                                        <span class="label label-primary"> E1</span>
                                    @elseif($item->mission == 'E2')
                                        <span  class="label label-success">E2</span>
                                    @elseif($item->mission == 'E3')
                                        <span  class="label label-dark">E3</span>
                                    @elseif($item->mission == 'E4')
                                        <span class="label label-pink">E4</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">إختر إجراء
                                            <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#"> تعديل</a></li>
                                            <li><a href="{{ url('storage/app/public') }}/{{ $item->Docs  }}"  target="_blank"> عرض</a></li>
                                            {{-- <li><a href="#"  data-toggle="modal" data-target="#TRAN{{ $single['number'] }}">تحويل لمهندس آخر</a></li>--}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3-2">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th> المشروع </th>
                            <th> اسم الملف</th>
                            <th> حالة الملف</th>
                            <th> المهمة </th>
                            <th> اجراء</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data3 as $item)
                            <tr>
                                <td>{{ $item->FileCode }}</td>
                                <td>{{ $item->DocName }}</td>
                                <td>
                                    @if($item->mission == 'E0')
                                        @if($item->reject_accept == '0')
                                            <span style="color: blue">في الانتظار</span>
                                        @elseif($item->reject_accept == '1')
                                            <span style="color: red">مرفوض</span>
                                        @elseif($item->reject_accept == '2')
                                            <span style="color: green">مقبول</span>

                                        @endif
                                    @else
                                        <span  class="label label-danger">لا يحتاج موافقة العميل</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->mission == 'E0')
                                        <span class="label label-danger">E0</span>
                                    @elseif($item->mission == 'E1')
                                        <span class="label label-primary"> E1</span>
                                    @elseif($item->mission == 'E2')
                                        <span  class="label label-success">E2</span>
                                    @elseif($item->mission == 'E3')
                                        <span  class="label label-dark">E3</span>
                                    @elseif($item->mission == 'E4')
                                        <span class="label label-pink">E4</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">إختر إجراء
                                            <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#"> تعديل</a></li>
                                            <li><a href="{{ url('storage/app/public') }}/{{ $item->Docs  }}"  target="_blank"> عرض</a></li>
                                            {{-- <li><a href="#"  data-toggle="modal" data-target="#TRAN{{ $single['number'] }}">تحويل لمهندس آخر</a></li>--}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="tab_3-4">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                            <th> المشروع </th>
                            <th> اسم الملف</th>
                            <th>حالة الملف</th>
                            <th> المهمة </th>
                            <th> اجراء</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data4 as $item)
                            <tr>
                                <td>{{ $item->FileCode }}</td>
                                <td>{{ $item->DocName }}</td>
                                <td>
                                    @if($item->mission == 'E0')
                                    @if($item->reject_accept == '0')
                                        <span style="color: blue">في الانتظار</span>
                                    @elseif($item->reject_accept == '1')
                                        <span style="color: red">مرفوض</span>
                                    @elseif($item->reject_accept == '2')
                                        <span style="color: green">مقبول</span>

                                    @endif
                                    @else
                                        <span  class="label label-danger">لا يحتاج موافقة العميل</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->mission == 'E0')
                                        <span class="label label-danger">E0</span>
                                    @elseif($item->mission == 'E1')
                                        <span class="label label-primary"> E1</span>
                                    @elseif($item->mission == 'E2')
                                        <span  class="label label-success">E2</span>
                                    @elseif($item->mission == 'E3')
                                        <span  class="label label-dark">E3</span>
                                    @elseif($item->mission == 'E4')
                                        <span class="label label-pink">E4</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">إختر إجراء
                                            <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" > تعديل</a></li>
                                            <li><a href="{{ url('storage/app/public') }}/{{ $item->Docs  }}"  target="_blank"> عرض</a></li>
                                            {{-- <li><a href="#"  data-toggle="modal" data-target="#TRAN{{ $single['number'] }}">تحويل لمهندس آخر</a></li>--}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
    </div><!-- /.col -->
</div>
