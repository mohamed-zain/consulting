
@extends('SUPPORT.layout')
@section('content')
    <div class="">
        <section class="content-header">
            <div class="">
                <h3>
                    الدعم الفني
                    <small> وادارة التطبيق</small>
                </h3>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> تطبيق خير عون</a></li>
                    <li class="active"><a href="#">الدعم الفني</a></li>
                </ol>
            </div>
        </section>
    </div>

    <div class="col-md-12">

        <div class="row" style="padding-right: 6%;">
            <a href="{{ url('app_package_data') }}" class="btn btn-app">
                <i class="fa fa-cubes" style="font-size: 55px;"></i> الباقات
            </a>
            <a href="{{url('app_services_data')}}"  class="btn btn-app">
                <i class="fa fa-id-card fa-2x" style="font-size: 55px;"></i>  الخدمات الهندسية
            </a>
            <a href="{{ url('app_services_data2') }}" class="btn btn-app">
                <i class="fa fa-snowflake" style="font-size: 55px;"></i>   الخدمات التجارية
            </a>
            <a href="{{ url('app_offers_data') }}" class="btn btn-app">
                <i class="fa fa-percentage" style="font-size: 55px;"></i>  عروض خير عون
            </a>
            <a href="{{ url('app_gallery_data') }}" class="btn btn-app">
                <i class="fa fa-star-of-life" style="font-size: 55px;"></i>      معرض الصور
            </a>
            <a href="{{ url('app_upgrade_requests_data') }}" class="btn btn-app">
                <i class="fa fa-truck-monster" style="font-size: 55px;"></i> طلبات تطوير الباقة
            </a>
        </div>



        <!-- /.box -->
    </div>

@endsection
