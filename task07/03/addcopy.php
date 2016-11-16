<?php
	addcopy("images/1.jpg","images/2.jpg",9,60);
	/*
	$dst_dir:目标图片路径
	$src_dir:水印图片路径
	$pos:水印位置
		1.顶部居左
		2.顶部居中
		3.顶部居右
		4.中部居左
		5.中部居中
		6.中部居右
		7.底部居左
		8.底部居中
		9.底部居右
	$opa:水印透明度
	*/
	function addcopy($dst_dir,$src_dir,$pos,$opa){
		$dst_im=generate_img($dst_dir);
		$src_im=generate_img($src_dir);
		
		if($dst_im == null || $src_im == null){
			echo "图片不存在";
			return;
		}
		
		$dst_size=getimagesize($dst_dir);
		$dst_w=$dst_size[0];
		$dst_h=$dst_size[1];
		$dst_x=0;
		$dst_y=0;
		
		$src_size=getimagesize($src_dir);
		$src_w=$src_size[0];
		$src_h=$src_size[1];
		
		if($dst_w<$src_w || $dst_h<$src_h){
			$resize_arr=resize_img($dst_w,$dst_h,$src_w,$src_h,$src_im);
			$src_im=$resize_arr[0];
			$src_w=$resize_arr[1];
			$src_h=$resize_arr[2];
		}
		
		switch($pos){
			case 1:
				$dst_x=0;
				$dst_y=0;
				break;
			case 2:
				$dst_x=round(($dst_w-$src_w)/2);
				$dst_y=0;
				break;
			case 3:
				$dst_x=$dst_w-$src_w;
				$dst_y=0;
				break;
			case 4:
				$dst_x=0;
				$dst_y=round(($dst_h-$src_h)/2);
				break;
			case 5:
				$dst_x=round(($dst_w-$src_w)/2);
				$dst_y=round(($dst_h-$src_h)/2);
				break;
			case 6:
				$dst_x=$dst_w-$src_w;
				$dst_y=round(($dst_h-$src_h)/2);
				break;
			case 7:
				$dst_x=0;
				$dst_y=$dst_h-$src_h;
				break;
			case 8:
				$dst_x=round(($dst_w-$src_w)/2);
				$dst_y=$dst_h-$src_h;
				break;
			case 9:
				$dst_x=$dst_w-$src_w;
				$dst_y=$dst_h-$src_h;
				break;
			default:
				break;
		}
		
		imagecopymerge($dst_im,$src_im,$dst_x,$dst_y,0,0,$src_w,$src_h,$opa);
		header("content-type:image/jpeg");
		imagejpeg($dst_im);
		
		imagedestroy($dst_im);
		imagedestroy($src_im);
	}

	function get_type($dir){		//获取图片文件的后缀名
		$i=strrpos($dir,".");
		$type=strtolower(substr($dir,$i));
		return $type;
	}
	
	function generate_img($dir){	//由路径生成图片
		if(!file_exists($dir)){
			return false;
		}
		$type=get_type($dir);
		if($type==".jpg" || $type==".ipeg"){
			$im=imagecreatefromjpeg($dir);
		}else if($type==".png"){
			$im=imagecreatefrompng($dir);
		}else if($type==".gif"){
			$im=imagecreatefromgif($dir);
		}
		if($im!=null){
			return $im;
		}
		return false;
	}
	
	//如果水印图片超出目标图片尺寸
	function resize_img($dst_w,$dst_h,$src_w,$src_h,$src_im){
		$scale_w=$src_w/$dst_w;
		$scale_h=$src_h/$dst_h;
		
		if($scale_w>1 || $scale_h>1){
			$scale=max(array($scale_w,$scale_h));
			
			$w=round($src_w/$scale);
			$h=round($src_h/$scale);
			$im=imagecreatetruecolor($w,$h);
			imagecopyresampled($im,$src_im,0,0,0,0,$w,$h,$src_w,$src_h);
			return array($im,$w,$h);
		}
		return false;
	}
?>