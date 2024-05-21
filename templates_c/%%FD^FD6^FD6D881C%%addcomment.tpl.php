<?php /* Smarty version 2.6.31, created on 2020-06-06 06:02:36
         compiled from fr/addcomment.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'fr/addcomment.tpl', 12, false),array('modifier', 'trim', 'fr/addcomment.tpl', 12, false),array('modifier', 'htmlentities', 'fr/addcomment.tpl', 12, false),array('modifier', 'nl2br', 'fr/addcomment.tpl', 12, false),)), $this); ?>
<div id="addcomment">
	<?php if (! isset ( $_GET['save'] )): ?>
		<h2><span class="deco">></span>Ajouter un commentaire</h2>
	<?php endif; ?>

	<?php if ($this->_tpl_vars['error']): ?>
		<div class='erreur'>
			<h3>Vous devez saisir un commentaire !</h3>
		</div>
	<?php elseif ($_GET['addcomment']): ?>
		<h3>Confirmer le commentaire</h3>
		<p><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$_GET['remarks'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : utf8_decode($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
		<form method="get" action="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php">
			<fieldset>
				<input type="hidden" value="addcomment" name="page" />
				<input type="hidden" value="<?php echo $_GET['id']; ?>
" name="id" />
				<input type="hidden" name="remarks" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$_GET['remarks'])) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
" />
				<input type="submit" name="save" value="Soumettre le commentaire" />
			</fieldset>
		</form>
	<?php endif; ?>
	<?php if (! isset ( $_GET['save'] )): ?>
		<form method="get" action="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php">
		
		<fieldset>
			<input type="hidden" value="addcomment" name="page" />
			<input type="hidden" value="<?php echo $_GET['id']; ?>
" name="id" />
	
			<p class="field">
				Article : <strong><?php echo $this->_tpl_vars['productname']; ?>
</strong>
			</p>
			<p class="field">
				<label for="i_pseudo"> * Commentaire :</label><br />
				<textarea name="remarks" cols="35" rows="8"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$_GET['remarks'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : utf8_decode($_tmp)))) ? $this->_run_mod_handler('trim', true, $_tmp) : trim($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)); ?>
</textarea>
			</p>
		
			<p class="field">
				<input type="submit" name="addcomment" value="Verifier avant l'envoi" />
			</p>
			<p><em>Les champs portant la mention * doivent être remplis obligatoirement.</em></p>
		</fieldset>
		</form>
	<?php else: ?>
		<h2><span class="deco">></span>Félicitations</h2>
		<p>
			Votre commentaire va maintenant être validé par un
			opérateur. Merci de votre participation.
		</p>
		<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showproduct&amp;id=<?php echo $_GET['id']; ?>
'>Retour sur le produit</a>
	<?php endif; ?>
	
</div>