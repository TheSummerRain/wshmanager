<?php
require_once "../include.php";
//将参数act传过啦接收act

$act=$_REQUEST['act'];
if($act=="logout"){
	logout();
}