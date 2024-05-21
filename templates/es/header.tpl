<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  {if $showproduct.nom}
    <title>{$showproduct.nom|utf8_encode}</title>
  {elseif $nomvitrine == 1}
    <title>{$namesite} - El especialista del diccionario ¡Más de 4000 obras
  para lingüistas y traductores!</title>
  {else}
    <title>{$namesite}</title>
  {/if}
  <meta name="revisit-after" content="10 days" />
  <meta name="robots" content="index,follow" />
  <meta name="DC.title" content="Dicoland" />
  <meta name="description" content="Todos los diccionarios especializados.
  Más de 4000 obras para traductores y lingüistas." />
{if isset($meta)}
	<meta name="keywords" content="{$meta|htmlentities|utf8_encode}" />
{else}
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
{/if}
  	<style type="text/css" media="screen">@import "{$urlsite}css/style_globale.css";</style>
  	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.corner.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="{$urlsite}favicon.ico" />
	<link rel="icon" type="image/png" href="{$urlsite}favicon.png" />
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
<div id="all">
	<div id="mininavi">
    <img src="{$urlsite}css/caddy.gif" alt="" /><a href="{$urlsite}index.php?page=showpanier">Cesta de la compra</a> |
    <a href="{$urlsite}index.php?page=myaccount">Mi cuenta</a> |
    <a href="{$urlsite}index.php?page=aide">Ayuda</a>
    {if $smarty.session.id_membre}| <a href="{$urlsite}logout.php">Salir</a>{/if}
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
			<h1>{$namesite} - El especialista del diccionario ¡Más de 4000 obras
  para lingüistas y traductores!</h1>
		{else}
			<h1>{$namesite}</h1>
		{/if}
		<a href="{$urlsite}index.php" id="logo"></a>
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
        <li{if !isset($smarty.get.page)} id="current"{/if}><a href="{$urlsite}index.php">Inicio</a></li>
        <li{if $smarty.get.page == "catalogue"} id="current"{/if}><a href="{$urlsite}catalogue-dictionnaire-et-lexique-c0">Catálogo</a></li>
        <li{if $smarty.get.page == "catediteur" and $show_catalogue_lmdd} id="current"{/if}><a href="{$urlsite}catalogue-editeur-la-maison-du-dictionnaire-e12">La Maison du dictionnaire</a></li>
        <li{if $smarty.get.page == "catediteur" and $show_catalogue_mediqualis} id="current"{/if}><a href="{$urlsite}catalogue-editeur-mediqualis-e0">Médiqualis</a></li>
        <li{if $smarty.get.page == "catalogue"} id="current"{/if}><a href="{$urlsite}E-Book-c351">E-Book</a></li>
        <li{if $smarty.get.page == "myaccount"} id="current"{/if}><a href="{$urlsite}index.php?page=myaccount">Mi cuenta</a></li>
        <li{if $smarty.get.page == "showpanier"} id="current"{/if}><a href="{$urlsite}index.php?page=showpanier">Cesta de la compra</a></li>
        <li{if $smarty.get.page == "contact"} id="current"{/if}><a href="{$urlsite}index.php?page=contact">Contacto</a></li>
        <!-- <li{if $smarty.get.page == "blog"} id="current"{/if}><a href="http://www.dicoland.com/blog/">Blog</a></li> -->
      </ul>
                </div>
                <div id="search">
                  <form method="get" action="index.php">
                        <p>
												<input type="hidden" name="page" value="showresult" />
                        <label for="searchbar">Buscar</label>
                        <input id="searchbar" name="quicksearch" type="text"
												value="{$smarty.get.quicksearch|utf8_encode}" />
                        <input type="image" alt="Go !" src="{$urlsite}css/go.gif" name="quicksearch_submit" />
                        <a href="{$urlsite}index.php?page=advancedsearch" id="advancedsearch">Búsqueda avanzada</a>
                  </p>
                        </form>
                </div>
        </div>
