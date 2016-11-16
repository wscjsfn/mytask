function chaxun(){
	
	var res = document.getElementById("res").value;
	var show = document.getElementById("pic");
		      
	if(res==""){
		alert("请输入输入不小于1984年的年份整数！");
		return;
		}
	if(isNaN(res)){
		alert("请输入输入不小于1984年的年份整数！");
    document.getElementById("res").value="";
    document.getElementById("res").focus();
		return;
		}
	if(res < 1984){
		alert("请输入输入不小于1984年的年份整数！");
    document.getElementById("res").value="";
    document.getElementById("res").focus();
		return;
		}
	var a = (res-1984)%12;
	if(a == 0){
		show.src = "../image/1.png";
		}
		else if(a == 1){
			show.src = "../image/2.png";
			}
			else if(a == 2){
				show.src = "../image/3.png";
				}
				else if(a == 3){
					show.src = "../image/4.png";
					}
					else if(a == 4){
						show.src = "../image/5.png";
						}
						else if(a == 5){
							show.src = "../image/6.png";
							}
							else if(a == 6){
								show.src = "../image/7.png";
								}
								else if(a == 7){
									show.src = "../image/8.png";
									}
									else if(a == 8){
										show.src = "../image/9.png";
										}
										else if(a == 9){
											show.src = "../image/10.png";
											}
											else if(a == 10){
												show.src = "../image/11.png";
												}
												else if(a == 11){
													show.src = "../image/12.png";
													}
}									
