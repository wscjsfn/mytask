window.onload = function(){
	var btn4 = document.getElementById("btn4");
	var btn5 = document.getElementById("btn5");
	var btn6 = document.getElementById("btn6");
	var btn7 = document.getElementById("btn7");
	
	btn4.onfocus = function(){
		if(this.value == "请输入用户名"){
			this.value = "";
			this.type = "username";
		}
	}
	btn4.onblur = function(){
		if(!this.value){
			this.type = "username";
			this.value = "请输入用户名";			
		}
	}
	
	btn5.onfocus = function(){
		if(this.value == "请输入密码"){
			this.value = "";
			this.type = "password";
		}
	}
	btn5.onblur = function(){
		if(!this.value){
			this.type = "text";
			this.value = "请输入密码";
		}
	}
	
	btn6.onfocus = function(){
		if(this.value == "请输入邮箱帐号"){
			this.value = "";
			this.type = "email";
		}
	}
	btn6.onblur = function(){
		if(!this.value){
			this.type = "email";
			this.value = "请输入邮箱帐号";
		}
	}
	
	btn7.onfocus = function(){
		if(this.value == "请输入手机号码"){
			this.value = "";
			this.type = "mobile";
		}
	}
	btn7.onblur = function(){
		if(!this.value){
			this.type = "mobile";
			this.value = "请输入手机号码";
		}
	}
}