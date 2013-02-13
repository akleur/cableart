
<?php

$exif = exif_read_data('image94.jpg');
echo "exif daten:<br />\n";
var_dump($exif);

echo "<br>".$exif['Orientation'];
?>
