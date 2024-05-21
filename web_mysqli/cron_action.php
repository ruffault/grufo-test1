

<?php

require 'inc/config.inc.php';
require 'inc/connexion.inc.php';

require 'cron/action/wash_table.cron.php';
require 'cron/action/optimise_table.cron.php';
require 'cron/action/send_relance.cron.php';
require 'cron/action/send_mail.cron.php';
require 'cron/action/count_cmd.cron.php';
require 'cron/action/count_ca.cron.php';

?>
