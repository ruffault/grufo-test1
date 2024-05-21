<?php

function mail_to_send($date)
{
	$sql = "SELECT id_mailtmp, id_mailing, email
					FROM mailtmp
					WHERE senddate <= '$date'
					LIMIT 25;";
	$res = mysql_query($sql);
	$i = 0;
	while ($val = mysql_fetch_assoc($res))
	{
		$tab[$i]['id_mailtmp'] = $val['id_mailtmp'];
		$tab[$i]['id_mailing'] = $val['id_mailing'];
		$tab[$i]['email'] = $val['email'];
		$i++;
	}
	return $tab;
}

function delete_tmp_message($id)
{
	$sql = "DELETE FROM `mailtmp`
					WHERE id_mailtmp = '$id'
					LIMIT 1;";
	mysql_query($sql);
}

function send_the_mail($id,$email)
{
	$sql = "SELECT subject, content, signature
					FROM mailing
					WHERE id_mailing = '$id';";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);

	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-15\r\n";
	$headers .= "From: Dicoland.com <service-client@dicoland.com>\r\n";

	$to = $email;
	$subject = $val['subject'];
	$message = $val['content'] . "\r\n\r\n-- \r\n" . $val['signature'];
	
	mail($to, $subject, $message, $headers);
}

$today = date('Y-m-d');
$tab = mail_to_send($today);

if (isset($tab))
{
	foreach($tab as $key => $value)
	{
		send_the_mail($tab[$key]['id_mailing'], $tab[$key]['email']);
		delete_tmp_message($tab[$key]['id_mailtmp']);
	}
}

?>