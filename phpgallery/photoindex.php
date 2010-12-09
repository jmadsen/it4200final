<?php

include 'header.php';
include 'loginform.php';
$loggedin = false;
$username = 'admin';
$password = '1234';
session_start();
$_SESSION['password'] = 'Admin';
    




    //if there is a file sumbitted it checks to make sure it is one of the valid image file types
    if ($_FILES) {
        $name = $_FILES['filename']['name'];
        switch($_FILES['filename']['type']) {
            case 'image/jpeg': $ext = 'jpg'; break;
            case 'image/gif':  $ext = 'gif'; break;
            case 'image/png':  $ext = 'png'; break;
            case 'image/tif':  $ext = 'tif'; break;
            default:           $ext = '';    break;
        }
        if ($ext) {
            $n = strtolower(ereg_replace("[^A-Za-z0-9.]", "", $name));
            $nn = "images/" . strtolower(ereg_replace("[^A-Za-z0-9.]", "", $name));
            move_uploaded_file($_FILES['filename']['tmp_name'], $nn);
            chmod ($nn, 0644);
            $imagedate = date("Ymd");
            include 'db.inc.php';
            mysqli_query($link, "INSERT INTO images SET imagename='$n', imagedate='$imagedate'");
            header('Location: .');
            $_SESSION['password'] = 'Log Out';
        }
    }
    
    
    
    
    //delete images from database
	include 'db.inc.php';
	$result = mysqli_query($link, 'SELECT id, imagename FROM images');
	if (isset($_GET['deleteimage'])){
	    $id = mysqli_real_escape_string($link, $_POST['id']);
	    mysqli_query($link, $sql = "DELETE FROM images WHERE id='$id'");
        header('Location: .');
        $_SESSION['password'] = 'Log Out';
	}
    
    
    
    //display images in the database
    $result = mysqli_query($link, 'SELECT id, imagename FROM images'); 
    while ($row = mysqli_fetch_array($result)){
		$images[] = array('id' => $row['id'], 'imagename' => $row['imagename']);
	}
    //loops through each image and creates html tags for it.
    foreach ($images as $image):
	$size = getimagesize('images/' . $image['imagename']);
    //uses the getimagesize function to determine whether the width or the height should be set to 125px.
    //a better way to do this would be to use server-side image software to create thumbnail images.
	if ($size[0] > $size[1]){$wh = 'width=' . $size[0]/($size[1]/125) .' height=125px';
	}else{$wh = 'height=' . $size[1]/($size[0]/125) .' width=125px';}
?>
		<a rel="gallery" href="images/<?php echo $image['imagename']; ?>">
		    <div class="gallery" title="<?php echo $image['imagename']; ?>">
                <div class="x" id="<?php echo $image['id']; ?>"></div>    
                <img src="images/<?php echo $image['imagename']; ?>" <?php echo $wh; ?> />
		    </div>
		</a>
<?php
	endforeach;
?>
</div>
<?php
    
    if ($_POST['password'] == 'logout'){
        $_SESSION['password'] = 'Admin';
        $loggedin = false;
    }
    else if ($_POST['password'] == $password){
        $_SESSION['password'] = 'Log Out';
        include 'uploadform.php';
        include 'deleteimageform.php';
        echo "<div id='deleteupload'><a rel='upload' id='upload' href='uploadform.php'>Upload</a><a id='deleteMode' href='image-upload.php'>Delete Mode</a></div>";
        $loggedin = true;
    }
    else if ($_SESSION['password'] == 'Log Out'){
        include 'uploadform.php';
        include 'deleteimageform.php';
        echo "<div id='deleteupload'><a rel='upload' id='upload' href='uploadform.php'>Upload</a><a id='deleteMode' href='image-upload.php'>Delete Mode</a></div>";
    }
    
?>





	
    <div id='adminlogin'><p><a rel='admin' id='admin' href='loginform.php'><?php echo $_SESSION['password']; ?></a></p></div>


</body>
</html>


