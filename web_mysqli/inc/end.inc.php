<?php


$tps_end = get_microtime();   
$tps = $tps_end - $tps_start;   

debug(round($tps,3) ." sec");


?>