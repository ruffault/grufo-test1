<?php

function referer_id($name)
{
	$sql = "SELECT id_referer as id
					FROM referer
					WHERE name = '$name'
					LIMIT 1
					;";
	$res = mysql_query($sql);
	$val = mysql_fetch_assoc($res);
	if(isset($val))
		return ($val['id']);
}

function insert_referer($name)
{
	$sql = "INSERT INTO `referer`(`name`)
					VALUES ('$name');";
	mysql_query($sql);
}

function all_referer()
{
	$sql = 'select referant, left(date,10) as date from log
					where referant not like "http://www.dicoland.com%"
					and referant not like "http://dicoland.com%"
					and referant not like "http://localhost%"
					and referant like "http://%"
					group by referant
					;';
	$res = mysql_query($sql);
	while($val = mysql_fetch_assoc($res))
	{
		$url = $val['referant'];
		preg_match("/^(http:\/\/)?([^\/]+)/i", $url, $matches);
		$host = $matches[2];
		preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
		$plop = ereg_replace('[0-9\.\:]*','',$matches[0]) != '';
		if($plop != '')
		{
			if(ereg_replace('.*:[0-9]*','',$matches[0]) != '')
			{
				$id = referer_id($matches[0]);
				if (!isset($id))
					insert_referer($matches[0]);
			}
		}
	}
}

all_referer();

?>
