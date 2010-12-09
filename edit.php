
<?php

include("consdb.php");



//the above includes the host, username, password, etc for db connection



db_connect();



//This calls the db_connect function from the above include called cons.php

$id = $_POST["id"];

$fname = $_POST["fName"];

$lname = $_POST["lName"];

$upline = $_POST["upline"];

$attending = $_POST["attending"];

$email = $_POST["email"];

//Pass All Data From Form



if($fname && $lname && $upline && $attending && $email)

{

$Time=time();

//time() will contain a number an assign it to the $Time variable

mysql_query("update teammembers set fName='".$fname."',
lName='".$lname."',attending='".$attending."',
upline='".$upline."',email='".$email."' where id='".$id."';" ) or die(mysql_error());


					      /*echos simply print to screen

					      */


$someText = "Your form information was sent.<br>";

header ('location: info.php?a=Your form information was sent.<br>');



}
else

	{

	$moreText = "Please fill out all the required fields noted by the *";
	header ('location: assign4.php?a=Please fill out all the required fields noted by the *');
	
	}



?>
