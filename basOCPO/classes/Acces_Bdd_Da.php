
<?php
class Acces_Bdd_Da
{
	private $_db;//  Instance de PDO

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function Ins($obj)
	{
		$champs = " (";
		$valeurs = " VALUES (";
		foreach($obj->listeat() as $at => $val)
		{
			//echo $at . "=>" . is_null($val). var_dump($val);
			if (!is_null($val)){
				$champs .= substr($at,1) . ", ";
				$valeurs .= (is_int($val)? $val : ("'" . $val . "'")) . "," ;
			}
		}
		$chaine = 'INSERT INTO ' . get_class($obj) . substr($champs,0,-2) . ")" . substr($valeurs,0,-1) . ")";
		var_dump($chaine);
		$q = $this->_db->prepare('INSERT INTO ' . get_class($obj) . substr($champs,0,-2) . ")" . substr($valeurs,0,-1) . ")");
		//$q->bindValue(':nom', $perso->nom());
		$q->execute();

		$obj->hydrate([
			'_ID' => $this->_db->lastInsertId()]);
	return $obj->ID();
	}

	public function count($obj)
	{
		return $this->_db->query('SELECT COUNT(*) FROM ' .get_class($obj))->fetchColumn();
	}

	public function Sup($obj)
	{
		$this->_db->exec('DELETE FROM ' . get_class($obj) . ' WHERE ID = '.$obj->ID());
	return $obj->ID();
	}


	public function exists($info)
	{
		if (is_int($info)) // On veut voir si tel personnage ayant pour id $info existe.
		{
			return (bool) $this->_db->query('SELECT COUNT(*) FROM personnages WHERE id = '.$info)->fetchColumn();
		}

		//Sinon, c'est qu'on veut vérifier que le nom existe ou pas.

		$q = $this->_db->prepare('SELECT COUNT(*) FROM personnages WHERE nom = :nom');
		$q->execute([':nom' => $info]);

		return (bool) $q->fetchColumn();
	}

	public function get($info)
	{
		if (is_int($info))
		{
			$q = $this->_db->query('SELECT id, nom, degats FROM personnages WHERE id = '.$info);
			$donnees = $q->fetch(PDO::FETCH_ASSOC);

			return new Personnage($donnees);
		}
		else
		{
			$q = $this->_db->prepare('SELECT id, nom, degats FROM personnages WHERE nom = :nom');
			$q->execute([':nom' => $info]);

			return new Personnage($q->fetch(PDO::FETCH_ASSOC));
		}
	}

	public function ListeTousLivres()
	{
		$table = [];

		$q = $this->_db->query('SELECT * FROM livre  ORDER by code');
		foreach ($q as $row) {
			$table[] = new Livre($row);
		}
		return $table;
	}

	public function ListeTousAuteurs()
	{
		$table = [];

		$q = $this->_db->query('SELECT * FROM Auteur ORDER by Nom');
		foreach ($q as $row) {
			$table[] = new Auteur($row);
		}
		return $table;
	}

	public function Maj($obj) //nouvelle fonction générique pour mettre à jour une table correspondant strictement à un objet
	{
		$set = " SET ";
		$where = " WHERE ID=";
		foreach($obj->listeat() as $at => $val)
		{
			if ($at == "_ID") {
				$where .= $val.";";
			}	
			else {
			
				$set .= substr($at,1). '=' .(is_null($val) ? "NULL" : '"' .$val. '"').' ,' ;
				//$set .= substr($at,1). '="' .$val. '" ,' ;
			}
		}
		$chaine = 'UPDATE ' . get_class($obj) . substr($set,0,-1) . $where;
		//var_dump($chaine);
		$q = $this->_db->prepare('UPDATE ' . get_class($obj) . substr($set,0,-1) . $where);
		//$q->bindValue(':nom', $perso->nom());
		
		$q->execute();
		return $obj->ID();
	}

	public function update($obj)
	{
		$q = $this->_db->prepare('UPDATE personnages SET degats = :degats WHERE id = :id');

		$q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
		$q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

		$q->execute();
	}	
	

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}
