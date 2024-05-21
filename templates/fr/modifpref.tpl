<div id="modifpref">
  {if ($error_modif && $smarty.post.modifpref) or !$smarty.post.modifpref}
    <h2><span class="deco">></span>Informations personnelles</h2>
  
    <p>
      Vous pouvez modifier les informations vous concernant. 
      Vous pouvez aussi changer de mot de passe.
    </p>
    
    {if $error_modif}
    <div id="erreur">
    <h3>Informations manquantes ! Certains champs sont mal renseignés:</h3>
    <p>

			{if $error_modif.noname == 1}
				Nom non renseigné <br />
			{/if}

			{if $error_modif.nosurname == 1}
				Prénom non renseigné <br />
			{/if}
					
			{if $error_modif.noadress == 1}
				Adresse 1 non renseignée<br />
			{/if}	
		
			{if $error_modif.nocity == 1}
				Ville non renseignée<br />
			{/if}	

			{if $error_modif.nocp == 1}
				Code postal invalide<br />
			{/if}	

			{if $error_modif.nophone == 1}
				Téléphone invalide<br />
			{/if}	
			
			{if $error_modif.nofax == 1}
				Fax invalide<br />
			{/if}	
			
			{if $error_modif.noemail == 1}
				Email non renseigné<br />
			{/if}	

			{if $error_modif.nopass == 1}
				Vous avez mal saisi votre ancien mot de passe<br />
			{/if}	

			{if $error_modif.badconf == 1}
				Le mot de passe et la confirmation diffèrent<br />
			{/if}

			{if $error_modif.badpass == 1}
				Nouveau mot de passe invalide. Le mot de passe doit faire au moins 6 caractères<br />
			{/if}	

		</p>
    </div>
    {/if}

    <p><em>Les champs portant la mention * doivent être remplis obligatoirement.</em></p>

    <form method="post" action="{$urlsite}index.php?page=modifpref">
      <fieldset>
      <h3>Coordonnées</h3>

      <p class="field">
      <label for="i_civilite">*Civilité</label>
  		{if $smarty.post.account_civilite == 1}
        <input type='radio' id="i_civilite" name='account_civilite' value='1' checked='checked' /> M.
      {else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='1' /> M.
  		{/if}
      {if $smarty.post.account_civilite == 2}
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' checked='checked' /> Mme
  		{else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' /> Mme
  		{/if}
      {if $smarty.post.account_civilite == 3}
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' checked='checked' /> Mlle
  		{else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' /> Mlle
      {/if}
      </p>
      <p class="field">
        <label for="i_nom">*Nom</label><input type="text" name="account_nom" value="{$smarty.post.account_nom}" />
      </p>
      <p class="field">
        <label for="i_prenom">*Prénom</label><input type="text" name="account_prenom" value="{$smarty.post.account_prenom}" />
      </p>
      <p class="field">
        <label for="i_adresse1">*Adresse 1</label><input type="text" name="account_adresse1" value="{$smarty.post.account_adresse1}" />
      </p>
      <p class="field">
        <label for="i_adresse2">Adresse 2</label><input type="text" name="account_adresse2" value="{$smarty.post.account_adresse2}" />
      </p>
      <p class="field">
        <label for="i_adresse3">Adresse 3</label><input type="text" name="account_adresse3" value="{$smarty.post.account_adresse3}" />
      </p>
      <p class="field">
        <label for="i_cp">*Code postal</label><input type="text" name="account_cp" value="{$smarty.post.account_cp}" />
      </p>
      <p class="field">
        <label for="i_ville">*Ville</label><input type="text" name="account_ville" value="{$smarty.post.account_ville}" />
      </p>
      <p class="field">
        <label for="i_etat">Etat</label><input type="text" name="account_etat" value="{$smarty.post.account_etat}" />
      </p>
      <p class="field">
        <label for="i_tel">*Téléphone</label><input type="text" name="account_tel" value="{$smarty.post.account_tel}" />
      </p>
      <p class="field">
        <label for="i_fax">Fax</label><input type="text" name="account_fax" value="{$smarty.post.account_fax}" />
      </p>
      <p class="field">
        <label for="i_email">*Email</label><input type="text" name="account_email" value="{$smarty.post.account_email}" />
      </p>
      <p class="field">
          <label for="i_mailing">Recevoir les lettres d'informations</label>
        <select name="account_mailinglist">
    		{if $smarty.post.account_mailinglist == 1}
    		  <option value='1' selected='selected'>oui</option>
    		  <option value='0'>non</option>
    		{else}
          <option value='1'>oui</option>
    		  <option value='0' selected='selected'>non</option>
    		{/if}
        </select>
      </p><br />
      <p class="submit">
      <input type="submit" name="modifpref" value="Enregistrer" />
      </p>
      </fieldset>
      </form>
      
      <form method="post" action="{$urlsite}index.php?page=modifpref">
      <fieldset>
      <h3>Mot de passe</h3>

      <p class="field">
        <label for="i_ancien">Ancien</label>
        <input type="password" name="account_oldpass" value="{$smarty.post.account_oldpass}" />
      </p>
      <p class="field">
        <label for="i_nouveau">Nouveau</label>
        <input type="password" name="account_newpass" value="{$smarty.post.account_newpass}" />
      </p>
      <p class="field">
        <label for="i_confpass">Confirmation</label>
        <input type="password" name="account_confpass" value="{$smarty.post.account_confpass}" />
      </p>
      <p class="submit">
      <input type="hidden" name="action" value="changepassword" />
      <input type="submit" name="modifpref" value="Enregistrer" />
      </p>
      </fieldset>
    </form>


  {elseif $smarty.post.modifpref}
    <h2><span class="deco">></span>Vos informations ont bien étés modifiées</h2>
    <p>
      Nous avons bien pris en compte vos modifications. Nos 
      serveurs ont étés mis à jour et vos nouvelles 
      informations viennent de rentrer en vigueur.
    </p>
  {/if}
  
</div>
