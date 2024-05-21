<?php
###########################################################################
##                      -=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-               ##
##                      XT-DUMP v 0.7 :  Mysql Dump System               ##
##                      -=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-               ##
##                                                                       ##
## -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- ##
##                                                                       ##
##     Copyright (c) 2001-2003 by DreaXTeam (webmaster@dreaxteam.net)    ##
##                          http://dreaxteam.net                         ##
##                                                                       ##
## This program is free software. You can redistribute it and/or modify  ##
## it under the terms of the GNU General Public License as published by  ##
## the Free Software Foundation.                                         ##
###########################################################################

/*
  SECURISATION DES PARAMETRES DE CONNEXION

 Modifiez ci-dessous le nom du fichier de sauvegarde des parametres de connexion afin de sécuriser vos données
 il est fortement recomandé de mettre un extension ".php" ou ".php3" afin de rendre ce fichier illisible par un
 tiers depuis internet.

	----------
  
   SAVING THE CONNECTION PARAMETERS
   
 Modify below the name of the file for saving the connection parameters after obtaining the data.
 It is strongly recommended that you include the extension ".php" or ".php3" to render the file unreadable 
 from the Internet.

  NE PLUS MODIFIER LE FICHIER EN DESSOUS DE CETTE LIGNE (Sauf si vous savez ce que vous faites ;) )
  DO NOT MODIFY THE FILE BELOW THIS LINE (unless you know what you're doing ;)).
*/

@set_time_limit(600);




if (isset($_POST['tbls']))
{
	$tbls   = $_POST['tbls'];
}
else
{
	$tbls   = '';
}

if (isset($_POST['action']))
{
	$action = $_POST['action'];
}
else
{
  $action = 'connect';
}

if (isset($_POST['secu']))
{
	$secu   = $_POST['secu'];
}
else
{
	$secu   = '';
}

if (isset($_POST['f_cut']))
{
	$f_cut   = $_POST['f_cut'];
}
else
{
	$f_cut = '';
}
if (isset($_POST['fz_max']))
{
	$fz_max   = $_POST['fz_max'];
}
else
{
	$fz_max   = '';
}
if (isset($_POST['opt']))
{
	$opt   = $_POST['opt'];
}
else
{
	$opt = '';
}
if (isset($_POST['savmode']))
{
	$savmode   = $_POST['savmode'];
}
else
{
	$savmode = '';
}
if (isset($_POST['file_type']))
{
	$file_type   = $_POST['file_type'];
}
else
{
	$file_type = '';
}
if (isset($_POST['ecraz']))
{
	$ecraz   = $_POST['ecraz'];
}
else
{
	$ecraz = '';
}
if (isset($_POST['f_tbl']))
{
	$f_tbl = $_POST['f_tbl'];
}
else
{
	$f_tbl = '';
}
if (isset($_POST['drp_tbl']))
{
	$drp_tbl = $_POST['drp_tbl'];
}
else
{
	$drp_tbl = '';
}


/* Fonction retournant la date et l'heure actuelle - Actualy time function */

function aff_date()
{
	$date_now = date("F j, Y, g:i a");
	return $date_now;
}

/* Fonction de sauvegarde en mode Sql - Sql data dump function */

