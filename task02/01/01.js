function chaxun(){

	var res = document.getElementById("res").value;
	var show = document.getElementById("main3");
		      
	if(res==""){
		alert("请输入0-100之间的整数！");
		return;
		}
	if(isNaN(res)){
		alert("请输入0-100之间的整数！");
    document.getElementById("res").value="";
    document.getElementById("res").focus();
		return;
		}
	if((res>100)||(res<0)){
		alert("请输入0-100之间的整数！");
    document.getElementById("res").value="";
    document.getElementById("res").focus();
		return;
		}
	if(res >= 90){
		show.innerHTML = "优秀";
		}else if(res >= 80){
			show.innerHTML = "良好";
			}else if(res >= 70){
				show.innerHTML = "可以";
				}else if(res >= 60){
					show.innerHTML = "及格";
					}else{
						show.innerHTML = "很差";
					}
	}									
