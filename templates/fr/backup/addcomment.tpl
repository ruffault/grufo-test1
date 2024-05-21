<div id="addcomment">
	{if !isset($smarty.get.save)}
		<h2><span class="deco">></span>Ajouter un commentaire</h2>
	{/if}

	{if $error}
		<div class='erreur'>
			<h3>Vous devez saisir un commentaire !</h3>
		</div>
	{elseif $smarty.get.addcomment}
		<h3>Confirmer le commentaire</h3>
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
				Article : <strong>{$productname}</strong>
			</p>
			<p class="field">
				<label for="i_pseudo"> * Commentaire :</label><br />
				<textarea name="remarks" cols="35" rows="8">{$smarty.get.remarks|utf8_decode|trim|htmlentities}</textarea>
			</p>
		
			<p class="field">
				<input type="submit" name="addcomment" value="Verifier avant l'envoi" />
			</p>
			<p><em>Les champs portant la mention * doivent être remplis obligatoirement.</em></p>
		</fieldset>
		</form>
	{else}
		<h2><span class="deco">></span>Félicitations</h2>
		<p>
			Votre commentaire va maintenant être validé par un
			opérateur. Merci de votre participation.
		</p>
		<a href='{$urlsite}index.php?page=showproduct&amp;id={$smarty.get.id}'>Retour sur le produit</a>
	{/if}
	
</div>