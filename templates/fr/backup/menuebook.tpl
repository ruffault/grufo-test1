<div id = "menuebook" class="hide" >

	<h3>Dicoland vous propose un nouveau service: Un catalogue complet de livres numeriques</h3>
	<p id="innerleft">Vous y trouverez en premier lieu:	<br></p>
	<ul>
	<li>Tous les livres maisons sous un format electronique</li><br>
	<li>Une bonne sélection d'Ebook gratuits</li><br>
	<li>L'accès à une bibliothèque de livres en format numérique<br>
	qui ont fait l'objet d'un partenarait avec des confrères éditeurs</li>
	</ul>
	<h4>L'Ebook du mois</h4>
	<img src="{$urlsite}picproduct/7608_mini.jpg" />
	<p>Il suffit de remplir votre panier ensuite laissez vous guider 	 </p>

</div>
{literal}
<script>
let boutebook = document.querySelector("a[href$='c365']");
let menuebk = document.getElementById("menuebook");

boutebook.addEventListener("mouseover", function () {menuebk.style.display = "block";});
menuebk.addEventListener("mouseout", function () {menuebk.style.display = "none";});

</script>
{/literal}
