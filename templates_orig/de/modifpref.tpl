<div id="modifpref">
  {if ($error_modif && $smarty.post.modifpref) or !$smarty.post.modifpref}
    <h2><span class="deco">></span>Persönliche Angaben</h2>
  
    <p>
      Sie können die Ihre Person betreffenden Angaben ebenso wie Ihr Passwort ändern.
      
    </p>
    
    {if $error_modif}
    <div id="erreur">
    <h3>Fehlende Angaben! Einige Felder sind unvollständig ausgefüllt:</h3>
    <p>

			{if $error_modif.noname == 1}
				Nachname fehlt <br />
			{/if}

			{if $error_modif.nosurname == 1}
				Vorname fehlt <br />
			{/if}
					
			{if $error_modif.noadress == 1}
				Adresse 1 fehlt<br />
			{/if}	
		
			{if $error_modif.nocity == 1}
				Ortsname fehlt<br />
			{/if}	

			{if $error_modif.nocp == 1}
				Ungültige Postleitzahl<br />
			{/if}	

			{if $error_modif.nophone == 1}
				Ungültige Telefonnummer<br />
			{/if}	
			
			{if $error_modif.nofax == 1}
				Ungültige Faxnummer<br />
			{/if}	
						
			{if $error_modif.noemail == 1}
				E-Mail nicht angegeben<br />
			{/if}	

			{if $error_modif.nopass == 1}
				Altes Passwort falsch geschrieben<br />
			{/if}	

			{if $error_modif.badconf == 1}
				Passwort stimmt nicht mit dem erneut eingegebenen Passwort überein<br />
			{/if}

			{if $error_modif.badpass == 1}
				Neues Passwort ungültig. Das Passwort muss mindestens 6 Zeichen lang sein. <br />
			{/if}	

		</p>
    </div>
    {/if}

    <p><em>Die mit einem * versehenen Felder müssen ausgefüllt werden.</em></p>

    <form method="post" action="{$urlsite}index.php?page=modifpref">
      <fieldset>
      <h3>Persönliche Angaben</h3>

      <p class="field">
      <label for="i_civilite">*Anrede</label>
  		{if $smarty.post.account_civilite == 1}
        <input type='radio' id="i_civilite" name='account_civilite' value='1' checked='checked' /> Herr
      {else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='1' /> Herr
  		{/if}
      {if $smarty.post.account_civilite == 2 or $smarty.post.account_civilite == 3}
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' checked='checked' /> Frau
  		{else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' /> Frau
  		{/if}
      </p>
      <p class="field">
        <label for="i_nom">*Nachname</label><input type="text" name="account_nom" value="{$smarty.post.account_nom}" />
      </p>
      <p class="field">
        <label for="i_prenom">*Vorname</label><input type="text" name="account_prenom" value="{$smarty.post.account_prenom}" />
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
        <label for="i_cp">*Postleitzahl</label><input type="text" name="account_cp" value="{$smarty.post.account_cp}" />
      </p>
      <p class="field">
        <label for="i_ville">*Ort</label><input type="text" name="account_ville" value="{$smarty.post.account_ville}" />
      </p>
      <p class="field">
        <label for="i_etat">Staat</label><input type="text" name="account_etat" value="{$smarty.post.account_etat}" />
      </p>
      <p class="field">
        <label for="i_tel">*Tel.-Nr.</label><input type="text" name="account_tel" value="{$smarty.post.account_tel}" />
      </p>
      <p class="field">
        <label for="i_fax">Fax-Nr.</label><input type="text" name="account_fax" value="{$smarty.post.account_fax}" />
      </p>
      <p class="field">
        <label for="i_email">*E-mail</label><input type="text" name="account_email" value="{$smarty.post.account_email}" />
      </p>
      <p class="field">
          <label for="i_mailing">Infobriefe abonnieren</label>
        <select name="account_mailinglist">
    		{if $smarty.post.account_mailinglist == 1}
    		  <option value='1' selected='selected'>Ja</option>
    		  <option value='0'>Nein</option>
    		{else}
          <option value='1'>Ja</option>
    		  <option value='0' selected='selected'>Nein</option>
    		{/if}
        </select>
      </p><br />
      <p class="submit">
      <input type="submit" name="modifpref" value="Speichern" />
      </p>
      </fieldset>
      </form>
      
      <form method="post" action="{$urlsite}index.php?page=modifpref">
      <fieldset>      
      <h3>Passwort</h3>

      <p class="field">
        <label for="i_ancien">Altes</label>
        <input type="password" name="account_oldpass" value="{$smarty.post.account_oldpass}" />
      </p>
      <p class="field">
        <label for="i_nouveau">Neues</label>
        <input type="password" name="account_newpass" value="{$smarty.post.account_newpass}" />
      </p>
      <p class="field">
        <label for="i_confpass">Erneut eingeben</label>
        <input type="password" name="account_confpass" value="{$smarty.post.account_confpass}" />
      </p>
      <p class="submit">
      <input type="hidden" name="action" value="changepassword" />
      <input type="submit" name="modifpref" value="Speichern" />
      </p>
      </fieldset>
    </form>


  {elseif $smarty.post.modifpref}
    <h2><span class="deco">></span>Ihre Angaben wurden geändert.</h2>
    <p>
      Wir haben Ihre Änderungen übernommen. Unsere Server wurden entsprechend
      aktualisiert, die neuen Angaben sind von jetzt an gültig.
      
    </p>
  {/if}
  
</div>
