<?php
require_once '../include.php';
//用来验证用户有没有登录
checkLogined();
$fbId = $_GET['fbId'];
$sql="select * from userfeedback where fbId=$fbId";
$row=fetchOne($sql);
$userId=$row['userId'];
$sql2="select * from userInfo where id=$userId";
$row2=fetchOne($sql2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>反馈内容</title>
	<meta charset="utf-8">
</head>

<style type="text/css">
	*{margin: 0;padding: 0}
	.header{
		width:100%;
		height:80px;
		background:#222;
		text-align: center;
		line-height: 80px;
		color: #fff;
		font-size: 20px;
	}
	.content{

		margin-left: 15px;
		margin-top: 10px;
		text-indent: 32px;
		font-size: 16px;
		margin:0 auto;
		padding: 0 40px;
	}
	.title{
		margin-left: 44%;
		font-size: 18px;
		font-weight: 600;
	}
	.fb_content{
		width: 600px;
		margin-left: 32%;
		margin-bottom: 20px;
		font-weight: 600;
	}
	.fb_content p{
		margin-top: 10px;
		text-indent: 32px;
		min-height: 300px;
		padding-left: 15px;
		padding-right: 15px;
		line-height: 20px;
	}
	.fb_feedback{
		width: 100%;
		min-height: 200px;
	}
	.fb_people{
		text-align: center;
		width:100%;
		height:80px;
		text-align: center;
		line-height: 80px;
		font-size: 20px;
		font-weight: 700;
		border-bottom: 1px solid #ccc;
	}
	.button{
		margin-top: 20px;
	}
	.button input{
    		width: 50px;
		    height: 25px;
		    float: left;
		    margin-right: 10px;
		    border: 0;
		    background: none;
		    line-height: 25px;
		    text-align: center;
	}
	.button .bj_btn{
		border: solid 1px #0c89ff;
    	color: #0c89ff;
	}
	.button .no_btn{
		border: solid 1px #f12c0b;
	    background: #f12c0b;
	    color: #fff;
	}
</style>
<body>
	<div class="header">
		<h3>反馈详情</h3>
	</div>
	<div class="content">
		<div class="title">标题：<span><?php echo $row['fdTitle'];?></span></div>
		<div class="fb_content">
			<span style="color:#000;font-weight:600">反馈内容：</span>
			<p><?php echo $row['fdContent'];?></p>
		</div>
		<div class="fb_feedback">
			<div class="fb_people">
				反馈人信息:
			</div>
			<span>id:<?php echo $row['userId'];?></span><br/>
			<span>昵称:<?php echo $row2['nickName'];?></span><br/>
			<span>手机号:<?php echo $row2['mobile'];?></span>
		</div>
		<div class="button">
			<input onclick="updateUFeedBack0(0,<?php echo $row['fbId'];?>,1)" class="no_btn" type="button" value="没有用">
			<input onclick="updateUFeedBack1(1,<?php echo $row['fbId'];?>,1)" class="bj_btn" type="button" value="转产品">
			<input onclick="updateUFeedBack2(2,<?php echo $row['fbId'];?>,1)" class="bj_btn" type="button" value="转运营">
			<input onclick="updateUFeedBack3(3,<?php echo $row['fbId'];?>,1)" class="no_btn" type="button" value="不处理">
		</div>
	</div>
</body>
<script type="text/javascript">
	function updateUFeedBack0(fbStatus,fbId,hasRead){
		window.location="editUserFeedBack.php?fbStatus="+fbStatus+"&fbId="+fbId+"&hasRead="+hasRead;

	}
	function updateUFeedBack1(fbStatus,fbId,hasRead){
		window.location="editUserFeedBack.php?fbStatus="+fbStatus+"&fbId="+fbId+"&hasRead="+hasRead;

	}
	function updateUFeedBack2(fbStatus,fbId,hasRead){
		window.location="editUserFeedBack.php?fbStatus="+fbStatus+"&fbId="+fbId+"&hasRead="+hasRead;

	}
	function updateUFeedBack3(fbStatus,fbId,hasRead){
		window.location="editUserFeedBack.php?fbStatus="+fbStatus+"&fbId="+fbId+"&hasRead="+hasRead;

	}
</script>
</html>