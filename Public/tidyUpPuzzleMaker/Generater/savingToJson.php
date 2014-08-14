<?php
	$puzzleArray = myArrayMap("toInt",$_POST['puzzleArray']);
	$targetScore = toInt($_POST['targetScore']);
	$moves = toInt($_POST['moves']);
	$time = toInt($_POST['time']);

	$fileName = "Level_".$_POST['level'].".json";

	$puzzle = array("titles" => $puzzleArray,
					"targetScore" => $targetScore,
					"moves" => $moves,
					"time" => $time
				   );
    $json = json_encode($puzzle);

    file_put_contents("../tmp.json",$json);
    echo $fileName;


	function myArrayMap($func, $arr){
	  $ret = array();
	  foreach ($arr as $key => $val)
	  {
	      $ret[$key] = (is_array($val) ? myArrayMap($func, $val) : $func($val));
	  }
	  return $ret;
	}

	function toInt($str){
		return (int)$str;
	}

?>