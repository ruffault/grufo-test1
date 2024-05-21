<?php /* Smarty version 2.6.31, created on 2019-12-18 11:50:30
         compiled from fr/detailcommande.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'product_link', 'fr/detailcommande.tpl', 10, false),array('modifier', 'utf8_encode', 'fr/detailcommande.tpl', 15, false),)), $this); ?>
<div id="detailcommande">
<h2><span class="deco">></span>Commande référence <?php echo $_GET['no']; ?>
</h2>


<?php if ($this->_tpl_vars['produit']): ?>
	<?php unset($this->_sections['produit']);
$this->_sections['produit']['name'] = 'produit';
$this->_sections['produit']['loop'] = is_array($_loop=$this->_tpl_vars['produit']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['produit']['show'] = true;
$this->_sections['produit']['max'] = $this->_sections['produit']['loop'];
$this->_sections['produit']['step'] = 1;
$this->_sections['produit']['start'] = $this->_sections['produit']['step'] > 0 ? 0 : $this->_sections['produit']['loop']-1;
if ($this->_sections['produit']['show']) {
    $this->_sections['produit']['total'] = $this->_sections['produit']['loop'];
    if ($this->_sections['produit']['total'] == 0)
        $this->_sections['produit']['show'] = false;
} else
    $this->_sections['produit']['total'] = 0;
if ($this->_sections['produit']['show']):

            for ($this->_sections['produit']['index'] = $this->_sections['produit']['start'], $this->_sections['produit']['iteration'] = 1;
                 $this->_sections['produit']['iteration'] <= $this->_sections['produit']['total'];
                 $this->_sections['produit']['index'] += $this->_sections['produit']['step'], $this->_sections['produit']['iteration']++):
$this->_sections['produit']['rownum'] = $this->_sections['produit']['iteration'];
$this->_sections['produit']['index_prev'] = $this->_sections['produit']['index'] - $this->_sections['produit']['step'];
$this->_sections['produit']['index_next'] = $this->_sections['produit']['index'] + $this->_sections['produit']['step'];
$this->_sections['produit']['first']      = ($this->_sections['produit']['iteration'] == 1);
$this->_sections['produit']['last']       = ($this->_sections['produit']['iteration'] == $this->_sections['produit']['total']);
?>
      <div class="detailcmd" style="min-height:100px;">
        <span class="img-shadow" >
          <?php if ($this->_tpl_vars['produit'][$this->_sections['produit']['index']]['img_type'] == 'none'): ?>
            <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['produit'][$this->_sections['produit']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['produit'][$this->_sections['produit']['index']]['nom']) : product_link($_tmp, $this->_tpl_vars['produit'][$this->_sections['produit']['index']]['nom'])); ?>
"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/no-image_icon.gif" alt="" /></a>
          <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['produit'][$this->_sections['produit']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['produit'][$this->_sections['produit']['index']]['nom']) : product_link($_tmp, $this->_tpl_vars['produit'][$this->_sections['produit']['index']]['nom'])); ?>
"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['produit'][$this->_sections['produit']['index']]['id_produit']; ?>
_icon.<?php echo $this->_tpl_vars['produit'][$this->_sections['produit']['index']]['img_type']; ?>
" alt="" /></a>
          <?php endif; ?>
        </span>
			<h4 ><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['produit'][$this->_sections['produit']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['produit'][$this->_sections['produit']['index']]['nom']) : product_link($_tmp, $this->_tpl_vars['produit'][$this->_sections['produit']['index']]['nom'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['produit'][$this->_sections['produit']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h4>
      <?php if ($this->_tpl_vars['produit'][$this->_sections['produit']['index']]['auteur']): ?>
        <em><?php echo $this->_tpl_vars['produit'][$this->_sections['produit']['index']]['auteur']; ?>
<em>
      <?php endif; ?>

      <?php if ($this->_tpl_vars['produit'][$this->_sections['produit']['index']]['quantite'] > 1): ?>
        <br /><em>(commandé en <?php echo $this->_tpl_vars['produit'][$this->_sections['produit']['index']]['quantite']; ?>
 exemplaires)</em>
  		<?php endif; ?>
  		</div>
  		<hr />
	<?php endfor; endif; ?>
<?php endif; ?>

<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande'>Visualiser la liste de vos commandes antérieures</a>
</div>