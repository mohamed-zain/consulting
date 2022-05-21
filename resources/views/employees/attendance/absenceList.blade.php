@extends('index')

@section('content')
    <div class="">
        <section class="content-header">
            <div class="">

                <ol class="breadcrumb">
                    <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                    <li class="active"> قوائم الغياب </li>

                </ol>
            </div>
        </section>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <button class="btn bg-maroon btn-flat margin">الغياب اليوم - {{ date('F d, Y', strtotime(\Carbon\Carbon::today())) }}</button>
        </div>
        <div class="col-lg-3">
            <button class="btn bg-purple btn-flat margin">غياب الامس {{ date('F d, Y', strtotime(\Carbon\Carbon::yesterday())) }} </button>
        </div>
        <div class="col-lg-2">
            <button class="btn bg-olive btn-flat margin">غياب الاسبوع الماضي</button>
        </div>
        <div class="col-lg-2">
            <button class="btn bg-orange btn-flat margin">الغياب الشهر الماضي</button>
        </div>
        <div class="col-lg-2">
            <button class="btn bg-teal btn-flat margin">اختر التاريخ</button>
        </div>
    </div>

    <div id="puthere">

    </div>

@endsection