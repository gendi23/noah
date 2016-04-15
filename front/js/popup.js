$(document).ready(function(){



    $(document).keyup(function(e) {
        if (e.keyCode === 27){
            $('#close-reg').click();
            $('#close-session').click();
            $('#close-data').click();
        }   // esc
    });

    $('#close-data').click(function(){
        $('#popup-data').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    });

    $('#open-reg').click(function(){
        $('#popup-reg').fadeIn('slow');
        $('.popup-overlay').fadeIn('slow');
        $('.popup-overlay').height($(window).height());
        return false;
    });

    $('#close-reg').click(function(){
        $('#popup-reg').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    });
    $('#open-sesion').click(function(){
        $('#popup-sesion').fadeIn('slow');
        $('.popup-overlay').fadeIn('slow');
        $('.popup-overlay').height($(window).height());
        return false;
    });

    $('#close-session').click(function(){
        $('#popup-sesion').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    });
});
