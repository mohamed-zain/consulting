 @extends('index')
@section('content')
<script>
  $(document).ready(function(){

      $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
    });

     $("#RepoAgents").change(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: $(this).val(),
        type: "GET",
        success: function(data){
            $("#results").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

     $("#Tasks").change(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: $(this).val(),
        type: "GET",
        success: function(data){
            $("#results").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

     $("#Pro").change(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: $(this).val(),
        type: "GET",
        success: function(data){
            $("#results").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

      $("#Town").change(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "GetTown",
        type: "POST",
        data: { id : $(this).val() },
        success: function(data){
            $("#mnmn").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});


  });
 
</script>
<div class="col-md-12 no-print">
           
           <div class="row">
            
               <div class="margin">
                <div class="btn-group">
                  <button type="button" class="btn btn-default">???????????????? ????????????</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">??????????????</a></li>
                    <li><a href="#">??????????????</a></li>
                    <li><a href="#">????????????????</a></li>
                    <li><a href="#">??????????????????</a></li>
                    
                  </ul>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-info">???????????????? ??????????????</button>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-danger">???????????????? ??????????????</button>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-success">???????????????? ????????????</button>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-warning">???????????????? ????????????????????</button>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-info">???????????????? ??????????</button>
                </div>
              </div>
              </div> 
          </div>
<div class="col-md-12">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">????????????????????</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <section class="invoice">
      <!-- title row -->
      
     

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive" id="results">
          <table id="example1"  class="table table-bordered table-striped table-responsive" style="font-size: 12px;">
                <thead>
                <tr>
                  <th>#</th>
                  <th>?????? ??????????????</th>
                  <th>?????? ??????????????</th>
                  <th>?????? ????????????</th>
                  <th>?????? ???????? ????????????</th>
                  <th>???????? ??????????</th>
                  <th>??????????????</th>
                  <th>??????????????</th>
                  <th>???????? ????????????</th>
                 
                </tr>
                </thead>
                <tbody>
                  @foreach($Data as $mmmmmm)
                <tr>
                  <td>{{ $mmmmmm->ProID }}</td>
                  
                  <td>{{ $mmmmmm->ProType }}</td>
                  <td>{{ $mmmmmm->ProName }}</td>
                  <td>{{ $mmmmmm->AgentName }}</td>
                  <td>{{ $mmmmmm->AgentPhone }}</td>
                  <td>{{ $mmmmmm->Price }} - ??.??</td>
                  <td>{{ $mmmmmm->Cash }} - ??.??</td>
                  <td>{{ $mmmmmm->Price - $mmmmmm->Cash }}.00 - ??.??</td>
                  <td>{{ $mmmmmm->NameAR }}</td>

                </tr>
              
                @endforeach
                
                    
                   
                </tbody>
              </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="#" onclick="window.print();"  class="btn btn-default"><i class="fa fa-print"></i> ??????????</a>
         
          
        </div>
      </div>
    </section>
      <div class="box-footer">
      </div>
       
    </div>

    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div> 

     
<div class="modal fade" id="Modal2" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">???????? ??????????????</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="" action="">
  {!! csrf_field() !!}
             <div class="form-group">
            <label for="Stage" class="col-sm-4 control-label">?????????? ???????????????? ???? ????????????</label>
            <div class="col-sm-8">
              <select name="Tasks" id="Tasks" class="form-control select2" style="width:90%" id="branchname">
                <option value="RepoTasksAll">???? ????????????</option>
                <option value="RepoTasksD">???????????? ??????????????</option>
                <option value="RepoTasksUN">???????????? ?????????? ??????????</option>
              </select>
            
                   </div>
            </div>
         </form>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="Modal1" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">???????? ??????????????</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="" action="">
  {!! csrf_field() !!}
             <div class="form-group">
            <label for="Pro" class="col-sm-4 control-label">?????????? ???????????? ??????????????</label>
            <div class="col-sm-8">
              <select name="Pro" id="Pro" class="form-control select2" style="width:90%">
                <option value="RepoPrpjectAll">???? ????????????????</option>
                <option value="RepoPrpjectD">?????????? ???????????????? ????????????????</option>
                <option value="RepoProDM">???????????????? ???????????????? ?????????????? ????????????</option>
                <option value="RepoProDM2">???????????????? ???????????????? ?????????????? ????????????</option>
                <option value="RepoPrpjectAll">???????????????? ??????????????</option>
              </select>
            
                   </div>
            </div>
         </form>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="Modal3" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">???????? ?????? ??????????????</h4>
        </div>
        <div class="modal-body">
 <form class="form-horizontal" method="" action="">
  {!! csrf_field() !!}
             <div class="form-group">
            <label for="Stage" class="col-sm-4 control-label">???????????????? ????????????????</label>
            <div class="col-sm-8">
              <select name="RepoAgents" id="RepoAgents" class="form-control select2" style="width:90%">
                <option value="RepoEmp">???? ????????????????</option>
                <option value="RepoAgents">???? ??????????????</option>
                
              </select>
            
                   </div>
            </div>
         </form>

        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>

 @endsection