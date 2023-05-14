<?php
	ob_start();
	include "inc/conn.php"; 
	//include "inc/includer.php"; 

	$strLogin = $_REQUEST['strLogin'];
	$strPass = $_REQUEST['strPass'];
	
	$strQuery = "select * from systemusers where userloginid = '$strLogin' and userpassword = '$strPass'";

	// use the connection here
	$stm = $link->query($strQuery);

	// fetch all rows into array, by default PDO::FETCH_BOTH is used
	$nRs = $stm->fetchAll();

	/**/
	// Count Rows ....
	$res = $link->prepare("SELECT COUNT(*) FROM systemusers where userloginid = '$strLogin' and userpassword = '$strPass'");
	$res->execute();
	$nRecFnd = $res->fetchColumn();
	

	//$nRecFnd = getRowCount('systemusers', 'userloginid', $nRs[0]["userloginid"], userpassword, $nRs[0]["userpassword"]);

	//$nResult = mysqli_query($link, $strQuery);
	//$nRecFnd = mysqli_num_rows($nResult);
	//$nRs = mysqli_fetch_assoc($nResult);
	
	if($nRecFnd >= 1)
	{
		session_start();
		$_SESSION["sesEmpId"] = $nRs[0]["userid"];

		$adm_login = $nRs[0]["userloginid"];
		
		$adm_pass = $nRs[0]["userpassword"];
		
		header("location:home.php");
		exit();
	}
	else
	{
		header("location:index.php?nErr=1");
		exit();
	}
?>