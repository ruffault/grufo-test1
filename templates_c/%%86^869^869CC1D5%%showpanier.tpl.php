<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:45
         compiled from it/showpanier.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'it/showpanier.tpl', 19, false),array('modifier', 'product_link', 'it/showpanier.tpl', 28, false),array('modifier', 'utf8_encode', 'it/showpanier.tpl', 28, false),)), $this); ?>
<?php if ($this->_tpl_vars['panier']): ?>
<div id="panier">
<h2><span class="deco">></span>Il tuo carrello</h2>
<?php if ($_GET['ajout'] == 1): ?>
<h3>Il prodotto è stato aggiunto al tuo carrello - <a href='<?php echo $_GET['url']; ?>
'>Torna al dettaglio del prodotto</a></h3>
<?php endif; ?>
<table id="panier">
	 <caption>Carrello</caption>
		<tr>
			<th>Dettaglio</th>
			<th>Quantità</th>
			<?php if ($_SESSION['ht'] == 'ht'): ?>
			<th>Prezzo tasse escluse</th>
			<?php endif; ?>
			<th>Prezzo tasse incluse</th>
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
">
            <input type="hidden" name="typeaction" value="decote">
            <input type="image" name="decote" value="Conserva" alt="Conserva" src="<?php echo $this->_tpl_vars['urlsite']; ?>
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
				Disponibile
			<?php else: ?>
			  Disponibile in <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['delai_reapprovisionnement']; ?>
 giorni
			<?php endif; ?>
      <?php if ($this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite'] > 1): ?>
        <br />
        <em>
    			<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite']; ?>
 esemplari x
          <?php if ($_SESSION['ht'] == 'ht'): ?>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ht_rabais']; ?>
 € tasse escluse (<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais']; ?>
  € tasse incluse)<br />
          <?php else: ?>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais']; ?>
 € tasse incluse (<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ht_rabais']; ?>
  € tasse escluse)<br />
          <?php endif; ?>
  			</em>
  		<?php endif; ?>
		</td>
		<td>
			<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
">
					<input type="text" name="quantite" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite']; ?>
" size="1" maxlength="2">
					<input type="image" name="chgquantity" value="Modifier la quantité" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/chgquantity.gif">
				</div>
			</form>

			<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
				<div>
					<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
">
					<input type="hidden" name="quantite" value="0" />
					<input type="image" name="chgquantity" value="Elimina" src="<?php echo $this->_tpl_vars['urlsite']; ?>
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
			Totale tasse escluse<br />
			+ IVA<br />
			Totale tasse incluse
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
  Tempo di approvvigionamento: <strong><?php echo $this->_tpl_vars['delai_max']; ?>
 giorni</strong>
<?php else: ?>
  <strong>Nessun</strong> tempo di approvvigionamento
<?php endif; ?>
<br />
<em>A questo tempo va aggiunto il tempo di consegna, 
che varia a seconda del luogo di destinazione e della modalità di trasporto.</em>
<div class="validcmd"><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/valider.gif" alt="Procedi al pagamento"></a></div>
</div>

<?php else: ?>
<div id="panier">
<h2>Il tuo carrello è vuoto</h2>
<p>
  Devi cercare un libro e inserirlo nel tuo carrello.
  <br />
  Puoi scegliere tra 3 metodi di ricerca:
</p>  
<ul>
  <li>
    <strong>Per usare la ricerca rapida:</strong>
    <br />
    E' sufficiente inserire una parola chiave, il nome di un autore o  
    un titolo per trovare l'opera 
    corrispondente. Questa funzione si trova nella cornice arancione
    in alto in questa pagina.
  </li>
  <li>
    <strong>Per usare la
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch'>ricerca avanzata</a></strong>
    <br />
  </li>
  <li>
    <strong>Per usare il
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0'>catalogo</a>:
    </strong><br />
    E' sufficiente cliccare sulla categoria di tuo interesse 
    per accedere alle sottocategorie corrispondenti. Scegli 
    poi una sottocategoria per accedere ai libri corrispondenti.
  </li>
</ul>
</div>
<?php endif; ?>