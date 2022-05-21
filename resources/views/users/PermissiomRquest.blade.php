
	<script>
/********************************************************************/             
/********************************************************************/
                        $('#AddAvsend').click(function () {

                    $( "#AddAv" ).on( "submit", function( event ) {



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
                                
                                
                            },
                             error: function(xhr, textStatus, thrownError){
                             // console.log(thrownError);
                              swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                            }

                        });
                         $("#AddAv").trigger("reset");
                        

                    });

                });

                     /*********************************************************************/
</script>


			{{ Form::open(array('route'=>'EmpRequest.store','id'=>'AddAv')) }}
<hr>
<input type="hidden" name="EmpId" value="{{Auth::user()->id}}">
			<input type="hidden" name="ReqType" value="1">
            
            <div class="form-group">
          <div class="form-group">
            <label>نوع الاذن</label>
            <input type="text" name="Extra" class="form-control" placeholder="اكتب نوع الاذن">            

            </div>

            </div>
            <button id="AddAvsend" class="btn btn-success">ارسال</button>
         {{ Form::close() }}
