<?php
class ShowAction extends Action{
//登陆用户信息
private $id;
private $pwd;
private $email;
private $auth;


 //登陆界面
 public function index(){
 $this->navigationBar();
 $this->display(index);
 }
 
 //注册界面
 public function register(){
 $this->navigationBar();
 $this->display(register);
 }

 //检测用户名是否重复
 public function checkNameUnique(){
 $id=$_GET['id'];
 $re=D('Show')->countList("userlist","where id='$id'");
 if($re==0)echo true;
 else echo false;
 }

 //检测旧密码是否输入正确
 public function checkpwd(){
 $password=$_GET['pwd'];
 $id=session('home_id');
 $re=session('home_pwd');
 if($re==$password) echo true;
 else echo false;
 }

 //修改密码界面
 public function changepwd(){
 $id=session('home_id');
 $this->assign('id',$id);
 $this->navigationBar();
 $this->display(changepwd);
 }
 
 //登陆成功，显示留言板主界面
 public function main(){
 if(session('home_id')==""){
 $this->redirect("Index/index");
 }
 $id=session('home_id');
 $auth=session('home_auth');
 $this->assign('id',$id);
 $this->assign('auth',$auth);
 $count=D('Show')->countList("post");
 //import("@.ORG.Page");
 //$p = new Page ($count,8);
 //$p->setConfig('prev',"上一页");
 //$p->setConfig('next','下一页');
 //$p->setConfig('first','首页');
 //$p->setConfig('last','末页');
 //$page=$p->show();
 //$this->assign("page",$page);
 //$firstRow=$p->firstRow;
 //$listRows=$p->listRows;
 $firstRow=0;
 $crow=session('home_crow');
 $post=D('Show')->getList("post","order by post_date desc limit $firstRow,$crow");

 if($count>0){
 	$reply=new Model('reply'); 
   foreach($post as $n=>$val){
     if($id==$val['post_author'] || $auth==0){
     $post[$n]['hasAuth']=0;
     }
     else{
     $post[$n]['hasAuth']=1;
     }
     $where="where belong=".$val['post_id'];
     $countReply=D('Show')->countList("reply",$where);
     $post[$n]['level']=$countReply;
     $post[$n]['reply']=$reply->order('reply_date desc')->where("belong=".$post[$n]['post_id'])->select();
	 foreach($post[$n]['reply'] as $rep=>$au){
	    if($id==$post[$n]['reply'][$rep]['reply_author'] || $auth==0){
	    $post[$n]['reply'][$rep]['hasAuth']=0;
	    }
	    else{
	    $post[$n]['reply'][$rep]['hasAuth']=1;
	    }
	 }
   }
 }
 $this->assign('post',$post);
 $this->assign('row',$count);
 $this->assign('crow',$crow);
 $this->assign('pos',session('home_pos'));
// $this->assign('pwd',session("home_pwd"));
 $this->navigationBar();
 $this->display(main);
 }

 public function deletePost(){
 $post_id=$_GET['post_id'];
 $re=D('Show')->deletePost($post_id);
 if($re!==false){
 $this->redirect("Show/main");
 }
 else{
 $this->alertError("Delete failure！");
 }
 }

 public function modifyPost(){
 $post_id=$_GET['post_id'];
 $sql="select * from post where post_id='$post_id'";
 $re=D('Show')->getSingle($sql);
 $this->assign('nowcontent',$re); 
 $this->assign("op","post");
 $this->assign("bbsid",$post_id);
 $this->navigationBar();
 $this->display(modify);
 }

 public function deleteReply(){
 $reply_id=$_GET['reply_id'];
 $re=D('Show')->deleteReply($reply_id);
 if($re!==false){
 $this->redirect("Show/main");
 }
 else{
 $this->alertError("Delete failure！");
 }
 }

