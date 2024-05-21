<?php /* Smarty version 2.6.31, created on 2019-10-30 17:56:39
         compiled from en/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'en/header.tpl', 12, false),array('modifier', 'htmlentities', 'en/header.tpl', 25, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php if ($this->_tpl_vars['showproduct']['nom']): ?>
    <title><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</title>
  <?php elseif ($this->_tpl_vars['nomvitrine'] == 1): ?>
    <title><?php echo $this->_tpl_vars['namesite']; ?>
 - The specialised dictionary company with over 4000 works
  for linguists and translators!</title>
  <?php else: ?>
    <title><?php echo $this->_tpl_vars['namesite']; ?>
</title>
  <?php endif; ?>
  <meta name="revisit-after" content="10 days" />
  <meta name="robots" content="index,follow" />
  <meta name="DC.title" content="Dicoland" />
  <meta name="description" content="All the specialised dictionaries you need.
  Discover over 4000 books for translators and linguists." />
<?php if (isset ( $this->_tpl_vars['meta'] )): ?>
	<meta name="keywords" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['meta'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
" />
<?php else: ?>
  <meta name="keywords" content="Dicoland.com, lmdd, translation, dictionary,
	specialised, dictionary, maison du dictionnaire, dico, translator, linguist,
	book, phonetics, etymology,
dictinary, languages, traslator, dicoland, dico-land, terminological,
terminology, onomatopaea, suffix, pronunciation, abbreviations, anglicism,
synonyms, synonym, medical, francophone, synonims, technical, philosophical,
Japanese, translation, vidal, petit robert, law, ethymological, philosophy,
economy, commercial, translator, collins, colins, slang, bilingual, trilingual,
unilingual, franco, culinary, economy, Germen, languahe, Frensh, biblical,
medicine, proverbs, finance, cinema, crosswords, flemish, biology,
kitchen, sinonym, mythological, signification, translate, definitions, littré,
harrap's, spelling, encyclopedic, encyclopedia, Frenc, la rousse, grand,
antonym, french speaking, antonyms, ictionary, dictionn, lexicon, homonym,
littre, thesaurus, dictionary, terms, usual, scientific, acronym,
legal, sense, larouss, verlan, abbreviation, harraps, vocabulary, universal,
acronyms, anglicisms, dicionary, dicofr, dicorama, cyberdico, monolingual,
multidictionary" />
<?php endif; ?>
  	<style type="text/css" media="screen">@import "<?php echo $this->_tpl_vars['urlsite']; ?>
css/style_globale.css";</style>
  	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.corner.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->_tpl_vars['urlsite']; ?>
favicon.ico" />
	<link rel="icon" type="image/png" href="<?php echo $this->_tpl_vars['urlsite']; ?>
favicon.png" />
</head>
<?php echo '
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-15971834-1\']);
  _gaq.push([\'_trackPageview\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
'; ?>

<body>
<div id="all" style="margin-top:-15px;">
		<div id="mininavi">
			<img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/caddy.gif" alt="" /><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">Basket</a> |
			<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=myaccount">My account</a> |
			<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=aide">Help</a>
			<?php if ($_SESSION['id_membre']): ?>| <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
logout.php">Exit</a><?php endif; ?>
			<div id='lang'>
				<a href='<?php echo $this->_tpl_vars['originalurl']; ?>
chglang.php?aplan=fr' title='Français'><img src='<?php echo $this->_tpl_vars['urlsite']; ?>
img/flag_fr.gif' alt='Français' /></a>
				<a href='<?php echo $this->_tpl_vars['originalurl']; ?>
chglang.php?aplan=en' title='English'><img src='<?php echo $this->_tpl_vars['urlsite']; ?>
img/flag_en.gif' alt='English' /></a>
				<a href='<?php echo $this->_tpl_vars['originalurl']; ?>
chglang.php?aplan=de' title='Deutsch'><img src='<?php echo $this->_tpl_vars['urlsite']; ?>
img/flag_de.gif' alt='Deutsch' /></a>
				<a href='<?php echo $this->_tpl_vars['originalurl']; ?>
chglang.php?aplan=es' title='Español'><img src='<?php echo $this->_tpl_vars['urlsite']; ?>
img/flag_es.gif' alt='Español' /></a>
				<a href='<?php echo $this->_tpl_vars['originalurl']; ?>
chglang.php?aplan=it' title='Italiano'><img src='<?php echo $this->_tpl_vars['urlsite']; ?>
img/flag_it.gif' alt='Italiano' /></a>
			</div>
		</div>
		<div class="header">
			<?php if ($this->_tpl_vars['showproduct']['nom']): ?>
				<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</h1>
			<?php elseif ($this->_tpl_vars['nomvitrine'] == 1): ?>
				<h1><?php echo $this->_tpl_vars['namesite']; ?>
 - The specialised dictionary company with over 4000 works
  for linguists and translators!</h1>
			<?php else: ?>
				<h1><?php echo $this->_tpl_vars['namesite']; ?>
</h1>
			<?php endif; ?>
			<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php" id="logo"></a>
			<p>The specialised dictionary store. Language teaching methods, CDROMS, guides,
			vocabularies, glossaries, terminology... We have everything you need! </p>
			<ul>
				<li><a href="#innerleft">Go to menu</a></li>
				<li><a href="#search">Go to search</a></li>
				<li><a href="#innercenter">Go to contents</a></li>
			</ul>
		</div>
	</div>

<div class="wrapper">

  <div class="wide">
    <div id="nav">
      <ul>
        <li<?php if (! isset ( $_GET['page'] )): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
en/">Home</a></li>
        <li<?php if ($_GET['page'] == 'catalogue'): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-dictionnaire-et-lexique-c0">Catalogue</a></li>
        <li<?php if ($_GET['page'] == 'catediteur' && $this->_tpl_vars['show_catalogue_lmdd']): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-editeur-la-maison-du-dictionnaire-e12">La Maison du dictionnaire</a></li>
        <li<?php if ($_GET['page'] == 'catediteur' && $this->_tpl_vars['show_catalogue_mediqualis']): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-editeur-mediqualis-e0">Médiqualis</a></li>
        <li<?php if ($_GET['page'] == 'catalogue'): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
E-Book-c351">E-Book</a></li>
        <li<?php if ($_GET['page'] == 'myaccount'): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=myaccount">My account</a></li>
        <li<?php if ($_GET['page'] == 'showpanier'): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">Basket</a></li>
        <li<?php if ($_GET['page'] == 'contact'): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
en/contact">Contact</a></li>
        <!-- <li<?php if ($_GET['page'] == 'blog'): ?> id="current"<?php endif; ?>><a href="http://www.dicoland.com/blog/">Blog</a></li> -->

      </ul>
                </div>
                <div id="search">
                  <form method="get" action="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php">
                        <p>
												<input type="hidden" name="page" value="showresult" />
                        <label for="searchbar">Search</label>
                        <input id="searchbar" name="quicksearch" type="text"
												value="<?php echo ((is_array($_tmp=$_GET['quicksearch'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
" />
                        <input type="image" alt="Go !" src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/go.gif" name="quicksearch_submit" />
                        <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch" id="advancedsearch">Advanced search</a>
                  </p>
                        </form>
                </div>
        </div>