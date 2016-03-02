<?php
	
	function displayReport1($sql){
		ini_set('max_execution_time', 0);
		$msc = microtime(true);
		$result = mysql_query($sql);
		$msc = microtime(true)-$msc;
		$numrows = mysql_num_rows($result);
		if($numrows == 0){
			echo 'Query returned no results and executed within '
			  . $msc . '.';
			exit;
		} else{
			echo '<p>Number of survey respondents per 
			possible educational attainment that are parents</p>';
			$i = 0;
			$cols = array();
			while ($i < mysql_num_fields($result)){
				$meta = mysql_fetch_field($result, $i);
				array_push($cols, $meta->name);
				$i = $i + 1;
			}
			while($row = mysql_fetch_array($result)){
				//print_r($row);
				//echo '<br/>';
				switch($row[0]){
					case 0: echo '<p>No grade - '.$row[1].'<br/>'; break;
					case 1: echo '<p>Day care -'.$row[1].'<br/>'; break;
					case 2: echo '<p>Nursery/Kindergarten/Prepatory - '.$row[1].'<br/>'; break;
					case 11: echo '<p>Grade 1 - '.$row[1].'<br/>'; break;
					case 12: echo '<p>Grade 2 - '.$row[1].'<br/>'; break;
					case 13: echo '<p>Grade 3 - '.$row[1].'<br/>'; break;
					case 14: echo '<p>Grade 4 - '.$row[1].'<br/>'; break;
					case 15: echo '<p>Grade 5 - '.$row[1].'<br/>'; break;
					case 16: echo '<p>Grade 6 - '.$row[1].'<br/>'; break;
					case 17: echo '<p>Grade 7 - '.$row[1].'<br/>'; break;
					case 18: echo '<p>Grade 8 - '.$row[1].'<br/>'; break;
					case 19: echo '<p>Grade 9/3rd Year HS - '.$row[1].'<br/>'; break;
					case 20: echo '<p>Grade 10/4th Year HS - '.$row[1].'<br/>'; break;
					case 21: echo '<p>Grade 11 - '.$row[1].'<br/>'; break;
					case 22: echo '<p>Grade 12 - '.$row[1].'<br/>'; break;
					case 23: echo '<p>1st year PS PS/N-T/TV - '.$row[1].'<br/>'; break;
					case 24: echo '<p>2nd year PS PS/N-T/TV - '.$row[1].'<br/>'; break;
					case 25: echo '<p>3rd year PS PS/N-T/TV - '.$row[1].'<br/>'; break;
					case 31: echo '<p>1st year College - '.$row[1].'<br/>'; break;
					case 32: echo '<p>2nd year College - '.$row[1].'<br/>'; break;
					case 33: echo '<p>3rd year College - '.$row[1].'<br/>'; break;
					case 34: echo '<p>3rd year College - '.$row[1].'<br/>'; break;
					case 41: echo '<p>Post grad with units - '.$row[1].'<br/>'; break;
					case 51: echo '<p>ALS Elementary - '.$row[1].'<br/>'; break;
					case 52: echo '<p>ALS Secondary - '.$row[1].'<br/>'; break;
					case 53: echo '<p>SPED Elementary - '.$row[1].'<br/>'; break;
					case 54: echo '<p>SPED Secondary - '.$row[1].'<br/>'; break;
					case 100: echo '<p>Grade school graduate - '.$row[1].'<br/>'; break;
					case 200: echo '<p>High school graduate - '.$row[1].'<br/>'; break;
					case 210: echo '<p>Post secondary graduate - '.$row[1].'<br/>'; break;
					case 300: echo '<p>College graduate - '.$row[1].'<br/>'; break;
					case 400: echo '<p>Master\'s / PhD graduate - '.$row[1].'<br/>'; break;
				}

				}
			}
		}

		function displayReport2($one, $two){
			ini_set('max_execution_time', 0);
			$msc = microtime(true);
			$result = mysql_query($one);
			$msc = microtime(true)-$msc;
			$numrows = mysql_num_rows($result);
			if($numrows == 0){
				echo 'Query returned no results and executed within '
				  . $msc . '.';
				exit;
			} else{
				echo '<p>Number of survey respondents per calamity that 
				did not have a disaster preparedness kit and 
				did not receive any help in said calamity</p>';
				$val = array();
				while($row = mysql_fetch_array($result)){
					array_push($val, $row[0]);
				}
				for($m = 0; $m < count($val); $m++){
					switch($m){
						case 0: echo '<p>Typhoon - '.$val[$m].'</p>'; break;
						case 1: echo '<p>Flood - '.$val[$m].'</p>'; break;
						case 2: echo '<p>Drought - '.$val[$m].'</p>'; break;
						case 3: echo '<p>Earthquake - '.$val[$m].'</p>'; break;
						case 4: echo '<p>Volcanic eruption - '.$val[$m].'</p>'; break;
						case 5: echo '<p>Landslide - '.$val[$m].'</p>'; break;
						case 6: echo '<p>Tsunami - '.$val[$m].'</p>'; break;
						case 7: echo '<p>Fire - '.$val[$m].'</p>'; break;
						case 8: echo '<p>Forest fire - '.$val[$m].'</p>'; break;
						case 9: echo '<p>Armed combat - '.$val[$m].'</p>'; break;
					}
				}
			}

			ini_set('max_execution_time', 0);
			$msc = microtime(true);
			$result = mysql_query($two);
			$msc = microtime(true)-$msc;
			$numrows = mysql_num_rows($result);
			if($numrows == 0){
				echo 'Query returned no results and executed within '
				  . $msc . '.';
				exit;
			} else{
				$row = mysql_fetch_array($result);
				echo '<p>Other calamities - '.$row[0].'</p>';
			}
		}

	function displayResult($sql){
		ini_set('max_execution_time', 0);
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

	function checkConn($db){
		if(!mysql_ping($db)){
			return false;
		} else return true;
	}

	//set variables here
	require_once 'globals.php';

	$db = mysql_connect(DBHOST, DBUSER, DBPASS);
	$curdb = mysql_select_db(DBNAME, $db);
	$sql = "select * from hpq_aquaequip";
	$result = mysql_query($sql);
	if(!checkConn($db)){
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
			} else displayResult($sql);
			
		} else if (isset($_POST['selonequery'])){ //queryforone.html code
			$query = $_POST['selonequery'];
			switch($query){
				case "0":{
					echo 'Please select a query from the dropdown box in the previous page.';
					exit;
				}; break;
				case "1":{
					$sql = "SELECT educal, count(id) FROM hpq_mem 
					WHERE reln=6 GROUP BY educal ORDER BY educal";
					displayReport1($sql);
				}; break;
				case "2":{
					displayReport2("SELECT count(id) FROM hpq_hh WHERE calam1 = 1 AND calam1_aid = 2 AND disas_prep = 2 UNION ALL
						SELECT count(id) FROM hpq_hh WHERE calam2 = 1 AND calam2_aid = 2 AND disas_prep = 2 UNION ALL
						SELECT count(id) FROM hpq_hh WHERE calam3 = 1 AND calam3_aid = 2 AND disas_prep = 2 UNION ALL
						SELECT count(id) FROM hpq_hh WHERE calam4= 1 AND calam4_aid = 2 AND disas_prep = 2 UNION ALL
						SELECT count(id) FROM hpq_hh WHERE calam5 = 1 AND calam5_aid = 2 AND disas_prep = 2 UNION ALL
						SELECT count(id) FROM hpq_hh WHERE calam6 = 1 AND calam6_aid = 2 AND disas_prep = 2 UNION ALL
						SELECT count(id) FROM hpq_hh WHERE calam7 = 1 AND calam7_aid = 2 AND disas_prep = 2 UNION ALL
						SELECT count(id) FROM hpq_hh WHERE calam8 = 1 AND calam8_aid = 2 AND disas_prep = 2 UNION ALL
						SELECT count(id) FROM hpq_hh WHERE calam9 = 1 AND calam9_aid = 2 AND disas_prep = 2 UNION ALL
						SELECT count(id) FROM hpq_hh WHERE calam10 = 1 AND calam10_aid = 2 AND disas_prep = 2",
						"SELECT count(id) FROM hpq_hh 
							WHERE calam11 = 1 AND calam11_aid = '2' AND disas_prep = 2");
				}; break;
			}
		} else if (isset($_POST['seltwoquery'])){ //queryfortwo.html code
			if (isset($_POST['salhouse'])){
				$onesal = $_POST['onesal'];
				if(!is_numeric($onesal)){
					echo 'Please enter a valid salary in the previous page.';
					exit;
				} else{
					$educal = $_POST['eduatt'];
					$sql = "SELECT count(id) FROM hpq_hh, hpq_mem WHERE hpq_mem.id = hpq_hh.id AND hpq_mem.educal ="+
					" AND hpq_hh.reln = 6 AND hpq_hh.tenur = __";
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

	}


?>