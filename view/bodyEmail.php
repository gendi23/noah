<p>Querid@ <?=$user->getUser()?>,</p><br/>
<p>Gracias por regitrarte en la matriz NOAH. Antes de completar tu registro usted debe activar su cuenta.</p>
<p>Tu usuario es: <?=$user->getUser()?></p>
<p>Tu c&oacute;digo es: <?=$user->getToken()?></p>
<p>Para completar tu registro visita el siguente enlace URL.</p>
<a href="<?=$_SERVER["HTTP_HOST"]?>/?active=1&token=<?=$user->getToken()?>&id=<?=$user->getId()?>">Activa tu cuenta aqu&iacute;.</a>
 