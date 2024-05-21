<?php /* Smarty version 2.6.31, created on 2019-11-21 05:29:38
         compiled from fr/modifpref.tpl */ ?>
<div id="modifpref">
  <?php if (( $this->_tpl_vars['error_modif'] && $_POST['modifpref'] ) || ! $_POST['modifpref']): ?>
    <h2><span class="deco">></span>Informations personnelles</h2>
  
    <p>
      Vous pouvez modifier les informations vous concernant. 
      Vous pouvez aussi changer de mot de passe.
    </p>
    
    <?php if ($this->_tpl_vars['error_modif']): ?>
    <div id="erreur">
    <h3>Informations manquantes ! Certains champs sont mal renseignés:</h3>
    <p>

			<?php if ($this->_tpl_vars['error_modif']['noname'] == 1): ?>
				Nom non renseigné <br />
			<?php endif; ?>

			<?php if ($this->_tpl_vars['error_modif']['nosurname'] == 1): ?>
				Prénom non renseigné <br />
			<?php endif; ?>
					
			<?php if ($this->_tpl_vars['error_modif']['noadress'] == 1): ?>
				Adresse 1 non renseignée<br />
			<?php endif; ?>	
		
			<?php if ($this->_tpl_vars['error_modif']['nocity'] == 1): ?>
				Ville non renseignée<br />
			<?php endif; ?>	

			<?php if ($this->_tpl_vars['error_modif']['nocp'] == 1): ?>
				Code postal invalide<br />
			<?php endif; ?>	

			<?php if ($this->_tpl_vars['error_modif']['nophone'] == 1): ?>
				Téléphone invalide<br />
			<?php endif; ?>	
			
			<?php if ($this->_tpl_vars['error_modif']['nofax'] == 1): ?>
				Fax invalide<br />
			<?php endif; ?>	
			
			<?php if ($this->_tpl_vars['error_modif']['noemail'] == 1): ?>
				Email non renseigné<br />
			<?php endif; ?>	

			<?php if ($this->_tpl_vars['error_modif']['nopass'] == 1): ?>
				Vous avez mal saisi votre ancien mot de passe<br />
			<?php endif; ?>	

			<?php if ($this->_tpl_vars['error_modif']['badconf'] == 1): ?>
				Le mot de passe et la confirmation diffèrent<br />
			<?php endif; ?>

			<?php if ($this->_tpl_vars['error_modif']['badpass'] == 1): ?>
				Nouveau mot de passe invalide. Le mot de passe doit faire au moins 6 caractères<br />
			<?php endif; ?>	

		</p>
    </div>
    <?php endif; ?>

    <p><em>Les champs portant la mention * doivent être remplis obligatoirement.</em></p>

    <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=modifpref">
      <fieldset>
      <h3>Coordonnées</h3>

      <p class="field">
      <label for="i_civilite">*Civilité</label>
  		<?php if ($_POST['account_civilite'] == 1): ?>
        <input type='radio' id="i_civilite" name='account_civilite' value='1' checked='checked' /> M.
      <?php else: ?>
  			<input type='radio' id="i_civilite" name='account_civilite' value='1' /> M.
  		<?php endif; ?>
      <?php if ($_POST['account_civilite'] == 2): ?>
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' checked='checked' /> Mme
  		<?php else: ?>
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' /> Mme
  		<?php endif; ?>
      <?php if ($_POST['account_civilite'] == 3): ?>
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' checked='checked' /> Mlle
  		<?php else: ?>
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' /> Mlle
      <?php endif; ?>
      </p>
      <p class="field">
        <label for="i_nom">*Nom</label><input type="text" name="account_nom" value="<?php echo $_POST['account_nom']; ?>
" />
      </p>
      <p class="field">
        <label for="i_prenom">*Prénom</label><input type="text" name="account_prenom" value="<?php echo $_POST['account_prenom']; ?>
" />
      </p>
      <p class="field">
        <label for="i_adresse1">*Adresse 1</label><input type="text" name="account_adresse1" value="<?php echo $_POST['account_adresse1']; ?>
" />
      </p>
      <p class="field">
        <label for="i_adresse2">Adresse 2</label><input type="text" name="account_adresse2" value="<?php echo $_POST['account_adresse2']; ?>
" />
      </p>
      <p class="field">
        <label for="i_adresse3">Adresse 3</label><input type="text" name="account_adresse3" value="<?php echo $_POST['account_adresse3']; ?>
" />
      </p>
      <p class="field">
        <label for="i_cp">*Code postal</label><input type="text" name="account_cp" value="<?php echo $_POST['account_cp']; ?>
" />
      </p>
      <p class="field">
        <label for="i_ville">*Ville</label><input type="text" name="account_ville" value="<?php echo $_POST['account_ville']; ?>
" />
      </p>
      <p class="field">
        <label for="i_etat">Etat</label><input type="text" name="account_etat" value="<?php echo $_POST['account_etat']; ?>
" />
      </p>
      <p class="field">
        <label for="i_tel">*Téléphone</label><input type="text" name="account_tel" value="<?php echo $_POST['account_tel']; ?>
" />
      </p>
      <p class="field">
        <label for="i_fax">Fax</label><input type="text" name="account_fax" value="<?php echo $_POST['account_fax']; ?>
" />
      </p>
      <p class="field">
        <label for="i_email">*Email</label><input type="text" name="account_email" value="<?php echo $_POST['account_email']; ?>
" />
      </p>
      <p class="field">
          <label for="i_mailing">Recevoir les lettres d'informations</label>
        <select name="account_mailinglist">
    		<?php if ($_POST['account_mailinglist'] == 1): ?>
    		  <option value='1' selected='selected'>oui</option>
    		  <option value='0'>non</option>
    		<?php else: ?>
          <option value='1'>oui</option>
    		  <option value='0' selected='selected'>non</option>
    		<?php endif; ?>
        </select>
      </p><br />
      <p class="submit">
      <input type="submit" name="modifpref" value="Enregistrer" />
      </p>
      </fieldset>
      </form>
      
      <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=modifpref">
      <fieldset>
      <h3>Mot de passe</h3>

      <p class="field">
        <label for="i_ancien">Ancien</label>
        <input type="password" name="account_oldpass" value="<?php echo $_POST['account_oldpass']; ?>
" />
      </p>
      <p class="field">
        <label for="i_nouveau">Nouveau</label>
        <input type="password" name="account_newpass" value="<?php echo $_POST['account_newpass']; ?>
" />
      </p>
      <p class="field">
        <label for="i_confpass">Confirmation</label>
        <input type="password" name="account_confpass" value="<?php echo $_POST['account_confpass']; ?>
" />
      </p>
      <p class="submit">
      <input type="hidden" name="action" value="changepassword" />
      <input type="submit" name="modifpref" value="Enregistrer" />
      </p>
      </fieldset>
    </form>


  <?php elseif ($_POST['modifpref']): ?>
    <h2><span class="deco">></span>Vos informations ont bien étés modifiées</h2>
    <p>
      Nous avons bien pris en compte vos modifications. Nos 
      serveurs ont étés mis à jour et vos nouvelles 
      informations viennent de rentrer en vigueur.
    </p>
  <?php endif; ?>
  
</div>