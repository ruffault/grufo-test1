
<?php
class Auteur
{                //appelations dans la base
	private $_ID, //ID
		$_Type_cotisant, // Type_cotisant
		$_n°_SS, // n°_SS
		$_clé_SS, //clé_SS
		$_Nom, // Nom
		$_Prénom, // Prénom
		$_Nom_usage, // Nom_usage
		$_Pseudo, // Pseudo
		$_Nom_courrier, // Nom_courrier
		$_Adresse, // Adresse
		$_Adresse2, //Adresse2
		$_CP, //CP
		$_Ville, //Ville
		$_Pays, //Pays
		$_Date_naissance, //Date_naissance
		$_Date_décès, // Date_décès
		$_Activité, //Activité
		$_Siret_RNA, //Siret_RNA
		$_Taux_usuel, //Taux_usuel
		$_Civilité, //Civilité
		$_Type; //Type . donc partour les mêmes champs que dans la base

	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);
	}

	public function hydrate(array $donnees)
	{
		foreach ($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
			{

				$this->$method($value);	
			}
		}
	}

	public function ID()
	{
		return $this->_ID;
	}

	public function setId($id)
	{
		$id = (int) $id;

		if ($id > 0)
		{
			$this->_ID = $id;
		}
	}

	public function Type_cotisant()
	{
		return $this->_Type_cotisant;
	}



	public function setType_cotisant($Type_cotisant)
	{
			$this->_Type_cotisant = $Type_cotisant;

	}



	public function n°_SS()
	{
		return $this->_n°_SS;
	}

	public function setn°_SS($n°_SS)
	{

			$this->_n°_SS = $n°_SS;
	}

	public function clé_SS()
	{
		return $this->_clé_SS;
	}

	public function setclé_SS($clé_SS)
	{

			$this->_clé_SS = $clé_SS;
	}
	public function Nom()
	{
		return $this->_Nom;
	}

	public function setNom($Nom)
	{

			$this->_Nom = $Nom;
	}
	public function Prénom()
	{
		return $this->_Prénom;
	}

	public function setPrénom($Prénom)
	{

			$this->_Prénom = $Prénom;
	}
	public function Nom_usage()
	{
		return $this->_Nom_usage;
	}

	public function setNom_usage($Nom_usage)
	{

			$this->_Nom_usage = $Nom_usage;
	}
	public function Pseudo()
	{
		return $this->_Pseudo;
	}

	public function setPseudo($Pseudo)
	{

			$this->_Pseudo = $Pseudo;
	}
	public function Nom_courrier()
	{
		return $this->_Nom_courrier;
	}

	public function setNom_courrier($Nom_courrier)
	{

			$this->_Nom_courrier = $Nom_courrier;
	}
	public function Adresse()
	{
		return $this->_Adresse;
	}

	public function setAdresse($Adresse)
	{

			$this->_Adresse = $Adresse;
	}
	public function Adresse2()
	{
		return $this->_Adresse2;
	}

	public function setAdresse2($Adresse2)
	{

			$this->_Adresse2 = $Adresse2;
	}
	public function CP()
	{
		return $this->_CP;
	}

	public function setCP($CP)
	{

			$this->_CP = $CP;
	}
	public function Ville()
	{
		return $this->_Ville;
	}

	public function setVille($Ville)
	{

			$this->_Ville = $Ville;
	}
	public function Pays()
	{
		return $this->_Pays;
	}

	public function setPays($Pays)
	{

			$this->_Pays = $Pays;
	}
	public function Date_naissance()
	{
		return $this->_Date_naissance;
	}

	public function setDate_naissance($Date_naissance)
	{

			$this->_Date_naissance = $Date_naissance;
	}
	public function Date_décès()
	{
		return $this->_Date_décès;
	}

	public function setDate_décès($Date_décès)
	{

			$this->_Date_décès = $Date_décès;
	}
	public function Activité()
	{
		return $this->_Activité;
	}

	public function setActivité($Activité)
	{

			$this->_Activité = $Activité;
	}
	public function Siret_RNA()
	{
		return $this->_Siret_RNA;
	}

	public function setSiret_RNA($Siret_RNA)
	{

			$this->_Siret_RNA = $Siret_RNA;
	}
	public function Taux_usuel()
	{
		return $this->_Taux_usuel;
	}

	public function setTaux_usuel($Taux_usuel)
	{

			$this->_Taux_usuel = $Taux_usuel;
	}
	public function Civilité()
	{
		return $this->_Civilité;
	}

	public function setCivilité($Civilité)
	{

			$this->_Civilité = $Civilité;
	}
	public function Type()
	{
		return $this->_Type;
	}

	public function setType($Type)
	{

			$this->_Type = $Type;
	}
	public function nomValide()
	{
		return !empty($this->_nom);
	}

	public function listeat()
	{
		$table =[];
		foreach($this as $attribut => $valeur)
		{
			$table[$attribut] = $valeur;
		}
		return $table;
	}

}
