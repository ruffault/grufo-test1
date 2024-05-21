#!/bin/sh
alias php='/usr/local/bin/php'
cd /home/dicoland/www/stat/
php addyear.php
php addnewreferer.php
php referermonth.php
php statclient.php
php statarticle.php
