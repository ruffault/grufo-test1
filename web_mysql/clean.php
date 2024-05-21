<?php

foreach ($_COOKIE as $key => $value)
{
	setcookie($key, "", time() - 3600);
	setcookie($key, "", time() - 3600, "/",".dicoland.com");
	setcookie($key, "", time() - 3600, "/","dicoland.com");
}
header('Location: http://www.dicoland.com');

?>
