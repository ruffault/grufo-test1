<?php /* Smarty version 2.6.31, created on 2019-12-05 21:44:12
         compiled from es/showresult.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'product_link', 'es/showresult.tpl', 7, false),array('modifier', 'utf8_encode', 'es/showresult.tpl', 17, false),array('modifier', 'truncate', 'es/showresult.tpl', 84, false),array('function', 'cycle', 'es/showresult.tpl', 50, false),)), $this); ?>
<div id="showresult">
<?php if ($this->_tpl_vars['resultat'] && $this->_tpl_vars['nb_trouve'] > 5): ?>
  <?php unset($this->_sections['resultat']);
$this->_sections['resultat']['name'] = 'resultat';
$this->_sections['resultat']['loop'] = is_array($_loop=$this->_tpl_vars['resultat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['resultat']['show'] = true;
$this->_sections['resultat']['max'] = $this->_sections['resultat']['loop'];
$this->_sections['resultat']['step'] = 1;
$this->_sections['resultat']['start'] = $this->_sections['resultat']['step'] > 0 ? 0 : $this->_sections['resultat']['loop']-1;
if ($this->_sections['resultat']['show']) {
    $this->_sections['resultat']['total'] = $this->_sections['resultat']['loop'];
    if ($this->_sections['resultat']['total'] == 0)
        $this->_sections['resultat']['show'] = false;
} else
    $this->_sections['resultat']['total'] = 0;
if ($this->_sections['resultat']['show']):

            for ($this->_sections['resultat']['index'] = $this->_sections['resultat']['start'], $this->_sections['resultat']['iteration'] = 1;
                 $this->_sections['resultat']['iteration'] <= $this->_sections['resultat']['total'];
                 $this->_sections['resultat']['index'] += $this->_sections['resultat']['step'], $this->_sections['resultat']['iteration']++):
$this->_sections['resultat']['rownum'] = $this->_sections['resultat']['iteration'];
$this->_sections['resultat']['index_prev'] = $this->_sections['resultat']['index'] - $this->_sections['resultat']['step'];
$this->_sections['resultat']['index_next'] = $this->_sections['resultat']['index'] + $this->_sections['resultat']['step'];
$this->_sections['resultat']['first']      = ($this->_sections['resultat']['iteration'] == 1);
$this->_sections['resultat']['last']       = ($this->_sections['resultat']['iteration'] == $this->_sections['resultat']['total']);
?>
  	<dl class="result">
  		<dd>
        <span class="img-shadow">
          <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['nom'], $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['nom'], $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['categorie'])); ?>
">
          <?php if ($this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['img_type'] == 'none'): ?>
            <img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/no-image_icon.gif" alt="" />
          <?php else: ?>
            <img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['id_produit']; ?>
_icon.<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['img_type']; ?>
" alt="" />
          <?php endif; ?>
          </a>
        </span>
      </dd>
  		<dd><h2>
      <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['nom'], $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['nom'], $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['categorie'])); ?>
"> <?php echo ((is_array($_tmp=$this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h2></dd>
  		<dd><em>Por <?php echo ((is_array($_tmp=$this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</em></dd>
  		<dd>
				<?php if ($this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['disponible'] == 0 && $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['delai_reapprovisionnement'] && $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix'] != '0.00'): ?>
					Artículo disponible en <?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['delai_reapprovisionnement']; ?>
 días
        <?php elseif ($this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['disponible'] == 1 && $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix'] != '0.00'): ?>
          Disponible
        <?php else: ?>
          No disponible
        <?php endif; ?>  
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      <?php if ($this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['rabais'] != '0.00' && $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix'] != '0.00'): ?>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
          <?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_rabais_ht']; ?>
€ sin IVA (<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_rabais']; ?>
€ con IVA)<br />
        <?php else: ?>
          <?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_rabais']; ?>
€ con IVA (<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_rabais_ht']; ?>
€ sin IVA)<br />
        <?php endif; ?>
      <?php elseif ($this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix'] != '0.00'): ?>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
      		<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_ht']; ?>
€ sin IVA(<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix']; ?>
€ con IVA)
        <?php else: ?>
      		<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix']; ?>
€ con IVA(<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_ht']; ?>
€ sin IVA)
        <?php endif; ?>
      <?php endif; ?>
      </strong>
      </span>
      </dd>
  		
      <span class="spacer"></span>
  	</dl>
  	<?php echo smarty_function_cycle(array('values' => ",<div class='clear'></div>"), $this);?>

  	<?php endfor; endif; ?>
    <div id="nbpage">
  	<?php if (isset ( $this->_tpl_vars['link'] )): ?>
  	  <br /><strong>Páginas</strong><br />
    <?php endif; ?>
  
  	<?php if (isset ( $this->_tpl_vars['link_back'] )): ?>
      <?php echo $this->_tpl_vars['link_back']; ?>
anterior</a>
    <?php endif; ?>
  	<?php unset($this->_sections['link']);
$this->_sections['link']['name'] = 'link';
$this->_sections['link']['loop'] = is_array($_loop=$this->_tpl_vars['link']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['link']['show'] = true;
$this->_sections['link']['max'] = $this->_sections['link']['loop'];
$this->_sections['link']['step'] = 1;
$this->_sections['link']['start'] = $this->_sections['link']['step'] > 0 ? 0 : $this->_sections['link']['loop']-1;
if ($this->_sections['link']['show']) {
    $this->_sections['link']['total'] = $this->_sections['link']['loop'];
    if ($this->_sections['link']['total'] == 0)
        $this->_sections['link']['show'] = false;
} else
    $this->_sections['link']['total'] = 0;
if ($this->_sections['link']['show']):

            for ($this->_sections['link']['index'] = $this->_sections['link']['start'], $this->_sections['link']['iteration'] = 1;
                 $this->_sections['link']['iteration'] <= $this->_sections['link']['total'];
                 $this->_sections['link']['index'] += $this->_sections['link']['step'], $this->_sections['link']['iteration']++):
$this->_sections['link']['rownum'] = $this->_sections['link']['iteration'];
$this->_sections['link']['index_prev'] = $this->_sections['link']['index'] - $this->_sections['link']['step'];
$this->_sections['link']['index_next'] = $this->_sections['link']['index'] + $this->_sections['link']['step'];
$this->_sections['link']['first']      = ($this->_sections['link']['iteration'] == 1);
$this->_sections['link']['last']       = ($this->_sections['link']['iteration'] == $this->_sections['link']['total']);
?>
      <?php echo $this->_tpl_vars['link'][$this->_sections['link']['index']]['num']; ?>

  	<?php endfor; endif; ?>
  	<?php if (isset ( $this->_tpl_vars['link_next'] )): ?>
      <?php echo $this->_tpl_vars['link_next']; ?>
siguiente</a>
    <?php endif; ?>
    </div>
<?php elseif ($this->_tpl_vars['resultat'] && $this->_tpl_vars['nb_trouve'] < 6 && $this->_tpl_vars['nb_trouve'] > 0): ?>
  <?php unset($this->_sections['resultat']);
$this->_sections['resultat']['name'] = 'resultat';
$this->_sections['resultat']['loop'] = is_array($_loop=$this->_tpl_vars['resultat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['resultat']['show'] = true;
$this->_sections['resultat']['max'] = $this->_sections['resultat']['loop'];
$this->_sections['resultat']['step'] = 1;
$this->_sections['resultat']['start'] = $this->_sections['resultat']['step'] > 0 ? 0 : $this->_sections['resultat']['loop']-1;
if ($this->_sections['resultat']['show']) {
    $this->_sections['resultat']['total'] = $this->_sections['resultat']['loop'];
    if ($this->_sections['resultat']['total'] == 0)
        $this->_sections['resultat']['show'] = false;
} else
    $this->_sections['resultat']['total'] = 0;
if ($this->_sections['resultat']['show']):

            for ($this->_sections['resultat']['index'] = $this->_sections['resultat']['start'], $this->_sections['resultat']['iteration'] = 1;
                 $this->_sections['resultat']['iteration'] <= $this->_sections['resultat']['total'];
                 $this->_sections['resultat']['index'] += $this->_sections['resultat']['step'], $this->_sections['resultat']['iteration']++):
$this->_sections['resultat']['rownum'] = $this->_sections['resultat']['iteration'];
$this->_sections['resultat']['index_prev'] = $this->_sections['resultat']['index'] - $this->_sections['resultat']['step'];
$this->_sections['resultat']['index_next'] = $this->_sections['resultat']['index'] + $this->_sections['resultat']['step'];
$this->_sections['resultat']['first']      = ($this->_sections['resultat']['iteration'] == 1);
$this->_sections['resultat']['last']       = ($this->_sections['resultat']['iteration'] == $this->_sections['resultat']['total']);
?>
  	<dl class="result">
  		<dd>
        <span class="img-shadow">
          <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['nom'], $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['nom'], $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['categorie'])); ?>
">
          <?php if ($this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['img_type'] == 'none'): ?>
            <img src="<?php echo $this->_tpl_vars['urlsite']; ?>
lang/<?php echo $this->_tpl_vars['applicationlang']; ?>
/img/no-image.gif" alt="" />
          <?php else: ?>
            <img src="<?php echo $this->_tpl_vars['urlsite']; ?>
picproduct/<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['id_produit']; ?>
_mini.<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['img_type']; ?>
" alt="" />
          <?php endif; ?>
          </a>
        </span>
      </dd>
  		<dd><h2>
      <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['id_produit'])) ? $this->_run_mod_handler('product_link', true, $_tmp, $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['nom'], $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['categorie']) : product_link($_tmp, $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['nom'], $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['categorie'])); ?>
"> <?php echo ((is_array($_tmp=$this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></h2></dd>
  		<dd><em>Por <?php echo ((is_array($_tmp=$this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['auteur'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</em></dd>
  		<dd><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['description'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 325, "...", true) : smarty_modifier_truncate($_tmp, 325, "...", true)); ?>
</dd>
  		<dd>
				<?php if ($this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['disponible'] == 0 && $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['delai_reapprovisionnement'] && $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix'] != '0.00' && $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['sommeil'] != 1): ?>
					Artículo disponible en <?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['delai_reapprovisionnement']; ?>
 días
        <?php elseif ($this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['disponible'] == 1 && $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix'] != '0.00' && $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['sommeil'] != 1): ?>
          Disponible
        <?php else: ?>
          No disponible
        <?php endif; ?>  
      </dd>
  		<dd>
      <span class="prix">
      <strong>
      <?php if ($this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['rabais'] != '0.00' && $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix'] != '0.00'): ?>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
          <?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_rabais_ht']; ?>
€ sin IVA (<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_rabais']; ?>
€ con IVA)<br />
        <?php else: ?>
          <?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_rabais']; ?>
€ con IVA (<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_rabais_ht']; ?>
€ sin IVA)<br />
        <?php endif; ?>
      <?php elseif ($this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix'] != '0.00'): ?>
        <?php if ($_SESSION['ht'] == 'ht'): ?>
      		<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_ht']; ?>
€ sin IVA(<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix']; ?>
€ con IVA)
        <?php else: ?>
      		<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix']; ?>
€ con IVA(<?php echo $this->_tpl_vars['resultat'][$this->_sections['resultat']['index']]['prix_ht']; ?>
€ sin IVA)
        <?php endif; ?>
      <?php endif; ?>
      </strong>
      </span>
      </dd>
  		
      <span class="spacer"></span>
  	</dl>
  	<?php echo smarty_function_cycle(array('values' => ",<div class='clear'></div>"), $this);?>

  	<?php endfor; endif; ?>
<?php else: ?>

<h2><span class="deco">></span>Ningún resultado coincide con sus criterios de búsqueda</h2>
<p>
Puede realizar otra búsqueda con menos palabras o con una ortografía diferente.<br />
También puede <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0">recorrer</a> o utilizar las categorías de la barra de menú situada a la izquierda.
</p>
<h3><span class="deco">></span>¿No tiene una idea precisa? Realice una búsqueda por categoría.</h3>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "catalogue.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php endif; ?>
</div>