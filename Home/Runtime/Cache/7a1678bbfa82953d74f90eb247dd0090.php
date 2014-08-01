<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv=Content-Type>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/apps.css">
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<title>Register Page</title>
</head>

<body>
<table class = "navigationBar">
<tr>
	<td>
		<a style="font-size:20" href="__APP__/Navigation/APP">App Workshop</a>
	</td><td>
		<a style="font-size:20" href="__APP__/Navigation/BB">Bulletins Board</a>
	</td><td>
		<a style="font-size:20" href="">About Us</a>
	</td>
<tr>
</table>

<div class="backgroundFrame">
<div class = "iAKworkshop">
	Register Now
</div>
<hr>


<!--registerForm's table -->
<div class="mainFrame">
<table>
	<form id="registerForm" action="__APP__/Post/reg" method="post">
	<tr>
	<td style="width:30px"></td><td><input class="text" type="text" name="name" id="name" placeholder="User Name"></td><td><span id="nameck"><font color=gray>User Name has to be 4 to 10 bits long. Composite with A~Z, a~z, 0~9, and _</font></span></td>
	</tr>
	<tr>
	<td></td><td><input class="text" type="password" name="pwd" id="pwd" placeholder="Password"></td><td><span id="pwdck"><font color=gray>Password should be 6-digit integers(0~9)</font></span></td>
	</tr>
	<tr>
	<td></td><td><input class="text" type="password" name="repwd" id="repwd" placeholder="Confirm Password"></td><td><span id="repwdck"></span></td>
	</tr>
	<tr>
	<td></td><td><input class="text" type="text" name="email" id="email" placeholder="E-mail Address"></td><td><span id="emailck"></span></td>
	</tr>
	<tr>
	<input type="hidden" name="goodtogo" value="ok">
	<td></td><td><input  class = "bigBlueBtn" type="submit" name="regCheck" value="Register"></td><td><input style="float:right" class = "bigBlueBtn" type="button" value="Cancel" onclick="window.location.href='__APP__/Navigation/BB'"></td>
	</tr>
	</form>
</table>
</div>
<!-- end of registerForm's table-->


</div>



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
</body>
</html>