<?php
//连接数据库
require_once '../include.php';
// $sql="select * from userinfo";
// $totalRows=getResultNum($sql);
// //echo $totalRows;

// $pageSize=2;
// //得到总页码数
// $totalPage=ceil($totalRows/$pageSize);
// $page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
// if($page<1||$page==null||!is_numeric($page)){
// 	$page=1;
// }
// if($page>=$totalPage)$page=$totalPage;
// $offset=($page-1)*$pageSize;
// $sql="select *from userinfo limit {$offset},{$pageSize}";
// //echo $sql;
// $rows=fetchAll($sql);
// echo showPage($page,$totalPage,$sep="&nbsp;");
// print_r($rows);
function pageSql($row,$sql,$pageSize){
	
	global $page;
	global $totalPage;
	$totalRows=count($row);
	// //得到总页码数
	$totalPage=ceil($totalRows/$pageSize);

	$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
	if($page<1||$page==null||!is_numeric($page)){
		$page=1;
	}
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql=$sql." limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);	
	return $rows;
}
function showPage($page,$totalPage,$queryStr,$sep="&nbsp;"){	
	$where="&".$queryStr;
	$url=$_SERVER['PHP_SELF'];
	$index=($page==1)?"首页":"<a href='{$url}?page=1{$where}'>首页</a>";
	$last=($page==$totalPage)?"尾页":"<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
	$prev=($page==1)?"上一页":"<a href='{$url}?page=".($page-1)."{$where}'>上一页</a>";
	$next=($page==$totalPage)?"下一页":"<a href='{$url}?page=".($page+1)."{$where}'>下一页</a>";
	$str="总共{$totalPage}页、当前是第{$page}页";
	for($i=1;$i<=$totalPage;$i++){
		//当前页面无连接
		if($page==$i){
			$p.="[{$i}]";
		}else{
			$p.="<a href='{$url}?page={$i}'>[{$i}]</a>";
		}
	}
	$pageStr=$str.$sep.$index.$sep.$prev.$sep.$p.$sep.$next.$sep.$last;
	return $pageStr;
}







?>