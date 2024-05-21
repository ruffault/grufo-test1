<?php /* Smarty version 2.6.31, created on 2019-12-31 09:33:02
         compiled from en/modifpref.tpl */ ?>
<div id="modifpref">
  <?php if (( $this->_tpl_vars['error_modif'] && $_POST['modifpref'] ) || ! $_POST['modifpref']): ?>
    <h2><span class="deco">></span>Personal Information</h2>
  
    <p>
      You can modify your personal information. 
      You can also change your password.
    </p>
    
    <?php if ($this->_tpl_vars['error_modif']): ?>
    <div id="erreur">
    <h3>Information missing! Some fields are incomplete:</h3>
    <p>

			<?php if ($this->_tpl_vars['error_modif']['noname'] == 1): ?>
				Last name not filled in <br />
			<?php endif; ?>

			<?php if ($this->_tpl_vars['error_modif']['nosurname'] == 1): ?>
				First name not filled in <br />
			<?php endif; ?>
					
			<?php if ($this->_tpl_vars['error_modif']['noadress'] == 1): ?>
				Address 1 not filled in<br />
			<?php endif; ?>	
		
			<?php if ($this->_tpl_vars['error_modif']['nocity'] == 1): ?>
				City not filled in<br />
			<?php endif; ?>	

			<?php if ($this->_tpl_vars['error_modif']['nocp'] == 1): ?>
				Invalid post code<br />
			<?php endif; ?>	

			<?php if ($this->_tpl_vars['error_modif']['nophone'] == 1): ?>
				Invalid telphone number<br />
			<?php endif; ?>	
			
			<?php if ($this->_tpl_vars['error_modif']['nofax'] == 1): ?>
				Invalid fax number<br />
			<?php endif; ?>	
						
			<?php if ($this->_tpl_vars['error_modif']['noemail'] == 1): ?>
				Email not filled in<br />
			<?php endif; ?>	

			<?php if ($this->_tpl_vars['error_modif']['nopass'] == 1): ?>
				You have entered your password incorrectly<br />
			<?php endif; ?>	

			<?php if ($this->_tpl_vars['error_modif']['badconf'] == 1): ?>
				The password and its confirmation are different<br />
			<?php endif; ?>

			<?php if ($this->_tpl_vars['error_modif']['badpass'] == 1): ?>
				New password invalid. The password must have at least 6 characters<br />
			<?php endif; ?>	
		
		</p>
    </div>
    <?php endif; ?>

    <p><em>Fields marked by * must be completed.</em></p>

    <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=modifpref">
      <fieldset>
      <h3>Contact Information</h3>

      <p class="field">
      <label for="i_civilite">*Title</label>
  		<?php if ($_POST['account_civilite'] == 1): ?>
        <input type='radio' id="i_civilite" name='account_civilite' value='1' checked='checked' /> Mr.
      <?php else: ?>
  			<input type='radio' id="i_civilite" name='account_civilite' value='1' /> Mr.
  		<?php endif; ?>
      <?php if ($_POST['account_civilite'] == 2): ?>
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' checked='checked' /> Mrs.
  		<?php else: ?>
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' /> Mrs.
  		<?php endif; ?>
      <?php if ($_POST['account_civilite'] == 3): ?>
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' checked='checked' /> Miss
  		<?php else: ?>
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' /> Miss
      <?php endif; ?>
      </p>
      <p class="field">
        <label for="i_nom">*Name</label><input type="text" name="account_nom" value="<?php echo $_POST['account_nom']; ?>
" />
      </p>
      <p class="field">
        <label for="i_prenom">*First Name</label><input type="text" name="account_prenom" value="<?php echo $_POST['account_prenom']; ?>
" />
      </p>
      <p class="field">
        <label for="i_adresse1">*Address 1</label><input type="text" name="account_adresse1" value="<?php echo $_POST['account_adresse1']; ?>
" />
      </p>
      <p class="field">
        <label for="i_adresse2">Address 2</label><input type="text" name="account_adresse2" value="<?php echo $_POST['account_adresse2']; ?>
" />
      </p>
      <p class="field">
        <label for="i_adresse3">Address 3</label><input type="text" name="account_adresse3" value="<?php echo $_POST['account_adresse3']; ?>
" />
      </p>
      <p class="field">
        <label for="i_cp">*Postal Code</label><input type="text" name="account_cp" value="<?php echo $_POST['account_cp']; ?>
" />
      </p>
      <p class="field">
        <label for="i_ville">*City</label><input type="text" name="account_ville" value="<?php echo $_POST['account_ville']; ?>
" />
      </p>
      <p class="field">
        <label for="i_etat">Country</label><input type="text" name="account_etat" value="<?php echo $_POST['account_etat']; ?>
" />
      </p>
      <p class="field">
        <label for="i_tel">*Telephone</label><input type="text" name="account_tel" value="<?php echo $_POST['account_tel']; ?>
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
          <label for="i_mailing">Receive the newsletters</label>
        <select name="account_mailinglist">
    		<?php if ($_POST['account_mailinglist'] == 1): ?>
    		  <option value='1' selected='selected'>yes</option>
    		  <option value='0'>no</option>
    		<?php else: ?>
          <option value='1'>yes</option>
    		  <option value='0' selected='selected'>no</option>
    		<?php endif; ?>
        </select>
      </p><br />
      <p class="submit">
      <input type="submit" name="modifpref" value="Save" />
      </p>
      </fieldset>
      </form>
      
      <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=modifpref">
      <fieldset>      
      <h3>Password</h3>

      <p class="field">
        <label for="i_ancien">Old</label>
        <input type="password" name="account_oldpass" value="<?php echo $_POST['account_oldpass']; ?>
" />
      </p>
      <p class="field">
        <label for="i_nouveau">New</label>
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
      <input type="submit" name="modifpref" value="Save" />
      </p>
      </fieldset>
    </form>


  <?php elseif ($_POST['modifpref']): ?>
    <h2><span class="deco">></span>Your personal information has been successfully modified</h2>
    <p>
      We have made the required modifications. Our 
      servers have been updated accordingly and the
      new information has been applied.
    </p>
  <?php endif; ?>
  
</div>