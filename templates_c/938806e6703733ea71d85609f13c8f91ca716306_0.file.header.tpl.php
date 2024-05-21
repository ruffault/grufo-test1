<?php
/* Smarty version 3.1.33, created on 2019-10-30 01:02:24
  from '/var/www/clients/client1/web1/web/templates/fr/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db8e1203baa36_03531473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '938806e6703733ea71d85609f13c8f91ca716306' => 
    array (
      0 => '/var/www/clients/client1/web1/web/templates/fr/header.tpl',
      1 => 1514990553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db8e1203baa36_03531473 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?xml ';?>version="1.0" encoding="UTF-8"<?php echo '?>';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php if ($_smarty_tpl->tpl_vars['showproduct']->value['nom']) {?>
    <title><?php echo utf8_encode($_smarty_tpl->tpl_vars['showproduct']->value['nom']);?>
</title>
  <?php } elseif ($_smarty_tpl->tpl_vars['nomvitrine']->value == 1) {?>
    <title><?php echo $_smarty_tpl->tpl_vars['namesite']->value;?>
 - La maison du dictionnaire spécialisé Plus de 4000 ouvrages
  pour linguistes et traducteurs !</title>
  <?php } else { ?>
    <title><?php echo $_smarty_tpl->tpl_vars['namesite']->value;?>
</title>
  <?php }?>
	<meta name="revisit-after" content="10 days" />
	<meta name="robots" content="index,follow" />
	<meta name="DC.title" content="Dicoland" />
	<meta name="description" content="Tous les dictionnaires spécialisés.Trouvez plus de 4000 ouvrages pour traducteurs et linguistes." />
	<meta property="og:type" content="company"/>
	<meta property="og:url" content="http://www.dicoland.com/"/>
	<meta property="og:site_name" content="Dicoland"/>
	<meta property="og:title" content="Dicoland - La maison du dictionnaire plus de 4000 ouvrages pour linguistes et traducteurs"/>
<?php if (isset($_smarty_tpl->tpl_vars['meta']->value)) {?>
	<meta name="keywords" content="<?php echo utf8_encode(htmlentities($_smarty_tpl->tpl_vars['meta']->value));?>
" />
<?php } else { ?>
  <meta name="keywords" content="Dicoland.com, lmdd, traduction,dictionnaire,
	spécialisé, dictionary, maison du dictionnaire, dico, traducteur, linguiste,
	livre, phonétique, étymologie,
dictionaire, langues, traducteur, dicoland, dico-land, terminologique,
terminologie, onomatopées, suffixe, prononciation, abréviations, anglicisme,
synonymes, synonyme, medical, francophone, synonimes, technique, philosophique,
japonais, traduction, vidal, petit robert, droit, éthymologique, philosophie,
économie, commercial, traducteur, collins, colins, argot, bilingue, trilingue,
unilingue, franco, culinaire, économie, allemend, langue, francaise, biblique,
medicaments, proverbes, finance, cinéma, mots croisés, flamand, biologie,
cuisine, sinonyme, mythologique, signification, traduire, définitions, littré,
harrap's, orthographe, encyclopedique, encyclopedie, françai, la rousse, grand,
antonyme, francophone, antonymes, ictionnaire, dictionn, léxique, homonyme,
littre, thésaurus, dictionaire, termes, usuel, scientifique, acronyme,
juridique, sens, larouss, verlan, abréviation, harraps, vocabulaire, universel,
acronymes, anglicismes, dicionaire, dicofr, dicorama, cyberdico, monolingue,
multidictionnaire" />
<?php }?>
	<style type="text/css" media="screen">@import "<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
css/style_globale.css";</style>
	<link rel="stylesheet" type="text/css" href="bx_styles/bx_styles.css" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
favicon.ico" />
	<link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
favicon.png" />
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-1.6.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.corner.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/script.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/jquery.bxSlider.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<link type="text/css" href="css/theme/jquery-ui-1.8.14.custom.css" rel="Stylesheet" />	
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-ui-1.8.14.custom.min.js"><?php echo '</script'; ?>
>
	</head>
<body>

<?php echo '<script'; ?>
 type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-15971834-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

<?php echo '</script'; ?>
>



<div id="all">
  <div id="mininavi">
    <img src="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
css/caddy.gif" alt="" /><a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
index.php?page=showpanier">Panier</a> |
    <a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
index.php?page=myaccount">Mon compte</a> |
    <a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
index.php?page=aide">Aide</a> |
    <a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
contact">Contact</a>
    <?php if ($_SESSION['id_membre']) {?>| <a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
logout.php">Quitter</a><?php }?>
		<div id='lang'>
			<a href='<?php echo $_smarty_tpl->tpl_vars['originalurl']->value;?>
fr' title='Français'><img src='<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
img/flag_fr.gif' alt='Français' /></a>
			<a href='<?php echo $_smarty_tpl->tpl_vars['originalurl']->value;?>
en' title='English'><img src='<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
img/flag_en.gif' alt='English' /></a>
			<a href='<?php echo $_smarty_tpl->tpl_vars['originalurl']->value;?>
de' title='Deutsch'><img src='<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
img/flag_de.gif' alt='Deutsch' /></a>
			<a href='<?php echo $_smarty_tpl->tpl_vars['originalurl']->value;?>
es' title='Español'><img src='<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
img/flag_es.gif' alt='Español' /></a>
			<a href='<?php echo $_smarty_tpl->tpl_vars['originalurl']->value;?>
it' title='Italiano'><img src='<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
img/flag_it.gif' alt='Italiano' /></a>
		</div>
  </div>

	<div class="header">
		<?php if ($_smarty_tpl->tpl_vars['showproduct']->value['nom']) {?>
			<h1><?php echo utf8_encode($_smarty_tpl->tpl_vars['showproduct']->value['nom']);?>
</h1>
		<?php } elseif ($_smarty_tpl->tpl_vars['nomvitrine']->value == 1) {?>
			<h1><?php echo $_smarty_tpl->tpl_vars['namesite']->value;?>
 - La maison du dictionnaire spécialisé Plus de 4000 ouvrages
  pour linguistes et traducteurs !</h1>
		<?php } else { ?>
			<h1><?php echo $_smarty_tpl->tpl_vars['namesite']->value;?>
</h1>
		<?php }?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
" id="logo"></a>
		<p>La boutique de dictionnaires spécialisés. Méthodes de langues, CDROMS, guides,
		vocabulaires, lexiques, terminologie... Tout y est ! </p>
		<ul>
			<li><a href="#innerleft">Aller au menu</a></li>
			<li><a href="#search">Aller a la recherche</a></li>
			<li><a href="#innercenter">Aller au contenu</a></li>
		</ul>
	</div>
</div>
<div class="wrapper">
  <div class="wide">
    <div id="nav">
      <ul>
        <li<?php if (!isset($_GET['page'])) {?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
">Accueil</a></li>
        <li<?php if ($_GET['page'] == "catalogue") {?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
catalogue-dictionnaire-et-lexique-c0">Catalogue</a></li>
        <li<?php if ($_GET['page'] == "catediteur" && $_smarty_tpl->tpl_vars['show_catalogue_lmdd']->value) {?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
catalogue-editeur-la-maison-du-dictionnaire-e12">Catalogue LMD-Dicoland</a></li>
        <li<?php if ($_GET['page'] == "catediteur" && $_smarty_tpl->tpl_vars['show_catalogue_mediqualis']->value) {?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
catalogue-editeur-mediqualis-e0">Catalogue MédiQualis-M'édite</a></li>
        <li<?php if ($_GET['page'] == "catalogue") {?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
E-Book-c351">E-Book</a></li>
        <li<?php if ($_GET['page'] == "occasion") {?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
index.php?page=occasion">Occasion</a></li>
        <!--<li<?php if ($_GET['page'] == "myaccount") {?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
index.php?page=myaccount">Mon compte</a></li> -->
       
        <li<?php if ($_GET['page'] == "contact") {?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
contact">Contact</a></li>
        
        <li<?php if ($_GET['page'] == "aide") {?> id="current"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
index.php?page=aide">Aide</a></li>
        <!-- <li<?php if ($_GET['page'] == "blog") {?> id="current"<?php }?>><a href="http://www.dicoland.com/blog/">Blog</a></li> -->
      </ul>
   </div>
                <div id="search">
                  <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
index.php">
                        <p>
						<input type="hidden" name="page" value="showresult" />
                        <label for="searchbar">Rechercher</label>
                        <input id="searchbar" name="quicksearch" type="text" value="<?php echo utf8_encode($_GET['quicksearch']);?>
" />
                        <input type="image" alt="Go !" src="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
css/go.gif" name="quicksearch_submit" />
                        <a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
index.php?page=advancedsearch" id="advancedsearch">Recherche avancée</a>
                  		</p>
                  </form>



                </div>
  </div>

<?php }
}
