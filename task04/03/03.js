var actives = document.getElementsByClassName("active");
var activeH = actives[0];
var activeDiv = actives[1];
function changeTab(obj){
    var nextNode = null;
    activeH.removeAttribute("class");
    activeH = obj;
    obj.setAttribute("class","active");
    activeDiv.removeAttribute("class");
    if(obj.nextSibling.nodeType == 3){
        nextNode = obj.nextSibling.nextSibling;
       
    }else{
        nextNode = obj.nextSibling;
    }
    nextNode.setAttribute("class","active");
    activeDiv = nextNode;
}

var selectAll = Array();
var selectNo = Array();
var rev = Array();
var inputs = Array();
for(var m = 1; m < 4; m++){
	selectAll[m] = document.getElementById("selectAll"+m);
	selectNo[m] = document.getElementById("selectNo"+m);
	rev[m] = document.getElementById("rev"+m);
	inputs[m] = document.getElementById("ipt"+m).getElementsByTagName("input");

	selectAll[m].onclick = function(){
		for(var i in inputs[this.getAttribute("data-id")]){
			inputs[this.getAttribute("data-id")][i].checked = true;
		}
	}
	selectNo[m].onclick = function(){
		for(var i in inputs[this.getAttribute("data-id")]){
			inputs[this.getAttribute("data-id")][i].checked = false;
		}
	}
	rev[m].onclick = function(){
		for(var i=0; i < inputs[this.getAttribute("data-id")].length; i++){
			inputs[this.getAttribute("data-id")][i].checked = !inputs[this.getAttribute("data-id")][i].checked;
		}
	}
}

/*
var selectAll1 = document.getElementById("selectAll1");
var selectNo1 = document.getElementById("selectNo1");
var rev1 = document.getElementById("rev1");
var inputs1 = document.getElementById("ipt1").getElementsByTagName("input");

selectAll1.onclick = function(){
	for(var i in inputs1){
		inputs1[i].checked = true;
	}
}
selectNo1.onclick = function(){
	for(var i in inputs1){
		inputs1[i].checked = false;
	}
}
rev1.onclick = function(){
	for(var i=0; i < inputs1.length; i++){
		inputs1[i].checked = !inputs1[i].checked;
	}
}
var selectAll2 = document.getElementById("selectAll2");
var selectNo2 = document.getElementById("selectNo2");
var rev2 = document.getElementById("rev2");
var inputs2 = document.getElementById("ipt2").getElementsByTagName("input");

selectAll2.onclick = function(){
	for(var i in inputs2){
		inputs2[i].checked = true;
	}
}
selectNo2.onclick = function(){
	for(var i in inputs2){
		inputs2[i].checked = false;
	}
}
rev2.onclick = function(){
	for(var i=0; i < inputs2.length; i++){
		inputs2[i].checked = !inputs2[i].checked;
	}
}
var selectAll3 = document.getElementById("selectAll3");
var selectNo3 = document.getElementById("selectNo3");
var rev3 = document.getElementById("rev3");
var inputs3 = document.getElementById("ipt3").getElementsByTagName("input");

selectAll3.onclick = function(){
	for(var i in inputs3){
		inputs3[i].checked = true;
	}
}
selectNo3.onclick = function(){
	for(var i in inputs3){
		inputs3[i].checked = false;
	}
}
rev3.onclick = function(){
	for(var i=0; i < inputs3.length; i++){
		inputs3[i].checked = !inputs3[i].checked;
	}
}
*/