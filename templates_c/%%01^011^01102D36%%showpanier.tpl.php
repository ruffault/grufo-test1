<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:06
         compiled from en/showpanier.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'en/showpanier.tpl', 16, false),array('modifier', 'product_link', 'en/showpanier.tpl', 26, false),array('modifier', 'utf8_encode', 'en/showpanier.tpl', 26, false),)), $this); ?>
<?php if ($this->_tpl_vars['panier']): ?>
<div id="panier">
<h2><span class="deco">></span>Your basket</h2>
<table id="panier">
	 <caption>Basket</caption>
		<tr>
			<th>Details</th>
			<th>Quantity</th>
			<?php if ($_SESSION['ht'] == 'ht'): ?>
			<th>Price excl. VAT</th>
			<?php endif; ?>
			<th>Price incl. VAT</th>
		</tr>

	<?php unset($this->_sections['panier']);
$this->_sections['panier']['name'] = 'panier';
$this->_sections['panier']['loop'] = is_array($_loop=$this->_tpl_vars['panier']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['panier']['show'] = true;
$this->_sections['panier']['max'] = $this->_sections['panier']['loop'];
$this->_sections['panier']['step'] = 1;
$this->_sections['panier']['start'] = $this->_sections['panier']['step'] > 0 ? 0 : $this->_sections['panier']['loop']-1;
if ($this->_sections['panier']['show']) {
    $this->_sections['panier']['total'] = $this->_sections['panier']['loop'];
    if ($this->_sections['panier']['total'] == 0)
        $this->_sections['panier']['show'] = false;
} else
    $this->_sections['panier']['total'] = 0;
if ($this->_sections['panier']['show']):

            for ($this->_sections['panier']['index'] = $this->_sections['panier']['start'], $this->_sections['panier']['iteration'] = 1;
                 $this->_sections['panier']['iteration'] <= $this->_sections['panier']['total'];
                 $this->_sections['panier']['index'] += $this->_sections['panier']['step'], $this->_sections['panier']['iteration']++):
$this->_sections['panier']['rownum'] = $this->_sections['panier']['iteration'];
$this->_sections['panier']['index_prev'] = $this->_sections['panier']['index'] - $this->_sections['panier']['step'];
$this->_sections['panier']['index_next'] = $this->_sections['panier']['index'] + $this->_sections['panier']['step'];
$this->_sections['panier']['first']      = ($this->_sections['panier']['iteration'] == 1);
$this->_sections['panier']['last']       = ($this->_sections['panier']['iteration'] == $this->_sections['panier']['total']);
?>
		<?php echo smarty_function_cycle(array('values' => "<tr class='normal'>,<tr class='selected'>"), $this);?>

		<td class='detail'>
  		<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
        <div>
            <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
" />
            <input type="hidden" name="typeaction" value="decote" />
            <input type="image" name="decote" value="Store" alt="Store" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/mettredecote.gif" />
        </div>
      </form>
			<h3>
			<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['nom']) : product_link($_tmp, $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['nom'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['panier'][$this->_sections['panier']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a>
			</h3>
      <br />
			<?php if ($this->_tpl_vars['panier'][$this->_sections['panier']['index']]['disponible'] == 1): ?>
				Available
			<?php else: ?>
			  Available in <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['delai_reapprovisionnement']; ?>
 days
			<?php endif; ?>
      <?php if ($this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite'] > 1): ?>
        <br />
        <em>
    			<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite']; ?>
 x copies
          <?php if ($_SESSION['ht'] == 'ht'): ?>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ht_rabais']; ?>
 € excl. VAT (<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais']; ?>
  € incl. VAT)<br />
          <?php else: ?>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais']; ?>
 € incl. VAT (<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ht_rabais']; ?>
  € excl. VAT)<br />
          <?php endif; ?>
  			</em>
  		<?php endif; ?>
		</td>
		<td>
			<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
" />
					<input type="text" name="quantite" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite']; ?>
" size="1" maxlength="2" />
					<input type="image" name="chgquantity" value="Modify" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/chgquantity.gif" />
				</div>
			</form>
			<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
" />
					<input type="hidden" name="quantite" value="0" />
					<input type="image" name="chgquantity" value="Delete" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/supprimer.gif" />
				</div>
			</form>
		</td>
		<?php if ($_SESSION['ht'] == 'ht'): ?>
		<td>
      <strong><?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_rabais_ht_for_all']; ?>
 €</strong>
    </td>
		<?php endif; ?>
		<td>
      <strong>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais_for_all']; ?>
 €
      </strong>
    </td>
		</tr>
	<?php endfor; endif; ?>
	<tr class="lastline">
		<?php if ($_SESSION['ht'] == 'ht'): ?>
			<td></td>
		<?php endif; ?>
		<td></td>
		<td id="detailtotal">
			Total excl. VAT<br />
			+ VAT<br />
			Total incl. VAT
		</td>
		<td>
      <?php echo $this->_tpl_vars['prix_ht_total']; ?>
  €<br />
      <?php echo $this->_tpl_vars['tva_totale']; ?>
  €<br />
			<?php echo $this->_tpl_vars['prix_total']; ?>
  €
		</td>
	</tr>
</table>
<?php if ($this->_tpl_vars['delai_max']): ?>
  Lead time: <strong><?php echo $this->_tpl_vars['delai_max']; ?>
 days</strong>
	<br />
	<em>Delivery time must be added to lead time. 
	Delivery times vary according to destination and transport modes.</em>
<?php else: ?>
  <!-- <strong>No</strong> lead time -->
<?php endif; ?>

	<div class="validcmd">
		<?php if ($_GET['ajout'] == 1): ?>
			<a href="<?php echo $_GET['url']; ?>
" id="poursuivre"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/poursuivre.gif" alt="Continue with your purchases" /></a>
		<?php endif; ?>

		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/valider.gif" alt="Validate the order" /></a>
	</div>
</div>

<?php else: ?>
<div id="panier">
<h2>Your basket is empty</h2>
<p>
  Please search for a book and then add it to your basket.
  <br />
  You may choose from 3 search modes:
</p>  
<ul>
  <li>
    <strong>Using the quick search tool:</strong>
    <br />
    Simply enter a keyword, an author's name or
    a title to find a corresponding book. 
    This function is located in the orange banner at the top of this page.
  </li>
  <li>
    <strong>Using the
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch'>advanced search tool</a></strong>
    <br />
  </li>
  <li>
    <strong>Using the
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-dictionnaire-et-lexique-c0'>catalogue</a>:
    </strong><br />
    Simply click on the category that interests you 
    to access the corresponding sub-categories. Then select
    a sub-category to access the corresponding books.
  </li>
</ul>
</div>
<?php endif; ?>