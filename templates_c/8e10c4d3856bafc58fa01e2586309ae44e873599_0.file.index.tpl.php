<?php
/* Smarty version 3.1.33, created on 2019-10-30 01:02:24
  from '/var/www/clients/client1/web1/web/templates/fr/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5db8e120336329_66567198',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e10c4d3856bafc58fa01e2586309ae44e873599' => 
    array (
      0 => '/var/www/clients/client1/web1/web/templates/fr/index.tpl',
      1 => 1513088196,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5db8e120336329_66567198 (Smarty_Internal_Template $_smarty_tpl) {
?>	<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	


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

			  				<?php if ($_GET['page'] == 'showpanier') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/showpanier.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/showfuture.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
						
</div>

					<?php } else { ?>			
	<div class="outer">
		<div class="inner">
			<div class="left">
				<div id='innerleft'>
								
				<?php if ($_GET['page'] == 'catediteur') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/col_catedit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

				<?php } elseif ($_GET['page'] == 'alreadymember') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/aide_commande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['newaccount'] == 1) {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/colmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'forminscription') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/aide_commande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formlivraison') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/aide_commande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'livraisonprecise') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/aide_commande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formfacturation') {?>
myaccount.tpl					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/aide_commande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'facturationprecise') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/aide_commande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formfraisport') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/aide_commande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formmodepaiement') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/aide_commande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'paiementcarte') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/aide_commande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'oldcommande') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/moncompte_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'modifpref') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/moncompte_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  				<?php } elseif ($_GET['page'] == 'showpanier' && $_SESSION['id_membre']) {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/moncompte_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'myaccount' && $_SESSION['id_membre']) {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/moncompte_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'occasion') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/col_occasion.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } else { ?>
									<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/partenaires.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/colmenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>	


				<?php }?>
				
				<!--	<br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
dictionnaire-et-lexique-c0">
					<img src="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
lang/<?php echo $_smarty_tpl->tpl_vars['applicationlang']->value;?>
/img/annonce2.gif" alt="Le spécialiste du dictionnaire.
					Plus de 4000 références !" /></a>
					<br />-->
		
				

			</div>
			<hr />
			</div>
			<div class="center">
				<div id='innercenter'>
				<?php if (!$_GET['page']) {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/carrousel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
			<!--	<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?> -->
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/vitrine.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'abby') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/abby.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'offre') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/offre.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'auteurs') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/auteurs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'catediteur') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/catalogue-editeur.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				
				<?php } elseif ($_GET['page'] == 'occasion') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/occasion.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'contact') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/contact.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'alreadymember') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/etape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/already_member.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'catalogue') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/catalogue.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/samecateg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'advancedsearch') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/formsearch.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'showresult') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/showresult.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'showproduct') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/showproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/usercomment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/buysame.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/sameauteur.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/samecateg2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  				<?php } elseif ($_GET['page'] == 'addcomment') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/addcomment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  				<?php } elseif ($_GET['page'] == 'showpanier') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/showpanier.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/showfuture.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'lastpass') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/lastpass.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'oldcommande') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/oldcommande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formlivraison') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/etape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/formlivraison.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'livraisonprecise') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/etape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/livraisonprecise.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formfacturation') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/etape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/formfacturation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'facturationprecise') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/etape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/facturationprecise.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formfraisport') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/etape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/formfraisport.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formmodepaiement') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/etape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/formmodepaiement.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'paiementcheque') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/paiementcheque.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'paiementvirement') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/paiementvirement.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'paiementcarte') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/etape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/paiementcarte.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        		<?php } elseif ($_GET['page'] == 'infolegale') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/infolegale.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'aide') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/aide.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'modifpref') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/modifpref.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'detailcommande') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/detailcommande.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'forminscription') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/etape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/forminscription.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'good') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/etape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/good.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'bad') {?>
				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/bad.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 404) {?>
				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/404.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'inscriptionok') {?>
				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/inscriptionok.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'myaccount') {?>
				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/myaccount.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php }?>
        <br />
				<span id="backtotop"><a href="#mininavi"><img src="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
lang/<?php echo $_smarty_tpl->tpl_vars['applicationlang']->value;?>
/img/backtotop.gif" alt="revenir en haut" /></a></span>
				</div>
			</div>
			<div class="right">
				<div id='innerright'>
				<?php if ($_GET['page'] != 'paiementcarte' && $_GET['page'] != 'formmodepaiement' && $_GET['page'] != 'formfraisport' && $_GET['page'] != 'formfacturation' && $_GET['page'] != 'facturationprecise' && $_GET['page'] != 'formlivraison' && $_GET['page'] != 'livraisonprecise' && $_GET['page'] != 'paiementcheque' && $_GET['page'] != 'paiementvirement' && $_GET['page'] != 'forminscription' && $_GET['page'] != 'showpanier' && $_GET['page'] != 'alreadymember') {?>

					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/minipanier.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php }?>
				</div>
				<div id="menudroite">
				<br />
				<?php if ($_GET['page'] == 'alreadymember') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    			<?php } elseif ($_GET['newaccount'] == 1) {?>
    				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/partenaires.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
   				<?php } elseif ($_GET['page'] == 'forminscription') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formlivraison') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'livraisonprecise') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formfacturation') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'facturationprecise') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formfraisport') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/expedition.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'formmodepaiement') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'paiementcarte') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'oldcommande') {?>
				<?php } elseif ($_GET['page'] == 'modifpref') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
  				<?php } elseif ($_GET['page'] == 'showpanier' && $_SESSION['id_membre']) {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } elseif ($_GET['page'] == 'myaccount' && $_SESSION['id_membre']) {?>
				<?php } elseif ($_GET['page'] == 'occasion') {?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
				<?php } else { ?>
					<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/monthproduct.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
									<?php }?>


						<br/>
					<img src="<?php echo $_smarty_tpl->tpl_vars['urlsite']->value;?>
lang/<?php echo $_smarty_tpl->tpl_vars['applicationlang']->value;?>
/img/annonce.gif" alt="Livraison dans le monde entier !" /><br />
					<iframe width="180" height="180" src="" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		<hr />
		</div>
	</div>
	<?php }
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['applicationlang']->value)."/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
