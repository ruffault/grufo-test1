<?php

$redirection =  "Location: index.php?page=good&commande=". $_GET["order_ref"];
header($redirection);

?>
