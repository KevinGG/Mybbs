<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<META content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Welcome Admin!</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
</head>
<body>
User Name:<a style="font-size:20" href="__APP__/Index/index"><?php echo ($id); ?></a><?php echo ($pwd); ?><input type="button" value="Log out" onclick="window.location.href='__APP__/Index/logout'"><input type="button" value="Modify password" onclick="window.location.href='__APP__/Show/changepwd'"><input type="button" value="msg" onclick="window.location.href='__APP__/Show/msg'"><?php if(($auth == 0)): ?><input type="button" value="admin panel" onclick="window.location.href='__APP__/Show/toAdmin'"><?php endif; ?>
<br><br>
<form name="banForm" method="post" action="__APP__/Show/findUserToBan">
<tr>
<td>
User to be banned:
</td>
<td>
<input class="text" type="text" name="userBan" id="userBan">
</td>
<td>
<input type="submit" value="search">
</td>
</form>
<div id="ban">
<table style="background-color:#ABD9E0;" name="ban table">
<?php if(($exist == 1)): ?><tr>
<td>User Name</td>
<td>operation</td>
</tr>
<tr>
<td><?php echo ($banUserId); ?></td>
<?php if(($op == 1)): ?><td><a href='__APP__/Post/banUser?userId=<?php echo ($banUserId); ?>'>Ban</a></td><?php endif; ?>
<?php if(($op == 3)): ?><td>Already banned</td><?php endif; ?>
<?php if(($op == 0)): ?><td>Can't ban admin</td><?php endif; ?>
</tr><?php endif; ?>
<?php if(($exist == 0)): ?><tr><td>No user named <?php echo ($banUserId); ?> found!</td></tr><?php endif; ?>
</table>
</div>

<br><br>
Banned User List:
<br>
<?php if(($banListEmpty == 0)): ?><Table name="banList" style="background-color:#ABD9E0;" border=1>
<tr>
<td>User Name</td><td>operation</td>
</tr>
<?php if(is_array($banList)): $i = 0; $__LIST__ = $banList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bl): $mod = ($i % 2 );++$i;?><tr>
<td><?php echo ($bl["id"]); ?></td>

<td><a href="__APP__/Post/unban?userId=<?php echo ($bl["id"]); ?>">unban</a></td><?php endforeach; endif; else: echo "" ;endif; ?>
</Table><?php endif; ?>
<?php if(($banListEmpty == 1)): ?><tr>Empty List</tr><?php endif; ?>
</body>
</html>