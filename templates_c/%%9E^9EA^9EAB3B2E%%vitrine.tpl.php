<?php /* Smarty version 2.6.31, created on 2019-10-30 17:56:47
         compiled from it/vitrine.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'categ_link', 'it/vitrine.tpl', 4, false),array('modifier', 'utf8_encode', 'it/vitrine.tpl', 4, false),array('modifier', 'truncate', 'it/vitrine.tpl', 4, false),array('modifier', 'product_link', 'it/vitrine.tpl', 5, false),)), $this); ?>
<div id='vithome'>
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
		<div id='vitleft'>
			<div id="cat"><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_categorie'])) ? $this->_run_mod_handler('categ_link', true, $_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie']) : categ_link($_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie'])); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>
</a></div>
			<h2><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie'])); ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 110) : smarty_modifier_truncate($_tmp, 110)); ?>
</a></h2>
				
				<div class="roundedcornr_box_vitimg">
   					<div class="roundedcornr_top_vitimg"><div></div></div>
      					<div class="roundedcornr_content_vitimg">			
							<span id='vit_img'>
								<?php if ($this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['img_type'] == 'none'): ?>
									<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie'])); ?>
"><img  src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/no-image.gif" width=56></a>
								<?php else: ?>
									<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'], $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['categorie'])); ?>
"><img alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
"  src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_produit']; ?>
_icon.<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['img_type']; ?>
"/></a>
								<?php endif; ?>
							</span>
      					</div>
   					<div class="roundedcornr_bottom_vitimg"><div></div></div>
				</div>			
			
			<span class='auteur'><?php echo ((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</span>
			<p class='vit_description'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['description'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 210, "...", true) : smarty_modifier_truncate($_tmp, 210, "...", true)); ?>
</p>
			<div id="prix">
    <?php if ($this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['rabais'] != '0.00'): ?>
      <?php if ($_SESSION['ht'] == 'ht'): ?>
        <strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais_ht']; ?>
 € tasse escluse (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais']; ?>
 € TTC)</strong>
      <?php else: ?>
        <strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais']; ?>
 € tasse incluse (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_rabais_ht']; ?>
 € HT)</strong>
      <?php endif; ?>
    <?php else: ?>
      <?php if ($_SESSION['ht'] == 'ht'): ?>
    		<strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_ht']; ?>
 € tasse escluse (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix']; ?>
 € TTC)</strong>
      <?php else: ?>
    		<strong><?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix']; ?>
 € tasse incluse (<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix_ht']; ?>
 € HT)</strong>
      <?php endif; ?>
    <?php endif; ?>
    		</div>
    			<?php if ($this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['prix'] != 0 && $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['sommeil'] != 1): ?>
    				<form class="addpan"  method="get" action="<?php echo $this->_tpl_vars['urlsite']; ?>
addtopanier.php?nbpage=1&amp;pagecourante=1&amp;nbresult=1">
      					<div>
        					<input type="image" value="Aggiungi al carrello" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/addpan.png"/>
        					<input type="hidden" name="quantite" value="1"/>
        					<input type="hidden" name="page" value="vitrine"/>
        					<input type="hidden" name="id_produit" value="<?php echo $this->_tpl_vars['vitrine'][$this->_sections['vitrine']['index']]['id_produit']; ?>
"/>
      					</div>
    				</form>
    			<?php endif; ?>
    	<span class='clearleft'></span>
	</div>
	<?php endfor; endif; ?>
</div>