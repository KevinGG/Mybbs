<?php
class PostAction extends Action{
//登陆用户信息
private $id;
private $pwd;
private $email;
private $auth;
 
 public function __construct(){
   $this->id=session('home_id');
   $this->pwd=session('home_pwd');
   $this->email=session('home_email');
   $this->auth=session('home_auth');
 }
  //前台用户登陆
  public function login(){
  $id=$_POST['username'];
  $pwd=$_POST['userpwd'];
  $re=D('Post')->login($id,$pwd);
  if(is_array($re) && count($re)>0){
  session('home_id',$id);
  session('home_pwd',$pwd);
  session('home_email',$re[0]['email']);
  session('home_auth',$re[0]['authority']);
  if(session('home_auth')==3){
	$this->alertError("User Banned!");
  }
  //初始默认的显示条目数,用来表示数据库显示到的当前行数
  session('home_crow',5);
  //初始默认浏览器显示在顶部
  session('home_pos',0);
  $this->redirect("Show/main");
  }
  else{
  $this->alertError("User Name or Password mismatch！");
  }
  }

  //用户注册
  public function reg(){
  $id=$_POST['name'];
  $pwd=$_POST['pwd'];
  $email=$_POST['email'];
  $auth=1;//1为普通用户
  $re=D('Post')->reg($id,$pwd,$email,$auth);
  if($re!==false){
  session('home_id',$id);
  session('home_pwd',$pwd);
  session('home_email',$email);
  session('home_auth',$auth);
  $this->alertError("Registration Succeeds！Automatically jump and login！","/Index/index");
  }
  else{
  $this->alertError("Registration Fails！");
  }
  }


  //修改密码
  public function changepwd(){
  $pwd=$_POST['pwd'];
  $re=D('Post')->changepwd($this->id,$pwd);
  if($re!==false){
  session('home_pwd',$pwd);
  $this->alertError("Password Modified successfully！","/Index/index");
  }
  else{
  $this->alertError("Password Modified failure！");
  }
  }

  //发送留言
  public function sendPost(){
  $post_name=$_POST['post_id'];
  $post_content=$_POST['post_content'];
  $post_author=$this->id;
  import("@.ORG.Fun");
  $date=new Fun();
  $post_date=$date->myGetDate();
  $re=D('Post')->sendPost($post_name,$post_content,$post_author,$post_date);
  if($re!==false){
  $this->redirect("Show/main");
  }
  else {
  $this->alertError("Bulletin failed！");
  }
  }

  //修改留言或回复
  public function modify(){
  $content=$_POST['content'];
  $table=$_POST['op'];
  $bbsid=$_POST['bbsid'];
  if($table=="post"){ 
	  $sql="update post set post_content = '$content' where post_id = '$bbsid'";
  }
  elseif($table=="reply"){
	  $sql="update reply set reply_content = '$content' where reply_id = '$bbsid'";
  }
  $re=D('Post')->modify($sql);
  if($re!==false){
  $this->redirect("Show/main");
  }
  else{
  $this->alertError("Modification failed！");
  }
  }

  //回复
  public function reply(){
  $reply_content=$_POST['reply_content'];
  $belong=$_POST['belong'];
  $reply_author=$this->id;
  import("@.ORG.Fun");
  $date=new Fun();
  $reply_date=$date->myGetDate();
  $re=D('Post')->reply($belong,$reply_content,$reply_date,$reply_author);
  if($re!==false){
  $this->redirect("Show/main");
  }
  else {
  $this->alertError("Reply failed！");
  }
  }
  //消息弹出和后续页面
		private function alertError($str,$url=null)
		{
			header("Content-type: text/html;charset=gb2312");
			if(!$url){
				echo "<script type='text/javascript'>alert('".$str."');history.go(-1);</script>";
			}else{
				echo "<script type='text/javascript'>alert('".$str."');</script>";
				$this->redirect($url);
			}
			exit;
		}

   

	//ban the user
	public function BanUser(){
	   $banUserId=$_GET['userId'];
	   //var_dump($banUserId);
	   $re=D('Post')->banUser($banUserId);
	   if($re!==false){
	   $this->redirect("Show/toAdmin");
	   }
	   else{
	   $this->alertError("Ban user failure!");
	   }
	}

	//send Msg
	public function sendMsg(){
		$user_from=$this->id;
		import("@.ORG.Fun");
        $date=new Fun();
        $time=$date->myGetDate();
	    $user_to=$_POST['user_to'];
		$Msg_subject=$_POST['Msg_subject'];
		$Msg_content=$_POST['Msg_content'];
		$re=D('Post')->sendMsg($user_from,$user_to,$Msg_subject,$time,$Msg_content);
		if($re!==false){
		  $this->redirect("Show/msg");
		}
		else{
		  $this->alertError("Msg sent failure");
		}
	}

	//unban
	public function unban(){
		$userId=$_GET['userId'];
		$re=D('Post')->unban($userId);
		if($re!==false){
			$this->redirect("Show/toAdmin");
		}
		else{
		  alertError("Fail to unban");
		}
	}

}
?>