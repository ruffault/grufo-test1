﻿{include file="$applicationlang/header.tpl"}
	<div class="outer">
		<div class="inner">
			<div class="left">
				<div id='innerleft'>
				{*
				<h3>Browse</h3>
				<ul>
				<li><a href="{$urlsite}index.php">Home</a></li>
				<li><a href="{$urlsite}dictionnaire-et-lexique-c0">Catalogue</a></li>
				<li><a href="{$urlsite}catalogue-editeur-mediqualis-e0">MÈdiqualis</a></li>
				<li><a href="{$urlsite}index.php?page=myaccount">My account</a></li>
				<li><a href="{$urlsite}index.php?page=showpanier">Basket</a></li>
				<li><a href="{$urlsite}index.php?page=contact">Contact</a></li>
				<li><a href="{$urlsite}index.php?page=aide">Help</a></li>
        		</ul>
				*}
				{if $smarty.get.page == alreadymember}
					{include file="$applicationlang/aide_commande.tpl"}
				{elseif $smarty.get.newaccount == 1}
					{include file="$applicationlang/colmenu.tpl"}
				{elseif $smarty.get.page == forminscription }
					{include file="$applicationlang/aide_commande.tpl"}
				{elseif $smarty.get.page == formlivraison}
					{include file="$applicationlang/aide_commande.tpl"}
				{elseif $smarty.get.page == livraisonprecise}
					{include file="$applicationlang/aide_commande.tpl"}
				{elseif	 $smarty.get.page == formfacturation}
					{include file="$applicationlang/aide_commande.tpl"}
				{elseif	 $smarty.get.page == facturationprecise}
					{include file="$applicationlang/aide_commande.tpl"}
				{elseif	 $smarty.get.page == formfraisport}
					{include file="$applicationlang/aide_commande.tpl"}
				{elseif	 $smarty.get.page == formmodepaiement}
					{include file="$applicationlang/aide_commande.tpl"}
				{elseif	 $smarty.get.page == paiementcarte}
					{include file="$applicationlang/aide_commande.tpl"}
				{elseif $smarty.get.page == oldcommande}
					{include file="$applicationlang/moncompte_menu.tpl"}
				{elseif $smarty.get.page == modifpref}
					{include file="$applicationlang/moncompte_menu.tpl"}
  				{elseif $smarty.get.page == showpanier && $smarty.session.id_membre}
					{include file="$applicationlang/moncompte_menu.tpl"}
				{elseif $smarty.get.page == myaccount && $smarty.session.id_membre}
					{include file="$applicationlang/moncompte_menu.tpl"}
				{else}
					{include file="$applicationlang/colmenu.tpl"}	


				{/if}

        {*		<br />
				<a href="{$urlsite}ditionnaire-et-lexique-c0">
				<img src="{$urlsite}lang/{$applicationlang}/img/annonce2.gif" alt="The dictionary specialist.
        Over 4000 titles!" /></a>
				<br/>*}

			</div>
			<hr />
			</div>
			<div class="center">
				<div id='innercenter'>
				{if !$smarty.get.page}
					{include file="$applicationlang/carrousel.tpl"}
			<!--	{include file="$applicationlang/messages.tpl"} -->
					{include file="$applicationlang/vitrine.tpl"}
				{elseif $smarty.get.page == catediteur}
					{include file="$applicationlang/catalogue-editeur.tpl"}
				{elseif $smarty.get.page == contact}
					{include file="$applicationlang/contact.tpl"}
				{elseif $smarty.get.page == alreadymember}
					{include file="$applicationlang/etape.tpl"}
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
					{include file="$applicationlang/etape.tpl"}
					{include file="$applicationlang/formlivraison.tpl"}
				{elseif $smarty.get.page == livraisonprecise}
					{include file="$applicationlang/etape.tpl"}
					{include file="$applicationlang/livraisonprecise.tpl"}
				{elseif $smarty.get.page == formfacturation}
					{include file="$applicationlang/etape.tpl"}
					{include file="$applicationlang/formfacturation.tpl"}
				{elseif $smarty.get.page == facturationprecise}
					{include file="$applicationlang/etape.tpl"}
					{include file="$applicationlang/facturationprecise.tpl"}
				{elseif $smarty.get.page == formfraisport}
					{include file="$applicationlang/etape.tpl"}
					{include file="$applicationlang/formfraisport.tpl"}
				{elseif $smarty.get.page == formmodepaiement}
					{include file="$applicationlang/etape.tpl"}
					{include file="$applicationlang/formmodepaiement.tpl"}
				{elseif $smarty.get.page == paiementcheque}
					{include file="$applicationlang/paiementcheque.tpl"}
				{elseif $smarty.get.page == paiementvirement}
					{include file="$applicationlang/paiementvirement.tpl"}
				{elseif $smarty.get.page == paiementcarte}
					{include file="$applicationlang/etape.tpl"}
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
				{include file="$applicationlang/etape.tpl"}
					{include file="$applicationlang/forminscription.tpl"}
				{elseif $smarty.get.page == good}
				{include file="$applicationlang/etape.tpl"}
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
				<span id="backtotop"><a href="#mininavi"><img src="{$urlsite}lang/{$applicationlang}/img/backtotop.gif" alt="Back to top" /></a></span>
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
		        <br />
				{include file="$applicationlang/monthproduct.tpl"}
        		<br/>
				<script type="text/javascript"><!--
				google_ad_client = "pub-2888988258754009";
				google_ad_width = 180;
				google_ad_height = 150;
				google_ad_format = "180x150_as";
				google_ad_type = "text_image";
				google_ad_channel = "";
				google_color_border = "D6CFBD";
				google_color_link = "666666";
				google_color_text = "003366";
				google_color_url = "FF8E10";
				//--></script>
				<script type="text/javascript"
				  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
				<img src="{$urlsite}lang/{$applicationlang}/img/annonce.gif" alt="We deliver troughout the world" />
				</div>
			</div>
		<hr /> 
		</div>
	</div>
{include file="$applicationlang/footer.tpl"}