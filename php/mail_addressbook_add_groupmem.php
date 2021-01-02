<?php 

// session_start();
// if(!isset($_SESSION["userid"]))
// 	die("请先登录<a href='login.php'>登录</a>");
// else
session_start();
    $user_id=$_SESSION["userid"];
	$_SESSION["page"]="mail_addressbook_add_groupmem";
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
 	<!-- <link rel="stylesheet" type="text/css" href="../assets/common.css"> -->

<link rel="stylesheet" type="text/css" href="../assets/select.css">
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
 		<?php include("mail_addressbook_add_groupmem_form.php") ?>
 		<!-- 页脚 -->
 		<hr>
 		<?php include("footer.html") ?>
 	</div>
 </body>
 </html>