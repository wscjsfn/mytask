<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>简易计算器</title>
		<link rel="stylesheet" type="text/css" href="./01.css">
	</head>
	<body>
		<div id="main">
			<form method="post" action="" onsubmit="return fullEmpty()" id="btns4">
				<input type="text" id="res1" name="res1" placeholder="请输入数字" value="<?php echo @$_POST["res1"]?>" />
				<select id="res3" name="res3">
					<option value="+" <?php if(@$_POST["res3"]=="+") echo "selected";?> >+</option>
					<option value="-" <?php if(@$_POST["res3"]=="-") echo "selected";?> >-</option>
					<option value="*" <?php if(@$_POST["res3"]=="*") echo "selected";?> >*</option>
					<option value="/" <?php if(@$_POST["res3"]=="/") echo "selected";?> >/</option>
					<option value="%" <?php if(@$_POST["res3"]=="%") echo "selected";?> >%</option>
				</select>
				<input type="text" id="res2" name="res2" placeholder="请输入数字" value="<?php echo @$_POST["res2"]?>" />
				<div id="btns2">
					<!--button onclick="clearRes(this)" class="menu1">AC</button-->				
					<button type="submit" name="submit" class="menu2">=</button>
				</div>
			</form>
			<div class="clear"></div>
			<div id="btns3"></div>
		</div>
	<body>
	<script src="./01.js"></script>
		<?php
			//if(isset($_POST["res1"]) && isset($_POST["res2"]) && isset($_POST["res3"])){

				$a = $_POST["res1"];
				$b = $_POST["res2"];
				$res = $_POST["res3"];
				$r = "";
				/*echo "<script>".
				"a.value = '{$a}';".
				"b.value = '{$b}';".
				"res.value = '{$res}';".
				"</script>";*/
				if(!is_numeric($a) || !is_numeric($b)){
					$r = "运算符两边必须是数字!";
				}else{
					$a=$a-0;
					$b=$b-0;
					switch($res){
						case "+":
							$r=$a+$b;
							break;
						case "-":
							$r=$a-$b;
							break;
						case "*":
							$r=$a*$b;
							break;
						case "/":
							if($b!=0){
								$r=$a/$b;
							}else{
								$r = "除数不能为零！";
							}break;
						case "%":
							if(!is_int($a) || !is_int($b)){
								$r = "求余运算两边必须是整数！";
							}else if($b==0){
								$r = "除数不能为零！";
							}else{
								$r=$a%$b;
							}break;
						default:
							break;
					}
				}
				if(is_numeric($r)){
					echo "<script>btns3.innerHTML = ' {$a} {$res} {$b} = {$r}';</script>";
				}else{
					echo "<script>btns3.innerHTML = '{$r}';</script>";
				}
			//}
		?>
</html>