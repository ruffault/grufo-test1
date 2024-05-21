{$scriptjava}

<div id="forminscription">
<h2><span class="deco">></span>Fase 1 - Registrazione</h2>

{if $error_inscript && $smarty.get.error == 1}
  <div class='erreur'>
    <h3>Informazioni mancanti! Alcuni campi non sono compilati correttamente:</h3>
 
	 {if $error_inscript.badpseudo == 1}
	 	- Username non valido
	 	<p>Il tuo username deve essere composto da almeno due caratteri e non deve contenere
		caratteri speciali (accenti, segni di punteggiatura...)</p>
	 {/if}
	 
	 {if $error_inscript.loginexist == 1}- Username già in uso<br />{/if}
	 
	 {if $error_inscript.mailexist == 1}
		- Hai già un conto per questo indirizzo e-mail. Vai alla
		<a href='{$urlsite}index.php?page=lastpass'>pagina di recupero della password</a>.
		<br />
	 {/if}
	 
	 {if $error_inscript.badmail == 1}
		- Indirizzo e-mail non valido
		<p>Inserire un indirizzo e-mail valido.</p>
	 {/if}
	 
	 {if $error_inscript.badpass == 1}
	 	- Password non valida
		<p>La password deve contenere più di 5 caratteri</p>
	 {/if}
	 
	 {if $error_inscript.passnotegalconf == 1}
	 - La password e la password di conferma sono diverse<br />
	 {/if}
	 
	 {if $error_inscript.badname == 1}
	 - Cognome non valido<br />
	 {/if}
	 
	 {if $error_inscript.badsurname == 1}
	 	- Nome non valido<br />
	 {/if}
	 
	 {if $error_inscript.badadress == 1}
	 	- Indirizzo non valido<br />
	 {/if}
	 
	 {if $error_inscript.badcity == 1}
	 	- Città non valida<br />
	 {/if}
	 
	 {if $error_inscript.nocp == 1}
	 	- Codice postale obbligatorio per questo paese<br />
	 {/if}
	 
	 {if $error_inscript.badcp == 1}
		- Codice postale non valido<br />
	 {/if}

	 {if $error_inscript.badstate == 1}
		- Stato non valido<br />
	 {/if}

	 {if $error_inscript.country == 1}
		 - Paese non valido<br />
	 {/if}

	 {if $error_inscript.badphone == 1}
		 - Telefono non valido<br />
	 {/if}

	 {if $error_inscript.badfax == 1}
	 	- Fax non valido<br />
	 {/if}
	 
  </div>
{/if}
<p><em>I campi con l'asterisco * sono obbligatori.</em></p>
<form method="post" action="{$urlsite}verifforminscription.php" id='inscription'>
<fieldset>
<p class="field">
  <label for="i_pseudo">* Username</label>
  <input type="text" maxlength="20" size="20"  name="inscription_login" value="{$smarty.session.inscription_login}" />
</p>

<p class="field">
  <label for="i_pass">* Password</label>
  <input maxlength="20" size="20" type="password" name="inscription_password" value="{$smarty.session.inscription_password}" />
</p>

<p class="field">
  <label for="i_conf">* Conferma password</label>
  <input maxlength="20" size="20" type="password" name="inscription_confirmation" value="{$smarty.session.inscription_confirmation}" />
</p>

<p class="field">
    <label for="i_statut">Tipo di cliente</label>
		{if $smarty.session.inscription_societe == 1}
      <input type='radio' name='inscription_societe' value='0' onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Privato
      <input type='radio' name='inscription_societe' value='1' checked="checked" onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Azienda
		{else}
      <input type='radio' name='inscription_societe' value='0' checked="checked" onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Privato
			<input type='radio' name='inscription_societe' value='1' onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Azienda
		{/if}
</p>

<p class="field" id="champs_nomsociete" {if $smarty.session.inscription_societe == 1}style="display:block;{else}style="display:none;{/if}">
  <label for="i_nomsociete">Nome dell'azienda</label>
  <input type="text" size="39" name="inscription_nomsociete" value="{$smarty.session.inscription_nomsociete}" />
</p>

<p class="field" id="champs_intracommu" {if $smarty.session.inscription_societe == 1}style="display:block;{else}style="display:none;{/if}">
  <label for="i_intracommu">N. di IVA intra-comunitaria</label>
  <input type="text" size="39" name="inscription_intracommu" value="{$smarty.session.inscription_intracommu}" />
</p>

<p class="field">
    <label for="i_civilite">Titolo</label>
		{if $smarty.session.inscription_civilite == 1}
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Sig.
		{elseif $smarty.session.inscription_civilite ne 1 && $smarty.session.inscription_civilite ne 2 && $smarty.session.inscription_civilite ne 3}
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Sig.
		{else}
    	<input type='radio' name='inscription_civilite' value='1' /> Sig.
		{/if}
    {if $smarty.session.inscription_civilite == 2}
			<input type='radio' name='inscription_civilite' value='2' checked="checked" /> Sig.ra
		{else}
			<input type='radio' name='inscription_civilite' value='2' /> Sig.ra
		{/if}
    {if $smarty.session.inscription_civilite == 3}
			<input type='radio' name='inscription_civilite' value='3' checked="checked" /> Sig.ina
		{else}
			<input type='radio' name='inscription_civilite' value='3' /> Sig.ina
		{/if}
</p>

<p class="field">
    <label for="i_nom">* Cognome</label>
    <input type="text" size="39" name="inscription_nom" value="{$smarty.session.inscription_nom}" />
</p>

<p class="field">
    <label for="i_prenom">* Nome</label>
    <input type="text" size="39" name="inscription_prenom" value="{$smarty.session.inscription_prenom}" />
</p>

<p class="field">
    <label for="i_adresse1">* Indirizzo 1</label>
    <input type="text" size="39" name="inscription_adresse1" value="{$smarty.session.inscription_adresse1}" />
</p>

<p class="field">
    <label for="i_adresse2">Indirizzo 2</label>
    <input type="text" size="39" name="inscription_adresse2" value="{$smarty.session.inscription_adresse2}" />
</p>

<p class="field">
    <label for="i_adresse3">Indirizzo 3</label>
    <input type="text" size="39" name="inscription_adresse3" value="{$smarty.session.inscription_adresse3}" />
</p>

<p class="field">
    <label for="i_cp">* Codice postale</label>
    <input type="text" size="9" maxlength="9" name="inscription_cp" value="{$smarty.session.inscription_cp}" />
</p>

<p class="field">
    <label for="i_ville">* Città</label>
    <input type="text" size="39" name="inscription_ville" value="{$smarty.session.inscription_ville}" />
</p>

<p class="field">
    <label for="i_pays">Paese</label>
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
    <label for="i_etat">Stato / Provincia</label>
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
    <label for="i_email">* Indirizzo E-mail</label>
    <input type="text" size="39" name="inscription_email" value="{$smarty.session.inscription_email}" />

</p>

<p class="field">Spuntare la casella per ricevere la newsletter 
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
  <input type="submit" name="inscription_submit" value="Conferma" />
</p>
</fieldset>
</form>
</div>
