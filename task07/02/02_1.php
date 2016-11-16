<script type="text/javascript" src="./02.js"></script>
<?php
	/*
		上传图片并判断是否为图片以及图片格式
	*/
	function upload_pic(){
		if($_FILES["upload"]["error"]>0){
				echo "<script>alert('上传出错了！'）;</script>";
				return;
		}
		
		$type=get_img_type($_FILES["upload"]["name"]);
		if($type!= ".jpg" && $type!= ".jpeg" && $type!= ".png" && $type!= ".gif"){
			echo "<script>alert('只能上传jpg,jpeg,png,gif格式的图片！');</script>";
			return;
		}
		
		if($_FILES["upload"]["size"]>1024*1024*2){
			echo "<script>alert('上传的图片大小不能超过2M');</script>";
			return;
		}
		/*
			对上传的图片重命名，防止重名或出现中文名称而造成乱码等问题
		*/
		$img_name=date('YmdHis').rand(1000,9999).$type;		
		$img_dir="./images/".$img_name;
		if(!file_exists($img_dir)){
			move_uploaded_file($_FILES["upload"]["tmp_name"],$img_dir);
			adjust_img($img_name);
			write_file($img_name);
		}
	}
	
	function get_img_type($img_name){		//获得图片文件扩展名
		$i=strrpos($img_name,".");
		$type=strtolower(substr($img_name,$i));
		return $type;
	}
	
	function get_thumb_name($img_name){		//获取缩略图文件名
		$i=strrpos($img_name,".");
		$thumb_name=substr($img_name,0,$i)."_thumb".get_img_type($img_name);
		return $thumb_name;
	}
	
	function adjust_img($img_name){			//缩放并裁剪图片，生成缩略图文件
		$type=get_img_type($img_name);		//获取原图片
		$src_im=null;
		$src_dir="./images/".$img_name;
		if($type==".jpg" || $type==".jpeg"){
			$src_im=imagecreatefromjpeg($src_dir);
		}else if($type==".png"){
			$src_im=imagecreatefrompng($src_dir);
		}else if($type==".gif"){
			$src_im=imagecreatefromgif($src_dir);
		}if($src_im==null){
			return;
		}
		
		$src_size=getimagesize($src_dir);		//缩放图片
		$src_w=$src_size[0];
		$src_h=$src_size[1];
		$scale_w=$src_w / 100;
		$scale_h=$src_h / 100;
		$scale = min(array($scale_w,$scale_h));
		$mid_w=$src_w / $scale;
		$mid_h=$src_h / $scale;
		$mid_im=imagecreatetruecolor($mid_w,$mid_h);
		imagecopyresampled($mid_im,$src_im,0,0,0,0,$mid_w,$mid_h,$src_w,$src_h);
		
		$im=imagecreatetruecolor(100,100);		//裁剪图片
		$x=round(($mid_w - 100)/2);
		$y=round(($mid_h - 100)/2);
		imagecopy($im,$mid_im,0,0,$x,$y,100,100);
		$dir="./images/".get_thumb_name($img_name);
		if($type==".jpg" || $type==".jpeg"){
			header("content-type","image/jpeg");
			imagejpeg($im,$dir);
		}else if($type==".png"){
			header("content-type","image/png");
			imagepng($im,$dir);
		}else if($type==".gif"){
			header("content-type","image/gif");
			imagegif($im,$dir);
		}
		imagedestroy($src_im);
		imagedestroy($mid_im);
		imagedestroy($im);
	}
	
	function write_file($img_name){		//上传图片后将图片的信息写入到文件
		$file_dir="./data.txt";
		$file=fopen($file_dir,"a");		
		$img_dir="./images/".$img_name;
		$fsize=filesize($img_dir);
		if($fsize>1024*1024){
			$fsize=round($fsize/1024/1024,2)."MB";
		}else if($fsize>1024){
			$fsize=round($fsize/1024,2)."KB";
		}else{
			$fsize.="字节";
		}
		
		date_default_timezone_set("Asia/Shanghai");
		$t=date("YmdHis");
		$str=$img_name."|".$fsize."|".$t."\n";
		fwrite($file,$str);
		fclose($file);
	}
	
	function read_file() {			//读取文件中的图片信息到数组
        $file_dir="./data.txt";
        if(!file_exists($file_dir)) {
            return false;
        }

        $img_arr=array();
        $file=fopen($file_dir,"r");
        while($img_info=fgets($file)) {
            $img_info=trim($img_info);
            array_push($img_arr,explode("|",$img_info));
        }
        fclose($file);

        return $img_arr;
    }
	
	function show_pics(){		//展示图片
		$img_arr=read_file();
		if(!$img_arr){
			return;
		}
		
		for($i=0; $i<count($img_arr); $i++){
			$img_info=$img_arr[$i];
			$img_name=$img_info[0];
			$upl_time=$img_info[1];
			$img_size=$img_info[2];
			echo "<script>appendItem('{$img_name}','{$upl_time}','{$img_size}');</script>";
		}
	}
	
	function rmpic($img_name){		//删除图片
		$img_arr=read_file();
		if(!$img_arr){
			return;
		}
		
		$img_dir="./images/".$img_name;
		if(file_exists($img_dir)){
			unlink($img_dir);
		}
		
		$thumb_name=get_thumb_name($img_name);
		$thumb_dir="./images/".$thumb_name;
		if(file_exists($thumb_dir)){
			unlink($thumb_dir);
		}
		
		for($i=0;$i<count($img_arr);$i++){
			$img_info=$img_arr[$i];
			if($img_name==$img_info[0]){
				array_splice($img_arr,$i,1);
				break;
			}
		}
		
		$file_dir="./data.txt";
		$file=fopen($file_dir,"w");
		$str="";
		for($i=0;$i<count($img_arr);$i++){
			$img_info=$img_arr[$i];
			$str .= $img_info[0]."|".$img_info[1]."|".$img_info[2]."\n";
		}
		fwrite($file,$str);
		fclose($file);
	}
	
	function download_pic($img_name){		//下载图片
		$type=get_img_type($img_name);
		if($type==".jpg" || $type=="./jpeg"){
			header("content-type","image/jpeg");
		}else if($type==".png"){
			header("content-type","image/png");
		}else if($type==".gif"){
			header("content-type","image/gif");
		}
		
		$img_dir="./images/".$img_name;
		header("content-disposition:attachment;filename=".$img_dir);
		header("content-length",filesize($img_dir));
		
		ob_clean();
		readfile($img_dir);
		flush();
	}
?>