window.onload = function(){	
	var a = document.getElementsByTagName("input");
	for (var i = 0; i < a.length; i++){
			a[i].onclick = function(){
				for (var j = 0; j < a.length; j++){
					a[j].value = "哈哈";
				}
				this.value = "呜呜";
			}
	}	
}
