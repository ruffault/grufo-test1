<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  {if $showproduct.nom}
    <title>{$showproduct.nom|utf8_encode}</title>
  {elseif $nomvitrine == 1}
    <title>{$namesite} - The specialised dictionary company with over 4000 works
  for linguists and translators!</title>
  {else}
    <title>{$namesite}</title>
  {/if}
  <meta name="revisit-after" content="10 days" />
  <meta name="robots" content="index,follow" />
  <meta name="DC.title" content="Dicoland" />
  <meta name="description" content="All the specialised dictionaries you need.
  Discover over 4000 books for translators and linguists." />
{if isset($meta)}
	<meta name="keywords" content="{$meta|htmlentities|utf8_encode}" />
{else}
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
{/if}
  	<style type="text/css" media="screen">@import "{$urlsite}css/style_globale.css";</style>
  	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.corner.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="{$urlsite}favicon.ico" />
	<link rel="icon" type="image/png" href="{$urlsite}favicon.png" />
</head>
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
<body>
<div id="all">
		<div id="mininavi">
			<img src="{$urlsite}css/caddy.gif" alt="" /><a href="{$urlsite}index.php?page=showpanier">Basket</a> |
			<a href="{$urlsite}index.php?page=myaccount">My account</a> |
			<a href="{$urlsite}index.php?page=aide">Help</a>
			{if $smarty.session.id_membre}| <a href="{$urlsite}logout.php">Exit</a>{/if}
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
				<h1>{$namesite} - The specialised dictionary company with over 4000 works
  for linguists and translators!</h1>
			{else}
				<h1>{$namesite}</h1>
			{/if}
			<a href="{$urlsite}index.php" id="logo"></a>
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
        <li{if !isset($smarty.get.page)} id="current"{/if}><a href="{$urlsite}en/">Home</a></li>
        <li{if $smarty.get.page == "catalogue"} id="current"{/if}><a href="{$urlsite}catalogue-dictionnaire-et-lexique-c0">Catalogue</a></li>
        <li{if $smarty.get.page == "catediteur" and $show_catalogue_lmdd} id="current"{/if}><a href="{$urlsite}catalogue-editeur-la-maison-du-dictionnaire-e12">La Maison du dictionnaire</a></li>
        <li{if $smarty.get.page == "catediteur" and $show_catalogue_mediqualis} id="current"{/if}><a href="{$urlsite}catalogue-editeur-mediqualis-e0">Médiqualis</a></li>
        <li{if $smarty.get.page == "catalogue"} id="current"{/if}><a href="{$urlsite}E-Book-c351">E-Book</a></li>
        <li{if $smarty.get.page == "myaccount"} id="current"{/if}><a href="{$urlsite}index.php?page=myaccount">My account</a></li>
        <li{if $smarty.get.page == "showpanier"} id="current"{/if}><a href="{$urlsite}index.php?page=showpanier">Basket</a></li>
        <li{if $smarty.get.page == "contact"} id="current"{/if}><a href="{$urlsite}en/contact">Contact</a></li>
        <!-- <li{if $smarty.get.page == "blog"} id="current"{/if}><a href="http://www.dicoland.com/blog/">Blog</a></li> -->

      </ul>
                </div>
                <div id="search">
                  <form method="get" action="{$urlsite}index.php">
                        <p>
												<input type="hidden" name="page" value="showresult" />
                        <label for="searchbar">Search</label>
                        <input id="searchbar" name="quicksearch" type="text"
												value="{$smarty.get.quicksearch|utf8_encode}" />
                        <input type="image" alt="Go !" src="{$urlsite}css/go.gif" name="quicksearch_submit" />
                        <a href="{$urlsite}index.php?page=advancedsearch" id="advancedsearch">Advanced search</a>
                  </p>
                        </form>
                </div>
        </div>
