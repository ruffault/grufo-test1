<?
Class emailing
{
	var $ID;
	var $EMAIL_SENDER;
	var $NOM_SENDER;
	var $SUJET;
	var $CONTENU;
	var $FORMAT;
	var $STATUT;
	var $DATETIME_CREATION;

	function lire_emailing($ID)
	{
		$sql = "SELECT * FROM emailings_contenus WHERE ID = ".$ID;
		$rsql = mysql_query($sql) or die (mysql_error());
		if (mysql_num_rows($rsql) == 0)
		{
			$this->ID = -1;
		}
		else
		{
    	$this->ID = mysql_result($rsql, 0, "ID");
    	$this->EMAIL_SENDER = mysql_result($rsql, 0, "EMAIL_SENDER");
    	$this->NOM_SENDER = mysql_result($rsql, 0, "NOM_SENDER");
    	$this->SUJET = mysql_result($rsql, 0, "SUJET");
    	$this->CONTENU = mysql_result($rsql, 0, "CONTENU");
    	$this->FORMAT = mysql_result($rsql, 0, "FORMAT");
    	$this->STATUT = mysql_result($rsql, 0, "STATUT");
    	$this->DATETIME_CREATION = mysql_result($rsql, 0, "DATETIME_CREATION");
		}
	}

	function insert_emailing()
	{
		$this->DATETIME_CREATION = date("Y-m-d H:i:s");
		$sql = "INSERT INTO emailings_contenus (ID, EMAIL_SENDER, NOM_SENDER, SUJET, CONTENU, FORMAT, STATUT, DATETIME_CREATION) ";
	  $sql .= "VALUES ('', '$this->EMAIL_SENDER', '$this->NOM_SENDER', '$this->SUJET', '$this->CONTENU', '$this->FORMAT', '$this->STATUT', '$this->DATETIME_CREATION');";
		if (mysql_query($sql))
		{
			$this->ID = mysql_insert_id();
		}
		else
		{
			$this->ID = -1;
		}
	}

	function modify_emailing($ID)
	{
		$sql  = "UPDATE emailings_contenus SET ";
		$sql .= "EMAIL_SENDER  = \"$this->EMAIL_SENDER\",";
		$sql .= "NOM_SENDER  = \"$this->NOM_SENDER\",";
		$sql .= "SUJET  = \"$this->SUJET\",";
		$sql .= "CONTENU  = \"$this->CONTENU\",";
		$sql .= "FORMAT  = \"$this->FORMAT\",";
		$sql .= "STATUT  = \"$this->STATUT\"";
		$sql .= " WHERE ID=".$ID;
		if(mysql_query($sql))
		{
			$this->ID = $this->ID;
	 	}
	  else
	  {
	  	$this->ID = -1;
	  }
	}

	function del_emailing($ID)
	{
		$sql = "DELETE FROM emailings_contenus WHERE ID='".$ID."' LIMIT 1";
		if (mysql_query($sql))
		{
			$this->ID = $ID;
		}
		else
		{
			$this->ID = -1;
	  }
	}
}
?>