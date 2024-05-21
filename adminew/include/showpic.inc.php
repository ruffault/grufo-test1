<?php
echo '<div class="centre">';
echo "<div class='imgproduct'>";
if (file_exists("../picproduct/".$_GET["produit"]."_mini.jpg"))
  echo "<a href='../picproduct/" . $_GET["produit"] . "_normal.jpg'><img src='../picproduct/" . $_GET["produit"] . "_mini.jpg' alt='photo du produit' /></a>";
else if (file_exists("../picproduct/".$_GET["produit"]."_mini.gif"))
  echo "<a href='../picproduct/" . $_GET["produit"] . "_normal.gif'><img src='../picproduct/" . $_GET["produit"] . "_mini.gif' alt='photo du produit' /></a>";
else if (file_exists("../picproduct/".$_GET["produit"]."_mini.png"))
  echo "<a href='../picproduct/" . $_GET["produit"] . "_normal.png'><img src='../picproduct/" . $_GET["produit"] . "_mini.png' alt='photo du produit' /></a>";
else
  echo "Image indisponible";
?>
<br/><a href="delpic.php?id_produit=<? echo $_GET["produit"]; ?>">Supprimer</a>
</div>
<h2>Modifier ou ajouter l'image</h2>
<form enctype="multipart/form-data" action="upload.php" method="post">
  <input type="hidden" name="max_file_size" value="1000000" />
  <input type="hidden" name="id_produit" value="<? echo $_GET["produit"]; ?>" />
  Envoyez ce fichier : <input name="userfile" type="file" />
  <input type="submit" value="ok" />
</form>
<em>Les images doivent être au format jpg</em>
</div>
