<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="animated-menu.js" type="text/javascript"></script>

        <title>Katie Madsen Team Site</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
     <div id="header">
     </div>
                <div id="nav">
		  <!--<a href="index.html">HOME</a>                                                                                                                 
                        <a href="regis.html">REGISTER</a>                                                                                                                 
                        <a href="contact.html">CONTACT US</a>                                                                                                             
                        <a href="photos.html">PHOTOS</a> -->
    <ul>
        <li class="blue">
            <p><a href="index.php">HOME</a></p>
            <p class="subtext">The front page</p>
        </li>
        <li class="blue">
            <p><a href="regis.php">REGISTER</a></p>
            <p class="subtext">Register for events</p>
        </li>
        <li class="blue">
            <p><a href="contact.php">CONTACT</a></p>
            <p class="subtext">Get in touch</p>
        </li>

        <li class="blue">
            <p><a href="phpgallery/photoindex.php">PHOTOS</a></p>
            <p class="subtext">Check out the Photos!</p>
	    </li>

<?php
   session_start();
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
   {
      echo "<li class=blue><p><a href=info.php>Admin</a></p>
	    </li>";
   }

   if(isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == true)
   {
      echo"<li class=blue><p><a href=info.php>Admin</a></p></li>";
      echo"<li class=blue><p><a href=logout.php>Logout</a></p></li>";
   }

?>
    </ul>
    <div id="butterfly">
      </div>
    </div>

    <div id="pageBody">

<?php
?>
