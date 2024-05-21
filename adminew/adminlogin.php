<?php
session_start();
session_name("dicoadmin");

if(($_POST["login"] == "adminlmdd" && md5($_POST["password"]) == '2af5fa86fa28c1a0023d275c34539076')
  || ($_POST["login"] == "nabil" && md5($_POST["password"]) == '26582e298a4a41c2559b3a09d17336fd')
  || ($_POST["login"] == "gerard" && md5($_POST["password"]) == 'dfe73588d209fe33a3f34d9b6c2cb544'))
{
  $_SESSION["sessionvalide"] = "sessionok";
  $redirection =  "Location: index2.php";
}
else
{
  $erreur="Login ou mot de passe invalide !";
  $redirection =  "Location: index.php?erreur=$erreur";
}
header($redirection);
?>
