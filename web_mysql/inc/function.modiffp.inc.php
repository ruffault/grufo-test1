<?php

//transforme  les carractéres accentuées en leurs equivalent sans accent
function remove_accents($str)
{
  if (!(is_string($str)))
	{
		return ("veuillez passer une chaine");
  }
  $ret = strtr($str, "ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿç",
		"AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyyc");
  return $ret;
}

// Génère une url sympa à partir d'un titre
function str2url($str) {

    $str = strtr($str,
				 utf8_decode("ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÌÍÎÏìíîïÙÚÛÜùúûüÿÑñÇç'"),
         utf8_decode("AAAAAAaaaaaaOOOOOOooooooEEEEeeeeIIIIiiiiUUUUuuuuyNnCc "));
    $str = preg_replace('/[^a-z0-9_\.\s]/',' ',strtolower($str));
    $str = preg_replace('/[^a-z0-9_\s]\./','',trim($str));
    $str = str_replace('. ',' ',$str);
    $str = preg_replace('/[\s]+/','-',$str);

    return $str;
}

function cleanstring($string)
{
	$string = remove_accents($string);
	$string = strtr($string,
									"\"-*+()_[]{}@&~#°\/',=.ô",
									'                      o'
								 );
	$string = preg_replace('/es\b/', 'e', $string);

	// delete short words
	$string = preg_replace('/\b\w{1,3}\b/', '', $string);
	$string = preg_replace('/[\ ]+/', ' ', $string);
	$string = trim($string);

	return $string;
}

function clean_str($str)
{
	//Remove point char, space and plus sign
	$str = str_replace(' ', '', $str);
	$str = preg_replace('/[^0-9]./','',trim($str));
	return $str;
}

function clean_cp($str)
{
	//Remove point char, space and plus sign
	$str = str_replace(' ', '', $str);
	//$str = preg_replace('/[^[:alnum:]]./','',$str);
	return $str;
}

function date_mysql_to_timestamp($date){
  if (!preg_match('/(\d\d\d\d)-(\d\d)-(\d\d) (\d\d):(\d\d):(\d\d)/', $date, $r))
    return false;
  return mktime($r[4], $r[5], $r[6], $r[2], $r[3], $r[1] );
}
function date_mysql_to_timestamp2($date){
  if (!preg_match('/(\d\d\d\d)-(\d\d)-(\d\d)/', $date, $r))
    return false;
  return mktime($r[4], $r[5], $r[6], $r[2], $r[3], $r[1] );
}

function date_fr($timestamp=0)
{
	global $applicationlang;

	// par defaut on affiche la date du jour
  if ($timestamp==0)
	{
    $timestamp=time();
	}
  $jsem = date('w', $timestamp); // jour de la semaine
  $jmois = date('j', $timestamp); // jour du mois ('d' est aussi utilisable)
  $mois = date('n', $timestamp); // mois de l'annee
  $annee = date('Y', $timestamp); // l'annee

	require 'lang/' . $applicationlang . '/datefr.lang.php';

  // construction de la date formatee
  $aujourdhui = $tabjour[$jsem]." $jmois ".$tabmois[$mois]." $annee";
  return $aujourdhui;
}



// Test du login
function checklogin($login) {
	if (!ereg( "^([a-zA-Z0-9_\-\.]{2,20})$", $login))
		return true;
}

// Test si le password correspond à la vérification
function checkverif($password, $verif) {
	if ($password != $verif)
		return true;
}

// Test du password
function checkpass($password) {
	if (!ereg("^.{6,100}$", $password))
		return true;
}

// Test du nom ou du prénom
function checkname($name) {
	if (!ereg("^.{1,255}$", $name))
		return true;
}

// Test de l'adresse
function checkadresse($adresse) {
	if (!ereg("^.{1,255}$", $adresse))
		return true;
}

// Test du code postal
function checkcp($cp) {
	//if (!ereg("^([0-9]{5})$", $cp))
		//return true;
}
function checkzip($zip) {
	if (!ereg("^([a-zA-z0-9]{2,7})$", $zip))
		return true;
}

// Test du téléphone
function checktel($telephone)
{
	if (!ereg("^([0-9]{1,20})$", $telephone))
		return true;
}

// Test de l'email
function checkmail($email) {
	if (!preg_match("`^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$`",$email))
		return true;
}

//Génére un mot de passe
function mdp() {
  $size = '8';
  $key_g = "";
  $letter = "abcdefghijklmnopqrstuvwxyz";
  $letter .= "0123456789";
  //$letter .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  for($cnt = 0; $cnt < $size; $cnt++)
    $key_g .= $letter[rand(0, (strlen($letter)-1))];
  return $key_g;
}

//Calcul le nombre de jours entre 2 dates
function diff_date($jour , $mois , $an , $jour2 , $mois2 , $an2) {
  $timestamp = mktime(0, 0, 0, $mois, $jour, $an);
  $timestamp2 = mktime(0, 0, 0, $mois2, $jour2, $an2);
  $diff = floor(($timestamp - $timestamp2) / (3600 * 24));
  return $diff;
}


function round_up ($value, $places=0)
{
  if ($places < 0)
	{
		$places = 0;
	}

  $mult = pow(10, $places);

	return ceil($value * $mult) / $mult;
}

//Calcul le prix HT
function ht_livre($prix,$tva) {
  $prix = $prix / (1 + ($tva/1000));
  $prix = round($prix,2);
  return $prix;

}

