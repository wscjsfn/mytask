var btns3 = document.getElementById("btns3");
var a = document.getElementById("res1");
var b = document.getElementById("res2");
var res = document.getElementById("res3");

function fullEmpty(){
	if(a.value.length < 1 || b.value.length < 1){
		alert("输入不能为空！");
		return false;
	}
	return true;
}
/*function clearRes(){
	document.getElementById("res1").value = '';
	document.getElementById("res2").value = '';
}*/