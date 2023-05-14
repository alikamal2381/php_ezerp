<?php 
	//ob_start();
	include "inc/includer.php"; 

	extract($_POST);

	echo $strTitle = $_POST['strTitle'];
	
	/// ************ EDIT MODE ********************
	/// get Fill_Editing_Fields for update
	if(isset($_POST['id']) && isset($_POST['id']) != "")
	{
		$accountid = $_POST['id'];

	  	$json = array( );

	    $strQuery = "Select * From account Where accountid = '$accountid'; ";
	    $nResult = mysqli_query($link, $strQuery);

	    while( $row = mysqli_fetch_assoc( $nResult ) ) {
	        $json[] = $row;
	    }

		echo json_encode( $json );
	}

	/// ************ DELETE ********************
	/// Delete record
	if(isset($_POST['confirm_delete_id']) && isset($_POST['confirm_delete_id']) != "")
	{
		$accountid = $_POST['confirm_delete_id'];

	     $strQuery = "Delete From account Where accountid = '$accountid'; ";
	     $nResult = mysqli_query($link, $strQuery);
	}

?>
