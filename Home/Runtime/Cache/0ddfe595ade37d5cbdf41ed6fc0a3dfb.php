<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/apps.css">
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<title>Edit Page</title>
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
<div class = "iAKworkshop">
  Modification
</div>

<hr>
<div class = "bbNav">
    <a style="font-size:20" href="__APP__/Index/index">Bulletinss</a><?php echo ($pwd); ?> | <a  href="__APP__/Show/msg">Messages</a> | <?php if(($auth == 0)): ?><a href="__APP__/Show/toAdmin">Admin Panel</a> |<?php endif; ?>  <a href="__APP__/Show/changepwd">Modify Password</a> | <a href="__APP__/Index/logout">Log Out</a> |
</div>
<hr>

<div class="mainFrame" style="margin-left:10px;">


<div class = "bulletins">
Original Text：</br>
<div class = "pp">
<?php if(is_array($nowcontent)): $i = 0; $__LIST__ = $nowcontent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nowcontent): $mod = ($i % 2 );++$i; echo ($nowcontent["post_content"]); ?>
<?php echo ($nowcontent["reply_content"]); endforeach; endif; else: echo "" ;endif; ?>
</div>
</div>

<hr style="width:0px">

<div class = "bulletins">
<form action="__APP__/Post/modify" method="post" onsubmit="return JcheckReplyContent('edittext','edittextck');">
<textarea id="edittext" class="text" name="content" cols="50" rows="8" value=""></textarea>
<span id="edittextck"><font color=red>*</font></span>
<input type=hidden name="op" value="<?php echo ($op); ?>">
<input type=hidden name="bbsid" value="<?php echo ($bbsid); ?>">
</br>
<input class = "bigBlueBtn" type="submit" value="Modify">
<input style = "float:right" class = "bigBlueBtn" type="button" onclick="window.location.href='__APP__/Show/main'" value="Cancel">
</form>
</div>

</div>
</div>
</body>
</html>