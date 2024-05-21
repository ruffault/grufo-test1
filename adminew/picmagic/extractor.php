<?php

function redirection($id, $width)
{
  echo '<html><head><meta http-equiv="refresh" content="0;';
  echo 'url='.$_SERVER['PHP_SELF'].'?id='.$id.'">';
  echo '<style>#barre{width:600px; border:1px solid black;height:10px;}';
  echo '#current{background:orange; height:10px; width:';
  echo round((100 / $width * $id),0).'%; text-align:left; font-weight:900;}';
  echo '</style></head>';
  echo '<body>';
  echo "<h2>Traitement en cours : " . round((100 / $width * $id),1) . "%</h2>";
  echo "<div id='barre'>";
  echo "<div id='current'>&nbsp;</div>";
  echo '</div>';
  echo '</body>';
  echo '</html>';
}

function telecharge($fichier_url, $fichier_local)
{
  $url=@fopen("$fichier_url", "rb");

  if ($url!=0)
  {
    $file = fopen("$fichier_local", "wb");

    while (!feof($url))
    {
      $paquet = fread($url,1024);
      fwrite($file,$paquet,1024);
    }
    fclose($file);
    fclose($url);
  }
}

function upload_img($url, $uploaddir='pic/')
{
  //on upload le fichier et on recupere l'extension
  preg_match("/(...)$/i",$url,$extension);
  move_uploaded_file($url, $uploaddir
    . $_POST["id_produit"] . "." . $extension[1]);

  //on le redimensionne en conséquence.
  RatioResizeImg($_POST["id_produit"] . "." . $extension[1], 80, 80,
    $uploaddir, $_POST["id_produit"] . "_icon." . $extension[1]);
  RatioResizeImg($_POST["id_produit"] . "." . $extension[1], 150, 150,
    $uploaddir, $_POST["id_produit"] . "_mini." . $extension[1]);
  RatioResizeImg($_POST["id_produit"] . "." . $extension[1], 400, 400,
    $uploaddir, $_POST["id_produit"] . "_normal." . $extension[1]);
}

function url_exists($url) {
  $fp=@fopen($url,"r");
  return ($fp)? true : false;
}

function url_barnes($isbn) {
  $url = "http://search.barnesandnoble.com/booksearch/'
    .'isbnInquiry.asp?isbn=$isbn";
  return $url;
}

function titre_barnes($tabhtml) {
  for ($i = 0; $i < count($tabhtml); $i++)
  {
  //  if (substr_count($tabhtml[$i], 'color="#000000" face="arial, helvetica, sans-serif"><b>') > 0)
      $titre = $tabhtml[0];
  }

  $titre = preg_replace('/<html><head><title>Barnes&nbsp;&amp;&nbsp;Noble.com -/i','', $titre); //verifier que ca traite bien PREC_CASELESS
  $titre = preg_replace('/: [^ù]*/i','', $titre);
  return $titre;
}

function img_url_barnes($tabhtml) {
  for ($i = 0; $i < count($tabhtml); $i++)
  {
//echo $tabhtml[$i];
    if (substr_count($tabhtml[$i], 'Larger&nbsp;view') > 0) {
      if (substr_count($tabhtml[$i], 'width') > 0)
      {
        $img = $tabhtml[$i];
      }
    }
  }
  $img = preg_replace('/[^ù]*<img src="http://a1055.g.akamai.net/f/1055/1401/5h/images.barnesandnoble.com/gresources/red_carrot_7x8.gif" width="7" height="8" border="0" alt=" ">&nbsp;<a href="/i','', $img);

  $img = preg_replace('/">Larger&nbsp;view</a>[^ù]*/i','', $img);

  //Si l'image n'existe pas
  if(!$img)
    return false;
  else
    return $img;
}

function url_amazon($isbn) {
  if ($isbn[0] == 4)
    $url = "http://www.amazon.co.jp/exec/obidos/ASIN/$isbn";
  else
    $url = "http://www.amazon.fr/exec/obidos/ASIN/$isbn";

  return $url;
}

function titre_amazon($tabhtml) {
  for ($i = 0; $i < count($tabhtml); $i++)
  {
    if (substr_count($tabhtml[$i], '="sans"') > 0)
      $titre = strip_tags($tabhtml[$i]);
  }
  return $titre;
}

function img_url_amazon($tabhtml) {
  for ($i = 0; $i < count($tabhtml); $i++)
  {
    if (substr_count($tabhtml[$i], '<a href="http://images-eu.amazon.com/images/') > 0
      or substr_count($tabhtml[$i], '<a href="http://images-jp.amazon.com/images') > 0) {
      if (substr_count($tabhtml[$i], 'width') > 0)
      {
        $img = $tabhtml[$i];
      }
    }
  }
  $img = preg_replace('/<a href="/i','', $img);
  $img = preg_replace('/"><im[^ù]*/i','', $img);

  //Si l'image n'existe pas
  if(!$img)
    return false;
  else
    return $img;
}

