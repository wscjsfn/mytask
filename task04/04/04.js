var myform = document.forms[0];
var city = new Object();
city.item = {};
city.add = function(name,value){
	this.item[name] = value;
}

city.add(0,['北京','天津','上海','重庆','河北','河南','山东','山西','内蒙古','辽宁','吉林','黑龙江','江苏','浙江','安徽','福建','江西','湖北','湖南','广东','广西','海南','四川','贵州','云南','西藏','陕西','甘肃','青海','宁夏','新疆','香港','澳门','台湾']);
city.add('0_1',['北京']);
city.add('0_1_1',['东城区','西城区','朝阳区','丰台区','石景山区','海淀区','顺义区','通州区','大兴区','房山区','门头沟区','昌平区','平谷区','密云区','怀柔区','延庆区']);
city.add('0_2',['天津']);
city.add('0_2_1',['和平区','河东区','河西区','南开区','河北区','红桥区','滨海新区','东丽区','西青区','津南区','北辰区','武清区','宝坻区','宁河区','静海区','蓟州区']);
city.add('0_3',['上海']);
city.add('0_3_1',['黄浦区','徐汇区','长宁区','静安区','普陀区','虹口区','杨浦区','浦东新区','闵行区','宝山区','嘉定区','金山区','松江区','青浦区','奉贤区','崇明区']);
city.add('0_4',['重庆']);
city.add('0_4_1',['渝中区','大渡口区','江北区','沙坪坝区','九龙坡区','南岸区','北碚区','渝北区','巴南区','涪陵区','綦江区','大足区','长寿区','江津区','合川区','永川区','南川区','璧山区','铜梁区','潼南区','荣昌区','万州区','开州区','黔江区','梁平县','城口县','丰都县','垫江县','忠县','云阳县','奉节县','巫山县','巫溪县','武隆县','石柱土家族自治县','秀山土家族苗族自治县','酉阳土家族苗族自治县','彭水苗族土家族自治县']);

for(var i in city.item[0]){
	var opt = document.createElement("option");
	opt.innerHTML = city.item[0][i];
	myform.pro.appendChild(opt);
}
myform.pro.onchange = function(){
	myform.ci.disabled = false;
	myform.country.disabled = true;
	myform.country.selectedIndex = 0;
	if(this.selectedIndex == 0){
		myform.ci.disabled = true;
	}
	myform.ci.innerHTML = "<option>--请选择城市--</option>";
	var key = "0_" + this.selectedIndex;
	for(var i in city.item[key]){
		var opt = document.createElement("option");
		opt.innerHTML = city.item[key][i];
		myform.ci.appendChild(opt);
	}
}
myform.ci.onchange = function(){
	myform.country.disabled = false;
	var key = "0_" + myform.pro.selectedIndex + "_" + myform.ci.selectedIndex;
	myform.country.innerHTML = "<option>--请选择县/区--</option>";
	for(var i in city.item[key]){
		var opt = document.createElement("option");
		opt.innerHTML = city.item[key][i];
		myform.country.appendChild(opt);
	}
}