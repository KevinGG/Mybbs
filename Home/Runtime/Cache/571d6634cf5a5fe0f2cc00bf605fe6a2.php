<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<META content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Bulletins</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/apps.css">
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
</head>

<body>
<?php echo ($navigationBar); ?>

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
<!--New Post-->
  <div>
    <form name="postForm" method="post" action="__APP__/Post/sendPost" onsubmit="return JcheckPostAll();">
    <table>
    <tr>
    <td style="width:30px"></td><td><input class="text" type="text" name="post_id" id="postid" onblur="JcheckPostId();" placeholder="New Subject"><span id="postidck"><font color="red">*</font></span></td>
    </tr>
    <tr>
    <td></td><td><TEXTAREA class="text" name="post_content" id="postcontent" onkeyup="JcheckPostContent();" cols="60" rows="8" wrap="VIRTUAL" placeholder="Detail Content"></TEXTAREA></td><td><span id="postcontentck"><font color="red">*</font></span></td>
    </tr>
    <tr>
    <td></td><td><input class = "bigBlueBtn" type="submit" value="Submit"></td>
    </tr>
    </table>
    </form>
  </div>
<!--end of New Post-->

    <?php if(is_array($post)): $i = 0; $__LIST__ = $post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$post): $mod = ($i % 2 );++$i;?><div class="bulletins" style="background-color: silver">
      Subject:<span class="pp"><?php echo ($post["post_name"]); ?></span>
      <span style=float:right>
        <?php if(($post["hasAuth"] == 0)): ?><a class = "normalLink" href='__APP__/Show/deletePost?post_id=<?php echo ($post["post_id"]); ?>'> Delete</a> |
        <a class = "normalLink" href='__APP__/Show/modifyPost?post_id=<?php echo ($post["post_id"]); ?>'> Modify</a> |<?php endif; ?>
        <a class = "normalLink" href="javascript:Jslidefun(<?php echo ($post["post_id"]); ?>)"> Reply</a>
      </span>
      </br>
      Author：<span class="pp"><?php echo ($post["post_author"]); ?></span>		Date：<span class="pp"><?php echo ($post["post_date"]); ?></span> 
      </br> 
      <span class = "pp"><?php echo ($post["post_content"]); ?></span>
      <br/>
      <br/>
      <div class ="bulletins" style="background-color: white">Reply List has <span class="pp"><?php echo ($post["level"]); ?></span> entries</div>

      <div class ="bulletins">
          <?php if(is_array($post['reply'])): $i = 0; $__LIST__ = $post['reply'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$reply): $mod = ($i % 2 );++$i;?>Author：<span class="pp"><?php echo ($reply["reply_author"]); ?></span>	Date：<span class="pp"><?php echo ($reply["reply_date"]); ?></span>
          <span style=float:right>
            <?php if(($reply["hasAuth"] == 0)): ?><a class = "normalLink" href='__APP__/Show/deleteReply?reply_id=<?php echo ($reply["reply_id"]); ?>'>Delete</a> |
            <a class = "normalLink" href='__APP__/Show/modifyReply?reply_id=<?php echo ($reply["reply_id"]); ?>'>Modify</a><?php endif; ?>
          </span>

          <div class = "pp"><?php echo ($reply["reply_content"]); ?></div>

          </br><?php endforeach; endif; else: echo "" ;endif; ?>

          <div class="tg" id="tg<?php echo ($post["post_id"]); ?>">
              <form  onsubmit="return JcheckReplyContent(<?php echo ($post["post_id"]); ?>);" method="post" action="__APP__/Post/reply">
              <textarea class="text"  id="tx<?php echo ($post["post_id"]); ?>" name="reply_content" cols="55" rows="8" wrap="VIRTUAL" > </textarea><span id="ck<?php echo ($post["post_id"]); ?>"><font 
              color=red>*</font></span>
              </br>
              <input type="hidden" name="belong" value="<?php echo ($post["post_id"]); ?>">
              <input class = "bigBlueBtn" type="submit" value="Submit" >
              </form>
          </div>

      </div>


      </div>  <!--bulletins -->
      <hr style = "width:0%"><?php endforeach; endif; else: echo "" ;endif; ?>
      


</div><!-- end of mainFrame -->
    <p class="foot" align="center" id="loading"></p>
</div><!-- end of backgroundFrame-->




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
</body>
</html>