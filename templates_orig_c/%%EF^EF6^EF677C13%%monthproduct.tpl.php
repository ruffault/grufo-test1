<?php /* Smarty version 2.6.31, created on 2019-10-30 17:56:47
         compiled from it/monthproduct.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'product_link', 'it/monthproduct.tpl', 4, false),array('modifier', 'utf8_encode', 'it/monthproduct.tpl', 9, false),)), $this); ?>
<h3>Prodotti del mese</h3>
<div id="monthproduct"class="border">

<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['monthproduct']['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['monthproduct']['nom'], $this->_tpl_vars['monthproduct']['categorie']) : product_link($_tmp, $this->_tpl_vars['monthproduct']['nom'], $this->_tpl_vars['monthproduct']['categorie'])); ?>
" style="text-decoration: none;">
<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['monthproduct']['id_produit']; ?>
_icon.jpg" alt="" />
</a><br />
<h4>
<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['monthproduct']['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['monthproduct']['nom'], $this->_tpl_vars['monthproduct']['categorie']) : product_link($_tmp, $this->_tpl_vars['monthproduct']['nom'], $this->_tpl_vars['monthproduct']['categorie'])); ?>
">
<?php echo ((is_array($_tmp=$this->_tpl_vars['monthproduct']['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a>
</h4>
</div>