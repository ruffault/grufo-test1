<?php /* Smarty version 2.6.31, created on 2019-11-17 15:23:29
         compiled from de/samecateg2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'product_link', 'de/samecateg2.tpl', 10, false),array('modifier', 'utf8_encode', 'de/samecateg2.tpl', 16, false),array('function', 'cycle', 'de/samecateg2.tpl', 34, false),)), $this); ?>
<?php if ($this->_tpl_vars['samecateg2']): ?>
  <div id="samecateg2">  <br>
    <h4><span class="deco">&gt;</span>In der gleichen Kategorie</h4>
    <div>
    	<?php unset($this->_sections['samecateg2']);
$this->_sections['samecateg2']['name'] = 'samecateg2';
$this->_sections['samecateg2']['loop'] = is_array($_loop=$this->_tpl_vars['samecateg2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['samecateg2']['show'] = true;
$this->_sections['samecateg2']['max'] = $this->_sections['samecateg2']['loop'];
$this->_sections['samecateg2']['step'] = 1;
$this->_sections['samecateg2']['start'] = $this->_sections['samecateg2']['step'] > 0 ? 0 : $this->_sections['samecateg2']['loop']-1;
if ($this->_sections['samecateg2']['show']) {
    $this->_sections['samecateg2']['total'] = $this->_sections['samecateg2']['loop'];
    if ($this->_sections['samecateg2']['total'] == 0)
        $this->_sections['samecateg2']['show'] = false;
} else
    $this->_sections['samecateg2']['total'] = 0;
if ($this->_sections['samecateg2']['show']):

            for ($this->_sections['samecateg2']['index'] = $this->_sections['samecateg2']['start'], $this->_sections['samecateg2']['iteration'] = 1;
                 $this->_sections['samecateg2']['iteration'] <= $this->_sections['samecateg2']['total'];
                 $this->_sections['samecateg2']['index'] += $this->_sections['samecateg2']['step'], $this->_sections['samecateg2']['iteration']++):
$this->_sections['samecateg2']['rownum'] = $this->_sections['samecateg2']['iteration'];
$this->_sections['samecateg2']['index_prev'] = $this->_sections['samecateg2']['index'] - $this->_sections['samecateg2']['step'];
$this->_sections['samecateg2']['index_next'] = $this->_sections['samecateg2']['index'] + $this->_sections['samecateg2']['step'];
$this->_sections['samecateg2']['first']      = ($this->_sections['samecateg2']['iteration'] == 1);
$this->_sections['samecateg2']['last']       = ($this->_sections['samecateg2']['iteration'] == $this->_sections['samecateg2']['total']);
?>
    	<dl class="float-left">
    		<dd>
          <span class="img-shadow">
            <?php if ($this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['img_type'] == 'none'): ?>
              <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['nom'], $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['nom'], $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['categorie'])); ?>
"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/no-image_icon.gif" alt="" /></a>
            <?php else: ?>    
              <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['nom'], $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['nom'], $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['categorie'])); ?>
"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['id_produit']; ?>
_icon.<?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['img_type']; ?>
" alt="<?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['nom']; ?>
" /></a>
            <?php endif; ?>
          </span>
        </dd>
    		<dd><h5><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['nom'], $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['nom'], $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['categorie'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h5></dd>
    		<dd><em><?php echo ((is_array($_tmp=$this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</em></dd>
    		<dd>
      <?php if ($this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['rabais'] != '0.00' && $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['prix'] != '0.00'): ?>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
          <strong><?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['prix_rabais_ht']; ?>
€ zzgl. MwSt (<?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['prix_rabais']; ?>
€ einschl. MwSt)</strong>
        <?php else: ?>
          <strong><?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['prix_rabais']; ?>
€ einschl. MwSt (<?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['prix_rabais_ht']; ?>
€ zzgl. MwSt)</strong>
        <?php endif; ?>
      <?php elseif ($this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['prix'] != '0.00'): ?>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
      		<strong><?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['prix_ht']; ?>
€ zzgl. MwSt(<?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['prix']; ?>
€ einschl. MwSt)</strong>
        <?php else: ?>
      		<strong><?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['prix']; ?>
€ einschl. MwSt(<?php echo $this->_tpl_vars['samecateg2'][$this->_sections['samecateg2']['index']]['prix_ht']; ?>
€ zzgl. MwSt)</strong>
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