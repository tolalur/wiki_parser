$( "#send_request" ).click(function() {

    var send = $('#inputWord').val();

    if (send!='') {
    	var query = window.location + 'import/' + send + '/'; 	
  		/*$( "#main_wrap" ).load( query, function( response, status, xhr ) {
  			if ( status == "error" ) { alert( "ошибка, измените запрос" ); }
		});*/

		$.ajax({
  			url: query,
  			//cache: false,
  			error: function () { alert ('Что то пошло не так, попробуйте позже') },
			}).done(function( html ) {
  				$("#main_wrap").empty();
  				$("#main_wrap").append(html);
			});

    } else 	{

    	alert( "пустой запрос" );
    }  
    
});