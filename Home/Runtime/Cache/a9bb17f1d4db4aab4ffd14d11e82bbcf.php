<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
<META content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Welcome to Bulletins Board</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/apps.css">
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
</head>

<body>
<?php echo ($navigationBar); ?>


<div class = "backgroundFrame">
<div class = "iAKworkshop">
	Bulletins Board
</div>
<hr>

<!--loginForm's table -->
<div class = "mainFrame">
<TABLE cellspacing="20px">
<TD>
<table>
<form name="loginForm" action="__APP__/Post/login" method="post">
	<th></th><th align="left">Please Login</th>
	<tr>
		<td style="width:70px"></td>
		<td ><input class="text" type="text" name="username" placeholder = "User Name"></td>
	</tr>
	<tr>
		<td></td>
		<td><input class="text" type="password" name="userpwd" placeholder = "Password"></td>
	</tr>
	<tr>
		<td></td>
		<td><input class = "bigBlueBtn" type="submit" value="Login"></td>
	</tr>
</form>
</table>
</TD>
<TD style="border-left:1px solid silver; padding-left:20px">
	Leave your thoughts about our APPs!<br/>
	Share your ideas！<br/>
	Get access to newest information about all kinds of development！<br/>
	<br/><br/>
	<a class = "normalLink" href="__APP__/Show/register">Register Now</a>
</TD>
</TABLE>
</div>
<!-- end of LoginForm's table-->





</div>


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




</body>
</html>