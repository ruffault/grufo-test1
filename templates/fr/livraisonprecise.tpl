{$scriptjava}
<div id='livraisonprecise'>
  <h2><span class="deco">></span> 2.1 - Adresse de livraison</h2>

  {if $smarty.session.error_livr}
  <div id="erreur">
  <h3>Informations manquantes ! Certains champs sont mal renseignés :</h3>
	  {if $smarty.session.error_livr.nociv == 1}
			- Civilité non renseignée<br />
		{/if}

		{if $smarty.session.error_livr.noname == 1}
			- Nom non renseigné<br />
		{/if}

		{if $smarty.session.error_livr.nosurname == 1}
			- Prénom non renseigné<br />
		{/if}

		{if $smarty.session.error_livr.noadress == 1}
			- Adresse 1 non renseignée<br />
		{/if}

		{if $smarty.session.error_livr.nocp == 1}
			- Code postal obligatoire pour ce pays<br />
		{/if}

		{if $smarty.session.error_livr.badcp == 1}
			- Code postal invalide<br />
		{/if}

		{if $smarty.session.error_livr.badstate == 1}
			- Etat invalide<br />
		{/if}

		{if $smarty.session.error_livr.badcity == 1}
			- Ville non renseignée<br />
		{/if}

		{if $smarty.session.error_livr.badcountry == 1}
			- Pays non renseigné<br />
		{/if}
	</div>
  {/if}

  <p><em>Les champs portant la mention * doivent être remplis obligatoirement.</em></p>

  <form action="{$urlsite}verifformlivraison.php" method="post">
	  <input type='hidden' name='livraison_precise' value='1' />
    <fieldset>
    <p class="field">
      <label for="i_civilite">*Civilité</label>
		{if !isset($smarty.session.livraison_civilite) or $smarty.session.livraison_civilite == 1}
		  <input type='hidden' name='livraison_precise' value='1' />
		  <input type='radio' id="i_civilite" name='livraison_civilite' value='1' checked="checked" /> M.
		{else}
			<input type='radio' id="i_civilite" name='livraison_civilite' value='1' /> M.
		{/if}
		{if $smarty.session.livraison_civilite == 2}
			<input type='radio' id="i_civilite" name='livraison_civilite' value='2' checked="checked" /> Mme
		{else}
			<input type='radio' id="i_civilite" name='livraison_civilite' value='2' /> Mme
    {/if}
		{if $smarty.session.livraison_civilite == 3}
			<input type='radio' id="i_civilite" name='livraison_civilite' value='3' checked="checked" /> Mlle
		{else}
			<input type='radio' id="i_civilite" name='livraison_civilite' value='3' /> Mlle
    {/if}

    </p>
    <p class="field">
      <label for="i_nom">*Nom</label>
      <input type="text" size="39" id="i_nom" name="livraison_nom"    
      value="{$smarty.session.livraison_nom}" />
    </p>
    <p class="field">
      <label for="i_prenom">*Prénom</label>
      <input type="text" size="39" id="i_prenom" name="livraison_prenom" 
      value="{$smarty.session.livraison_prenom}" />
    </p>
    <p class="field">
      <label for="i_adresse1">*Adresse1</label>
      <input type="text" size="39" id="i_adresse1" name="livraison_adresse1"
      value="{$smarty.session.livraison_adresse1}" />
    </p>
    <p class="field">
      <label for="i_adresse2">Adresse2</label>
      <input type="text" size="39" id="i_adresse2" name="livraison_adresse2" 
      value="{$smarty.session.livraison_adresse2}" />
    </p>
    <p class="field">
      <label for="i_adresse3">Adresse3</label>
      <input type="text" size="39" id="i_adresse3" name="livraison_adresse3" 
      value="{$smarty.session.livraison_adresse3}" />
    </p>
    <p class="field">
      <label for="i_cp">*Code postal</label>
      <input type="text" size="9" id="i_cp" maxlength="9" name="livraison_cp" 
      value="{$smarty.session.livraison_cp}" />
    </p>
    <p class="field">
      <label for="i_ville">*Ville</label>
      <input type="text" size="39" id="i_ville" name="livraison_ville" 
      value="{$smarty.session.livraison_ville}" />
    </p>
    <p class="field">
    <label for="i_pays">*Pays</label>
    <select name="livraison_pays" id="i_pays" onchange="testpays(this,'champs_etat');">
	    <option value=''>&nbsp;</option>
    	{section name=tabpays loop=$tabpays}
      	{if $smarty.session.livraison_pays == $tabpays[tabpays].abrev}
          <option value="{$tabpays[tabpays].abrev}" selected="selected">{$tabpays[tabpays].nom|utf8_encode}</option>
        {else}
          <option value="{$tabpays[tabpays].abrev}">{$tabpays[tabpays].nom|utf8_encode}</option>
        {/if}
      {/section}
    </select>
    </p>
    <p class="field" id="champs_etat" {if $smarty.session.livraison_etat}style="display:block;"{else}style="display:none;"{/if} id="champs_etat">
      <label for="i_etat">Etat/Province</label>
      <input type="text" size="39" id="i_etat" name="livraison_etat" 
      value="{$smarty.session.livraison_etat}" />
    </p>
    </fieldset>
    <fieldset>
    <p class="field">
      <input type="submit" name="livraison_submit" value="ok" />
    </p>
    </fieldset>
  </form>
</div>
