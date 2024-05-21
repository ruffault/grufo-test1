<?php

session_start();
session_name("dicoadmin");

$_SESSION = array();

session_destroy();

header('Location: index.php');

?>