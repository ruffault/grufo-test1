<?php
if(!$_SESSION["id_membre"])
{
  $sql_indicatif = "SELECT abrev,phonecode, nom_$applicationlang as nom
										FROM pays ORDER BY nom_$applicationlang;";
	$sql_indicatif_result = mysql_query($sql_indicatif);
  $total = mysql_num_rows($sql_indicatif_result);
  
  //creation du javascript pour les pays
  $scriptjava = "<script language=\"JavaScript\">
                  function ViewCrossReference (selSelectObject)
                  {
                    var abrev = new Array (" . $total . ");\n
                    var code = new Array (" . $total . ");\n\n";
  
  $x = 0;
  while($val_indicatif = mysql_fetch_array($sql_indicatif_result))
  {
    $indicatif[$x] = array(
                            'abrev' => $val_indicatif['abrev'],
                            'phonecode' => $val_indicatif['phonecode'],
                            'nom' => $val_indicatif['nom'],
                            'x' => $x
                          );
    $scriptjava .= "  abrev[" . $x . "] = \"" . $val_indicatif["abrev"] . "\";\n";
    $scriptjava .= "  code[" . $x . "] = \"" . $val_indicatif["phonecode"] . "\";\n";
    $x++;
  }
  
  $scriptjava .= "  for (var i = 0; i < " . $total . "; i++) {\n
                      if (selSelectObject.options[selSelectObject.selectedIndex].value == abrev[i])
                      {
                        document.forms['inscription'].elements['inscription_indicatif_tel'].value = \"+\" + code[i];
                        document.forms['inscription'].elements['inscription_indicatif_fax'].value = \"+\" + code[i];
                        break;
                      }
                    }
                  }
                  
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
  
	$smarty->assign("error_inscript", $_SESSION['error_inscript']);
  $smarty->assign("total", $total);
  $smarty->assign("scriptjava", $scriptjava);
  $smarty->assign("indicatif", $indicatif);
	
}
else
{
  //Si le panier est vide on renvoie sur le panier
  $redirection = "Location: index.php?page=myaccount";
  header($redirection);
}
?>
