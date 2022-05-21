
<div class="">
  <section class="content-header">
        <div class="">
          <h3>
            لوحة التحكم
            <small>المقاولين</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{url('MainPort')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('Agents') }}"><i class="fa fa-users"></i>ادارة العملاء</a></li>
            <li class="active">اضافة مقاول</li>
          </ol>
          </div>
        </section>
</div>



<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">اضافة مقاول جديد</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
          {!! Form::open(array('route'=>'Contractor.store','class'=>'form-horizontal','onsubmit'=>'return validation();')) !!}

            <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label">نوع المقاول <span class="label label-danger">*</span></label>

                  <div class="col-sm-2">
                    <select class="form-control select2" name="ContractorType" required="required">
                        <?php $AG = App\Models\ContractorType::all();?>
                        <option  value="">-------اختر نوع المقاول--------</option>
                        @foreach($AG as $AG3)
                            <option value="{{$AG3->id}}" selected="selected">{{$AG3->ContractorTypeName}}</option>
                        @endforeach
                </select>

                  </div>

                  <label for="AgentName" class="col-sm-2 control-label">اسم المقاول <span class="label label-danger">*</span></label>

                  <div class="col-sm-6">
                    <input type="text" name="ContractorName" class="form-control" id="ContractorName" placeholder="اسم المقاول " style="margin-bottom: 9px;" required="required">
                  </div>

                </div>


                  <div class="form-group">
                  <label for="ContractorAuth" class="col-sm-2 control-label">رقم الهوية <span class="label label-danger">*</span></label>

                  <div class="col-sm-4">
                    <input type="text" name="ContractorAuth" class="form-control" id="ContractorAuth" placeholder="رقم الهوية" style="margin-bottom: 9px;" required="required">
                  </div>
                  <label for="ContractorNationType" class="col-sm-2 control-label">نوع الهوية <span class="label label-danger">*</span></label>

                  <div class="col-sm-4">

                    <select  name="ContractorNationType" class="form-control select2" id="ContractorNationType" style="margin-bottom: 9px;" required="required">
                      <option value="">اختر نوع الهوية</option>
                      <option value="اقامة">شهاده تسجيل</option>
                      <option value="سجل مدني">رقم الهيئه</option>
                      <option value="سجل تجاري">سجل تجاري</option>
                      <option value="سجل مدني">سجل مدني</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ContractorCity" class="col-sm-2 control-label">المدينة</label>
                  <div class="col-sm-4">
                    <input type="text" name="ContractorCity" class="form-control" id="" placeholder="المدينة" style="margin-bottom: 9px;">
                  </div>

                  <label for="ContractorPhone" class="col-sm-2 control-label">رقم الجوال <span class="label label-danger">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" name="ContractorPhone" class="form-control" id="ContractorPhone" placeholder="رقم الجوال" style="margin-bottom: 9px;" required="required">

                  </div>
                </div>

                  <div class="form-group">
                  <label for="AgentEmail" class="col-sm-2 control-label">البريد الالكتروني</label>

                  <div class="col-sm-4">
                    <input type="text" name="AgentEmail" class="form-control" id="" placeholder="البريد الالكتروني" style="margin-bottom: 9px;">
                  </div>
                      <label for="ContractorEmail" class="col-sm-2 control-label">رقم الواتساب <span class="label label-danger">*</span></label>
                      <div class="col-sm-4">
                          <input type="text" name="ContractorEmail" class="form-control" id="ContractorEmail" placeholder="رقم الواتساب" style="margin-bottom: 9px;" required="required">
                      </div>
                </div>

                  <div class="form-group">
                  <label for="AgentAddress" class="col-sm-2 control-label">العنوان <span class="label label-danger">*</span></label>
                  <div class="col-sm-10">
                    <textarea name="ContractorAddress" class="form-control" id="ContractorAddress" placeholder="العنوان" style="margin-bottom: 9px;" required="required"></textarea>
                  </div>

                </div>
                <div class="box-footer">
<button class="btn btn-info pull-left">اضافة</button>
              </div>

          {!! Form::close() !!}

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
