{$scriptjava}

<div id="forminscription">


{if $error_inscript && $smarty.get.error == 1}
  <div class='erreur'>
    <h3>Informations manquantes ! Certains champs sont mal renseignés:</h3>
 
	 {if $error_inscript.badpseudo == 1}
	 	- Pseudo invalide
	 	<p>Votre pseudo doit avoir au moins 2 caractère et ne comporter aucun
		caractères spéciaux (pas d'accents, pas de ponctuation...)</p>
	 {/if}
	 
	 {if $error_inscript.loginexist == 1}- Ce login est déja pris<br />{/if}
	 
	 {if $error_inscript.mailexist == 1}
		- Vous avez déja un compte pour cette adresse email. Rendez vous sur la
		<a href='{$urlsite}index.php?page=lastpass'>page de récupération du mot de passe</a>.
		<br />
	 {/if}
	 
	 {if $error_inscript.badmail == 1}
		- Email invalide
		<p>Vous devez fournir une adresse email valide.</p>
	 {/if}
	 
	 {if $error_inscript.badpass == 1}
	 	- Mot de passe invalide
		<p>Le mot de passe doit faire plus de 5 caractères</p>
	 {/if}
	 
	 {if $error_inscript.passnotegalconf == 1}
	 - Le mot de passe et sa confirmation diffèrent<br />
	 {/if}
	 
	 {if $error_inscript.badname == 1}
	 - Nom invalide<br />
	 {/if}
	 
	 {if $error_inscript.badsurname == 1}
	 	- Prénom invalide<br />
	 {/if}
	 
	 {if $error_inscript.badadress == 1}
	 	- Adresse invalide<br />
	 {/if}
	 
	 {if $error_inscript.badcity == 1}
	 	- Ville invalide<br />
	 {/if}
	 
	 {if $error_inscript.nocp == 1}
	 	- Code postal obligatoire pour ce pays<br />
	 {/if}
	 
	 {if $error_inscript.badcp == 1}
		- Code postal invalide<br />
	 {/if}

	 {if $error_inscript.badstate == 1}
		- Etat invalide<br />
	 {/if}

	 {if $error_inscript.country == 1}
		 - Pays invalide<br />
	 {/if}

	 {if $error_inscript.badphone == 1}
		 - Téléphone invalide<br />
	 {/if}

	 {if $error_inscript.badfax == 1}
	 	- Fax invalide<br />
	 {/if}
	 
  </div>
{/if}
<p><em>Les champs portant la mention * doivent être remplis obligatoirement.</em></p>
<form method="post" action="{$urlsite}verifforminscription.php" id='inscription'>
<fieldset>
<p class="field">
  <label for="i_pseudo">* Pseudo</label>
  <input type="text" maxlength="20" size="20"  name="inscription_login" value="{$smarty.session.inscription_login}" />
</p>

<p class="field">
  <label for="i_pass">* Mot de passe</label>
  <input maxlength="20" size="20" type="password" name="inscription_password" value="{$smarty.session.inscription_password}" />
</p>

<p class="field">
  <label for="i_conf">* Confirmation du mot de passe</label>
  <input maxlength="20" size="20" type="password" name="inscription_confirmation" value="{$smarty.session.inscription_confirmation}" />
</p>

<p class="field">
    <label for="i_statut">Statut</label>
		{if $smarty.session.inscription_societe == 1}
      <input type='radio' name='inscription_societe' value='0' onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Particulier
      <input type='radio' name='inscription_societe' value='1' checked="checked" onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Société
		{else}
      <input type='radio' name='inscription_societe' value='0' checked="checked" onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Particulier
			<input type='radio' name='inscription_societe' value='1' onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Société
		{/if}
</p>

<p class="field" id="champs_nomsociete" {if $smarty.session.inscription_societe == 1}style="display:block;{else}style="display:none;{/if}">
  <label for="i_nomsociete">Nom de la société</label>
  <input type="text" size="39" name="inscription_nomsociete" value="{$smarty.session.inscription_nomsociete}" />
</p>

<p class="field" id="champs_intracommu" {if $smarty.session.inscription_societe == 1}style="display:block;{else}style="display:none;{/if}">
  <label for="i_intracommu">N° de TVA Intra communautaire</label>
  <input type="text" size="39" name="inscription_intracommu" value="{$smarty.session.inscription_intracommu}" />
</p>

<p class="field">
    <label for="i_civilite">Civilité</label>
		{if $smarty.session.inscription_civilite == 1}
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> M.
		{elseif $smarty.session.inscription_civilite ne 1 && $smarty.session.inscription_civilite ne 2 && $smarty.session.inscription_civilite ne 3}
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> M.
		{else}
    	<input type='radio' name='inscription_civilite' value='1' /> M.
		{/if}
    {if $smarty.session.inscription_civilite == 2}
			<input type='radio' name='inscription_civilite' value='2' checked="checked" /> Mme
		{else}
			<input type='radio' name='inscription_civilite' value='2' /> Mme
		{/if}
    {if $smarty.session.inscription_civilite == 3}
			<input type='radio' name='inscription_civilite' value='3' checked="checked" /> Mlle
		{else}
			<input type='radio' name='inscription_civilite' value='3' /> Mlle
		{/if}
</p>

<p class="field">
    <label for="i_nom">* Nom</label>
    <input type="text" size="39" name="inscription_nom" value="{$smarty.session.inscription_nom}" />
</p>

<p class="field">
    <label for="i_prenom">* Prénom</label>
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
    <label for="i_cp">* Code postal</label>
    <input type="text" size="9" maxlength="9" name="inscription_cp" value="{$smarty.session.inscription_cp}" />
</p>

<p class="field">
    <label for="i_ville">* Ville</label>
    <input type="text" size="39" name="inscription_ville" value="{$smarty.session.inscription_ville}" />
</p>

<p class="field">
    <label for="i_pays">Pays</label>
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
    <label for="i_etat">Etat / Province</label>
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
    <label for="i_email">* Email</label>
    <input type="text" size="39" name="inscription_email" value="{$smarty.session.inscription_email}" />

</p>

<p class="field">Cocher pour recevoir les lettres d'informations 
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
  <input type="submit" name="inscription_submit" value="Valider" />
</p>
</fieldset>
</form>

</div>
