<?php
	//搜索排名
	function page_rank($page, $type = 'alexa'){
		switch($type){
			case 'alexa':
				$url = 'http://alexa.com/siteinfo/';
				$handle = fopen($url.$page, 'r');
				break;
			case 'google':
				$url = 'http://google.com/search?client=navclient-auto&ch=6-1484155081&feature=Rank&q=info:';
				$handle = fopen($url.$page, 'r');
				break;
		}
		$content = stream_get_contents($handle);
		fclose($handle);
		$content = preg_replace("~(n|t|ss+~",'',$content);
		switch($type){
			case 'alexa':
				if(preg_match('~<div class="data(down|up)"><img.+?>(.+?)</div>~im',$content,$matches)){
					return $match[2];
				}else{
					return FALSE;
				}
				break;
			case 'google':
				$rank = explode(':',$content);
				if($rank[2] != '')
					return $rank[2];
				else
					return FALSE;
				break;
			default:
			return FALSE;
			break;
		}
	}
	
	//Alexa Page Rank:
	echo 'Alexa Rank:'.page_rank('techug.com');
	echo'';
	//Google Page Rank:
	echo 'Google Rank:'.page_rank('techug.com','google');
?>