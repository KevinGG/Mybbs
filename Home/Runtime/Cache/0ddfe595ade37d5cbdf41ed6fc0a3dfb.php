<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<title>Edit Page</title>
</head>
<body>
<div class="container">
<div class="header">EDIT</div>
<div class="box2" style="margin-left:10px;">
Original Text：</br>
<?php if(is_array($nowcontent)): $i = 0; $__LIST__ = $nowcontent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nowcontent): $mod = ($i % 2 );++$i; echo ($nowcontent["post_content"]); ?>
<?php echo ($nowcontent["reply_content"]); endforeach; endif; else: echo "" ;endif; ?>
</div>
<div class="box2" style="margin-left:10px;">
<form action="__APP__/Post/modify" method="post" onsubmit="return JcheckReplyContent('edittext','edittextck');">
<textarea id="edittext" class="text" name="content" cols="50" rows="8" value=""></textarea>
<span id="edittextck"><font color=red>*</font></span>
<input type=hidden name="op" value="<?php echo ($op); ?>">
<input type=hidden name="bbsid" value="<?php echo ($bbsid); ?>">
</br>
<input type="submit" value="Modify">
<input type="button" onclick="window.location.href='__APP__/Show/main'" value="Return">
</form>
</div>
<div class="footer">EDIT</div>
</div>
</body>
</html>