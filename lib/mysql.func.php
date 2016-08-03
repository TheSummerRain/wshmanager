<?php
error_reporting(E_ALL & ~E_NOTICE);
/*
连接数据库操作
*/
function connect(){
	$link=@mysql_connect(DB_HOST,DB_USER,DB_PWD)or die("数据库连接失败Error:".mysql_errno().":".mysql_errno());
	mysql_set_charset(DB_CHARSET);
	mysql_select_db(DB_NAME) or die("指定数据库打开失败");
	return $link;
}




/*
记录更新操作
*/
//update 表名 set username = 'king' where id=1;
function update($table,$array,$where,$id){
	foreach($array as $key => $val){
			if($str==null){
				$sep=" ";
			}else{
				$sep=",";
			}
			$str.= $sep.$key."='".$val."'";
		}
		$sql="update {$table} set{$str}"." where ". $where ."=". $id;
		@mysql_query($sql);
		return mysql_affected_rows();
	
}




/*
记录删除操作
*/
function delete($table,$where=null){
	$where=$where==null?null:"where".$where;
	$sql="delete from{$table}{$where}";
	mysql_query($sql);
	return mysql_affected_rows();
}




/*
查询得到指定的一条记录
*/
function fetchOne($sql,$result_type=MYSQL_ASSOC){
	$result=@mysql_query($sql);
	$row=@mysql_fetch_array($result,$result_type);
	return $row;
}



/*
查询得到结果集所有记录
*/
function fetchAll($sql,$result_type=MYSQLI_BOTH){
	$result=@mysql_query($sql);
	while ($row=@mysql_fetch_array($result,$result_type)) {
		$rows[]=$row;
	}
	return $rows;
}



/*
得到结果集中的条数
*/

function getResultNum($sql){
	$result=@mysql_query($sql);
	return @mysql_num_rows($result);
}