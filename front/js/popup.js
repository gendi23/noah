$(document).ready(function(){
    for(i=1;i<=4;i++){
        showPopUp("patrocinator"+i);
    }
    showPopUp("payment");
    showPopUp("session");
    showPopUp("reg");
    showPopUp("remember");
    showPopUp("updatePass");
    showPopUp("a");

    $("#show-remember").click(function(e){
        e.preventDefault();

        $('#close-session').click();

        $('#popup-remember').fadeIn('slow');
        $('.popup-overlay').fadeIn('slow');
        $('.popup-overlay').height($(window).height());
        return false;

    });

    function showPopUp(id){
        $('#open-'+id).click(function(){
            $('#popup-'+id).fadeIn('slow');
            $('.popup-overlay').fadeIn('slow');
            $('.popup-overlay').height($(window).height());
            return false;
        });

        $('#close-'+id).click(function(){
            $('#popup-'+id).fadeOut('slow');
            $('.popup-overlay').fadeOut('slow');
            return false;
        });
    }

    $(document).keyup(function(e) {
        if (e.keyCode === 27){
            $('#close-reg').click();
            $('#close-session').click();
            $('#close-data').click();
            $('#close-payment').click();
            $('#close-updatePass').click();
            $('#close-remember').click();
            $('#close-message').click();
            for(i=1;i<=5;i++){
                $('#close-patrocinator'+i).click();
            }
            $('.close-pop-data').click();
        }   // esc
    });
// Cuando le da click a data
    $('#close-data').click(function(){
        $('#popup-data').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    });
// Cuando le da click a data
    $('#close-message').click(function(){
        $('#popup-message').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    });


});
