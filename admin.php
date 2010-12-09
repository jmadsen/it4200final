<?php

include("header.php");


// get database info
include("consdb.php");

// we must never forget to start the session
session_start();
$errorMessage = '';

// checking if the variables exist 
if (isset($_POST['uname']) && isset($_POST['passwd']))
{
	db_connect();
	$u = $_POST['uname'];
	$p = $_POST['passwd'];
	$p2 = hash('sha1',$p);
	// Run our mySQL query
	$query = mysql_query("select * from basic_auth where passwd = '$p2' and uname = '$u'") or die (mysql_error());
	while($row=mysql_fetch_array($query))
	{
		$uname = $row['uname'];
		       $passwd = $row['passwd'];

		       }
		       if ($u == $uname && $p2 == $passwd)  // if credentials given by login match
		       {
			$_SESSION['logged_in'] = true;
					       $_SESSION['uname'] = $uname;
					       			  // after login we move to the main page
								     header('Location: info.php');
								     		       exit;
										       } 
										       else  // if not, show error
										       {
											$errorMessage = "Sorry, wrong user id / password <br /> $uname <br /> $p == $passwd";
											}
}
?>

<h2 align="center">Please Login</h2>
<!-- Error Message Stuff -->
<?php
if ($errorMessage != '') {

echo '<p align="center"><strong><font color="#990000">' .  $errorMessage  . '</font></strong></p>';

}
?>

<!-- Here's our form -->
<form method="post" name="frmLogin" id="frmLogin">
<table width="400" border="1" align="center" cellpadding="2" cellspacing="2">
<tr>
<td width="150">User Id</td>
<td><input name="uname" type="text" id="uname"></td>
</tr>
<tr>
<td width="150">Password</td>
<td><input name="passwd" type="password" id="passwd"></td>
</tr>
<tr>
<input name="id" value='<?php echo $_POST["id"]; ?>' type= "hidden">
<td colspan="2" align="center"><input type="submit" name="btnLogin" value="Login"></td>
</tr>
</form>
<tr>
<td colspan="2">Not registered? <a href="signup.php">Click here</a> to sign up</td>
</tr>
</table>

<?php
include("footer.php");
?>