
  $(document).ready(function () {
  

                $('#btn-send').click(function () {

                    $( "#formadd" ).on( "submit", function( event ) {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


                    event.preventDefault();

                        var data    = $( this ).serialize();
                        var headers = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            type: 'POST',
                            url : $(this).attr('action'),
                            data : data + headers,
                            //dataType: 'json',
                            cache:false,
                           
                           beforeSend : function(){
                              $("").val("");
                           },

                            success  : function(data) {
                                swal("تهانينا!",data , "success");
                                 
                            },
                             error: function(xhr, textStatus, thrownError){
                             // console.log(thrownError);
                              swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                            }

                        });
                        $("#formadd").trigger("reset");

                    });

                });

                    
      
       
      
     
      /********************************************************************/ 
     
      
      
      
      
      
    
      
            });