function sqldumptable($table)
{
	global $sv_s,$sv_d,$drp_tbl;
	
		global $link;
	if ($sv_s)
	{
		if ($drp_tbl)
		{
			$tabledump = "DROP TABLE IF EXISTS $table;\n";
		}
		$tabledump .= "CREATE TABLE $table (\n";
		
		$firstfield=1;
		
		$champs = mysqli_query($link,"SHOW FIELDS FROM $table");
		
		while ($champ = mysqli_fetch_array($champs))
		{
			if (!$firstfield)
			{
				$tabledump .= ",\n";
			}
			else
			{
				$firstfield=0;
			}
			
			$tabledump .= "   $champ[Field] $champ[Type]";
			
			if ($champ['Null'] != "YES")
			{
				$tabledump .= " NOT NULL";
			}
			
			if (!empty($champ['Default']))
			{
				$tabledump .= " default '$champ[Default]'";
			}
			
			if ($champ['Extra'] != "")
			{
				$tabledump .= " $champ[Extra]";
			}
		}
		
		@mysqli_free_result($champs);
		
		$keys = mysqli_query($link,"SHOW KEYS FROM $table");
		
		while ($key = mysqli_fetch_array($keys))
		{
			$kname=$key['Key_name'];
			if ($kname != "PRIMARY" and $key['Non_unique'] == 0)
			{
				$kname="UNIQUE|$kname";
			}
			if(isset($index) && !is_array($index[$kname]))
			{
				$index[$kname] = array();
			}
			$index[$kname][] = $key['Column_name'];
		}
		
		@mysqli_free_result($keys);
		
		while(list($kname, $columns) = @each($index))
		{
			$tabledump .= ",\n";
			$colnames=implode($columns,",");
			
			if($kname == "PRIMARY")
			{
				$tabledump .= "   PRIMARY KEY ($colnames)";
			}
			else
			{
				if (substr($kname,0,6) == "UNIQUE")
				{
					$kname=substr($kname,7);
				}
			
				$tabledump .= "   KEY $kname ($colnames)";
			
			}
		}
	
		$tabledump .= "\n);\n\n";
	}
	
	
	// Données - Data
	
	if ($sv_d)
	{
		$rows = mysqli_query($link,"SELECT * FROM $table");
		$numfields = mysqli_num_fields($rows);
	
		while ($row = mysqli_fetch_array($rows))
		{
			$tabledump .= "INSERT INTO $table VALUES(";
		
			$cptchamp=-1;
			$firstfield=1;

			while (++$cptchamp<$numfields)
			{
				if (!$firstfield)
				{
					$tabledump.=",";
				} 
				else
				{
					$firstfield=0;
				}
		
				if (!isset($row[$cptchamp]))
				{
					$tabledump .= "NULL";
				}
				else
				{
					$tabledump .= "'".mysqli_real_escape_string($link,$row[$cptchamp])."'";
				}
			}
		
			$tabledump .= ");\n";
		}
		
		@mysqli_free_result($rows);
	}
	return $tabledump;
}

/* Fonction de sauvegarde en mode CSV - CSV data dump function */

function csvdumptable($table)
{
		global $link;
	global $sv_s,$sv_d;
	
	$csvdump =  "## Table : $table \n\n";
	
	if ($sv_s)
	{
		$firstfield=1;
		$champs = mysqli_query($link,"SHOW FIELDS FROM $table");
		while ($champ = mysqli_fetch_array($champs))
		{
			if (!$firstfield)
			{
				$csvdump.= ",";
			}
			else
			{
				$firstfield=0;
			}
			$csvdump.= "'" . $champ[Field] . "'";
		}
		@mysqli_free_result($champs);
		$csvdump.="\n";
	}
	
	
	// Données - Data
	if ($sv_d)
	{
		$rows = mysqli_query($link,"SELECT * FROM $table");
		$numfields=mysqli_num_fields($rows);
		while ($row = mysqli_fetch_array($rows))
		{
			$cptchamp=-1;
			$firstfield=1;
			while (++$cptchamp<$numfields)
			{
				if (!$firstfield)
				{
					$csvdump.=",";
				}
				else
				{
					$firstfield=0;
				}
				if (!isset($row[$cptchamp]))
				{
					$csvdump .= "NULL";
				}
				else
				{
					$csvdump .= "'" . addslashes($row[$cptchamp]) . "'";
				}
			}
			$csvdump .= "\n";
		}
	}
	@mysqli_free_result($rows);
	return $csvdump;
}


/* Ecrire dans le fichier de sauvegarde - Write into the backup file */

