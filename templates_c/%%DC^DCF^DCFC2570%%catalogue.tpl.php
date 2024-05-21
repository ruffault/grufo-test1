<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:34
         compiled from es/catalogue.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'categ_link', 'es/catalogue.tpl', 8, false),array('modifier', 'utf8_encode', 'es/catalogue.tpl', 8, false),array('modifier', 'urlencode', 'es/catalogue.tpl', 181, false),array('modifier', 'strtolower', 'es/catalogue.tpl', 181, false),array('modifier', 'ucwords', 'es/catalogue.tpl', 181, false),array('function', 'cycle', 'es/catalogue.tpl', 18, false),)), $this); ?>
<div id="catalogue">
<?php if ($_GET['idcat'] != 0): ?>
<h2>
    <span class="deco">></span>
    <span id='current'>
      <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0">Catálogo</a>
      <?php unset($this->_sections['uppercat']);
$this->_sections['uppercat']['name'] = 'uppercat';
$this->_sections['uppercat']['loop'] = is_array($_loop=$this->_tpl_vars['uppercat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['uppercat']['show'] = true;
$this->_sections['uppercat']['max'] = $this->_sections['uppercat']['loop'];
$this->_sections['uppercat']['step'] = 1;
$this->_sections['uppercat']['start'] = $this->_sections['uppercat']['step'] > 0 ? 0 : $this->_sections['uppercat']['loop']-1;
if ($this->_sections['uppercat']['show']) {
    $this->_sections['uppercat']['total'] = $this->_sections['uppercat']['loop'];
    if ($this->_sections['uppercat']['total'] == 0)
        $this->_sections['uppercat']['show'] = false;
} else
    $this->_sections['uppercat']['total'] = 0;
if ($this->_sections['uppercat']['show']):

            for ($this->_sections['uppercat']['index'] = $this->_sections['uppercat']['start'], $this->_sections['uppercat']['iteration'] = 1;
                 $this->_sections['uppercat']['iteration'] <= $this->_sections['uppercat']['total'];
                 $this->_sections['uppercat']['index'] += $this->_sections['uppercat']['step'], $this->_sections['uppercat']['iteration']++):
$this->_sections['uppercat']['rownum'] = $this->_sections['uppercat']['iteration'];
$this->_sections['uppercat']['index_prev'] = $this->_sections['uppercat']['index'] - $this->_sections['uppercat']['step'];
$this->_sections['uppercat']['index_next'] = $this->_sections['uppercat']['index'] + $this->_sections['uppercat']['step'];
$this->_sections['uppercat']['first']      = ($this->_sections['uppercat']['iteration'] == 1);
$this->_sections['uppercat']['last']       = ($this->_sections['uppercat']['iteration'] == $this->_sections['uppercat']['total']);
?>
        &#062; <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['uppercat'][$this->_sections['uppercat']['index']]['id'])) ? $this->_run_mod_handler('categ_link', true, $_tmp, $this->_tpl_vars['uppercat'][$this->_sections['uppercat']['index']]['nom']) : categ_link($_tmp, $this->_tpl_vars['uppercat'][$this->_sections['uppercat']['index']]['nom'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['uppercat'][$this->_sections['uppercat']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a>
      <?php endfor; endif; ?>
    </span>
</h2>
  <?php if ($this->_tpl_vars['categorie_precise']): ?>
  <div id="categ">
    <table>
    <tr>
    <?php unset($this->_sections['categorie_precise']);
$this->_sections['categorie_precise']['name'] = 'categorie_precise';
$this->_sections['categorie_precise']['loop'] = is_array($_loop=$this->_tpl_vars['categorie_precise']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['categorie_precise']['show'] = true;
$this->_sections['categorie_precise']['max'] = $this->_sections['categorie_precise']['loop'];
$this->_sections['categorie_precise']['step'] = 1;
$this->_sections['categorie_precise']['start'] = $this->_sections['categorie_precise']['step'] > 0 ? 0 : $this->_sections['categorie_precise']['loop']-1;
if ($this->_sections['categorie_precise']['show']) {
    $this->_sections['categorie_precise']['total'] = $this->_sections['categorie_precise']['loop'];
    if ($this->_sections['categorie_precise']['total'] == 0)
        $this->_sections['categorie_precise']['show'] = false;
} else
    $this->_sections['categorie_precise']['total'] = 0;
if ($this->_sections['categorie_precise']['show']):

            for ($this->_sections['categorie_precise']['index'] = $this->_sections['categorie_precise']['start'], $this->_sections['categorie_precise']['iteration'] = 1;
                 $this->_sections['categorie_precise']['iteration'] <= $this->_sections['categorie_precise']['total'];
                 $this->_sections['categorie_precise']['index'] += $this->_sections['categorie_precise']['step'], $this->_sections['categorie_precise']['iteration']++):
$this->_sections['categorie_precise']['rownum'] = $this->_sections['categorie_precise']['iteration'];
$this->_sections['categorie_precise']['index_prev'] = $this->_sections['categorie_precise']['index'] - $this->_sections['categorie_precise']['step'];
$this->_sections['categorie_precise']['index_next'] = $this->_sections['categorie_precise']['index'] + $this->_sections['categorie_precise']['step'];
$this->_sections['categorie_precise']['first']      = ($this->_sections['categorie_precise']['iteration'] == 1);
$this->_sections['categorie_precise']['last']       = ($this->_sections['categorie_precise']['iteration'] == $this->_sections['categorie_precise']['total']);
?>
      <?php if ($this->_tpl_vars['categorie_total'] > 30): ?>
        <?php echo smarty_function_cycle(array('name' => 'plop2','values' => "<td><ul>,,,,,,,,,,,,,,,,,"), $this);?>

      <?php elseif ($this->_tpl_vars['categorie_total'] > 20): ?>
        <?php echo smarty_function_cycle(array('name' => 'plop2','values' => "<td><ul>,,,,,,,,,,,,,"), $this);?>

      <?php elseif ($this->_tpl_vars['categorie_total'] > 10): ?>
        <?php echo smarty_function_cycle(array('name' => 'plop2','values' => "<td><ul>,,,,,"), $this);?>

      <?php elseif ($this->_tpl_vars['categorie_total'] > 6): ?>
        <?php echo smarty_function_cycle(array('name' => 'plop2','values' => "<td><ul>,,"), $this);?>

      <?php else: ?>
        <?php echo smarty_function_cycle(array('name' => 'plop2','values' => "<td><ul>,,,"), $this);?>

      <?php endif; ?>
      
      	<li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['categorie_precise'][$this->_sections['categorie_precise']['index']]['id'])) ? $this->_run_mod_handler('categ_link', true, $_tmp, $this->_tpl_vars['categorie_precise'][$this->_sections['categorie_precise']['index']]['nom']) : categ_link($_tmp, $this->_tpl_vars['categorie_precise'][$this->_sections['categorie_precise']['index']]['nom'])); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['categorie_precise'][$this->_sections['categorie_precise']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</a></li>
      <?php if ($this->_tpl_vars['categorie_total'] > 30): ?>
        <?php echo smarty_function_cycle(array('name' => 'plop','values' => ",,,,,,,,,,,,,,,,,</ul></td>"), $this);?>

      <?php elseif ($this->_tpl_vars['categorie_total'] > 20): ?>
        <?php echo smarty_function_cycle(array('name' => 'plop','values' => ",,,,,,,,,,,,,</ul></td>"), $this);?>

      <?php elseif ($this->_tpl_vars['categorie_total'] > 10): ?>
        <?php echo smarty_function_cycle(array('name' => 'plop','values' => ",,,,,</ul></td>"), $this);?>

      <?php elseif ($this->_tpl_vars['categorie_total'] > 6): ?>
        <?php echo smarty_function_cycle(array('name' => 'plop','values' => ",,</ul></td>"), $this);?>

      <?php else: ?>
        <?php echo smarty_function_cycle(array('name' => 'plop','values' => ",,,</ul></td>"), $this);?>

      <?php endif; ?>

    <?php endfor; endif; ?>
    </tr>
    </table>
  </div>
  <?php endif; ?>
<?php else: ?>
  <?php if (! $this->_tpl_vars['notitle']): ?>
    <h2><span class="deco">></span>Catálogo</h2>
  <?php endif; ?>
  <table id="tabcatalogue">
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
abreviations-c1">Abreviaturas</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sigles-c256">Siglas</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-d-asie-et-proche-orient-oceanie-c303">Lenguas asiáticas y del Próximo Oriente - Oceanía</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
arameen-c23">Arameo</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
chinois-c65">Chino</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
laotien-c167">Laosiano</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-d-asie-et-proche-orient-oceanie-c303">(Ver más)
		</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
administration-et-gestion-de-l-entreprise-c308">Administración y gestión de empresas</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
communautes-europeennes-c70">Comunidades europeas</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
economie-c103">Economía</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
management-c181">Dirección</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
administration-et-gestion-de-l-entreprise-c308">(Ver más)
		</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-europeennes-europe-de-l-est-c300">Lenguas europeas + Europa del Este</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
croate-c87">Croata</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
grec-c137">Griego</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
irlandais-c153">Irlandés</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-europeennes-europe-de-l-est-c300">(Ver más)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
batiment-travaux-publics-c305">Construcción - Obras públicas</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
architecture-c24">Arquitectura</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
domotique-c98">Domótica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
mecanique-des-sols-c191">Mecánica de los suelos</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
batiment-travaux-publics-c305">(Ver más)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-indiennes-c301">Lenguas de la India</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
hindi-c140">Hindi</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
nepali-c203">Nepalí</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
tibetain-c279">Tibetano</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-indiennes-c301">(Ver más)</a>  
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">Diccionarios Digital</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">Diccionarios electrónicos</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
E-Book-c351">E-Book</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
cd-rom-c59">CD-ROM</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
logiciel-c174">Software</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">(Ver más)</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-regionales-de-france-c299">Lenguas regionales de Francia</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
alsacien-c12">Alsaciano</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
occitan-c208">Occitano</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
savoyard-c250">Saboyardo</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-regionales-de-france-c299">(Ver más)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-techniques-generaux-c304">Diccionarios técnicos generales</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
anglais-technique-c19">Inglés técnico</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
espagnol-technique-c116">Español técnico</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
francais-technique-c125">Francés técnico</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-techniques-generaux-c304">(Ver más)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-terre-c309">Ciencias de la tierra</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
botanique-c50">Botánica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
geographie-c133">Geografía</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
geologie-c134">Geología</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-terre-c309">(Ver más)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-chimiques-c306">Industrias químicas</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
cosmetiques-c78">Cosmétiques</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
imprimerie-c149">Imprenta</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
textile-c277">Textil</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-chimiques-c306">(Ver más)</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-vie-c310">Ciencias de la vida</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
agro-alimentaire-c7">Agroalimentaria</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
genetique-c131">Genética</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
zoologie-c297">Zoología</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-vie-c310">(Ver más)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-diverses-c307">Industrias diversas</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
arts-spectacles-c28">Artes</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sports-c262">Deportes</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
tourisme-c283">Turismo</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-diverses-c307">(Ver más)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-physiques-c311">Ciencias físicas</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
chimie-c64">Química</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
electronique-c108">Electrónica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
optique-c209">Óptica</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-physiques-c311">(Ver más)</a> 
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langue-francaise-c166">Lengua francesa</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
analogie-francais-c16">Analogía</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
etymologie-francais-c119">Etimología</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
linguistique-francais-c170">Linguística</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langue-francaise-c166">(Ver más)</a> 
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
terminologie-c275">Terminología</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
divers-c95">Diverso</a>...
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-africaines-c302">Lenguas africanas</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
afrikaans-c5">Afrikaans</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
swahili-c266">Swahili</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
wolof-c294">Wolof</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-africaines-c302">(Ver más)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
transports-c285">Transportes</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
aeronautique-c4">Aeronáutica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
automobile-c31">Automóvil</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
marine-c184">Marino</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
transports-c285">(Ver más)</a>
  </td>
  </tr>
  </table>
  
</div>

<div id="catalogue">
<?php if ($this->_tpl_vars['show_liste_editeurs_dans_catalogue']): ?>
<h2><span class="deco">></span>Catálogo por el redactor</h2><br />
    <table>
      <?php unset($this->_sections['tab_editeurs']);
$this->_sections['tab_editeurs']['name'] = 'tab_editeurs';
$this->_sections['tab_editeurs']['loop'] = is_array($_loop=$this->_tpl_vars['tab_editeurs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tab_editeurs']['show'] = true;
$this->_sections['tab_editeurs']['max'] = $this->_sections['tab_editeurs']['loop'];
$this->_sections['tab_editeurs']['step'] = 1;
$this->_sections['tab_editeurs']['start'] = $this->_sections['tab_editeurs']['step'] > 0 ? 0 : $this->_sections['tab_editeurs']['loop']-1;
if ($this->_sections['tab_editeurs']['show']) {
    $this->_sections['tab_editeurs']['total'] = $this->_sections['tab_editeurs']['loop'];
    if ($this->_sections['tab_editeurs']['total'] == 0)
        $this->_sections['tab_editeurs']['show'] = false;
} else
    $this->_sections['tab_editeurs']['total'] = 0;
if ($this->_sections['tab_editeurs']['show']):

            for ($this->_sections['tab_editeurs']['index'] = $this->_sections['tab_editeurs']['start'], $this->_sections['tab_editeurs']['iteration'] = 1;
                 $this->_sections['tab_editeurs']['iteration'] <= $this->_sections['tab_editeurs']['total'];
                 $this->_sections['tab_editeurs']['index'] += $this->_sections['tab_editeurs']['step'], $this->_sections['tab_editeurs']['iteration']++):
$this->_sections['tab_editeurs']['rownum'] = $this->_sections['tab_editeurs']['iteration'];
$this->_sections['tab_editeurs']['index_prev'] = $this->_sections['tab_editeurs']['index'] - $this->_sections['tab_editeurs']['step'];
$this->_sections['tab_editeurs']['index_next'] = $this->_sections['tab_editeurs']['index'] + $this->_sections['tab_editeurs']['step'];
$this->_sections['tab_editeurs']['first']      = ($this->_sections['tab_editeurs']['iteration'] == 1);
$this->_sections['tab_editeurs']['last']       = ($this->_sections['tab_editeurs']['iteration'] == $this->_sections['tab_editeurs']['total']);
?>
		  <tr>
		  <td>
       <img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-editeur-<?php echo $this->_tpl_vars['tab_editeurs'][$this->_sections['tab_editeurs']['index']]['nom']; ?>
-e<?php echo ((is_array($_tmp=$this->_tpl_vars['tab_editeurs'][$this->_sections['tab_editeurs']['index']]['id_editeur'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
"><b><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tab_editeurs'][$this->_sections['tab_editeurs']['index']]['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)))) ? $this->_run_mod_handler('strtolower', true, $_tmp) : strtolower($_tmp)))) ? $this->_run_mod_handler('ucwords', true, $_tmp) : ucwords($_tmp)); ?>
</b></a>
       <?php if ($this->_tpl_vars['show_details'] == '1'): ?> (<?php echo $this->_tpl_vars['tab_editeurs'][$this->_sections['tab_editeurs']['index']]['nbr_online_products']; ?>
 produits)<?php endif; ?>
       <br />
      </td>  
			</tr>
      <?php endfor; endif; ?>
    </table>
<?php endif; ?>
<?php endif; ?>
</div>