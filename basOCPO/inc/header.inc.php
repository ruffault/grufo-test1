<?php
//On enregistre notre autoload.
function chargerClasse($classname)
{
	require '../classes/' . $classname.'.php';
}

spl_autoload_register('chargerClasse');
session_start(); // On appelle session_start() APRÈS avoir enregistré l'autoload.


