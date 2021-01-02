<?php 
// 用户名
$user = 'root';
// 密码
$pwd = '';
// 数据库名称
$db = 'zhou4db05';
// 数据库服务器
$host = 'localhost';
// 端口号
$port = 3306;

$conn = mysqli_init();
$success = mysqli_real_connect(
   $conn, 
   $host, 
   $user, 
   $pwd, 
   $db,
   $port
);
if($success!=1){
	die("数据库连接失败");
}
mysqli_set_charset($conn,"utf8");
 ?>