
@if(!isset($Data))
    <tr>
        <center><p class="label label-danger">لا توجد ملفات لهذا المشروع </p></center>
    </tr>
    @else
    @foreach($Data as $Single)
        <tr>
            <td>{{ $Single->DocID }}</td>
            <td>{{ $Single->DocName }}</td>
            <td>{{ $Single->Docdetails }}</td>

            <td><a href="{{ url('') }}/{{ $Single->Docs }}"><span class="label label-primary">عرض</span></a></td>
            <td>{{ date('F d, Y', strtotime($Single->created_at)) }}</td>
            <td>
                <button id="{{ $Single->id }}" class="label label-danger" data-id="{{$Single->id}}" data-token="{{csrf_token()}}" onclick='
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
                        url : "deleteDocuments/"+id,
                        data : {
                        "":id,
                        "_method":"DELETE",
                        "_token":token,
                        },
                        //dataType: "json",
                        cache:false,

                        success  : function(data) {
                        swal("تهانينا!",data , "success");

                        },
                        error: function(xhr, textStatus, thrownError){
                        // console.log(thrownError);
                        swal("للأسف!", "لم يتم حفظ البيانات!", "error");
                        }

                        });

                        }, 1000);
                        });
                        '><span class="label label-danger">حذف</span></button>
            </td>
        </tr>
    @endforeach

    @endif