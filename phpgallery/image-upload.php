<!--CREATE TABLE images ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, imagename TEXT, imagedate DATE NOT NULL ) DEFAULT CHARACTER SET utf8;-->


<html>
<head>
    <title>PHP Image Upload</title>
    <link rel="stylesheet" href="phpgallery.css" type="text/css" media="screen" charset="utf-8"/>
</head>
<body>
    <center><h1>PHP Image Uploader</h1></center>
    <div id='main'>
        <form method='post' action='image-upload.php' enctype='multipart/form-data'>
            <p>Please select a JPG, Gif, PNG or TIF File:</p>
            <input type='submit' value='Upload'><input type='file' name='filename' size='10'>
        </form>
<?php
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
        $n = "image.$ext";
        $n = strtolower(ereg_replace("[^A-Za-z0-9.]", "", $name));
        $nn = "images/" . strtolower(ereg_replace("[^A-Za-z0-9.]", "", $name));
        move_uploaded_file($_FILES['filename']['tmp_name'], $nn);
        chmod ($nn, 0644);
        echo "<p> Uploaded image '$name'</p><div style='float: right; z-index:5; position: absolute; right: 0; top: 0;'><img src='$nn' height='98px' /></div></div>";
        
        include 'db.inc.php';

	$imagedate = date("Y:m:d:H:i:s");
	$sql = "INSERT INTO images SET
			imagename='$n',
			imagedate='$imagedate'";
	if (!mysqli_query($link, $sql))
	{
		echo 'Error adding submitted image.';
	}

	header('Location: .');
    }else echo "<p>'$name' is not an accepted image file</p>";
}else echo "<p>No image has been uploaded</p></div>";


// Display images
include 'db.inc.php';
$result = mysqli_query($link, 'SELECT imagename FROM images');
if (!$result)
{
	echo 'Error fetching authors from database!';
	}

while ($row = mysqli_fetch_array($result))
{
	$images[] = array('imagename' => $row['imagename']);
}
?>
    <div id='imageContainer'>
<?php
foreach ($images as $image):
?>
        <div class="gallery">
            <img src="images/<?php echo $image['imagename']; ?>" height="125px" />
        </div>
<?php
endforeach;
?>
    </div>
</body>
</html>