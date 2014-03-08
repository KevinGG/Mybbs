<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<META content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#bType").text(function(){
	if(navigator.appName!="Netscape"){
	alert("For better user experience，please use Netscape(Chrome|firefox etc.)browsers to visit this website !");
	window.close();
	}
	return navigator.appName;
	});
$("#bVersion").text(function(){
    return navigator.appVersion;
    });
});
</script>
</head>
<body>
Current broswer：<span id="bType">unknown</span>
</br>
Version: <span id="bVersion">unknown</span>
<!--loginForm's table -->
<div class="index">
<div class="container" style="margin-left:200px">
<div class="indexTop"><p size=60px>Hello</p><p>Good Choice</p></div>
<table>
<form name="loginForm" action="__APP__/Post/login" method="post">
<tr>
<td>User Name：</td><td><input class="text" type="text" name="username"></td>
</tr>
<tr>
<td>Password：</td><td><input class="text" type="password" name="userpwd"></td>
</tr>
<tr>
<td><input type="submit" value="Login"></td><td><input type="button" value="Register" onclick="window.location.href='__APP__/Show/register'"></td>
</tr>
</form>
</table>
<div class="footer">Welcome</div>
</div>
</div>
<!-- end of LoginForm's table-->
</body>
</html>