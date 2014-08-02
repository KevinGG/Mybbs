<?php
class NavigationAction extends Action{
	
	public function APP(){
		$this->redirect("Show/apps");
	}

	public function BB(){
		if(session('home_id') && trim(session('home_id'))!="1"){
            session('home_crow',5);
            session('home_pos',0);
		    $this->redirect("Show/main");
		} 
		else{
		    $this->redirect("Show/index");
		}
	}

	public function AboutUs(){
		$this->redirect("Show/aboutUs");
	}

}

?>