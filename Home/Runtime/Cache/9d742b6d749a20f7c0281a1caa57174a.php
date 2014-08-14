<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>MSG</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/apps.css">
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
</head>
<body>
<table class = "navigationBar">
<tr>
  <td>
    <a style="font-size:20" href="__APP__/Navigation/APP">App Workshop</a>
    </td><td>
		<a id ="tools" style="font-size:20" href="javascript:void(0);">Online Tools</a>
  </td><td>
    <a style="font-size:20" href="__APP__/Navigation/BB">Bulletinss Board</a>
  </td><td>
    <a style="font-size:20" href="__APP__/Navigation/AboutUs">About Us</a>
  </td>
<tr>
</table>

<div class = "backgroundFrame">
<div class = "iAKworkshop">
  <?php echo ($id); ?>
</div>

<hr>
<div class = "bbNav">
    <a style="font-size:20" href="__APP__/Index/index">Bulletinss</a><?php echo ($pwd); ?> | <a  href="__APP__/Show/msg">Messages</a> | <?php if(($auth == 0)): ?><a href="__APP__/Show/toAdmin">Admin Panel</a> |<?php endif; ?>  <a href="__APP__/Show/changepwd">Modify Password</a> | <a href="__APP__/Index/logout">Log Out</a> |
</div>
<hr>

<div class="mainFrame">
<div class = "bulletins">
<form name="sendMsg" method="post" action="__APP__/Post/sendMsg" onsubmit="return JcheckPostAll();">
<table>
<tr>
<td style="width=20px"></td><td><input class="text" type="text" name="user_to" id="user_to" onblur="JcheckPostId();" placeholder="Send To:"><span id="postidck"><font color="red">*</font></span></td>
</tr>
<tr>
<td></td><td><input class="text" type="text" name="Msg_subject" id="Msg_subject" onblur="JcheckPostId();" placeholder="New Subject"><span id="postidck"><font color="red">*</font></span></td>
</tr>
<tr>
<td></td><td><TEXTAREA class="text" name="Msg_content" id="Msg_content" onkeyup="JcheckPostContent();" cols="90" rows="8" wrap="VIRTUAL" placeholder="Message Content"></TEXTAREA></td><td><span id="postcontentck"><font color="red">*</font></span></td>
</tr>
<tr>
<td></td><td><input class = "bigBlueBtn" type="submit" value="Send"></td>
</tr>
</table>
</form>
</div>

<hr style="width:95%">

<div class = "bulletins">
<Table name="MsgList" class = "normalTable">
<tr>
<th>From</th><th>Subject</th><th>Content</th><th>Status</th><th>Date</th><th>Operation</th>
</tr>
<?php if(is_array($msgList)): $i = 0; $__LIST__ = $msgList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ml): $mod = ($i % 2 );++$i;?><tr>
<td><?php echo ($ml["user_from"]); ?></td>
<td><?php echo ($ml["subject"]); ?></td>
<td><?php echo ($ml["content"]); ?></td>
<?php if(($ml["abcd"] == 0)): ?><td><img style=" width:25px;height:25px"src="__PUBLIC__/img/closed.png"></td><?php endif; ?>
<?php if(($ml["abcd"] == 1)): ?><td><img style=" width:25px;height:25px"src="__PUBLIC__/img/open.png"></td><?php endif; ?>
<td><?php echo ($ml["time"]); ?></td>
<td><a class = "normalLink" href='__APP__/Show/readMsg?msgId=<?php echo ($ml["message_id"]); ?>'>read</a></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</Table>
</div>

</div>
<!--end of mainFrame-->
</div>
<!-- end of backgroundFrame -->
</body>
</html>