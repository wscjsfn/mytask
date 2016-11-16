<?php
	function code($w=200,$h=100,$n=4){
		$im = imagecreatetruecolor($w,$h);
		$color = imagecolorallocate($im,rand(128,255),rand(128,255),rand(128,255));
		imagefill($im,0,0,$color);
		
		for($i=0;$i<100;$i++){
			$x = rand(0,$w);
			$y = rand(0,$h);
			$color = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
			imagesetpixel($im,$x,$y,$color);
			if($i%10==0){
				$startX = rand(0,$w);
				$startY = rand(0,$h);
				$endX = rand(0,$w);
				$endY = rand(0,$h);
				imageline($im,$startX,$startY,$endX,$endY,$color);
			}
		}
		$str = "abcdefghijklmnopqretuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$len = strlen($str);
		$code = '';
		for($i=0;$i<$n;$i++){
			$index = rand(0,$len-1);
			$code .= $str[$index];
		}
		$_SESSION['code'] = $code;
		$fontsize = ceil(($w-20)/$n);
		$y = ceil($h/2+$fontsize/2);
		imagettftext($im,$fontsize,0,10,$y,$color,'./1.ttf',$code);
		header("content-type:image/png");
		imagepng($im);
		imagedestroy($im);
	}
	code();
