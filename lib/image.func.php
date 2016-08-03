<?php
require_once 'string.func.php';
//通过GD库做验证码
//创建画布
function verifyImage($type=1,$length=4,$pixel=3,$line=2,$sess_name="verify"){
	header("Content-type: image/gif");
	$width=80;
	$height=25;
	$image=imagecreatetruecolor($width,$height);
	$white=imagecolorallocate($image, 255, 255, 255);
	$black=imagecolorallocate($image, 0, 0, 0);
	//用矩形填充画布
	imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
	$type=1;
	$length=4;
	$chars=buildRandomString($type,$length);

	//生成的验证码要和用户输入的验证码做对比
	
	$_SESSION[$sess_name]=$chars;
	$fontfiles=array("SIMYOU.TTF");
	for($i=0;$i<$length;$i++){
		$size=mt_rand(14,18);
		$angle=mt_rand(-15,15);
		$x=5+$i*$size;
		$y=mt_rand(20,26);
		$fontfile="../fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)];
		$color=imagecolorallocate($image, mt_rand(50,90), mt_rand(80,200), mt_rand(90,180));
		$text=substr($chars,$i,1);
		imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
	}

	//往画布添加黑色小点干扰元素
	for($i=0;$i<50;$i++){
		imagesetpixel($image, mt_rand(0,$width-1), mt_rand(0,$height-1), $black);
	}
	 //建立gif图形

	if($line){
		for($i=1;$i<$line;$i++){
			$color=imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
			imageline($image, mt_rand(0,$width-1), mt_rand(0,$height-1),mt_rand(0,$width-1), mt_rand(0,$height-1), $color);
		}
	}
	imagegif($image);
	//结束图形，释放内存空间
	imagedestroy($image);
}









