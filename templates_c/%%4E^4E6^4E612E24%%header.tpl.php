<?php /* Smarty version 2.6.31, created on 2019-10-30 17:56:44
         compiled from es/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_encode', 'es/header.tpl', 12, false),array('modifier', 'htmlentities', 'es/header.tpl', 25, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php if ($this->_tpl_vars['showproduct']['nom']): ?>
    <title><?php echo ((is_array($_tmp=$this->_tpl_vars['showproduct']['nom'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
</title>
  <?php elseif ($this->_tpl_vars['nomvitrine'] == 1): ?>
    <title><?php echo $this->_tpl_vars['namesite']; ?>
 - El especialista del diccionario ¡Más de 4000 obras
  para lingüistas y traductores!</title>
  <?php else: ?>
    <title><?php echo $this->_tpl_vars['namesite']; ?>
</title>
  <?php endif; ?>
  <meta name="revisit-after" content="10 days" />
  <meta name="robots" content="index,follow" />
  <meta name="DC.title" content="Dicoland" />
  <meta name="description" content="Todos los diccionarios especializados.
  Más de 4000 obras para traductores y lingüistas." />
<?php if (isset ( $this->_tpl_vars['meta'] )): ?>
	<meta name="keywords" content="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['meta'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)))) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
" />
<?php else: ?>
  <meta name="keywords" content="Dicoland.com, lmdd, traducción,diccionario,
	especializado, dictionary, maison du dictionnaire, traductor, lingüista,
	libro, fonética, etimología,
diccionario, lenguas, traductor, dicoland, dico-land, terminológico,
terminología, onomatopeyas, sufijo, pronunciación, abreviatura, anglicismo,
sinónimos, sinónimo, médico, francófono, sinónimos, técnico, filosófico,
japonés, traducción, vidal, petit robert, derecho, etimológico, filosofía,
economía, comercial, traductor, collins, colins, argot, bilingüe, trilingüe,
monolingüe, franco, culinario, economía, alemán, lengua, francesa, bíblico,
medicamentos, proverbios, finanzas, cine, crucigrama, flamenco, biología,
cocina, sinonimo, mitológico, significado, traducir, definiciones, letrado,
harrap's, ortografía, enciclopédico, enciclopedia, frances, la rousse, grand,
antónimo, francofono, antónimos, iccionario, dicionario, léxico, homónimo,
letrado, thesaurus, disionario, términos, habituales, científico, acrónimo,
jurrídico, sentido, larouss, verlán, abreviatura, harraps, vocabulario, universal,
acrónimos, anglicismos, dicionario, diconario esp, ciberdiccionario, monolingue,
multidiccionario" />
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
<body>
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

<div id="all">
	<div id="mininavi">
    <img src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/caddy.gif" alt="" /><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">Cesta de la compra</a> |
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=myaccount">Mi cuenta</a> |
    <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=aide">Ayuda</a>
    <?php if ($_SESSION['id_membre']): ?>| <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
logout.php">Salir</a><?php endif; ?>
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
 - El especialista del diccionario ¡Más de 4000 obras
  para lingüistas y traductores!</h1>
		<?php else: ?>
			<h1><?php echo $this->_tpl_vars['namesite']; ?>
</h1>
		<?php endif; ?>
		<a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php" id="logo"></a>
		<p>La tienda de los diccionarios especializados. Métodos de idiomas, CD-ROMs, guías,
		vocabularios, léxicos, terminología... ¡Todo lo que estaba buscando! </p>
		<ul>
			<li><a href="#innerleft">Ir al menú</a></li>
			<li><a href="#search">Ir a búsqueda</a></li>
			<li><a href="#innercenter">Ir al contenido</a></li>
		</ul>
	</div>
	</div>
<div class="wrapper">

  <div class="wide">
    <div id="nav">
      <ul>
        <li<?php if (! isset ( $_GET['page'] )): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php">Inicio</a></li>
        <li<?php if ($_GET['page'] == 'catalogue'): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-dictionnaire-et-lexique-c0">Catálogo</a></li>
        <li<?php if ($_GET['page'] == 'catediteur' && $this->_tpl_vars['show_catalogue_lmdd']): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-editeur-la-maison-du-dictionnaire-e12">La Maison du dictionnaire</a></li>
        <li<?php if ($_GET['page'] == 'catediteur' && $this->_tpl_vars['show_catalogue_mediqualis']): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-editeur-mediqualis-e0">Médiqualis</a></li>
        <li<?php if ($_GET['page'] == 'catalogue'): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
E-Book-c351">E-Book</a></li>
        <li<?php if ($_GET['page'] == 'myaccount'): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=myaccount">Mi cuenta</a></li>
        <li<?php if ($_GET['page'] == 'showpanier'): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">Cesta de la compra</a></li>
        <li<?php if ($_GET['page'] == 'contact'): ?> id="current"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=contact">Contacto</a></li>
        <!-- <li<?php if ($_GET['page'] == 'blog'): ?> id="current"<?php endif; ?>><a href="http://www.dicoland.com/blog/">Blog</a></li> -->
      </ul>
                </div>
                <div id="search">
                  <form method="get" action="index.php">
                        <p>
												<input type="hidden" name="page" value="showresult" />
                        <label for="searchbar">Buscar</label>
                        <input id="searchbar" name="quicksearch" type="text"
												value="<?php echo ((is_array($_tmp=$_GET['quicksearch'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : utf8_encode($_tmp)); ?>
" />
                        <input type="image" alt="Go !" src="<?php echo $this->_tpl_vars['urlsite']; ?>
css/go.gif" name="quicksearch_submit" />
                        <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch" id="advancedsearch">Búsqueda avanzada</a>
                  </p>
                        </form>
                </div>
        </div>