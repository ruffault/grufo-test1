<?php /* Smarty version 2.6.31, created on 2019-12-31 07:45:33
         compiled from it/forminscription.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'it/forminscription.tpl', 182, false),)), $this); ?>
<?php echo $this->_tpl_vars['scriptjava']; ?>


<div id="forminscription">
<h2><span class="deco">></span>Fase 1 - Registrazione</h2>

<?php if ($this->_tpl_vars['error_inscript'] && $_GET['error'] == 1): ?>
  <div class='erreur'>
    <h3>Informazioni mancanti! Alcuni campi non sono compilati correttamente:</h3>
 
	 <?php if ($this->_tpl_vars['error_inscript']['badpseudo'] == 1): ?>
	 	- Username non valido
	 	<p>Il tuo username deve essere composto da almeno due caratteri e non deve contenere
		caratteri speciali (accenti, segni di punteggiatura...)</p>
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['loginexist'] == 1): ?>- Username già in uso<br /><?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['mailexist'] == 1): ?>
		- Hai già un conto per questo indirizzo e-mail. Vai alla
		<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass'>pagina di recupero della password</a>.
		<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badmail'] == 1): ?>
		- Indirizzo e-mail non valido
		<p>Inserire un indirizzo e-mail valido.</p>
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badpass'] == 1): ?>
	 	- Password non valida
		<p>La password deve contenere più di 5 caratteri</p>
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['passnotegalconf'] == 1): ?>
	 - La password e la password di conferma sono diverse<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badname'] == 1): ?>
	 - Cognome non valido<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badsurname'] == 1): ?>
	 	- Nome non valido<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badadress'] == 1): ?>
	 	- Indirizzo non valido<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badcity'] == 1): ?>
	 	- Città non valida<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['nocp'] == 1): ?>
	 	- Codice postale obbligatorio per questo paese<br />
	 <?php endif; ?>
	 
	 <?php if ($this->_tpl_vars['error_inscript']['badcp'] == 1): ?>
		- Codice postale non valido<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['badstate'] == 1): ?>
		- Stato non valido<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['country'] == 1): ?>
		 - Paese non valido<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['badphone'] == 1): ?>
		 - Telefono non valido<br />
	 <?php endif; ?>

	 <?php if ($this->_tpl_vars['error_inscript']['badfax'] == 1): ?>
	 	- Fax non valido<br />
	 <?php endif; ?>
	 
  </div>
<?php endif; ?>
<p><em>I campi con l'asterisco * sono obbligatori.</em></p>
<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
verifforminscription.php" id='inscription'>
<fieldset>
<p class="field">
  <label for="i_pseudo">* Username</label>
  <input type="text" maxlength="20" size="20"  name="inscription_login" value="<?php echo $_SESSION['inscription_login']; ?>
" />
</p>

<p class="field">
  <label for="i_pass">* Password</label>
  <input maxlength="20" size="20" type="password" name="inscription_password" value="<?php echo $_SESSION['inscription_password']; ?>
" />
</p>

<p class="field">
  <label for="i_conf">* Conferma password</label>
  <input maxlength="20" size="20" type="password" name="inscription_confirmation" value="<?php echo $_SESSION['inscription_confirmation']; ?>
" />
</p>

<p class="field">
    <label for="i_statut">Tipo di cliente</label>
		<?php if ($_SESSION['inscription_societe'] == 1): ?>
      <input type='radio' name='inscription_societe' value='0' onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Privato
      <input type='radio' name='inscription_societe' value='1' checked="checked" onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Azienda
		<?php else: ?>
      <input type='radio' name='inscription_societe' value='0' checked="checked" onclick="closebox('champs_intracommu',0);closebox('champs_nomsociete',0);" /> Privato
			<input type='radio' name='inscription_societe' value='1' onclick="openbox('champs_intracommu',0);openbox('champs_nomsociete',0);"/> Azienda
		<?php endif; ?>
</p>

<p class="field" id="champs_nomsociete" <?php if ($_SESSION['inscription_societe'] == 1): ?>style="display:block;<?php else: ?>style="display:none;<?php endif; ?>">
  <label for="i_nomsociete">Nome dell'azienda</label>
  <input type="text" size="39" name="inscription_nomsociete" value="<?php echo $_SESSION['inscription_nomsociete']; ?>
" />
</p>

<p class="field" id="champs_intracommu" <?php if ($_SESSION['inscription_societe'] == 1): ?>style="display:block;<?php else: ?>style="display:none;<?php endif; ?>">
  <label for="i_intracommu">N. di IVA intra-comunitaria</label>
  <input type="text" size="39" name="inscription_intracommu" value="<?php echo $_SESSION['inscription_intracommu']; ?>
" />
</p>

<p class="field">
    <label for="i_civilite">Titolo</label>
		<?php if ($_SESSION['inscription_civilite'] == 1): ?>
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Sig.
		<?php elseif ($_SESSION['inscription_civilite'] != 1 && $_SESSION['inscription_civilite'] != 2 && $_SESSION['inscription_civilite'] != 3): ?>
			<input type='radio' name='inscription_civilite' value='1' checked="checked" /> Sig.
		<?php else: ?>
    	<input type='radio' name='inscription_civilite' value='1' /> Sig.
		<?php endif; ?>
    <?php if ($_SESSION['inscription_civilite'] == 2): ?>
			<input type='radio' name='inscription_civilite' value='2' checked="checked" /> Sig.ra
		<?php else: ?>
			<input type='radio' name='inscription_civilite' value='2' /> Sig.ra
		<?php endif; ?>
    <?php if ($_SESSION['inscription_civilite'] == 3): ?>
			<input type='radio' name='inscription_civilite' value='3' checked="checked" /> Sig.ina
		<?php else: ?>
			<input type='radio' name='inscription_civilite' value='3' /> Sig.ina
		<?php endif; ?>
</p>

<p class="field">
    <label for="i_nom">* Cognome</label>
    <input type="text" size="39" name="inscription_nom" value="<?php echo $_SESSION['inscription_nom']; ?>
" />
</p>

<p class="field">
    <label for="i_prenom">* Nome</label>
    <input type="text" size="39" name="inscription_prenom" value="<?php echo $_SESSION['inscription_prenom']; ?>
" />
</p>

<p class="field">
    <label for="i_adresse1">* Indirizzo 1</label>
    <input type="text" size="39" name="inscription_adresse1" value="<?php echo $_SESSION['inscription_adresse1']; ?>
" />
</p>

<p class="field">
    <label for="i_adresse2">Indirizzo 2</label>
    <input type="text" size="39" name="inscription_adresse2" value="<?php echo $_SESSION['inscription_adresse2']; ?>
" />
</p>

<p class="field">
    <label for="i_adresse3">Indirizzo 3</label>
    <input type="text" size="39" name="inscription_adresse3" value="<?php echo $_SESSION['inscription_adresse3']; ?>
" />
</p>

<p class="field">
    <label for="i_cp">* Codice postale</label>
    <input type="text" size="9" maxlength="9" name="inscription_cp" value="<?php echo $_SESSION['inscription_cp']; ?>
" />
</p>

<p class="field">
    <label for="i_ville">* Città</label>
    <input type="text" size="39" name="inscription_ville" value="<?php echo $_SESSION['inscription_ville']; ?>
" />
</p>

<p class="field">
    <label for="i_pays">Paese</label>
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
    <label for="i_etat">Stato / Provincia</label>
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
    <label for="i_email">* Indirizzo E-mail</label>
    <input type="text" size="39" name="inscription_email" value="<?php echo $_SESSION['inscription_email']; ?>
" />

</p>

<p class="field">Spuntare la casella per ricevere la newsletter 
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
  <input type="submit" name="inscription_submit" value="Conferma" />
</p>
</fieldset>
</form>
</div>