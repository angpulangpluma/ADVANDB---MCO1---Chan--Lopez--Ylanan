<?php
	/*
	* globals.php
	* @author MLDL
	* @20160221
	* This file contains global constants.
	*/

	$sandbox = true;

	if($sandbox === true){
		define("DBHOST", "localhost");
		define("DBNAME", "");
		define("DBUSER", "root");
		define("DBPASS", "admin");
	} else{
		define("DBHOST", "localhost");
		define("DBNAME", "");
		define("DBUSER", "root");
		define("DBPASS", "admin");
	}
?>
