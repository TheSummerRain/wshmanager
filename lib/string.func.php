<?php
function buildRandomString($type=1,$length=4){

	if($type==1){
		$chars=join("",range(0,9));
	}elseif($type==2){
		$chars=join("",array_merge(range("a", "z"),range("A", "Z")));
	}elseif($type==3){
		$chars=join("",array_merge(range("a", "z"),range("A", "Z"),range("0", "9")));
	}
	if($length>strlen($chars)){
		exit("字符串长度不够");
	}
	//打乱字符串
	$chars=str_shuffle($chars);
	//从0开始截取字符串
	return substr($chars,0,$length);

};



?>