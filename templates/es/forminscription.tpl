{$scriptjava}

<div id="forminscription">
<h2><span class="deco">></span>Etapa 1 - Registro</h2>

{if $error_inscript && $smarty.get.error == 1}
  <div class='erreur'>
    <h3>¡Datos incompletos! La información de algunos campos es incorrecta:</h3>
 
	 {if $error_inscript.badpseudo == 1}
	 	- Seudónimo inválido
	 	<p>Su seudónimo debe contener 2 caracteres sin ningún
		carácter especial (acentos, signos de puntuación...)</p>
	 {/if}
	 
	 {if $error_inscript.loginexist == 1}- Este nombre de usuario ya existe<br />{/if}
	 
	 {if $error_inscript.mailexist == 1}
		- Ya tiene una cuenta para esta dirección electrónica. Consulte la
		<a href='{$urlsite}index.php?page=lastpass'>página de recuperación de la contraseña</a>.
		<br />
	 {/if}
	 
	 {if $error_inscript.badmail == 1}
		- E-mail no válido
		<p>Debe facilitar una dirección electrónica válida.</p>
	 {/if}
	 
	 {if $error_inscript.badpass == 1}
	 	- Contraseña no válida
		<p>La contraseña debe tener más de 5 caracteres</p>
	 {/if}
	 
	 {if $error_inscript.passnotegalconf == 1}
	 - La contraseña y su confirmación son diferentes<br />
	 {/if}
	 
	 {if $error_inscript.badname == 1}
	 - Apellidos no válidos<br />
	 {/if}
	 
	 {if $error_inscript.badsurname == 1}
	 	- Nombre no válido<br />
	 {/if}
	 
	 {if $error_inscript.badadress == 1}
	 	- Dirección no válida<br />
	 {/if}
	 
	 {if $error_inscript.badcity == 1}
	 	- Ciudad no válida<br />
	 {/if}
	 
	 {if $error_inscript.nocp == 1}
	 	- Códifo postal obligatorio para este país<br />
	 {/if}
	 
	 {if $error_inscript.badcp == 1}
		- Código postal no válido<br />
	 {/if}

	 {if $error_inscript.badstate == 1}
		- Estado no válido<br />
	 {/if}

	 {if $error_inscript.country == 1}
		 - País no válido<br />
	 {/if}

	 {if $error_inscript.badphone == 1}
		 - Teléfono no válido<br />
	 {/if}

	 {if $error_inscript.badfax == 1}
	 	- Fax no válido<br />
	 {/if}
	 
  </div>
{/if}
<p><em>Los campos con un asterisco * son obligatorios.</em></p>
<form method="post" action="verifforminscription.php" id='inscription'>
<fieldset>
<p class="field">
  <label for="i_pseudo">* Seudónimo</label>
  <input type="text" maxlength="20" size="20"  name="inscription_login" value="{$smarty.session.inscription_login}" />
</p>

<p class="field">
  <label for="i_pass">* Contraseña</label>
  <input maxlength="20" size="20" type="password" name="inscription_password" value="{$smarty.session.inscription_password}" />
</p>

<p class="field">
  <label for="i_conf">* Confirmación de la contraseña</label>
  <input maxlength="20" size="20" type="password" name="inscription_confirmation" value="{$smarty.session.inscription_confirmation}" />
</p>

<p class="field">
    <label for="i_statut">Estatuto</label>
		{if $smarty.session.inscription_societe == 1}
      <input type='radio' name='inscription_societe' value='0' onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Particular
      <input type='radio' name='inscription_societe' value='1' checked="checked" onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Empresa
		{else}
      <input type='radio' name='inscription_societe' value='0' checked="checked" onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Particular
			<input type='radio' name='inscription_societe' value='1' onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Empresa
		{/if}
</p>

<p class="field" id="champs_nomsociete" {if $smarty.session.inscription_societe == 1}style="display:block;{else}style="display:none;{/if}">
  <label for="i_nomsociete">Nombre de la empresa</label>
  <input type="text" size="39" name="inscription_nomsociete" value="{$smarty.session.inscription_nomsociete}" />
</p>

<p class="field" id="champs_intracommu" {if $smarty.session.inscription_societe == 1}style="display:block;{else}style="display:none;{/if}">
  <label for="i_intracommu">N° de IVA comunitario</label>
  <input type="text" size="39" name="inscription_intracommu" value="{$smarty.session.inscription_intracommu}" />
</p>

