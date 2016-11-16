<?php
	for($m=1;$m<=9;$m++){
		for($n=1;$n<=$m;$n++){
			echo "{$m}x{$n}=".($m*$n)." ";
		}
		echo "<br />";
	}
	echo "<hr />";
	$m=1;
	while($m<=9){
		$n=1;
		while($n<=$m){
			echo "{$n}x{$m}=".($n*$m)." ";
			$n++;
		}
		echo "<br />";
		$m++;
	}
	echo "<hr />";
	$n=1;
	do{
		$m=1;
		do{
			echo "{$m}x{$n}=".($m*$n)." ";
			$m++;
		}while($m<=$n);
		echo "<br />";
		$n++;
	}while($n<=9);