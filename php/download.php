
<?php 

$filelink=$_GET["filelink"];

header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=".$filelink);



 ?>
