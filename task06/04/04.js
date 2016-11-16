function handleInputCheckResult(name, val, flag, errMsg){
    
	var valText = document.getElementById(name + "-val");
    var errText = document.getElementById(name + "-err");

    valText.value = val;
    if(flag == 0){
        errText.innerText = errMsg;
    }
}

function saveSex(sex){
    var sexMale = document.getElementById("sex-male");
    var sexFemale = document.getElementById("sex-female");
    if(sex == "男"){
        sexMale.checked = true;
        sexFemale.checked = false;
    }else{
        sexMale.checked = false;
        sexFemale.checked = true;
    }
}