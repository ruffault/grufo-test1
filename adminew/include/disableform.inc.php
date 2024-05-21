<?php

if (isset($_GET['sendform']) && trim($_GET['reason']) == '')
	echo '<strong>Vous devez fournir un motif pour masquer la commande !</strong>';
elseif (isset($_GET['sendform']) && isset($_GET['reason']))
{
	echo '<p>La commande est maintenant masquée.</p>';
	echo "<a href='index2.php?page=viewcommande'>Retourner à la liste des commandes à traiter</a>";
	$sql = "UPDATE commande
				set statut = '8',
				archive = '1',
				motif_disable = '" . addslashes($_GET['reason']) . "'
				WHERE id_commande = '" . $_GET["id_commande"] . "'
				LIMIT 1;";
	mysqli_query($link,$sql);
}

if ((isset($_GET['sendform']) && trim($_GET['reason']) == '') or (!isset($_GET['reason']) && !isset($_GET['sendform'])))
{
?>
	<form method="GET" action="index2.php">
		<fieldset style='border:0px;'>
			<p>Pour quel motif souhaitez-vous masquer cette commande ?</p>
			<input type='hidden' value='disable' name='page' />
			<input type='hidden' value='<?php echo $_GET["id_commande"]; ?>' name='id_commande' />
			<textarea name='reason' cols="50" rows="6"></textarea>
			<br />
			<input type='submit' name='sendform' value='Masquer définitivement' />
		</fieldset>
	</form>
<?php
}
?>