function is_ISBN($isbn) {
  // test des caracteres illegaux
  if (preg_match("/[^0-9 -X]/", $isbn))
    return false;

  // suppression des caracteres de mise en forme
  $isbn = preg_replace("/-/", "", $isbn);
  $isbn = preg_replace("/ /", "", $isbn);
  $isbn = preg_replace("/ISBN/i", "", $isbn);

  // Il ne doit rester que 10 chiffres
  if (strlen($isbn) != 10)
    return false;

  if (preg_match("/[^0-9]{9}[^0-9X]/", $isbn))
    return false;

  // calcul de la somme de verification
  $t = 0;

  for($i=0; $i< strlen($isbn)-1; $i++)
  {
    $t += $isbn[$i]*(10-$i);
  }

  $f = $isbn[9];
  if ($f == "X")
    $t += 10;
  else
    $t += $f;

  // cette somme ponderée doit être divisible par 11
  if ($t % 11)
    return false;
  else
    return 1;
}

function cleanisbn($isbn) {
  $isbn = preg_replace("/-/", "", $isbn);
  $isbn = preg_replace("/ /", "", $isbn);
  $isbn = preg_replace("/ISBN/i", "", $isbn);
  return $isbn;
}

function clean_img_database()
{
	global $link;
	$clean = "UPDATE produit SET image = 0;";
	mysqli_query($link,$clean);

	$query = "SELECT id_produit FROM produit;";
	$res = mysqli_query($link,$query);

	while($val = mysqli_fetch_array($res))
	{
  	$filename = PATH . $val['id_produit'] . '.jpg';
  	if (file_exists($filename))
  	{
	    $addimg = "UPDATE produit
  	             SET image = 1
     	           WHERE id_produit = '" . $val['id_produit'] . "'
      	         LIMIT 1
                 ;";
      mysqli_query($link,$addimg);
		}
	}
	return 0;
}

/* Main */
session_start();
session_name("dicoadmin");
define('PATH', '../../picproduct/');

//require '../include/config.inc.php';
require '../include/connexion.inc.php';
require '../include/createpic.inc.php';


if (!isset($_SESSION['isbn']))
{
  $query = "SELECT id_produit, isbn
						FROM produit
						WHERE isbn <> ''
						AND image = 0";
  $res = mysqli_query($link,$query);
  $i = 0;
  while($val = mysqli_fetch_array($res))
  {
    $_SESSION['isbn'][$i] = $val['isbn'];
    $_SESSION['id_produit'][$i] = $val['id_produit'];
    $i++;
  }
  //On renvoie sur la même page avec le premier identifiant
  redirection(0, count($_SESSION['isbn']));
}
elseif(!isset($_GET['id']))
{
	clean_img_database();
  redirection(0, count($_SESSION['isbn']));
}
else
{
  $isbn = $_SESSION['isbn'][$_GET['id']];
  $id_produit = $_SESSION['id_produit'][$_GET['id']];

  if (is_ISBN($isbn) == 1)
  {

    $isbn = cleanisbn($isbn);

    $url = url_amazon($isbn);
    if (url_exists($url))
      $tab_amazon = file($url);

    $img_amazon =  img_url_amazon($tab_amazon);
    //$titre_amazon = titre_amazon($tab_amazon);

    $url_barnes = url_barnes($isbn);
    if (url_exists($url_barnes))
      $tab_barnes = file($url_barnes);

    //$titre_barnes = titre_barnes($tab_barnes);
    $img_barnes =  img_url_barnes($tab_barnes);

    //if ($titre_amazon)
    // echo "<h2>" . $titre_amazon . "</h2>";

		if ($img_amazon)
    {
      //echo $img_amazon;
      telecharge($img_amazon, PATH . "$id_produit.jpg");
    }
    elseif($img_barnes)
    {
      telecharge($img_barnes, PATH . "$id_produit.jpg");
      // echo $img_barnes;
    }

    if ($img_amazon or $img_barnes)
    {
      $uploaddir = PATH;

      //on génére les miniatures de l'image
      RatioResizeImg($id_produit . ".jpg" , 80, 80,
        $uploaddir, $id_produit . "_icon.jpg");
      RatioResizeImg($id_produit . ".jpg" , 150, 150,
        $uploaddir, $id_produit . "_mini.jpg");
      RatioResizeImg($id_produit . ".jpg" , 400, 400,
        $uploaddir, $id_produit . "_normal.jpg");

      //on passe le bit d'image à 1 pour le produit
      $query = "UPDATE produit
      					SET image = '1'
      					WHERE id_produit = '$id_produit'
      					LIMIT 1;";
      mysqli_query($link,$query);
    }
  }

  $suivant = $_GET['id'] + 1;

  if (count($_SESSION['isbn']) > $suivant - 1)
  {
    redirection($suivant,count($_SESSION['isbn']));
  }
  else
  {
    echo "<h2>Traitement fini</h2>";
  }
}
?>
