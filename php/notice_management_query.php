<?php 
ini_set("display_errors","On");
error_reporting(E_ALL | E_STRICT);
header("Content-type:text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["userid"]))
	die("请先登录<a href='login.php'>登录</a>");
else
	$_SESSION["page"]="notice_management_query";
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
 	<link rel="stylesheet" href="../assets/query.css">
 </head>
 <body>
 	<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
 	<!-- 顶部 -->
	<?php include("top.php") ?>

 	<div class="container">
	 	<!-- 导航 -->
	 	<?php include("nav_sidebar.php")?>

 		<!-- 面包屑 -->
 		<?php include("bread_path.php") ?>
 		<?php include("notice_management_nav.php") ?>

 		<!-- 查询条件 -->
 		<?php  include("notice_management_query_condition.php")?>

 		<!-- 查询结果 -->
		<?php  include("notice_management_query_result.php")?>

 		<!-- 页脚 -->
 		<hr>
 		<?php include("footer.html") ?>
 	</div>

 </body>
 </html>