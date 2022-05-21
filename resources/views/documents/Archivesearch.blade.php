<div class="col-md-6">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">قائمة الملفات مصنفة علي حسب المشاريع</h3>
            <div class="box-tools pull-right">
                <div class="has-feedback">
                    <form class="form form-inline" id="search" name="search">
                        {!! csrf_field() !!}
                        <input type="text" name="search_text" class="form-control input-sm" placeholder="ابحث برقم المشروع">
                        <a href="#" class="btn btn-success"  onclick="Findmatch2();">بحث</a>
                    </form>

                </div>
            </div>

            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 table-responsive" >
                    <ul class="mailbox-attachments clearfix">

                        @foreach($Docs as $Single )
                            <li>
                                <span class="mailbox-attachment-icon"><a href="#" id="folder{{$Single->ProID}}"><i class="fa fa-folder-open"></i></a></span>
                                <div class="mailbox-attachment-info">
                                    <a href="#" data-toggle="modal" data-target="#{{$Single->ProID}}" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>

                                        {{Str::limit($Single->ProName, 20)}}
                                    </a>
                                    <span class="mailbox-attachment-size">
                         رقم المشروع {{$Single->ProID}}
                                        <a href="#" class="btn btn-default btn-xs pull-right"></a>
                        </span>
                                </div>
                            </li>
                            <script>


                                $(document).ajaxStart(function () {
                                    $(".loa").show();
                                }).ajaxStop(function () {
                                    $(".loa").fadeOut();
                                    $("#Command").fadeIn(3000);
                                });

                                $("#folder{{$Single->ProID}}").click(function(){
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url: "{{url('/')}}/DocsByPro/{{$Single->ProID}}",
                                        type: "GET",
                                        success: function(data){
                                            $("#DocsByProplace").html(data);
                                        },
                                        error: function(){
                                            console.log("No results for " + data + ".");
                                        }
                                    });
                                });
                            </script>
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
