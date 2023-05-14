<?php
	function give_counter($strTableName, $strID, $Status, $StatusId)
	{

		//echo "select count($strID) as myCount from $strTableName $StatusSearch";
		$nResult = mysql_query("select count($strID) as myCount from $strTableName");
		$nRs = mysql_fetch_array($nResult);
		return "(" . $nRs["myCount"]. ")";
	}

	$strCRMQuery20 = "select * from tblemployee where emp_id = '$sesEmpId'";
	$nCRMResult20 = mysqli_query($link, $strCRMQuery20);
	$nCRMRs20 = mysqli_fetch_assoc($nCRMResult20);
	
	$strCRMName = $nCRMRs20["emp_name"];
?>
<DIV id=dhtmlgoodies_xpPane>
<?php
	$nLeftCatResult = mysqli_query($link, "select * from crm_right_category order by cat_id");
	$nTotalCats = mysqli_num_rows($nLeftCatResult);
	$CountComa = 1;
	while($nLeftCatRs = mysqli_fetch_assoc($nLeftCatResult)) { 
	//$strCatName = "'".$nLeftCatRs["cat_name"]."',";
	if($CountComa != $nTotalCats)
		$strCatName = $strCatName . "'" . $nLeftCatRs["cat_name"] . "',";
	else
		$strCatName = $strCatName . "'" . $nLeftCatRs["cat_name"] . "'";
	$CountComa++;
		

		
		$nLeftResult = mysqli_query($link, "select * from crm_right_heading, crm_employee_heading_right
										where 
											head_cat_id = '".$nLeftCatRs["cat_id"]."' and head_id = rgt_head_id and rgt_emp_id = '$sesEmpId'
													order by head_id");
		echo "<DIV class=dhtmlgoodies_panel><DIV>";
		while($nLRs = mysqli_fetch_assoc($nLeftResult)) { 
			if($nLRs["head_qbol"] == '1')
			{
				if($nLRs["head_val"] == '1')
					$inqQuery = $nLRs["head_query"]. " and inq_emp_id = '$sesEmpId'";
				else
					$inqQuery = $nLRs["head_query"];
				
				//echo $inqQuery;
				
				$nSysResult = mysql_query($inqQuery);
				$nSysRs = mysql_fetch_array($nSysResult);
				$PrintCounter = " (" . $nSysRs["myCount"] . ")";
			}
			else
				$PrintCounter = "";
			
				echo "<a href='".$nLRs["head_url"]."'>".$nLRs["head_name"]." $PrintCounter </a><br>";
			
		
		} // end while
		echo "<br></DIV></DIV>";
	} // end while
?>
</div>

<?php
	$strTrueString = "true";
	for($i=1;$i<=$nTotalCats;$i++)
	{
		$strTrueString = $strTrueString . ", true";
		
	}
?>
		<SCRIPT type=text/javascript>
		initDhtmlgoodies_xpPane(Array(<?=$strCatName;?>),Array(<?=$strTrueString;?>),Array('pane1','pane2','pane3','panel4'));
		</SCRIPT>