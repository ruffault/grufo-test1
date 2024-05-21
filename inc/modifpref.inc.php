<?php
if ($_SESSION["id_membre"])
{
  if (isset($_POST["modifpref"]))
  {
		$error_modif = '';

    // DEBUT Changement des coordonnées uniquement  
    if (!isset($_POST["action"]))
    {
	    //test du nom
	    if (checkname($_POST["account_nom"]))
				$error_modif['noname'] = 1;
	    // test du prenom
	    if (checkname($_POST["account_prenom"]))
				$error_modif['nosurname'] = 1;
	    //test de l'adresse
	    if (checkadresse($_POST["account_adresse1"]))
				$error_modif['noadress'] = 1;
	    //test de la ville
	    if (checkadresse($_POST["account_ville"]))
				$error_modif['nocity'] = 1;
	    //test du code postal
	    if (checkcp($_POST["account_cp"]))
				$error_modif['nocp'] = 1;    
	    //test du t l phone
	    if (checktel($_POST["account_tel"]))
	    	$error_modif['nophone'] = 1;
	    if ($_POST["account_fax"] != '' && checktel($_POST["account_fax"]))
	      $error_modif['nofax'] = 1;
	     //test email
	    if (checkmail($_POST["account_email"]))
		  $error_modif['noemail'] = 1;  

	      
			// Si pas d'erreurs, on met à jour les coordonnées en base
			if (!$error_modif)
	    {
	      $modif_user = "UPDATE membre
	                     SET civilite = '" . $_POST['account_civilite'] . "',
	  				           nom = '" . $_POST['account_nom'] . "',
	                     prenom = '" . $_POST['account_prenom'] . "',
	          				   mailinglist = '" . $_POST['account_mailinglist'] . "',
	                     adresse1 = '" . $_POST['account_adresse1'] . "',
	                     adresse2 = '" . $_POST['account_adresse2'] . "',
	                     adresse3 = '" . $_POST['account_adresse3'] . "',
	                     cp = '" . $_POST['account_cp'] . "',
	                     ville = '" . $_POST['account_ville'] . "',
	                     etat = '" . $_POST['account_etat'] . "',
	                     tel = '" . $_POST['account_tel'] . "',
	                     fax = '" . $_POST['account_fax'] . "',
	                     email = '" . $_POST['account_email'] . "'
	                     WHERE id_membre = '" . $_SESSION["id_membre"] . "'
	                    ;";
	      mysqli_query($link,$modif_user);
	      if (isset($_POST["account_email"]) && isset($_SESSION["email"]) && ($_POST["account_email"] != $_SESSION["email"]))
	      {
	       $_SESSION["email"] = $_POST["account_email"];   
	      }
	    }
    }
    // FIN Changement des coordonnées uniquement
    
    // DEBUT Changement de mot de passe uniquement  
    if (isset($_POST["action"]) && $_POST["action"] == "changepassword")
    {
      $query = "SELECT *
                FROM membre
                WHERE password = '" . md5($_POST["account_oldpass"]) . "'
                AND id_membre = '" . $_SESSION["id_membre"] . "'
               ;";
      $result = mysqli_query($link,$query);

  		if(!mysqli_num_rows($result))
  		{
        $error_modif['nopass'] = 1;
      }
  		else
      {
        if (checkverif($_POST["account_newpass"], $_POST["account_confpass"]))
        {
          $error_modif['badconf'] = 1;
        }
        if (checkpass($_POST["account_newpass"]))
        {
					$error_modif['badpass'] = 1;
				}
			}

			// Si pas d'erreurs, on met à jour le mot de passe en base
			if (!$error_modif)
    	{
      	$modif_password = "UPDATE membre
                     SET password = '" . md5($_POST['account_newpass']) . "'
                     WHERE id_membre = '" . $_SESSION["id_membre"] . "' LIMIT 1
                    ;";
      	mysqli_query($link,$modif_password);
    	}		

    }
		// FIN Changement de mot de passe uniquement
  }
  if (!isset($_POST["modifpref"]) or $error_modif)
  {
      $user_info = "SELECT *
                    FROM membre
                    WHERE id_membre = '" . $_SESSION["id_membre"] . "';";
      $user_info_result = mysqli_query($link,$user_info); 
      $val_user_info = mysqli_fetch_array($user_info_result);
      $_POST['account_civilite'] = $val_user_info["civilite"];
      $_POST['account_nom'] = $val_user_info["nom"];
      $_POST['account_prenom'] = $val_user_info["prenom"];
  	  $_POST['account_mailinglist'] = $val_user_info["mailinglist"];
    	$_POST['account_email'] = $val_user_info["email"];
      $_POST['account_adresse1'] = $val_user_info["adresse1"];
      $_POST['account_adresse2'] = $val_user_info["adresse2"];
      $_POST['account_adresse3'] = $val_user_info["adresse3"];
      $_POST['account_cp'] = $val_user_info["cp"];
      $_POST['account_ville'] = $val_user_info["ville"];
      $_POST['account_etat'] = $val_user_info["etat"];
      $_POST['account_tel'] = $val_user_info["tel"];
      $_POST['account_fax'] = $val_user_info["fax"];

    if ((isset($error_modif) ? $error_modif : '') )
    {
      $smarty->assign("error_modif", $error_modif);
    }
  }
}
else
{
  //Si le user n'est pas logué, on le renvoi vers le formulaire de login
  $redirection = "Location: index.php?page=myaccount";
  header($redirection);
}
?>