<p class="field">
    <label for="i_civilite">Estado civil</label>
		{if $smarty.session.inscription_civilite == 1}
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Sr.
		{elseif $smarty.session.inscription_civilite ne 1 && $smarty.session.inscription_civilite ne 2 && $smarty.session.inscription_civilite ne 3}
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Sr.
		{else}
    	<input type='radio' name='inscription_civilite' value='1' /> Sr.
		{/if}
    {if $smarty.session.inscription_civilite == 2}
			<input type='radio' name='inscription_civilite' value='2' checked="checked" /> Sra.
		{else}
			<input type='radio' name='inscription_civilite' value='2' /> Sra.
		{/if}
    {if $smarty.session.inscription_civilite == 3}
			<input type='radio' name='inscription_civilite' value='3' checked="checked" /> Srta.
		{else}
			<input type='radio' name='inscription_civilite' value='3' /> Srta.
		{/if}
</p>

<p class="field">
    <label for="i_nom">* Apellidos</label>
    <input type="text" size="39" name="inscription_nom" value="{$smarty.session.inscription_nom}" />
</p>

<p class="field">
    <label for="i_prenom">* Nombre</label>
    <input type="text" size="39" name="inscription_prenom" value="{$smarty.session.inscription_prenom}" />
</p>

<p class="field">
    <label for="i_adresse1">* Dirección 1</label>
    <input type="text" size="39" name="inscription_adresse1" value="{$smarty.session.inscription_adresse1}" />
</p>

<p class="field">
    <label for="i_adresse2">Dirección 2</label>
    <input type="text" size="39" name="inscription_adresse2" value="{$smarty.session.inscription_adresse2}" />
</p>

<p class="field">
    <label for="i_adresse3">Dirección 3</label>
    <input type="text" size="39" name="inscription_adresse3" value="{$smarty.session.inscription_adresse3}" />
</p>

<p class="field">
    <label for="i_cp">* Código postal</label>
    <input type="text" size="9" maxlength="9" name="inscription_cp" value="{$smarty.session.inscription_cp}" />
</p>

<p class="field">
    <label for="i_ville">* Ciudad</label>
    <input type="text" size="39" name="inscription_ville" value="{$smarty.session.inscription_ville}" />
</p>

<p class="field">
    <label for="i_pays">País</label>
    <select name="inscription_pays" onchange="ViewCrossReference(this);testpays(this,'champs_etat');">
      <option value=''>&nbsp;</option>
      {section name=indicatif loop=$indicatif}
			{if $smarty.session.inscription_pays}
        {if $indicatif[indicatif].abrev == $smarty.session.inscription_pays}
          <option value='{$indicatif[indicatif].abrev}' selected="selected">{$indicatif[indicatif].nom|utf8_encode}</option>
        {else}
          <option value='{$indicatif[indicatif].abrev}'>{$indicatif[indicatif].nom|utf8_encode}</option>
        {/if}
			{else}
        {if $indicatif[indicatif].abrev == 'FR'}
          <option value='{$indicatif[indicatif].abrev}' selected="selected">{$indicatif[indicatif].nom|utf8_encode}</option>
        {else}
          <option value='{$indicatif[indicatif].abrev}'>{$indicatif[indicatif].nom|utf8_encode}</option>
        {/if}
			{/if}
      {/section}
    </select>
</p>

<p class="field" {if $smarty.session.inscription_etat}style="display:block;{else}style="display:none;{/if}" id="champs_etat">
    <label for="i_etat">Estado/Provincia</label>
    <input type="text" size="39" name="inscription_etat" value="{$smarty.session.inscription_etat}" />
</p>

<p class="field">
    <label for="i_tel">* Tel</label>
		{if $smarty.session.inscription_indicatif_tel}
  	  <input type="text" size="4" maxlength="4" name="inscription_indicatif_tel" value="{$smarty.session.inscription_indicatif_tel}" />
    {else}
	    <input type="text" size="4" maxlength="4" name="inscription_indicatif_tel" value="+33" />
		{/if}
    <input type="text" size="20" maxlength="20" name="inscription_tel" value="{$smarty.session.inscription_tel}" />
</p>

<p class="field">
    <label for="i_fax">Fax</label>
    <input type="text" size="4" maxlength="4" name="inscription_indicatif_fax" value="{$smarty.session.inscription_indicatif_fax}" />
    <input type="text" size="20" maxlength="20" name="inscription_fax" value="{$smarty.session.inscription_fax}" />
</p>

<p class="field">
    <label for="i_email">* Correo electrónico</label>
    <input type="text" size="39" name="inscription_email" value="{$smarty.session.inscription_email}" />

</p>

<p class="field">Marque la casilla para recibir los boletines de información
    {if $smarty.session.inscription_info or !$smarty.get.error}
      <input type='checkbox' name='inscription_info' checked='checked' />
    {else}
      <input type='checkbox' name='inscription_info' />
    {/if}
    {if $smarty.get.newaccount == 1}
      <input type='hidden' name='newaccount' value='1' />
    {/if}
</p>

<p class="field">
  <input type="submit" name="inscription_submit" value="Confirmar" />
</p>
</fieldset>
</form>
</div>
