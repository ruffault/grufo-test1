<?php /* Smarty version 2.6.31, created on 2019-11-17 15:23:29
         compiled from de/showproduct.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'categ_link', 'de/showproduct.tpl', 4, false),array('modifier', 'utf8_encode', 'de/showproduct.tpl', 4, false),array('modifier', 'round', 'de/showproduct.tpl', 50, false),)), $this); ?>
<?php echo $this->_tpl_vars['script']; ?>


<div id="showproduct" >
	<div id="cat"><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['id_categorie'])) ? $this->_run_mod_handler('categ_link', true, $_tmp, $this->_tpl_vars['showproduct']['categorie']) : categ_link($_tmp, $this->_tpl_vars['showproduct']['categorie'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['categorie'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></div>
	<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</h2>

	<?php if (( $this->_tpl_vars['showproduct']['realname'] )): ?>
		<p id="realname">Originaltitel : <?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['realname'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</p>
  <?php endif; ?>


	<div class="roundedcornr_box_vitimg">
   		<div class="roundedcornr_top_vitimg"><div></div></div>
      		<div class="roundedcornr_content_vitimg">			

				<div id="desc">
    <span class="img-prod">
    <?php if ($this->_tpl_vars['showproduct']['img_type'] == 'none'): ?>
    <img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/no-image.gif" alt="" />
    <?php else: ?>
      <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['showproduct']['id_produit']; ?>
_normal.<?php echo $this->_tpl_vars['showproduct']['img_type']; ?>
" onclick="zoom('picproduct/<?php echo $this->_tpl_vars['showproduct']['id_produit']; ?>
_normal.<?php echo $this->_tpl_vars['showproduct']['img_type']; ?>
');return false;"><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['showproduct']['id_produit']; ?>
_mini.<?php echo $this->_tpl_vars['showproduct']['img_type']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
" /></a>
    <?php endif; ?>
    </span>

    <div id="infoprod">
    <?php if ($this->_tpl_vars['showproduct']['auteur']): ?>
      <em><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</em>    
    <?php endif; ?>

		<?php if ($this->_tpl_vars['showproduct']['tab_lang'] && $this->_tpl_vars['showproduct']['tab_lang']['0']['cible']): ?>
			<p>-
				<?php unset($this->_sections['langues']);
$this->_sections['langues']['name'] = 'langues';
$this->_sections['langues']['loop'] = is_array($_loop=$this->_tpl_vars['showproduct']['tab_lang']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['langues']['show'] = true;
$this->_sections['langues']['max'] = $this->_sections['langues']['loop'];
$this->_sections['langues']['step'] = 1;
$this->_sections['langues']['start'] = $this->_sections['langues']['step'] > 0 ? 0 : $this->_sections['langues']['loop']-1;
if ($this->_sections['langues']['show']) {
    $this->_sections['langues']['total'] = $this->_sections['langues']['loop'];
    if ($this->_sections['langues']['total'] == 0)
        $this->_sections['langues']['show'] = false;
} else
    $this->_sections['langues']['total'] = 0;
if ($this->_sections['langues']['show']):

            for ($this->_sections['langues']['index'] = $this->_sections['langues']['start'], $this->_sections['langues']['iteration'] = 1;
                 $this->_sections['langues']['iteration'] <= $this->_sections['langues']['total'];
                 $this->_sections['langues']['index'] += $this->_sections['langues']['step'], $this->_sections['langues']['iteration']++):
$this->_sections['langues']['rownum'] = $this->_sections['langues']['iteration'];
$this->_sections['langues']['index_prev'] = $this->_sections['langues']['index'] - $this->_sections['langues']['step'];
$this->_sections['langues']['index_next'] = $this->_sections['langues']['index'] + $this->_sections['langues']['step'];
$this->_sections['langues']['first']      = ($this->_sections['langues']['iteration'] == 1);
$this->_sections['langues']['last']       = ($this->_sections['langues']['iteration'] == $this->_sections['langues']['total']);
?>
					<?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['tab_lang'][$this->_sections['langues']['index']]['source'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>

					/
					<?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['tab_lang'][$this->_sections['langues']['index']]['cible'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>

					-
				<?php endfor; endif; ?>
			</p>
		<?php endif; ?>
    
		<?php if ($this->_tpl_vars['showproduct']['prix_editeur'] > $this->_tpl_vars['showproduct']['prix'] && $this->_tpl_vars['showproduct']['prix'] && $this->_tpl_vars['showproduct']['prix'] != '0.00'): ?>
      <?php if ($_SESSION['ht'] == 'ht'): ?>
        <span id="prixediteur">Verlagspreis: <?php echo $this->_tpl_vars['showproduct']['prix_editeur_ht']; ?>
 € zzgl. MwSt</span><br/>
      <?php else: ?>
        <span id="prixediteur">Verlagspreis : <?php echo $this->_tpl_vars['showproduct']['prix_editeur']; ?>
 € einschl. MwSt</span><br/>
      <?php endif; ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['showproduct']['rabais'] != '0.00' && $this->_tpl_vars['showproduct']['prix'] != '0.00'): ?>
      <?php if ($_SESSION['ht'] == 'ht'): ?>
        <div id="rabais"><span id="oldprice"><?php echo $this->_tpl_vars['showproduct']['prix_ht']; ?>
 €</span> <span id="reduc">-<?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['rabais'])) ? $this->_run_mod_handler('round', true, $_tmp) : round($_tmp)); ?>
%</span></div>
      <?php else: ?>
        <div id="rabais"><span id="oldprice"><?php echo $this->_tpl_vars['showproduct']['prix']; ?>
 €</span> <span id="reduc">-<?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['rabais'])) ? $this->_run_mod_handler('round', true, $_tmp) : round($_tmp)); ?>
%</span></div>
      <?php endif; ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['showproduct']['prix'] != '0.00'): ?>
      <?php if ($this->_tpl_vars['showproduct']['rabais'] != '0.00'): ?>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
          <span id="prix"><?php echo $this->_tpl_vars['showproduct']['prix_rabais_ht']; ?>
 € zzgl. MwSt (<?php echo $this->_tpl_vars['showproduct']['prix_rabais']; ?>
€ einschl. MwSt)</span>
        <?php else: ?>
          <span id="prix"><?php echo $this->_tpl_vars['showproduct']['prix_rabais']; ?>
 € einschl. MwSt (<?php echo $this->_tpl_vars['showproduct']['prix_rabais_ht']; ?>
€ zzgl. MwSt)</span>
        <?php endif; ?>
      <?php else: ?>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
          <span id="prix"><?php echo $this->_tpl_vars['showproduct']['prix_ht']; ?>
 € zzgl. MwSt (<?php echo $this->_tpl_vars['showproduct']['prix']; ?>
€ einschl. MwSt)</span>
        <?php else: ?>
          <span id="prix"><?php echo $this->_tpl_vars['showproduct']['prix']; ?>
 € einschl. MwSt (<?php echo $this->_tpl_vars['showproduct']['prix_ht']; ?>
€ zzgl. MwSt)</span>
        <?php endif; ?>
      <?php endif; ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['showproduct']['disponible'] == 0 && $this->_tpl_vars['showproduct']['delai_reapprovisionnement'] && $this->_tpl_vars['showproduct']['prix'] != '0.00' && $this->_tpl_vars['showproduct']['sommeil'] != 1): ?>
      Artikel lieferbar binnen <?php echo $this->_tpl_vars['showproduct']['delai_reapprovisionnement']; ?>
 Tagen<br />
    <?php elseif ($this->_tpl_vars['showproduct']['disponible'] == 1 && $this->_tpl_vars['showproduct']['prix'] != '0.00' && $this->_tpl_vars['showproduct']['sommeil'] != 1): ?>
      <!--Artikel lieferbar--><br />
    <?php elseif ($this->_tpl_vars['showproduct']['prix'] == '0.00' || $this->_tpl_vars['showproduct']['sommeil'] == 1): ?>
      Artikel nicht lieferbar<br />
    <?php endif; ?>

    <?php if ($this->_tpl_vars['showproduct']['prix'] != 0 && $this->_tpl_vars['showproduct']['sommeil'] != 1): ?>
    <form method="get" action="<?php echo $this->_tpl_vars['urlsite']; ?>
addtopanier.php?nbpage=1&amp;pagecourante=1&amp;nbresult=1">
      <div>
        <input type="image" value="In den Warenkorb" src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/addcaddy_big.gif" />
        <input type="hidden" name="quantite" value="1" />
        <input type="hidden" name="page" value="vitrine" />
        <input type="hidden" name="id_produit" value="<?php echo $this->_tpl_vars['showproduct']['id_produit']; ?>
" />
      </div>
    </form>
    <?php endif; ?>
    
    	<a href="#" onclick="window.open('<?php echo $this->_tpl_vars['urlsite']; ?>
recommend.php?id=1511','_blank','width=400,height=265,toolbar=0,location=0,directories=0,menuBar=0,resizable=1,scrollbars=1');">
		<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/recommend_friend.png" alt="" />Buch einem/r Bekannten empfehlen]</a>
  </div>  

  </div>  


      					</div>
   					<div class="roundedcornr_bottom_vitimg"><div></div></div>
				</div>		


  <?php if ($this->_tpl_vars['showproduct']['description'] || $this->_tpl_vars['showproduct']['info_divers']): ?>
  <div id='info'>
    <?php if ($this->_tpl_vars['showproduct']['description']): ?> 
      <h4><span class="deco">></span>Beschreibung</h4>
      <p><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['description'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</p>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['showproduct']['info_divers']): ?>
        <br>
      <p>Sonstige Informationen :<?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['info_divers'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</p>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['showproduct']['pdfap']): ?>
      <h4><span class="deco">></span><a href="<?php echo $this->_tpl_vars['showproduct']['pdfap']; ?>
"> Download einen Überblick über das Buch</a></h4>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  
  <div id="caract">
    
		<h4><span class="deco">></span>Produktmerkmale</h4>
		
		<table id="detailprod">
			<tr>
				<td>
					<ul>
						<?php if (! $this->_tpl_vars['showproduct']['tab_lang'] && $this->_tpl_vars['showproduct']['langues']): ?>
							<li><strong>Sprachen : </strong><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['langues'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</li>
						<?php elseif (! $this->_tpl_vars['showproduct']['tab_lang']['0']['cible'] && $this->_tpl_vars['showproduct']['tab_lang']['0']['source']): ?>
							<li><strong>Sprachen : </strong><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['tab_lang']['0']['source'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['showproduct']['categorie']): ?>
							<li><strong>Kategorie: </strong><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['id_categorie'])) ? $this->_run_mod_handler('categ_link', true, $_tmp, $this->_tpl_vars['showproduct']['categorie']) : categ_link($_tmp, $this->_tpl_vars['showproduct']['categorie'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['categorie'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['showproduct']['auteur']): ?>
							<li><strong>Autor: </strong><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['showproduct']['nb_pages']): ?>
							<li><strong>Seitenzahl: </strong><?php echo $this->_tpl_vars['showproduct']['nb_pages']; ?>
</li>
						<?php endif; ?>
					</ul>
				</td>
				<td>
					<ul>
						<?php if ($this->_tpl_vars['showproduct']['nb_termes']): ?>
							<li><strong>Anzahl Einträge: </strong><?php echo $this->_tpl_vars['showproduct']['nb_termes']; ?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['showproduct']['index']): ?>
							<li><strong>Index vorhanden</strong></li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['showproduct']['date_parution']): ?>
							<li><strong>Erscheinungsdatum: </strong><?php echo $this->_tpl_vars['showproduct']['date_parution']; ?>
</li>
						<?php endif; ?>
					</ul>
				</td>
				<td>
					<ul>
			      <?php if ($this->_tpl_vars['showproduct']['reference']): ?>
							<li><strong>Bestell-Nr.: </strong><?php echo $this->_tpl_vars['showproduct']['reference']; ?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['showproduct']['type']): ?>
							<li><strong>Produktart: </strong><?php echo $this->_tpl_vars['showproduct']['type']; ?>
</li>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['showproduct']['prix_editeur'] != '0.00'): ?>
							<li><strong>Verlagspreis:</strong>
							<?php if ($_SESSION['ht'] == 'ht'): ?>
								<?php echo $this->_tpl_vars['showproduct']['prix_editeur_ht']; ?>
 € zzgl. MwSt 
							<?php else: ?>
								<?php echo $this->_tpl_vars['showproduct']['prix_editeur']; ?>
 € einschl. MwSt
							<?php endif; ?>
							</li>
						<?php endif; ?>

					</ul>
				</td>
			</tr>
		</table>
	</div>



</div>