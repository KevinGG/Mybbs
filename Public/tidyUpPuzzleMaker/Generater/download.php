<?php
    $fileName = $_GET['fileName'];
	header("Content-Type: application/json");
	header("Content-Disposition: attachment; filename=".basename($fileName));
	readFile("../tmp.json");
?>