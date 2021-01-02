<?php 
ini_set("display_errors","On");
error_reporting(E_ALL | E_STRICT);
header("Content-type:text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["userid"]))
	die("请先登录<a href='login.php'>登录</a>");
else
	$_SESSION["page"]="index";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/style.css">
	<link rel="stylesheet" href="../assets/dashboard.css">
</head>
<body>
	<?php include("top.php") ?>

	<div class="container">
		<?php include("nav_sidebar.php")?>
		<?php include("carousal.html") ?>
		<hr>
		<?php include("footer.html")?>
	</div>
</body>
</html>