//Applique un rabais
function rabais($prix,$rabais) {
  if ($rabais && ($rabais != '0.00'))
    $prix = $prix - ($prix * $rabais / 100);
  $prix = round($prix,2);
  return $prix;
}

//Applique la tva s'il le faut
function add_tva($price=0, $ht="ht") {
  if ($societe != '' && typeprice($societe, $intracommu, $europe) == "ht") {
  }
  else {
  }
  return $price;
}

function typeprice($societe,$intracommu,$europe){
  if ($societe == 1 && !$intracommu && !$europe)
    $type = "ht";
  elseif (!$societe)
    $type = "ttc";
  elseif ($societe && !$intracommu && $europe)
    $type = "ttc";
  else
    $type = "ht";

  if($_SESSION["pays"] == 'FR')
  	$type = "ttc";
  return $type;
}

function img_type($id) {
  if (file_exists("picproduct/".$id."_normal.jpg"))
		return "jpg";
  else if (file_exists("picproduct/".$id."_normal.gif"))
		return "gif";
  else if (file_exists("picproduct/".$id."_normal.png"))
		return "png";
  else
		return "none";
}

//Formate une date yyyymmdd en dd/mm/yyyy
function invert_date($date) {
  $pieces = explode("-", $date);
  $date = $pieces[2]."/".$pieces[1]."/".$pieces[0];
	return $date;
}

//Retourne les sous catégories
function sub_level($tab, $categ=0) {
  $i = 0;
  foreach($tab as $cle => $valeur)
  {
    if($tab[$cle]['parent'] == $categ)
    {
      $liste[$i] = array(
                        'id' => $cle,
                        'nom' => $tab[$cle]['nom']
                        );
      $i++;
    }
  }
  return $liste;
}

//Retourne un tableau de toutes les categories parentes
function up_level($tab, $categ=0, $flip=1, $upcateg='', $i=0) {
  foreach($tab as $cle => $valeur)
  {
    if($tab[$cle]['id'] == $categ)
    {
      $upcateg[$i] = array(
                        'id' => $tab[$cle]['id'],
                        'nom' => $tab[$cle]['nom']
                        );
      $upcateg = up_level($tab,$tab[$cle]['parent'],$flip , $upcateg, ($i+1));
    }
  }
  if ($categ == 0 && $flip == 1) {
    $upcateg = array_reverse($upcateg);
  }
  return $upcateg;
}

function code_cmd()
{
  $code_chr = array(0 => 48,1 => 49, 2 => 50, 3 => 51, 4 => 52, 5 => 53,
                    6 => 54, 7 => 55, 8 => 56, 9 => 57, 10 => 65, 11 => 66,
                    12 => 70, 13 => 74, 14 => 78, 15 => 85);
  do {
    $code = "";

     for($i=0;$i<8;$i++) {
      $randval = rand(0, count($code_chr)-1);
      $code .= chr($code_chr[$randval]);
    }
    $code_query = "SELECT code
                   FROM commande
                   WHERE code = '".$code."';";
    $code_result = mysql_query($code_query);
  } while(mysql_num_rows($code_result) != 0);
  return $code;
}

//Récupére le poids d'une commande
function poid_commande($id_commande)
{
  $poid_moyen_article = "1000"; //Poid moyen d'un article en gramme
  $poid = 0;
  $sql_poid = "SELECT produit.id_produit, produit.poid
               FROM panier, commande, produit
               WHERE panier.id_commande = commande.id_commande
               AND commande.id_commande = '".$id_commande."'
               AND panier.id_produit = produit.id_produit
               ;";
  $sql_poid_result = mysql_query($sql_poid);
  while($val = mysql_fetch_array($sql_poid_result))
  {
    if ($val['poid'] != 0)
      $poid += $val['poid'];
    else
      $poid += $poid_moyen_article;
  }

  if ($poid > 1000)
    $poid += 400;
  else
    $poid += 300;

  return $poid;
}

