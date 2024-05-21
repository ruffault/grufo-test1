<div id="addcomment">
	{if !isset($smarty.get.save)}
		<h2><span class="deco">></span>Añadir un comentario</h2>
	{/if}

	{if $error}
		<div class='erreur'>
			<h3>¡Debe añadir un comentario!</h3>
		</div>
	{elseif $smarty.get.addcomment}
		<h3>Confirmar el comentario</h3>
		<p>{$smarty.get.remarks|utf8_decode|trim|htmlentities|nl2br}</p>
		<form method="get" action="index.php">
			<fieldset>
				<input type="hidden" value="addcomment" name="page" />
				<input type="hidden" value="{$smarty.get.id}" name="id" />
				<input type="hidden" name="remarks" value="{$smarty.get.remarks|trim|htmlentities}" />
				<input type="submit" name="save" value="Soumettre le commentaire" />
			</fieldset>
		</form>
	{/if}
	{if !isset($smarty.get.save)}
		<form method="get" action="index.php">
		
		<fieldset>
			<input type="hidden" value="addcomment" name="page" />
			<input type="hidden" value="{$smarty.get.id}" name="id" />
	
			<p class="field">
				Artículo : <strong>{$productname}</strong>
			</p>
			<p class="field">
				<label for="i_pseudo"> * Comentario :</label><br />
				<textarea name="remarks" cols="35" rows="8">{$smarty.get.remarks|utf8_decode|trim|htmlentities}</textarea>
			</p>
		
			<p class="field">
				<input type="submit" name="addcomment" value="Comprobar antes del envío" />
			</p>
			<p><em>Los campos con el símbolo * son obligatorios.</em></p>
		</fieldset>
		</form>
	{else}
		<h2><span class="deco">></span>Felicidades</h2>
		<p>
			Su comentario será tratado por un
			operador. Gracias por su participación.
		</p>
		<a href='{$urlsite}index.php?page=showproduct&amp;id={$smarty.get.id}'>Volver al producto</a>
	{/if}
	
</div>
