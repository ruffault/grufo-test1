<?php


function debug($value)
{
	global $debug;

	if (isset($debug))
		echo "\n<!--\n" . print_r($value, true) . "-->\n";
}


function get_microtime()
{   
	list($tps_usec, $tps_sec) = explode(" ",microtime());   
	return ((float)$tps_usec + (float)$tps_sec);   
}  


?>