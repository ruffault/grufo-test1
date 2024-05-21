<div id="myaccount">
<h2><span class="deco">></span>Mi cuenta</h2>


<p>En este espacio personalizado encontrará 
todos sus datos y podrá consultar el estado de sus pedidos.</p>
{if $smarty.session.id_membre}
<ul>
  <li><a href="{$urlsite}index.php?page=modifpref">Modificar mis datos</a>
	<p>Aquí puede modificar su dirección, su contraseña, etc.</p></li>
	
  <li><a href="{$urlsite}index.php?page=oldcommande">Consultar el estado de mis pedidos
  en directo</a>
	<p>Le mantendremos informado de cada una de las etapas de tratamiento de su pedido.
	Puede visualizar el estado en directo, representado en una barra de progresión.
	También encontrará una lista de los pedidos realizados y podrá consultarlos si lo desea.</p></li>
  <li><a href="{$urlsite}index.php?page=showpanier">Ver mi cesta de la compra</a>
	<p>Acceda al espacio cesta de la compra. Encontrará todos los artículos que ha 
  seleccionado. Puede modificar las cantidades de cada artículo.
  También puede archivar artículos para un pedido posterior.</p>
	</li>
</ul>
{else}
<h3>¿Ya está registrado? Identifíquese...</h3>
<form action="login.php" method="post">
<p>
	Seudónimo <input type="text" value="" name="login_identification" />
	Contraseña <input type="password" value="" name="password_identification" />
	<input type="submit" value="ok" name="submit_identification" />
</p>
<p>
  <a href='{$urlsite}index.php?page=lastpass'>¿Ha perdido su constraseña?</a>
</p>
</form>
<h3>¿Todavía no se ha registrado?</h3>
<p><a href="{$urlsite}index.php?page=forminscription&amp;newaccount=1">¡Regístrese!</a>, es fácil y rápido.</p>
{/if}
</div>
