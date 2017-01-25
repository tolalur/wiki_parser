function load_data(){
    var send = $('#inputWord').val();
    
        if (send!='') {
            $("[data-toggle='tooltip']").tooltip('hide');
            var query = window.location + '/' + send + '/';
                    $.ajax({
                            url: query,
                            error: function () { alert ('Что то пошло не так, попробуйте позже') },
                            }).done(function( html ) {
                                    $("#main_wrap").empty();
                                    $("#main_wrap").append(html);
                                    count = 0;
                            });

        } else {
             $("[data-toggle='tooltip']").tooltip('show');
        }
}

var count = 0;
//Поиск данных по нажатию на кнопку
$(document).ready(function(){
    $( "#send_request" ).click(function() {
       load_data();   
    });    
});
//Поиск данных по нажатию на Enter в поле формы
$(document).ready(function(){
    $( "form" ).on('submit', function() {
        load_data();
        return false;
    });
});

$(document).ready(function(){
    $("#main_wrap").on( "click", "#result a", function(){
        var a = $(this).text();
        a = '#' + a;
        if (count >0){
           $(".border p").hide(); 
        } else {
           $(".border").fadeIn( "slow", function() {});
        }
        $(a).fadeIn( "slow", function() {});
        count +=1;
    });
        
});



