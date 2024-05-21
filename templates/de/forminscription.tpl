{$scriptjava}

<div id="forminscription">
<h2><span class="deco">></span>Schritt 1 - Anmeldung</h2>

{if $error_inscript && $smarty.get.error == 1}
  <div class='erreur'>
    <h3>Fehlende Angaben! Einige Felder sind unvollständig ausgefüllt:</h3>
 
	 {if $error_inscript.badpseudo == 1}
	 	- Ungültiges Pseudonym 
	 	<p>Ihr Pseudonym muss mindestens 2 Zeichen lang sein und darf keine Sonderzeichen 
     enthalten (Akzente, Satzzeichen u.a.)</p>
	 {/if}
	 
	 {if $error_inscript.loginexist == 1}- Login bereits vergeben<br />{/if}
	 
	 {if $error_inscript.mailexist == 1}
		- Sie haben bereits ein Konto für diese E-Mail-Adresse. Gehen Sie bitte zur 
		<a href='{$urlsite}index.php?page=lastpass'>Passwort-Neuvergabe</a>.
		<br />
	 {/if}
	 
	 {if $error_inscript.badmail == 1}
		- Ungültige E-Mail-Adresse
		<p>Geben Sie bitte eine gültige E-Mail-Adresse ein.</p>
	 {/if}
	 
	 {if $error_inscript.badpass == 1}
	 	- Ungültiges Passwort
		<p>Das Passwort muss mindestens 6 Zeichen lang sein</p>
	 {/if}
	 
	 {if $error_inscript.passnotegalconf == 1}
	 - Passwort stimmt nicht mit dem erneut eingegebenen Passwort überein<br />
	 {/if}
	 
	 {if $error_inscript.badname == 1}
	 - Ungültiger Nachname<br />
	 {/if}
	 
	 {if $error_inscript.badsurname == 1}
	 	- Ungültiger Vorname<br />
	 {/if}
	 
	 {if $error_inscript.badadress == 1}
	 	- Ungültige Adresse<br />
	 {/if}
	 
	 {if $error_inscript.badcity == 1}
	 	- Ungültiger Ortsname<br />
	 {/if}
	 
	 {if $error_inscript.nocp == 1}
	 	- Vorgeschriebenes Postleitzahlformat für das Land<br />
	 {/if}
	 
	 {if $error_inscript.badcp == 1}
		- Ungültige Postleitzahl<br />
	 {/if}

	 {if $error_inscript.badstate == 1}
		- Ungültiger Staat<br />
	 {/if}

	 {if $error_inscript.country == 1}
		 - Ungültiges Land<br />
	 {/if}

	 {if $error_inscript.badphone == 1}
		 - Ungültige Tel.-Nr. <br />
	 {/if}

	 {if $error_inscript.badfax == 1}
	 	- Ungültige Fax-Nr.<br />
	 {/if}
	 
  </div>
{/if}
<p><em>Die mit einem * versehenen Felder müssen ausgefüllt werden.</em></p>
<form method="post" action="{$urlsite}verifforminscription.php" id='inscription'>
<fieldset>
<p class="field">
  <label for="i_pseudo">* Pseudonym</label>
  <input type="text" maxlength="20" size="20"  name="inscription_login" value="{$smarty.session.inscription_login}" />
</p>

<p class="field">
  <label for="i_pass">* Passwort</label>
  <input maxlength="20" size="20" type="password" name="inscription_password" value="{$smarty.session.inscription_password}" />
</p>

<p class="field">
  <label for="i_conf">* Erneute Passsworteingabe</label>
  <input maxlength="20" size="20" type="password" name="inscription_confirmation" value="{$smarty.session.inscription_confirmation}" />
</p>

<p class="field">
    <label for="i_statut">Status</label>
		{if $smarty.session.inscription_societe == 1}
      <input type='radio' name='inscription_societe' value='0' onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Privatperson
      <input type='radio' name='inscription_societe' value='1' checked="checked" onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Firma
		{else}
      <input type='radio' name='inscription_societe' value='0' checked="checked" onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Privatperson
			<input type='radio' name='inscription_societe' value='1' onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Firma
		{/if}
</p>

<p class="field" id="champs_nomsociete" {if $smarty.session.inscription_societe == 1}style="display:block;{else}style="display:none;{/if}">
  <label for="i_nomsociete">Firmenname</label>
  <input type="text" size="39" name="inscription_nomsociete" value="{$smarty.session.inscription_nomsociete}" />
</p>

<p class="field" id="champs_intracommu" {if $smarty.session.inscription_societe == 1}style="display:block;{else}style="display:none;{/if}">
  <label for="i_intracommu">USt-ID-Nr.</label>
  <input type="text" size="39" name="inscription_intracommu" value="{$smarty.session.inscription_intracommu}" />
</p>

<p class="field">
    <label for="i_civilite">Civilité</label>
		{if $smarty.session.inscription_civilite == 1}
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Herr
		{elseif $smarty.session.inscription_civilite ne 1 && $smarty.session.inscription_civilite ne 2 && $smarty.session.inscription_civilite ne 3}
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Herr
		{else}
    	<input type='radio' name='inscription_civilite' value='1' /> Herr
		{/if}
    {if $smarty.session.inscription_civilite == 2 or $smarty.session.inscription_civilite == 3}
			<input type='radio' name='inscription_civilite' value='2' checked="checked" /> Frau
		{else}
			<input type='radio' name='inscription_civilite' value='2' /> Frau
		{/if}
</p>

<p class="field">
    <label for="i_nom">* Nachname</label>
    <input type="text" size="39" name="inscription_nom" value="{$smarty.session.inscription_nom}" />
</p>

<p class="field">
    <label for="i_prenom">* Vorname</label>
    <input type="text" size="39" name="inscription_prenom" value="{$smarty.session.inscription_prenom}" />
</p>

<p class="field">
    <label for="i_adresse1">* Adresse 1</label>
    <input type="text" size="39" name="inscription_adresse1" value="{$smarty.session.inscription_adresse1}" />
</p>

<p class="field">
    <label for="i_adresse2">Adresse 2</label>
    <input type="text" size="39" name="inscription_adresse2" value="{$smarty.session.inscription_adresse2}" />
</p>

<p class="field">
    <label for="i_adresse3">Adresse 3</label>
    <input type="text" size="39" name="inscription_adresse3" value="{$smarty.session.inscription_adresse3}" />
</p>

<p class="field">
    <label for="i_cp">* Postleitzahl</label>
    <input type="text" size="9" maxlength="9" name="inscription_cp" value="{$smarty.session.inscription_cp}" />
</p>

<p class="field">
    <label for="i_ville">* Ort</label>
    <input type="text" size="39" name="inscription_ville" value="{$smarty.session.inscription_ville}" />
</p>

<p class="field">
    <label for="i_pays">Land</label>
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
    <label for="i_etat">Staat / Provinz</label>
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
    <label for="i_email">* E-Mail</label>
    <input type="text" size="39" name="inscription_email" value="{$smarty.session.inscription_email}" />

</p>

<p class="field">Ankreuzen, um Infobrief zu abonnieren 
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
  <input type="submit" name="inscription_submit" value="Bestätigen" />
</p>
</fieldset>
</form>
</div>