function write_file($data)
{
	global $g_fp,$file_type;
	if ($file_type == 1)
	{
		gzwrite ($g_fp,$data);
	}
	else
	{
		fwrite ($g_fp,$data);
	}
}

/* Ouvrir le fichier de sauvegarde - Open the backup file */

function open_file($file_name)
{
	global $g_fp,$file_type,$bdd,$f_nm;
	if ($file_type == 1)
	{
		$g_fp = gzopen($file_name,"wb9");
	}
	else
	{
		$g_fp = fopen ($file_name,"w");
	}
	$f_nm[] = $file_name;
	$data = "";
	$data .= "##\n";
	$data .= "## Réalisé avec XT-Dump \n";
	$data .= "## http://dreaxteam.net \n";
	$data .= "## ------------------------- \n";
	$data .= "## Date : " . aff_date() . "\n";
	$data .= "## Base : $bdd \n";
	$data .= "## -------------------------\n\n";

	write_file($data);
	unset($data);
}

/* Renvoie la taille actuelle du fichier */

function file_pos()
{
	global $g_fp,$file_type;
	
	if ($file_type == "1")
	{
		return gztell ($g_fp);
	}
	else
	{
		return ftell ($g_fp);
	}
}

/* Fermer le fichier de sauvegarde - Close the backup file */

function close_file()
{
	global $g_fp,$file_type;
	
	if ($file_type == "1")
	{
		gzclose ($g_fp);
	}
	else
	{
		fclose ($g_fp);
	}
}

/* ----------------------- */

function split_sql_file($sql)
{
	$morc = explode(";", $sql);

	$sql = "";
	$output = array();
	$matches = array();
	$morc_cpt = count($morc);
	for ($i = 0; $i < $morc_cpt; $i++)
	{
		if (($i != ($morc_cpt - 1)) || (strlen($morc[$i] > 0)))
		{
			$total_quotes = preg_match_all("/'/", $morc[$i], $matches);
			$escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $morc[$i], $matches);
			$unescaped_quotes = $total_quotes - $escaped_quotes;
			
			if (($unescaped_quotes % 2) == 0)
			{
				$output[] = $morc[$i];
				$morc[$i] = "";
			}
			else
			{
				$temp = $morc[$i] . ";";
				$morc[$i] = "";
				$complete_stmt = false;
				
				for ($j = $i + 1; (!$complete_stmt && ($j < $morc_cpt)); $j++)
				{
					$total_quotes = preg_match_all("/'/", $morc[$j], $matches);
					$escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $morc[$j], $matches);
			
					$unescaped_quotes = $total_quotes - $escaped_quotes;
					
					if (($unescaped_quotes % 2) == 1)
					{
						$output[] = $temp . $morc[$j];

						$morc[$j] = "";
						$temp = "";
						
						$complete_stmt = true;
						$i = $j;
					}
					else
					{
						$temp .= $morc[$j] . ";";
						$morc[$j] = "";
					}
					
				}
			}
		}
	}
	return $output;
}

function split_csv_file($csv)
{
	return explode("\n", $csv);
}

/* Header */

$header = "
<style>
.link:hover {
	TEXT-DECORATION: underline
	}
.link {
	font: italic 8pt;
	font-family: verdana;
	TEXT-DECORATION: none;
	color: #000066
}
.texte {
	font: 8pt;
	font-family: verdana;
}
.form {
	font-family: verdana;
	font-size: 10px;
	font-weight: normal;
	color: #16246C;
	text-decoration: none;
	background-color: #FFFFFF;
	border-bottom-color: #666666;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-left-color: #666666;
	border-right-color: #666666;
	border-right-width: 1px;
	border-top-color: #666666;
	border-top-width: 1px;
}

BODY {
	scrollbar-face-color: #CFE3E3;
	scrollbar-shadow-color: #ABD5D5;
	scrollbar-highlight-color: #ABD5D5;
	scrollbar-3dlight-color: #2D7DA7;
	scrollbar-darkshadow-color: #2D7DA7;
	scrollbar-track-color: #CFE3E3;
	scrollbar-arrow-color: #ABD5D5
}
		  
