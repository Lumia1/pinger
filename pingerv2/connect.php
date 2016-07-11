<?php

require_once 'config.inc.php';
require_once 'class.db.php';

// Initializing connection data.
$host = Config::DB_HOST;
$dbname = Config::DB_NAME;
$username = Config::DB_USER;
$password = Config::DB_PASS;


//connect to the db
$db = new db("mysql:host=$host;dbname=$dbname", $username, $password);

?>