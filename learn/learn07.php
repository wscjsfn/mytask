<?php
	//ͨ��cURL��ȡRSS������
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,'https://feedburner.google.com/api/awareness/1.0/GetFeedData?id=7qkmib4r9rscbplq5qgadiiq4');
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);
	$content = curl_exec($ch);
	$subscribers = get_match('/circulation="(.*)"/isU',$content);
	curl_close($ch);
?>