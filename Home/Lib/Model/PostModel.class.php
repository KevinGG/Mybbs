﻿<?php
class PostModel extends Model{
  public function login($id,$pwd){
  $re = $this->query("Select * from userlist where id='$id' and password='$pwd'");
  return $re;
  }
  
  public function reg($id,$pwd,$email,$auth){
  $re=$this->query("insert into userlist(id,password,email,authority) VALUES ('$id','$pwd','$email',1)");
  return $re;
  }

  public function changepwd($id,$pwd){
  $re=$this->query("update userlist set password='$pwd' where id='$id'");
  return $re;
  }

  public function sendPost($post_name, $post_content,$post_author,$post_date){
  $re=$this->query("insert into post(post_name,post_content,post_author,post_date) values('$post_name','$post_content','$post_author','$post_date')");
  return $re;
  }

  public function reply($belong,$reply_content,$reply_date,$reply_author){
  $re=$this->query("insert into reply(belong, reply_content,reply_date,reply_author) values('$belong','$reply_content','$reply_date','$reply_author')");
  return $re;
  }

  public function modify($sql){
  $re=$this->query($sql);
  return $re;
  }

  public function banUser($userId){
  $re=$this->query("update userlist set authority=3 where id='$userId'");
  return $re;
  }

  public function sendMsg($user_from,$user_to,$Msg_subject,$time,$Msg_content){
  $re=$this->query("insert into message(user_from, user_to, content, time, subject,abcd) values('$user_from', '$user_to', '$Msg_content', '$time', '$Msg_subject',0)");
  return $re;
  }

  public function unban($userId){
  $re=$this->query("update userlist set authority=1 where id='$userId'");
  return $re;
  }


}
?>