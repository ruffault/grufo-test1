<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:34
         compiled from es/samecateg.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'product_link', 'es/samecateg.tpl', 9, false),array('modifier', 'utf8_encode', 'es/samecateg.tpl', 15, false),array('function', 'cycle', 'es/samecateg.tpl', 37, false),)), $this); ?>
<?php if ($this->_tpl_vars['samecateg']): ?>
<div id="samecateg">
  <div>
  	<?php unset($this->_sections['samecateg']);
$this->_sections['samecateg']['name'] = 'samecateg';
$this->_sections['samecateg']['loop'] = is_array($_loop=$this->_tpl_vars['samecateg']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['samecateg']['show'] = true;
$this->_sections['samecateg']['max'] = $this->_sections['samecateg']['loop'];
$this->_sections['samecateg']['step'] = 1;
$this->_sections['samecateg']['start'] = $this->_sections['samecateg']['step'] > 0 ? 0 : $this->_sections['samecateg']['loop']-1;
if ($this->_sections['samecateg']['show']) {
    $this->_sections['samecateg']['total'] = $this->_sections['samecateg']['loop'];
    if ($this->_sections['samecateg']['total'] == 0)
        $this->_sections['samecateg']['show'] = false;
} else
    $this->_sections['samecateg']['total'] = 0;
if ($this->_sections['samecateg']['show']):

            for ($this->_sections['samecateg']['index'] = $this->_sections['samecateg']['start'], $this->_sections['samecateg']['iteration'] = 1;
                 $this->_sections['samecateg']['iteration'] <= $this->_sections['samecateg']['total'];
                 $this->_sections['samecateg']['index'] += $this->_sections['samecateg']['step'], $this->_sections['samecateg']['iteration']++):
$this->_sections['samecateg']['rownum'] = $this->_sections['samecateg']['iteration'];
$this->_sections['samecateg']['index_prev'] = $this->_sections['samecateg']['index'] - $this->_sections['samecateg']['step'];
$this->_sections['samecateg']['index_next'] = $this->_sections['samecateg']['index'] + $this->_sections['samecateg']['step'];
$this->_sections['samecateg']['first']      = ($this->_sections['samecateg']['iteration'] == 1);
$this->_sections['samecateg']['last']       = ($this->_sections['samecateg']['iteration'] == $this->_sections['samecateg']['total']);
?>
  	<dl class="float-left">
  		<dd>
        <span class="img-shadow">
          <?php if ($this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['img_type'] == 'none'): ?>
            <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['nom'], $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['nom'], $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['categorie'])); ?>
"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/no-image.gif" alt="" /></a>
          <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['nom'], $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['nom'], $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['categorie'])); ?>
"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['id_produit']; ?>
_mini.<?php echo $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['img_type']; ?>
" alt="" /></a>
          <?php endif; ?>
        </span>
      </dd>
  		<dd><h2><a   href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['nom'], $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['nom'], $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['categorie'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h2></dd>
  		<dd><em><?php echo ((is_array($_tmp=$this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</em></dd>
      <dd>
      <?php if ($this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['rabais'] != '0.00' && $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['prix'] != '0.00'): ?>
        <span class='prix'>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
          <strong><?php echo $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['prix_rabais_ht']; ?>
€ sin IVA (<?php echo $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['prix_rabais']; ?>
€ con IVA)</strong>
        <?php else: ?>
          <strong><?php echo $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['prix_rabais']; ?>
€ con IVA (<?php echo $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['prix_rabais_ht']; ?>
€ sin IVA)</strong>
        <?php endif; ?>
        </span>
      <?php elseif ($this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['prix'] != '0.00'): ?>
        <span class='prix'>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
      		<strong><?php echo $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['prix_ht']; ?>
€ sin IVA(<?php echo $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['prix']; ?>
€ con IVA)</strong>
        <?php else: ?>
      		<strong><?php echo $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['prix']; ?>
€ con IVA(<?php echo $this->_tpl_vars['samecateg'][$this->_sections['samecateg']['index']]['prix_ht']; ?>
€ sin IVA)</strong>
        <?php endif; ?>
        </span>
      <?php endif; ?>
      </dd>
  	</dl>
  	<?php echo smarty_function_cycle(array('values' => ",<div class='clear'></div>"), $this);?>

  	<?php endfor; endif; ?>
  </div>
	<span class="spacer"></span>
	<div id="nbpage">
	<?php if (isset ( $this->_tpl_vars['link'] )): ?>
		<br /><strong>Página</strong><br />
	<?php endif; ?>

	<?php if (isset ( $this->_tpl_vars['link_back'] )): ?>
		<?php echo $this->_tpl_vars['link_back']; ?>
anterior</a>
	<?php endif; ?>
	<?php unset($this->_sections['link']);
$this->_sections['link']['name'] = 'link';
$this->_sections['link']['loop'] = is_array($_loop=$this->_tpl_vars['link']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['link']['show'] = true;
$this->_sections['link']['max'] = $this->_sections['link']['loop'];
$this->_sections['link']['step'] = 1;
$this->_sections['link']['start'] = $this->_sections['link']['step'] > 0 ? 0 : $this->_sections['link']['loop']-1;
if ($this->_sections['link']['show']) {
    $this->_sections['link']['total'] = $this->_sections['link']['loop'];
    if ($this->_sections['link']['total'] == 0)
        $this->_sections['link']['show'] = false;
} else
    $this->_sections['link']['total'] = 0;
if ($this->_sections['link']['show']):

            for ($this->_sections['link']['index'] = $this->_sections['link']['start'], $this->_sections['link']['iteration'] = 1;
                 $this->_sections['link']['iteration'] <= $this->_sections['link']['total'];
                 $this->_sections['link']['index'] += $this->_sections['link']['step'], $this->_sections['link']['iteration']++):
$this->_sections['link']['rownum'] = $this->_sections['link']['iteration'];
$this->_sections['link']['index_prev'] = $this->_sections['link']['index'] - $this->_sections['link']['step'];
$this->_sections['link']['index_next'] = $this->_sections['link']['index'] + $this->_sections['link']['step'];
$this->_sections['link']['first']      = ($this->_sections['link']['iteration'] == 1);
$this->_sections['link']['last']       = ($this->_sections['link']['iteration'] == $this->_sections['link']['total']);
?>
		<?php echo $this->_tpl_vars['link'][$this->_sections['link']['index']]['num']; ?>

	<?php endfor; endif; ?>
	<?php if (isset ( $this->_tpl_vars['link_next'] )): ?>
		<?php echo $this->_tpl_vars['link_next']; ?>
siguiente</a>
	<?php endif; ?>
	</div>


</div>
<?php endif; ?>