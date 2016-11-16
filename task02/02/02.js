function clearRes(){
	document.getElementById("res1").value = '';
	document.getElementById("res2").value = '';
}

function calculator(){
	var a = document.getElementById("res1").value;
	var b = document.getElementById("res2").value;
	var c = document.getElementById("res3").value;	
	var d = 0;
	
	if(((!isNaN(a))&&(!isNaN(b)))){							
				if((a!="")&&(b!="")){
					switch(c){
						case "+":
							d = eval(a) + eval(b);
							break;
							
						case "-":
							d = eval(a) - eval(b);
							break;
							
						case "*":
							d = eval(a) * eval(b);
							break;
							
						case "/":
							if(b!=0){
								d = eval(a) / eval(b);
								break;
								}			
								else{
									alert("除数不能为零！");
									return;
									};
						default:break;		
					}	
				}
				else{
					alert("请输入数字！");				
					return;
				}
				
	}
	else{
		alert("请输入数字！");				
		return;					
	}
	document.getElementById("btns3").innerHTML = d;
}

/*
alert("请输入数字！");
document.getElementById("res1").value="";
document.getElementById("res1").focus();
document.getElementById("res2").value="";
document.getElementById("res2").focus();
return;
*/