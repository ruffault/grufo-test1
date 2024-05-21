﻿{include file="$applicationlang/header_fgi.tpl"}
	<div class="outer">
		<div class="inner">
			<div class="left">
				<div id='innerleft'>
				{*
				<h3>Navigation</h3>
				<ul>
				<li><a href="{$urlsite}index.php">Accueil</a></li>
				<li><a href="{$urlsite}dictionnaire-et-lexique-c0">Catalogue</a></li>
				<li><a href="{$urlsite}index.php?page=myaccount">Mon compte</a></li>
				<li><a href="{$urlsite}index.php?page=showpanier">Panier</a></li>
				<li><a href="{$urlsite}index.php?page=contact">Contact</a></li>
				<li><a href="{$urlsite}index.php?page=aide">Aide</a></li>
				<li><a href="{$urlsite}blog/">Blog</a></li>
        </ul>
				*}

				<script type="text/javascript"><!--
				google_ad_client = "pub-2888988258754009";
				google_ad_width = 180;
				google_ad_height = 150;
				google_ad_format = "180x150_as";
				google_ad_type = "text_image";
				google_ad_channel = "";
				google_color_border = "D6CFBD";
				google_color_bg = "E7E7DE";
				google_color_link = "666666";
				google_color_text = "003366";
				google_color_url = "FF8E10";
				//--></script>
				<script type="text/javascript"
				  src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
				
				<h3>Langues</h3>
				<ul>
				<li><a href="{$urlsite}africaines-c302">Africaines</a></li>
				<li><a href="{$urlsite}asiatiques-c303">Asiatiques</a></li>
				<li><a href="{$urlsite}langues-europeennes-europe-de-l-est-c300">Européennes</a></li>
				<li><a href="{$urlsite}langue-francaise-c166">Français</a></li>
				<li><a href="{$urlsite}indiennes-c301">Indiennes</a></li>
				<li><a href="{$urlsite}langues-regionales-de-france-c299">Régionales</a></li>
				</ul>

				<br />
				{if $showpub == 1}
					<img src="{$urlsite}lang/{$applicationlang}/img/port_gratuit_decembre.gif"
						alt="Livraison Gratuite ! Sur toute la france pendant le mois de décembre" />
				{else}
					<a href="{$urlsite}catalogue-dictionnaire-et-lexique-c0">
					<img src="{$urlsite}lang/{$applicationlang}/img/annonce2.gif" alt="Le spécialiste du
						dictionnaire. Plus de 4000 références !" /></a>
				{/if}

        <h3>Industries chimiques</h3>
				<ul>
				<li><a href="{$urlsite}chimie-c64">Chimie</a></li>
				<li><a href="{$urlsite}imprimerie-c149">Imprimerie</a></li>
				<li><a href="{$urlsite}matieres-plastiques-c189">Matières plastiques</a></li>
				<li><a href="{$urlsite}petrole-c221">Pétrole</a></li>
				<li><a href="{$urlsite}industries-chimiques-c306">Voir plus...</a></li>
				</ul>
				
        <h3>Industries diverses</h3>
				<ul>
				<li><a href="{$urlsite}arts-spectacles-c28">Arts &amp; Spectacle</a></li>
				<li><a href="{$urlsite}defense-militaire-c92">Défense - Militaire</a></li>
				<li><a href="{$urlsite}photo-video-cinema-c224">Photo - Vidéo - Cinéma</a></li>
				<li><a href="{$urlsite}sports-c262">Sports</a></li>
				<li><a href="{$urlsite}industries-diverses-c307">Voir plus...</a></li>
				</ul>

				{if isset($showpub)}
					<br />
					<a href="{$urlsite}dictionnaire-et-lexique-c0">
					<img src="{$urlsite}lang/{$applicationlang}/img/annonce2.gif" alt="Le spécialiste du dictionnaire.
					Plus de 4000 références !" /></a>
					<br />
				{/if}


        <h3>Sciences physiques</h3>
        <ul>
        <li><a href="{$urlsite}electricite-c106">Electricité</a></li>
				<li><a href="{$urlsite}electronique-c108">Electronique</a></li>
        <li><a href="{$urlsite}informatique-c152">Informatique</a></li>
        <li><a href="{$urlsite}mecanique-c190">Mécanique</a></li>
				<li><a href="{$urlsite}sciences-physiques-c311">Voir plus...</a></li>
				</ul>

        <h3>Sciences de la terre</h3>
        <ul>
				<li><a href="{$urlsite}agriculture-c6">Agriculture</a></li>
				<li><a href="{$urlsite}elevage-c109">Elevage</a></li>
				<li><a href="{$urlsite}eau-c101">Eau</a></li>
				<li><a href="{$urlsite}pedologie-c218">Pédologie</a></li>
				<li><a href="{$urlsite}sciences-de-la-terre-c309">Voir plus...</a></li>
				</ul>

				<h3>Sciences de la vie</h3>
        <ul>
				<li><a href="{$urlsite}agro-alimentaire-c7">Agro-alimentaire</a></li>
				<li><a href="{$urlsite}biologie-c46">Biologie</a></li>
				<li><a href="{$urlsite}medecine-c192">Médecine</a></li>
				<li><a href="{$urlsite}pharmacie-c222">Pharmacie</a></li>
				<li><a href="{$urlsite}sciences-de-la-vie-c310">Voir plus...</a></li>
				</ul>
			</div>
			<hr />
			</div>
			<div class="center">
				<div id='innercenter'>
				{if !$smarty.get.page}
				{include file="$applicationlang/vitrine.tpl"}
				{elseif $smarty.get.page == contact}
				{include file="$applicationlang/contact.tpl"}
				{elseif $smarty.get.page == alreadymember}
				{include file="$applicationlang/already_member.tpl"}
				{elseif $smarty.get.page == catalogue}
				{include file="$applicationlang/catalogue.tpl"}
				{include file="$applicationlang/samecateg.tpl"}
				{elseif $smarty.get.page == advancedsearch}
				{include file="$applicationlang/formsearch.tpl"}
				{elseif $smarty.get.page == showresult}
				{include file="$applicationlang/showresult.tpl"}
				{elseif $smarty.get.page == showproduct}
				{include file="$applicationlang/showproduct.tpl"}
				{include file="$applicationlang/usercomment.tpl"}
				{include file="$applicationlang/buysame.tpl"}
				{include file="$applicationlang/sameauteur.tpl"}
				{include file="$applicationlang/samecateg2.tpl"}
  			{elseif $smarty.get.page == addcomment}
				{include file="$applicationlang/addcomment.tpl"}
  			{elseif $smarty.get.page == showpanier}
				{include file="$applicationlang/showpanier.tpl"}
				{include file="$applicationlang/showfuture.tpl"}
				{elseif $smarty.get.page == lastpass}
				{include file="$applicationlang/lastpass.tpl"}
				{elseif $smarty.get.page == oldcommande}
				{include file="$applicationlang/oldcommande.tpl"}
				{elseif $smarty.get.page == formlivraison}
				{include file="$applicationlang/formlivraison.tpl"}
				{elseif $smarty.get.page == livraisonprecise}
				{include file="$applicationlang/livraisonprecise.tpl"}
				{elseif $smarty.get.page == formfacturation}
				{include file="$applicationlang/formfacturation.tpl"}
				{elseif $smarty.get.page == facturationprecise}
				{include file="$applicationlang/facturationprecise.tpl"}
				{elseif $smarty.get.page == formfraisport}
				{include file="$applicationlang/formfraisport.tpl"}
				{elseif $smarty.get.page == formmodepaiement}
				{include file="$applicationlang/formmodepaiement.tpl"}
				{elseif $smarty.get.page == paiementcheque}
				{include file="$applicationlang/paiementcheque.tpl"}
				{elseif $smarty.get.page == paiementvirement}
				{include file="$applicationlang/paiementvirement.tpl"}
				{elseif $smarty.get.page == paiementcarte}
				{include file="$applicationlang/paiementcarte.tpl"}
        {elseif $smarty.get.page == infolegale}
				{include file="$applicationlang/infolegale.tpl"}
				{elseif $smarty.get.page == aide}
				{include file="$applicationlang/aide.tpl"}
				{elseif $smarty.get.page == modifpref}
				{include file="$applicationlang/modifpref.tpl"}
				{elseif $smarty.get.page == detailcommande}
				{include file="$applicationlang/detailcommande.tpl"}
				{elseif $smarty.get.page == forminscription}
				{include file="$applicationlang/forminscription.tpl"}
				{elseif $smarty.get.page == good}
				{include file="$applicationlang/good.tpl"}
				{elseif $smarty.get.page == bad}
				{include file="$applicationlang/bad.tpl"}
				{elseif $smarty.get.page == 404}
				{include file="$applicationlang/404.tpl"}
				{elseif $smarty.get.page == inscriptionok}
				{include file="$applicationlang/inscriptionok.tpl"}
				{elseif $smarty.get.page == myaccount}
				{include file="$applicationlang/myaccount.tpl"}
				{/if}
        <br />
				<span id="backtotop"><a href="#mininavi"><img src="{$urlsite}lang/{$applicationlang}/img/backtotop.gif" alt="revenir en haut" /></a></span>
				</div>
			</div>
			<div class="right">
				<div id='innerright'>
				{if $smarty.get.page != 'paiementcarte' && $smarty.get.page != 'formmodepaiement'
					&& $smarty.get.page != 'formfraisport' && $smarty.get.page != 'formfacturation'
					&& $smarty.get.page != 'facturationprecise' && $smarty.get.page != 'formlivraison'
					&& $smarty.get.page != 'livraisonprecise' && $smarty.get.page != 'paiementcheque'
					&& $smarty.get.page != 'paiementvirement' && $smarty.get.page != 'forminscription'
					&& $smarty.get.page != 'showpanier'}
					
					{include file="$applicationlang/minipanier.tpl"}
				{/if}
				</div>
				<div id="menudroite">
        <h3>Transports</h3>
        <ul>
        <li><a href="{$urlsite}aeronautique-c4">Aéronautique</a></li>
				<li><a href="{$urlsite}automobile-c31">Automobile</a></li>
				<li><a href="{$urlsite}marine-c184">Marine</a></li>
				<li><a href="{$urlsite}transports-c285">Voir plus...</a></li>
				</ul>
				
				{include file="$applicationlang/monthproduct.tpl"}
        
				<h3>Bâtiment / Travaux</h3>
        <ul>
        <li><a href="{$urlsite}architecture-c24">Architecture</a></li>
				<li><a href="{$urlsite}batiment-c38">Batiment général</a></li>
				<li><a href="{$urlsite}routes-c245">Route</a></li>
				<li><a href="{$urlsite}batiment-travaux-publics-c305">Voir plus...</a></li>
				</ul>

        <h3>Entreprise</h3>
        <ul>
				<li><a href="{$urlsite}assurance-c29">Assurance</a></li>
				<li><a href="{$urlsite}banque-finance-c34">Banque / finance</a></li>
				<li><a href="{$urlsite}commerce-c69">Commerce</a></li>
				<li><a href="{$urlsite}droit-c99">Droit</a></li>
				<li><a href="{$urlsite}economie-c103">Economie</a></li>
				<li><a href="{$urlsite}administration-et-gestion-de-l-entreprise-c308">
				Voir plus...</a></li>
				</ul><br />
				<a href="{$urlsite}logiciel/lexpro-cd-databank-4077"><img src="{$urlsite}lang/{$applicationlang}/img/lexpro.gif"
				alt="Exclusif ! CDROM de traduction lexpro 3.11 disponible" /></a>
        <h3>Cdrom / logiciel</h3>
        <ul>
				<li><a href="{$urlsite}cd-rom-c59">Cdrom</a></li>
				<li><a href="{$urlsite}logiciel-c174">Logiciel</a></li>
				</ul>
        
				<h3>Divers</h3>
        <ul>
				<li><a href="{$urlsite}abreviations-c1">Abréviations</a></li>
				<li><a href="{$urlsite}sigles-c256">Sigles</a></li>
				<li><a href="{$urlsite}divers-c95">Divers</a></li>
				</ul>
				<img src="{$urlsite}lang/{$applicationlang}/img/annonce.gif" alt="Livraison dans le monde entier !" />
				</div>
			</div>
		<hr /> 
		</div>
	</div>
{include file="$applicationlang/footer.tpl"}