#infobull {
	position: absolute;
	z-index: 1000;
	top: 0px;
	left: 0px;
	width: 200px;
}
DIV.infobullDIV {
	width: 200px;
	padding: 2px;
	background: yellow;
	border: 1px solid black;
	color: black;
	font-family: Arial,Helvetica;
	font-style: Normal;
	font-weight: Normal;
	font-size: 12px;
	line-height: 14px;
}
</style>
<div class='commande'>
";
	
	
	
/* Footer */ 

$footer = '</div>';

/* Mode Sauvegarde de la Base - Data Save Mode */

if ($action == 'save')
{
	if ($secu == 1)
	{
		$fp = fopen($secu_config, "w");
		fputs($fp,"<?php\n");
		fputs($fp,"\$host = '$host';\n");
		fputs($fp,"\$bdd = '$bdd';\n");
		fputs($fp,"\$user = '$user';\n");
		fputs($fp,"\$pass = '$pass';\n");
		fputs($fp,"?>");
		fclose($fp);
	}

	if (!is_array($tbls))
	{
		echo $header . "<br><center><font color=red><b>Aucune Table n'a été sélectionnée pour la sauvegarde<br>Veuillez 'AU MOINS' en sélectionnez une :)</b></font></center>\n$footer";
		exit;
	}

	if($f_cut == 1)
	{
		if (!is_numeric($fz_max))
		{
			echo $header . "<br><center><font color=red><b>Veuillez choisir une valeur numérique à la taille du fichier à scinder.</b></font></center>\n$footer";
			exit;
		}
		if ($fz_max < 200000)
		{
			echo $header . "<br><center><font color=red><b>Veuillez choisir une taille de fichier a scinder supérieure à 200 000 Octets.</b></font></center>\n$footer";
			exit;
		}
	}
	
	/* Linearisation du tableau */
	
	$tbl = array();
	
	$tbl[] = reset($tbls);
	
	if (count($tbls) > 1)
	{
		$a = true;
		while ($a != false)
		{
			$a = next($tbls);
			if ($a != false)
			{
				$tbl[] = $a;
			}
		}
	}
	

	/* Gestion des Options de sauvegarde */
	
	if ($opt == 1)
	{
		$sv_s = true;
		$sv_d = true;
	}
	else if ($opt == 2)
	{
		$sv_s = true;
		$sv_d = false;
		$fc   = "_struct";
	}
	else if ($opt == 3)
	{
		$sv_s = false;
		$sv_d = true;
		$fc   = "_data";
	}
	else
	{
		exit;
	}

	
	$fext = "." . $savmode;
if(isset($fc))
{
}
else
{
	$fc = '';
}
$fich = $bdd . $fc . $fext;
	
	/* Ecrazer ou non le fichier */
	
	$dte = "";
	if ($ecraz != 1)
	{
		$dte = date("dMy_Hi")."_";
	}
	
	$gz = "";
	if ($file_type == '1')
	{
		$gz .= ".gz";
	}
	
	$fcut = false;
	$ftbl = false;
	
	$f_nm = array();
	
	if($f_cut == 1)
	{
		$fcut = true;
		$fz_max = $fz_max;
		$nbf = 1;
		$f_size = 170;
	}
	if ($f_tbl == 1)
	{
		$ftbl = true;
	}
	else
	{
		if (!$fcut)
		{
			open_file("dump_".$dte.$bdd.$fc.$fext.$gz);
		}
		else
		{
			open_file("dump_".$dte.$bdd.$fc."_1".$fext.$gz);
		}
	}
	$nbf = 1;
//modification G. Ruffault le 11/10/20 pour passage mysqli	
	$link=mysqli_connect($host,$user,$pass,$bdd);
//	mysql_select_db($bdd);
	if ($fext == ".sql")
	{
		
		if ($ftbl)
		{
			while (list($i) = each($tbl))
			{
				
				$temp = sqldumptable($tbl[$i]);
				$sz_t = strlen($temp);
				if ($fcut)
				{
					open_file("dump_".$dte.$tbl[$i].$fc.".sql".$gz);
					$nbf = 0;
					$p_sql = split_sql_file($temp);
					while(list($j,$val) = each($p_sql))
					{
						if ((file_pos() + 6 + strlen($val)) < $fz_max)
						{
							write_file($val . ";");
						}
						else
						{
							close_file();
							$nbf++;
							open_file("dump_".$dte.$tbl[$i].$fc."_".$nbf.".sql".$gz);
							write_file($val . ";");
						}
					}
					close_file();
				}
				else
				{
					open_file("dump_".$dte.$tbl[$i].$fc.".sql".$gz);
					write_file($temp ."\n\n");
					close_file();
					$nbf = 1;
				}
				$tblsv = $tblsv . "<b>" . $tbl[$i] . "</b> , ";
			}
		}
		else
		{
			while (list($i) = each($tbl))
			{
				
				$temp = sqldumptable($tbl[$i]);
				$sz_t = strlen($temp);
				if ($fcut && ((file_pos() + $sz_t) > $fz_max))
				{
					$p_sql = split_sql_file($temp);
					while(list($j,$val) = each($p_sql))
					{
						if ((file_pos() + 6 + strlen($val)) < $fz_max)
						{
							write_file($val . ";");
						}
						else
						{
							close_file();
							$nbf++;
							open_file("dump_".$dte.$bdd.$fc."_".$nbf.".sql".$gz);
							write_file($val . ";");
						}
					}
				}
				else
				{
					write_file($temp);
				}
				if(isset($tblsv))
				{
				}
				else
				{
					$tblsv = '';
				}
				$tblsv = $tblsv . "<b>" . $tbl[$i] . "</b> , ";

			}
		}
	}
	else if ($fext == ".csv")
	{
		if ($ftbl)
		{
			while (list($i) = each($tbl))
			{
				
				$temp = csvdumptable($tbl[$i]);
				$sz_t = strlen($temp);
				if ($fcut)
				{
					open_file("dump_".$dte.$tbl[$i].$fc.".csv".$gz);
					$nbf = 0;
					$p_csv = split_csv_file($temp);
					while(list($j,$val) = each($p_csv))
					{
						if ((file_pos() + 6 + strlen($val)) < $fz_max)
						{
							write_file($val . "\n");
						}
						else
						{
							close_file();
							$nbf++;
							open_file("dump_".$dte.$tbl[$i].$fc."_".$nbf.".csv".$gz);
							write_file($val . "\n");
						}
					}
					close_file();
				}
				else
				{
					open_file("dump_".$dte.$tbl[$i].$fc.".csv".$gz);
					write_file($temp ."\n\n");
					close_file();
					$nbf = 1;
				}
				$tblsv = $tblsv . "<b>" . $tbl[$i] . "</b> , ";
			}
		}
		else
		{
			while (list($i) = each($tbl))
			{
				
				$temp = csvdumptable($tbl[$i]);
				$sz_t = strlen($temp);
				if ($fcut && ((file_pos() + $sz_t) > $fz_max))
				{
					$p_csv = split_sql_file($temp);
					while(list($j,$val) = each($p_csv))
					{
						if ((file_pos() + 6 + strlen($val)) < $fz_max)
						{
							write_file($val . "\n");
						}
						else
						{
							close_file();
							$nbf++;
							open_file("dump_".$dte.$bdd.$fc."_".$nbf.".csv".$gz);
							write_file($val . "\n");
						}
					}
				}
				else
				{
					write_file($temp);
				}
				$tblsv = $tblsv . "<b>" . $tbl[$i] . "</b> , ";
			}
		}
	}
	mysqli_close($link);
	if (!$ftbl)
	{
		close_file();
	}
	echo $header;
	echo "<br><center>Les Tables ".$tblsv." ont été sauvées dans les fichiers suivants :<br><br></center>
	<table border='0' align='center' cellpadding='0' cellspacing='0'>
	<col width=1 bgcolor='#2D7DA7'>
	<col valign=center>
	<col width=1 bgcolor='#2D7DA7'>
	<col valign=center align=right>
	<col width=1 bgcolor='#2D7DA7'>
	<tr>
		<td bgcolor='#2D7DA7' colspan=5></td>
	</tr>
	<tr>
		<td></td>
		<td bgcolor='#338CBD' align=center class=texte><font size=1><b>Nom</b></font></td>
		<td></td>
		<td bgcolor='#338CBD' align=center class=texte><font size=1><b>Taille</b></font></td>
		<td></td>
	</tr>
	<tr>
		<td bgcolor='#2D7DA7' colspan=5></td>
	</tr>";
	reset($f_nm);
	while (list($i,$val) = each($f_nm))
	{
		$coul = '#99CCCC';
		if ($i % 2)
		{
			$coul = '#CFE3E3';
		}
		echo "<tr>
		<td></td>
		<td bgcolor=".$coul." class=texte>&nbsp;<a href='".$val."' class=link target='_blank'>".$val."&nbsp;</a></td>
		<td></td>";
		$fz_tmp = filesize($val);
		if ($fcut && ($fz_tmp > $fz_max))
		{
			echo "<td bgcolor=".$coul." class=texte>&nbsp;<font size=1 color=red>".$fz_tmp." Octets</font>&nbsp;</td><td></td></tr>";
		}
		else
		{
			echo "<td bgcolor=".$coul." class=texte>&nbsp;<font size=1>".$fz_tmp." Octets</font>&nbsp;</td><td></td></tr>";
		}
		echo "<tr><td bgcolor='#2D7DA7' colspan=5></td></tr>";
	}
	echo "</table><br>";
	echo $footer;
	exit;
}

