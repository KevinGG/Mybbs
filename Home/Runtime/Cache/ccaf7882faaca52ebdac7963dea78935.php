<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/apps.css">
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<title>Read Msg</title>
</head>
<body>
<table class = "navigationBar">
<tr>
  <td>
    <a style="font-size:20" href="__APP__/Navigation/APP">App Workshop</a>
  </td><td>
    <a style="font-size:20" href="__APP__/Navigation/BB">Bulletinss Board</a>
  </td><td>
    <a style="font-size:20" href="">About Us</a>
  </td>
<tr>
</table>

<div class="backgroundFrame">
<div class="iAKworkshop">
	Message
</div>
<hr>

<div class="mainFrame">
From:<span class ="pp"><?php echo ($msg['user_from']); ?></span> <br/>Date:<span class = "pp"><?php echo ($msg['time']); ?></span>
</div>
<hr>

<div class="mainFrame">
Subject:<span class = "pp"><?php echo ($msg['subject']); ?></span>
</div>
<hr>

<div class="mainFrame" style="margin-left:10px;">
Content:<p class = "pp"><?php echo ($msg['content']); ?></p>
</div>
<hr>

<input style = "float:right" class = "bigBlueBtn" type="button" onclick="window.location.href='__APP__/Show/msg'" value="Return">
<br/>
</div>
</body>
</html>