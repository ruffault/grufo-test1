<?php

$str = 'aéô';

echo '<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<title>Essai UTF-8</title>
</head>
<body>
<p>';

echo mb_detect_encoding ($str);
echo '<br>' . "\n";
echo $str;
echo '<br>' . "\n";
echo mb_strlen ($str);
echo '<br>' . "\n";
echo mb_strpos ($str, 'ô');

echo '</p>
</body>
</html>';

?>
