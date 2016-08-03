<?php
require_once '../include.php';
//用来验证用户有没有登录
checkLogined();
$id=$_GET['id'];
$mobile=$_GET['mobile'];
$vipEndTime=$_GET['vipEndTime'];
$sql="select * from userinfo ";
$queryStr="";
$arr=array();	
if(!empty($mobile)){
	$arr['mobile']=$mobile;
}
if(!empty($vipEndTime)){
	$arr['vipEndTime']=$vipEndTime;
}
if(!empty($id)){
	$arr['id']=$id;
}
//判断数组的长度是不是大于0
if(sizeof($arr)>0){
	$sql=$sql." where "	;
}
$i=0;
foreach ($arr as $key=>$value)
{
	$operational = '=';//定义一个位移量
	$val=$value;		//循环出数组里边的 值
  if($key=='vipEndTime'){
  		$operational="<=";
  		$val="'".$value."'";
  }
  if($i==0){
  	$queryStr=$queryStr. $key."=" .$value;
  	 $sql=$sql . $key .$operational .$val;
  }	
  else{
  	$queryStr=$queryStr."&".$key."=" .$value;//定义要往url传递的参数
  	$sql=$sql . " or ".$key .$operational .$val;
  }
  	$i++;
}

$row=checkuserinfo($sql);
$totalRows=count($row);
$pageSize=10;
// //得到总页码数
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page)){
	$page=1;
}
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
//判断 手机号跟id是不是空
if(empty($id)&&empty($mobile)){
	$sql= $sql." limit {$offset},{$pageSize}";
}

$rows=fetchAll($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>维书会后台管理</title>
<link rel="stylesheet" type="text/css" href="css/Iframe.css" />
<link rel="stylesheet" href="utilLib/bootstrap.min.css" type="text/css" media="screen" />
</head>
<style type="text/css">
	*{margin: 0;padding: 0}
	.header{
		width:100%;
		height:80px;
		background:#222;
	}
	.cx{width: 100%;list-style: none;height: 80px;}
	.cx li{width: 25%;height: 80px;float: left;color: #fff;display: block;}
	.cx li div{margin-top: 25px}
	.clearfix:after {
	    content:".";
	    display:block;
	    height:0;
	    visibility:hidden;
	    clear:both; 
	}
	input{height: 25px;color:#000}
	button{height: 30px;width: 50px;margin-top: 24px}
	table{overflow: hidden;}
	table .tb_title{height: 60px}
	table .tb_title td{overflow: hidden;}
	.b{font-weight: 600;font-size: 16px}
</style>
<body>
<div class="header">
	<form method="get" action="userInfo.php">
	<center>
		<ul class="cx clearfix">
			<li><div><span>id:</span><input type="value" name="id" value="<?php echo $_REQUEST['id'];?>"></div></li>
			<li><div><span>手机号:</span><input type="value" name="mobile" value="<?php echo $_REQUEST['mobile'];?>"></div></li>
			<li><div><span>到期日:</span><input type="date" name="vipEndTime" value="<?php echo $_REQUEST['vipEndTime'];?>"></div></li>
			<button type="submit">查询</button>
		</ul>
	</center>
	</form>
</div>
<div class="table_con">
	<table>
    	<tr class="tb_title b">
        	  <td width="8%">用户id</td>
            <td width="8%">vip等级</td>
            <td width="10%">头像地址</td>
            <td width="10%">手机号</td>
            <td width="8%">昵称</td>
            <td width="6%">性别</td>
            <td width="12%">vip开始日期</td>
            <td width="12%">vip结束日期</td>
            <td width="26%">操作</td>
        </tr>
        <?php
        	if(empty($rows)){
        	}
        	else{
        		foreach ($rows as $key => $value){
  			
        			if ( $key %2 == 0) {
        				echo " <tr class='tb_title' style='background:#abd4f1' >";
        			}else{
      				  echo " <tr class='tb_title' >";
        			}
       
        ?>	
        	  <td width="8%"><?php echo $value['id'];?></td>
            <td width="8%"><?php echo $value['vipLv'];?></td>
            <td width="10%" style="height:60px"><img style="width:60px;height:60px;border-radius:50%" src="<?php echo $value['ossHeadPic'];?>"/></td>
            <td width="10%"><?php echo $value['mobile'];?></td>
            <td width="8%"><?php echo $value['nickName'];?></td>
            <td width="6%"><?php echo $value['sex'];?></td>
            <td width="12%"><?php echo $value['vipStartTime'];?></td>
            <td width="12%"><?php echo $value['vipEndTime'];?></td>
            <td width="26%">
            	  <input class="bj_btn" onclick="editUserInfo(<?php echo $value['id'];?>)" type="button" value="编辑" />
                <input class="del_btn" type="button" value="删除" />
            </td>
        </tr>
      		<?php
      			}
      		}

      		?>
      	 <?php if($rows>$pageSize):?>
      		  <tr><td colspan="4"><?php echo showPage($page,$totalPage,$queryStr);?></td></tr>
      	 <?php endif;?> 
    </table>
</div>
</body>
<script type="text/javascript">
	function editUserInfo(id){
		window.location="editUserInfo.php?id="+id;

	}
</script>
</html>