<?php /* Smarty version 2.6.31, created on 2019-10-30 17:56:28
         compiled from fr/aide.tpl */ ?>
<div id='aideenligne'>
<h2><span class="deco">></span>Aide en ligne</h2>

<h3><span class="deco">></span><a href="#commentfonctionne">Comment fonctionne l'interface ?</a></h3>
<ul>
<li><a href='#moncompte'>Mon compte : création, modification, suivi des commandes</a></li>
<li><a href='#recherche'>Recherche simple et recherche avancée</a></li>
<li><a href='#catalogue'>Le catalogue</a></li>
<li><a href='#detail'>Détail des ouvrages</a></li>
</ul>

<h3><span class="deco">></span><a href="#commentcommander">Comment commander ?</a></h3>
<ul>
<li><a href='#panier'>Rechercher des articles et les ajouter à mon panier</a></li>
<li><a href='#passer'>Passer une commande</a></li>
<li><a href='#suivre'>Suivi de commande</a></li>
</ul>

<h3><span class="deco">></span><a href='#paiement'>Paiement sécurisé</a></h3>

<h3><span class="deco">></span><a href='#quisommenous'>Qui sommes nous</a></h3>

<h3><span class="deco">></span><a href="#nouscontacter">Comment nous contacter ?</a></h3>

<h3><span class="deco">></span><a href='#faq'><acronym title='Frequently Asked Question'>FAQ</acronym> (Questions Fréquemment Posées)</a></h3>
<ul>
<li><a href='#passperdu'>Comment récupérer son mot de passe perdu ou oublié?</a></li>
</ul>
<br /><br /><br /><br />
<h2 id="commentfonctionne"><span class="deco">></span>Comment fonctionne l'interface ?</h2>
<h3 id="moncompte"><span class="deco">></span>Mon compte</h3>
<p>Nous vous conseillons dès à présent de créer votre propre compte sur dicoland.com.
Une fois inscrit, vous pourrez <a href='verifmembre.php'>valider vos commandes</a>
plus rapidement, mémoriser votre <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier'>panier</a> et, si vous le désirez, recevoir notre
lettre d'information.</p>
<p>Dès que vous aurez passé votre première commande, vous serez inscrit Dicoland.com.
Vous disposerez dès lors d'un pseudo et d'un mot de passe qui vous permettront de
vous identifier sur Dicoland.com. Vous pourrez ainsi suivre en ligne le bon déroulement
de vos commandes dans la partie <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande">suivre mes
commandes</a>. Vous retrouverez également l'ensemble de l'historique de vos achats.</p>
<p>Il vous sera également possible de modifier vos informations personnelles et
votre mot de passe dans la partie "modifier mes préférences". C'est aussi dans cet espace que 
vous choisirez ou non de vous abonner à notre lettre d'information.</p>
<p>Cependant, si vous ne désirez pas encore vous inscrire, vous pouvez
continuer à naviguer sur Dicoland.com et ajouter des produits dans votre panier.</p>

<h3 id="recherche"><span class="deco">></span>Recherche simple et recherche avancée</h3>
<p>Dicoland.com vous offre le choix entre 2 types de recherche.</p>
<ul>
<li><strong>La recherche rapide</strong>
<p>Vous trouverez la recherche rapide dans la barre orange en haut du site.
Elle vous permet de rechercher de manière approximative un nom d'ouvrage et/ou 
un auteur, ou encore un thème. Des 2 recherches, c'est celle qui fournira le plus
de résultats.
</p></li>
<li><strong>La recherche avancée</strong>
<p>La recherche avancée est disponible via le lien <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch'>Recherche avancée</a>
situé à droite de la recherche rapide, dans la barre orange située en haut de
l'interface. C'est ici que vous pourrez affiner votre recherche en définissant
plusieurs critères comme le titre, le thème, l'auteur ou la langue.
</p>
</li>
</ul>
<p>
Une fois votre recherche lancée, vous serez dirigé sur la page des résultats.
Lorsque certains thèmes ou certaines catégories correspondent aux critères demandés, vous les
trouverez dans la boite "catégories", à droite de la liste des résultats de la
recherche.</p>
</div>
<h3 id='catalogue'><span class="deco">></span>Le catalogue</h3>
<p>
<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-dictionnaire-et-lexique-c0'>Le catalogue</a> vous permet de rechercher des
articles par thèmes. Il fonctionne sur plusieurs niveaux, c'est à dire que l'on peut accèder
aux catégories principales puis aux sous-catégories. Lorsque vous vous trouvez dans une 
sous-catégorie, il vous est possible de remonter vers la catégorie de niveau supérieur en cliquant sur les
liens situés en haut du catalogue. Vous pouvez également remonter directement
à la page principale du catalogue avec le lien <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-dictionnaire-et-lexique-c0">catalogue</a>.</p>

