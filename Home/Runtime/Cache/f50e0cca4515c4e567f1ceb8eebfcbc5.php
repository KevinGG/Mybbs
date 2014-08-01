<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
<META content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>iAK workshop</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/apps.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/paint.js"></script>
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

<div class = "backgroundFrame">
<div class = "iAKworkshop">
	iAK workshop
</div>
<hr>

<div class = "mainFrame">

<table class = "app" >
	<tr>
		<td class = "appIconTd"><img class = "appIcon" src = "__PUBLIC__/img/Apps/GoBang.png"></td>
		<td class = "info">
			Version:<span>1.0</span> <br/> 
			Price: <span>Free</span> <br/>
			Status: <span>For Sale</span> <br/>
			Platform: <span>iOS</span> <br/>
		</td>
		<td class = "descriptionTd">
			<div class = "description">
				Just Go Bang Game! Any time, any place! <br/>
				Drop your pieces to get 5 in a line and win! <br/>
				Strategy and Patient! <br/>
				<br/>
				Support <br/>
				1. against advanced AI (Take the challenge) <br/>
				2. have fun and compete with your friends! <br/>
			</div>	
		</td>
	</tr>
	<tr>
		<td class = "appIconTd">
			<img src = "__PUBLIC__/img/Apps/green.png" class = "appStatusIcon">
			GoBang#
		</td>
		<td>
			<span class ="blueBtn"><a href="https://itunes.apple.com/us/app/gobang/id901196140?ls=1&mt=8#" target="_blank">View in App Store</a></span>
		</td>
	</tr>
</table>

<div class = "break"></div>

<table class = "app">
	<tr>
		<td class = "appIconTd"><img class = "appIcon" src = "__PUBLIC__/img/Apps/RainbowCrash.png"></td>
		<td class = "info">
			Version:<span>1.1</span> <br/> 
			Price: <span>Free</span> <br/>
			Status: <span>Waiting For Review</span> <br/>
			Platform: <span>iOS</span> <br/>
		</td>
		<td class = "descriptionTd">
			<div class = "description">
				Three original colors: red, yellow and blue! <br/>
				Crash them to get composite color! <br/>
				Or drop color you don't need! <br/>
				Get target color to gain extra time! <br/>
				Longer you crash, higher the score! <br/>
				Easily played, insanely interesting! <br/>
				Practice your logic thought and strategy usage!<br/>
			</div>
		</td>
	</tr>
	<tr>
		<td class = "appIconTd">
			<img src = "__PUBLIC__/img/Apps/orange.png" class = "appStatusIcon">
			Rainbow Crash
		</td>
		<td>
			<span class ="GrayBtn"><a href="javascript:void(0);" target="_blank">View in App Store</a></span>
		</td>
	</tr>
</table>

</div><!-- mainFrame -->
</div><!-- backgroundFrame-->
</body>


<script>
	$(document).ready(function(){
		$(".navigationBar td").hover();
	});


</script>


</html>