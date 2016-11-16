<?php
	$arr = array("d"=>100,"b"=>23,"c"=>22,"f"=>22,"e"=>22);
	echo "<br />原数组";
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
	
	$keys = array_keys($arr);
	array_multisort($arr,$keys);
	
	echo "<br />排序后";
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
?>

