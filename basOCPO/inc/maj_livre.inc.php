<?php
include 'header.inc.php';
include 'connexion.inc.php';
//je vais boucler sur post qui a pour chaque indic a une array de valeur par livre sous forme d'index
//var_dump($_POST);
$resul=array();$retour=array();$tot=array();
foreach ($_POST as $champ => $tab) 
	{
	foreach ($tab as $i =>$val) 
		{
//			echo $i . "=>" .$champ . $val, '</br>';
			if ($val <>"")	$resul[$i][$champ] = $val; 
		}
	}	
//création du tableau des livres à mettre à jour
foreach($resul as  $at =>$val){
//	echo $at . "=>" .$val['sup'], '</br>';
	if ($val['action'] <> "Act" && $val['action']<>"Ajout") {
//		var_dump(array_slice($val,1,22));
		$bdlivre = new Livre(array_slice($val,1,22));
		$method = $val['action'];
		//var_dump($val);
		$retour[$method][]=$acces->$method($bdlivre);
		$tot[$method] = (isset($tot[$method]) ? $tot[$method] : '') +1;
	}
}
	$mesretour = "?sup=".(isset($tot['Sup']) ? $tot['Sup'] : '') ."&maj=".(isset($tot['Maj']) ? $tot['Maj'] : '') ."&ins=".(isset($tot['Ins']) ? $tot['Ins'] : '') ;
//var_dump($retour);var_dump($tot);var_dump($mesretour);
//var_dump("Location: http://grufo.ovh/basOCPO/form_auteur.inc.php".$mesretour);//on retourne dans la MAJ auteur
header('Location: form_livre.inc.php'.$mesretour);
//header("Location: http://grufo.ovh/basOCPO/form_auteur.inc.php".$mesretour);//on retourne dans la MAJ auteur
