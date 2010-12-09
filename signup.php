<?php

include("consdb.php");

// we must never forget to start the session
session_start();

// checking if the variables exist
if (isset($_POST['uname']) && isset($_POST['passwd']))
{
	
	$uname = strtolower($_POST['uname']); // set username to lowercase
	$p = $_POST['passwd'];
	$p2 = hash('sha1',$p);
	db_connect();
	$query = mysql_query("insert into basic_auth values('$uname', '$p2')") or die (mysql_error());
	// after signup we move to the login page
	header('Location: login.php');
	exit; 
}
?>
<html>
<head>
<title>Basic signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<h1 align="center">Sign Up Form</h1>
<!-- Here's our signup form -->
<form method="post" name="frmSignup" id="frmSignup">
<table width="400" border="1" align="center" cellpadding="2" cellspacing="2">
<tr>
<td width="150">Username</td>
<td><input name="uname" type="text" id="uname"></td>
</tr>
<tr>
<td width="150">Password</td>
<td><input name="passwd" type="password" id="passwd"></td>
</tr>
<tr>
<tr>
<td width="150">&nbsp;</td>
<td><input type="submit" name="btnSignup" value="Sign Up"></td>
</tr>
</table>
</form>
</body>
</html>
