<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>海盗湾</title>
		<link rel="stylesheet" type="text/css" href="./02.css" />
	</head>
	<body>
		<div class="header">
			<div class="title">我的图片</div>
			<form id="upload-form" method="post" action="02.php" enctype="multipart/form-data">
				<div>上传</div>
				<input type="file" name="upload" id="upload" />
				<input type="hidden" name="upl_time" id="upl-time" />
			</form>
		</div>
		<div class="content" id="content"></div>
	</body>
	<?php
		require_once("02_1.php");
		
		if(!isset($_SESSION)){
			session_start();
		}
		
		if(isset($_FILES["upload"])){
			if(isset($_POST["upl_time"])){
				if(isset($_SESSION["upl_time"]) && $_POST["upl_time"]==$_SESSION["upl_time"]){
					
				}else{
					upload_pic();
					$_SESSION["upl_time"]=$_POST["upl_time"];
					unset($_FILES["upload"]);
				}
			}
		}
		
		if(isset($_POST["remove"])){
			if(isset($_POST["rm_time"])){
				if(isset($_SESSION["rm_time"]) && $_POST["rm_time"]==$_SESSIO["rm_time"]){
					
				}else{
					rmpic($_POST["remove"]);
					$_SESSION["rm_time"]=$_POST["rm_time"];
				}
			}
		}
		
		if(isset($_POST["download"])){
			if(isset($_POST["down_time"])){
				if(isset($_SESSION["down_time"]) && $_POST["down_time"]==$_SESSION["down_time"]){
					
				}else{
					download_pic($_POST["download"]);
					$_SESSION["down_time"]=$_POST["down_time"];
				}
			}
		}
		
		show_pics();
	?>
</html>