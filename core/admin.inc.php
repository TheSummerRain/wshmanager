<?php

function checkAdmin($sql){
	return fetchOne($sql);
}
/*
检查是否登录
*/
function checkLogined(){
	if($_SESSION['adminId']==""){
		header("location:login.php");
		//alertMes("请先登录","login.php");
	}
}
/*
注销登录
*/

function logout(){
	$_SESSION=array();
	if(isset($_SESSION[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	session_destroy();
	header("location:login.php");
}


