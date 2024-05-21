<?php
//on verifie que le panier n'est pas vide.
$sql_showpanier = "SELECT panier.id_produit
                  FROM panier, utilisateur, produit
                  WHERE utilisateur.sessionid = '" . $_SESSION["sessionid"] . "'
                  AND panier.id_produit = produit.id_produit
                  AND panier.id_commande = '" . $_SESSION["id_commande"] . "'
                  GROUP BY panier.id_produit
                  ;";
$sql_showpanier_result = mysqli_query($link,$sql_showpanier);

if (mysqli_num_rows($sql_showpanier_result) > 0)
{
  $scriptjava .= "<script language=\"JavaScript\">
                  function openbox(id,mode)
                  {
                  	if(document.getElementById) {
                  		element = document.getElementById(id);
                  	} else if(document.all) {
                  		element = document.all[id];
                  	} else return;
                  	
                  	if(element.style) {
                  			element.style.display = 'block';
                  	}
                  }
  
                  function closebox(id,mode)
                  {
                  	if(document.getElementById) {
                  		element = document.getElementById(id);
                  	} else if(document.all) {
                  		element = document.all[id];
                  	} else return;
                  	
                  	if(element.style) {
                  			element.style.display = 'none';
                  	}
                  }
  
                  function testpays(selSelectObject,id)
                  {
                    if(selSelectObject.options[selSelectObject.selectedIndex].value != 'FR')
                    {
                      openbox(id,0)
                    }
                    else
                    {
                      closebox(id,0)
                    }
                    return;
                  }
  
                  </script>";
  
  $sql_allcountry = "SELECT abrev, nom_$applicationlang as nom FROM pays;";
  $sql_allcountry_result = mysqli_query($link,$sql_allcountry);
  $i = 0;
  
  while($valcountry = mysqli_fetch_array($sql_allcountry_result))
  {
    $tabpays[$i] = array(
                        'abrev' => $valcountry["abrev"],
                        'nom' => $valcountry["nom"]
                        );
    $i++;
  }
	$smarty->assign("error_livr", $_SESSION['error_livr']);
  $smarty->assign("tabpays", $tabpays);
  $smarty->assign("scriptjava", $scriptjava);
}
else
{
  //Si le panier est vide on renvoie sur le panier
  $redirection = "Location: index.php?page=showpanier";
  header($redirection);
}

?>
