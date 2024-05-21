<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:32
         compiled from es/showpanier.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'es/showpanier.tpl', 19, false),array('modifier', 'product_link', 'es/showpanier.tpl', 28, false),array('modifier', 'utf8_encode', 'es/showpanier.tpl', 28, false),)), $this); ?>
<?php if ($this->_tpl_vars['panier']): ?>
<div id="panier">
<h2><span class="deco">></span>Su cesta de la compra</h2>
<?php if ($_GET['ajout'] == 1): ?>
<h3>Se ha añadido el producto a su cesta  - <a href='<?php echo $_GET['url']; ?>
'>Volver a datos de la obra</a></h3>
<?php endif; ?>
<table id="panier">
	 <caption>Cesta de la compra</caption>
		<tr>
			<th>Detalle</th>
			<th>Cantidad</th>
			<?php if ($_SESSION['ht'] == 'ht'): ?>
			<th>Precio sin IVA</th>
			<?php endif; ?>
			<th>Precio con IVA</th>
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
  		<form method="post" action="remfrompanier.php">
        <div>
            <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
">
            <input type="hidden" name="typeaction" value="decote">
            <input type="image" name="decote" value="Archivar" alt="Archivar" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/mettredecote.gif">
        </div>
      </form>
			<h3><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['nom']) : product_link($_tmp, $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['nom'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['panier'][$this->_sections['panier']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h3>
      <br />
			<?php if ($this->_tpl_vars['panier'][$this->_sections['panier']['index']]['disponible'] == 1): ?>
				Disponible
			<?php else: ?>
			  Disponible en <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['delai_reapprovisionnement']; ?>
 días
			<?php endif; ?>
      <?php if ($this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite'] > 1): ?>
        <br />
        <em>
    			<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite']; ?>
 ejemplares x
          <?php if ($_SESSION['ht'] == 'ht'): ?>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ht_rabais']; ?>
 € sin IVA (<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais']; ?>
  € con IVA)<br />
          <?php else: ?>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais']; ?>
 € con IVA (<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ht_rabais']; ?>
  € sin IVA)<br />
          <?php endif; ?>
  			</em>
  		<?php endif; ?>
		</td>
		<td>
			<form method="post" action="remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
">
					<input type="text" name="quantite" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite']; ?>
" size="1" maxlength="2">
					<input type="image" name="chgquantity" value="Modificar la cantidad" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/chgquantity.gif">
				</div>
			</form>
			<form method="post" action="remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
">
					<input type="hidden" name="quantite" value="0" />
					<input type="image" name="chgquantity" value="Suprimir" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/supprimer.gif">
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
			Total sin IVA<br />
			+ IVA<br />
			Total con IVA
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
  Plazo de aprovisionamiento : <strong><?php echo $this->_tpl_vars['delai_max']; ?>
 días</strong>
<?php else: ?>
  <strong>Ningún</strong> plazo de aprovisionamiento
<?php endif; ?>
<br />
<em>A este plazo debe añadirle el plazo de entrega.
Este último variará según el destino y el modo de transporte.</em>
<div class="validcmd"><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/valider.gif" alt="Confirmar el pedido"></a></div>
</div>

<?php else: ?>
<div id="panier">
<h2>Su cesta de la compra está vacía</h2>
<p>
  Debe buscar un libro y ponerlo en su cesta.
  <br />
  Dispone de 3 formas de búsqueda:
</p>  
<ul>
  <li>
    <strong>La búsqueda rápida</strong>
    <br />
    Basta con introducir una palabra clave (nombre del autor o
    título ) para encontrar el libro deseado. Esta función se encuentra en la barra naranja
    situada en la parte superior de la página.
  </li>
  <li>
    <strong>La
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch'>búsqueda avanzada</a></strong>
    <br />
  </li>
  <li>
    <strong>El 
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0'>catálogo</a> :
    </strong><br />
    Basta con hacer clic sobre la categoría deseada
    para acceder a las subcategorías correspondientes. Elija
    una subcategoría para acceder a los libros deseados.    
    
  </li>
</ul>
</div>
<?php endif; ?>