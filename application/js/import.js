function load_data(){
    
        var send = $('#inputWord').val();
        if (send!='') {
            $("[data-toggle='tooltip']").tooltip('hide');
            var query = window.location + 'import/' + send + '/'; 	
                $.ajax({
                    url: query,
                    error: function () { alert ('Что то пошло не так, попробуйте позже') },
                    }).done(function( html ) {
                            $("#main_wrap").empty();
                            $("#main_wrap").append(html);
                    });
        } else {
             $("[data-toggle='tooltip']").tooltip('show');
        }
        
}
//Импорт данных по нажатию на кнопку
$(document).ready(function(){
    $( "#send_request" ).click(function() {
        load_data();
    });
});
//Импорт данных по нажатию на Enter в поле формы
$(document).ready(function(){
    $( "form" ).on('submit', function() {
        load_data();
        return false;
    });
});