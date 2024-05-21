<?php

if (isset($_GET['id_mail']))
{
	$id_mail = $_GET['id_mail'];
}

$mail = give_mail($id_mail);

$date = substr($mail['date_corres'],6,2);
$date .= '/' . substr($mail['date_corres'],4,2);
$date .= '/' . substr($mail['date_corres'],0,4);
$date .= ' à ' . substr($mail['date_corres'],8,2);
$date .= ':' . substr($mail['date_corres'],10,2);

?>
<div id="showmail">
	<table>
		<tr>
			<td class="col1">Sujet : </td>
			<td><strong><?php echo htmlentities($mail['subject']); ?></strong></td>
		</tr>
		<tr>
			<td class="col1">De : </td>
			<td><?php echo $mail['sender']; ?></td>
		</tr>
		<tr>
			<td class="col1">Pour : </td>
			<td><?php echo $mail['recipient']; ?></td>
		</tr>
		<tr>
			<td class="col1">Date : </td>
			<td><?php echo $date; ?></td>
		</tr>
	</table>
	<div id="mailcontent">
		<pre><?php echo htmlentities($mail['content']); ?></pre>
	</div>
	<a href="index2.php?page=order&amp;id_order=<?php echo $mail['id_order']; ?>">Retour</a>
</div>