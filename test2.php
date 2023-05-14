<?php
	 include "inc/includer.php"; 
	

   echo "<br /><br />";
   echo "<u>Function name is get_dropdown:</u>  ";
   $ddl = get_dropdown('City', 'CityCode', 'Name');


    echo $ddl;

?>