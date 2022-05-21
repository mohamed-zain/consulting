/**
 * Created by Mohamed-Zain on 2/27/2020.
 */
$(document).ready(function(){

    $(document).ajaxStart(function () {
        $(".loa").show();
    }).ajaxStop(function () {
        $(".loa").fadeOut();
        $("#Command").fadeIn(3000);
    });

    $("#Stage").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/Stage",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });
    $("#Stage2").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/Stage",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });
    $("#Stage3").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/Stage",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });



    $("#projectsList").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/projectsList",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });
    $(".projectsList").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/projectsList",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });

    $("#TasksList").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/TasksList",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $(".TasksList").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/TasksList",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });

    $("#ChartsLibrary44").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/ChartsLibrary",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $(".ChartsLibrary").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/ChartsLibrary",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });

    $("#Employee").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/emoployeesList",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });

    $(".Employee").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/emoployeesList",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $("#CompletedTasks").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/CompletedTasks",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $("#Agentslist").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/Agentslist",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });

    $(".Agentslist").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/Agentslist",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });





    $("#Archive").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/Archive",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });

    $(".Archive").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/Archive",
            type: "GET",
            success: function(data){
                $("#Command").html(data);
            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $("#UsersPrivileges").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/UsersPrivileges",
            type: "GET",
            success: function(data){
                $("#Command").html(data)

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $(".UsersPrivileges").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/UsersPrivileges",
            type: "GET",
            success: function(data){
                $("#Command").html(data)

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });

    $("#EmpMrequest").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/EmpMrequest",
            type: "GET",
            success: function(data){
                $("#Command").html(data)

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $("#EmpVrequest").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/EmpVrequest",
            type: "GET",
            success: function(data){
                $("#Command").html(data)

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });

    $("#EmpPrequest").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/EmpPrequest",
            type: "GET",
            success: function(data){
                $("#Command").html(data)

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $(".EmpMrequest2").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/EmpMrequest",
            type: "GET",
            success: function(data){
                $("#Command").html(data)

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });


    $(".EmpVrequest2").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/EmpVrequest",
            type: "GET",
            success: function(data){
                $("#Command").html(data)

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });

    $(".EmpPrequest2").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/EmpPrequest",
            type: "GET",
            success: function(data){
                $("#Command").html(data)

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });
    /**************************************************/

    $("#Reports").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/Reports",
            type: "GET",
            success: function(data){
                $("#Command").html(data);

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });
    $(".Reports").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/Reports",
            type: "GET",
            success: function(data){
                $("#Command").html(data);

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });

    $("#AllRequest").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('/')}}/AllRequest",
            type: "GET",
            success: function(data){
                $("#Command").html(data);

            },
            error: function(){
                console.log("No results for " + data + ".");
            }
        });
    });




});