<div id="addcomment">
	{if !isset($smarty.get.save)}
		<h2><span class="deco">></span>Add your comment</h2>
	{/if}

	{if $error}
		<div class='erreur'>
			<h3>You must enter your comment!</h3>
		</div>
	{elseif $smarty.get.addcomment}
		<h3>Confirm your comment</h3>
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
				Article: <strong>{$productname}</strong>
			</p>
			<p class="field">
				<label for="i_pseudo"> * Comment:</label><br />
				<textarea name="remarks" cols="35" rows="8">{$smarty.get.remarks|utf8_decode|trim|htmlentities}</textarea>
			</p>
		
			<p class="field">
				<input type="submit" name="addcomment" value="Verifier avant l'envoi" />
			</p>
			<p><em>Fields with an asterisk * must be completed.</em></p>
		</fieldset>
		</form>
	{else}
		<h2><span class="deco">></span>Congratulations</h2>
		<p>
			An operator will now validate your
			comment. Thank you for participating.
		</p>
		<a href='{$urlsite}index.php?page=showproduct&amp;id={$smarty.get.id}'>Back to the produt</a>
	{/if}
	
</div>
