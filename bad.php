<?php
$redirection =  "Location: index.php?page=bad&commande=". $_GET["order_ref"];
header($redirection);
?>
