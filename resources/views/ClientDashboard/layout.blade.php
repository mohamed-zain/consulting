
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
      <title>برنامج خير عون - خدمات ما بعد الإشتراك</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <meta name="description" content="برنامج ادارة خدمات عملاء خيرعون" />
      <meta name="keywords" content="برنامج ادارة خدمات عملاء خيرعون" />
      <meta name="author" content=" خيرعون - الإمارات"/>

      <!-- Favicon -->
      <link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}" />
      <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
      <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

      <link rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
      <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
<script src="{{ asset('dist/css/sweetalert-dev.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('dist/css/sweetalert.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/fonts/fonts-fa.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
     <link href="{{ asset('dist/css/notify.css') }}" rel='stylesheet' type='text/css' />
 <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">


  <style type="text/css">
    .whitespace {
    white-space:pre-wrap;
    line-height: 2;
}
.sidebar-toggle{
    display: none;
}

  </style>
<script>
  $(document).ready(function(){
      $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
    });
  });
 
</script>
<script type="text/javascript">
  $(function () {
    $(".CMe").click(function(e) {
        e.preventDefault();
        $(".loader").show();

        var url=$(this).attr("href");

        setTimeout(function() {
            setTimeout(function() {
              showSpinner();
            },5000);
            window.location=url;
        },1000);

   });
});
</script>

 <script  src="{{ asset('dist/js/validation.js') }}"></script>
 <style type="text/css">
   td,th{
       align-content: center;
   }
 </style> 

<script type="text/javascript">
  

</script>

   <script type="text/javascript">
$(window).load(function() {
  $(".loader").fadeOut("slow");
});
</script>
<script>
      $(document).ready(function(){

      $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").hide();
    });

     $("#RT").change(function(){
      var Url = $( this ).val();
    
    $.ajax({
        url: Url,
        type: "GET",
        success: function(data){
            $("#Droping").html(data);
        },
        error: function(){
                    console.log("No results for ");
            }
    });
});
      $("#NewestTasksvgh").click(function(){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
        url: "NewestTasksjh",
        type: "GET",
        success: function(data){
            $("#here").html(data);
        },
        error: function(){
                    console.log("No results for " + data + ".");
            }
    });
});

});
  </script>
  </head>
  <body class="skin-blue sidebar-mini">
   
  <div class="loader"></div>
   <div class="loa" style="display: none;"></div>

    <div class="wrapper" style="background-color: #d2d6de;">

    @include('ClientDashboard.layouts.header')
      <div class="content-wrapper" dir="rtl" style="margin:5px;">
        

        <section class="content margin-50">
      <div class="row" id="here">

 @yield('content')
 @if ($errors->any())
 <div class="notify bottom-right do-show" data-notification-status="error" style="direction: rtl;text-align: center;"><center>
  <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </center>
    </div>
 
@endif
@if(Session::has('Flash'))
<script type="text/javascript">
  swal("شكرا", "{{ Session::get('Flash') }}", "success");
</script>

            
           @endif
           <div id="MSG"></div>
      </div>
          </section>
      </div>
               @include('ClientDashboard.layouts.footer')

    </div>


  <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>

    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
    
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
</script>
 <script>
      $(".select2").select2();
  $('#datepicker').datepicker({
      autoclose: true
      
    });

    </script>
  </body>
</html>
