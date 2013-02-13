<?php

require('fileupload.php');
require('create_image.php');
require('config.php');

function sqlClean($varName) {
	str_replace('"', '&quote;', $_POST[$varName]);
	str_replace("'", '&quote;', $_POST[$varName]);
	return mysql_real_escape_string(urldecode($_POST[$varName]));
}

$allowedExtensions = array("jpeg", "jpg");
$sizeLimit = 10 * 1024 * 1024;
$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
$result = $uploader->handleUpload('../uploads/');
$uploadname = $uploader->getUploadName();

if ($result['success'] == true) {

	// Read exif data for orientation
	$exif = exif_read_data("../uploads/".$uploadname);

	$orient = $exif['Orientation'];
	$rotate = 0;

	switch($orient) {
		case 3:
		$rotate = 180;
		break;

		case 6:
		$rotate = 90;
		break;

		case 8:
		$rotate = 270;
		break;
	}

	create_image("../uploads/".$uploadname, "../uploads/medium/".$uploadname, 800, $rotate, false);
	create_image("../uploads/".$uploadname, "../uploads/thumbs/".$uploadname, 200, $rotate, true);


	$picNickname = sqlClean('picNickname');
	$picEmail = sqlClean('picEmail');
	$picTitle = sqlClean('picTitle');
	$picLocation = sqlClean('picLocation');

	$query = "INSERT INTO cableart SET picFilename='".$uploadname."',";
	$query .= "picNickname='".$picNickname."', picEmail='".$picEmail."',";
	$query .= "picTitle='".$picTitle."', picLocation='".$picLocation."',";
	$query .= "picUploaddate=now()";
	$res = mysql_query($query);	

}

echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

?>