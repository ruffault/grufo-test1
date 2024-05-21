<?php
@ini_set('default_charset', 'ISO-8859-1');
$str = 'un \'apostrophe\' en <strong>gras</strong>';
echo htmlentities($str);
$str = "\x8F!!!";
echo htmlentities($str, ENT_QUOTES | ENT_IGNORE, "ISO-8859-1");
echo htmlentities($str, ENT_QUOTES | ENT_IGNORE, "UTF-8");
echo htmlentities($str, ENT_QUOTES | ENT_IGNORE);
?>
