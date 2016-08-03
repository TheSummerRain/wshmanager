<?php
require_once '../include.php';
//用来验证用户有没有登录
checkLogined();
$fbStatus=$_REQUEST['fbStatus'];
$fbId=$_REQUEST['fbId'];
$hasRead=$_REQUEST['hasRead'];
$arr = array(fbStatus => $fbStatus,hasRead => $hasRead);
update(userfeedback,$arr,fbId,$fbId);
header("location:userFeedBack.php");
?>