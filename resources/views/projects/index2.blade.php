
@extends('layouts.index')
@section('content')
<style>
    th, td {
        text-align: center;
    }
</style>

<div class="">
  <section class="content-header">
        <div class="">
          <h3>
            لوحة التحكم
            <small>المشاريع</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">ادارة المشاريع</li>
            <li class="active">المشاريع</li>
          </ol>
          </div>
        </section>
</div>

<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">قائمة المشاريع</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
            <div class="" style="margin-bottom: 20px">
            </div>
            <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                    <th>رقم الملف</th>
                    <th> رقم البينار</th>
                    <th>المدينة</th>
                    <th>حالة المشروع</th>
                    <th>خيارات</th>

                </tr>
                </thead>
                <tbody>
                @foreach($Data as $item)
                    <tr>
                        <td><a href="{{url('ProjectDetails')}}/{{ $item->Bennar }}">{{ $item->FileCode }}</a></td>
                        <td><a href="{{url('ProjectDetails')}}/{{ $item->Bennar }}">{{ $item->Bennar }}</a></td>
                        <td>{{ $item->City }}</td>
                        <td>
                            @if( $item->Status == '1')
                                <span class="badge bg-green">{{ $item->StatusName }}</span>
                            @elseif($item->Status == '2')
                                <span class="badge bg-yellow "> {{ $item->StatusName }}</span>
                            @elseif($item->Status == '3')
                                <span class="badge bg-purple "> {{ $item->StatusName }}</span>
                            @elseif($item->Status == '4')
                                <span class="badge bg-blue "> {{ $item->StatusName }}</span>
                            @elseif($item->Status == '5')
                                <span class="badge bg-pink "> {{ $item->StatusName }}</span>
                            @elseif($item->Status == '6')
                                <span class="badge bg-navy "> {{ $item->StatusName }}</span>
                            @elseif($item->Status == '7')
                                <span class="badge bg-red "> {{ $item->StatusName }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> خيارات
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li> <a class="text-green " href="{{url('ProjectDetails')}}/{{ $item->Bennar }}" target="_blank"> تفاصيل المشروع </a></li>
                                    <li> <a class="text-blue" href="#"   data-toggle="modal" data-target="#Modal3{{$item->Bennar}}"> تغيير حالة المشروع</a></li>
                                    <li><a class="text-red" href="{{ url('DocsByPro') }}?search_text={{ $item->Bennar }}"> رفع الملفات  </a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="Modal3{{$item->Bennar}}" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">اعداد الحالة الحالية للمشروع {{ $item->FileCode }} </h4><span style="color: red"></span>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" method="POST" action="{{ route('UpdateStat') }}">
                                        <input type="hidden" name="Bennar" value="{{ $item->Bennar }}">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label for="State" class="col-sm-4 control-label">حالة المشروع الحالية</label>
                                            <div class="col-sm-8">
                                                {!! Form::select('stat',[
                                                       '1'=>'في الانتظار',
                                                       '3'=>'متوقف',
                                                       '2'=>'جاري العمل عليه',
                                                       ],null, ['class' => 'form-control  select2','style' => 'width:90%']) !!}
                                            </div>
                                        </div>
                                        <button id="registrationID" class="btn btn-success">حفظ</button>
                                    </form>

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
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

@endsection
