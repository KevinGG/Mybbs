<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>MSG</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
</head>
<body>
User Name:<a style="font-size:20" href="__APP__/Index/index"><?php echo ($id); ?></a><?php echo ($pwd); ?><input type="button" value="Log out" onclick="window.location.href='__APP__/Index/logout'"><input type="button" value="Modify password" onclick="window.location.href='__APP__/Show/changepwd'"><input type="button" value="msg" onclick="window.location.href='__APP__/Show/msg'"><?php if(($auth == 0)): ?><input type="button" value="admin panel" onclick="window.location.href='__APP__/Show/toAdmin'"><?php endif; ?>

<div class="sendPost">
<form name="sendMsg" method="post" action="__APP__/Post/sendMsg" onsubmit="return JcheckPostAll();">
<table>
<tr>
<td><p>Send To: </p></td><td><input class="text" type="text" name="user_to" id="user_to" onblur="JcheckPostId();"><span id="postidck"><font color="red">*</font></span></td>
</tr>
<tr>
<td><p>Msg Subject </p></td><td><input class="text" type="text" name="Msg_subject" id="Msg_subject" onblur="JcheckPostId();"><span id="postidck"><font color="red">*</font></span></td>
</tr>
<tr>
<td><p>Msg Content </p></td><td><TEXTAREA class="text" name="Msg_content" id="Msg_content" onkeyup="JcheckPostContent();" cols="90" rows="8" wrap="VIRTUAL"></TEXTAREA></td><td><span id="postcontentck"><font color="red">*</font></span></td>
</tr>
<tr>
<td><input type="submit" value="Send"></td>
</tr>
</table>
</form>
</div>

<Table name="MsgList" style="background-color:#ABD9E0;" border=1>
<tr>
<td>From</td><td>Subject</td><td>Content</td><td>Read?</td><td>Date</td>
</tr>
<?php if(is_array($msgList)): $i = 0; $__LIST__ = $msgList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><tr>
<td><?php echo ($ml["user_from"]); ?></td>
<td><?php echo ($ml["subject"]); ?></td>
<td><?php echo ($ml["content"]); ?></td>
<?php if(($ml["abcd"] == 0)): ?><td><img style=" width:25px;height:25px"src="__PUBLIC__/img/closed.png"></td><?php endif; ?>
<?php if(($ml["abcd"] == 1)): ?><td><img style=" width:25px;height:25px"src="__PUBLIC__/img/open.png"></td><?php endif; ?>
<td><?php echo ($ml["time"]); ?></td>
<td><a href='__APP__/Show/readMsg?msgId=<?php echo ($ml["message_id"]); ?>'>read</a></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</Table>

</body>
</html>