<?php
	function arr($arr){
		$num = count($arr);
		if($num > 10){

			$arr_firstpart=array_slice($arr,0,-5,true);
			$arr_lastpart=array_slice($arr,-5);
			
		}else{
			echo "数组不超过10个元素，请重新输入";
			exit();
		}
		$arr_new = array_merge($arr_lastpart,$arr_firstpart);
		return $arr_new;		
	}
	$arr = array("a"=>1,2,3,4,5,6,"b"=>7,8,"c"=>9,10,11);
	echo "<pre>";
	print_r($arr);
	echo "<br />拼接后<br />";
	print_r(arr($arr));
	echo "</pre>";
?>