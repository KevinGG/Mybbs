<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<title>Modify password</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/apps.css">
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
<?php echo ($navigationBar); ?>

<div class="backgroundFrame" style="width:60%;margin-left:200px">
<div class="iAKworkshop">
	Modify Password
</div>

<hr>
<div class = "bbNav">
    <a style="font-size:20" href="__APP__/Index/index">Bulletinss</a><?php echo ($pwd); ?> | <a  href="__APP__/Show/msg">Messages</a> | <?php if(($auth == 0)): ?><a href="__APP__/Show/toAdmin">Admin Panel</a> |<?php endif; ?>  <a href="__APP__/Show/changepwd">Modify Password</a> | <a href="__APP__/Index/logout">Log Out</a> |
</div>
<hr>

<div class="mainFrame">
<table class = "bulletins">
<form id="changePwdForm" action="__APP__/Post/changepwd" method="post">
<tr>
<td style="width:30px"></td><td>User Name : <?php echo ($id); ?></td>
</tr>
<tr>
<td></td><td><input class="text" type="password" name="oldpwd" id="oldpwd" placeholder="Current Password"></td><td><span id="oldpwdck"><font color=gray></font></span></td>
</tr>
<tr>
<td></td><td><input class="text" type="password" name="pwd" id="pwd" placeholder="New Password"></td><td><span id="pwdck"><font color=gray>Password should be 6-digit integers(0~9)</font></span></td>
</tr>
<tr>
<td></td><td><input class="text" type="password" name="repwd" id="repwd" placeholder="Confirm New Password"></td><td><span id="repwdck"></span></td>
</tr>
<tr>
<td></td>
<td>
<input type="hidden" name="op" value="changepwd">
<input class = "bigBlueBtn" type="submit" value="Submit" style="margin:0px">
</td>
<td>
<input class = "bigBlueBtn" style = "float:right;" type="button" value="Return" onclick="window.location.href='__APP__/Index/index'" style="margin:0px">
</td>
</tr>
</form>
</table>
</div>
</div>
</body>
</html>