<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<title>Read Msg</title>
</head>
<body>
<div class="container">
<div class="header">Msg</div>
<div class="box2" style="margin-left:10px;">
From:<?php echo ($msg['user_from']); ?> <br>Date:<?php echo ($msg['time']); ?>
</div>
<div class="box2">Subject:<?php echo ($msg['subject']); ?></div>
<div class="box2" style="margin-left:10px;">
Content:<br><?php echo ($msg['content']); ?><br>
</div>
<input type="button" onclick="window.location.href='__APP__/Show/msg'" value="Return">
<div class="footer">Msg</div>
</div>
</body>
</html>