<?php /* Smarty version 2.6.31, created on 2024-05-17 12:14:58
         compiled from fr/showfuture.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'product_link', 'fr/showfuture.tpl', 18, false),array('modifier', 'utf8_encode', 'fr/showfuture.tpl', 18, false),)), $this); ?>
<div id="showfuture">
<?php if ($this->_tpl_vars['future']): ?>
<h2><span class="deco">></span>Articles mis de coté</h2>

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
?><br>
    <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
      <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['future'][$this->_sections['future']['index']]['id_produit']; ?>
" />
      <input type="hidden" name="typeaction" value="remettrepanier" />
      <button>Ajouter au panier</button>
    </form>
    <form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
      <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['future'][$this->_sections['future']['index']]['id_produit']; ?>
" />
      <input type="hidden" name="typeaction" value="supprimer" />
      <button>Supprimer</button>
    </form>
    <br/>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['future'][$this->_sections['future']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['future'][$this->_sections['future']['index']]['nom']) : product_link($_tmp, $this->_tpl_vars['future'][$this->_sections['future']['index']]['nom'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['future'][$this->_sections['future']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a>
    <?php if ($this->_tpl_vars['future'][$this->_sections['future']['index']]['disponible'] == 1): ?>
     <br/> disponible
    <?php else: ?>
      <br/>disponible sous <?php echo $this->_tpl_vars['future'][$this->_sections['future']['index']]['delai_reapprovisionnement']; ?>
 jours
    <?php endif; ?>
    <br />
  <?php endfor; endif; ?>
</div>
<?php endif; ?>
</div>