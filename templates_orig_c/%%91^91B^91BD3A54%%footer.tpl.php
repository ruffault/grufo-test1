<?php /* Smarty version 2.6.31, created on 2019-10-30 01:08:46
         compiled from fr/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'fr/footer.tpl', 5, false),array('modifier', 'date_format', 'fr/footer.tpl', 31, false),)), $this); ?>
  <div id="footer">
		
		<?php if (isset ( $this->_tpl_vars['thematic'] )): ?>
			<p id="thematic">
				Thèmes de cette page : <?php echo ((is_array($_tmp=$this->_tpl_vars['thematic'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>

			</p>

		<?php endif; ?>

		[ <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=infolegale">Informations légales</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=aide">Aide</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-dictionnaire-et-lexique-c0">Catalogue</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=myaccount">Mon compte</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">Panier</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
contact">Nous contacter</a>
		]
		<br />
		[
		<a href="<?php echo $this->_tpl_vars['originalurl']; ?>
fr">Français</a>
		| <a href="<?php echo $this->_tpl_vars['originalurl']; ?>
en">English</a>
		| <a href="<?php echo $this->_tpl_vars['originalurl']; ?>
de">Deutsch</a>
		| <a href="<?php echo $this->_tpl_vars['originalurl']; ?>
es">Español</a>
		| <a href="<?php echo $this->_tpl_vars['originalurl']; ?>
it">Italiano</a>
		]
		<br />
		<br />
		<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
img/cb.gif" alt="Paiement par Carte Bleue" />
		<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
img/visa.gif" alt="Paiement par Visa" />
		<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
img/mastercard.gif" alt="Paiement par Mastercard" />
		<br />
		&copy;<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
  Dicoland.com - CNIL N°1040664
	</div> 
</div>
</div>
</body>
</html>