 @extends('index')
@section('content')

   <div class="row">
  <section class="content-header">
        <div class="col-md-12">
          

          <ol class="breadcrumb" >
            <li><a href="{{url('MainPort')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('Projects') }}"><i class="fa fa-folder-open"></i>ملفات المشروع</a></li>
           
          </ol>
          </div>
           
          
        </section>
</div>
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">ملفات المشروع</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
   <div class="row">
        <div class="col-xs-12 table-responsive" >
         <ul class="mailbox-attachments clearfix">
                @foreach($ProjectsFile as $Single )
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                  <div class="mailbox-attachment-info">
                    <a href="{{url('')}}/{{$Single->Docs}}" class="mailbox-attachment-name" target="_blank">
                        <i class="fa fa-paperclip"></i>
                        {{$Single->DocName}}
                    </a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
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


 @endsection