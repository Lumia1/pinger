<?php

include 'config.inc.php';

// Initializing connection data.
$host = Config::DB_HOST;
$dbname = Config::DB_NAME;
$username = Config::DB_USER;
$password = Config::DB_PASS;


//connect to the db
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); 

//build the query
$query="SELECT * FROM `servers`";

//execute the query
$data = $dbh->query($query);
//convert result resource to array
$result = $data->fetchAll(PDO::FETCH_ASSOC);

//view the entire array (for testing)
//print_r($result);

//display array elements
//foreach($result as $output) {
	
//echo $output['name'] . " " . $output['ip'] . "<br />";

//}

?>