 public function modifyReply(){
 $reply_id=$_GET['reply_id'];
 $sql="select * from reply where reply_id='$reply_id'";
 $re=D('Show')->getSingle($sql);
 $this->assign('nowcontent',$re); 
 $this->assign("op","reply");
 $this->assign("bbsid",$reply_id);
 $this->navigationBar();
 $this->display(modify);
 }
//动态加载
 public function dynamicLoad(){
 $crow=session('home_crow');
 $crow=$crow+5;//再加载5行
 $pos=$_GET['pos'];
 session('home_crow',$crow);
 session('home_pos',$pos);
 echo true;
 }
//实时记录滚动条位置，用于各种返回
 public function posSet(){
 	$pos=$_GET['pos'];
 	session('home_pos',$pos);
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
	
   //Jump to Admin page
   public function toAdmin(){
	if(session('home_id')==""){
		$this->redirect("Index/index");
	}
	if(session('home_auth')!=0){
		$this->redirect("Index/index");
	}
	$id=session('home_id');
	$auth=session('home_auth');
	$this->assign('id',$id);
	$this->assign('auth',$auth);
	$this->assign('exist',100);
    $re=D('Show')->banList();
	
    if(is_array($re) && count($re)>0){
		$this->assign('banList',$re);
	}
	else{
	  $this->assign('banListEmpty',1);
	}
	$this->navigationBar();
	$this->display(admin);
   }

    //Find a user to ban
	public function findUserToBan(){
		$userId=$_POST['userBan'];
		$re=D('Show')->findSingleUser($userId);
		if(is_array($re) && count($re)==1){
		   $banUserId=$re[0]['id'];
		   $this->assign('banUserId',$banUserId);
		   $this->assign('exist',1);
		   $banUserAuth=$re[0]['authority'];
		   if($banUserAuth==0){
		      $this->assign('op',0);
		   }
		   else if($banUserAuth==3){
		      $this->assign('op', 3);
		   }
		   else{
			  $this->assign('op',1);
		   }
		}
		else{
			$this->assign('banUserId',$userId);
		    $this->assign('exist',0);
		}
		$id=session('home_id');
	    $auth=session('home_auth');
	    $this->assign('id',$id);
	    $this->assign('auth',$auth);
		 $re=D('Show')->banList();
	
		if(is_array($re) && count($re)>0){
			$this->assign('banList',$re);
		}
		else{
			$this->assign('banListEmpty',1);
		}
		$this->navigationBar();
		$this->display(admin);
	}

	  


    //msgList
	public function msg(){
		$id=session('home_id');
	    $auth=session('home_auth');
		$this->assign('id',$id);
		$this->assign('auth',$auth);
		$re=D('Show')->msgList($id);
		//var_dump($re);
		if(is_array($re) && count($re)>0){
			foreach($re as $n=>$msg){
				$msgList[$n]=$msg;
				$msgList[$n]['content']=substr($re[$n]['content'],0,10);
			}
		}
		//var_dump($msgList);
		$this->assign('msgList',$msgList);
		$this->navigationBar();
		$this->display(msg);
	}

	//readmsg
	public function readMsg(){
	   $msgId=$_GET['msgId'];
	   $re=D('Show')->readMsg($msgId);
	   $re2=D('Show')->setRead($msgId);
	   if(is_array($re) && count($re)==1 && $re2!==false){
	      $this->assign('msg',$re[0]);
	   }
	   else{
	      alertError("Fail to read!");
	   }
	   $this->navigationBar();
	   $this->display(readMsg);
	}





//navigation Bar action added
	public function apps(){
		$this->navigationBar();
		$this->display(apps);
	}


	public function aboutUs(){
		$this->navigationBar();
		$this->display(aboutUs);
	}

	public function navigationBar(){
		$navigationBar = '<table class = "navigationBar">
								<tr>
									<td>
										<a style="font-size:20" href="__APP__/Navigation/APP">App Workshop</a>
									</td><td>
										<a style="font-size:20" href="__APP__/Navigation/BB">Bulletins Board</a>
									</td><td>
										<a id ="tools" target = "_blank" style="font-size:20" href="__PUBLIC__/tidyUpPuzzleMaker/index.html">Online Tools</a>
									</td><td>
										<a style="font-size:20" href="__APP__/Navigation/AboutUs">About Us</a>
									</td>
								<tr>
						  </table>';
		$this->assign('navigationBar', $navigationBar);

	}

}




?>
