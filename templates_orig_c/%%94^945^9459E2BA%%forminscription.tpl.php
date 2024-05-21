<?php /* Smarty version 2.6.31, created on 2019-11-18 19:59:45
         compiled from fr/forminscription.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'fr/forminscription.tpl', 182, false),)), $this); ?>
<?php echo $this->_tpl_vars['scriptjava']; ?>


<div id="forminscription">


<?php if ($this->_tpl_vars['error_inscript'] && $_GET['error'] == 1): ?>
  <div class='erreur'>
    <h3>Informations manquantes ! Certains champs sont mal renseignés:</h3>
 
	 <?php if ($this->_tpl_vars['error_inscript']['badpseudo'] == 1): ?>
	 	- Pseudo invalide
	 	<p>Votre pseudo doit avoir au moins 2 caractère et ne comporter aucun
		caractères spéciaux (pas d'accents, pas de ponctuation...)</p>
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['loginexist'] == 1): ?>- Ce login est déja pris<br /><?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['mailexist'] == 1): ?>
		- Vous avez déja un compte pour cette adresse email. Rendez vous sur la
		<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass'>page de récupération du mot de passe</a>.
		<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badmail'] == 1): ?>
		- Email invalide
		<p>Vous devez fournir une adresse email valide.</p>
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badpass'] == 1): ?>
	 	- Mot de passe invalide
		<p>Le mot de passe doit faire plus de 5 caractères</p>
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['passnotegalconf'] == 1): ?>
	 - Le mot de passe et sa confirmation diffèrent<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badname'] == 1): ?>
	 - Nom invalide<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badsurname'] == 1): ?>
	 	- Prénom invalide<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badadress'] == 1): ?>
	 	- Adresse invalide<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badcity'] == 1): ?>
	 	- Ville invalide<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['nocp'] == 1): ?>
	 	- Code postal obligatoire pour ce pays<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badcp'] == 1): ?>
		- Code postal invalide<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['badstate'] == 1): ?>
		- Etat invalide<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['country'] == 1): ?>
		 - Pays invalide<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['badphone'] == 1): ?>
		 - Téléphone invalide<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['badfax'] == 1): ?>
	 	- Fax invalide<br />
	 <?php endif; ?>
	 
  </div>
<?php endif; ?>
<p><em>Les champs portant la mention * doivent être remplis obligatoirement.</em></p>
<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
verifforminscription.php" id='inscription'>
<fieldset>
<p class="field">
  <label for="i_pseudo">* Pseudo</label>
  <input type="text" maxlength="20" size="20"  name="inscription_login" value="<?php echo $_SESSION['inscription_login']; ?>
" />
</p>

<p class="field">
  <label for="i_pass">* Mot de passe</label>
  <input maxlength="20" size="20" type="password" name="inscription_password" value="<?php echo $_SESSION['inscription_password']; ?>
" />
</p>

<p class="field">
  <label for="i_conf">* Confirmation du mot de passe</label>
  <input maxlength="20" size="20" type="password" name="inscription_confirmation" value="<?php echo $_SESSION['inscription_confirmation']; ?>
" />
</p>

<p class="field">
    <label for="i_statut">Statut</label>
		<?php if ($_SESSION['inscription_societe'] == 1): ?>
      <input type='radio' name='inscription_societe' value='0' onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Particulier
      <input type='radio' name='inscription_societe' value='1' checked="checked" onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Société
		<?php else: ?>
      <input type='radio' name='inscription_societe' value='0' checked="checked" onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Particulier
			<input type='radio' name='inscription_societe' value='1' onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Société
		<?php endif; ?>
</p>

<p class="field" id="champs_nomsociete" <?php if ($_SESSION['inscription_societe'] == 1): ?>style="display:block;<?php else: ?>style="display:none;<?php endif; ?>">
  <label for="i_nomsociete">Nom de la société</label>
  <input type="text" size="39" name="inscription_nomsociete" value="<?php echo $_SESSION['inscription_nomsociete']; ?>
" />
</p>

<p class="field" id="champs_intracommu" <?php if ($_SESSION['inscription_societe'] == 1): ?>style="display:block;<?php else: ?>style="display:none;<?php endif; ?>">
  <label for="i_intracommu">N° de TVA Intra communautaire</label>
  <input type="text" size="39" name="inscription_intracommu" value="<?php echo $_SESSION['inscription_intracommu']; ?>
" />
</p>

<p class="field">
    <label for="i_civilite">Civilité</label>
		<?php if ($_SESSION['inscription_civilite'] == 1): ?>
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> M.
		<?php elseif ($_SESSION['inscription_civilite'] != 1 && $_SESSION['inscription_civilite'] != 2 && $_SESSION['inscription_civilite'] != 3): ?>
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> M.
		<?php else: ?>
    	<input type='radio' name='inscription_civilite' value='1' /> M.
		<?php endif; ?>
    <?php if ($_SESSION['inscription_civilite'] == 2): ?>
			<input type='radio' name='inscription_civilite' value='2' checked="checked" /> Mme
		<?php else: ?>
			<input type='radio' name='inscription_civilite' value='2' /> Mme
		<?php endif; ?>
    <?php if ($_SESSION['inscription_civilite'] == 3): ?>
			<input type='radio' name='inscription_civilite' value='3' checked="checked" /> Mlle
		<?php else: ?>
			<input type='radio' name='inscription_civilite' value='3' /> Mlle
		<?php endif; ?>
</p>

<p class="field">
    <label for="i_nom">* Nom</label>
    <input type="text" size="39" name="inscription_nom" value="<?php echo $_SESSION['inscription_nom']; ?>
" />
</p>

<p class="field">
    <label for="i_prenom">* Prénom</label>
    <input type="text" size="39" name="inscription_prenom" value="<?php echo $_SESSION['inscription_prenom']; ?>
" />
</p>

<p class="field">
    <label for="i_adresse1">* Adresse 1</label>
    <input type="text" size="39" name="inscription_adresse1" value="<?php echo $_SESSION['inscription_adresse1']; ?>
" />
</p>

<p class="field">
    <label for="i_adresse2">Adresse 2</label>
    <input type="text" size="39" name="inscription_adresse2" value="<?php echo $_SESSION['inscription_adresse2']; ?>
" />
</p>

<p class="field">
    <label for="i_adresse3">Adresse 3</label>
    <input type="text" size="39" name="inscription_adresse3" value="<?php echo $_SESSION['inscription_adresse3']; ?>
" />
</p>

<p class="field">
    <label for="i_cp">* Code postal</label>
    <input type="text" size="9" maxlength="9" name="inscription_cp" value="<?php echo $_SESSION['inscription_cp']; ?>
" />
</p>

<p class="field">
    <label for="i_ville">* Ville</label>
    <input type="text" size="39" name="inscription_ville" value="<?php echo $_SESSION['inscription_ville']; ?>
" />
</p>

<p class="field">
    <label for="i_pays">Pays</label>
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
    <label for="i_etat">Etat / Province</label>
    <input type="text" size="39" name="inscription_etat" value="<?php echo $_SESSION['inscription_etat']; ?>
" />
</p>

<p class="field">
    <label for="i_tel">* Tel</label>
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
    <label for="i_email">* Email</label>
    <input type="text" size="39" name="inscription_email" value="<?php echo $_SESSION['inscription_email']; ?>
" />

</p>

<p class="field">Cocher pour recevoir les lettres d'informations 
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
  <input type="submit" name="inscription_submit" value="Valider" />
</p>
</fieldset>
</form>

</div>