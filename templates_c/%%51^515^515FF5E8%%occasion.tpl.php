<?php /* Smarty version 2.6.31, created on 2024-05-17 12:13:31
         compiled from fr/occasion.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'fr/occasion.tpl', 8, false),array('modifier', 'product_link', 'fr/occasion.tpl', 10, false),array('modifier', 'truncate', 'fr/occasion.tpl', 16, false),)), $this); ?>
		<div id='vitrine_ed' style="margin:10px ; width: 560px;">
	<h2><span class="deco">></span>Occasion</h2>

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

	<div id="oc_det"class='border_all'>
		
	 <div class="cat-edit <?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_categorie'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
" >
	 <h2><?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</h2>
	  <h3 style="margin-right:200px"><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h3>
   

		<em><?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</em>

		<p style="margin-right:200px" class='description'>
		<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['description'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 325, "...", true) : smarty_modifier_truncate($_tmp, 325, "...", true)); ?>

		</p>
	<form   method="get" action="<?php echo $this->_tpl_vars['urlsite']; ?>
addtopanier.php?nbpage=1&amp;pagecourante=1&amp;nbresult=1">
      <div >
        <br />
         <input type="image" value="Ajouter à mon panier" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/addpan.png" />
        <input type="hidden" name="quantite" value="1" />
        <input type="hidden" name="page" value="vitrine" />
        <input type="hidden" name="id_produit" value="<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_produit']; ?>
" />
      </div>
    </form>
    <?php if ($this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['rabais'] != '0.00'): ?>
      <?php if ($_SESSION['ht'] == 'ht'): ?>
            <div >Ancien prix :<span id="oldprice"><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_editeur']; ?>
 €</span> moins <strong style="color:red"><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['rabais']; ?>
%</strong> soit:</div>
        <strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais_ht']; ?>
 € HT (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais']; ?>
 € TTC)</strong>
      <?php else: ?>
            <div >Ancien prix :<span id="oldprice"><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_editeur']; ?>
 €</span> moins <strong style="color:red"><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['rabais']; ?>
%</strong> soit:</div>
        <strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais']; ?>
 € TTC (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais_ht']; ?>
 € HT)</strong>
      <?php endif; ?>
    <?php else: ?>
      <?php if ($_SESSION['ht'] == 'ht'): ?>
            <div >Ancien prix :<span id="oldprice"><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_editeur']; ?>
 €</span> moins <strong style="color:red"><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['rabais']; ?>
%</strong> soit:</div>
    		<strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_ht']; ?>
 € HT (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix']; ?>
 € TTC)</strong>
      <?php else: ?>
            <div >Ancien prix :<span id="oldprice"><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_editeur']; ?>
 €</span> moins <strong style="color:red"><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['rabais']; ?>
%</strong> soit:</div>
    		<strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix']; ?>
 € TTC (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_ht']; ?>
 € HT)</strong>
      <?php endif; ?>
    <?php endif; ?>




    </div>
</div>
	
	<?php endfor; endif; ?>

  </div>