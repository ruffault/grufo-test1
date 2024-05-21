<?php /* Smarty version 2.6.31, created on 2019-11-17 14:59:54
         compiled from it/catalogue-editeur.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'it/catalogue-editeur.tpl', 1, false),array('modifier', 'strtolower', 'it/catalogue-editeur.tpl', 1, false),array('modifier', 'ucwords', 'it/catalogue-editeur.tpl', 1, false),array('modifier', 'product_link', 'it/catalogue-editeur.tpl', 5, false),array('modifier', 'truncate', 'it/catalogue-editeur.tpl', 16, false),array('function', 'cycle', 'it/catalogue-editeur.tpl', 4, false),)), $this); ?>
	<h2><span class="deco">></span>Catalogo del redattore : <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['nomediteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)))) ? $this->_run_mod_handler('ucwords', true, $_tmp) : ucwords($_tmp)); ?>
</h2>
	<table id='vitrine'>	
	<?php unset($this->_sections['vitrine']);
$this->_sections['vitrine']['name'] = 'vitrine';
$this->_sections['vitrine']['loop'] = is_array($_loop=$this->_tpl_vars['vitrine']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vitrine']['show'] = true;
$this->_sections['vitrine']['max'] = $this->_sections['vitrine']['loop'];
$this->_sections['vitrine']['step'] = 1;
$this->_sections['vitrine']['start'] = $this->_sections['vitrine']['step'] > 0 ? 0 : $this->_sections['vitrine']['loop']-1;
if ($this->_sections['vitrine']['show']) {
    $this->_sections['vitrine']['total'] = $this->_sections['vitrine']['loop'];
    if ($this->_sections['vitrine']['total'] == 0)
        $this->_sections['vitrine']['show'] = false;
} else
    $this->_sections['vitrine']['total'] = 0;
if ($this->_sections['vitrine']['show']):

            for ($this->_sections['vitrine']['index'] = $this->_sections['vitrine']['start'], $this->_sections['vitrine']['iteration'] = 1;
                 $this->_sections['vitrine']['iteration'] <= $this->_sections['vitrine']['total'];
                 $this->_sections['vitrine']['index'] += $this->_sections['vitrine']['step'], $this->_sections['vitrine']['iteration']++):
$this->_sections['vitrine']['rownum'] = $this->_sections['vitrine']['iteration'];
$this->_sections['vitrine']['index_prev'] = $this->_sections['vitrine']['index'] - $this->_sections['vitrine']['step'];
$this->_sections['vitrine']['index_next'] = $this->_sections['vitrine']['index'] + $this->_sections['vitrine']['step'];
$this->_sections['vitrine']['first']      = ($this->_sections['vitrine']['iteration'] == 1);
$this->_sections['vitrine']['last']       = ($this->_sections['vitrine']['iteration'] == $this->_sections['vitrine']['total']);
?>
	  <?php echo smarty_function_cycle(array('values' => "<tr><td class='tdleft'>,<td>",'name' => 'hauttableau'), $this);?>

	  <h2><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h2>
    <span class="img-shadow">
      <?php if ($this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['img_type'] == 'none'): ?>
        &nbsp;
      <?php else: ?>
        <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie'])); ?>
"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_produit']; ?>
_icon.<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['img_type']; ?>
" alt="" /></a>
			<?php endif; ?>
    </span>

		<em><?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</em>
		<p class='description'>
		<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['description'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 325, "...", true) : smarty_modifier_truncate($_tmp, 325, "...", true)); ?>

		</p>
    <?php if ($this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['rabais'] != '0.00'): ?>
      <?php if ($_SESSION['ht'] == 'ht'): ?>
        <strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais_ht']; ?>
 € HT (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais']; ?>
 € TTC)</strong>
      <?php else: ?>
        <strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais']; ?>
 € TTC (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais_ht']; ?>
 € HT)</strong>
      <?php endif; ?>
    <?php else: ?>
      <?php if ($_SESSION['ht'] == 'ht'): ?>
    		<strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_ht']; ?>
 € HT (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix']; ?>
 € TTC)</strong>
      <?php else: ?>
    		<strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix']; ?>
 € TTC (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_ht']; ?>
 € HT)</strong>
      <?php endif; ?>
    <?php endif; ?>
	<?php echo smarty_function_cycle(array('values' => "</td>,</td></tr>"), $this);?>

	<?php endfor; endif; ?>

  </table>