//Prix des frais de port suivant le poid et le pays
/*
on introduit ici les modifications d�finies en janvier 2018 pour traiter les 
frais de port.
Modification num�ro 1:

  si editeurs d'un livre sont des editeurs maisons: top�s comme tels dans table editeurs
     pour �a
         -  on aura rajouté un chapm bol�en dans la table editeur
         - et cr�é le formulaire de mise a jour
  et s'il 'agit d'une expéition en Franc

  alors
       si poids de la commande permet une livraison en courrier ordinaire (en l'espece poids >3000)
       alors
            - afficher preselectionn� (check= checked)mode =  courrier ordinaire et mettre prix a montant minimum donc 0,01
            - proposer choix colissimo et donc la possibilité de calculer le prix suivant le mode de calcul habituel
            - autre action speciale a prevoir du genre message pour signaler les conditions promotionnelles?
       sinon
           - afficher uniquement présélecti� (check=checked)= collissimo et mettre prix a montant minimumn donc 0,01
           - autre action speciale a prevoir du genre message pour signaler les conditions promotionnelles
  sinon traitement habituel

Modification 2:

   si periode promo 
   valider avec Marie la logique de traitement qu'elle souhaite
     - la meme chose que pour traitement editeur maison? donc limité aux expeditions pour la France avec cette diff�rence entre courrier ordinaire et colissimo?
   Pour la mise en oeuvre voir si on garde les dates cod�es en dur ou si on propose dans le menu administraiton un param�trage des dates de la periode de promotion
     
Modification 3:

a specifier:

*/
function frais_port_modiffp($poid, $id_livraison)
{

  $sql_pays = "SELECT frais_port.pays,
											frais_port.promo_begin+0 as begin,
	 										frais_port.promo_end+0 as end,
											frais_port.mode
               FROM frais_port, livraison
               WHERE livraison.id_livraison = '" . $id_livraison . "'
               AND livraison.id_frais_port = frais_port.id_frais_port
               ;";
  $res_pays = mysql_query($sql_pays);
  $val_pays = mysql_fetch_array($res_pays);
  $pays = $val_pays['pays'];

  //On determine la tranche à appliquer suivant le poid
  if ($poid <= 250)
    $limite = 250;
  elseif ($poid <= 500)
    $limite = 500;
  elseif ($poid <= 750)
    $limite = 750;
  elseif ($poid <= 1000)
    $limite = 1000;
  elseif ($poid <= 1500)
    $limite = 1500;
  elseif ($poid <= 2000)
    $limite = 2000;
  elseif ($poid <= 3000)
    $limite = 3000;
  elseif ($poid <= 4000)
    $limite = 4000;
  elseif ($poid <= 5000)
    $limite = 5000;
  elseif ($poid <= 6000)
    $limite = 6000;
  elseif ($poid <= 7000)
    $limite = 7000;
  elseif ($poid <= 8000)
    $limite = 8000;
  elseif ($poid <= 9000)
    $limite = 9000;
  elseif ($poid <= 10000)
    $limite = 10000;
  elseif ($poid <= 11000)
    $limite = 11000;
  elseif ($poid <= 12000)
    $limite = 12000;
  elseif ($poid <= 13000)
    $limite = 13000;
  elseif ($poid <= 14000)
    $limite = 14000;
  elseif ($poid <= 15000)
    $limite = 15000;
  elseif ($poid <= 16000)
    $limite = 17000;
  elseif ($poid <= 18000)
    $limite = 18000;
  elseif ($poid <= 19000)
    $limite = 19000;
  elseif ($poid <= 20000)
    $limite = 20000;
  elseif ($poid <= 25000)
    $limite = 25000;
  elseif ($poid <= 30000)
    $limite = 30000;
  elseif ($poid > 30000)
    $limite = 30000;

  $sql = "SELECT mode, `" . $limite . "` FROM frais_port
          WHERE pays = '" . $pays . "'
					AND mode = '" . $val_pays['mode'] . "'";

	// On retire le tarif "courrier ordinaire" si le poids depasse 3000 grammes pour la France et 2000 pour l'international pour les pays choisis
	$array_pays_internationaux_avec_courrier_ordinaire_autorise = array ("AD", "AN", "AR", "AT", "AU", "BE", "BG", "BO", "BR", "CA", "CH", "CL", "CO", "CY", "CZ", "DE", "DK", "ES", "FI", "GB", "GF", "GG", "GP", "GR", "GY", "HK", "HR", "HU", "IE", "IL", "IS", "IT", "JP", "LI", "LT", "LU", "MC", "MQ", "MX", "NC", "NL", "NO", "NZ", "PE", "PF", "PL", "PT", "RE", "RO", "RU", "SC", "SE", "SG", "SI", "SK", "TR", "TW", "US", "VA", "VE", "ZA");
	if ($poid > 3000 && $pays == "FR")
	{
		$sql.=" AND mode <> 'courrier_ordinaire';";
	}
	else if ($poid > 2000 && in_array($pays,$array_pays_internationaux_avec_courrier_ordinaire_autorise))
	{
		$sql.=" AND mode <> 'courrier_ordinaire';";
	}
	else
	{
		$sql.=";";
	}

  $res = mysql_query($sql);
  $i = 0;

	$today = date('YmdHis');

  while ($val = mysql_fetch_array($res))
  {
    $frais_port[$i]['mode'] = $val['mode'];

		//Si les frais de port sont gratuit en ce moment
		if ((isset($val_pays['begin']) && isset($val_pays['end']))
			&& ($val_pays['begin'] < $today && $today < $val_pays['end']))
		{
		    $frais_port[$i]['prix'] = '0.00';
		}
		else
	    $frais_port[$i]['prix'] = twodecimal($val[$limite]);

		$i++;
  }
	return $frais_port;
}



