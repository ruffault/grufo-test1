<?php

if (isset($_POST['ref'])) {
  reject_order($_POST['ref']);
}
else {
  reject_order_form();
}

// fonction pour afficher la commande rejeter.
function reject_order($ref) {
 //R�ception de la commande rejeter
	$sql_ref_order = "SELECT id_commande, id_utilisateur FROM `commande` WHERE code ='$ref'";
	$sql_ref_order_result = mysql_query($sql_ref_order);
	$nb = mysql_num_rows($sql_ref_order_result);
	$val_order = mysql_fetch_array($sql_ref_order_result);

$correspondence = all_correspondence($val_order['id_commande']);	


	if ($nb>0){
	 //R�ception du nom du membre et de son email
  $sql_membre = "SELECT membre.id_membre, membre.nom, membre.prenom, membre.email, membre.tel, membre.aplan
                 FROM membre, utilisateur, commande
                 WHERE membre.id_membre = utilisateur.id_membre
                 AND commande.id_utilisateur = utilisateur.id_utilisateur
                 AND commande.id_commande = '".$val_order['id_commande']."'
                 ;";
  $sql_membre_result = mysql_query($sql_membre);
  $val_membre = mysql_fetch_array($sql_membre_result);	
  
  
   //R�ception du detail de la commande
  $sql_panier = "SELECT panier.id_commande, panier.id_produit, panier.quantite, produit.reference, produit.id_produit, produit.nom_fr
                 FROM panier, produit, commande
                 WHERE panier.id_commande = commande.id_commande
                 AND panier.id_produit = produit.id_produit
                 AND commande.id_commande = '".$val_order['id_commande']."'
                 ;";
  $sql_panier_result = mysql_query($sql_panier);
  //$val_panier = mysql_fetch_array($sql_panier_result);	
  	
//affichage des information clients
			echo '<table id="commande">';
			echo '<tr>';
    			echo '<td><b>Ref</b></td>';
    			echo '<td><b>Nom</b></td>';
    			echo '<td><b>Langue</b></td>';
    			echo '<td><b>Tel</b></td>';
    			echo '<td><b>Email</b></td>';
			echo '</tr>';	
    		echo '<tr class="selected">';
    			echo '<td>'.$ref.'</td>';
    			echo '<td>'.$val_membre['prenom'].' '.$val_membre['nom'].'</td>';
						echo '<td><img src="css/flag_' . $val_membre['aplan'] . '.gif" ';
						echo 'title="Parle ' . convert_lang($val_membre['aplan']) . '" alt="" />';
						echo '</td>';
				echo '<td>'.$val_membre['tel'].'</td>';
				echo '<td> '.$val_membre['email'].' <a href="mailto:'.$val_membre['email'].'"><img alt="Ecrire � cet utilisateur" src="css/enveloppe.gif" title="Ecrire � cet utilisateur"></a></td>';
    		echo '</tr>';
    	echo '</table>';
    	
// detail de commande    	
		echo '<h2 class="noborder" style="text-align: left;"><img alt="" src="css/box7.png"> D�tail de la commande</h2>';
		echo '<table id="cmd_content">';
			echo '<tr>';
				echo '<th>&nbsp;</th>';
				echo '<th>Code sage</th>';
				echo '<th>&nbsp;</th>';
				echo '<th>Nom</th>';
				echo '<th>&nbsp;</th>';
				echo '<th>Qt�</th>';
				echo '<th>&nbsp;</th>';
			echo '</tr>';

	while ($data = mysql_fetch_object($sql_panier_result))
    {
    	echo '<tr>';
    	echo '<td>&nbsp;</td>';
    		echo '<td>'.$data->reference.'</td>';
    		echo '<td>&nbsp;</td>';
    		echo '<td>'.$data->nom_fr.'</td>';
    		echo '<td>&nbsp;</td>';
    		echo '<td>'.$data->quantite.'</td>';
    		echo '<td>&nbsp;</td>';
  	        echo '</tr>';
    }
        echo '</table>';
        
    	}else{ 
    	//echec
		echo'<p>Pas de commande avec cette r�f�rence</p>';	
		echo'<p><a href="index2.php?page=reject_order">Essayer avec une autre r�f�rence</a></p>';	
		}




if (isset($correspondence))
	{
	echo '<td>Email d�ja envoyer � : '.$val_membre['email'].'</td>';
	}	
	else {
		echo '<h2 class="noborder" style="text-align: left;"><img alt="" src="css/box8.png"> R�diger un e-mail</h2>';
		echo '<form name="" method="POST" action="sendmail_rejeect.php">';
		echo '<input type="hidden" name="email" value="'.$val_membre['email'].'" />';
		echo '<input type="hidden" name="sender" 	value="Dicoland.com &#060;contacts@dicoland.com&#062;" />';
		echo '<p>Sujet du message :</p>';
		echo '<input type="text" name="subject" size="105" value="Un probl�me avec votre commande ? / un message de dicoland.com" />';
		echo '<p>Corps du message :</p>';
		echo '<textarea rows="8" cols="95" name="content">Cher(e) client(e) bonjour,
Votre commande  '.$ref.' n a pas �t� prise en compte par notre site. Nous sommes d�sol�s pour le probl�me rencontr�. Vous pouvez toujours r�essayer sur notre site (apr�s avoir vid� votre cache Internet)ou bien passer votre commande par t�l�phone ou par email.
Cordialement.

Dear customer hello, 
It seems you have encountered a problem while placing your order. You can retry on our website ou call us or drop us a mail. 

Regards.

Service client
www.dicoland.com
tel + 33 1 43 22 12 93

98 boulevard du Montparnasse
75014 PARIS
France</textarea>';
		
		echo '<br />';
		echo '<input type="hidden" name="id_order" value="'.$val_order['id_commande'].'" />';
		echo '<input type="submit" value="Envoyer le message" />';
		echo '</form>';
		
		
}

		

		
		
}

// fonction afficher si il n'y pas de r�f�rence.
function reject_order_form() {
  echo '
	<fieldset>
  	<p>Veuillez saisir la r�f�rence de la commande rejeter :</p>
    	<form id="search_reject_order" name="search_reject_order" method="post" action="">
   			<input type="text" size="8" name="ref" id="ref">
    		<input type="submit" name="button" id="button" value="Rechercher">
    	</form>
	</fieldset>
  ';
}

?>