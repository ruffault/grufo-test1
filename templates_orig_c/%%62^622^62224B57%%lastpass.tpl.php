<?php /* Smarty version 2.6.31, created on 2019-12-31 06:58:15
         compiled from es/lastpass.tpl */ ?>
<?php if ($_GET['statut'] == 'ok'): ?>
  <h2>¡Enhorabuena!</h2>
	<p>Acabamos de enviarle una nueva contraseña a la dirección que nos ha transmitido.
	A partir de ahora, puede identificarse debajo de la barra de menú, a la 
	izquierda. Si lo desea, podrá modificar su contraseña en la sección
	"Modificar mis preferencias"</p>  
<?php else: ?>
	<h2>¿Ha olvidado su contraseña?</h2>
	<p>
	  Introduzca la dirección electrónica que utilizó para registrarse.
    <br />Le enviaremos una nueva contraseña.
	</p>
	
	<form method="post" action="sendpass.php">
	  <p>
	    E-mail <input type="text" name="lastemail" /> <input type="submit" value="ok" />
	  </p>
	</form>
<?php endif; ?>