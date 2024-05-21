<?php //juste pour creer ou mettre à jour une nouvelle demande dans la base
//je réinitialse tout ce qu'il faut
include ('connexion.inc.php');
include ('function.inc.php');
?>
<p> je suis bien arrivé dans la miseaà jour </p>
<?php
var_dump($_POST['type_dev']);

//je récupére les données qui se trouvent dans le Post
if ($_POST['id_dev'] == NULL)
{
	$sql= 'INSERT INTO `dev` (`id_dev`,`type_dev`,`venant_de`,`url_vue`,`url_vraie`,`des_bug`,`cop_col_bug`,`des_evol`,`des_image`,`auteur`,`mail_auteur`,
		`date_demande`,`date_souhait`,`devloper`,`mail_devloper`,`date_pec`,`date_prev`,`charge_prev`,`date_reel`,`charge_rel`,`prog_fic`)
		VALUES ("","' .$_POST['type_dev'] . '","' .$_POST['venant_de'] . '","' .$_POST['url_vue'] . '","' .$_POST['url_vraie'] . '","' .$_POST['des_bug'] . '",
		"' .$_POST['cop_col_bug'] . '","' .$_POST['des_evol'] . '","' .$_POST['des_image'] . '","' .$_POST['auteur'] . '","' .$_POST['mail_auteur'] . '",
		"' .$_POST['date_demande'] . '","' .$_POST['date_souhait'] . '","' .$_POST['devloper'] . '","' .$_POST['mail_devloper'] . '","' .$_POST['date_pec'] . '",
		"' .$_POST['date_prev'] . '","' .$_POST['charge_prev'] . '","' .$_POST['date_reel'] . '","' .$_POST['charge_rel'] . '","' .$_POST['prog_fic'] . '");';

}
else
{
	$sql= 'UPDATE `dev` 
		SET
		`type_dev` = "' . $_POST['type_dev'] . '",`venant_de` = "' . $_POST['venant_de'] . '",
		`url_vue` = "' . $_POST['url_vue'] . '",`url_vraie` = "' . $_POST['url_vraie'] . '",`des_bug` = "' . $_POST['des_bug'] . '",
		`cop_col_bug` = "' . $_POST['cop_col_bug'] . '",`des_evol` = "' . $_POST['des_evol'] . '",`des_image` = "' . $_POST['des_image'] . '",
		`auteur` = "' . $_POST['auteur'] . '",`mail_auteur` = "' . $_POST['mail_auteur'] . '",`date_demande` = "' . $_POST['date_demande'] . '",
		`date_souhait` = "' . $_POST['date_souhait'] . '",`devloper` = "' . $_POST['devloper'] . '",`mail_devloper` = "' . $_POST['mail_devloper'] . '",
		`date_pec` = "' . $_POST['date_pec'] . '",`date_prev` = "' . $_POST['date_prev'] . '",`charge_prev` = "' . $_POST['charge_prev'] . '",
		`date_reel` = "' . $_POST['date_reel'] . '",`charge_rel` = "' . $_POST['charge_reel'] . '",`prog_fic` = "' . $_POST['prog_fic'] . '"
		WHERE `id_dev`= "' . $_POST['id_dev'] . '"
		;';
}
echo "je suis là et  vaut:" . $sql; 
mysqli_query($link,$sql);
header('location: ../dev_index.php'); 
?>
