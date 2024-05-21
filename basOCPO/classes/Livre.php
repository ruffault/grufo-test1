
<?php
class Livre
{                //appelations dans la base
	private $_ID, //ID
		$_code, // le code referencevnterne du livre
		$_Titre; // le titre du Livre
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

	public function code()
	{
		return $this->_code;
	}



	public function setcode($code)
	{
			$this->_code = $code;

	}



	public function Titre()
	{
		return $this->_Titre;
	}

	public function setTitre($Titre)
	{

			$this->_Titre = $Titre;
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
