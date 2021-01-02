<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<style type="text/css">
 		/*.Button{
 			display: flex;
			flex-direction:row;
 		}*/
 	</style>
 </head>
 <body>
 	<div class="container">
 		<form action="upload_file.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
 			<div class = "Button">
 				<div class = "uploadbtn">
 					<input class = "uploadBtn"  type="file"  name="file" value="选择文件">
 				</div>
	 			<input class = "uploadBtn" type="submit" name="submit" value="上传">
 			</div>
	 		
			
		</form>
 	</div>
 </body>
 </html>
