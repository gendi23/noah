<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 09/06/2016
 * Time: 09:53 AM
 */
$publicityController= new PublicityController();
$publicity= new Publicity($publicityController->get(Tables::$Publicity,$id));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Publicidad NOAH</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/pluginsJs/time-circle/inc/TimeCircles.css" />
    <style>
        iframe{
            width: 102%;
            height: 600px;
            margin-left: -8px;
            margin-top: 0px;
        }

        .time_circles > div > span{
            color: #000;
        }
        #CountDownTimer{
            width: 60px;
            height: 60px;
        }
        #contador{
            position: absolute;
            left: 1179px;
            top: 48px;
        }
        #contador>a{
            color: #fff;
            font-family: 'Dosis', 'Tahoma', sans-serif;
            position: relative;
            top: -40px;
            left: 80px;
            display: none;
        }
    </style>

</head>
<body">
    <div id="contador">
        <div id="CountDownTimer" data-timer="25" ></div>
        <a href="/admin/home" class="btn btn-xs btn-warning" id="close"><span class="glyphicon glyphicon-remove"></span> Cerrar</a>
    </div>
    <iframe src="<?= $publicity->getUrl() ?>" frameborder="0">link</iframe>
    <script src="/front/js/jquery.js"></script>
    <script type="text/javascript" src="/pluginsJs/time-circle/inc/TimeCircles.js"></script>
    <script>
        $(document).ready(function(){
            var selector= $("#CountDownTimer");
            selector.data("timer",'25');
            selector.TimeCircles(
                {
                    time:
                    {
                        Days: { show: false },
                        Hours: { show: false },
                        Minutes: {show:false},
                        Seconds: {
                            text: "",
                            color: "#32ae8b",
                            show: true
                        }
                    },
                    total_duration: "Auto"
                })
                .addListener(
                function(unit,value,total) {
                    if (total == 10) {
                        selector.data('timer',10);
                        selector.TimeCircles({ time: { Days: { show:false }, Hours: { show:false }, Minutes: { color: '#900' }, Seconds: { color: '#900' } } })
                    } else if (total == -1) {
                        selector.TimeCircles().stop();
                        <?php if(isset($user)){ ?>

                        $.ajax({
                            cache:false,
                            dataType: "json",
                            type : 'GET',
                            url: "/admin/viewPublicity/"+'<?=$user?>'+"/"+'<?=$id?>',
                            success: function(data) {
                                console.log(data.message);
                            },
                            error:function(){
                                console.log("error al cargar el modulo");
                            }
                        });
                        <?php } ?>
                        $("#close").css('display','block');
                    }
                });
        });
    </script>
</body>
</html>