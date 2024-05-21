<?php /* Smarty version 2.6.31, created on 2019-10-30 17:56:44
         compiled from es/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'es/footer.tpl', 5, false),array('modifier', 'date_format', 'es/footer.tpl', 30, false),)), $this); ?>
  <div id="footer">

		<?php if (isset ( $this->_tpl_vars['thematic'] )): ?>
			<p id="thematic">
				Temas en está página : <?php echo ((is_array($_tmp=$this->_tpl_vars['thematic'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>

			</p>
		<?php endif; ?>

		[ <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=infolegale">Información legal</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=aide">Ayuda</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0">Catálogo</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=myaccount">Mi cuenta</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">Cesta de la compra</a> |
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
contact">Contacto</a>
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
img/cb.gif" alt="Pago con CB" />
		<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
img/visa.gif" alt="Pago con Visa" />
		<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
img/mastercard.gif" alt="Pago con Mastercard" />
		<br />
		&copy;<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
  Dicoland.com - CNIL N°1040664
	</div> 
</div>

</body>
</html>