<h3 id="detail"><span class="deco">></span>Détail des ouvrages</h3>
<p>Une fois un produit sélectionné, vous avez accès aux informations suivantes :</p>
<ul>

<li>L'auteur
<p>Vous trouverez ici le nom l'auteur de l'ouvrage. Si l'auteur a écrit 
d'autres ouvrages, vous les trouverez listés un peu plus bas, dans la section
"du même auteur". Vous pourrez alors visiter les liens vers ces autres 
produits.</p></li>

<li>Le thème
<p>Le thème correspond à la catégorie du catalogue associée au produit. Vous 
trouverez les ouvrages traitant du même sujet dans la section "dans la même
catégorie" située sous la section "du même auteur".</p></li>

<li>La référence
<p>La référence est un code que Dicoland.com associe à chaque produit, afin de le
différencier d'un autre.</p></li>

<li>La disponibilité<p>Lorsqu'un ouvrage est disponible, la mention "disponible" en
regard de celui-ci. Si l'ouvrage n'est pas disponible immédiatement,
une autre mention vous indiquera le délai d'approvisionnement.</p></li>

<li>Le prix de l'éditeur
<p>Il indique le prix fixé par l'éditeur de l'ouvrage.</p></li>

<li>Le rabais
<p>Certains ouvrages bénéficient d'une réduction. Le calcul de la remise est
alors indiqué.</p></li>

<li>Le prix
<p>Il correspond au prix que Dicoland.com applique à l'ouvrage. Comme tous les
prix de Dicoland.com, celui-ci peut fluctuer en fonction de certains événements
ou certaines situations (voir les informations légales).
Que vous soyez particulier ou professionnel, les prix sont indiqués <acronym  title="Hors taxes">HT</acronym>
et <acronym title="Toute taxes comprises">TTC</acronym>. 
</p></li>

<li>La couverture
<p>Vous pouvez visualiser la plupart des couvertures des ouvrages en image. Vous pouvez
zoomer sur celle-ci en cliquant sur l'image elle-même pour ainsi accéder à un aperçu élargi.</p></li>

<li>La description
<p>Il peut s'agir soit d'un descriptif de l'ouvrage, soit d'un résumé de
celui-ci, qui donne une idée du contenu avant l'achat.</p></li>

<li>Les informations diverses
<p>Vous trouverez ici d'autres informations compémentaires ; Par
exemple, si le livre possède ou non un supplément, s'il fait partie d'une 
collection, etc.</p></li>

<li>Le nombre de pages et le nombre de termes
<p>Ces deux indications vous permettent de mieux appréhender le volume de l'ouvrage.</p></li>

<li>Les langues
<p>Sont indiqués ici toutes les langues de l'ouvrage et les sens de traductions.</p></li>

<li>L'index
<p>Indique si l'ouvrage est muni d'un index.</p></li>

<li>Le bouton <em>Ajouter au panier</em>
<p>Ce bouton vous permet d'ajouter l'ouvrage sélectionné dans votre panier.</p></li>
</ul>


<h2 id="commentcommander"><span class="deco">></span>Comment commander ?</h2>
<h3 id="panier"><span class="deco">></span>Rechercher des titres et les ajouter à mon panier</h3>
<p>Pour ajouter des ouvrages dans votre panier, il vous suffit de cliquer sur le
bouton "ajouter à mon panier" que vous trouverez sur le détail des articles
qui vous intéressent.<br />
Vous trouverez des produits en page principale, à l'aide de l'outil de
recherche, dans le catalogue ou bien en parcourant les liens sur les fiches
qui en sont munies.
</p>
<p>
Vous pouvez ensuite vous rendre dans votre panier pour le consulter et l'organiser. Vous
avez la possibilité de modifier la quantité de chaque ouvrage que vous désirez,
en modifiant le nombre figurant dans la case prévue à cet effet et en cliquant sur
"modifier". Vous pouvez aussi retirer un article que vous aviez précédemment sélectionné en saisissant 0 et en cliquant
sur le bouton.</p>

