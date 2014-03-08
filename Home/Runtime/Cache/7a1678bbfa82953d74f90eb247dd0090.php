<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv=Content-Type>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<title>Register Page</title>
<script type="text/javascript">
var valName,valPwd,valRepwd,valEmail;
$(function(){ 
$("#name").blur(function(){ 
  if(JcheckName()){
   var id=$(this).val().trim();
   checkNameUnique(id);
  }
  else{
   valName=false;
  }
  return valName;
});

$("#pwd").blur(function(){
	valPwd=JcheckPwd();
	return valPwd;
});

$("#repwd").blur(function(){
	valRepwd=JcheckRepwd()
	return valRepwd;
});

$("#email").blur(function(){
	valEmail= JcheckEmail()
	return valEmail;
});

$("#registerForm").submit(function(){
	if(valName && valPwd &&  valRepwd && valEmail){
	 return true;
	}
	else
	 return false;
});
});

function checkNameUnique(id){  
   $.ajax({type:"get",data:'id='+id,url:"__APP__/Show/checkNameUnique",
		beforeSend:function(XMLHttpRequest){},
		success:function(data, textStatus){
			if(data.trim()=="1"){
				$("#nameck").html("<font color=green>√</font>");
				valName=true;
			}else{
				$("#nameck").html("<font color=red>User Name has been used by another user！</font>");
				valName=false;
			}
		},
complete: function(XMLHttpRequest, textStatus){},
error:function(){}});
}
</script>
</head>
<body>
<div class="container">
<p class="header">Register Now</p>
<div class="reg">
<!--registerForm's table -->
<table>
<form id="registerForm" action="__APP__/Post/reg" method="post">
<tr>
<td>User Name：</td><td><input class="text" type="text" name="name" id="name"></td><td><span id="nameck"><font color=gray>User Name has to be 4 to 10 bits long. Composite with A~Z, a~z, 0~9, and _</font></span></td>
</tr>
<tr>
<td>Password：</td><td><input class="text" type="password" name="pwd" id="pwd"></td><td><span id="pwdck"><font color=gray>Password should be 6-digit integers(0~9)</font></span></td>
</tr>
<tr>
<td>Confirm Password：</td><td><input class="text" type="password" name="repwd" id="repwd"></td><td><span id="repwdck"></span></td>
</tr>
<tr>
<td>E-mail：</td><td><input class="text" type="text" name="email" id="email"></td><td><span id="emailck"></span></td>
</tr>
<tr>
<input type="hidden" name="goodtogo" value="ok">
<td><input type="submit" name="regCheck" value="Register"></td><td><input type="button" value="Return" onclick="window.location.href='__APP__/Index/index'"></td>
</tr>
</form>
</table>
<!-- end of registerForm's table-->
</div>
<p class="footer">Register Now</p>
</div>
</body>
</html>