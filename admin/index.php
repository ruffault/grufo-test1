<?php

session_start();
session_name("dicoadmin");

if ($_SESSION['sessionvalide'] == 'sessionok')
{
	header("Location:index2.php");
}
else
{
	$_SESSION = array();
	session_destroy();
}

include ('include/header.inc.php');

?>

<div id='login'>
<img src='../css/logo.gif' alt='Veuillez vous identifier' /><br /><br />


<?php
if (isset($_GET['erreur']))
  echo '<div id="badlogin">' . $_GET['erreur'] . '</div>';
?>

</div>
<div id='identification'>
  <form action='adminlogin.php' method='post' />
    Login<br />
    <input type='text' value='' name='login' /><br />
    Mot de passe<br />
    <input type='password' value='' name='password' /><br /><br />
    <input type='submit' value='ok' name='identification_submit' /><br />
  </form>
</div>

<?php

include ('include/footer.inc.php');

?>
