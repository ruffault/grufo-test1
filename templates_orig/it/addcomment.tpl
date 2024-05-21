<div id="addcomment">
	{if !isset($smarty.get.save)}
		<h2><span class="deco">></span>Aggiungi un commento</h2>
	{/if}

	{if $error}
		<div class='erreur'>
			<h3>E' necessario aggiungere un commento!</h3>
		</div>
	{elseif $smarty.get.addcomment}
		<h3>Conferma il commento</h3>
		<p>{$smarty.get.remarks|utf8_decode|trim|htmlentities|nl2br}</p>
		<form method="get" action="{$urlsite}index.php">
			<fieldset>
				<input type="hidden" value="addcomment" name="page" />
				<input type="hidden" value="{$smarty.get.id}" name="id" />
				<input type="hidden" name="remarks" value="{$smarty.get.remarks|trim|htmlentities}" />
				<input type="submit" name="save" value="Soumettre le commentaire" />
			</fieldset>
		</form>
	{/if}
	{if !isset($smarty.get.save)}
		<form method="get" action="{$urlsite}index.php">
		
		<fieldset>
			<input type="hidden" value="addcomment" name="page" />
			<input type="hidden" value="{$smarty.get.id}" name="id" />
	
			<p class="field">
				Articolo: <strong>{$productname}</strong>
			</p>
			<p class="field">
				<label for="i_pseudo"> * Commento:</label><br />
				<textarea name="remarks" cols="35" rows="8">{$smarty.get.remarks|utf8_decode|trim|htmlentities}</textarea>
			</p>
		
			<p class="field">
				<input type="submit" name="addcomment" value="Verifier avant l'envoi" />
			</p>
			<p><em>I campi con l'asterisco * sono obbligatori.</em></p>
		</fieldset>
		</form>
	{else}
		<h2><span class="deco">></span>Congratulazioni</h2>
		<p>
			Il tuo commento sarà convalidato da un
			operatore. Grazie per avere partecipato.
		</p>
		<a href='{$urlsite}index.php?page=showproduct&amp;id={$smarty.get.id}'>Torna al prodotto</a>
	{/if}
	
</div>