if ($action == 'connect')
{
	/* Vérification des paramètres de connexion */
	/* Check connection parameters */
	
	if(!@mysqli_connect($host,$user,$pass,$bdd))
	{
		echo $header . "<br><center><font color=red><b>La Connexion a la Base de Donnée a échouée,<br>Veuillez vérifier les parametres de connexion</b></font></center>\n$footer";
		exit;
	}
/*	
	if(!@mysql_select_db($bdd))
	{
		echo $header . "<br><center><font color=red><b>La Base de Donnée que vous avez sélectionné, n'existe pas.<br>Veuillez vérifier les parametres de connexion</b></font></center>\n$footer";
		exit;
	}
 */
	if ($secu == 1)
	{
		if (!file_exists($secu_config))
		{
			$fp = fopen($secu_config, "w");
			fputs($fp,"<?php\n");
			fputs($fp,"\$host = '$host';\n");
			fputs($fp,"\$bdd = '$bdd';\n");
			fputs($fp,"\$user = '$user';\n");
			fputs($fp,"\$pass = '$pass';\n");
			fputs($fp,"?>");
			fclose($fp);
		}
		
		include($secu_config);

	}
	else /* On utilise pas le fichier de sauvegarde //  If not using a save-config file */
	{
		if (isset($secu_config) && file_exists($secu_config))
		{
			unlink($secu_config);
		}
	}

	$link = mysqli_connect($host,$user,$pass,$bdd);
	$tables = mysqli_list_tables ($bdd);
	$nb_tbl = mysqli_num_rows ($tables);
	
	echo $header . "
	<script language='javascript'>
	function checkall()
	{
		var i = 0;
	
		while (i < $nb_tbl)
		{
			a = 'tbls[' + i + ']';
			document.formu.elements[a].checked = true;
			i = i+1;
		}
	
	}

	function decheckall()
	{
		var i = 0;
	
		while (i < $nb_tbl)
		{
			a = 'tbls[' + i + ']';
			document.formu.elements[a].checked = false;
			i = i+1;
		}
	
	}
	</script>
	<SCRIPT LANGUAGE='Javascript1.2'>
	IE4 = (document.all) ? 1 : 0;
	NS4 = (document.layers) ? 1 : 0;
	VERSION4 = (IE4 | NS4) ? 1 : 0;
	if (!VERSION4) event = null;
	
	function BullGetOffset(obj, coord)
	{
		var val = obj['offset'+coord] ;
		if (coord == 'Top') val += obj.offsetHeight;
		while ((obj = obj.offsetParent )!=null)
		{
			val += obj['offset'+coord];
			if (obj.border && obj.border != 0) val++;
		}
		return val;
	}
	
	function BullDown ()
	{
		if (IE4) document.all.infobull.style.visibility = 'hidden';
		if (NS4) document.infobull.visibility = 'hidden';
	}
	
	function BullOver (event,texte)
	{
		if (!VERSION4) return;
	
		var ptrObj, ptrLayer;
		if (IE4)
		{
			ptrObj = event.srcElement;
			ptrLayer = document.all.infobull;
		}
		if (NS4)
		{
			ptrObj = event.target;
			ptrLayer = document.infobull;
		}
	
		if (!ptrObj.onmouseout) ptrObj.onmouseout = BullDown;
	
		var str = '<DIV CLASS=infobullDIV>'+texte+'</DIV>';
		if (IE4)
		{
			ptrLayer.innerHTML = str;
			ptrLayer.style.top  = BullGetOffset (ptrObj,'Top') + 2;
			ptrLayer.style.left = BullGetOffset (ptrObj,'Left');
			ptrLayer.style.visibility = 'visible';
		}
		if (NS4)
		{
			ptrLayer.document.write (str);
			ptrLayer.document.close ();
			ptrLayer.document.bgColor = 'yellow';
			ptrLayer.top  = ptrObj.y + 20;
			ptrLayer.left = ptrObj.x;
			ptrLayer.visibility = 'show';
		}
	}
	// -->
	</SCRIPT>
<h2>Veuillez Sélectionner les tables</h2>
	<form action='' method='post' name=formu>
	<input type='hidden' name='action' value='save'>
	<input type='hidden' name='dbhost' value='$host'>
	<input type='hidden' name='dbbase' value='$bdd'>
	<input type='hidden' name='dbuser' value='$user'>
	<input type='hidden' name='dbpass' value='$pass'>
	<DIV ID='infobull'></DIV>
	<table border='0' width='400' align='center' cellpadding='0' cellspacing='0' class=texte>
	<col width=1 bgcolor='#2D7DA7'>
	<col width=30 align=center valign=center>
	<col width=1 bgcolor='#2D7DA7'>
	<col width=350>
	<col width=1 bgcolor='#2D7DA7'>
		<tr>
			<td bgcolor='#2D7DA7' colspan=5></td>
		</tr>
		<tr>
			<td></td>
			<td bgcolor='#336699'><input type='checkbox' name='selc' alt='Tout Sélectionner' onclick='if (document.formu.selc.checked==true){checkall();}else{decheckall();}' onMouseover=\"BullOver(event,'Selectionner Toutes les Tables')\"></td>
			<td></td>
			<td bgcolor='#338CBD' align=center>Nom des Tables</td>
			<td></td>
		</tr>
		<tr>
			<td bgcolor='#2D7DA7' colspan=5></td>
		</tr>
	";

	$i = 0;
	while ($i < mysqli_num_rows ($tables))
	{
		$coul = '#99CCCC';
		if ($i % 2)
		{
			$coul = '#CFE3E3';
		}
		$tb_nom = mysqli_tablename ($tables, $i);
		echo "	<tr>
					<td></td>
					<td bgcolor='".$coul."'><input type='checkbox' name='tbls[".$i."]' value='".$tb_nom."'></td>
					<td></td>
					<td bgcolor='".$coul."'>&nbsp;&nbsp;&nbsp;".$tb_nom."</td>
					<td></td>
				</tr>
				<tr>
					<td bgcolor='#2D7DA7' colspan=5></td>
				</tr>";
		$i++;
	}

	mysqli_close($link);
	
	echo "
	</table>
	<br><br>
	<table align=center border=0>
		<tr>
			<td align=left class=texte>
			<hr>
				<input type='radio' name='savmode' value='csv'> Sauvegarder au Format csv (*.<i>csv</i>)<br>
				<input type='radio' name='savmode' value='sql' checked> Sauvegarder sous forme Sql (*.<i>sql</i>)<br>
			<hr>
				<input type='radio' name='opt' value='1' checked>Structure et Données<br>
				<input type='radio' name='opt' value='2'>Structure Seulement<br>
				<input type='radio' name='opt' value='3'>Données Seulement<br>
			<hr>
				<input type='Checkbox' name='drp_tbl' value='1' checked> Ajouter la Suppression de Table si existante.<br>
				<input type='Checkbox' name='ecraz' value='1' checked> Ecraser le Fichier si existant.<br>
				<input type='Checkbox' name='f_tbl' value='1'> Un fichier par table<br>
				<input type='Checkbox' name='f_cut' value='1'> Taille Maximale des fichiers : <input type='text' name='fz_max' value='200000' class=form> Octets<br>
				<input type='Checkbox' name='file_type' value='1'> Gzip.<br>
			</td>
		</tr>
	</table>
	<br><br>
	<input type='submit' value=' Sauver ' class='form' />
	</form>
	$footer";
exit;
}


