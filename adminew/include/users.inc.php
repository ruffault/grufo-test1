
<?php

function user_array($query)
{
	global $link;	
	$sql = 'SELECT *
					FROM membre ';

	if (isset($query['searchstr']))
	{
		$parametre = explode(" ", $query['searchstr']);
		$field = explode(",", $query['field']);
		
		foreach ($field as $key => $value)
		{
			$field[$key] = trim($value);
		}
		
		if (count($field) == 1)
		{
			if (count($parametre)==1)
			{
				$sql .= ' WHERE (' . $query['field'] . ' like "%' . $parametre[0] . '%"';
			}
			else //sinon
			{    
				for($i=0; $i < count($parametre); $i++)
				{
					if ($i==0)
						$sql .= ' WHERE (' . $query['field'] . ' like "%' . $parametre[$i] . '%"';
					else
						$sql .= ' OR ' . $query['field'] . ' like "%' . $parametre[$i] . '%"';
				}
			}
			$sql.= ') ';
		}
		else
		{
			if (count($parametre) == 1)
			{
				$i = 0;
				foreach ($field as $key => $value)
				{
					if ($i == 0)
						$sql .= ' WHERE (' . $value . ' like "%' . $parametre[0] . '%"';
					else
						$sql .= ' OR ' . $value . ' like "%' . $parametre[0] . '%"';
					$i++;
				}
				$sql .= ') ';
			}
			else //sinon
			{
				$j = 0;
				foreach ($field as $key => $value)
				{
					for($i = 0; $i < count($parametre); $i++)
					{
						if ($j == 0)
							$sql .= ' WHERE (' . $value . ' like "%' . $parametre[$i] . '%" ';
						else
							$sql .= ' OR ' . $value . ' like "%' . $parametre[$i] . '%" ';
						$j++;
					}
				}
				$sql .= ') ';
			}
		}
	}
	
	if (isset($query['ban']) && count((isset($field) ? $field : '') ) > 0)
	{
		$sql .= ' AND enable = 1 ';
	}
	elseif (isset($query['ban']) && !isset($field))
	{
		$sql .= ' WHERE `enable` = 1 ';
	}

	if (isset($query['orderfield']))
	{
		$sql .= 'ORDER by `' . $query['orderfield'] . '` ';
		if (isset($query['sens']))
		{
			$sql .= ' DESC ';
		}
	}
	else
	{
		$sql .= 'ORDER by inscr_date DESC ';
	}

	if (isset($query['begin']) && isset($query['end']))
	{
		$save_sql = $sql . ';';
		$sql .= 'LIMIT ' . $query['begin'] . ', ' . $query['end'];
	}
	
	$sql .= ';';

	$res = mysqli_query($link,$sql);
	if ($res)
	{	
		$i = 0;
	while($val = mysqli_fetch_array($res ))
	{
		$user[$i]['login'] = utf8_decode($val['login']);
		$user[$i]['civilite'] = utf8_decode($val['civilite']);
	  $user[$i]['id_membre'] = $val['id_membre'];
		$user[$i]['aplan'] = $val['aplan'];
		$user[$i]['inscr_date'] = endate2fr($val['inscr_date']);
		$user[$i]['societe'] = $val['societe'];
		$user[$i]['email'] = $val['email'];
		$user[$i]['nom'] = utf8_decode($val['nom']);
		$user[$i]['prenom'] = utf8_decode($val['prenom']);
		$user[$i]['mailing'] = utf8_decode($val['mailinglist']);
		$user[$i]['totalcmd'] = utf8_decode($val['totalcmd']);
		$user[$i]['ca_ht'] = utf8_decode($val['ca_ht']);
		$user[$i]['enable'] = utf8_decode($val['enable']);
		$i++;
	}
	}
	if (isset($user))
	{
		$res2 = mysqli_query($link,$save_sql);
		$user[0]['nbresult'] = mysqli_num_rows($res2);
	}

	return (isset($user) ? $user : '') ;
}

$urlstr = '';
$nbperpage = 50;

if (isset($_GET['begin']))
{
	$query['begin'] = $_GET['begin'];
}
else
{
	$query['begin'] = 0;
}

