
<div class="">
  <section class="content-header">
        <div class="">
          <h3>
            لوحة التحكم
            <small>العملاء</small>
          </h3>
          <ol class="breadcrumb">
            <li><a href="{{url('MainPort')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active"><a href="{{ url('Agents') }}"><i class="fa fa-users"></i>ادارة العملاء</a></li>
            <li class="active">اضافة عميل</li>
          </ol>
          </div>
        </section>
</div>



<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">اضافة عميل جديد</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
          {!! Form::open(array('route'=>'Agents.store','class'=>'form-horizontal','onsubmit'=>'return validation();')) !!}

            <div class="form-group">

                  <label for="inputEmail3" class="col-sm-2 control-label">نوع العميل <span class="label label-danger">*</span></label>

                  <div class="col-sm-2">
                    <select class="form-control select2" name="AgentType" required="required">
                      <?php $AG = App\Models\AgentsNames::all();?>
                  <option  value="">اختر نوع العميل</option>
                  @foreach($AG as $AG3)
                  <option value="{{$AG3->Agnames}}">{{$AG3->Agnames}}</option>
                    @endforeach
                </select>

                  </div>

                  <label for="AgentName" class="col-sm-2 control-label">اسم العميل <span class="label label-danger">*</span></label>

                  <div class="col-sm-2">
                    <input type="text" name="AgentName" class="form-control" id="AgentName" placeholder="الاسم الاول" style="margin-bottom: 9px;" required="required">
                  </div>
                <div class="col-sm-2">
                    <input type="text" name="AgentName2" class="form-control" id="AgentName2" placeholder="اسم الاب" style="margin-bottom: 9px;" required="required">
                </div>
                <div class="col-sm-2">
                    <input type="text" name="AgentName3" class="form-control" id="AgentName3" placeholder="اسم العائلة" style="margin-bottom: 9px;" required="required">
                </div>
                </div>


                  <div class="form-group">
                  <label for="Agentauth" class="col-sm-2 control-label">رقم الهوية <span class="label label-danger">*</span></label>

                  <div class="col-sm-4">
                    <input type="text" name="Agentauth" class="form-control" id="Agentauth" placeholder="رقم الهوية" style="margin-bottom: 9px;" required="required">
                  </div>
                  <label for="NationType" class="col-sm-2 control-label">نوع الهوية <span class="label label-danger">*</span></label>

                  <div class="col-sm-4">

                    <select  name="NationType" class="form-control select2" id="NationType" style="margin-bottom: 9px;" required="required">
                      <option value="">اختر نوع الهوية</option>
                      <option value="اقامة">شهاده تسجيل</option>
                      <option value="سجل مدني">رقم الهيئه</option>
                      <option value="سجل تجاري">سجل تجاري</option>
                      <option value="سجل مدني">سجل مدني</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="AgentCity" class="col-sm-2 control-label">المدينة</label>
                  <div class="col-sm-4">
                    <input type="text" name="AgentCity" class="form-control" id="" placeholder="المدينة" style="margin-bottom: 9px;">
                  </div>

                  <label for="AgentPhone" class="col-sm-2 control-label">رقم الجوال <span class="label label-danger">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" name="AgentPhone" class="form-control" id="AgentPhone" placeholder="رقم الجوال" style="margin-bottom: 9px;" required="required">

                  </div>
                </div>

                  <div class="form-group">
                  <label for="AgentEmail" class="col-sm-2 control-label">البريد الالكتروني</label>

                  <div class="col-sm-4">
                    <input type="text" name="AgentEmail" class="form-control" id="" placeholder="البريد الالكتروني" style="margin-bottom: 9px;">
                  </div>
                      <label for="AgentMob" class="col-sm-2 control-label">رقم الواتساب <span class="label label-danger">*</span></label>
                      <div class="col-sm-4">
                          <input type="text" name="AgentMob" class="form-control" id="AgentMob" placeholder="رقم الواتساب" style="margin-bottom: 9px;" required="required">
                      </div>
                </div>

                  <div class="form-group">
                  <label for="AgentAddress" class="col-sm-2 control-label">العنوان <span class="label label-danger">*</span></label>
                  <div class="col-sm-10">
                    <textarea name="AgentAddress" class="form-control" id="AgentAddress" placeholder="العنوان" style="margin-bottom: 9px;" required="required"></textarea>
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
