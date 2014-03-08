<?php
// 本文档自动生成，仅供测试运行
class IndexAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
        if(session('home_id') && trim(session('home_id'))!="1"){
        session('home_crow',5);
        session('home_pos',0);
		$this->redirect("Show/main");
		}
		else{
		$this->redirect("Show/index");
		}
    }

    /**
    +----------------------------------------------------------
    * 探针模式
    +----------------------------------------------------------
    */
    public function checkEnv()
    {
        load('pointer',THINK_PATH.'/Tpl/Autoindex');//载入探针函数
        $env_table = check_env();//根据当前函数获取当前环境
        echo $env_table;
    }


    public function logout()
    {	
		session('home_id',null);
		session('home_pwd',null);
		session('home_email',null);
		session('home_auth',null);
        session('home_crow',null);
        session('home_pos',null);
		$this->redirect('Show/index');
    }
}
?>