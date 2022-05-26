 @extends('index')
  @section('content')
  @foreach($Data as $Single)
   <section class="invoice" >
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
         
          <h2 class="page-header">
            <i class="fa fa-globe"></i> بيانات المشروع رقم , <a href="#">{{ $Single->ProID }}</a>
            - مرحلة المشروع الحالية - <a href="#">{{ $Single->Stage }}</a> 
            - حالة المشروع <a href="#">{{ $Single->State }}</a>
          </h2>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info" style="padding-right: 30px;">
        <div class="col-sm-4 invoice-col">
          
         
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
         <table class="table table-striped" >
            <thead>
            </thead>
            <tbody>
              <th colspan="2" style="align-items: center;" align="center">بيانات المشروع</th> 
            <tr>
              <td>اسم المشروع</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->ProName }}
                </div>
              </td>
              
            </tr>
            <tr>
              <td>نوع المشروع</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->ProType }}
                </div>
              </td>
              
            </tr>
            <tr>
              <td>اسم العميل</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->AgentName }}
                </div>
              </td>
              
            </tr>
            <tr>
              <td>مدير المشروع</td>
              <td>
                <div class="col-sm-10">
                   {{ $Single->NameAR }}
                </div>
              </td>
              
            </tr>
            <tr>
              <td>وصف المشروع</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->ProDesc }}
                 </div>
              </td>
              
            </tr>

            <tr>
              <td>المده الزمنية للمشروع</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->Duration }}
                </div>
              </td>
              
            </tr>
            <tr>
              <td>حالة المشروع</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->State }}
                </div>
              </td>
              
            </tr>
            <tr>
              <td>المرحلة الحالية للمشروع</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->Stage }}
                </div>
              </td>
              
            </tr>
            <tr>
              <td>تاريخ التسجيل</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->created_at }}
                </div>
              </td>
              
            </tr>
            </tbody>
            
          </table>
        </div>
        <!-- /.col -->
      </div>
          <div class="row">
        <div class="col-xs-12 table-responsive" >
          <table class="table table-striped" >
             
            <thead>
            </thead>
            <tbody>
     <th colspan="2" style="align-items: center;" align="center">بيانات العميل</th> 

              <tr>
              <td>اسم العميل</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->AgentName }}
                </div>
              </td>
              
            </tr>
            
            <tr>
              <td>مدينة العميل</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->AgentCity }}
                </div>
              </td>
              
            </tr>
          
            <tr>
              <td>عنوان العميل</td>
              <td>
                <div class="col-sm-10">
                    {{ $Single->AgentAddress }}
                 </div>
              </td>
              
            </tr>
            <tr>
              <td>رقم جوال العميل</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->AgentMob }}
                 </div>
              </td>
              
            </tr>
            <tr>
              <td>هاتف العميل</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->AgentPhone }}
                 </div>
              </td>
              
            </tr>
            <tr>
              <td>البريد الالكتروني</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->AgentEmail }}
                 </div>
              </td>
              
            </tr>
            <tr>
              <td>عمر العميل</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->AgentAge }}
                 </div>
              </td>
              
            </tr>
           
            <tr>
              <td> جنسية العميل</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->AgentNation }}
                 </div>
              </td>
              
            </tr>
            <tr>
              <td>الوظيفة</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->AgentJob }}
                 </div>
              </td>
              
            </tr>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
       <div class="row">
        <div class="col-xs-12 table-responsive" >
         <table class="table table-striped" >
             
            <thead>
            </thead>
            <tbody>
               <th colspan="2" style="align-items: center;" align="center">بيانات المشروع المالية</th> 
            <tr>
              <td>قيمة العقد</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->Price }} ريال
                </div>
              </td>
              
            </tr>
            <tr>
              <td>المبلغ المدفوع</td>
              <td>
                <div class="col-sm-10">
                  {{ $Single->Cash }} ريال
                </div>
              </td>
              
            </tr>
          
            <tr>
              <td>المبلغ المتبقي</td>
              <td>
                <div class="col-sm-10">
                    {{ $Single->Price - $Single->Cash }} ريال
                 </div>
              </td>
              
            </tr>
            
            

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
 @endforeach
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="#" onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> طباعة</a>
         
        </div>
      </div>
    </section>
    @endsection