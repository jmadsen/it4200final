<?php
include("consdb.php");

db_connect();

mysql_query("delete from teammembers where id=".$_POST['delete'].";") or die(mysql_error());

header("location: info.php");

?>
