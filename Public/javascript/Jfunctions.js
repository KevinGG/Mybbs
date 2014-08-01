//为兼容ie浏览器无法识别trim
String.prototype.trim = function () {
return this .replace(/^\s\s*/, '' ).replace(/\s\s*$/, '');
}


//注册页面使用 check Form Functions
function JcheckName(){
var strName=document.getElementById("name").value.trim();
var checkResult=document.getElementById("nameck");
if(strName.length!=0){
var Nameformat=/^(\d|[a-z]|_|[A-Z])*$/;
if(strName.length<4 || strName.length>10 || !Nameformat.test(strName)){
checkResult.innerHTML="<font color=red>User Name has to be 4 to 10 bits long. Composite of A~Z, a~z, 0~9, and _</font>";
}
else{
checkResult.innerHTML="<font color=gray>Checking...</font>";
return true;
}
}
else{
checkResult.innerHTML="<font color=red>User Name can't be empty</font>";
}
return false;
}
///////////////////////////////////////////////////////
function JcheckOldPwd(){
var strPwd=document.getElementById("oldpwd").value.trim();
var r=document.getElementById("oldpwdck");
if(strPwd.length!=0){
r.innerHTML="<font color=gray>Checking...</font>";
return true;
}
else{
r.innerHTML="<font color=red>Password shouldn't be empty！</font>"
}
return false;
}
///////////////////////////////////////////////////////
function JcheckPwd(){
var strPwd=document.getElementById("pwd").value.trim();
var checkResult=document.getElementById("pwdck");
if(strPwd.length!=0){
var pwdformat=/^\d{6}$/;
if(!pwdformat.test(strPwd)){
checkResult.innerHTML="<font color=red>Password should be 6-digit integers(0~9)</font>";
}
else{
checkResult.innerHTML="<font color=green>√</font>";
return true;
}
}
else{
checkResult.innerHTML="<font color=red>Password shouldn't be empty！</font>";
}
return false;
}
///////////////////////////////////////////////////////
function JcheckRepwd(){
var strRepwd=document.getElementById("repwd").value.trim();
var checkResult=document.getElementById("repwdck");
var strPwd=document.getElementById("pwd").value.trim();
if(strRepwd!=strPwd){
checkResult.innerHTML="<font color=red>Password mismatches with first input！</font>";
}
else if(JcheckPwd()){
checkResult.innerHTML="<font color=green>√</font>";
return true;
}
else{
checkResult.innerHTML="<font color=red>Please modify the first input password following the guide！</font>"
}
return false;
}
///////////////////////////////////////////////////////
function JcheckEmail(){
var strEmail=document.getElementById("email").value.trim();
var checkResult=document.getElementById("emailck");
if(strEmail.length!=0){
var emailformat= /^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([abcegimnortvz]{2,3})$/;
if(!emailformat.test(strEmail)){
checkResult.innerHTML="<font color=red>Invalid E-mail address！</font>";
}
else{
checkResult.innerHTML="<font color=green>√</font>";
return true;
}
}
else{
checkResult.innerHTML="<font color=red>E-mail address can't be empty！</font>";
}
return false;
}
///////////////////////////////////////////////////////
function JcheckAll(){
if(JcheckName() && JcheckPwd() && JcheckRepwd() && JcheckEmail()) 
	return true;
else
	return false;
}
///////////////////////////////////////////////////////
//验证用户名是否可用
function CreateXMLHttpRequest() 
{
    if(window.ActiveXObject)            //如果当前浏览器支持Active Xobject，则创建ActiveXObject对象
    {
         return new ActiveXObject("Microsoft.XMLHTTP");
    } 
    else if(window.XMLHttpRequest)    //如果当前浏览器支持XMLHttp Request，则创建XMLHttpRequest对象
    {
         return new XMLHttpRequest();
    }
}
function validate()                             //主程序函数
{
    var xmlobj=CreateXMLHttpRequest();  //创建对象
    var url = "checkNameUnique.php?id="+document.getElementById("name").value.trim(); //构造URL
	xmlobj.open("GET",url, false);  
	xmlobj.send(); 
    if(xmlobj.responseText.trim()=="0") return true;
	else return false;
}
function validatePwd(){
    var xmlobj=CreateXMLHttpRequest();  //创建对象
    var url = "localhost/index.php/Show/checkpwd?pwd="+document.getElementById("oldpwd").value.trim(); //构造URL
	xmlobj.open("GET",url, false);  
	xmlobj.send(); 
    if(xmlobj.responseText.trim()==true) return true;
	else return false;
}
//end of check form functions

//主界面按钮处理
function postDeal(postid,op)                             //主程序函数
{
    var xmlobj=CreateXMLHttpRequest();  //创建对象
	if(op=="edit" || op=="editreply"){
	var url = "posthandler.php?postid="+postid+"&op="+op;
	}
    else{
	var url = "posthandler.php?postid="+postid+"&op="+op; //构造URL
	}
	xmlobj.open("GET",url, false);  
	xmlobj.send(); 
	if(xmlobj.responseText.trim()==true)  window.location.href="main.php";
}
//主界面输入检测
function JcheckPostId(){
	var pid=document.getElementById("postid").value.trim();
	var pidformat=/^(\d|[a-z]|_|[A-Z]|\s)*$/;
	var pidck=document.getElementById("postidck");
	if(pid.length!=0){
	  if(!pidformat.test(pid)){
	    pidck.innerHTML="<font color=red>*</font><font color=gray>Bulletin subject should be composite of A~Z, a~z, 0~9, and _</font>";
	  }
	  else{
        pidck.innerHTML="<font color=red>*</font><font color=green>√</font>";
		return true;
	  }
	}
	else{
       pidck.innerHTML="<font color=red>*</font><font color=gray>Bulletin subject can't be empty</font>";
	}
return false;
}
//////////////////////////////////////////////////////////
function JcheckPostContent(){
    var pcontent=document.getElementById("postcontent").value.trim();
	var pcontentck=document.getElementById("postcontentck");
	if(pcontent.length!=0){
	   pcontentck.innerHTML="<font color=red>*</font><font color=green>√</font>";
	   return true;
	}
	else{
	   pcontentck.innerHTML="<font color=red>*</font><font color=gray>Reply content can't be empty</font>";
	}
return false;
}
function JcheckReplyContent(id){
    var rcontent=document.getElementById('tx'+id).value.trim();
	//alert(rcontent);
	var rcontentck=document.getElementById('ck'+id);
	if(rcontent.length!=0){
	   rcontentck.innerHTML="<font color=red>*</font><font color=green>√</font>";
	   return true;
	}
	else{
	   rcontentck.innerHTML="<font color=red>*</font><font color=gray>Reply content can't be empty</font>";
	}
return false;
}
//////////////////////////////////////////////////////////
function JcheckPostAll(){
if(JcheckPostId() && JcheckPostContent()) return true;
else return false;
}

function JcheckChangePwdAll(){
if(JcheckOldPwd() && JcheckPwd() && JcheckRepwd()) return true;
else return false;
}


//评分系统