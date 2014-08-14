<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<META content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Welcome Admin!</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/apps.css">
<script type="text/javascript" src="__PUBLIC__/javascript/Jfunctions.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/jquery-1.9.0.min.js"></script>
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
	Admin Panel
</div>

<hr>
<div class = "bbNav">
    <a style="font-size:20" href="__APP__/Index/index">Bulletinss</a><?php echo ($pwd); ?> | <a  href="__APP__/Show/msg">Messages</a> | <?php if(($auth == 0)): ?><a href="__APP__/Show/toAdmin">Admin Panel</a> |<?php endif; ?>  <a href="__APP__/Show/changepwd">Modify Password</a> | <a href="__APP__/Index/logout">Log Out</a> |
</div>
<hr>

<div class = "mainFrame">

<table class = "bulletins">
<form name="banForm" method="post" action="__APP__/Show/findUserToBan">
<tr>
<td style = "text-align:center">
<input class="text" type="text" name="userBan" id="userBan" placeholder="User Name to be banned"> 
<input class = "bigBlueBtn" type="submit" value="search">
</td>
</form>
</table>


<div id="ban" class = "bulletins">
<table class = "normalTable" name="banTable">
<?php if(($exist == 1)): ?><tr>
<th>User Name</th>
<th>operation</th>
</tr>
<tr>
<td><?php echo ($banUserId); ?></td>
<?php if(($op == 1)): ?><td><a class = "normalLink" href='__APP__/Post/banUser?userId=<?php echo ($banUserId); ?>'>Ban</a></td><?php endif; ?>
<?php if(($op == 3)): ?><td>Already banned</td><?php endif; ?>
<?php if(($op == 0)): ?><td>Can't ban admin</td><?php endif; ?>
</tr><?php endif; ?>
<?php if(($exist == 0)): ?><tr><td>No user named <span class="pp"><?php echo ($banUserId); ?></span> found!</td></tr><?php endif; ?>
</table>
</div>

<hr>


<div style="margin-left:30px">Banned users List</div>
<div class = "bulletins">
<?php if(($banListEmpty == 0)): ?><Table name="banList" class = "normalTable">
<tr>
<td>User Name</td><td>operation</td>
</tr>
<?php if(is_array($banList)): $i = 0; $__LIST__ = $banList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bl): $mod = ($i % 2 );++$i;?><tr>
<td><?php echo ($bl["id"]); ?></td>

<td><a class = "normalLink" href="__APP__/Post/unban?userId=<?php echo ($bl["id"]); ?>">unban</a></td><?php endforeach; endif; else: echo "" ;endif; ?>
</Table><?php endif; ?>
<?php if(($banListEmpty == 1)): ?><div style = "text-align:center;">Empty List</div><?php endif; ?>
</div>

</div>
</div>
</body>
</html>