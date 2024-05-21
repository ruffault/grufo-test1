<?php
function up_pos($id, $pos)
{
	$sql = 'UPDATE `vitrine`
					SET `pos` = "0"
					WHERE `id_produit` = "' . $id . '"
					LIMIT 1;';
	mysql_query($sql);

	$sql = 'UPDATE `vitrine`
					SET `pos` = "' . $pos . '"
					WHERE `pos` = "' . ($pos - 1) . '"
					LIMIT 1;';
	mysql_query($sql);

	$sql = 'UPDATE `vitrine`
					SET `pos` = "' . ($pos - 1) . '"
					WHERE `pos` = "0"
					LIMIT 1;';
	mysql_query($sql);
}

function down_pos($id, $pos)
{
	$sql = 'UPDATE `vitrine`
					SET `pos` = "0"
					WHERE `pos` = "' . $pos . '"
					LIMIT 1;';
	mysql_query($sql);

	$sql = 'UPDATE `vitrine`
					SET `pos` = "' . $pos . '"
					WHERE `pos` = "' . ($pos + 1)  . '"
					LIMIT 1;';
	mysql_query($sql);

	$sql = 'UPDATE `vitrine`
					SET `pos` = "' . ($pos + 1) . '"
					WHERE `pos` = "0"
					LIMIT 1;';
	mysql_query($sql);
}

function get_pos($id)
{
	$sql = 'SELECT pos
					FROM `vitrine`
					WHERE id_produit = "' . stripslashes($id) . '";';
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	$pos = $val['pos'];
	
	if (isset($pos)) 
		return $pos;
}


if (isset($_GET['id']) && isset($_GET['direction']))
{
	$sql = 'SELECT count(*) as total FROM vitrine;';
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$max = $val['total'];
	$pos = get_pos($_GET['id']);
	$id = stripslashes($_GET['id']);
	$direction = $_GET['direction'];

	if ($direction == 'top' && $pos != 0)
		up_pos($id, $pos);
	elseif ($pos < $max)
		down_pos($id, $pos);
}

function list_vitrine()
{
	$sql = 'SELECT vitrine.id_produit as id,
								 vitrine.pos,
								 produit.nom_fr as nom
					FROM vitrine, produit
					WHERE vitrine.id_produit = produit.id_produit
					ORDER BY vitrine.pos ASC;';
	$res = mysql_query($sql);

	$i = 0;
	while($val = mysql_fetch_assoc($res))
	{
		$tab[$i]['id'] = $val['id'];
		$tab[$i]['pos'] = $val['pos'];
		$tab[$i]['nom'] = $val['nom'];
		$i++;
	}
	return $tab;
}

$vitrine = '';
$tab = list_vitrine();

foreach ($tab as $key => $value)
{
	$vitrine .= '<tr>';
	$vitrine .= '<td scope="row"><a href="index2.php?page=vitrine&pos='.$value['pos'].'&direction=top&id=' . $value['id'] . '">haut</a></td>';
	$vitrine .= '<td scope="row"><a href="index2.php?page=vitrine&pos='.$value['pos'].'&direction=bottom&id=' . $value['id'] . '">bas</a></td>';
	$vitrine .= '<td scope="row">' . $value['nom'] . '<td>';
	$vitrine .= '</tr>';
}


/**Pub et annonces **/

function up_pos_ads($id, $pos)
{
	$sql = 'UPDATE `ads`
					SET `pos` = "0"
					WHERE `id_ads` = "' . $id . '"
					LIMIT 1;';
	mysql_query($sql);

	$sql = 'UPDATE `ads`
					SET `pos` = "' . $pos . '"
					WHERE `pos` = "' . ($pos - 1) . '"
					LIMIT 1;';
	mysql_query($sql);

	$sql = 'UPDATE `ads`
					SET `pos` = "' . ($pos - 1) . '"
					WHERE `pos` = "0"
					LIMIT 1;';
	mysql_query($sql);
}

function down_pos_ads($id, $pos)
{
	$sql = 'UPDATE `ads`
					SET `pos` = "0"
					WHERE `pos` = "' . $pos . '"
					LIMIT 1;';
	mysql_query($sql);

	$sql = 'UPDATE `ads`
					SET `pos` = "' . $pos . '"
					WHERE `pos` = "' . ($pos + 1)  . '"
					LIMIT 1;';
	mysql_query($sql);

	$sql = 'UPDATE `ads`
					SET `pos` = "' . ($pos + 1) . '"
					WHERE `pos` = "0"
					LIMIT 1;';
	mysql_query($sql);
}

function get_pos_ads($id)
{
	$sql = 'SELECT pos
					FROM `ads`
					WHERE id_ads = "' . stripslashes($id) . '";';
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	$pos = $val['pos'];
	
	if (isset($pos)) 
		return $pos;
}

