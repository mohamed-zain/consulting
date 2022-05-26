 @extends('index')
  @section('content')

   <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12" >
         
          <h2 class="page-header">
            
          </h2>
 <div id="topdiv" > 
  <img src="/dist/img/contract.PNG" style="width: 100%"></div>
          <div class="whitespace">
            {{ strip_tags($Contract) }}
            <div class="row">
              <p style="margin-left: 150px;margin-right: 150px;"><span class="pull-right">توقيع الطرف الاول</span><span class="pull-left">توقيع الطرف الثاني</span></p>
            
            </div>
            
          </div>


        
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-lg-12 invoice-col">
           
        <!-- /.col -->
      </div>
    </div>
      <!-- /.row -->
      <div class="row no-print">
        <div class="col-xs-12">
           <a href="#" onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> طباعة</a>
         
        </div>
      </div>
    </section>
    @endsection