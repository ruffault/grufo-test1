<?php
//les fonctions necessaires pour faire fonctionner dev du site de test de dicoland

// la fonction give_demandes qui met dans une array la liste des demandes avec quelques champs
function give_demandes()
{
	global $link;
	$query = "SELECT id_dev , type_dev , des_bug , des_evol , auteur, date_demande, date_souhait , date_prev, devloper 
						FROM `dev`
						WHERE 1";
	/*// On verra après à aménager des conditions complémentaires du genre
	if (isset($type_dem) && trim($type_dem))
	{
		$query.=" AND type_dem='".$type_dem."'";
	}
	*/
	$res = mysqli_query($link,$query);
	$i = 0;
	while($data = mysqli_fetch_array($res))
	{
		$demandes[$i] = array("id_dev" => $data['id_dev'], "type_dev" => $data['type_dev'], "des_bug" => $data['des_bug'], "des_evol" => $data['des_evol'], "auteur" => $data['auteur'], "date_demande" => $data['date_demande'], "date_souhait" => $data['date_souhait'], "date_prev" => $data['date_prev'], "devloper" => $data['devloper']);
		$i++;
	}
	return (isset($demandes) ? $demandes : '') ;
}
// la fonction give_demande qui met dans une array tous les champs de la table dev pour une demande id_dev donnée

function give_demande($demande_id)
{
	global $link;
	$sql = 'SELECT *
					FROM dev
					WHERE id_dev = "' . $demande_id . '"
					;';
	$res = mysqli_query($link,$sql);
	$val = mysqli_fetch_assoc($res);

	return (isset($val) ? $val : '');
}

?>
