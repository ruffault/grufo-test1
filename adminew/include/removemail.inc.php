<h4>Désinscription</h4>

<?php

function exist_email($email)
{
	global $link;
	$sql = "SELECT email
					FROM membre
					WHERE `email` = '$email'
					AND `mailinglist` = '1'
					LIMIT 1
					;";
	$res = mysqli_query($link,$sql);
	if(mysqli_num_rows($res))
		return true;
	else
		return false;
}


function remove_from_list($email)
{
	global $link;
	$sql = "UPDATE `membre`
					SET `mailinglist` = '0'
					WHERE `email` = '$email'
					LIMIT 1;";
	mysqli_query($link,$sql);
}

function remove_from_mailtmp($email)
{
	global $link;
	$sql = "DELETE FROM `mailtmp`
					WHERE `email` = '$email';";
	mysqli_query($link,$sql);
}


if ((isset($_GET['email']) ? $_GET['email'] : '') )
{
	$email = strtolower(trim($_GET['email']));
	if (exist_email($email))
	{
		remove_from_list($email);
		remove_from_mailtmp($email);
		echo "<img src='css/good.gif' alt='' />";
		echo "<strong>L'email a été retiré de la liste de diffusion</strong>";
		$email = '';
	}
	else
	{
		echo "<img src='css/bad.gif' alt='' />";
		echo "<strong>Cet email n'est pas inscrit à la liste de diffusion</strong>";
	}
}

?>

<form method='GET' action='index2.php?page=list&categ=remove'>
	<p>Veuillez saisir l'email à retirer de la liste de distribution :</p>
	<input type="hidden" name="page" value="list" />
	<input type="hidden" name="categ" value="remove" />
	<input type="text" size="40" name="email"
		value="<?php echo htmlentities((isset($email) ? $email : '') ) ; ?>" />
	<input type="submit" value="Désinscrire" />

</form>
