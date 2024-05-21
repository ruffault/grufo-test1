<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  {if $showproduct.nom}
    <title>{$showproduct.nom|utf8_encode}</title>
  {elseif $nomvitrine == 1}
    <title>{$namesite} - La maison du dictionnaire spécialisé Plus de 4000 ouvrages
  pour linguistes et traducteurs !</title>
  {else}
    <title>{$namesite}</title>
  {/if}
  <meta name="revisit-after" content="10 days" />
  <meta name="robots" content="index,follow" />
  <meta name="DC.title" content="Dicoland" />
  <meta name="description" content="Tous les dictionnaires spécialisés.
  Trouvez plus de 4000 ouvrages pour traducteurs et linguistes." />

{if isset($meta)}
	<meta name="keywords" content="{$meta|htmlentities|utf8_encode}" />
{else}
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
{/if}

  <style type="text/css" media="screen">@import "{$urlsite}css/style_ie.css";</style>
<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="{$urlsite}css/style_ie.css" />
<![endif]-->

	<link rel="shortcut icon" type="image/x-icon" href="{$urlsite}favicon.ico" />
	<link rel="icon" type="image/png" href="{$urlsite}favicon.png" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.corner.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</head>
<body>
{literal}
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-15971834-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


{/literal}
<div>
  <div id="mininavi">
    <img src="{$urlsite}css/caddy.gif" alt="" /><a href="{$urlsite}index.php?page=showpanier">Panier</a> |
    <a href="{$urlsite}index.php?page=myaccount">Mon compte</a> |
    <a href="{$urlsite}index.php?page=aide">Aide</a>
    {if $smarty.session.id_membre}| <a href="{$urlsite}logout.php">Quitter</a>{/if}
		<div id='lang'>
			<a href='{$originalurl}chglang.php?aplan=fr' title='Français'><img src='{$urlsite}img/flag_fr.gif' alt='Français' /></a>
			<a href='{$originalurl}chglang.php?aplan=en' title='English'><img src='{$urlsite}img/flag_en.gif' alt='English' /></a>
			<a href='{$originalurl}chglang.php?aplan=de' title='Deutsch'><img src='{$urlsite}img/flag_de.gif' alt='Deutsch' /></a>
			<a href='{$originalurl}chglang.php?aplan=es' title='Español'><img src='{$urlsite}img/flag_es.gif' alt='Español' /></a>
			<a href='{$originalurl}chglang.php?aplan=it' title='Italiano'><img src='{$urlsite}img/flag_it.gif' alt='Italiano' /></a>
		</div>
  </div>

	<div class="header">
		{if $showproduct.nom}
			<h1>{$showproduct.nom|utf8_encode}</h1>
		{elseif $nomvitrine == 1}
			<h1>{$namesite} - La maison du dictionnaire spécialisé Plus de 4000 ouvrages
  pour linguistes et traducteurs !</h1>
		{else}
			<h1>{$namesite}</h1>
		{/if}
		<a href="{$urlsite}index.php" id="logo"></a>
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
        <li{if !isset($smarty.get.page)} id="current"{/if}><a href="{$urlsite}index.php">Accueil</a></li>
        <li{if $smarty.get.page == "catalogue"} id="current"{/if}><a href="{$urlsite}catalogue-dictionnaire-et-lexique-c0">Catalogue</a></li>
        <li{if $smarty.get.page == "catediteur" and $show_catalogue_lmdd} id="current"{/if}><a href="{$urlsite}catalogue-editeur-la-maison-du-dictionnaire-e12">La Maison du dictionnaire</a></li>
        <li{if $smarty.get.page == "catediteur" and $show_catalogue_mediqualis} id="current"{/if}><a href="{$urlsite}catalogue-editeur-mediqualis-e0">Médiqualis</a></li>
               <li{if $smarty.get.page == "catalogue"} id="current"{/if}><a href="{$urlsite}E-Book-c351">E-Book</a></li>
       <li{if $smarty.get.page == "myaccount"} id="current"{/if}><a href="{$urlsite}index.php?page=myaccount">Mon compte</a></li>
        <li{if $smarty.get.page == "showpanier"} id="current"{/if}><a href="{$urlsite}index.php?page=showpanier">Panier</a></li>
        <li{if $smarty.get.page == "contact"} id="current"{/if}><a href="{$urlsite}index.php?page=contact">Contact</a></li>
        <li{if $smarty.get.page == "auteurs"} id="current"{/if}><a href="{$urlsite}index.php?page=auteurs">Auteurs</a></li>
        <li{if $smarty.get.page == "aide"} id="current"{/if}><a href="{$urlsite}index.php?page=aide">Aide</a></li>
        <!-- <li{if $smarty.get.page == "blog"} id="current"{/if}><a href="http://www.dicoland.com/blog/">Blog</a></li> -->
      </ul>
                </div>
                <div id="search">
                  <form method="get" action="{$urlsite}index.php">
                        <p>
												<input type="hidden" name="page" value="showresult" />
                        <label for="searchbar">Rechercher</label>
                        <input id="searchbar" name="quicksearch" type="text"
												value="{$smarty.get.quicksearch|utf8_encode}" />
                        <input type="image" alt="Go !" src="{$urlsite}css/go.gif" name="quicksearch_submit" />
                        <a href="{$urlsite}index.php?page=advancedsearch" id="advancedsearch">Recherche avancée</a>
                  </p>
                        </form>
                </div>
        </div>
