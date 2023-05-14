<?php
	 include "inc/includer.php"; 
	 include "emp_ck.php";

	 

   $strQuery = "select * from systemusers where userid = $sesEmpId";
   $stm = $link->query($strQuery);
   $result = $stm->fetchAll();
   $nManager = $result[0]["username"];


   echo "UserName: " . "<b>" . $nManager . "</b>";

   echo "<br /><br />";
   echo "<h3>User Defined Function</h3>";			


   echo "<br /><br />";
   echo "<u>Function name is whatIsToday:</u>  ";
   whatIsToday($nManager);


   echo "<br /><br />";
   echo "<u>Function name is getmaxId:</u>  ";
   echo getmaxId('account', 'accountid');


   echo "<br /><br />";
   echo "<u>Function name is getmaxId_against_type:</u>  ";
   echo getmaxId_against_type('tblblock', 'blo_id', 'blo_status', 0);


   echo "<br /><br />";
   echo "<u>Function name is checkifcodeexists:</u>  ";

   if (checkifcodeexists('tblblock', 'blo_id', 8) == true) {
   		echo "Code Exist";
   } else {
   		echo "Code Doesnot Exist";
   }



   echo "<hr><hr>";


   echo "<br /><br />";
   echo "<u>Function name is getsumoffield:</u>  ";
   echo getsumoffield('account', 'opening_balance', 'accountid', 1);









?>