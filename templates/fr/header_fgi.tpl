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
  <style type="text/css" media="screen">@import "{$urlsite}css/style.css";</style>
	<link rel="shortcut icon" type="image/x-icon" href="{$urlsite}favicon.ico" />
	<link rel="icon" type="image/png" href="{$urlsite}favicon.png" />
</head>
<body>
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
        <li{if $smarty.get.page == "myaccount"} id="current"{/if}><a href="{$urlsite}index.php?page=myaccount">Mon compte</a></li>
        <li{if $smarty.get.page == "showpanier"} id="current"{/if}><a href="{$urlsite}index.php?page=showpanier">Panier</a></li>
        <li{if $smarty.get.page == "contact"} id="current"{/if}><a href="{$urlsite}index.php?page=contact">Contact</a></li>
        <li{if $smarty.get.page == "aide"} id="current"{/if}><a href="{$urlsite}index.php?page=aide">Aide</a></li>
        <!-- <li{if $smarty.get.page == "blog"} id="current"{/if}><a href="http://www.dicoland.com/blog/">Blog</a></li> -->
      </ul>
 
                </div>
                <div id="search">
                  <form method="get" action="{$urlsite}index.php">
                        <p align="left">
                        <script type="text/javascript"><!--
												google_ad_client = "pub-2888988258754009";
												google_ad_width = 468;
												google_ad_height = 60;
												google_ad_format = "468x60_as";
												google_ad_type = "text_image";
												google_ad_channel = "";
												google_color_border = "D6CFBD";
												google_color_bg = "E7E7DE";
												google_color_link = "FFA600";
												google_color_text = "003366";
												google_color_url = "FF8E10";
												//--></script>
												<script type="text/javascript"
												  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
												</script> 	                        
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