<p>Si vous désirez mettre des articles de côté pour une commande future,
cliquez alors sur le bouton "mettre de côté". Les articles ainsi écartés se
retrouveront dans la section "Articles de côté" en dessous du panier.
Si vous désirez sélectionner de nouveau un article précédemment mis de côté,
il vous suffit de cliquer sur le bouton "Ajouter au panier".</p>

<h3 id="passer"><span class="deco">></span>Passer une commande</h3>

<p>Dès lors que vous souhaitez passer votre commande, cliquez sur <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php">Valider
la commande</a> dans votre panier ou dans la barre de menu située à droite de l'écran.
Si vous n'êtes pas encore inscrit sur Dicoland.com, un formulaire vous proposera
de saisir vos coordonnées. Vous devrez ensuite indiquer l'adresse à laquelle
vous souhaitez être livré. 
Vous avez alors la possibilité de recevoir votre facture à une autre adresse. Il
vous reste ensuite à indiquer le mode livraison (prioritaire ou économique) que vous désirez. 
Votre commande est maintenant presque terminée. Vous devez enfin choisir un mode de
rêglement et suivre les instructions qui s'affichent.<br />
Vous recevrez alors un mail vous confirmant la bonne réception de votre
commande.</p>

<h3 id="suivre"><span class="deco">></span>Suivi de commande</h3>

<p>Une fois votre commande validée, vous serez prévenu de son avancement à chaque étape de son
traitement.<br />Tout d'abord, Dicoland.com procède à une vérification de votre commande afin
de contrôler sa validité. Si Dicoland.com ne trouve pas d'erreur, votre commande est alors
acceptée. Dès réception du paiement, Dicoland.com procède à la préparation
de la commande et à son expédition.<br />
Vous serez informé par mail à chacune de ces étapes. De plus, vous avez la 
possibilité de suivre votre commande directement sur Dicoland.com sous la rubrique
"mon compte" puis "suivre l'état de mes commandes en direct".
Sur cette page, vous pourrez visualiser le détail de vos commandes et l'état de
leurs préparations.
</p>

<h2 id="paiement"><span class="deco">></span>Paiement sécurisé ?</h2>
<p>Pour une sécurité totale de paiement, dicoland.com vous redirige sur le service de
paiement en ligne sécurisé de la banque CIC, pour le règlement de votre
commande par carte bancaire. Ainsi, Dicoland.com n'a, à aucun moment connaissance de vos informations
bancaires personnelles. Lorsque vous effectuez votre paiement sur le serveur sécurisé de la
banque, les informations sont cryptées. Lorsque vous effectuez cette
opération, vous pouvez d'ailleurs constater que vous êtes sur un espace sécurisé
à l'affichage du petit cadenas dans la barre d'état de votre navigateur.</p>

<h2 id="nouscontacter"><span class="deco">></span>Comment nous contacter ?</h2>
<p>Pour nous contacter c'est très simple.<br />Vous pouvez utiliser le formulaire
prévu à cet effet dans la section <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=contact'>contact</a>. Nous nous ferons une joie de vous
répondre dans les plus brefs délais. Vous pouvez aussi, si vous le souhaitez,
nous contacter par téléphone au +33 (0) 1 43 22 12 93 ou par fax au +33 (0) 1 43 22 01 77.
</p>

<h3 id="faq"><span class="deco">></span><acronym title='Frequently Asked Question'>FAQ</acronym> (Questions Fréquemment Posées)</h3>
<h4 id="passperdu"><span class="deco">></span>Comment récupérer son mot de passe perdu ou oublié ?</h4>
<p>
  Pour obtenir un nouveau mot de passe, que vous pourrez par la suite changer, rendez-vous sur 
  <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass">le formulaire de récupération du mot de
  passe</a>. Saisissez l'adresse email que vous aviez fournie lors de votre inscription.<br />
  Vous recevrez alors un nouveau mot de passe qui vous permettra de vous 
  connecter immédiatement sur Dicoland.com.
</p>