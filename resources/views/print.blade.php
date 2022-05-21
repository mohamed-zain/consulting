<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>المهندس الرقمي</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <script src="/Architect/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="/Architect/public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Architect/public/dist/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

            <link rel="stylesheet" href="/Architect/public/plugins/select2/select2.min.css">

    <link rel="stylesheet" href="/Architect/public/dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="/Architect/public/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/Architect/public/plugins/datepicker/datepicker3.css">
<script src="/Architect/public/dist/css/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="/Architect/public/dist/css/sweetalert.css">

    <link rel="stylesheet" href="/Architect/public/dist/fonts/fonts-fa.css">
    <link rel="stylesheet" href="/Architect/public/dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="/Architect/public/style.css">
     <link href="/Architect/public/dist/css/notify.css" rel='stylesheet' type='text/css' />
 <link rel="stylesheet" href="/Architect/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    .whitespace {
    white-space:pre-wrap;
    line-height: 2;
}
.heade{
   
  }
  .foter { 
    
  }
  div#topdiv {
    
  top:0px;
  left:0px;
  width:100%;
  
}
div#bottomdiv {
  bottom:0px;
  left:0px;
  width:100%;
 
}
  </style>

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

 <script  src="/Architect/public/dist/js/validation.js"></script>
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
  </head>
  <body class="skin-blue sidebar-mini">
  <div class="loader"></div>

    <div class="wrapper">
@yield('content')
    
    

    </div>

   
         <script src="/Architect/public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
            <script src="/Architect/public/bootstrap/js/bootstrap.min.js"></script>
            <script src="/Architect/public/plugins/select2/select2.full.min.js"></script>

    <script src="/Architect/public/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/Architect/public/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

    <script src="/Architect/public/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/Architect/public/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="/Architect/public/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/Architect/public/plugins/fastclick/fastclick.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script src="/Architect/public/plugins/knob/jquery.knob.js"></script>
    
    <script src="/Architect/public/dist/js/app.min.js"></script>
    <script src="/Architect/public/dist/js/demo.js"></script>
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


    $(".knob").knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
    </script>
  </body>
</html>
