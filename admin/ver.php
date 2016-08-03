<?php
require_once '../include.php';
//用来验证用户有没有登录
checkLogined();

?>
<!DOCTYPE html>
<html>
<head>
	<title>维书会后台管理</title>
</head>
<body>
	<center>
		<h3>系统信息</h3>
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#ccc">
			<tr>
				<th>操作系统</th>
				<td><?php echo PHP_OS;?></td>
			</tr>
			<tr>
				<th>apache版本</th>
				<td><?php echo apache_get_version();?></td>
			</tr>
			<tr>
				<th>php版本</th>
				<td><?php echo PHP_VERSION;?></td>
			</tr>
			<tr>
				<th>运行方式</th>
				<td><?php echo PHP_SAPI;?></td>
			</tr>
		</table>
		<h3>软件信息</h3>
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#ccc">
			<tr>
				<th>系统名称</th>
				<td>维书会后台管理系统</td>
			</tr>
			<tr>
				<th>开发团队</th>
				<td>维书会团队</td>
			</tr>
			<tr>
				<th>公司网址</th>
				<td>http://www.wshuhui.com</td>
			</tr>
		</table>
	</center>
</body>
</html>