	{include file="$applicationlang/header.tpl"}
	


<div id="share-box">
<!-- I got these buttons from simplesharebuttons.com -->
<div id="share-buttons">
    <!-- Email -->
    <a href="mailto:?Subject=Dicoland.com&amp;Body=La%20maison%20du%20dictionnaire%20et%20MediQualis%20!%20 http://www.dicoland.com" style="text-decoration:none">
        <img src="http://image.noelshack.com/fichiers/2015/25/1434637320-iconmonstr-email-9-icon-32-1.png" alt="Email">
    </a>
 
    <!-- Facebook -->
    <a href="http://www.facebook.com/sharer.php?u=http://www.dicoland.com" target="_blank" style="text-decoration:none">
        <img src="http://image.noelshack.com/fichiers/2015/25/1434621881-iconmonstr-facebook-4-icon-32.png" alt="Facebook">
    </a>
    
    <!-- LinkedIn -->
    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://www.dicoland.com" target="_blank" style="text-decoration:none">
        <img src="http://image.noelshack.com/fichiers/2015/25/1434621881-iconmonstr-linkedin-4-icon-32.png" alt="LinkedIn">
    </a>
     
    <!-- Twitter -->
    <a href="https://twitter.com/share?url=http://www.dicoland.com&amp;name=Dicoland.com&amp;hashtags=dicoland" target="_blank" style="text-decoration:none">
        <img src="http://image.noelshack.com/fichiers/2015/25/1434621881-iconmonstr-twitter-4-icon-32.png" alt="Twitter">
    </a>
</div>

</div>

			  				{if $smarty.get.page == showpanier}
					{include file="$applicationlang/showpanier.tpl"}
					{include file="$applicationlang/showfuture.tpl"}
						
</div>

					{else}			
	<div class="outer">
		<div class="inner">
			<div class="left">
				<div id='innerleft'>
				{*
				<h3>Navigation</h3>
				<ul>
				<li><a href="{$urlsite}index.php">Accueil</a></li>
				<li><a href="{$urlsite}dictionnaire-et-lexique-c0">Catalogue</a></li>
				<li><a href="{$urlsite}catalogue-editeur-mediqualis-e0">Médiqualis</a></li>
				<li><a href="{$urlsite}E-Book-c351">E-Book</a></li>
				<li><a href="{$urlsite}index.php?page=myaccount">Mon compte</a></li>
				<li><a href="{$urlsite}index.php?page=showpanier">Panier</a></li>
				<li><a href="{$urlsite}index.php?page=contact">Contact</a></li>
				<li><a href="{$urlsite}index.php?page=auteurs">Auteurs</a></li>
				<li><a href="{$urlsite}index.php?page=aide">Aide</a></li>
				<li><a href="{$urlsite}index.php?page=occasion">Ocassion</a></li>
				<li><a href="{$urlsite}blog/">Blog</a></li>
        </ul>
				*}
				
				{if $smarty.get.page == catediteur  }
					{include file="$applicationlang/col_catedit.tpl"}

				{elseif	$smarty.get.page == alreadymember}
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
myaccount.tpl					{include file="$applicationlang/aide_commande.tpl"}
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
				{elseif $smarty.get.page == occasion}
					{include file="$applicationlang/col_occasion.tpl"}
				{else}
				{*
					{include file="$applicationlang/new_module.tpl"}
					*}
					{include file="$applicationlang/partenaires.tpl"}
					{include file="$applicationlang/colmenu.tpl"}	


				{/if}
				
				<!--	<br />
					<a href="{$urlsite}dictionnaire-et-lexique-c0">
					<img src="{$urlsite}lang/{$applicationlang}/img/annonce2.gif" alt="Le spécialiste du dictionnaire.
					Plus de 4000 références !" /></a>
					<br />-->
		
				

			</div>
			<hr />
			</div>
			<div class="center">
				<div id='innercenter'>
				{if !$smarty.get.page}
					{include file="$applicationlang/carrousel.tpl"}
			<!--	{include file="$applicationlang/messages.tpl"} -->
					{include file="$applicationlang/vitrine.tpl"}
				{elseif $smarty.get.page == abby}
					{include file="$applicationlang/abby.tpl"}
				{elseif $smarty.get.page == offre}
					{include file="$applicationlang/offre.tpl"}
				{elseif $smarty.get.page == auteurs}
					{include file="$applicationlang/auteurs.tpl"}
				{elseif $smarty.get.page == catediteur}
					{include file="$applicationlang/catalogue-editeur.tpl"}
				
				{elseif $smarty.get.page == occasion}
					{include file="$applicationlang/occasion.tpl"}
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
					&& $smarty.get.page != 'showpanier'&& $smarty.get.page != 'alreadymember'}

					{include file="$applicationlang/minipanier.tpl"}
				{/if}
				</div>
				<div id="menudroite">
				<br />
				{if $smarty.get.page == alreadymember  }
					{include file="$applicationlang/monthproduct.tpl"}
    			{elseif $smarty.get.newaccount == 1}
    				{include file="$applicationlang/monthproduct.tpl"}
					{include file="$applicationlang/partenaires.tpl"}
   				{elseif $smarty.get.page == forminscription}
					{include file="$applicationlang/monthproduct.tpl"}
				{elseif	 $smarty.get.page == formlivraison}
					{include file="$applicationlang/monthproduct.tpl"}
				{elseif	 $smarty.get.page == livraisonprecise}
					{include file="$applicationlang/monthproduct.tpl"}
				{elseif	 $smarty.get.page == formfacturation}
					{include file="$applicationlang/monthproduct.tpl"}
				{elseif	 $smarty.get.page == facturationprecise}
					{include file="$applicationlang/monthproduct.tpl"}
				{elseif	 $smarty.get.page == formfraisport}
					{include file="$applicationlang/expedition.tpl"}
				{elseif	 $smarty.get.page == formmodepaiement}
					{include file="$applicationlang/monthproduct.tpl"}
				{elseif	 $smarty.get.page == paiementcarte}
					{include file="$applicationlang/monthproduct.tpl"}
				{elseif $smarty.get.page == oldcommande}
				{elseif $smarty.get.page == modifpref}
					{include file="$applicationlang/monthproduct.tpl"}
  				{elseif $smarty.get.page == showpanier && $smarty.session.id_membre}
					{include file="$applicationlang/monthproduct.tpl"}
				{elseif $smarty.get.page == myaccount && $smarty.session.id_membre}
				{elseif $smarty.get.page == occasion}
					{include file="$applicationlang/monthproduct.tpl"}
				{else}
					{include file="$applicationlang/monthproduct.tpl"}
					{*{include file="$applicationlang/paraitre.tpl"} 
					{include file="$applicationlang/partenaires.tpl"}*}
				{/if}


						<br/>
					<img src="{$urlsite}lang/{$applicationlang}/img/annonce.gif" alt="Livraison dans le monde entier !" /><br />
					<iframe width="180" height="180" src="" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		<hr />
		</div>
	</div>
	{/if}
{include file="$applicationlang/footer.tpl"}
