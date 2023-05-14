<?php
	ob_start();
	include "inc/includer.php"; 
	include "emp_ck.php";
	include "emp_ck.php";
	
	session_destroy();

	//session_unregister("sesEmpId");
	//session_unregister("sesEmpName");
	//session_unregister("sesEmpEmail");

	$sesEmpId = "";
	$sesEmpName = "";
	$sesEmpEmail = "";
		
	header("location:index.php");
?>