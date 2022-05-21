
@extends('layouts.index')
@section('content')
<div class="">
  <section class="content-header">
        <div class="">
          <h3>
            الاعدادات 
            <small>البيانات الاساسية</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="#">الاعدادات</a></li>
            <li class="active">البيانات الاساسية</li>
          </ol>
          </div>
        </section>
</div>
     
        <div class="col-md-12">

         <div class="row" style="padding-right: 6%;">
             <a href="{{ url('branchs') }}" class="btn btn-app" >
                 <i class="fa fa-code-branch fa-x2" style="font-size: 55px;"></i> فروع المكتب
             </a>
              <a href="{{url('AgentsNames')}}"  class="btn btn-app">
                <i class="fa fa-id-card fa-2x" style="font-size: 55px;"></i> مسميات العملاء
              </a>
             <a href="{{ url('ProjectsType') }}" class="btn btn-app">
                 <i class="fa fa-snowflake" style="font-size: 55px;"></i>  انواع المشاريع
             </a>
              <a href="{{ url('projectsSteps') }}" class="btn btn-app">
                <i class="fa fa-percentage" style="font-size: 55px;"></i> مراحل المشروع
              </a>
             <a href="{{ url('StepsTerms') }}" class="btn btn-app">
                 <i class="fa fa-star-of-life" style="font-size: 55px;"></i>   بنود  مراحل المشروع
             </a>
             <a href="{{ url('packages') }}" class="btn btn-app">
                 <i class="fa fa-cubes" style="font-size: 55px;"></i> الباقات
             </a>
             <a href="{{ url('SiteVisitCategory') }}" class="btn btn-app">
                 <i class="fa fa-truck-monster" style="font-size: 55px;"></i> الزيارات الفنية
             </a>
             </div>
       
              
      
  <!-- /.box -->
</div> 
@endsection
 