function del_ads($id)
{
	$sql = 'DELETE 
					FROM `ads`
					WHERE id_ads = "' . stripslashes($id) . '";';
	$res = mysql_query($sql);
	
	$sql2 = 'DELETE 
					FROM `advertise`
					WHERE advertise.id = "' . stripslashes($id) . '";';
	$res = mysql_query($sql2);
}

function add_ads($id)
{
	$sql = 'INSERT INTO `advertise` (nom,img)
			VALUES ("'.$nom.'","'.$img.'")';
	$res = mysql_query($sql);
	
	
}

if (isset($_GET['id_ads']) )
{
	$sql = 'SELECT count(*) as total FROM ads;';
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$max = $val['total'];
	$pos = get_pos_ads($_GET['id_ads']);
	$id = stripslashes($_GET['id_ads']);
	if (isset($_GET['direction_ads'])){
		$direction = $_GET['direction_ads'];

		if ($direction == 'top' && $pos != 0)
			up_pos_ads($id, $pos);
		elseif ($pos < $max)
			down_pos_ads($id, $pos);
	}
	if (isset($_GET['option'])){
		if($_GET['option']=="delete"){
			del_ads($id);
		}
		elseif($_GET['option']=="add"){
			$title = $_GET['inputTitle'];
			$description = $_GET['inputDescription'];
			$tmp = explode(".",$_GET['img']);
			$img = $tmp[0];
			add($title,$description,$img);
		}
	}

}

function list_ads()
{
	$sql = 'SELECT ads.id_ads as id,
								 ads.pos,
								 advertise.nom as nom
					FROM ads, advertise
					WHERE ads.id_ads = advertise.id
					ORDER BY ads.pos ASC;';
	$res = mysql_query($sql);

	$i = 0;
	while($val = mysql_fetch_assoc($res))
	{
		$tab[$i]['id'] = $val['id'];
		$tab[$i]['pos'] = $val['pos'];
		$tab[$i]['nom'] = $val['nom'];
		$i++;
	}
	return $tab;
}


$ads = '';
$tab_ads = list_ads();

foreach ($tab_ads as $key_ads => $value)
{
	$ads .= '<tr>';
	$ads .= '<td scope="row"><a href="index2.php?page=vitrine&pos='.$value['pos'].'&direction_ads=top&id_ads=' . $ads['id'] . '">haut</a></td>';
	$ads .= '<td scope="row"><a href="index2.php?page=vitrine&pos='.$value['pos'].'&direction_ads=bottom&id_ads=' . $value['id'] . '">bas</a></td>';
	$ads .= '<td scope="row"><a href="index2.php?page=vitrine&option=delete&id_ads=' . $value['id'] . '">supprimer</a></td>';
	$ads .= '<td scope="row">' . $value['nom'] . '<td>';
	$ads .= '</tr>';
}
/*
if(isset( $_POST['title'], $_POST['description']))
{
	$message="";
	$Limg="";

	$img =substr(strrchr($_FILES['fichier']['name'], '.'),0);
	$extension = ".".strtolower(substr(strrchr($_FILES['fichier']['name'], '.'), 1));


	if (isset($_FILES['fichier'])) $LeFic=trim($_FILES['fichier']['name']);
    	else $LeFic="";
	
	if(  $LeFic!="" )
	{
	  $destination="../../img/";

	  $extensions_ok = array ( ".jpg",".jpeg",".gif",".png");
	  	if (in_array($extension,$extensions_ok))
		{
				$nom = $_POST['title'];
				$description =$_POST['description'];
		
				$stmt = mysql_query("INSERT INTO advertise(nom,description,pos,img) VALUES('$nom' ,'$description' ,0 , '$LeFic')");
);
				if($stmt==true){
					//========= bonne  extention on copie =====
					copy($_FILES['fichier']['tmp_name'],$destination.$LeFic);
				}else{
					echo '<script>window.alert(\'Une erreur s\'est produite lors de la création\'';
				}
		}
	}
}*/

?>
<div id="monthproduct" class="border">
<div style="text-align:left;"><FONT color="#303D72">
<h2>Disposition de la vitrine	</h2>
<table class="table table-bordered">
<tbody>
		<?php echo $vitrine; ?>
</tbody>
</table>
</div>
<div style="text-align:left;"><FONT color="#303D72">
<h2>Disposition des annonces </h2>

<table class="table table-brdered">
<tbody>
		<?php echo $ads; ?>
</tbody>
</table>
</div>
<div style="text-align:left;"><FONT color="#303D72">
<h2>Ajouter une annonce </h2>
		<form name="formulaire" method="POST"  action="index2.php?page=vitrine"  enctype="multipart/form-data" >
	<input name="title" type="text"/>
	<input name="description" type="text"/>
 <input id="fichier1"  name="fichier" type="file"  />
 <input value="Valider" name="submit" type="submit" />
</form>
</div>
</div>
