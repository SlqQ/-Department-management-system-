<?php 
ini_set("display_errors","On");
error_reporting(E_ALL | E_STRICT);
header("Content-type:text/html; charset=utf-8");
	function showAlert($str){
		echo "<script>";
		echo "alert('".$str."');";
		echo "</script>";
	}
	function pageLocator($path){
		echo "<script>";
		echo "window.location='".$path."';";
		echo "</script>";
	}
 ?>