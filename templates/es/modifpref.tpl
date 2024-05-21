<div id="modifpref">
	{if ($error_modif && $smarty.post.modifpref) or !$smarty.post.modifpref}
    <h2><span class="deco">></span>Datos personales</h2>
  
    <p>
      Puede modificar sus datos personales.
      También puede cambiar su contraseña.
		</p>

    {if $error_modif}
    <div id="erreur">
    <h3>¡Datos incompletos! La información de algunos campos es incorrecta:</h3>
    <p>

			{if $error_modif.noname == 1}
				Apellidos obligatorios <br />
			{/if}

			{if $error_modif.nosurname == 1}
				Nombre obligatorio <br />
			{/if}
					
			{if $error_modif.noadress == 1}
				Dirección 1 obligatoria<br />
			{/if}	
		
			{if $error_modif.nocity == 1}
				Ciudad obligatoria<br />
			{/if}	

			{if $error_modif.nocp == 1}
				Código postal no válido<br />
			{/if}	

			{if $error_modif.nophone == 1}
				Teléfono no válido<br />
			{/if}	
			
			{if $error_modif.nofax == 1}
				Fax no válido<br />
			{/if}	
						
			{if $error_modif.noemail == 1}
				Email obligatorio<br />
			{/if}	

			{if $error_modif.nopass == 1}
				La antigua contraseña introducida es incorrecta<br />
			{/if}	

			{if $error_modif.badconf == 1}
				LA contraseña y su confirmación son diferentes<br />
			{/if}

			{if $error_modif.badpass == 1}
				Nueva contraseña no válida. La contraseña debe contener 6 caracteres como mínimo.<br />
			{/if}	

		</p>
    </div>
    {/if}
    
		<p><em>Los campos con un asterisco * son obligatorios.</em></p>

    <form method="post" action="index.php?page=modifpref">
      <fieldset>
      <h3>Datos</h3>

      <p class="field">
      <label for="i_civilite">*Estado civil</label>
  		{if $smarty.post.account_civilite == 1}
        <input type='radio' id="i_civilite" name='account_civilite' value='1' checked='checked' /> Sr.
      {else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='1' /> Sr.
  		{/if}
      {if $smarty.post.account_civilite == 2}
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' checked='checked' /> Sra.
  		{else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' /> Sra.
  		{/if}
      {if $smarty.post.account_civilite == 3}
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' checked='checked' /> Srta.
  		{else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' /> Srta.
      {/if}
      </p>
      <p class="field">
        <label for="i_nom">*Apellidos</label><input type="text" name="account_nom" value="{$smarty.post.account_nom}" />
      </p>
      <p class="field">
        <label for="i_prenom">*Nombre</label><input type="text" name="account_prenom" value="{$smarty.post.account_prenom}" />
      </p>
      <p class="field">
        <label for="i_adresse1">*Dirección 1</label><input type="text" name="account_adresse1" value="{$smarty.post.account_adresse1}" />
      </p>
      <p class="field">
        <label for="i_adresse2">Dirección 2</label><input type="text" name="account_adresse2" value="{$smarty.post.account_adresse2}" />
      </p>
      <p class="field">
        <label for="i_adresse3">Dirección 3</label><input type="text" name="account_adresse3" value="{$smarty.post.account_adresse3}" />
      </p>
      <p class="field">
        <label for="i_cp">*Código postal</label><input type="text" name="account_cp" value="{$smarty.post.account_cp}" />
      </p>
      <p class="field">
        <label for="i_ville">*Ciudad</label><input type="text" name="account_ville" value="{$smarty.post.account_ville}" />
      </p>
      <p class="field">
        <label for="i_etat">Estado</label><input type="text" name="account_etat" value="{$smarty.post.account_etat}" />
      </p>
      <p class="field">
        <label for="i_tel">*Teléfono</label><input type="text" name="account_tel" value="{$smarty.post.account_tel}" />
      </p>
      <p class="field">
        <label for="i_fax">Fax</label><input type="text" name="account_fax" value="{$smarty.post.account_fax}" />
      </p>
      <p class="field">
        <label for="i_email">*Email</label><input type="text" name="account_email" value="{$smarty.post.account_email}" />
      </p>
      <p class="field">
          <label for="i_mailing">Recibir los boletines de información</label>
        <select name="account_mailinglist">
    		{if $smarty.post.account_mailinglist == 1}
    		  <option value='1' selected='selected'>sí</option>
    		  <option value='0'>no</option>
    		{else}
          <option value='1'>sí</option>
    		  <option value='0' selected='selected'>no</option>
    		{/if}
        </select>
      </p><br />
      <p class="submit">
      <input type="submit" name="modifpref" value="Guardar" />
      </p>
      </fieldset>
      </form>
      
      <form method="post" action="{$urlsite}index.php?page=modifpref">
      <fieldset>      
      <h3>Contraseña</h3>

      <p class="field">
        <label for="i_ancien">Antigua</label>
        <input type="password" name="account_oldpass" value="{$smarty.post.account_oldpass}" />
      </p>
      <p class="field">
        <label for="i_nouveau">Nueva</label>
        <input type="password" name="account_newpass" value="{$smarty.post.account_newpass}" />
      </p>
      <p class="field">
        <label for="i_confpass">Confirmación</label>
        <input type="password" name="account_confpass" value="{$smarty.post.account_confpass}" />
      </p>
      <p class="submit">
      <input type="hidden" name="action" value="changepassword" />
      <input type="submit" name="modifpref" value="Guardar" />
      </p>
      </fieldset>
    </form>


  {elseif $smarty.post.modifpref}
    <h2><span class="deco">></span>Sus modificaciones han sido registradas correctamente</h2>
    <p>
      Hemos registrado sus modificaciones. Nuestros
      servidores han sido actualizados.
   </p>
  {/if}
  
</div>
