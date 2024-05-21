<?php
include ("include/connexion.inc.php");
$borne= array(250,500,750,1000,1500,2000,3000,4000,5000,6000,7000,8000,9000,10000,11000,12000,13000,14000,
	15000,16000,17000,18000,19000,20000,25000,30000);
$sql = "SELECT * FROM frais_port";
$res = mysqli_query($link,$sql);
// on boucle sur chaque row de la table
while ($val = mysqli_fetch_array($res)) {
	$mode = $val['mode'];
	$pays = $val['pays'];
	$mode_calcul = 0;
//	var_dump($val);
	// on initialise le couple borne prix de départ
	$prix = $val['250'];
	$poids_tarif = 250;
// on boucle sur chaque borne
	foreach ($borne as $lim) {
				// si le prix de la borne courante est different de celui de la précédente, on cree un enregistrement
		if ($val[strval($lim)] != $prix)
		{
			$sql = 'INSERT INTO `frais_port_new` 
				(`id_frais_port`,`mode`,`pays`,`mode_calcul`,`poids_tarif`,`prix`)
				VALUES (
						"",
						"' . $mode . '",
						"' . $pays . '",
						"0",
						"' . $poids_tarif . '",
						"' . $prix . '"
					)
				;';
			mysqli_query($link,$sql);
		}
		$poids_tarif = $lim;
		$prix = $val[strval($lim)];
	}	//fin de la boucle sur les bornes de poids. Il faut créer le dernier enregistrement
		// avec le dernier prix enregistre et une borne qui sera la borne maxi
	$sql = 'INSERT INTO `frais_port_new` 
				(`id_frais_port`,`mode`,`pays`,`mode_calcul`,`poids_tarif`,`prix`)
				VALUES (
						"",
						"' . $mode . '",
						"' . $pays . '",
						"0",
						"9999999",
						"' . $prix . '"
					)
				;';

			mysqli_query($link,$sql);
} // fin de la boucle sur les enregistrements de la table frais_port
?>

