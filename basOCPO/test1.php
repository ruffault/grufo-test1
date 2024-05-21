
<?php
class MaClasse
{
  public $attribut1;
  public $attribut2;
}

$a = new MaClasse;

$b = $a; // On assigne à $b l'identifiant de $a, donc $a et $b représentent le même objet.

$a->attribut1 = 'Hello';
echo $b->attribut1; // Affiche Hello.

$b->attribut2 = 'Salut';
echo $a->attribut2; // Affiche Salut.
