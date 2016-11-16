var upload=document.getElementById("upload");	//选择上传的图片后立即提交

upload.onchange=function(){						//设置上传的时间戳 防止刷新重复提交
	var uplTime=document.getElementById("upl-time");
	uplTime.value=new Date().getTime()+"";
	
	var uploadForm=document.getElementById("upload-form");
	uploadForm.submit();
}

function appendItem(imgName,uplTime,imgSize){	//添加图片的列表项
	var imgNameWithoutType=getImgNameWithoutType(imgName);
	var imgItem=document.createElement("div");
	imgItem.setAttribute("class","img-item");
	
	var img=document.createElement("img");		//图片
	img.src="./images/"+getThumbName(imgName);
	imgItem.appendChild(img);
	
	var imgInfo=document.createElement("div");
	imgInfo.setAttribute("class","img-info");
	
	var imgNameLink=document.createElement("a");	//图片名称
	imgNameLink.setAttribute("class","img-name");
	imgNameLink.href="./images/"+imgName;
	imgNameLink.target="_blank";
	imgNameLink.innerText=imgName;
	imgInfo.appendChild(imgNameLink);
	
	var imgTimeSize=document.createElement("div");
	imgTimeSize.setAttribute("class","img-time-size");
	
	var uplTimeText=document.createElement("div");	//上传时间
	uplTimeText.setAttribute("class","img-time");
	uplTimeText.innerText=uplTime;
	imgTimeSize.appendChild(uplTimeText);
	
	var imgSizeText=document.createElement("div");	//图片大小
	imgSizeText.setAttribute("class","img-size");
	imgSizeText.innerText=imgSize;
	imgTimeSize.appendChild(imgSizeText);
	imgInfo.appendChild(imgTimeSize);
	
	var imgDownRm=document.createElement("div");
	imgDownRm.setAttribute("class","img-down-rm");
	
	var imgDownForm=document.createElement("form");
	imgDownForm.setAttribute("id",imgNameWithoutType+"-down-form");
	imgDownForm.setAttribute("method","post");
	imgDownForm.setAttribute("action","02.php");	
	
	var downLink=document.createElement("a");	//下载按钮
	downLink.href="javascript:downloadPic('"+imgNameWithoutType+"')";
	downLink.innerText="下载";
	imgDownForm.appendChild(downLink);
	
	var downVal=document.createElement("input");	//下载的文件名
	downVal.setAttribute("type","hidden");
	downVal.setAttribute("name","download");
	downVal.setAttribute("value",imgName);
	imgDownForm.appendChild(downVal);
	
	var downTime=document.createElement("input");	//下载时间戳
	downTime.setAttribute("type","hidden");
	downTime.setAttribute("name","down_time");
	downTime.setAttribute("id",imgNameWithoutType+"-down-time");
	imgDownForm.appendChild(downTime);
	imgDownRm.appendChild(imgDownForm);
	
	var imgRmForm=document.createElement("form");
	imgRmForm.setAttribute("id",imgNameWithoutType+"-rm-form");
	imgRmForm.setAttribute("method","post");
	imgRmForm.setAttribute("action","02.php");
	
	var rmLink=document.createElement("a");		//删除按钮
	rmLink.href="javascript:removePic('"+imgNameWithoutType+"')";
	rmLink.innerText="删除";
	imgRmForm.appendChild(rmLink);
	
	var rmVal=document.createElement("input");		//删除文件名
	rmVal.setAttribute("type","hidden");
	rmVal.setAttribute("name","remove");
	rmVal.setAttribute("value",imgName);
	imgRmForm.appendChild(rmVal);
	
	var rmTime=document.createElement("input");		//删除时间戳
	rmTime.setAttribute("type","hidden");
	rmTime.setAttribute("name","rm_time");
	rmTime.setAttribute("id",imgNameWithoutType+"-rm-time");
	imgRmForm.appendChild(rmTime);
	imgDownRm.appendChild(imgRmForm);
	imgInfo.appendChild(imgDownRm);
	imgItem.appendChild(imgInfo);
	
	var content=document.getElementById("content");
	content.appendChild(imgItem);
}

function getImgNameWithoutType(imgName){		//获得没有后缀的图片文件名
	var i=imgName.lastIndexOf(".");
	var name=imgName.substr(0,i);
	return name;
}

function getImgType(imgName){		//获取图片文件名后缀
	var i=imgName.lastIndexOf(".");
	var type=imgName.substr(i).toLowerCase();
	return type;
}

function getThumbName(imgName){		//获取缩略图文件名
	var thumbName=getImgNameWithoutType(imgName)+"_thumb"+getImgType(imgName);
	return thumbName;
}

function downloadPic(imgNameWithoutType){		//点击下载按钮执行的操作
	var downTime=document.getElementById(imgNameWithoutType+"-down-time");		//设置时间戳防止刷新重复提交
	downTime.value=new Date().getTime()+"";
	
	var downForm=document.getElementById(imgNameWithoutType+"-down-form");
	downForm.submit();
}

function removePic(imgNameWithoutType){		//点击删除按钮后执行的操作
	var flag=confirm("确定要删除吗？");
	if(!flag){
		return;
	}
	
	var rmTime=document.getElementById(imgNameWithoutType+"-rm-time");		//设置删除时间戳，防止刷新重复提交
	rmTime.value=new Date().getTime()+"";
	
	var rmForm=document.getElementById(imgNameWithoutType+"-rm-form");
	rmForm.submit();
}