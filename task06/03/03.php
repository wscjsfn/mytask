<?php
    function convert($pattern,$str) {
		$str = explode($pattern,$str);		
		$length = count($str);
		for($i=0;$i<$length;$i++){
			$str[$i] = ucfirst($str[$i]);
		}		
		$str = implode($str);
		return $str;		
    }

    $str = "close_door";
    echo "转换前的字符串<br />";
    echo $str;
    echo "<br />";

    $str = convert("_",$str);
    echo "转换后的字符串<br />";
    echo $str;


		/*
        $str = str_replace("_", " ", $str);
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
		*/
?>	