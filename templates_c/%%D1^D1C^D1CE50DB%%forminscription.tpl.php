<?php /* Smarty version 2.6.31, created on 2019-12-08 08:56:18
         compiled from en/forminscription.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'en/forminscription.tpl', 181, false),)), $this); ?>
<?php echo $this->_tpl_vars['scriptjava']; ?>


<div id="forminscription">
<h2><span class="deco">></span>Step 1 - Registration</h2>

<?php if ($this->_tpl_vars['error_inscript'] && $_GET['error'] == 1): ?>
  <div class='erreur'>
    <h3>Information missing! Some fields are incorrectly completed:</h3>

	 <?php if ($this->_tpl_vars['error_inscript']['badpseudo'] == 1): ?>
	 	- Invalid alias
	 	<p>Your alias must have at least 2 characters and not contain any 
		special characters (no accents, no punctuation, etc.)</p>
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['loginexist'] == 1): ?>- This login is already taken<br /><?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['mailexist'] == 1): ?>
		- You already have an account for this e-mail address. Please go to the
		<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass'>password recovery page</a>.
		<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badmail'] == 1): ?>
		- Invalid e-mail
		<p>You must provide a valid e-mail address.</p>
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badpass'] == 1): ?>
	 	- Invalid password
		<p>The password must have more than 5 characters</p>
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['passnotegalconf'] == 1): ?>
	 - The password and its confirmation are different<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badname'] == 1): ?>
	 - Invalid last name<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badsurname'] == 1): ?>
	 	- Invalid first name<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badadress'] == 1): ?>
	 	- Invalid address<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badcity'] == 1): ?>
	 	- Invalid city<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['nocp'] == 1): ?>
	 	- Post code mandatory for this country<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badcp'] == 1): ?>
		- Invalid post code<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['badstate'] == 1): ?>
		- Invalid state<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['country'] == 1): ?>
		 - Invalid country<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['badphone'] == 1): ?>
		 - Invalid telephone number<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['badfax'] == 1): ?>
	 	- Invalid fax number<br />
	 <?php endif; ?>
  </div>
<?php endif; ?>
<p><em>Fields with a * must be completed.</em></p>
<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
verifforminscription.php" id='inscription'>
<fieldset>
<p class="field">
  <label for="i_pseudo">* Alias</label>
  <input type="text" maxlength="20" size="20"  name="inscription_login" value="<?php echo $_SESSION['inscription_login']; ?>
" />
</p>

<p class="field">
  <label for="i_pass">* Password</label>
  <input maxlength="20" size="20" type="password" name="inscription_password" value="<?php echo $_SESSION['inscription_password']; ?>
" />
</p>

<p class="field">
  <label for="i_conf">* Confirm password</label>
  <input maxlength="20" size="20" type="password" name="inscription_confirmation" value="<?php echo $_SESSION['inscription_confirmation']; ?>
" />
</p>

<p class="field">
    <label for="i_statut">Status</label>
		<?php if ($_SESSION['inscription_societe'] == 1): ?>
      <input type='radio' name='inscription_societe' value='0' onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Individual person
      <input type='radio' name='inscription_societe' value='1' checked="checked" onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Company
		<?php else: ?>
      <input type='radio' name='inscription_societe' value='0' checked="checked" onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Individual person
			<input type='radio' name='inscription_societe' value='1' onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Company
		<?php endif; ?>
</p>

<p class="field" id="champs_nomsociete" <?php if ($_SESSION['inscription_societe'] == 1): ?>style="display:block;<?php else: ?>style="display:none;<?php endif; ?>">
  <label for="i_nomsociete">Company name</label>
  <input type="text" size="39" name="inscription_nomsociete" value="<?php echo $_SESSION['inscription_nomsociete']; ?>
" />
</p>

<p class="field" id="champs_intracommu" <?php if ($_SESSION['inscription_societe'] == 1): ?>style="display:block;<?php else: ?>style="display:none;<?php endif; ?>">
  <label for="i_intracommu">Intra-Community VAT number</label>
  <input type="text" size="39" name="inscription_intracommu" value="<?php echo $_SESSION['inscription_intracommu']; ?>
" />
</p>

<p class="field">
    <label for="i_civilite">Title</label>
		<?php if ($_SESSION['inscription_civilite'] == 1): ?>
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Mr.
		<?php elseif ($_SESSION['inscription_civilite'] != 1 && $_SESSION['inscription_civilite'] != 2 && $_SESSION['inscription_civilite'] != 3): ?>
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Mr.
		<?php else: ?>
    	<input type='radio' name='inscription_civilite' value='1' /> Mr.
		<?php endif; ?>
    <?php if ($_SESSION['inscription_civilite'] == 2): ?>
			<input type='radio' name='inscription_civilite' value='2' checked="checked" /> Mrs.
		<?php else: ?>
			<input type='radio' name='inscription_civilite' value='2' /> Mrs.
		<?php endif; ?>
    <?php if ($_SESSION['inscription_civilite'] == 3): ?>
			<input type='radio' name='inscription_civilite' value='3' checked="checked" /> Miss
		<?php else: ?>
			<input type='radio' name='inscription_civilite' value='3' /> Miss
		<?php endif; ?>
</p>

<p class="field">
    <label for="i_nom">* Last name</label>
    <input type="text" size="39" name="inscription_nom" value="<?php echo $_SESSION['inscription_nom']; ?>
" />
</p>

<p class="field">
    <label for="i_prenom">* First name</label>
    <input type="text" size="39" name="inscription_prenom" value="<?php echo $_SESSION['inscription_prenom']; ?>
" />
</p>

<p class="field">
    <label for="i_adresse1">* Address 1</label>
    <input type="text" size="39" name="inscription_adresse1" value="<?php echo $_SESSION['inscription_adresse1']; ?>
" />
</p>

<p class="field">
    <label for="i_adresse2">Address 2</label>
    <input type="text" size="39" name="inscription_adresse2" value="<?php echo $_SESSION['inscription_adresse2']; ?>
" />
</p>

<p class="field">
    <label for="i_adresse3">Address 3</label>
    <input type="text" size="39" name="inscription_adresse3" value="<?php echo $_SESSION['inscription_adresse3']; ?>
" />
</p>

<p class="field">
    <label for="i_cp">* Post code</label>
    <input type="text" size="9" maxlength="9" name="inscription_cp" value="<?php echo $_SESSION['inscription_cp']; ?>
" />
</p>

<p class="field">
    <label for="i_ville">* City</label>
    <input type="text" size="39" name="inscription_ville" value="<?php echo $_SESSION['inscription_ville']; ?>
" />
</p>

<p class="field">
    <label for="i_pays">Country</label>
    <select name="inscription_pays" onchange="ViewCrossReference(this);testpays(this,'champs_etat');">
      <option value=''>&nbsp;</option>
      <?php unset($this->_sections['indicatif']);
$this->_sections['indicatif']['name'] = 'indicatif';
$this->_sections['indicatif']['loop'] = is_array($_loop=$this->_tpl_vars['indicatif']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['indicatif']['show'] = true;
$this->_sections['indicatif']['max'] = $this->_sections['indicatif']['loop'];
$this->_sections['indicatif']['step'] = 1;
$this->_sections['indicatif']['start'] = $this->_sections['indicatif']['step'] > 0 ? 0 : $this->_sections['indicatif']['loop']-1;
if ($this->_sections['indicatif']['show']) {
    $this->_sections['indicatif']['total'] = $this->_sections['indicatif']['loop'];
    if ($this->_sections['indicatif']['total'] == 0)
        $this->_sections['indicatif']['show'] = false;
} else
    $this->_sections['indicatif']['total'] = 0;
if ($this->_sections['indicatif']['show']):

            for ($this->_sections['indicatif']['index'] = $this->_sections['indicatif']['start'], $this->_sections['indicatif']['iteration'] = 1;
                 $this->_sections['indicatif']['iteration'] <= $this->_sections['indicatif']['total'];
                 $this->_sections['indicatif']['index'] += $this->_sections['indicatif']['step'], $this->_sections['indicatif']['iteration']++):
$this->_sections['indicatif']['rownum'] = $this->_sections['indicatif']['iteration'];
$this->_sections['indicatif']['index_prev'] = $this->_sections['indicatif']['index'] - $this->_sections['indicatif']['step'];
$this->_sections['indicatif']['index_next'] = $this->_sections['indicatif']['index'] + $this->_sections['indicatif']['step'];
$this->_sections['indicatif']['first']      = ($this->_sections['indicatif']['iteration'] == 1);
$this->_sections['indicatif']['last']       = ($this->_sections['indicatif']['iteration'] == $this->_sections['indicatif']['total']);
?>
			<?php if ($_SESSION['inscription_pays']): ?>
        <?php if ($this->_tpl_vars['indicatif'][$this->_sections['indicatif']['index']]['abrev'] == $_SESSION['inscription_pays']): ?>
          <option value='<?php echo $this->_tpl_vars['indicatif'][$this->_sections['indicatif']['index']]['abrev']; ?>
' selected="selected"><?php echo ((is_array($_tmp=$this->_tpl_vars['indicatif'][$this->_sections['indicatif']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</option>
        <?php else: ?>
          <option value='<?php echo $this->_tpl_vars['indicatif'][$this->_sections['indicatif']['index']]['abrev']; ?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['indicatif'][$this->_sections['indicatif']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</option>
        <?php endif; ?>
			<?php else: ?>
        <?php if ($this->_tpl_vars['indicatif'][$this->_sections['indicatif']['index']]['abrev'] == 'FR'): ?>
          <option value='<?php echo $this->_tpl_vars['indicatif'][$this->_sections['indicatif']['index']]['abrev']; ?>
' selected="selected"><?php echo ((is_array($_tmp=$this->_tpl_vars['indicatif'][$this->_sections['indicatif']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</option>
        <?php else: ?>
          <option value='<?php echo $this->_tpl_vars['indicatif'][$this->_sections['indicatif']['index']]['abrev']; ?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['indicatif'][$this->_sections['indicatif']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</option>
        <?php endif; ?>
			<?php endif; ?>
      <?php endfor; endif; ?>
    </select>
</p>

<p class="field" <?php if ($_SESSION['inscription_etat']): ?>style="display:block;<?php else: ?>style="display:none;<?php endif; ?>" id="champs_etat">
    <label for="i_etat">State/Province</label>
    <input type="text" size="39" name="inscription_etat" value="<?php echo $_SESSION['inscription_etat']; ?>
" />
</p>

<p class="field">
    <label for="i_tel">* Tel.</label>
		<?php if ($_SESSION['inscription_indicatif_tel']): ?>
  	  <input type="text" size="4" maxlength="4" name="inscription_indicatif_tel" value="<?php echo $_SESSION['inscription_indicatif_tel']; ?>
" />
    <?php else: ?>
	    <input type="text" size="4" maxlength="4" name="inscription_indicatif_tel" value="+33" />
		<?php endif; ?>
    <input type="text" size="20" maxlength="20" name="inscription_tel" value="<?php echo $_SESSION['inscription_tel']; ?>
" />
</p>

<p class="field">
    <label for="i_fax">Fax</label>
    <input type="text" size="4" maxlength="4" name="inscription_indicatif_fax" value="<?php echo $_SESSION['inscription_indicatif_fax']; ?>
" />
    <input type="text" size="20" maxlength="20" name="inscription_fax" value="<?php echo $_SESSION['inscription_fax']; ?>
" />
</p>

<p class="field">
    <label for="i_email">* E-mail</label>
    <input type="text" size="39" name="inscription_email" value="<?php echo $_SESSION['inscription_email']; ?>
" />

</p>

<p class="field">Tick here to receive our newsletters 
    <?php if ($_SESSION['inscription_info'] || ! $_GET['error']): ?>
      <input type='checkbox' name='inscription_info' checked='checked' />
    <?php else: ?>
      <input type='checkbox' name='inscription_info' />
    <?php endif; ?>
    <?php if ($_GET['newaccount'] == 1): ?>
      <input type='hidden' name='newaccount' value='1' />
    <?php endif; ?>
</p>

<p class="field">
  <input type="submit" name="inscription_submit" value="Send" />
</p>
</fieldset>
</form>
</div>