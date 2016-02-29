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
				echo '<p>Execution time: ' . $msc . '<br/>';
				echo '<p>Results: ';
				echo "<table>";
				$i = 0;
				echo '<tr>';
				while ($i < mysql_num_fields($result)){
					$meta = mysql_fetch_field($result, $i);
					echo '<td>'.$meta->name.'</td>';
					$i = $i + 1;
				}
				echo '</tr>';
				while($row = mysql_fetch_array($result)){
					$currow = current($row);
					echo '<tr><td>' . $currow . '</td></tr>';
					next($row);
				}
				echo "</table></body></html>";

			}
		}
	}


?>