<?php

function list_mail($limit = 100)
{
	$sql = "SELECT id_mailing, subject, content, signature
					FROM mailing
					ORDER BY id_mailing DESC
					LIMIT $limit;";
	$res = mysql_query($sql);
	
	echo '<table>';
	echo '<tr>';
	echo '<th>Message</th>';
	echo '<th>Cible</th>';
	echo "<th>Date d'envoie <em>(jj/mm/aaaa)</em></th>";
	echo '</tr>';
	while ($val = mysql_fetch_assoc($res))
	{
		echo '<form>';
		echo '<tr>';
		echo '<td>';
		echo "<a href='index2.php";
		echo "?page=list&categ=editmail&id_mailing=".$val['id_mailing']."&mode=edit'>";
		echo '<img src="css/modif.gif" alt="editer" /></a>';
		
		echo "<a href='deletemail.php?id=".$val['id_mailing']."'>";
		echo "<img src='css/bad.gif' alt='supprimer' onclick='return window.confirm(\"Etes vous sur de vouloir supprimer cet email ?\")' /></a>";

		echo substr(htmlentities($val['subject']),0, 40);
		if (strlen($val['subject']) > 40)
		{
			echo '...';
		}
		echo '</td>';
		echo '<td><select name="cible">';
		echo '<option value="all">Tous</option>';
		echo '<option value="en">Anglais</option>';
		echo '<option value="de">Allemand</option>';
		echo '<option value="es">Espagnol</option>';
		echo '<option value="fr">Français</option>';
		echo '<option value="it">Italien</option>';
		echo '</select></td>';
		echo '<td>';
		echo '<input name="categ" type="hidden" value="planing" />';
		echo '<input name="page" type="hidden" value="list" />';
		echo '<input name="id" type="hidden" value="' . $val['id_mailing']. '" />';
		if ($_GET['id'] == $val['id_mailing'])
			echo '<input type="text" name="dateenvoie" value="' . htmlentities($_GET['dateenvoie']). '" size="10">';
		else
			echo '<input type="text" name="dateenvoie" value="" size="10">';
		echo '&nbsp;&nbsp;<input type="submit" name="planifier" value="Envoyer">';
		echo '</td>';
		echo '</tr>';
		echo '</form>';
	}
	echo '</table>';
}


function format_date($date)
{
	list($day, $month, $year) = explode('/', $date);
	$date = "$year/$month/$day";
 
 	if (!preg_match("/^(\d?\d?\d\d)(\/){1}(\d?\d)\\2(\d?\d)(){1}$/", $date, $r)) 
		return FALSE;
	if (($r[1] > 2100) || ($r[1] < 1900))
  	return FALSE;
  if (($r[3] > 12) || ($r[3] < 01))
  	return FALSE;
  if (($r[4] > 31) || ($r[4] < 01))
  	return FALSE;
  if (in_array($r[3], array(2, 4, 6, 9, 10)) && ($r[4] == 31))
  	return FALSE;
  if (($r[3] == 2) && ($r[4] == 30))
  	return FALSE;
  if (!date("L", mktime(0, 0, 0, 1, 1, $r[1])) && ($r[3] == 29))
  	return FALSE;
  return TRUE;
}

function listadress($target = 'all')
{
	$sql = 'SELECT email
					FROM membre
					WHERE mailinglist = 1 ';
	if ($target != 'all')
		$sql .=	" AND aplan = '$target'";
	$sql .= ';';
	$res = mysql_query($sql);
	while ($val = mysql_fetch_assoc($res))
		$email[] = $val['email'];

	return $email;
}

function add_plan($id, $date, $target = 'all')
{
	$tab = listadress($target);
	if (isset($tab))
	{
		foreach ($tab as $key => $email)
		{
			$id = addslashes($id);
			$email = addslashes($email);
			$target = addslashes($target);
			list($day, $month, $year) = explode('/', $date);
			$date = "$year-$month-$day";
			
			$date = addslashes($date);
			
			$sql = "INSERT INTO mailtmp(`id_mailing`, `email`, `senddate`, `target`)
							VALUES ('$id','$email','$date', '$target');";
			mysql_query($sql);
		}
	}
}

function del_plan($id, $date, $target)
{
	$sql = "DELETE FROM `mailtmp`
					WHERE id_mailing = '$id'
					AND senddate = '$date'
					AND target = '$target'
					;";
	mysql_query($sql);
}

function code2target($code)
{
	switch($code)
	{
		case 'en':
			$target = 'Anglais';
			break;		
		case 'fr':
			$target = 'Français';
			break;		
		case 'de':
			$target = 'Allemand';
			break;		
		case 'es':
			$target = 'Espagnol';
			break;		
		case 'it':
			$target = 'Italien';
			break;
		default:
			$target = 'Tous';
			break;
	
	}
	return $target;
}

function listplan()
{
	$sql = "SELECT mailtmp.id_mailing, mailing.subject, mailtmp.senddate, mailtmp.target
					FROM `mailtmp`,`mailing`
					WHERE mailtmp.id_mailing = mailing.id_mailing
					GROUP BY mailtmp.id_mailing, mailtmp.senddate;";
	$res = mysql_query($sql);
	$i = 0;
	while ($val = mysql_fetch_assoc($res))
	{
		$tab[$i]['id'] = $val['id_mailing'];
		$tab[$i]['subject'] = $val['subject'];
		$tab[$i]['senddate'] = $val['senddate'];
		$tab[$i]['target'] = $val['target'];
		$i++;
	}
	return $tab;
}

if (isset($_GET['delete']))
{
	del_plan($_GET['id'], $_GET['date'], $_GET['target']);
}

if (isset($_GET['planifier']))
{
	if (!format_date($_GET['dateenvoie']))
	{
		$message = '<img src="css/bad.gif" alt="" />';
		$message .= "Le format de la date est incorrecte ou cette date n'existe pas.";
	}
	else
	{
		add_plan($_GET['id'], $_GET['dateenvoie'], $_GET['cible']);
		$message = '<img src="css/good.gif" alt="" />';
		$message .= "L'envoie du mail viens d'être planifié pour le ".$_GET['dateenvoie'];
		$_GET['dateenvoie'] = '';
	}
}

?>

<h4>Planifier un envoie</h4>
<?php echo $message; ?>
<?php echo list_mail(); ?>

<?php
	$tabplan = listplan();
	if(isset($tabplan))
	{
?>
<h4>Envois en cours</h4>
<table>
	<tr>
		<th>&nbsp;</th>
		<th>Date d'envoie</th>
		<th>Sujet</th>
		<th>Cible</th>
	</tr>
<?php
		foreach($tabplan as $key => $value)
		{
			echo '<tr>';
			echo '<td>';
			echo '<a href="index2.php?page=list&categ=planing&delete=1&id=';
			echo $tabplan[$key]['id'] . '&date='.$tabplan[$key]['senddate'];
			echo '&target=' . $tabplan[$key]['target'] .'">';
			echo '<img src="css/bad.gif" alt="Supprimer" /></a></td>';
			echo '<td>' . $tabplan[$key]['senddate'] . '</td>';
			echo '<td>' . $tabplan[$key]['subject'] . '</td>';
			echo '<td>' . code2target($tabplan[$key]['target']) . '</td>';
			echo '</tr>';
		}
	}
?>
</table>