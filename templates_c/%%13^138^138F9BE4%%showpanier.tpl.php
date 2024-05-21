<?php /* Smarty version 2.6.31, created on 2024-05-17 12:14:57
         compiled from fr/showpanier.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'fr/showpanier.tpl', 18, false),array('modifier', 'product_link', 'fr/showpanier.tpl', 32, false),array('modifier', 'utf8_encode', 'fr/showpanier.tpl', 32, false),)), $this); ?>
<?php if ($this->_tpl_vars['panier']): ?>


<div id="panier">
<h2><span class="deco">></span>Votre Panier</h2>
<table id="panier">
	 <caption>Panier</caption>
	<tr>
    	<th colspan="3" rowspan="1">Descriptif</th>
    	<th class="price" colspan="1">Prix</th>
    	<th class="item" rowspan="1">&nbsp;</th>
        <th class="quantity" rowspan="1">Quantité</th>
        <th class="item" rowspan="1">&nbsp;</th>
        <th class="subtotal" colspan="1">Sous-total</th>
        <th class="delete" rowspan="1">&nbsp;</th>
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

		<td class="decote">
			<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
        		<div>
            		<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
" />
            		<input type="hidden" name="typeaction" value="decote" />
            		<button name="decote">Mettre de cote</button>
    			</div>
      		</form>
		</td>
		<td class="image">
			<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
_icon.jpg"  />
		</td>
		<td class="description">
			<h3><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['nom']) : product_link($_tmp, $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['nom'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['panier'][$this->_sections['panier']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h3>
			<br/>
			<?php if ($this->_tpl_vars['panier'][$this->_sections['panier']['index']]['disponible'] == 1): ?>
				Disponible
			<?php else: ?>
				Disponible sous <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['delai_reapprovisionnement']; ?>
 jours
			<?php endif; ?>
      		<?php if ($this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite'] > 1): ?>
        	<br/>
  			<?php endif; ?>

  		</td>
  		    <td class="price">
  		              	<?php if ($_SESSION['ht'] == 'ht'): ?>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ht_rabais']; ?>
 € HT (<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais']; ?>
  € TTC)<br />
          	<?php else: ?>
            <?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais']; ?>
 € TTC (<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ht_rabais']; ?>
  € HT)<br />
          	<?php endif; ?>
    </td>
  		<td class="item">x</td>
	<td class="quantity">
		<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
			<div class="plus">
    			<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
" />
    			<input type="text" name="quantite" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['quantite']; ?>
" size="1" maxlength="2" />
				<button name="chgquantity">Modifier</button>
  			</div>
		</form>

	</td>
	<td class="item">=</td>
	<?php if ($_SESSION['ht'] == 'ht'): ?>
	    <td class="subtotal">
	    <strong><?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_rabais_ht_for_all']; ?>
 €</strong>
    	</td>
	<?php endif; ?>
	<td class="subtotal">
      <strong><?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['prix_unitaire_ttc_rabais_for_all']; ?>
 €</strong>
    </td>
    <td class="delete">
    		<form method="post" action="<?php echo $this->_tpl_vars['urlsite']; ?>
remfrompanier.php">
			<div class="moins">
    			<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['panier'][$this->_sections['panier']['index']]['id_produit']; ?>
" />
    			<input type="hidden" name="quantite" value="0" />
				<button name="chgquantity">Supprimer</button>
  			</div>
		</form>
    </td>
   
</tr>
<?php endfor; endif; ?>
	<tr class="lastline">
		<td></td>
		<td></td>
				<td></td>
		<td></td>
		<?php if ($_SESSION['ht'] == 'ht'): ?>
			<td></td>
		<?php endif; ?>
		<td></td>
		<td id="detailtotal">
			Total HT<br/>
			+ TVA<br/>
			Total TTC
		</td>
		<td colspan="2" rowspan="1">
      		<?php echo $this->_tpl_vars['prix_ht_total']; ?>
  €<br/>
      		<?php echo $this->_tpl_vars['tva_totale']; ?>
  €<br/>
			<?php echo $this->_tpl_vars['prix_total']; ?>
  €
		</td>
		<td></td>
	</tr>
</table>
<?php if ($this->_tpl_vars['delai_max']): ?>
  Délai d'approvisionnement : <strong><?php echo $this->_tpl_vars['delai_max']; ?>
 jours</strong>
	<br />
	<em>A ce délai il faut ajouter le délai de livraison. 
	Celui-ci varie suivant le lieu de destination et le mode de transport.</em>
<?php else: ?>
  <!-- <strong>Aucun</strong> délai d'approvisionnement -->
<?php endif; ?>

	<div class="validcmd">
		<?php if ($_GET['ajout'] == 1): ?>
			<button onClick="javascript:location.href ='<?php echo $_GET['url']; ?>
'">Poursuivre les achats</button>
		<?php endif; ?>
			<button name="decote" onClick="javascript:location.href ='<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php'" >Poursuivre le processus de commande</button>
	</div>
</div>

<?php else: ?>
<div id="panier">
<h2>Votre panier est vide</h2>
<p>
  Vous devez rechercher un livre puis le mettre dans votre panier.
  <br />
  Vous avez le choix entre 3 méthodes de recherche :
</p>  
<ul>
  <li>
    <strong>Par l'utilisation de la recherche rapide :</strong>
    <br />
    Il vous suffit d'entrer un mot-clef, un nom d'auteur ou 
    un titre pour trouver l'ouvrage 
    correspondant. Cette fonction se trouve dans le bandeau orange
    en haut de cette page.
  </li>
  <li>
    <strong>Par l'utilisation de la 
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch'>recherche avancée</a></strong>
    <br />
  </li>
  <li>
    <strong>Par l'utilisation du 
    <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0'>catalogue</a> :
    </strong><br />
    Il vous suffit de cliquer sur la catégorie qui vous intéresse 
    pour accéder aux sous-catégories correspondantes. Choisissez 
    alors une sous-catégorie pour accéder aux livres correspondant.
  </li>
</ul>
</div>
<?php endif; ?>