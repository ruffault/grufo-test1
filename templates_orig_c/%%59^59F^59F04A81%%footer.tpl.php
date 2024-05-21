<?php /* Smarty version 2.6.31, created on 2019-10-30 17:56:47
         compiled from it/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'it/footer.tpl', 5, false),array('modifier', 'date_format', 'it/footer.tpl', 30, false),)), $this); ?>
	<div id="footer">

		<?php if (isset ( $this->_tpl_vars['thematic'] )): ?>
			<p id="thematic">
				Argomenti di questa pagina: <?php echo ((is_array($_tmp=$this->_tpl_vars['thematic'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>

			</p>
		<?php endif; ?>

		[ <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=infolegale">Informazioni di natura legale</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=aide">Aiuto</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0">Catalogo</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=myaccount">Il mio conto</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">Carrello</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
contact">Come contattarci</a>
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
img/cb.gif" alt="Pagamento con Carta Blu" />
		<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
img/visa.gif" alt="Pagamento con Visa" />
		<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
img/mastercard.gif" alt="Pagamento con Mastercard" />
		<br />
		&copy;<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
  Dicoland.com - CNIL N°1040664
	</div> 
</div>

</body>
</html>