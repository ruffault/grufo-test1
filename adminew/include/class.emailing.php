<?php
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
		global $link;
		$sql = "SELECT * FROM emailings_contenus WHERE ID = ".$ID;
		$rsql = mysqli_query($link,$sql) or die (mysqli_error($link));
		if (mysqli_num_rows($rsql) == 0)
		{
			$this->ID = -1;
		}
		else
		{
	mysqli_data_seek($rsql,0);
	$row = mysqli_fetch_array($rsql);
    	$this->ID = $row ["ID"];
    	$this->EMAIL_SENDER = $row ["EMAIL_SENDER"];
    	$this->NOM_SENDER = $row ["NOM_SENDER"];
    	$this->SUJET = $row ["SUJET"];
    	$this->CONTENU = $row ["CONTENU"];
    	$this->FORMAT = $row ["FORMAT"];
    	$this->STATUT = $row ["STATUT"];
    	$this->DATETIME_CREATION = $row ["DATETIME_CREATION"];
		}
	}

	function insert_emailing()
	{
		global $link;
		$this->DATETIME_CREATION = date("Y-m-d H:i:s");
		$sql = "INSERT INTO emailings_contenus (ID, EMAIL_SENDER, NOM_SENDER, SUJET, CONTENU, FORMAT, STATUT, DATETIME_CREATION) ";
	  $sql .= "VALUES ('', '$this->EMAIL_SENDER', '$this->NOM_SENDER', '$this->SUJET', '$this->CONTENU', '$this->FORMAT', '$this->STATUT', '$this->DATETIME_CREATION');";
		if (mysqli_query($link,$sql))
		{
			$this->ID = mysqli_insert_id($link);
		}
		else
		{
			$this->ID = -1;
		}
	}

	function modify_emailing($ID)
	{
		global $link;
		$sql  = "UPDATE emailings_contenus SET ";
		$sql .= "EMAIL_SENDER  = \"$this->EMAIL_SENDER\",";
		$sql .= "NOM_SENDER  = \"$this->NOM_SENDER\",";
		$sql .= "SUJET  = \"$this->SUJET\",";
		$sql .= "CONTENU  = \"$this->CONTENU\",";
		$sql .= "FORMAT  = \"$this->FORMAT\",";
		$sql .= "STATUT  = \"$this->STATUT\"";
		$sql .= " WHERE ID=".$ID;
		if(mysqli_query($link,$sql))
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
		global $link;
		$sql = "DELETE FROM emailings_contenus WHERE ID='".$ID."' LIMIT 1";
		if (mysqli_query($link,$sql))
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
