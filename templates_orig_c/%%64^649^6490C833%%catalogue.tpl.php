<?php /* Smarty version 2.6.31, created on 2019-11-18 00:05:54
         compiled from en/catalogue.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'categ_link', 'en/catalogue.tpl', 9, false),array('modifier', 'utf8_encode', 'en/catalogue.tpl', 9, false),array('modifier', 'urlencode', 'en/catalogue.tpl', 182, false),array('modifier', 'strtolower', 'en/catalogue.tpl', 182, false),array('modifier', 'ucwords', 'en/catalogue.tpl', 182, false),array('function', 'cycle', 'en/catalogue.tpl', 19, false),)), $this); ?>
<div id="catalogue">

<?php if ($_GET['idcat'] != 0): ?>
<h2>
    <span class="deco">></span>
    <span id='current'>
      <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0">Catalogue</a>
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
    <h2><span class="deco">></span>Catalogue</h2>
  <?php endif; ?>
  <table id="tabcatalogue">
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
abreviations-c1">Abbreviations</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sigles-c256">Acronyms</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-d-asie-et-proche-orient-oceanie-c303">Languages of Asia and the Middle East - Oceania</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
arameen-c23">Aramean</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
chinois-c65">Chinese</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
laotien-c167">Laotian</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-d-asie-et-proche-orient-oceanie-c303">(See more)
		</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
administration-et-gestion-de-l-entreprise-c308">Business administration and management</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
communautes-europeennes-c70">European communities</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
economie-c103">Economy</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
management-c181">Management</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
administration-et-gestion-de-l-entreprise-c308">(See more)
		</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-europeennes-europe-de-l-est-c300">European and East European languages</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
croate-c87">Croatian</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
grec-c137">Greek</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
irlandais-c153">Irish</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-europeennes-europe-de-l-est-c300">(See more)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
batiment-travaux-publics-c305">Buildings and public works sector</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
architecture-c24">Architecture</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
domotique-c98">Home automation</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
mecanique-des-sols-c191">Soil mechanics</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
batiment-travaux-publics-c305">(See more)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-indiennes-c301">Indian languages</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
hindi-c140">Hindi</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
nepali-c203">Nepali</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
tibetain-c279">Tibetan</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-indiennes-c301">(See more)</a>  
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">Digital Dictionaries</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">Electronics dictionaries</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
E-Book-c351">E-Book</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
cd-rom-c59">CD-ROM</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
logiciel-c174">Software</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">(See more)</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-regionales-de-france-c299">Regional languages of France</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
alsacien-c12">Alsation</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
occitan-c208">Occitan</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
savoyard-c250">Savoyard</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-regionales-de-france-c299">(See more)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-techniques-generaux-c304">General technical dictionaries</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
anglais-technique-c19">Technical English</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
espagnol-technique-c116">Technical Spanish</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
francais-technique-c125">Technical French</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-techniques-generaux-c304">(See more)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-terre-c309">Earth sciences</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
botanique-c50">Botany</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
geographie-c133">Geography</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
geologie-c134">Geology</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-terre-c309">(See more)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-chimiques-c306">Chemical industries</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
cosmetiques-c78">Cosmetics</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
imprimerie-c149">Printers</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
textile-c277">Textile</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-chimiques-c306">(See more)</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-vie-c310">Life sciences</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
agro-alimentaire-c7">Agri-foodstuffs</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
genetique-c131">Genetics</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
zoologie-c297">Zoology</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-vie-c310">(See more)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-diverses-c307">Miscellaneous industries</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
arts-spectacles-c28">Arts-Entertainment</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sports-c262">Sports</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
tourisme-c283">Tourism</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-diverses-c307">(See more)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-physiques-c311">Physical sciences</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
chimie-c64">Chemistry</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
electronique-c108">Electronics</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
optique-c209">Optics</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-physiques-c311">(See more)</a> 
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langue-francaise-c166">French language</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
analogie-francais-c16">Analogy</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
etymologie-francais-c119">Etymology</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
linguistique-francais-c170">Linguistics</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langue-francaise-c166">(See more)</a> 
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
terminologie-c275">Terminology</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
divers-c95">Miscellaneous</a> etc.
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-africaines-c302">African languages</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
afrikaans-c5">Afrikaans</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
swahili-c266">Swahili</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
wolof-c294">Wolof</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-africaines-c302">(See more)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
transports-c285">Transport</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
aeronautique-c4">Aeronautics</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
automobile-c31">Automobile</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
marine-c184">Marine</a> etc.
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
transports-c285">(See more)</a>
  </td>
  </tr>
  </table>
  
</div>

<div id="catalogue">
<?php if ($this->_tpl_vars['show_liste_editeurs_dans_catalogue']): ?>
<h2><span class="deco">></span>Catalogue by editor</h2><br />
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