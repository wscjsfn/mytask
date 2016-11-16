<?php
	//强制下载文件
	$filename = $_GET['file'];//Get the from the URL
	//Query the file ID
	$query = sprintf("SELECT*FROM tableName WHERE id = '%s'", mysql_real_escape_string($filename));
	$sql = mysql_query($query);
	if)(mysql_num_rows($sql) > 0){
		$row = mysql_fetch_array($sql);
		//Set some headers
		header("Pragma:public");
		header("Expires:0");
		header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
		header("Content_Type:application/force-download");
		header("Content_Type:application/octet-stream");
		header("Content_Type:application/download");
		header("Content_Disposition:attachment; filename=".basename($row['FileName']).";");
		header("Content-Transfer-Encoding:binary");
		header("Content-Length:".filesize($row['fileName']));
		
		@readfile($row['FileName']);
		exit(0);
	}else{
		header("Location:/");
		exit;
	}
?>