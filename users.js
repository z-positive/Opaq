/*пользовательские функции  /htdocs/wlib/js */

function sendToScan(o)
{
	typework="";
	var gArr=new Array();
	var querylist=new Array();
	gArr.push(["_action","execute"]);
	gArr.push(["_html","stat"]);
	gArr.push(["_errorhtml","error"]);
	querylist.push(["_service","STORAGE:opacfindd:FindView"]);
	querylist.push(["_version","2.3.0"]);
	querylist.push(["session",numsean]);
	querylist.push(["iddbIds[0]/id",o]);
	querylist.push(["iddbIds[0]/iddb",numDB]);
	querylist.push(["outform","SHORTWEB_RGBI"]);
	querylist.push(["_history","yes"]);
	gArr.push(["querylist",prepareQueryString(querylist)]);
	ajaxToRCP(gArr,backsendToScan);
}

function backsendToScan(x)
{
	/*var win=window.open();
	win.document.open();
	win.document.write(x.responseText);
	win.document.close();*/
	eval(x.responseText);
	if(response[0]._result_0._SHORTWEB_RGBI_0 != null)
	{
		var str=JSON.stringify(response[0]._result_0._SHORTWEB_RGBI_0);		
		var frm=take(document.body).create('form');
		frm.create('input',{className:'input_class','name':'bz',value:str,type:'hidden'});
		frm.n.action="http://copy.liart.ru/opac";
		frm.n.method="POST";
		frm.n.target="_blank";
		//frm.n.target="_self";
		frm.n.submit();
	}
}

function multiAddToScan(){
	
	var checked = document.getElementsByClassName('checked');
	
	typework="";
	var gArr=new Array();
	var querylist=new Array();
	gArr.push(["_action","execute"]);
	gArr.push(["_html","stat"]);
	gArr.push(["_errorhtml","error"]);
	querylist.push(["session",numsean]);
	querylist.push(["_service","STORAGE:opacfindd:FindView"]);
	querylist.push(["_version","2.3.0"]);
	
	var i = 0;
	while(i<checked.length){

		querylist.push(["iddbIds[" + i +"]/id",checked[i]['firstChild']['firstChild'].value]);
		querylist.push(["iddbIds["+ i +"]/iddb",checked[i]['firstChild']['firstChild'].getAttribute("class")]);
		
		i+=1;
	}
	
	querylist.push(["outform","SHORTWEB_RGBI"]);
	querylist.push(["_history","yes"]);	
	gArr.push(["querylist",prepareQueryString(querylist)]);
	ajaxToRCP(gArr,backMultiAddToScan);
	
	
}

function backMultiAddToScan(x){
	
	var resp = eval(x.responseText);
	
	
	if(x.responseText.indexOf('error={') + 1){
	
		alert("Пожалуйста, выберите издания снова! ");
		
	}else{
	
		var str=JSON.stringify(resp);		
		var frm=take(document.body).create('form');
		frm.create('input',{className:'input_class','name':'bz',value:str,type:'hidden'});
		frm.n.action="http://copy.liart.ru/opaclib";
		frm.n.method="POST";
		frm.n.target="_blank";
		frm.n.submit();
	
	}
	

}