//Prix des frais de port suivant le poid et le pays
function all_frais_port($poid, $id_livraison)
{

  $sql_pays = "SELECT frais_port.pays,
											frais_port.promo_begin+0 as begin,
	 										frais_port.promo_end+0 as end
               FROM frais_port, livraison
               WHERE livraison.id_livraison = '" . $id_livraison . "'
               AND frais_port.pays = livraison.pays
               ;";

  $res_pays = mysql_query($sql_pays);
  $val_pays = mysql_fetch_array($res_pays);
  $pays = $val_pays['pays'];

  //On determine la tranche à appliquer suivant le poid
  if ($poid <= 250)
    $limite = 250;
  elseif ($poid <= 500)
    $limite = 500;
  elseif ($poid <= 750)
    $limite = 750;
  elseif ($poid <= 1000)
    $limite = 1000;
  elseif ($poid <= 1500)
    $limite = 1500;
  elseif ($poid <= 2000)
    $limite = 2000;
  elseif ($poid <= 3000)
    $limite = 3000;
  elseif ($poid <= 4000)
    $limite = 4000;
  elseif ($poid <= 5000)
    $limite = 5000;
  elseif ($poid <= 6000)
    $limite = 6000;
  elseif ($poid <= 7000)
    $limite = 7000;
  elseif ($poid <= 8000)
    $limite = 8000;
  elseif ($poid <= 9000)
    $limite = 9000;
  elseif ($poid <= 10000)
    $limite = 10000;
  elseif ($poid <= 11000)
    $limite = 11000;
  elseif ($poid <= 12000)
    $limite = 12000;
  elseif ($poid <= 13000)
    $limite = 13000;
  elseif ($poid <= 14000)
    $limite = 14000;
  elseif ($poid <= 15000)
    $limite = 15000;
  elseif ($poid <= 16000)
    $limite = 17000;
  elseif ($poid <= 18000)
    $limite = 18000;
  elseif ($poid <= 19000)
    $limite = 19000;
  elseif ($poid <= 20000)
    $limite = 20000;
  elseif ($poid <= 25000)
    $limite = 25000;
  elseif ($poid <= 30000)
    $limite = 30000;
  elseif ($poid > 30000)
    $limite = 30000;

  $sql = "SELECT mode, `" . $limite . "` FROM frais_port
          WHERE pays = '" . $pays . "'";

	// On evite le tarif "courrier ordinaire" si le poids depasse 3000 grammes pour la France et 2000 pour l'international pour les pays choisis
	$array_pays_internationaux_avec_courrier_ordinaire_autorise = array ("AD", "AN", "AR", "AT", "AU", "BE", "BG", "BO", "BR", "CA", "CH", "CL", "CO", "CY", "CZ", "DE", "DK", "ES", "FI", "GB", "GF", "GG", "GP", "GR", "GY", "HK", "HR", "HU", "IE", "IL", "IS", "IT", "JP", "LI", "LT", "LU", "MC", "MQ", "MX", "NC", "NL", "NO", "NZ", "PE", "PF", "PL", "PT", "RE", "RO", "RU", "SC", "SE", "SG", "SI", "SK", "TR", "TW", "US", "VA", "VE", "ZA");
	if ($poid > 3000 && $pays == "FR")
	{
		$sql.=" AND mode <> 'courrier_ordinaire';";
	}
	else if ($poid > 2000 && in_array($pays,$array_pays_internationaux_avec_courrier_ordinaire_autorise))
	{
		$sql.=" AND mode <> 'courrier_ordinaire';";
	}
	else
	{
		$sql.=";";
	}
	//echo $sql;
  $res = mysql_query($sql);
  $i = 0;

	$today = date('YmdHis');

  while ($val = mysql_fetch_array($res))
  {
    $frais_port[$i]['mode'] = $val['mode'];

		//Si les frais de port sont gratuit en ce moment
		if ((isset($val_pays['begin']) && isset($val_pays['end']))
			&& ($val_pays['begin'] < $today && $today < $val_pays['end']))
		{
		    $frais_port[$i]['prix'] = '0.00';
		}
		else
	    $frais_port[$i]['prix'] = twodecimal($val[$limite]);

		$i++;
  }

	return $frais_port;
}




function delai_livraison($mode)
{
  $temp = 0;
  switch ($mode)
  {
    case "courrier_ordinaire":
      $temps = 0;
      break;
    case "colissimo_fr":
      $temps = 2;
      break;
    case "colispostal_prio_a":
      $temps = 8;
      break;
    case "colispostal_prio_b":
      $temps = 8;
      break;
    case "colispostal_prio_c":
      $temps = 10;
      break;
    case "colispostal_prio_d":
      $temps = 10;
      break;
    case "colispostal_eco_b":
      $temps = 10;
      break;
    case "colispostal_eco_c":
      $temps = 12;
      break;
    case "colispostal_eco_d":
      $temps = 15;
      break;
    case "colissimo_int":
      $temps = 4;
      break;
    case "colissimo_dom":
      $temps = 4;
      break;
  }
  return $temps;
}


function temps_total_livraison($id_commande)
{
  $delai_produit = 0;
  $delai_mode = 0;

  $sql = "SELECT produit.delai_reapprovisionnement
          FROM commande, panier, produit
          WHERE commande.id_commande = '" . addslashes($id_commande) ."'
          AND commande.id_commande = panier.id_commande
          AND panier.id_produit = produit.id_produit
          AND disponible = 0
          ORDER BY delai_reapprovisionnement DESC
          LIMIT 1;";
  $res = mysql_query($sql);
  $val = mysql_fetch_array($res);
  $delai_produit = $val['delai_reapprovisionnement'];

  $sql = "SELECT mode
          FROM commande, livraison, frais_port
          WHERE commande.id_commande = '" . addslashes($id_commande) ."'
          AND commande.id_livraison = livraison.id_livraison
          AND livraison.id_frais_port = frais_port.id_frais_port
          ;";
  $res = mysql_query($sql);
  $val = mysql_fetch_array($res);
  $delai_mode = delai_livraison($val['mode']);

  $temps_total = $delai_produit + $delai_mode;

  return $temps_total;
}

