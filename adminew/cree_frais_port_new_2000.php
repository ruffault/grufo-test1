<?php
include ("include/connexion.inc.php");
$borne= array(250,500,750,1000,1500,2000,3000,4000,5000,6000,7000,8000,9000,10000,11000,12000,13000,14000,
	15000,16000,17000,18000,19000,20000,25000,30000);
$sql = "SELECT pays, mode, `2000` FROM frais_port WHERE mode = 'courrier_ordinaire' AND pays in (`AD`, `AN`, `AR`, `AT`, `AU`, `BE`, `BG`, `BO`, `BR`, `CA`, `CH`, `CL`, `CO`, `CY`, `CZ`, `DE`, `DK`, `ES`, `FI`, `GB`, `GF`, `GG`, `GP`, `GR`, `GY`, `HK`, `HR`, `HU`, `IE`, `IL`, `IS`, `IT`, `JP`, `LI`, `LT`, `LU`, `MC`, `MQ`, `MX`, `NC`, `NL`, `NO`, `NZ`, `PE`, `PF`, `PL`, `PT`, `RE`, `RO`, `RU`, `SC`, `SE`, `SG`, `SI`, `SK`, `TR`, `TW`, `US`, `VA`, `VE`, `ZA`);";
$res = mysqli_query($link,$sql);
// on boucle sur chaque row de la table
while ($val = mysqli_fetch_array($res)) {
	$mode = $val['mode'];
	$pays = $val['pays'];
	$mode_calcul = 0;
/*/	var_dump($val);
	// on initialise le couple borne prix de départ
	$prix = $val['250'];
	$poids_tarif = 250;
// on boucle sur chaque borne
/*	foreach ($borne as $lim) {
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
 */
	$sql = 'INSERT INTO `frais_port_new` 
				(`id_frais_port`,`mode`,`pays`,`mode_calcul`,`poids_tarif`,`prix`)
				VALUES (
						"",
						"' . $mode . '",
						"' . $pays . '",
						"0",
						"2000",
						"' . $prix . '"
					)
				;';

			mysqli_query($link,$sql);
} // fin de la boucle sur les enregistrements de la table frais_port
?>

