<!-- 注册 -->

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
 	<link rel="stylesheet" href="../assets/style.css">
 	<link rel="stylesheet" href="../assets/dashboard.css">
 	<link rel="stylesheet" href="../assets/register.css">
 </head>

 <body>

 	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


 	<!-- 顶部 -->
 	<?php include("top_register.html") ?>

 	<div class="container">
	 	
	 	<!-- 注册页 -->
 		<?php include("register_form.php")?>

 		<!-- 页脚 -->
		<hr>
 		<?php include("footer.html") ?>
 	</div>
 	<script src="../js/register.js"></script>
 </body>
 </html>