function tab_lang($id)
{

	global $applicationlang;

	//Langues sources et langues cibles
	$query = "SELECT nom_$applicationlang as nom
						FROM langue_produit, langue_dispo
						WHERE langue_produit.id_produit = '$id'
						AND langue_produit.id_langue_source = id_langue_dispo
						;";
	$res_src = mysql_query($query);
	while($val_src = mysql_fetch_array($res_src))
		$langues[]['source'] = $val_src['nom'];

	$query = "SELECT nom_$applicationlang as nom
						FROM langue_produit, langue_dispo
						WHERE langue_produit.id_produit = '$id'
						AND langue_produit.id_langue_cible = id_langue_dispo
						;";
	$res_src = mysql_query($query);
	$i = 0;
	while($val_src = mysql_fetch_array($res_src))
	{
		$langues[$i]['cible'] = $val_src['nom'];
		$i++;
	}
	return $langues;
}

function good_lang($lang)
{
	if($lang == 'fr' or $lang == 'de' or $lang == 'es' or $lang == 'it' or $lang == 'en')
		return true;
	else
		return false;
}

function selectlang($code = 'FR')
{
	switch($code)
	{
		case 'en':
			return 'EN';
			break;
		case 'it':
			return 'IT';
			break;
		case 'de':
			return 'DE';
			break;
		case 'es':
			return 'ES';
			break;
		default:
			return 'FR';
			break;
	}
}

function product_link($id, $name, $freetext = '', $key = 0 )
{
	$link = $name . '-' . $id;
//	if (!empty($freetext))
//		$link = str2url($freetext) . '/' . str2url($link);
//	else
		$link = str2url($link);

	return $link;
}

function categ_link($id, $name, $pos = '', $key = 0 )
{
	$link = $name . '-c' . $id;

	if (!empty($pos))
		$link =  str2url($link) . '-' . str2url($pos);
	else
		$link = str2url($link);

	return $link;
}


function add_basket_entry($id_commande, $id_product)
{
	$sql = 'SELECT produit.prix,
									produit.rabais,
									type.tva
					FROM produit, type
					WHERE produit.id_produit = "' . $id_product . '"
					AND produit.id_type = type.id_type;';

	$res2 = mysql_query($sql);
	$val = mysql_fetch_array($res2);

	$sql = 'INSERT INTO `panier`(
																`id_panier`,
																`id_commande`,
																`id_produit`,
																`prix_unitaire`,
																`discount`,
																`quantite`,
																`taxes`
															)
											VALUES (
															"",
															"' . $id_commande . '",
															"' . $id_product . '",
															"' . $val['prix'] . '",
															"' . $val['rabais'] . '",
															"1",
															"' . $val['tva'] . '"
														)
					;';

	mysql_query($sql);
	return 0;
}


function delete_basket_entry($id_commande, $id_product, $limit = '')
{
	$sql = 'DELETE FROM `panier`
					WHERE `id_commande` = "' . $id_commande . '"
					AND `id_produit` = "' . $id_product . '"';

	if ($limit != '')
	{
		$sql .= ' LIMIT ' . $limit;
	}

	$sql .= ';';

	mysql_query($sql);

	return 0;
}


function count_basket_entry($id_commande, $id_product)
{
	$sql = 'SELECT sum(quantite) as nb_product
					FROM `panier`
					WHERE `id_commande` = "' . $id_commande . '"
					AND `id_produit` = "' . $id_product . '"
					GROUP BY panier.id_produit
					;';

	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	if (isset($val['nb_product']))
		return $val['nb_product'];
	else
		return 0;
}


function update_basket_entry($id_commande, $id_product)
{
	$sql = 'SELECT produit.prix,
									produit.rabais,
									type.tva
					FROM produit, type
					WHERE produit.id_produit = "' . $id_product . '"
					AND produit.id_type = type.id_type;';

	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$sql = 'UPDATE `panier`
					SET
						`prix_unitaire` = "' . $val['prix'] . '",
						`discount` = "' . $val["rabais"]  . '",
						`quantite` = "' . 1 . '",
						`taxes` = "' . $val['tva'] . '"
					WHERE `id_produit` = "' . $id_product . '"
					AND `id_commande` = "' . $id_commande . '"
					;';

	mysql_query($sql);
	return 0;
}


//mise à jour des tarifs du panier
function refresh_basket($id_commande = '')
{
	if ($id_commande != '')
	{
		$sql = 'SELECT panier.id_produit
						FROM panier
						WHERE panier.id_commande = "' . $id_commande . '"
						GROUP BY panier.id_produit
						;';
		$res = mysql_query($sql);

		while ($val = mysql_fetch_assoc($res))
		{
			$products[] = $val['id_produit'];
		}

		if(is_array($products)){

			foreach ($products as $key => $id_product)
			{
				update_basket_entry($id_commande, $id_product);
			}
		}
	}
	return 0;
}


