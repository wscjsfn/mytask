<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>棋阵</title>
        <style>
			body{
				margin:10px;
				padding:10px;
			}
			.td-black{
				background:black;
				width:40px;
				height:40px;
			}
			.td-white{
				background:white;
				width:40px;
				height:40px;
			}
		</style>
    </head>
    <body>
        <?php
            chess(10);
        ?>
    </body>
		<?php
			function chess($n){		//输出n*n的棋阵
				if($n < 1) {
					return;
				}
				echo '<table class="tab" border="1" bordercolor="black" cellspacing="0">';
				for ($i = 0; $i < 10; $i++) {
					echo "<tr>";
					for ($j = 0; $j < 10; $j++) {	//行数和列数的和是奇数显黑色,偶数显白色
						if (($i + $j) % 2) {
							echo '<td class="td-black"></td>';
						} else {
							echo '<td class="td-white"></td>';
						}
					}
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
</html>