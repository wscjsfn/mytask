<?php
	//从网络下载文件
	set_time_limit(0);
	//Support all file types
	//URL Here:
	$url = 'http://somsite.com/some_video.flv';
	$pi = pathinfo($url);
	$ext = $pi['extension'];
	$name = $pi['filename'];
	
	//create a new cURL resource
	$ch = curl_init();
	
	//set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	//grab URL and pass it the browser
	$opt = curl_exec($ch);
	
	//close cURl resource, and free up system resources
	curl_close($ch);
	
	$saveFile = $name.'.'.$ext;
	if(preg_match("/[^0-9a-z._-]/i", $saveFile))
		$saveFile = md5(microtime(true)).'.'.$ext;
	
	$handle = fopen($saveFile, 'wb');
	fwrite($handle, $opt);
	fclose($handle);
?>