/* Page Par Defaut - Default Page */

if(file_exists($secu_config))
{
	include ($secu_config);
	$ck = "checked";
}
else
{
	$host = "localhost";
	$bdd = "dreaxteam";
	$user = "root";
	$pass = "";
	$ck = "";
}

echo $header . "
<form action='' method='post'>
<input type='hidden' name='action' value='connect'>
<table border=0 align=center>
	<col>
	<col align=left>
	<tr>
		<td colspan=2 align=center style='font: bold 9pt; font-family: verdana;'>Configuration des Paramètres de connexion à la Base de Donnée<br><br></td>
	</tr>
	<tr>
		<td class=texte>Adresse-Server de la Base de Donnée</td>
		<td><INPUT TYPE='TEXT' NAME='dbhost' SIZE='30' VALUE='$host' class=form></td>
	</tr>
	<tr>
		<td class=texte>Nom de la Base de Donnée</td>
		<td><INPUT TYPE='TEXT' NAME='dbbase' SIZE='30' VALUE='$bdd' class=form></td>
	</tr>
	<tr>
		<td class=texte>Nom d'utilisateur de la Base de Donnée</td>
		<td><INPUT TYPE='TEXT' NAME='dbuser' SIZE='30' VALUE='$user' class=form></td>
	</tr>
	<tr>
		<td class=texte>Password d'utilisateur de la Base de Donnée</td>
		<td><INPUT TYPE='Password' NAME='dbpass' SIZE='30' VALUE='$pass' class=form></td>
	</tr>
</table>

<br>
<center>
<input type='checkbox' name='secu' value='1' $ck> Sauvegarder les Parametres de connexion<br>
<i><font size=1>( Consultez le fichier Readme pour plus d'informations sécurité )</font></i>
<br><br>
<input type='submit' value=' Connexion ' class=form></center>
</form>
<br><br>

	</td>
	<td></td>
</tr>
<tr>
	<td height=1 colspan=3></td>
</tr>
</table>
<br>
<a href='http://dreaxteam.net' class=link>Copyrights © 2001-2003 DreaXTeaM</a>
</center>
</body>
</html>";
?>
