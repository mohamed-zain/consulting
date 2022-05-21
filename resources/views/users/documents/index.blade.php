@extends('users.layout')
@section('content')

   <section class="content-header">
        <div class="container">
          <h3>
            المشاريع
            <small>الملفات النهائية</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{ url('MainPort') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">الملفات النهائية</li>

          </ol>
          </div>
        </section>
   <div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">ملفات المشاريع النهائية</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
  <div class="callout callout-warning col-lg-12">
                <h4>مركز رفع الملفات النهائية لنظام ارشيف المكتب!</h4>

                <p>من هنا يمكن للادارة او المهندسين بإضافة اي ملف
                خاص بمشروع معين </p><p>(خطابات صادرة - خطابات وارده - عروض الاسعار - او ااي مستند له اهمية للشركة يمكن حفظه لمراجعته لاحقا)</p>

  </div>


    </div>


    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">قائمة الملفات النهائية للمشاريع
</h3>
<button data-toggle="modal" data-target="#FinalDoc" class="btn btn-info pull-left">إضافة ملفات نهائية</button>

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
           <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>رقم الملف</th>
                  <th>اسم الملف</th>
                  <th>ملاحظات</th>
                  <th>عرض</th>
                  <th>التاريخ</th>


                </tr>
                </thead>
                <tbody id="results">

                  @foreach($Data as $Single)
                <tr>
                  <td>{{ $Single->DocID }}</td>
                  <td>{{ $Single->DocName }}</td>
                  <td>{{ $Single->Docdetails }}</td>

                  <td><a href="{{ url('') }}/{{ $Single->Docs }}"><span class="label label-danger">عرض</span></a></td>
                  <td>{{ $Single->created_at }}</td>
                </tr>
                @endforeach



                </tbody>
              </table>
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
 <div class="modal fade" id="FinalDoc" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">نافذة تحميل الملفات النهائية للمشاريع</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" id="AddCon" method="POST" action="{{ route('Documents.store') }}" enctype="multipart/form-data" >

  </select>
  {!! csrf_field() !!}
               <div class="form-group">
             <label for="Stage" class="col-sm-4 control-label">رقم المشروع </label>
            <div class="col-sm-8">
               <?php $pro = App\Models\Projects::all(); ?>
              <select name="projectID" style="width: 100%" class="form-control select2">
                <option>اختر المشروع</option>
                @foreach($pro as $kgk)
                <option value="{{$kgk->ProID}}">{{$kgk->ProID}}-{{$kgk->ProName}}</option>
                @endforeach
              </select>

                   </div>
                 </div>
             <div class="form-group">
            <label for="Stage" class="col-sm-4 control-label">اسم المستند </label>
            <div class="col-sm-8">
              <input type="text" name="DocName" class="form-control" id="DocName" placeholder="اسم المستند" style="margin-bottom: 9px;" required="required">
                   </div>
            </div>

            <div class="form-group">
                  <label for="Docdetails" class="col-sm-4 control-label" >ملاحظات</label>
                   <div class="col-sm-8">
                    <textarea name="Docdetails" class="form-control" id="Docdetails" placeholder="اكتب ملاحظتك هنا" rows="5" required="required"></textarea>
                 </div>

                </div>
            <div class="form-group">
              <label for="Stage" class="col-sm-4 control-label">اختر المستند </label>
              <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> تحميل المستند
                  <input type="file" name="Docs" id="Own" required="required">
                </div>
            </div>
           <button id="Consend" class="btn btn-success">حفظ</button>
         </form>

        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
  <script>
/********************************************************************/
/********************************************************************/
                        $('#Consdgend').click(function () {

                    $( "#dg" ).on( "submit", function( event ) {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


                    event.preventDefault();

                        var data2    = $( this ).serialize();
                        var headers = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            type: 'POST',
                            url : $(this).attr('action'),
                            data : data2 ,
                            //dataType: 'json',
                            cache:false,

                            success  : function(data) {
                                swal("تهانينا!",data , "success");
                         $("#AddCon").trigger("reset");
                          $.ajax({
                            url: "docsindex",
                            type: "GET",
                            success: function(data){
                                $("#results").html(data);
                            },
                            error: function(){
                                        console.log("No results for " + data + ".");
                                }
                        });

                            },
                             error: function(xhr, textStatus, thrownError){
                             // console.log(thrownError);
                              swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                            }

                        });


                    });


                });

                     /*********************************************************************/
</script>
@endsection
