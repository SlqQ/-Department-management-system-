<?php
        ini_set("display_errors","On");
		error_reporting(E_ALL | E_STRICT);
		header("Content-type:text/html; charset=utf-8");
		session_start();

        //限制图片类型格式，大小
        $bool=($_FILES['file']['type']=='image/gif'||
		   $_FILES['file']['type']=='image/png'||
		   $_FILES['file']['type']=='image/pjpeg'||
		   $_FILES['file']['type']=='image/jpeg'||
           $_FILES['file']['type']=='image/jpg');
        if(!$bool){
			die("类型不对<a href='javascript:window.history.back();'>返回</a>");
		}

		$bool=$_FILES['file']['size'] <100000000;
		if(!$bool){
			die("大小不对<a href='javascript:window.history.back();'>返回</a>");
		}

		if($_FILES['file']['error']>0){
			die("Return Code".$_FILES['file']['error']."<br />");
		}
        //设置文件上传路径，选择指定文件夹
        $today=date("YmdHis");
		$fileArray=explode(".",$_FILES["file"]["name"]);
		$filename=$today.".".$fileArray[1];
        move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/$filename");

		$filePath="../upload/$filename";
		$_SESSION["noticeimage"]=$filePath;

        //定义变量，存储文件上传路径，之后将变量写进数据库相应字段即可
        // $sql = "INSERT INTO notice (notice_image)
        //     VALUES
        //     ('$filename')";
        // $rs=mysqli_query($conn,$sql);

        //成功传入数据后显示成功添加一条数据
        echo "<script>";
    	echo "alert('上传成功!!!');";
    	echo "window.parent.document.getElementById('noticeImage').src='".$_SESSION['noticeimage']."';";
    	echo "window.location.href='uploadImage.php'";
		echo "</script>";
?>