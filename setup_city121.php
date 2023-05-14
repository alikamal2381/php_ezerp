<?php 
	//ob_start();
	include "inc/includer.php"; 

	extract($_POST);

	echo $strTitle = $_POST['strTitle'];
	
	/// ************ EDIT MODE ********************
	/// get Fill_Editing_Fields for update
	if(isset($_POST['id']) && isset($_POST['id']) != "")
	{
		$citycode = $_POST['id'];

	  	$json = array( );

	    //$strQuery = "Select * From city Where citycode = '$citycode'; ";

		$strQuery = "Select * From city Where citycode = '$citycode'; ";
		$stm = $link->query($strQuery);
		$result = $stm->fetchAll();

	    //$nResult = mysqli_query($link, $strQuery);
		/*
	    while( $row = mysqli_fetch_assoc( $nResult ) ) {
	        $json[] = $row;
	    }
		*/

		echo json_encode( $result );
	}

	/// ************ DELETE ********************
	/// Delete record
	if(isset($_POST['confirm_delete_id']) && isset($_POST['confirm_delete_id']) != "")
	{
		$citycode = $_POST['confirm_delete_id'];

	     $strQuery = "Delete From account Where accountid = '$citycode'; ";
	     $nResult = mysqli_query($link, $strQuery);
	}

?>
