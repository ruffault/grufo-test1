<?php /* Smarty version 2.6.31, created on 2024-05-16 10:11:51
         compiled from fr/catalogue.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'categ_link', 'fr/catalogue.tpl', 9, false),array('modifier', 'utf8_encode', 'fr/catalogue.tpl', 9, false),array('modifier', 'urlencode', 'fr/catalogue.tpl', 184, false),array('modifier', 'strtolower', 'fr/catalogue.tpl', 184, false),array('modifier', 'ucwords', 'fr/catalogue.tpl', 184, false),array('function', 'cycle', 'fr/catalogue.tpl', 19, false),)), $this); ?>
<div id="catalogue">

<?php if ($_GET['idcat'] != 0): ?>
<h2>
    <span class="deco">></span>
    <span id='current_span'>
      <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaire-et-lexique-c0">Catalogue par catégorie</a>
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
	</ul>
	</td>
    </tr>
    </table>
  </div>
  <?php endif; ?>
<?php else: ?>
  <?php if (! $this->_tpl_vars['notitle']): ?>
    <h2><span class="deco">></span>Catalogue par catégorie</h2>
  <?php endif; ?>
  <table id="tabcatalogue">
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
abreviations-c1">Abréviations</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sigles-c256">Sigles</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-d-asie-et-proche-orient-oceanie-c303">Langues d'Asie et Proche-Orient - Océanie</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
arameen-c23">Araméen</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
chinois-c65">Chinois</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
laotien.html-c167">Laotien</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-d-asie-et-proche-orient-oceanie-c303">(Voir plus)
		</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
administration-et-gestion-de-l-entreprise-c308">Administration et gestion de l'entreprise</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
communautes-europeennes-c70">Communautés Européennes</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
economie-c103">Economie</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
management-c181">Management</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
administration-et-gestion-de-l-entreprise-c308">(Voir plus)
		</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-europeennes-europe-de-l-est-c300">Langues Européennes + Europe de l'Est</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
croate-c87">Croate</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
grec-c137">Grec</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
irlandais-c153">Irlandais</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-europeennes-europe-de-l-est-c300">(Voir plus)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
batiment-travaux-publics-c305">Bâtiment - Travaux-Publics</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
architecture-c24">Architecture</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
domotique-c98">Domotique</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
mecanique-des-sols-c191">Mécanique des sols</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
batiment-travaux-publics-c305">(Voir plus)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-indiennes-c301">Langues Indiennes</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
hindi-140">Hindi</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
nepali-c203">Népali</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
tibetain-c279">Tibétain</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-indiennes-c301">(Voir plus)</a>  
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-numeriques-c352">Dictionnaires Numériques</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">Dictionnaires électroniques</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
E-Book-c351">E-Book</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
cd-rom-c59">CD-ROM</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
logiciel-c174">Logiciel</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-electroniques-c312">(Voir plus)</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-regionales-de-france-299">Langues régionales de France</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
alsacien-c12">Alsacien</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
occitan-c208">Occitan</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
savoyard-c250">Savoyard</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-regionales-de-france-c299">(Voir plus)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-techniques-generaux-c304">Dictionnaires techniques généraux</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
anglais-technique-c19">Anglais Technique</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
espagnol-technique-c116">Espagnol Technique</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
francais-technique-c125">Français Technique</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
dictionnaires-techniques-generaux-c304">(Voir plus)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-terre-c309">Sciences de la terre</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
botanique-50">Botanique</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
geographie-c133">Géographie</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
geologie-c134">Géologie</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-terre-c309">(Voir plus)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-chimiques-c306">Industries chimiques</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
cosmetiques-c78">Cosmétiques</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
imprimerie-c149">Imprimerie</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
textile-c277">Textile</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-chimiques-c306">(Voir plus)</a>  
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-vie-c310">Sciences de la vie</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
agro-alimentaire-c7">Agroalimentaire</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
genetique-c131">Génétique</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
zoologie.html-c297">Zoologie</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-de-la-vie-c310">(Voir plus)</a>
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-diverses-c307">Industries diverses</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
arts-spectacles-c28">Arts-Spectacles</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sports-c262">Sports</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
tourisme-c283">Tourisme</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
industries-diverses-c307">(Voir plus)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-physiques-c311">Sciences physiques</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
chimie-c64">Chimie</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
electronique-c108">Electronique</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
optique-c209">Optique</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
sciences-physiques-c311">(Voir plus)</a> 
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langue-francaise-c166">Langue Française</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
analogie-francais-c16">Analogie</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
etymologie-francais-c119">Etymologie</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
linguistique-francais-c170">Linguistique</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langue-francaise-c166">(Voir plus)</a> 
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
terminologie-c275">Terminologie</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
divers-c95">Divers</a>...
  </td>
  </tr>
  <tr>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-africaines-c302">Langues Africaines</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
afrikaans-5">Afrikaans</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
swahili-c266">Swahili</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
wolof-c294">Wolof</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
langues-africaines-c302">(Voir plus)</a>
  </td>
  <td>
    <h3><img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/puce2.gif" alt="" /> <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
transports-c285">Transports</a></h3>
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
aeronautique-c4">Aéronautique</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
automobile-c31">Automobile</a>, <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
marine-c184">Marine</a>...
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
transports-c285">(Voir plus)</a>
  </td>
  </tr>
  </table>
  
</div>

<div id="catalogue2">
<?php if ($this->_tpl_vars['show_liste_editeurs_dans_catalogue']): ?>
<h2><span class="deco">></span>Catalogue par éditeur</h2><br />
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