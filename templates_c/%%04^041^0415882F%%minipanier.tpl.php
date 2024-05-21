<?php /* Smarty version 2.6.31, created on 2024-05-16 10:11:45
         compiled from fr/minipanier.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'fr/minipanier.tpl', 15, false),array('modifier', 'product_link', 'fr/minipanier.tpl', 17, false),array('modifier', 'utf8_encode', 'fr/minipanier.tpl', 17, false),)), $this); ?>
<?php if ($this->_tpl_vars['mini_panier']): ?>
<div class="minipanier">
<table class="minipanier">
	 <caption><a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier'>Mini panier</a></caption>
		<tr>
			<th>Détail</th>
			<?php if ($_SESSION['ht'] == 'ht'): ?>
			<th>Prix HT</th>
			<?php else: ?>
			<th>Prix TTC</th>
			<?php endif; ?>
		</tr>

	<?php unset($this->_sections['mini_panier']);
$this->_sections['mini_panier']['name'] = 'mini_panier';
$this->_sections['mini_panier']['loop'] = is_array($_loop=$this->_tpl_vars['mini_panier']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mini_panier']['show'] = true;
$this->_sections['mini_panier']['max'] = $this->_sections['mini_panier']['loop'];
$this->_sections['mini_panier']['step'] = 1;
$this->_sections['mini_panier']['start'] = $this->_sections['mini_panier']['step'] > 0 ? 0 : $this->_sections['mini_panier']['loop']-1;
if ($this->_sections['mini_panier']['show']) {
    $this->_sections['mini_panier']['total'] = $this->_sections['mini_panier']['loop'];
    if ($this->_sections['mini_panier']['total'] == 0)
        $this->_sections['mini_panier']['show'] = false;
} else
    $this->_sections['mini_panier']['total'] = 0;
if ($this->_sections['mini_panier']['show']):

            for ($this->_sections['mini_panier']['index'] = $this->_sections['mini_panier']['start'], $this->_sections['mini_panier']['iteration'] = 1;
                 $this->_sections['mini_panier']['iteration'] <= $this->_sections['mini_panier']['total'];
                 $this->_sections['mini_panier']['index'] += $this->_sections['mini_panier']['step'], $this->_sections['mini_panier']['iteration']++):
$this->_sections['mini_panier']['rownum'] = $this->_sections['mini_panier']['iteration'];
$this->_sections['mini_panier']['index_prev'] = $this->_sections['mini_panier']['index'] - $this->_sections['mini_panier']['step'];
$this->_sections['mini_panier']['index_next'] = $this->_sections['mini_panier']['index'] + $this->_sections['mini_panier']['step'];
$this->_sections['mini_panier']['first']      = ($this->_sections['mini_panier']['iteration'] == 1);
$this->_sections['mini_panier']['last']       = ($this->_sections['mini_panier']['iteration'] == $this->_sections['mini_panier']['total']);
?>
		<?php echo smarty_function_cycle(array('values' => "<tr class='normal'>,<tr class='selected'>"), $this);?>

		<td class='detail'>
			<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['mini_panier'][$this->_sections['mini_panier']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['mini_panier'][$this->_sections['mini_panier']['index']]['nom']) : product_link($_tmp, $this->_tpl_vars['mini_panier'][$this->_sections['mini_panier']['index']]['nom'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['mini_panier'][$this->_sections['mini_panier']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a>
      <?php if ($this->_tpl_vars['mini_panier'][$this->_sections['mini_panier']['index']]['quantite'] > 1): ?>
        <br /><em>
    			<?php echo $this->_tpl_vars['mini_panier'][$this->_sections['mini_panier']['index']]['quantite']; ?>
 exemplaires
  			</em>
  		<?php endif; ?>
  </td>
		<?php if ($_SESSION['ht'] == 'ht'): ?>
		<td>
     		<?php echo $this->_tpl_vars['mini_panier'][$this->_sections['mini_panier']['index']]['prix_unitaire_rabais_ht_for_all']; ?>
 €
    </td>
		<?php else: ?>
		<td>
    		<?php echo $this->_tpl_vars['mini_panier'][$this->_sections['mini_panier']['index']]['prix_unitaire_ttc_rabais_for_all']; ?>
 €
    </td>
    <?php endif; ?>
		</tr>
		<tr><td colspan="2"><hr /></td></tr>
	<?php endfor; endif; ?>
	<tr class="lastline">
		<td id="detailtotal">
			Total HT<br />
			+ TVA<br />
			Total TTC
		</td>
		<td>
      <?php echo $this->_tpl_vars['mini_prix_ht_total']; ?>
  €<br />
      <?php echo $this->_tpl_vars['mini_tva_totale']; ?>
  €<br />
			<?php echo $this->_tpl_vars['mini_prix_total']; ?>
  €
		</td>
	</tr>
</table>
<div class="validcmd">
  <button onClick="javascript:location.href ='<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php'">Poursuivre la commande</button>
</div>

</div>
<?php endif; ?>