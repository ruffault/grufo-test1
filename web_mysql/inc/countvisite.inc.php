<?php
//Log la connection du l'utilisateur


$log['id_utilisateur'] = $_SESSION['id_user'];
$log['date'] = date('Y-m-d H:i:s');
$log['ip'] = $_SERVER['REMOTE_ADDR'];
$log['host'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$log['referant'] = $_SERVER['HTTP_REFERER'];
$log['keyword'] = $_SERVER['QUERY_STRING'];
$log['page'] = $_SERVER['PHP_SELF'];
$log['os'] = '';
$log['lang'] = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$log['ua'] = $_SERVER['HTTP_USER_AGENT'];


//On loggue une visite sur la page
$sql_addip = "INSERT INTO `log`(
                                `id_log`,
                                `id_utilisateur`,
                                `date`,
                                `ip`,
                                `host`,
                                `referant`,
                                `keyword`,
                                `page`,
                                `os`,
                                `lang`,
                                `ua`
                                )
              VALUES(
                     '',
                     '" . addslashes($log['id_utilisateur']) . "',
                     '" . addslashes($log['date']) . "',
                     '" . addslashes($log['ip']) . "',
                     '" . addslashes($log['host']) . "',
                     '" . addslashes($log['referant']) . "',
                     '" . addslashes($log['keyword']) . "',
                     '" . addslashes($log['page']) . "',
                     '" . addslashes($log['os']) . "',
                     '" . addslashes($log['lang']) . "',
                     '" . addslashes($log['ua']) . "'
                    );";
mysql_query($sql_addip);

?>