$query['end'] = $nbperpage;

if (isset($_GET['orderfield']))
{
	$query['orderfield'] = $_GET['orderfield'];
}

if (isset($_GET['sens']))
{
	$query['sens'] = $_GET['sens'];
}
else
	$urlstr .= '&amp;sens=1';


if (isset($_GET['qstr']))
{
	$query['searchstr'] = $_GET['qstr'];
	$query['field'] = 'prenom, nom, login';
	$urlstr .= '&amp;qstr=' . $_GET['qstr'];
}

if(!isset($_GET['ban']))
	$query['ban'] = 1;

$user = user_array($query);

echo '<form action="index2.php" method="get" id="search">';


echo '<div class=" col-md-4">';
echo '<div class="form-group">';
echo '<label for="qstr">Rechercher</label> ';
if(isset($_GET['qstr']))
	echo '<input type="text" class="form-control" name="qstr" value="' . htmlentities($_GET['qstr']) . '" id="qstr" />';
else
	echo '<input type="text" class="form-control" name="qstr" value="" id="qstr" />';
echo '<input type="hidden" name="page" value="users" />';
echo '<input type="submit" class="btn btn-info" name="" value="Rechercher" />';

if(isset($_GET['qstr']))
	echo ' <a href="index2.php?page=users" title="Voir tout"><img src="css/clear.gif" alt="Voir tout" /></a> |';

$urlstr2 = '';

if (isset($_GET['qstr']))
	$urlstr2 .= '&amp;qstr=' . $_GET['qstr'];

if (isset($_GET['orderfield']))
	$urlstr2 .= '&amp;orderfield=' . $_GET['orderfield'];
if (isset($_GET['sens']))
	$urlstr2 .= '&amp;sens=1';

if(!isset($_GET['ban']))
{
	echo ' <a href="index2.php?page=users&amp;ban=1' . $urlstr2 . '" title="Afficher les utilisateurs bannis"><img src="css/show.gif" alt="Afficher les utilisateurs bannis" /></a>';
}
else
{
	echo ' <a href="index2.php?page=users' . $urlstr2 . '" title="Masquer les utilisateurs bannis"><img src="css/hide.gif" alt="Masquer les utilisateurs bannis" /></a>';
	$urlstr .= '&amp;ban=1';
}
echo '</div>';
echo '</div>';
echo '</form>';

if (isset($user) && ($user))
{
	if (isset($_GET['qstr']) && $user[0]['nbresult'] > 1)
	{
		echo '<p>' . $user[0]['nbresult'] . ' membres correspondent à  la recherche</p>';
	}
	else
	{
		echo '<p>' . $user[0]['nbresult'] . ' membres</p>';
	}
}
else
{
	echo '<p>Aucun membre ne correspond à la recherche</p>';
}

echo "<div><a href=\"export_membres.php\" target=\"_blank\"><img src=\"css/picto_excel.gif\" border=\"0\"> Exporter les coordonnées des membres.</a></div>";

echo '<table id="users">
			<tr>
				<th><a href="index2.php?page=users&amp;orderfield=inscr_date' . $urlstr . '">Inscription</a></th>
				<th><a href="index2.php?page=users&amp;orderfield=enable' . $urlstr . '">Statut</a></th>
				<th><a href="index2.php?page=users&amp;orderfield=login' . $urlstr . '">Login</a></th>
				<th><a href="index2.php?page=users&amp;orderfield=aplan' . $urlstr . '">Langue</a></th>
				<th>Infos</th>
				<th><a href="index2.php?page=users&amp;orderfield=nom' . $urlstr . '">Nom</a></th>
				<th><a href="index2.php?page=users&amp;orderfield=prenom' . $urlstr . '">Prénom</a></th>
				<th><a href="index2.php?page=users&amp;orderfield=totalcmd' . $urlstr . '">Nb Cde</a></th>
				<th><a href="index2.php?page=users&amp;orderfield=ca_ht' . $urlstr . '">CA HT</a></th>
				<th>&nbsp;</th>
			</tr>';

