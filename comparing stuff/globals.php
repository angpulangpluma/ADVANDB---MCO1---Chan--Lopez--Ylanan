<?php
	/*
	* globals.php
	* @author MLDL
	* @20160221
	* This file contains global constants.
	*/

	$sandbox = true;

	//MLDL's database values, add more if necessary
	if($sandbox === true){
		define("DBHOST", "localhost");
		define("DBNAME", "marinduque_info");
		define("DBUSER", "root");
		define("DBPASS", "admin");
	} else{
		define("DBHOST", "localhost");
		define("DBNAME", "marinduque_info");
		define("DBUSER", "root");
		define("DBPASS", "admin");
	}
?>
