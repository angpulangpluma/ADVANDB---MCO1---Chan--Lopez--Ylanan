<?php
 require_once 'globals.php';
?>
<html>
	<head>
	<title>Reports Generator - Selected Queries only</title>
	<script type="text/javascript" src="jquery-1.11.0.js"></script>
	<script type="text/javascript" src="jquery-ui.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			document.getElementById('query').addEventListener('change', function(){
				switch(document.getElementById('query').value){
					case '0':{
						$('#one').hide();
						$('#two').hide();
					}; break;
					case '1':{
						$('#one').hide();
						$('#two').hide();
					}; break;
					case '2':{
						$('#one').hide();
						$('#two').hide();
					}; break;
					case '3':{
						$('#one').show();
						$('#two').hide();
					}; break;
					case '4':{
						$('#one').hide();
						$('#two').show();
					}; break;
				}
			});	
		});
		
		</script>
	</head>
	<body>
		<form method="POST" action="queryrun.php">
		<select name="query" id="query">
			<option value="0" selected>Select query</option>
			<option value="1">Number of survey respondents per possible educational attainment that are parents</option>
			<option value="2">Number of survey respondents per calamity that did not have a disaster preparedness kit and did not receive any help in any calamity</option>
			<option value="3">Number of survey respondents who are parents having 
			a certain salary and a certain house ownership given their educational attainment</option>
			<option value="4">Number of survey respondents who died because of a certain calamity and was not given help</option>
		</select><br/>
		<div id="one" style="display:none" method="POST" name="salhouse" action="queryrun.php">
			<!--<input type="submit" value="salhouse here!"><br/>-->
			<p>Enter salary: <input type="number" value="0" name="onesal"></p>
			<p>Choose educational attainment: 
				<select name="eduatt">
					<?php
					$db = mysql_connect(DBHOST, DBUSER, DBPASS);
					$curdb = mysql_select_db(DBNAME, $db);
					$sql = "select * from hpq_aquaequip";
					$result = mysql_query($sql);
					if(!mysql_ping($db)){
						$db = mysql_connect(DBHOST, DBUSER, DBPASS);
						$curdb = mysql_select_db(DBNAME, $db);
					} else{
						mysql_free_result($result);
						$sql = "SELECT distinct educal FROM hpq_mem ORDER BY educal";
						$result = mysql_query($sql);
						$numrows = mysql_num_rows($result);
						if($numrows == 0){
							echo 'Query returned no results and executed within '. $msc . '.';
							exit;
						} else{
							$i = 0;
							$cols = array();
							while ($i < mysql_num_fields($result)){
								$meta = mysql_fetch_field($result, $i);
								array_push($cols, $meta->name);
								$i = $i + 1;
							}
							$val = array();
							while($row = mysql_fetch_array($result)){
								for($x = 0; $x < count($cols); $x++){
									array_push($val, $row[$cols[$x]]);
								}
							}
							
							foreach($val as $x){
								switch($x){
									case "0": $label = "No Grade"; break;
									case "1": $label = "Day Care"; break;
									case "2": $label = "Nursery/Kindergarten/Prepatory"; break;
									case "11": $label = "Grade 1"; break;
									case "12": $label = "Grade 2"; break;
									case "13": $label = "Grade 3"; break;
									case "14": $label = "Grade 4"; break;
									case "15": $label = "Grade 5"; break;
									case "16": $label = "Grade 6"; break;
									case "17": $label = "Grade 7"; break;
									case "18": $label = "Grade 8"; break;
									case "19": $label = "Grade 9/3rd Year HS"; break;
									case "20": $label = "Grade 10/4th Year HS"; break;
									case "21": $label = "Grade 11"; break;
									case "22": $label = "Grade 12"; break;
									case "23": $label = "1st year PS PS/N-T/TV"; break;
									case "24": $label = "2nd year PS PS/N-T/TV"; break;
									case "25": $label = "3rd year PS PS/N-T/TV"; break;
									case "31": $label = "1st year College"; break;
									case "32": $label = "2nd year College"; break;
									case "33": $label = "3rd year College"; break;
									case "34": $label = "4th year College or higher"; break;
									case "41": $label = "Post grad with units"; break;
									case "51": $label = "ALS Elementary"; break;
									case "52": $label = "ALS Secondary"; break;
									case "53": $label = "SPED Elementary"; break;
									case "54": $label = "SPED Secondary"; break;
									case "100": $label = "Grade school graduate"; break;
									case "200": $label = "High school graduate"; break;
									case "210": $label = "Post secondary graduate"; break;
									case "300": $label = "College graduate"; break;
									case "400": $label = "Master's/PhD graduate"; break;
								}
								echo '<option value=\"'.$x.'\">'.$label.'</option>';
							}
							
						}
					}
					?>
				</select>
			</p>
		</div>
		<div id="two" style="display:none" method="POST" name="diedcal" action="queryrun.php">
			<!--<input type="submit" value="salhouse here!"><br/>-->
			<p>Choose calamity: 
				<select name="calsel">
					<option value="1" selected>Drowned from flood</option>
					<option value="2" selected>Victim of landslide</option>
					<option value="3" selected>Electrocuted during typhoon</option>
					<option value="4" selected>Earthquake</option>
					<option value="5" selected>Volcanic eruption</option>
					<option value="6" selected>Landslide</option>
					<option value="7" selected>Tsunami</option>
					<option value="8" selected>Fire</option>
					<option value="9" selected>Select query</option>
					<option value="10" selected>Select query</option>
					<option value="11" selected>Select query</option>
				</select>
		</div>
		<input type="submit" name="queryLookup" value="Submit Query"/>
		</form>
	</body>