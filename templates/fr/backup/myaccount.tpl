<div id="myaccount">

{if {$ebooktek} 

<h2><span class="deco">></span>Ma bibliothèque d'E-books </h2>

<p>Ici vous retrouvez tous les E-book que vous avez achetés sur notre site.<br/>
Ils restent accessibles pour téléchargement </p>

<table id="panier">
	 <caption></caption>
	<tr>
    	<th colspan="2" rowspan="1">Descriptif</th>
    	<th class="price" colspan="1">Référence commande</th>
        <th class="quantity" rowspan="1">Date achat</th>
        <th class="subtotal" colspan="1">Télécharger</th>
	</tr>
	{section name=ebook loop=$ebooktek}
		{cycle values="<tr class='normal'>,<tr class='selected'>"}

		<td class="image">
			<img src="{$urlsite}picproduct/{$ebooktek[ebook].id_produit}_mini.jpg"  />
		</td>
		<td class="description">
			<h3><a href="{$urlsite}{$ebooktek[ebook].id_produit|product_link:$ebooktek[ebook].nom}">{$ebooktek[ebook].nom|utf8_encode}</a></h3>

  		</td>
  		    <td class="description">
            {$ebooktek[ebook].code} <br />
    		</td>
	<td class="description">
    			{$ebooktek[ebook].date_creation|date_format:"%d/%m/%Y"} <br />

	</td>
  	<td >
	<a class="ebook" href="{$urlsite}{$ebooktek[ebook].id_produit|product_link:'telecharger'}">Télécharger</a>
	</td> 
</tr>
{/section}
</table>
{/if}
<h2><span class="deco">></span>Mon compte</h2>


<p>Dans cet espace personnalisé, vous pouvez retrouver 
toutes vos informations et suivre vos commandes.</p>
{if $smarty.session.id_membre}
<ul>
  <li><a href="{$urlsite}index.php?page=modifpref">Modifier mes informations</a>
	<p>Ici, vous pouvez modifier votre adresse, votre mot de passe, etc.</p></li>
	
  <li><a href="{$urlsite}index.php?page=oldcommande">Suivre l'état de mes commandes en
  direct</a>
	<p>Nous vous prévenons à chaque étape du traitement de votre commande.
	L'état s'affiche en direct, il est représenté par une barre de progression.
	Ici, Vous retrouvez aussi vos anciennes commandes et pouvez les consulter.</p></li>
  <li><a href="{$urlsite}index.php?page=showpanier">Voir mon panier</a>
	<p>Accédez à l'espace panier. Vous retrouverez tous les articles que vous 
	aviez sélectionnés. Vous pouvez modifier les quantités que vous souhaitez pour
	chaque article. Il vous est aussi possible de mettre des articles de coté pour une future commande.</p>
	</li>
</ul>
{else}
<h3>Déjà inscrit ? Identifiez-vous...</h3>
<form action="{$urlsite}login.php" method="post">
<p>
	Pseudo <input type="text" value="" name="login_identification" />
	Mot de passe <input type="password" value="" name="password_identification" />
	<input type="submit" value="ok" name="submit_identification" />
</p>
<p>
  <a href='{$urlsite}index.php?page=lastpass'>Mot de passe perdu ?</a>
</p>
</form>
<h3>Pas encore inscrit ?</h3>
<p><a href="{$urlsite}index.php?page=forminscription&amp;newaccount=1">Inscrivez-vous</a>, c'est simple et rapide.</p>
{/if}
</div>
