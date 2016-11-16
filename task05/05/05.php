<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>闰年查询</title>
		<link rel="stylesheet" type="text/css" href="./05.css" />
		<style></style>
	</head>
	<body>
		<div id="main1">
			<form id="main2" method="post" action="">
				<input type="text" name="year" id="res" autocomplete="off" placeholder="输入年份" value="<?php
					if(isset($_POST["year"])){
						echo $_POST["year"];
					}
					?>"
				/>
				<button type="submit" name="submit">查&nbsp;&nbsp;询</button>
				<div type="text2" id="main3" >
					<?php
						if(isset($_POST["year"])){
							$year=$_POST["year"];
							if(!is_numeric($year)){
								echo "年份必须是数字";
							}else{
								$year=$year-0;
								if(!is_int($year)){
									echo "年份必须是整数";
								}else if($year<1){
									echo "年份必须大于零";
								}else if($year>9999){
									echo "年份不能超过四位数";
								}				
								else{
									if($year%100){
										if($year%4){
											echo "平年";
										}else{
											echo "闰年";
										}
									}
									else{
										if($year%400){
											echo "平年";
										}else{
											if($year%3200){
												echo "闰年";
											}else{
												echo "平年";
											}
										}
									}
								}
							}
						}
					?>					
				</div>
			</form>
		</div>
	</body>	
</html>
