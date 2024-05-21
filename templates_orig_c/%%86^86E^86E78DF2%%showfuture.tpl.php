<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:20
         compiled from de/showfuture.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'product_link', 'de/showfuture.tpl', 17, false),array('modifier', 'utf8_encode', 'de/showfuture.tpl', 17, false),)), $this); ?>
<div id="showfuture">
<?php if ($this->_tpl_vars['future']): ?>
<h2><span class="deco">></span>Beiseite gelegte Artikel</h2>

<div id="decote">
  <?php unset($this->_sections['future']);
$this->_sections['future']['name'] = 'future';
$this->_sections['future']['loop'] = is_array($_loop=$this->_tpl_vars['future']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['future']['show'] = true;
$this->_sections['future']['max'] = $this->_sections['future']['loop'];
$this->_sections['future']['step'] = 1;
$this->_sections['future']['start'] = $this->_sections['future']['step'] > 0 ? 0 : $this->_sections['future']['loop']-1;
if ($this->_sections['future']['show']) {
    $this->_sections['future']['total'] = $this->_sections['future']['loop'];
    if ($this->_sections['future']['total'] == 0)
        $this->_sections['future']['show'] = false;
} else
    $this->_sections['future']['total'] = 0;
if ($this->_sections['future']['show']):

            for ($this->_sections['future']['index'] = $this->_sections['future']['start'], $this->_sections['future']['iteration'] = 1;
                 $this->_sections['future']['iteration'] <= $this->_sections['future']['total'];
                 $this->_sections['future']['index'] += $this->_sections['future']['step'], $this->_sections['future']['iteration']++):
$this->_sections['future']['rownum'] = $this->_sections['future']['iteration'];
$this->_sections['future']['index_prev'] = $this->_sections['future']['index'] - $this->_sections['future']['step'];
$this->_sections['future']['index_next'] = $this->_sections['future']['index'] + $this->_sections['future']['step'];
$this->_sections['future']['first']      = ($this->_sections['future']['iteration'] == 1);
$this->_sections['future']['last']       = ($this->_sections['future']['iteration'] == $this->_sections['future']['total']);
?>
    <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
      <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['future'][$this->_sections['future']['index']]['id_produit']; ?>
" />
      <input type="hidden" name="typeaction" value="remettrepanier" />
      <input type="image" name="remettrepanier" value="In den Warenkorb" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/ajouterpanier.gif" alt="In den Warenkorb" />
    </form>
    <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
      <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['future'][$this->_sections['future']['index']]['id_produit']; ?>
" />
      <input type="hidden" name="typeaction" value="supprimer" />
      <input type="image" name="supprimer" value="Löschen" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/supprimer.gif" alt="Löschen" />
    </form>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['future'][$this->_sections['future']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['future'][$this->_sections['future']['index']]['nom']) : product_link($_tmp, $this->_tpl_vars['future'][$this->_sections['future']['index']]['nom'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['future'][$this->_sections['future']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a>
    <?php if ($this->_tpl_vars['future'][$this->_sections['future']['index']]['disponible'] == 1): ?>
      lieferbar
    <?php else: ?>
      lieferbar binnen <?php echo $this->_tpl_vars['future'][$this->_sections['future']['index']]['delai_reapprovisionnement']; ?>
 Tagen
    <?php endif; ?>
    <br />
  <?php endfor; endif; ?>
</div>
<?php endif; ?>
</div>