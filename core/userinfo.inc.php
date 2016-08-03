<?php
/*
用户基础信息查询
*/
function checkuserinfo($sql){
	return fetchAll($sql);
}
/*
根据条件查询数据
*/

function queryuserinfo($id,$mobile,$vipEndTime){
	$sql="select * from userinfo where id='{$id}' or mobile='{$mobile}'";
	if ( is_null($vipEndTime)) {
	}else{
		$sql = $sql . " or vipEndTime <= "."'". $vipEndTime."'";
	}
	$row=checkuserinfo($sql);
	
}