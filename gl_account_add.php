<?php 
	//ob_start();
	include "inc/includer.php"; 

	extract($_POST);
	
	//$hdn_primary = $_POST['hdn_primary'];
	$strTitle = $_POST['strTitle'];
	$strMode = $_POST['strMode'];
	$hdn_primary = $_POST['hdn_primary'];

	$account_name = $_POST['account_name'];
	$account_type = $_POST['account_type'];
	$chkStatus = $_POST['chkStatus'];

	if ($chkStatus == 'true') {
		$status = '1';
	} else {
		$status = '0';
	}

	$opening_balance = 0;
	$opening_date = date("Y-m-d");
	$last_update = date("Y-m-d");

	//$discontinued = '0';
	$sql = '';

	if(isset($_POST['strTitle']) && $_POST['strTitle'] == "Account") {
	
		/// ************ ADD / UPDATE RECORD ********************
		if(isset($_POST['strTitle']) && $_POST['strTitle'] != "" && 
			 isset($_POST['account_name']) && $_POST['account_name'] != ""  &&
			 isset($_POST['account_type']) && $_POST['account_type'] != "0"
			) {

			if ($strMode == 'Add New') {
				//$hdn_primary = $_POST['hdn_primary'];
				//$hdn_primary = getmaxId('item', 'itemid');

				/* get max id from item table */
				$fieldname = 'accountid';
				$tablename = 'account';

			  	$json = array( );

			    $strQuery = "select max(".$fieldname.") + 1 as max_id from ".$tablename. "; ";
			    $nResult = mysqli_query($link, $strQuery);

			    while( $row = mysqli_fetch_assoc( $nResult ) ) {
			        $json[] = $row;
			    }

				$hdn_primary = $json[0]['max_id'];
				//**************end of max field query*******************

				$sql = "INSERT INTO `account` (accountid, account_name, account_type, status, opening_balance, opening_date, last_update) values ('$hdn_primary', '$account_name', '$account_type', '$status', '$opening_balance', '$opening_date', '$last_update'); ";


			} else {   //EDIT Mode
				$hdn_primary = $_POST['hdn_primary'];

				$sql = "UPDATE `account` SET ";
				$sql .= "account_name = '$account_name', ";
				$sql .= "account_type = '$account_type', ";
				$sql .= "status = '$status' ";
				$sql .= "WHERE accountid = '$hdn_primary' ";	
			}
			
			$nResult = mysqli_query($link, $sql);

		}  ///end of account

	} else if(isset($_POST['strTitle']) && $_POST['strTitle'] == "Party") {
		echo "Party";	
	}



?>
