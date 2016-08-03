<?php
require_once '../include.php';
//用来验证用户有没有登录
checkLogined();
$fdTitle=$_POST['fdTitle'];      //反馈标题
$fdContent=$_POST['fdContent'];  //反馈内容
$fbStatus=$_POST['fbStatus'];    //处理状态
$sql="select * from userfeedback ";
$queryStr="";
$l="&";
$quStr=""; //拼装条件；

//---------------------
//拼接sql.




if ($fdTitle !='') {
	$quStr = $quStr." fdTitle LIKE"."'%$fdTitle%' ";
	$queryStr=$queryStr." fdTitle = ".$fdTitle;
}

if ($fdContent !='') {
	$queryStr=$queryStr." fdContent = ".$fdContent;
	if ($quStr!='') {
		$quStr = $quStr." and "." fdContent LIKE"."'%$fdContent%'";
	}else{
		$quStr = $quStr." fdContent LIKE"."'%$fdContent%'";
	}
}

if (trim($fbStatus) !='') {
	$queryStr=$queryStr." fbStatus = ".$fbStatus;
	
	if ($quStr != '') {
		$quStr = $quStr." and "." fbStatus = ".$fbStatus." and hasRead = 1";
	}else{
		$quStr = $quStr." fbStatus = ".$fbStatus." and hasRead = 1";	
	}
}else{
	if ($quStr != '') {
		$quStr = $quStr." and hasRead = 0";
	}else{
		$quStr = $quStr." hasRead = 0";	
	}

}

//只要有条件，就拼接，否则就不拼接
if ($quStr!='') {
	$sql = $sql." where " .$quStr;
}


//-----------------------

/*
if(!empty($fdTitle)&&!empty($fdContent)&&!empty($fbStatus)){
	$sql=$sql." where fdTitle LIKE"."'%$fdTitle%'"." and "."fdContent LIKE"."'%$fdContent%'"." and fbStatus=".$fbStatus." and "."hasRead=1";
	$queryStr=$queryStr."fdTitle=".$fdTitle.$l."fdContent=".$fdContent.$l."fbStatus=".$fbStatus.$l."hasRead=1";
}else if(!empty($fdTitle)&&!empty($fdContent)){
	$sql=$sql." where fdTitle LIKE"."'%$fdTitle%'"." and "."fdContent LIKE"."'%$fdContent%'"." and "."hasRead=0";
	$queryStr=$queryStr."fdTitle=".$fdTitle.$l."fdContent=".$fdContent.$l."hasRead=0";
}else if(!empty($fdTitle)&&!empty($fbStatus)){
	echo "<br/>";
	
	$sql=$sql." where fdTitle LIKE"."'%$fdTitle%'"." and fbStatus=".$fbStatus." and "."hasRead=1";
	$queryStr=$queryStr."fdTitle=".$fdTitle.$l."fbStatus=".$fbStatus.$l."hasRead=1";
}else if(!empty($fdContent)&&!empty($fbStatus)){
	$sql=$sql." where fdContent LIKE"."'%$fdContent%'"." and fbStatus=".$fbStatus." and "."hasRead=1";
	$queryStr=$queryStr."fdContent=".$fdContent.$l."fbStatus=".$fbStatus.$l."hasRead=1";
}else if(!empty($fdTitle)){
	$sql=$sql." where fdTitle LIKE"."'%$fdTitle%'"." and "."hasRead=0";
	$queryStr=$queryStr."fdTitle=".$fdTitle.$l."hasRead=0";
}else if(!empty($fdContent)){
	$sql=$sql." where fdContent LIKE"."'%$fdContent%'"."and "."hasRead=0";
	$queryStr=$queryStr."fdContent=".$fdContent.$l."hasRead=0";
}else if(!empty(trim($fbStatus))){
	$sql=$sql." where fbStatus=".$fbStatus." and "."hasRead=1";
	print_r($sql);
	$queryStr=$queryStr."fbStatus=".$fbStatus.$l."hasRead=1";
}else{
	$sql=$sql." where hasRead=0";
}*/
$row=allFeedBack($sql);
$rows=pageSql($row,$sql,3);

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
	select{color:#000;margin-top: 26px}
	button{height: 30px;width: 50px;margin-top: 24px}
	.list{background: #eff3f5;margin-left: 15px;margin-top: 10px}
	ul{list-style: none;}
	.list ul li{font-size: 20px;}
	table{overflow: hidden;width: 100%}
	table .tb_title{height: 60px}
	table .tb_title td{overflow: hidden;}
	.b{font-weight: 600;font-size: 16px;}
	table .tb_title .box{display:block;overflow:hidden;word-break:keep-all;white-space:nowrap;text-overflow:ellipsis;width:80px;margin-left: 10px;float: left;}
</style>
<body>
<div class="header">
	<form method="post" action="userfeedback.php">
	<center>
		<ul class="cx clearfix">
			<li><div><span>反馈标题:</span><input type="text" value="<?php echo $_REQUEST['fdTitle'];?>" name="fdTitle"></div></li>
			<li><div><span>反馈内容:</span><input type="text" value="<?php echo $_REQUEST['fdContent'];?>" name="fdContent"></div></li>
			<li>
				<select name="fbStatus" id="fbStatus">
					<option value=" ">无</option>
					<option value="0">没有用</option>
					<option value="1">转产品</option>
					<option value="2">转运营</option>
					<option value="3">不处理</option>
				</select>
			</li>
			<button class="btn" type="submit">查询</button>
		</ul>
	</center>
	</form>
</div>
<div class="list">
	<table>
    	<tr class="tb_title b">
        	<td width="10%">反馈id</td>
            <td width="20%">反馈标题</td>
            <td width="25%">反馈内容</td>
            <td width="25%">反馈时间</td>
            <td width="20%">反馈状态</td>
          

        </tr>
	<?php
		if(empty($rows)){
			echo "暂无此查询结果";
		}else{
			foreach ($rows as $key => $value){
				if ( $key %2 == 0) {
	    				echo " <tr class='tb_title' style='background:#abd4f1' >";
	    			}else{
	  					echo " <tr class='tb_title'>";
	    			}
	?>
					<td width="10%"><?php echo $value['fbId'];?></td>
		            <td width="20%"><?php echo $value['fdTitle'];?></td>
		            <td width="25%"><span class="box"><?php echo $value['fdContent'];?></span><a style="font-size:12px;margin-left:12px" href="userFeedBackContent.php?fbId=<?php echo $value['fbId'];?>" style="font-size:16px">查看全部</a></td>
		            <td width="25%"><?php echo $value['createTime'];?></td>
		            <td width="20%"><?php echo $value['fbStatus'];?></td>
		            
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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		$(".btn").on("click",function(){
		 var fbStatus =	$("#fbStatus").find("option:selected").attr("selected:selected"); 
		 	console.log(fbStatus);

		});
		
	});
</script>
</html>