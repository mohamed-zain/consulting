$(document).ready(function () {

	$('#send').click(function(e){

		e.preventDefault();

			$.ajax({

				//url:"",
				type:'POST',
				cache: false,
				data: $('form#add').serialize(),
				dataType: 'json',
				beforeSend: function(){

				},
				success: function(data){
					$("result").append('<p>'+data+'</p>')
				},
				error: function(xhr, textStatus, thrownError){
					alert('خطا');
				}
			});

	});

});