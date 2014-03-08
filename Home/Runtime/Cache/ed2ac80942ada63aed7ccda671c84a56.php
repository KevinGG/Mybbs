<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<title>Modify password</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
var valOldpwd,valPwd,valRepwd;
$(function(){
 $("#oldpwd").blur(function(){
 if(JcheckOldPwd()){
	var oldpwd=$(this).val().trim();
	checkOldpwd(oldpwd);
  }
  else{
    valOldpwd=false;
  }
   return valOldpwd;
 });

 $("#pwd").blur(function(){
  valPwd=JcheckPwd();
  return valPwd;
 });
 
 $("#repwd").blur(function(){
	 valRepwd=JcheckRepwd();
	 return valRepwd;
 });

 $("#changePwdForm").submit(function(){
   if(valOldpwd && valPwd && valRepwd){
   return true;
   }
   else{
	return false;
   }
 });
});

function checkOldpwd(oldpwd){ 
  $.ajax({type:"get",data:'pwd='+oldpwd,url:"__APP__/Show/checkpwd",
		beforeSend:function(XMLHttpRequest){},
		success:function(data, textStatus){
			if(data.trim()=="1"){
				$("#oldpwdck").html("<font color=green>√</font>");
				valOldpwd= true;
			}else{
				$("#oldpwdck").html("<font color=red>Mismathced password！</font>");
				valOldpwd= false;
			}
		},
complete: function(XMLHttpRequest, textStatus){},
error:function(){}});
}
</script>

</head>
<body>
<div class="container" style="width:60%;margin-left:200px">
<div class="header">Modify Password</div>
<div class="box2" style="margin-left:10px">
<table>
<form id="changePwdForm" action="__APP__/Post/changepwd" method="post">
<tr>
<td>User Name：</td><td><?php echo ($id); ?></td>
</tr>
<tr>
<td>Current Password：</td><td><input class="text" type="password" name="oldpwd" id="oldpwd"></td><td><span id="oldpwdck"><font color=gray></font></span></td>
</tr>
<tr>
<td>New Password：</td><td><input class="text" type="password" name="pwd" id="pwd"></td><td><span id="pwdck"><font color=gray>Password should be 6-digit integers(0~9)</font></span></td>
</tr>
<tr>
<td>Confirm New Password：</td><td><input class="text" type="password" name="repwd" id="repwd"></td><td><span id="repwdck"></span></td>
</tr>
<tr>
<td>
<input type="hidden" name="op" value="changepwd">
<input type="submit" value="Submit" style="margin:0px">
</td>
<td>
<input type="button" value="Return" onclick="window.location.href='__APP__/Index/index'" style="margin:0px">
</td>
</tr>
</form>
</table>
</div>
<div class="header">Modify Password</div>
</div>
</body>
</html>