function give_basket($commandid)
{
	global $applicationlang;

	$sql = 'SELECT panier.id_panier,
									panier.id_commande,
									panier.id_produit,
									panier.prix_unitaire as prix_unitaire_ht,
									panier.discount,
									SUM(panier.quantite) as quantite,
									panier.taxes,
									produit.reference,
									produit.nom_' . $applicationlang . ' as nom,
									produit.disponible,
									produit.delai_reapprovisionnement,
									auteur.nom as auteur
									FROM panier, produit, type, auteur
									WHERE panier.id_commande = "' . $commandid . '"
									AND panier.id_produit = produit.id_produit
									AND produit.id_auteur = auteur.id_auteur
									AND produit.id_type = type.id_type
									GROUP BY panier.id_produit
									;';
	$res = mysql_query($sql);
	$i = 0;

	while ($val = mysql_fetch_assoc($res))
	{
		$basket[$i] = $val;

		$basket[$i]['prix_rabais'] = twodecimal(round_up(($val['prix_unitaire_ht'] * $val['discount'] / 100), 2));


		$basket[$i]['prix_unitaire_ht_rabais'] = twodecimal($val['prix_unitaire_ht'] - $basket[$i]['prix_rabais']);

		$basket[$i]['prix_taxes'] = twodecimal(round_up(($basket[$i]['prix_unitaire_ht_rabais'] * $val['taxes'] / 1000), 2));

		$basket[$i]['prix_unitaire_ttc'] = twodecimal($val['prix_unitaire_ht'] + $basket[$i]['prix_taxes']);

		$basket[$i]['prix_unitaire_ttc_rabais'] = twodecimal($basket[$i]['prix_unitaire_ht_rabais'] + $basket[$i]['prix_taxes']);

		$basket[$i]['prix_rabais_for_all'] = twodecimal($basket[$i]['prix_rabais'] * $basket[$i]['quantite']);

		$basket[$i]['prix_unitaire_rabais_ht_for_all'] = twodecimal($basket[$i]['prix_unitaire_ht_rabais'] * $basket[$i]['quantite']);

		$basket[$i]['prix_taxes_for_all'] = twodecimal($basket[$i]['prix_taxes'] * $basket[$i]['quantite']);

		$basket[$i]['prix_unitaire_ttc_rabais_for_all'] = twodecimal($basket[$i]['prix_unitaire_ttc_rabais'] * $basket[$i]['quantite']);

		$i++;
	}

	if (isset($basket))
		return $basket;
	else
		return false;
}


function give_id_commande($commande_code)
{
	$sql = 'SELECT id_commande
					FROM commande
					WHERE commande.code = "' . $commande_code . '"
					;';
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	if (isset($val['id_commande']))
		return $val['id_commande'];
}

function basket_summary($basket)
{
	$summary['total_delai'] = 0;


	if(is_array($basket)){
		foreach ($basket as $key => $product)
		{
			$summary['total_quantite'] += $product['quantite'];
			$summary['total_ht'] += $product['prix_unitaire_rabais_ht_for_all'];
			$summary['total_taxe'] += $product['prix_taxes_for_all'];
			$summary['total_ttc'] += $product['prix_unitaire_ttc_rabais_for_all'];
			if($product['disponible'] != 1)
			{
				//delai maximum pour avoir les produits de la commande
				if ($summary['total_delai'] < $product['delai_reapprovisionnement'])
				{
					$summary['total_delai'] = $product['delai_reapprovisionnement'];
				}
			}
		}
	}
	$summary['total_ht'] = twodecimal($summary['total_ht']);
	$summary['total_taxe'] = twodecimal($summary['total_taxe']);
	$summary['total_ttc'] = twodecimal($summary['total_ttc']);


//	echo '<pre>' . print_r($basket, 1) . '</pre>';
//	echo '<pre>' . print_r($summary, 1) . '</pre>';
//	echo '<pre>' . print_r($product, 1) . '</pre>';


	return $summary;
}

function command_info($command_id)
{
	$sql = 'SELECT *
					FROM commande
					WHERE id_commande = "' . $command_id . '"
					;';
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	if (isset($val))
	{
		return $val;
	}
}

function order_address($commandid, $applicationlang)
{
		$sql = "SELECT
							membre.id_membre as membre_id_membre,
							membre.login as membre_login,
							membre.email as membre_email,
							membre.societe as membre_societe,
							membre.nomsociete as membre_nomsociete,
							membre.intracommu as membre_intracommu,
							membre.civilite as membre_civilite,
							membre.nom as membre_nom,
							membre.prenom as membre_prenom,
							membre.adresse1 as membre_adresse1,
							membre.adresse2 as membre_adresse2,
							membre.adresse3 as membre_adresse3,
							membre.ville as membre_ville,
							membre.etat as membre_etat,
							membre.cp as membre_cp,
							membre.pays as membre_pays,
							membre.indicatif_tel as membre_indicatif_tel,
							membre.tel as membre_tel,
							membre.indicatif_fax as membre_indicatif_fax,
							membre.fax as membre_fax,
							livraison.id_livraison as livraison_id_livraison,
							livraison.id_frais_port as livraison_id_frais_port,
							livraison.civilite as livraison_civilite,
							livraison.nom as livraison_nom,
							livraison.prenom as livraison_prenom,
							livraison.adresse1 as livraison_adresse1,
							livraison.adresse2 as livraison_adresse2,
							livraison.adresse3 as livraison_adresse3,
							livraison.cp as livraison_cp,
							livraison.ville as livraison_ville,
							livraison.etat as livraison_etat,
							livraison.pays as livraison_pays,
							facturation.id_facturation as facturation_id_facturation,
							facturation.civilite as facturation_civilite,
							facturation.nom as facturation_nom,
							facturation.prenom as facturation_prenom,
							facturation.adresse1 as facturation_adresse1,
							facturation.adresse2 as facturation_adresse2,
							facturation.adresse3 as facturation_adresse3,
							facturation.cp as facturation_cp,
							facturation.ville as facturation_ville,
							facturation.etat as facturation_etat,
							facturation.pays as facturation_pays
						FROM
								commande,
								livraison,
								facturation,
								utilisateur,
								membre
						WHERE commande.id_commande = '" . $commandid . "'
						AND commande.id_livraison = livraison.id_livraison
						AND commande.id_facturation = facturation.id_facturation
						AND commande.id_utilisateur = utilisateur.id_utilisateur
						AND utilisateur.id_membre = membre.id_membre;";
	$res = mysql_query($sql);
	$address = mysql_fetch_assoc($res);
	$address['membre_pays_name'] = abrev_to_country_name($address['membre_pays'], $applicationlang);
	$address['livraison_pays_name'] = abrev_to_country_name($address['livraison_pays'], $applicationlang);
	$address['facturation_pays_name'] = abrev_to_country_name($address['facturation_pays'], $applicationlang);

//echo '<pre>' . print_r($address, 1) . '</pre>';

	return $address;
}