if(isset($user) && ($user))
{
	foreach ($user as $key => $value)
	{
		if ($key%2 == 0)
			echo "<tr class='selected'>";
		else
			echo '<tr>';
		echo '<td>' . $user[$key]['inscr_date'] . '</td>';
		echo '<td>';
	
		if ($user[$key]['enable'] == 1)
		{
			echo '<a href="disableuser.php?&amp;id_user=' . $user[$key]['id_membre'] . '&amp;type=remove" title="Désactiver le compte" ';
			echo "onclick='return window.confirm(\"Etes-vous sur de vouloir désactiver ce compte ?\")'>";
			echo '<img src="css/enable.gif" alt="Désactiver le compte" />';
			echo '</a>';
		}
		else
		{
			echo '<a href="disableuser.php?&amp;id_user=' . $user[$key]['id_membre'] . '&amp;type=add" title="Activer le compte" ';
			echo "onclick='return window.confirm(\"Etes-vous sur de vouloir activer ce compte ?\")'>";
			echo '<img src="css/disable.gif" alt="Activer le compte" />';
			echo '</a>';
		}
		echo '</td>';
	
		echo '<td>' . ucfirst(strtolower(substr($user[$key]['login'],0,12))) . '</td>';
		echo '<td><img src="css/flag_' . $user[$key]['aplan'] . '.gif" ';
		echo 'title="Parle ' . convert_lang($user[$key]['aplan']) . '" alt="" />';
		
		echo '</td>';
		echo '<td>';
		if ($user[$key]['civilite'] == 1)
			echo '<img src="css/man.gif" alt="Homme" title="Homme" /> ';
		if ($user[$key]['civilite'] == 2 or $user[$key]['civilite'] == 3)
			echo '<img src="css/women.gif" alt="Femme" title="Femme" /> ';
	
		if ($user[$key]['societe'] == 1)
			echo '<img src="css/societe.gif" alt="Société" title="Société" /> ';
		else
			echo '<img src="css/trans.gif" alt="" /> ';
		if ($user[$key]['mailing'] == 1)
			echo '<img src="css/mailing2.gif" alt="Inscrit à la liste de diffusion" title="Inscrit à la liste de diffusion" /> ';
		else
			echo '<img src="css/trans.gif" alt="" /> ';
		echo '</td>';
		echo "<td>" . ucfirst(strtolower(substr($user[$key]['nom'],0, 12))) . "</td>";
		echo "<td>" . ucfirst(strtolower(substr($user[$key]['prenom'],0, 12))) . "</td>";
		if ($user[$key]['totalcmd'] == 0)
			echo "<td>-</td>";
		else
			echo "<td>" . $user[$key]['totalcmd'] . "</td>";
		if ($user[$key]['ca_ht'] == 0)
			echo "<td>-</td>";
		else
			echo "<td>" . $user[$key]['ca_ht'] . "</td>";
		echo "<td><a href='index2.php?page=detailuser&amp;id_membre="
			. $user[$key]['id_membre'] . "' class='lienarchive'><img src='css/user2.gif' alt='Détail' /></a></td>";
		echo "</tr>";
	}
	echo '</table>';
	
	echo '<p id="nbpage2">';
	if (isset($user) && ($user))
	{
		if (count($user) < $user[0]['nbresult'])
		{
			$nbpage = $user[0]['nbresult'] / $nbperpage;
			$currentpos = $nbpage - round(($user[0]['nbresult'] - $query['begin']) / $nbperpage);
			if (isset($_GET['orderfield']))
				$urlstr .= '&amp;orderfield=' . $_GET['orderfield'];
			if (isset($_GET['sens']))
				$urlstr .= '&amp;sens=1';
	
			for ($i = 0; $i < $nbpage; $i++)
			{
				echo '<a href="index2.php?page=users&amp;begin=' . ($i * $nbperpage) . $urlstr . '">' . ($i + 1) . '</a>';
				if ($i < ($nbpage - 1))
					echo ' - ';
			} 
			if (!isset($_GET['pos']))
			{
			
			}
		}
	}
	echo '</p>';
}


?>
