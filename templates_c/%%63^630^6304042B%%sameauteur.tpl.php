<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:42
         compiled from es/sameauteur.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'product_link', 'es/sameauteur.tpl', 10, false),array('modifier', 'utf8_encode', 'es/sameauteur.tpl', 16, false),array('function', 'cycle', 'es/sameauteur.tpl', 34, false),)), $this); ?>
<?php if ($this->_tpl_vars['sameauteur']): ?>
<div id="sameauteur"><br>
  <h4><span class="deco">&gt;</span>Del mismo autor</h4>
  <div>
  	<?php unset($this->_sections['sameauteur']);
$this->_sections['sameauteur']['name'] = 'sameauteur';
$this->_sections['sameauteur']['loop'] = is_array($_loop=$this->_tpl_vars['sameauteur']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sameauteur']['show'] = true;
$this->_sections['sameauteur']['max'] = $this->_sections['sameauteur']['loop'];
$this->_sections['sameauteur']['step'] = 1;
$this->_sections['sameauteur']['start'] = $this->_sections['sameauteur']['step'] > 0 ? 0 : $this->_sections['sameauteur']['loop']-1;
if ($this->_sections['sameauteur']['show']) {
    $this->_sections['sameauteur']['total'] = $this->_sections['sameauteur']['loop'];
    if ($this->_sections['sameauteur']['total'] == 0)
        $this->_sections['sameauteur']['show'] = false;
} else
    $this->_sections['sameauteur']['total'] = 0;
if ($this->_sections['sameauteur']['show']):

            for ($this->_sections['sameauteur']['index'] = $this->_sections['sameauteur']['start'], $this->_sections['sameauteur']['iteration'] = 1;
                 $this->_sections['sameauteur']['iteration'] <= $this->_sections['sameauteur']['total'];
                 $this->_sections['sameauteur']['index'] += $this->_sections['sameauteur']['step'], $this->_sections['sameauteur']['iteration']++):
$this->_sections['sameauteur']['rownum'] = $this->_sections['sameauteur']['iteration'];
$this->_sections['sameauteur']['index_prev'] = $this->_sections['sameauteur']['index'] - $this->_sections['sameauteur']['step'];
$this->_sections['sameauteur']['index_next'] = $this->_sections['sameauteur']['index'] + $this->_sections['sameauteur']['step'];
$this->_sections['sameauteur']['first']      = ($this->_sections['sameauteur']['iteration'] == 1);
$this->_sections['sameauteur']['last']       = ($this->_sections['sameauteur']['iteration'] == $this->_sections['sameauteur']['total']);
?>
  	<dl class="float-left">
  		<dd>
        <span class="img-shadow">
          <?php if ($this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['img_type'] == 'none'): ?>
            <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['nom'], $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['auteur']) : product_link($_tmp, $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['nom'], $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['auteur'])); ?>
"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/no-image_icon.gif" alt="" /></a>
          <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['nom'], $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['auteur']) : product_link($_tmp, $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['nom'], $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['auteur'])); ?>
"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['id_produit']; ?>
_icon.<?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['img_type']; ?>
" alt="<?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['nom']; ?>
" /></a>
          <?php endif; ?>
        </span>
      </dd>
  		<dd><h5><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['nom'], $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['auteur']) : product_link($_tmp, $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['nom'], $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['auteur'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h5></dd>
  		<dd><em><?php echo ((is_array($_tmp=$this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</em></dd>
  		<dd>
      <?php if ($this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['rabais'] != '0.00' && $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix'] != '0.00'): ?>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
          <strong><?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix_rabais_ht']; ?>
€ sin IVA (<?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix_rabais']; ?>
€ con IVA)</strong>
        <?php else: ?>
          <strong><?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix_rabais']; ?>
€ con IVA (<?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix_rabais_ht']; ?>
€ sin IVA)</strong>
        <?php endif; ?>
      <?php else: ?>
        <?php if ($_SESSION['ht'] == 'ht' && $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix'] != '0.00'): ?>
      		<strong><?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix_ht']; ?>
€ sin IVA(<?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix']; ?>
€ con IVA)</strong>
        <?php elseif ($this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix'] != '0.00'): ?>
      		<strong><?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix']; ?>
€ con IVA(<?php echo $this->_tpl_vars['sameauteur'][$this->_sections['sameauteur']['index']]['prix_ht']; ?>
€ sin IVA)</strong>
        <?php endif; ?>
      <?php endif; ?>
      </dd>
  	</dl>
  	<?php echo smarty_function_cycle(array('values' => ",<div class='clear'></div>"), $this);?>

  	<?php endfor; endif; ?>
  </div>
  <span class="spacer"></span>
</div>
<?php endif; ?>