function abrev_to_country_name($abrev, $applicationlang)
{
  $sql = 'SELECT nom_' . $applicationlang . ' as pays
					FROM pays
					WHERE abrev = "' . $abrev . '"
					;';
  $res = mysql_query($sql);
  $name = mysql_fetch_array($res);

	return $name['pays'];
}

function twodecimal($number)
{
	return sprintf("%01.2f", $number);
}

function give_product($id_product)
{
	global $applicationlang;

	$sql = "SELECT id_produit,
										reference,
										realname,
										thematic_$applicationlang as thematic,
										meta_$applicationlang as meta,
										produit.nom_$applicationlang as nom,
										auteur.nom as auteur,
										auteur.id_auteur,
										rabais,
										date_parution,
										categorie.nom_$applicationlang as categorie,
										categorie.id_categorie as id_categorie,
										prix,
										description_$applicationlang as description,
										score,
										info_divers_$applicationlang as info_divers,
										nb_pages,
										nb_termes,
										produit.ind,
										produit.disponible,
										type.nom_$applicationlang as type,
										tva,
										prix_editeur as prix_editeur,
										produit.delai_reapprovisionnement,
										produit.url,
										produit.pdfap,
										produit.langues,
										produit.sommeil
									FROM produit,
												auteur,
												categorie,
												`type`
									WHERE id_produit = '" . $id_product . "'
										AND produit.id_auteur = auteur.id_auteur
										AND produit.id_categorie = categorie.id_categorie
										AND type.id_type = produit.id_type
						;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$date_piece = explode('-', $val["date_parution"]);
	$date = $date_piece[2] . "/" . $date_piece[1] . "/" . $date_piece[0];
	$tab_lang = tab_lang(addslashes($id_product));

	if ($val['nom'] != $val['realname'])
	{
		$realname = $val['realname'];
	}

	$val['prix_ht'] = $val['prix'];
	$val['prix'] = $val['prix'] + twodecimal(round_up(($val['prix'] * $val['tva'] / 1000), 2));

	$val['rabais_ht'] = twodecimal(round_up(($val['prix_ht'] * $val['rabais'] / 100), 2));
	$val['prix_rabais_ht'] = twodecimal($val['prix_ht'] - $val['rabais_ht']);
	$val['prix_taxes'] = twodecimal(round_up(($val['prix_rabais_ht'] * $val['tva'] / 1000), 2));
	$val['prix_rabais'] = twodecimal($val['prix_rabais_ht'] + $val['prix_taxes']);

	$basket[$i]['prix_unitaire_ttc'] = twodecimal($val['prix_unitaire_ht'] + $basket[$i]['prix_taxes']);
	$basket[$i]['prix_unitaire_ttc_rabais'] = twodecimal($basket[$i]['prix_unitaire_ht_rabais'] + $basket[$i]['prix_taxes']);
	$basket[$i]['prix_rabais_for_all'] = twodecimal($basket[$i]['prix_rabais'] * $basket[$i]['quantite']);
	$basket[$i]['prix_unitaire_rabais_ht_for_all'] = twodecimal($basket[$i]['prix_unitaire_ht_rabais'] * $basket[$i]['quantite']);
	$basket[$i]['prix_taxes_for_all'] = twodecimal($basket[$i]['prix_taxes'] * $basket[$i]['quantite']);

	$product = array("id_produit" => $val["id_produit"],
								"nom" => $val["nom"],
								'realname' => $realname,
								"reference" => $val["reference"],
								"id_categorie" => $val['id_categorie'],
								"categorie" => $val["categorie"],
								"id_auteur" => $val['id_auteur'],
								"auteur" => $val["auteur"],
								"thematic" => $val["thematic"],
								"meta" => $val["meta"],
								"prix" => $val["prix"],
								"prix_ht" => $val["prix_ht"],
								"prix_rabais" => $val["prix_rabais"],
								"prix_rabais_ht" => $val["prix_rabais_ht"],
								"prix_editeur" => $val["prix_editeur"],
								"prix_editeur_ht" => $val["prix_editeur"],
								"langues" => $val["langues"],
								"tab_lang" => $tab_lang,
								"rabais" => $val["rabais"],
								"delai_reapprovisionnement" => $val["delai_reapprovisionnement"],
								"disponible" => $val["disponible"],
								"type" => $val["type"],
								"tva" => $val["tva"],
								"nb_pages" => $val["nb_pages"],
								"nb_termes" =>  $val["nb_termes"],
								"url" =>  $val["url"],
								"pdfap" =>  $val["pdfap"],
								"index" =>  $val["ind"],
								"description" =>  $val["description"],
								"info_divers" =>  $val["info_divers"],
								"date_parution" =>  $date,
								"score" => 'note' . $val["score"],
								"img_type" => img_type($val["id_produit"]),
								"sommeil" =>  $val["sommeil"]
								);
	//echo '<pre>' . print_r($product, 1) . '</pre>';
	return $product;
}
// Récupération des catégorie éditeur dynamiques du site

