<?php

function save_mail($sujet, $corps, $signature)
{
	$sujet = addslashes($sujet);
	$corps = addslashes($corps);
	$signature = addslashes($signature);

	$sql = "INSERT INTO `mailing` (`subject`, `content`, `signature`)
					VALUES (
									'$sujet',
									'$corps',
									'$signature'
								 );";
	mysql_query($sql);
}

function update_mail($id_mail, $sujet, $corps, $signature)
{
	$sujet = addslashes($sujet);
	$corps = addslashes($corps);
	$signature = addslashes($signature);
	$sql = "UPDATE `mailing`
					SET `subject` = '$sujet',
						`content` = '$corps',
						`signature` = '$signature'
					WHERE `id_mailing` = '$id_mail'
					LIMIT 1;";
	mysql_query($sql);
}

function list_mail($limit = 100)
{
	$sql = "SELECT id_mailing, subject, content, signature
					FROM mailing
					ORDER BY id_mailing DESC
					LIMIT $limit;";
	$res = mysql_query($sql);
	
	while ($val = mysql_fetch_assoc($res))
	{
		echo '<a href="?page=list&categ=editmail&id_mailing='.$val['id_mailing'].'&mode=edit">';
		echo '<img src="css/modif.gif" alt="editer" />';
		echo '</a> ';
		
		echo "<a href='deletemail.php?id=".$val['id_mailing']."&page=edit'>";
		echo "<img src='css/bad.gif' alt='supprimer' onclick='return window.confirm(\"Etes vous sur de vouloir supprimer cet email ?\")' /></a>";
		echo htmlentities($val['subject']) . '<br />';
	}
}


$sujet = htmlentities(trim($_GET['sujet']), ENT_QUOTES);
$corps = htmlentities(trim($_GET['corps']), ENT_QUOTES);
$signature = htmlentities(trim($_GET['signature']), ENT_QUOTES);

if (isset($_GET['id_mailing']) && $_GET['mode'] == 'edit')
{
	$sql = 'SELECT subject, content, signature
					FROM mailing
					WHERE id_mailing = "'.$_GET['id_mailing'].'";';
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	
	$sujet = htmlentities(trim($val['subject']), ENT_QUOTES);
	$corps = htmlentities(trim($val['content']), ENT_QUOTES);
	$signature = htmlentities(trim($val['signature']), ENT_QUOTES);
}
else
{
	$sujet = htmlentities(trim($_GET['sujet']), ENT_QUOTES);
	$corps = htmlentities(trim($_GET['corps']), ENT_QUOTES);
	$signature = htmlentities(trim($_GET['signature']), ENT_QUOTES);
}

if (isset($_GET['savemail']))
{
	$sujet = html_entity_decode($_GET['sujet']);
	$corps = html_entity_decode($_GET['corps']);
	$signature = html_entity_decode($_GET['signature']);
	
	$message = '<img src="css/good.gif" alt="" />';
	if($_GET['id_mailing'] != '')
	{
		update_mail($_GET['id_mailing'], $sujet, $corps, $signature);
		$message .= "Les modifications ont bien �t�s enregistr�s";
	}
	else
	{
		save_mail($sujet, $corps, $signature);
		$message .= "L'email � bien �t� enregistr�";
	}
	$sujet = $corps = $signature = $_GET['id_mailing'] = '';
}

if (isset($_GET['verifmail']))
{
	if (empty($sujet) or empty($corps) or empty($signature))
	{
		$message = '<img src="css/bad.gif" alt="" />';
		$message .= "Tous les champs doivent �tre renseign�s";
	}
	else
	{
		$message .= '<form method="get" action=""><fieldset id="verif">';
		$message .= nl2br("<strong>$sujet</strong>\n\n$corps\n\n");
		$message .= nl2br("<em>-- \n$signature</em>\n\n");
		$message .= "<input type='hidden' name='sujet' value='$sujet' />";
		$message .= "<input type='hidden' name='corps' value='$corps' />";
		$message .= "<input type='hidden' name='signature' value='$signature' />";
		$message .=	"<input type='hidden' name='id_mailing' value='".$_GET['id_mailing']."' />";
		$message .=	"<input type='hidden' name='page' value='list' />";
		$message .= "<input type='hidden' name='categ' value='editmail' />";
		$message .= "<input type='submit' name='savemail' value='Enregistrer' />";
		$message .= '</fieldset></form>';
	}	
}


?>

<h4>R�diger un nouveau mail</h4>

<?php echo $message; ?>

<form id='emailform' method="get" action="">
<fieldset>
	
	<label>Sujet</label>
	<input type="text" name="sujet" value="<?php echo $sujet; ?>" /><br />
	
	<label>Corps</label>
	<textarea id="corps" name="corps"><?php echo $corps; ?></textarea><br />
	
	<label>Signature</label>
	<textarea name="signature"><?php echo $signature; ?></textarea><br />
	<input type="hidden" name="id_mailing" value="<?php echo $_GET['id_mailing']; ?>" />

	<input type="hidden" name="page" value="list" />
	<input type="hidden" name="categ" value="editmail" />

	<input id="submit" type="submit" name="verifmail" value="V�rifier" />
</fieldset>

</form>

<h4> Editer un mail</h4>
<?php

list_mail(10);

?>