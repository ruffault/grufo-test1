<?php
echo "<h2>Traduction enregistrées</h2>";
echo "<div class='commande'><img src='css/save.png' alt='livre' class='infoimg' />Les traductions sont directement appliquées sur le produit.<br />";
echo "Vous pouvez <a href='../article-".$_GET["id_produit"]."-1-1-1.html'>regarder les traductions</a> dans la partie publique du site.";
echo "<br /><br />Vous pouvez aussi <a href='index2.php?page=searchproduct'>modifier un produit</a> ou en <a href='index2.php?page=addproduct'>ajouter un nouveau</a>.";
echo "</div>";
?>