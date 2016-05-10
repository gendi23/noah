$(document).ready(function(){
    for(i=1;i<=4;i++){
        showPopUp("patrocinator"+i);
    }
    showPopUp("payment");
    showPopUp("session");
    showPopUp("reg");
    showPopUp("remember");
    showPopUp("updatePass");

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
            for(i=1;i<=5;i++){
                $('#close-patrocinator'+i).click();
            }
        }   // esc
    });
// Cuando le da click a data
    $('#close-data').click(function(){
        $('#popup-data').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    });


});
