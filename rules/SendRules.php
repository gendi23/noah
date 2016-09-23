<?php
/**
 * Created by PhpStorm.
 * User: waular
 * Date: 25/08/2016
 * Time: 08:34 AM
 */

/**
 * Created by PhpStorm.
 * User: waular
 * Date: 18/08/2016
 * Time: 08:18 AM
 */


$app->get(
'/send/faled',
function () {
    $sendMail= new SendEmail();

    $body="Estimado usuario,\nHemos presentado un inconveniente con el sistema y su cuenta sufrió algunos cambios lamentables. Estos fueron solventados, pero necesitamos que por favor, valide sus datos y de ser necesario, reestablecerlos.\n Su clave provicional de acceso es: AjvbTSdE, por favor editela desde el sistema.\n\nLe pedimos disculpas por las molestias causadas.";
    $sendMail->sendOne("Bloqueo de cuenta NOAH",$body,'trabajojose19@gmail.com');

    $body="Estimado usuario,\nHemos presentado un inconveniente con el sistema y su cuenta sufrió algunos cambios lamentables. Estos fueron solventados, pero necesitamos que por favor, valide sus datos y de ser necesario, reestablecerlos.\n Su clave provicional de acceso es: 3a3YlG1n, por favor editela desde el sistema.\n\nLe pedimos disculpas por las molestias causadas.";
    $sendMail->sendOne("Bloqueo de cuenta NOAH",$body,'linareseduardo35@gmail.com');

});
?>
 