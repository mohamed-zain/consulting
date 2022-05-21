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
                    <li class="active"><a href="#"> العروض والتخفيضات</a></li>
                </ol>
            </div>
        </section>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">روابط التنقل</h3>
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    @include('SUPPORT.sub_aside')
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-9">

        </div>
    </div>

@endsection
