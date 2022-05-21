<?php
$Data = App\Models\AgentsNames::latest()->get();
?>


                    @foreach($Data as $Single)
                <tr>
                  <td>{{ $Single->id }}</td>
                  <td>{{ $Single->Agnames }}</td>
                  <td>
                       <button id="{{ $Single->id }}" class="btn btn-danger" data-id="{{$Single->id}}" data-token="{{csrf_token()}}" onclick='
                                  swal({
   title: "هل انت متأكد?",
  text: "عند حذف هذه البيانات لا يمكنك استرجاعها مرة اخري!",
  type: "info",
  showCancelButton: true,
  closeOnConfirm: false,
  showLoaderOnConfirm: true,
},
function(){
  setTimeout(function(){
            var id = $("#{{ $Single->id }}").data("id");
      var token = $("#{{ $Single->id }}").data("token");
        $.ajax({
                            type: "GET",
                            url : "deletAgn/"+id,
                            data : {
                                "":id,
                                 "_method":"DELETE",
                                  "_token":token,
                            },
                            //dataType: "json",
                            cache:false,

                            success  : function(data) {
                              $.ajax({
                                  url: "Getag",
                                  type: "GET",
                                  success: function(data){
                                      $("#comm").html(data)

                                  },
                                  error: function(){
                                              console.log("No results for " + data + ".");
                                      }
                              });
                                swal("تهانينا!",data , "success");

                            },
                             error: function(xhr, textStatus, thrownError){
                             // console.log(thrownError);
                              swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                            }

                        });

  }, 1000);
});
                              '>حذف</button>
                  </td>
                </tr>
                    @endforeach