function give_cat($id_product)
{
	global $applicationlang;

	$sql = "SELECT  id_produit,		categorie.nom_$applicationlang as categorie,
									categorie.id_categorie as id_categorie
									FROM produit,categorie
									WHERE id_produit = '" . $id_product . "'
									AND produit.id_categorie = categorie.id_categorie
						;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$product = array("id_categorie" => $val['id_categorie'],"categorie" => $val["categorie"]);
	return $product;

	
}



function update_hit($id_product, $quantity)
{
  $sql = "UPDATE hit
          SET nb_hit = '" . $quantity . "'
          WHERE id_produit = '" . $id_product . "'
      	  ;";
  mysql_query($sql);
}

function give_hit($id_product)
{
	$sql = "SELECT nb_hit
					FROM hit
					WHERE id_produit = '" . $id_product . "'
					;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	if (isset($val))
	{
		return $val['nb_hit'];
	}
	else
	{
		return 0;
	}
}

// Récupération des messages dynamiques qui peuvent être affichés sur le site
function get_messages($lieu_affichage)
{
	global $applicationlang;
	$query = "SELECT *
						FROM `messages`
						WHERE 1";
	// Si il a été précisé un lieu d'affichage précis, on ne sélectionne que ces messages là
	if (isset($lieu_affichage) && trim($lieu_affichage))
	{
		$query.=" AND LIEU_AFFICHAGE_MSG='".$lieu_affichage."'";
	}
	// Si le visiteur est logué, on sélectionne aussi les annonces dédiées aux membres seulement
	if (empty($_SESSION["id_membre"]) || $_SESSION["id_membre"] == 0)
	{
		$query.=" AND CIBLE_MSG='public'";
	}
	else
	{
		$query.=" AND (CIBLE_MSG='public' OR CIBLE_MSG='membres')";
	}
	$query.=" AND (LANGUE_MSG='' OR LANGUE_MSG='".$applicationlang."')";
	$query.=" AND (CURDATE() >= DATE_START_MSG AND CURDATE() <= DATE_STOP_MSG)";
	$res = mysql_query($query);
	$i = 0;
	while($data = mysql_fetch_array($res))
	{
		$messages[$i] = array("ID_MSG" => $data['ID_MSG'], "TITRE_MSG" => $data['TITRE_MSG'], "CONTENU_MSG" => $data['CONTENU_MSG'], "LIEU_AFFICHAGE_MSG" => $data['LIEU_AFFICHAGE_MSG'], "LANGUE_MSG" => $data['LANGUE_MSG'], "CIBLE_MSG" => $data['CIBLE_MSG'], "DATE_START_MSG" => $data['DATE_START_MSG'], "DATE_STOP_MSG" => $data['DATE_STOP_MSG']);
		$i++;
	}
	return $messages;
}
// carousel dynamiques du site
function get_carrousel()
{
	global $applicationlang;
	$query = "SELECT  produit.id_produit, produit.nom_$applicationlang as nom, produit.description_$applicationlang as description,
				categorie.nom_$applicationlang as categorie
				FROM produit, categorie
				WHERE produit.id_categorie = categorie.id_categorie
				and carrousel = 1
				;";
	
	$res = mysql_query($query);
	$i = 0;
	while($data = mysql_fetch_array($res))
	{
		$carrousel[$i] = array("id_produit" => $data['id_produit'], "nom" => $data['nom'], "categorie" => $data['categorie'], "description" => $data['description']);
		$i++;
	}
	return $carrousel;
}


function id_editeur_exists($id_editeur)
{
	$ReturnVar = 0;
	$sql = "SELECT id_editeur
					FROM `editeur`
					WHERE id_editeur = '" . $id_editeur . "'
					;";
	$res = mysql_query($sql);
	$nbr = mysql_numrows($res);
	if ($nbr)
	{
		$ReturnVar = 1;
	}
	return $ReturnVar;
}

function editeur_a_produits_online($id_editeur)
{
	$ReturnVar = 0;
	$sql = "SELECT id_produit
					FROM `produit`
					WHERE id_editeur = '" . $id_editeur . "'
					AND produit.sommeil <> 1
					;";
	$res = mysql_query($sql);
	$nbr = mysql_numrows($res);
	if ($nbr)
	{
		$ReturnVar = 1;
	}
	return $ReturnVar;
}

function get_editeur_nbr_produits_online($id_editeur)
{
	$sql = "SELECT id_editeur
					FROM `produit`
					WHERE id_editeur = '" . $id_editeur . "'
					AND produit.sommeil <> 1
					;";
	$res = mysql_query($sql);
	$nbr = mysql_numrows($res);
	return $nbr;
}
?>
