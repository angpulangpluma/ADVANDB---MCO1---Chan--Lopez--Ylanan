<?php

	//set variables here
	require_once 'globals.php';

	$db = mysql_connect(DBHOST, DBUSER, DBPASS);
	$curdb = mysql_select_db(DBNAME, $db);
	$sql = "select * from hpq_aquaequip";
	$result = mysql_query($sql);
	if(!mysql_ping($db)){
		echo 'Lost connection...please reconnect.';
		exit;
	} else {
		//echo 'Connection established!';
		mysql_free_result($result);
		if(isset($_POST['query'])){ //queryanalyzer.html code
			$sql = $_POST['query'];
			if($sql==''){
				echo 'Please enter a query.';
				exit;
			} else{
				$msc = microtime(true);
				$result = mysql_query($sql);
				$msc = microtime(true)-$msc;
				$numrows = mysql_num_rows($result);
				if($numrows == 0){
					echo 'Query returned no results and executed within '
					  . $msc . '.';
					exit;
				} else{
					echo '<html><head><title>Results</title></head><body>';
					echo '<p>Your query was: ' . $sql . '<br/>';
					echo 'Execution time: ' . $msc . '<br/>';
					echo 'Results: <br>';
					echo "<table>";
					$i = 0;
					echo '<tr>';
					$cols = array();
					while ($i < mysql_num_fields($result)){
						$meta = mysql_fetch_field($result, $i);
						echo '<td>'.$meta->name.'</td>';
						array_push($cols, $meta->name);
						$i = $i + 1;
					}
					echo '</tr>';
					while($row = mysql_fetch_array($result)){
						echo '<tr>';
						for($x = 0; $x < count($cols); $x++){
							echo '<td>'.$row[$cols[$x]].'</td>';
						}
						echo '</tr>';
					}
					echo "</table></body></html>";
				}
			}
			
		} else if (isset($_POST['selonequery'])){ //queryforone.html code
			$query = $_POST['selonequery'];
			switch($query){
				case "0":{
					echo 'Please select a query from the dropdown box in the previous page.';
					exit;
				}; break;
				case "1":{
					$sql = "SELECT id FROM hpq_mem WHERE educal=16 AND reln=6";
				}; break;
				case "2":{
					$sql = "SELECT id FROM hpq_hh WHERE 
					disas_prep=2 AND 
					((calam1=1 AND calam1_aid=2) OR
						(calam2=1 AND calam2_aid=2) OR 
						(calam3=1 AND calam3_aid=2) OR 
						(calam4=1 AND calam4_aid=2) OR
						(calam5=1 AND calam5_aid=2) OR 
						(calam6=1 AND calam6_aid=2) OR 
						(calam7=1 AND calam7_aid=2) OR
						(calam8=1 AND calam8_aid=2) OR 
						(calam9=1 AND calam9_aid=2) OR
						(calam10=1 AND calam10_aid=2) OR
						(calam11=1 AND calam11_aid=\"2\"))";
				}; break;
			}
		} else if (isset($_POST['seltwoquery'])){ //queryfortwo.html code
			if (isset($_POST['salhouse'])){
				switch($query){
					case "0":{
						echo 'Please select a query from the dropdown box in the previous page.';
						exit;
					}; break;
				}
			} else if (isset($_POST['diedcal'])){
				switch($query){
					case "0":{
						echo 'Please select a query from the dropdown box in the previous page.';
						exit;
					}; break;
				}
			}
		} else if (isset($_POST['seltriquery'])){

		} else if (isset($_POST['selresquery'])){

		}

		//execute query
		$msc = microtime(true);
		$result = mysql_query($sql);
		$msc = microtime(true)-$msc;
		$numrows = mysql_num_rows($result);
		if($numrows == 0){
			echo 'Query returned no results and executed within '
			  . $msc . '.';
			exit;
		} else{
			echo '<html><head><title>Results</title></head><body>';
			echo '<p>Your query was: ' . $sql . '<br/>';
			echo 'Execution time: ' . $msc . '<br/>';
			echo 'Results: <br>';
			echo "<table>";
			$i = 0;
			echo '<tr>';
			$cols = array();
			while ($i < mysql_num_fields($result)){
				$meta = mysql_fetch_field($result, $i);
				echo '<td>'.$meta->name.'</td>';
				array_push($cols, $meta->name);
				$i = $i + 1;
			}
			echo '</tr>';
			while($row = mysql_fetch_array($result)){
				echo '<tr>';
				for($x = 0; $x < count($cols); $x++){
					echo '<td>'.$row[$cols[$x]].'</td>';
				}
				echo '</tr>';
			}
			echo "</table></body></html>";
		}
	}


?>