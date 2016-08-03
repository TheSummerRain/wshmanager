<?php
require_once '../include.php';
$username=$_POST['username'];
$password=$_POST['password'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
if($verify==$verify1){
	$sql="select * from managerinfo where mgName='{$username}'and mgPwd='{$password}'";
	$row=checkAdmin($sql);
	if($row){
		$_SESSION['adminName']=$row['mgName'];
		$_SESSION['adminId']=$row['mgId'];
		//var_dump($row);
		//alertMes("登录成功","index.php");
		header("location:index.php");
	}else{
		alertMes("账号密码错误","login.php");
	}
	
}else{
	alertMes("验证码错误","login.php");
}