<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:47
         compiled from it/catalogue.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'categ_link', 'it/catalogue.tpl', 9, false),array('modifier', 'utf8_encode', 'it/catalogue.tpl', 9, false),array('modifier', 'urlencode', 'it/catalogue.tpl', 182, false),array('modifier', 'strtolower', 'it/catalogue.tpl', 182, false),array('modifier', 'ucwords', 'it/catalogue.tpl', 182, false),array('function', 'cycle', 'it/catalogue.tpl', 19, false),)), $this); ?>
<div id="catalogue">

<?php if ($_GET['idcat'] != 0): ?>
<h2>
    <span class="deco">></span>
    <span id='current'>
      <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0">Catalogo</a>
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
    <h2><span class="deco">></span>Catalogo</h2>
  <?php endif; ?>
  <table id="tabcatalogue">
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
abbreviazioni-c1">Abbreviazioni</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sigle-c256">Sigle</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
lingue-d-asia-e-vicino-oriente-oceania-c303">Lingue Asia e Vicino Oriente - Oceania</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
aramaico-c23">Aramaico</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
cinese-c65">Cinese</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
laotiano-c167">Laotiano</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
lingue-d-asia-e-vicino-oriente-oceania-c303">(Altro)
		</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
amministrazione-e-gestione-d-impresa-c308">Amministrazione e gestione aziendale</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
communautes-europeennes-c70">Comunità Europea</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
economie-c103">Economia</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
management-c181">Management</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
administration-et-gestion-de-l-entreprise-c308">(Altro)
		</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-europeennes-europe-de-l-est-c300">Lingue europee + Europa dell'Est</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
croate-c87">Croato</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
grec-c137">Greco</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
irlandais-c153">Irlandese</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-europeennes-europe-de-l-est-c300">(Altro)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
batiment-travaux-publics-c305">Edilizia - Lavori pubblici</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
architecture-c24">Architettura</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
domotique-c98">Domotica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
mecanique-des-sols-c191">Meccanica del terreno</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
batiment-travaux-publics-c305">(Altro)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-indiennes-c301">Lingue indiane</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
hindi-c140">Hindi</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
nepali-c203">Nepalese</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
tibetain-c279">Tibetano</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-indiennes-301">(Altro)</a>  
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">Digital Dizionari</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">Dizionari elettronici</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
E-Book-c351">E-Book</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
cd-rom-c59">CD-ROM</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
logiciel-c174">Software</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">(Altro)</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-regionales-de-france-c299">Lingue regionali della Francia</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
alsacien-c12">Alsaziano</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
occitan-c208">Occitano</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
savoyard-c250">Savoiardo</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-regionales-de-france-c299">(Altro)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-techniques-generaux-c304">Dizionari tecnici generali</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
anglais-technique-c19">Inglese tecnico</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
espagnol-technique-c116">Spagno tecnico</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
français-technique-c125">Francese tecnico</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-techniques-generaux-c304">(Altro)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-terre-c309">Scienze della Terra</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
botanique-c50">Botanica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
geographie-c133">Geografia</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
geologie-c134">Geologia</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-terre-c309">(Altro)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-chimiques-c306">Industrie chimiche</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
cosmetiques-c78">Cosmetica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
imprimerie-c149">Tipografia</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
textile-c277">Tessile</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-chimiques-c306">(Altro)</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-vie-c310">Scienze della Vita</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
agro-alimentaire-c7">Agroalimentare</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
genetique-c131">Genetica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
zoologie-c297">Zoologia</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-vie-c310">(Altro)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-diverses-c307">Industrie diverse</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
arts-spectacles-c28">Arte-Spettacolo</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sports-c262">Sport</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
tourisme-c283">Turismo</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-diverses-c307">(Altro)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-physiques-c311">Scienze fisiche</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
chimie-c64">Chimica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
electronique-c108">Elettronica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
optique-c209">Ottica</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-physiques-c311">(Altro)</a> 
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langue-francaise-c166">Lingua francese</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
analogie-francais-c16">Analogia</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
etymologie-francais-c119">Etimologia</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
linguistique-francais-c170">Linguistica</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langue-francaise-c166">(Altro)</a> 
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
terminologie-c275">Terminologia</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
divers-c95">Varie</a>...
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-africaines-c302">Lingue africane</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
afrikaans-c5">Afrikaans</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
swahili-c266">Swahili</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
wolof-c294">Wolof</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-africaines-c302">(Altro)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
transports-c285">Trasporti</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
aeronautique-c4">Aeronautica</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
automobile-c31">Automobili</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
marine-c184">Marina</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
transports-c285">(Altro)</a>
  </td>
  </tr>
  </table>
  
</div>

<div id="catalogue">
<?php if ($this->_tpl_vars['show_liste_editeurs_dans_catalogue']): ?>
<h2><span class="deco">></span>Catalogo dal redattore</h2><br />
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