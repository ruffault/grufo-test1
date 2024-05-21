<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:20
         compiled from de/showpanier.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'de/showpanier.tpl', 16, false),array('modifier', 'product_link', 'de/showpanier.tpl', 26, false),array('modifier', 'utf8_encode', 'de/showpanier.tpl', 26, false),)), $this); ?>
<?php if ($this->_tpl_vars['panier']): ?>
<div id="panier">
<h2><span class="deco">></span>Ihr Warenkorb</h2>
<table id="panier">
	 <caption>Warenkorb</caption>
		<tr>
			<th>Detail</th>
			<th>Menge</th>
			<?php if ($_SESSION['ht'] == 'ht'): ?>
			<th>Preis zzgl. MwSt</th>
			<?php endif; ?>
			<th>Preis einschl. MwSt</th>
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
            <input type="image" name="decote" value="Beiseite legen" alt="Beiseite legen" src="<?php echo $this->_tpl_vars['urlsite']; ?>
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
				Lieferbar
			<?php else: ?>
			  Lieferbar binnen <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['delai_reapprovisionnement']; ?>
 Tagen
			<?php endif; ?>
      <?php if ($this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite'] > 1): ?>
        <br />
        <em>
    			<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite']; ?>
 x Stück
          <?php if ($_SESSION['ht'] == 'ht'): ?>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ht_rabais']; ?>
 € zzgl. MwSt (<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais']; ?>
  € einschl. MwSt)<br />
          <?php else: ?>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais']; ?>
 € einschl. MwSt (<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ht_rabais']; ?>
  € zzgl. MwSt)<br />
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
					<input type="image" name="chgquantity" value="Ändern" src="<?php echo $this->_tpl_vars['urlsite']; ?>
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
					<input type="image" name="chgquantity" value="Löschen" src="<?php echo $this->_tpl_vars['urlsite']; ?>
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
			Gesamtpreis zzgl. MwSt<br />
			+ MwSt<br />
			Gesamtpreis einschl. MwSt
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
  Beschaffungsfrist: <strong><?php echo $this->_tpl_vars['delai_max']; ?>
 Tage</strong>
	<br />
	<em>Zu dieser Frist kommt die Lieferfrist, die vom Bestimmungsort und der Transportart
	abhängig ist.</em>
<?php else: ?>
  <!-- <strong>Keine</strong> Beschaffungsfrist -->
<?php endif; ?>

	<div class="validcmd">
		<?php if ($_GET['ajout'] == 1): ?>
			<a href="<?php echo $_GET['url']; ?>
" id="poursuivre"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/poursuivre.gif" alt="Einkauf fortsetzen" /></a>
		<?php endif; ?>

		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/valider.gif" alt="Bestellung freigeben" /></a>
	</div>
</div>

<?php else: ?>
<div id="panier">
<h2>Ihr Warenkorb ist leer</h2>
<p>
  Suchen Sie ein Buch und legen Sie es in Ihren Warenkorb. 
  <br />
  Sie haben 3 Möglichkeiten, eine Suche durchzuführen:
  </p>  
<ul>
  <li>
    <strong>Schnellsuche</strong>
    <br />
    Geben Sie einfach ein Stichwort, einen Autor oder einen Buchtitel ein, um das
    gewünschte Buch zu suchen. Die Schnellsuchfunktion befindet sich auf der
    orangefarbenen Leiste oben auf der Seite. 
  </li>
  <li>
    <strong> 
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch'>Erweiterte Suche</a></strong>
    <br />
  </li>
  <li>
    <strong>Per 
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-dictionnaire-et-lexique-c0'>Katalogsuche</a> 
    </strong><br />
    Klicken Sie einfach auf die gewünschte Kategorie, um auf die dazugehörigen 
    Unterkategorien zugreifen zu können. Wählen Sie anschließend eine Unterkategorie, 
    um die entsprechenden Bücher anzuzeigen.
  </li>
</ul>
</div>
<?php endif; ?>