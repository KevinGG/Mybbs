<?php
    $fileName = $_GET['fileName'];
	header("Content-Type: application/pdf");
	header("Content-Disposition: attachment; filename=".basename($fileName));
	readFile("../downloadable/".basename($fileName));
?>