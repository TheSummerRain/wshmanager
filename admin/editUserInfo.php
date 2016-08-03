<?php
require_once '../include.php';
//用来验证用户有没有登录
checkLogined();
$id=$_REQUEST['id'];
$sql="select id,vipLv,nickName,vipEndTime from userInfo where id='{$id}'";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>用户基础信息修改</title>
</head>

<style type="text/css">
	*{margin:0;padding: 0}
	h3{width:100%;
		height:80px;
		background:#222;
		color: #fff;
		line-height: 80px;
	}
	table td{float: right;line-height: 50px}
	.table_con{margin-top: 10px;margin-left: 15px;height: 100%}

</style>
<body>
<center>
	<h3>用户基础信息修改</h3>

	<div class="table_con" style="background:#eff3f5">
		<form method="post" action="editUserInfo.php">
			<table>
				<tr class="tb_title" style="display:none">
					<td>id:<input type="text" value="<?php echo $row['id']?>" name="id"></td>
				</tr>
				<tr class="tb_title">
					<td>vip等级:<input type="text" value="<?php echo $row['vipLv']?>" name="vipLv"></td>
				</tr>
				<tr class="tb_title">
					<td>昵称:<input type="type" value="<?php echo $row['nickName']?>" name="nickName"></td>
				</tr>
				<tr class="tb_title">
					<td>vip结束日期:<input type="text" value="<?php echo $row['vipEndTime']?>" name="vipEndTime"></td>
				</tr>
				<tr class="tb_title">
					<td><button type="text" style="width:50px;height:25px;background:#0C89FF;border:none">保存</button></td>
				</tr>
			</table>
		</form>
		<?php
			require_once '../include.php';
			$id=$_POST['id'];
			$vipLv=$_POST['vipLv'];
			$nickName=$_POST['nickName'];
			$vipEndTime=$_POST['vipEndTime'];
			$userInfoUp="update userinfo set vipLv=$vipLv,nickName='$nickName',vipEndTime='$vipEndTime' where id=$id";
			if(mysql_query($userInfoUp)){
				echo "<script type='text/javascript'>alert('测试');</script>";
				header("location:userInfo.php");
			}
		?>
	</div>
</center>	
</body>
</html>