<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Bulletin</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<script type="text/javascript">
function Jslidefun(id){
	$('#tg'+id).slideToggle("slow");
}
$(document).ready(function(){
	$(document).scrollTop(<?php echo ($pos); ?>);
});

$(document).scroll(function(){
  var pos=$(document).scrollTop();
  var docH=$(document).height();
  var winH=document.body.clientHeight;
  var relH=docH-winH;
  ajpos(pos);
  if(pos>=relH){
  	if(<?php echo ($row); ?>><?php echo ($crow); ?>){
  	 $("#loading").html("Loading...");
  	 ajload(pos);
  	}
  	else{
  	 $("#loading").html("No earlier bulletins!");
  	}
  }
}
);

function ajload(pos){ 
	//alert(pos);
   $.ajax({type:"get",data:'pos='+pos,url:"__APP__/Show/dynamicLoad",
		beforeSend:function(XMLHttpRequest){},
		success:function(data, textStatus){
			if(data.trim()=="1"){
				if(<?php echo ($row); ?>><?php echo ($crow); ?>){
				window.location.href="__APP__/Show/main";
			    }
			}
		},
complete: function(XMLHttpRequest, textStatus){},
error:function(){}});

}

function ajpos(pos){ 
	//alert(pos);
   $.ajax({type:"get",data:'pos='+pos,url:"__APP__/Show/posSet",
		beforeSend:function(XMLHttpRequest){},
		success:function(data, textStatus){},
complete: function(XMLHttpRequest, textStatus){},
error:function(){}});

}


</script>
</head>
<body>
User Name:<a style="font-size:20" href="__APP__/Index/index"><?php echo ($id); ?></a><?php echo ($pwd); ?><input type="button" value="Log out" onclick="window.location.href='__APP__/Index/logout'"><input type="button" value="Modify password" onclick="window.location.href='__APP__/Show/changepwd'"><input type="button" value="msg" onclick="window.location.href='__APP__/Show/msg'"><?php if(($auth == 0)): ?><input type="button" value="admin panel" onclick="window.location.href='__APP__/Show/toAdmin'"><?php endif; ?>
<div class="box">
<!--新留言-->
<div class="sendPost">
<form name="postForm" method="post" action="__APP__/Post/sendPost" onsubmit="return JcheckPostAll();">
<table>
<tr>
<td><p>Bulletin Subject </p></td><td><input class="text" type="text" name="post_id" id="postid" onblur="JcheckPostId();"><span id="postidck"><font color="red">*</font></span></td>
</tr>
<tr>
<td><p>Bulletin Content </p></td><td><TEXTAREA class="text" name="post_content" id="postcontent" onkeyup="JcheckPostContent();" cols="60" rows="8" wrap="VIRTUAL"></TEXTAREA></td><td><span id="postcontentck"><font color="red">*</font></span></td>
</tr>
<tr>
<td><input type="submit" value="Submit"></td>
</tr>
</table>
</form>
</div>
<!-- -->
<!-- 显示留言信息 默认根据时间排序 -->
<div class="postbg">
<span class="pp2">
<!--取消分页
<td colspan="6"><?php echo ($page); ?></td>
-->
</span>
</br>
<div class="post">
<?php if(is_array($post)): $i = 0; $__LIST__ = $post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$post): $mod = ($i % 2 );++$i;?>Subject:<span class="pp"><?php echo ($post["post_name"]); ?></span>
<span style=float:right>
<?php if(($post["hasAuth"] == 0)): ?><a href='__APP__/Show/deletePost?post_id=<?php echo ($post["post_id"]); ?>'> Delete</a> |
<a href='__APP__/Show/modifyPost?post_id=<?php echo ($post["post_id"]); ?>'> Modify</a> |<?php endif; ?>
<a href="javascript:Jslidefun(<?php echo ($post["post_id"]); ?>)"> Reply</a>
</span>
</br>
Author：<span class="pp"><?php echo ($post["post_author"]); ?></span>		Date：<span class="pp"><?php echo ($post["post_date"]); ?></span> 
</br> 
<?php echo ($post["post_content"]); ?>
</br>
<div class="postbg">
<img src="__PUBLIC__/img/cut.jpg" class="cutline"></img>
Reply List has <span class="pp"><?php echo ($post["level"]); ?></span> entries</br>
<img src="__PUBLIC__/img/cut.jpg" class="cutline"></img>
<?php if(is_array($post['reply'])): $i = 0; $__LIST__ = $post['reply'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$reply): $mod = ($i % 2 );++$i;?>author：<span class="pp"><?php echo ($reply["reply_author"]); ?></span>	Date：<span class="pp"><?php echo ($reply["reply_date"]); ?></span>
<span style=float:right>
<?php if(($reply["hasAuth"] == 0)): ?><a href='__APP__/Show/deleteReply?reply_id=<?php echo ($reply["reply_id"]); ?>'>Delete</a> |
<a href='__APP__/Show/modifyReply?reply_id=<?php echo ($reply["reply_id"]); ?>'>Modify</a><?php endif; ?>
</span>

<br/>
<?php echo ($reply["reply_content"]); ?>

<img src="__PUBLIC__/img/cutinside.jpg" class="cutline"></img>
</br><?php endforeach; endif; else: echo "" ;endif; ?>

<div class="tg" id="tg<?php echo ($post["post_id"]); ?>">
<form  onsubmit="return JcheckReplyContent(<?php echo ($post["post_id"]); ?>);" method="post" action="__APP__/Post/reply">
<textarea class="text"  id="tx<?php echo ($post["post_id"]); ?>" name="reply_content" cols="55" rows="8" wrap="VIRTUAL" > </textarea><span id="ck<?php echo ($post["post_id"]); ?>"><font 
color=red>*</font></span>
</br>
<input type="hidden" name="belong" value="<?php echo ($post["post_id"]); ?>">
<input type="submit" value="Submit" >
</form>
</div>
</div>

<div class="cut">
</br>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<!--post -->
</div>
<!--postbg -->
</div>
<!--box -->
<p class="pp" align="center" id="loading"></p>
</body>
</html>