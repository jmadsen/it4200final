<?php
$link = mysqli_connect('localhost', 'root', 'Jordan8323');
if (!$link)
{
	echo 'Unable to connect to the database server.';
	exit();
}

if (!mysqli_set_charset($link, 'utf8'))
{
	echo 'Unable to set database connection encoding.';
	exit();
}

if (!mysqli_select_db($link, 'ktmadsenteam'))
{
	echo 'Unable to locate the ktmadsenteam database.';
	exit();
}
?>
