{$scriptjava}

<div id="forminscription">
<h2><span class="deco">></span>Step 1 - Registration</h2>

{if $error_inscript && $smarty.get.error == 1}
  <div class='erreur'>
    <h3>Information missing! Some fields are incorrectly completed:</h3>

	 {if $error_inscript.badpseudo == 1}
	 	- Invalid alias
	 	<p>Your alias must have at least 2 characters and not contain any 
		special characters (no accents, no punctuation, etc.)</p>
	 {/if}
	 
	 {if $error_inscript.loginexist == 1}- This login is already taken<br />{/if}
	 
	 {if $error_inscript.mailexist == 1}
		- You already have an account for this e-mail address. Please go to the
		<a href='{$urlsite}index.php?page=lastpass'>password recovery page</a>.
		<br />
	 {/if}
	 
	 {if $error_inscript.badmail == 1}
		- Invalid e-mail
		<p>You must provide a valid e-mail address.</p>
	 {/if}
	 
	 {if $error_inscript.badpass == 1}
	 	- Invalid password
		<p>The password must have more than 5 characters</p>
	 {/if}
	 
	 {if $error_inscript.passnotegalconf == 1}
	 - The password and its confirmation are different<br />
	 {/if}
	 
	 {if $error_inscript.badname == 1}
	 - Invalid last name<br />
	 {/if}
	 
	 {if $error_inscript.badsurname == 1}
	 	- Invalid first name<br />
	 {/if}
	 
	 {if $error_inscript.badadress == 1}
	 	- Invalid address<br />
	 {/if}
	 
	 {if $error_inscript.badcity == 1}
	 	- Invalid city<br />
	 {/if}
	 
	 {if $error_inscript.nocp == 1}
	 	- Post code mandatory for this country<br />
	 {/if}
	 
	 {if $error_inscript.badcp == 1}
		- Invalid post code<br />
	 {/if}

	 {if $error_inscript.badstate == 1}
		- Invalid state<br />
	 {/if}

	 {if $error_inscript.country == 1}
		 - Invalid country<br />
	 {/if}

	 {if $error_inscript.badphone == 1}
		 - Invalid telephone number<br />
	 {/if}

	 {if $error_inscript.badfax == 1}
	 	- Invalid fax number<br />
	 {/if}
  </div>
{/if}
<p><em>Fields with a * must be completed.</em></p>
<form method="post" action="{$urlsite}verifforminscription.php" id='inscription'>
<fieldset>
<p class="field">
  <label for="i_pseudo">* Alias</label>
  <input type="text" maxlength="20" size="20"  name="inscription_login" value="{$smarty.session.inscription_login}" />
</p>

<p class="field">
  <label for="i_pass">* Password</label>
  <input maxlength="20" size="20" type="password" name="inscription_password" value="{$smarty.session.inscription_password}" />
</p>

<p class="field">
  <label for="i_conf">* Confirm password</label>
  <input maxlength="20" size="20" type="password" name="inscription_confirmation" value="{$smarty.session.inscription_confirmation}" />
</p>

<p class="field">
    <label for="i_statut">Status</label>
		{if $smarty.session.inscription_societe == 1}
      <input type='radio' name='inscription_societe' value='0' onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Individual person
      <input type='radio' name='inscription_societe' value='1' checked="checked" onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Company
		{else}
      <input type='radio' name='inscription_societe' value='0' checked="checked" onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Individual person
			<input type='radio' name='inscription_societe' value='1' onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Company
		{/if}
</p>

<p class="field" id="champs_nomsociete" {if $smarty.session.inscription_societe == 1}style="display:block;{else}style="display:none;{/if}">
  <label for="i_nomsociete">Company name</label>
  <input type="text" size="39" name="inscription_nomsociete" value="{$smarty.session.inscription_nomsociete}" />
</p>

<p class="field" id="champs_intracommu" {if $smarty.session.inscription_societe == 1}style="display:block;{else}style="display:none;{/if}">
  <label for="i_intracommu">Intra-Community VAT number</label>
  <input type="text" size="39" name="inscription_intracommu" value="{$smarty.session.inscription_intracommu}" />
</p>

<p class="field">
    <label for="i_civilite">Title</label>
		{if $smarty.session.inscription_civilite == 1}
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Mr.
		{elseif $smarty.session.inscription_civilite ne 1 && $smarty.session.inscription_civilite ne 2 && $smarty.session.inscription_civilite ne 3}
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Mr.
		{else}
    	<input type='radio' name='inscription_civilite' value='1' /> Mr.
		{/if}
    {if $smarty.session.inscription_civilite == 2}
			<input type='radio' name='inscription_civilite' value='2' checked="checked" /> Mrs.
		{else}
			<input type='radio' name='inscription_civilite' value='2' /> Mrs.
		{/if}
    {if $smarty.session.inscription_civilite == 3}
			<input type='radio' name='inscription_civilite' value='3' checked="checked" /> Miss
		{else}
			<input type='radio' name='inscription_civilite' value='3' /> Miss
		{/if}
</p>

<p class="field">
    <label for="i_nom">* Last name</label>
    <input type="text" size="39" name="inscription_nom" value="{$smarty.session.inscription_nom}" />
</p>

<p class="field">
    <label for="i_prenom">* First name</label>
    <input type="text" size="39" name="inscription_prenom" value="{$smarty.session.inscription_prenom}" />
</p>

<p class="field">
    <label for="i_adresse1">* Address 1</label>
    <input type="text" size="39" name="inscription_adresse1" value="{$smarty.session.inscription_adresse1}" />
</p>

<p class="field">
    <label for="i_adresse2">Address 2</label>
    <input type="text" size="39" name="inscription_adresse2" value="{$smarty.session.inscription_adresse2}" />
</p>

<p class="field">
    <label for="i_adresse3">Address 3</label>
    <input type="text" size="39" name="inscription_adresse3" value="{$smarty.session.inscription_adresse3}" />
</p>

<p class="field">
    <label for="i_cp">* Post code</label>
    <input type="text" size="9" maxlength="9" name="inscription_cp" value="{$smarty.session.inscription_cp}" />
</p>

<p class="field">
    <label for="i_ville">* City</label>
    <input type="text" size="39" name="inscription_ville" value="{$smarty.session.inscription_ville}" />
</p>

<p class="field">
    <label for="i_pays">Country</label>
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
    <label for="i_etat">State/Province</label>
    <input type="text" size="39" name="inscription_etat" value="{$smarty.session.inscription_etat}" />
</p>

<p class="field">
    <label for="i_tel">* Tel.</label>
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
    <label for="i_email">* E-mail</label>
    <input type="text" size="39" name="inscription_email" value="{$smarty.session.inscription_email}" />

</p>

<p class="field">Tick here to receive our newsletters 
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
  <input type="submit" name="inscription_submit" value="Send" />
</p>
</fieldset>
</form>
</div>
