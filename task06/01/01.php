<?php
	function arr($m,$n){
		$arr1 = array();
		for($i=0;$i<$n;$i++){
			$arr1[] =$m+$i*2;
		}
		return $arr1;
	}
	$j = arr(51,40);
	echo "<pre>";
	print_r($j);
	echo "<pre>";
?>