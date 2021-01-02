<?php 

session_start();
if(!isset($_SESSION["userid"]))
	die("请先登录<a href='login.php'>登录</a>");
else
	$_SESSION["page"]="mail_write_group";
 ?>

  <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
 	<title></title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
 	<link rel="stylesheet" href="../assets/style.css">
 	<link rel="stylesheet" href="../assets/dashboard.css">
<link href="../assets/jquery-ui-1.8.7.custom.css" type=text/css rel=stylesheet>

 </head>
 <body>


 	 <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
 	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>

 	<!-- 顶部 -->
 	<?php include("top.php") ?>

 	<div class="container">
	 	<!-- 导航 -->
	 	<?php include("nav_sidebar.php")?>

 		<!-- 面包屑 -->
 		<?php include("bread_path.php") ?>
		<?php include("mail_nav.php") ?>
		<?php include("mail_write_nav.php") ?>
 		<?php include("mail_write_group_form.php") ?>
 		<!-- 页脚 -->
 		
 	</div>
 	<hr>
 	<?php include("footer.html") ?>
 </body>
 </html>

 