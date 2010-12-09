<?php

function db_connect()

{

$maindomain ="scotty.ktmadsenteam.com";

$username ="joey";

$password ="JoeRules5";

$db ="ktmadsenteam";

$dbpath="144.38.205.172";

mysql_connect($dbpath, $username, $password) or die(mysql_error());

mysql_select_db($db) or die(mysql_error());

}

?>

