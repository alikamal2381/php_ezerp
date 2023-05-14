<?php
	//error_reporting(E_ALL);
	
	$sesEmpId = $_SESSION['sesEmpId'];	

	if(empty($sesEmpId))
	{
		echo "<br><br><center><font face=tahoma size=3 color=red><b>Access Denied: Please login first.</font><br><br><a href='index.php'>SOS Login Area</a></center>";
		exit();
	}
?>
     


