<div id="modifpref">
  {if ($error_modif && $smarty.post.modifpref) or !$smarty.post.modifpref}
    <h2><span class="deco">></span>Dati personali</h2>
  
    <p>
      Puoi modificare i tuoi dati. 
      Puoi anche modificare la tua password.
    </p>
    
    {if $error_modif}
    <div id="erreur">
    <h3>Informazioni mancanti! Alcuni campi non sono compilati correttamente:</h3>
    <p>

			{if $error_modif.noname == 1}
				Cognome non inserito<br />
			{/if}

			{if $error_modif.nosurname == 1}
				Nome non inserito<br />
			{/if}
					
			{if $error_modif.noadress == 1}
				Indirizzo 1 non inserito<br />
			{/if}	
		
			{if $error_modif.nocity == 1}
				Città non inserita<br />
			{/if}	

			{if $error_modif.nocp == 1}
				Codice postale non valido<br />
			{/if}	

			{if $error_modif.nophone == 1}
				Telefono non valido<br />
			{/if}	
			
			{if $error_modif.nofax == 1}
				Fax non valido<br />
			{/if}
						
			{if $error_modif.noemail == 1}
				Email non inserito<br />
			{/if}	

			{if $error_modif.nopass == 1}
				Hai inserito la tua vecchia password in modo scorretto<br />
			{/if}	

			{if $error_modif.badconf == 1}
				La password e la password di conferma sono diverse<br />
			{/if}

			{if $error_modif.badpass == 1}
				Nuova password non valida. La password deve contenere almeno 6 caratteri<br />
			{/if}	

		</p>
    </div>
    {/if}

    <p><em>I campi con l'asterisco * sono obbligatori.</em></p>

    <form method="post" action="{$urlsite}index.php?page=modifpref">
      <fieldset>
      <h3>Coordinate</h3>

      <p class="field">
      <label for="i_civilite">*Titolo</label>
  		{if $smarty.post.account_civilite == 1}
        <input type='radio' id="i_civilite" name='account_civilite' value='1' checked='checked' /> Sig.
      {else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='1' /> Sig.
  		{/if}
      {if $smarty.post.account_civilite == 2}
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' checked='checked' /> Sig.ra
  		{else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' /> Sig.ra
  		{/if}
      {if $smarty.post.account_civilite == 3}
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' checked='checked' /> Sig.ina
  		{else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' /> Sig.ina
      {/if}
      </p>
      <p class="field">
        <label for="i_nom">*Cognome</label><input type="text" name="account_nom" value="{$smarty.post.account_nom}" />
      </p>
      <p class="field">
        <label for="i_prenom">*Nome</label><input type="text" name="account_prenom" value="{$smarty.post.account_prenom}" />
      </p>
      <p class="field">
        <label for="i_adresse1">*Indirizzo 1</label><input type="text" name="account_adresse1" value="{$smarty.post.account_adresse1}" />
      </p>
      <p class="field">
        <label for="i_adresse2">Indirizzo 2</label><input type="text" name="account_adresse2" value="{$smarty.post.account_adresse2}" />
      </p>
      <p class="field">
        <label for="i_adresse3">Indirizzo 3</label><input type="text" name="account_adresse3" value="{$smarty.post.account_adresse3}" />
      </p>
      <p class="field">
        <label for="i_cp">*Codice postale</label><input type="text" name="account_cp" value="{$smarty.post.account_cp}" />
      </p>
      <p class="field">
        <label for="i_ville">*Città</label><input type="text" name="account_ville" value="{$smarty.post.account_ville}" />
      </p>
      <p class="field">
        <label for="i_etat">Stato</label><input type="text" name="account_etat" value="{$smarty.post.account_etat}" />
      </p>
      <p class="field">
        <label for="i_tel">*Telefono</label><input type="text" name="account_tel" value="{$smarty.post.account_tel}" />
      </p>
      <p class="field">
        <label for="i_fax">Fax</label><input type="text" name="account_fax" value="{$smarty.post.account_fax}" />
      </p>
      <p class="field">
        <label for="i_email">*Email</label><input type="text" name="account_email" value="{$smarty.post.account_email}" />
      </p>
      <p class="field">
          <label for="i_mailing">Ricevi la nostra newsletter</label>
        <select name="account_mailinglist">
    		{if $smarty.post.account_mailinglist == 1}
    		  <option value='1' selected='selected'>sì</option>
    		  <option value='0'>no</option>
    		{else}
          <option value='1'>sì</option>
    		  <option value='0' selected='selected'>no</option>
    		{/if}
        </select>
      </p><br />
      <p class="submit">
      <input type="submit" name="modifpref" value="Salva" />
      </p>
      </fieldset>
      </form>
      
      <form method="post" action="{$urlsite}index.php?page=modifpref">
      <fieldset>      
      <h3>Password</h3>

      <p class="field">
        <label for="i_ancien">Vecchia password</label>
        <input type="password" name="account_oldpass" value="{$smarty.post.account_oldpass}" />
      </p>
      <p class="field">
        <label for="i_nouveau">Nuova password</label>
        <input type="password" name="account_newpass" value="{$smarty.post.account_newpass}" />
      </p>
      <p class="field">
        <label for="i_confpass">Conferma password</label>
        <input type="password" name="account_confpass" value="{$smarty.post.account_confpass}" />
      </p>
      <p class="submit">
      <input type="hidden" name="action" value="changepassword" />
      <input type="submit" name="modifpref" value="Salva" />
      </p>
      </fieldset>
    </form>


  {elseif $smarty.post.modifpref}
    <h2><span class="deco">></span>I tuoi dati sono stati modificati</h2>
    <p>
      Abbiamo registrato le modifiche apportate. Il 
      nostro server è stato aggiornato e i tuoi nuovi  
      dati sono stati salvati.
    </p>
  {/if}
  
</div>
