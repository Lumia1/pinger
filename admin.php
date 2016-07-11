<?php

include 'connect.php';

require_once 'config.inc.php';

if(isset($_POST['name']) && isset($_POST['address'])){

class InsertServers{
	
	/*const DB_HOST = dbhost;
	const DB_NAME = dbname;
	const DB_USER = dbuser;
	const DB_PASSWORD = dbpass; */

	private $conn = null;

	/**
	 * Open the database connection
	 */
	public function __construct(){
		// open database connection
		$connectionString = sprintf("mysql:host=%s;dbname=%s",
				Config::DB_HOST,
				Config::DB_NAME);
		try {
			$this->conn = new PDO($connectionString,
					Config::DB_USER,
					Config::DB_PASS);

		} catch (PDOException $pe) {
			die($pe->getMessage());
		}
	} // contruct ends here
	
	function insertSingleRow($name,$address) {
		$task = array(':name' => $name,
					  ':address' => $address);

		$sql = 'INSERT INTO servers(name,address)
				VALUES(:name,:address)';

		$q = $this->conn->prepare($sql);

		return $q->execute($task);
	}


	/**
	 * close the database connection
	 */
	public function __destruct() {
		// close the database connection
		$this->conn = null;
	}
}


$obj = new InsertServers();

// if($obj->insert() !== false)
// 	echo 'A new task has been added successfully';
// else
// 	echo 'Error adding the task';


if($obj->insertSingleRow($_POST['name'], 
					   $_POST['address']) !== false)
	
	echo 'A new server has been added successfully';
else 
	echo 'Error adding the server';
	
}
	
	?>
	
<!DOCTYPE html>
<html>

<head><title>Insert Servers Into DataBase</title></head>

<body>

<form action="admin.php" method="post">

<input type="text" name="name" id="name" placeholder="Enter Website Name" required="required" />

<input type="text" name="address" id="address" placeholder="Enter Server Address, Do not Add http:// in url" required="required" />

<button type="submit">Add Website !</button>

</form>

<br />

<br />

<h2>Delete A Website :</h2>

<br />

<?php foreach($result as $server) { ?>

		<table width=\"716\" border=\"1\">
  		<tr>
    	<th width=\"201\" scope=\"col\"><?php echo $server['name'] ?></th>
    	<th width=\"203\" scope=\"col\"><?php echo $server['address'] ?></th>
		<th width=\"206\" scope=\"col\"><a href="admin.php?del=<?php echo $server['ID'] ?>">Delete</a></th>
  		</tr>
		</table>
		
<?php		} ?>

<?php  

if(isset($_GET['del'])) {
	
	$serverID = $_GET['del'];
	
	$connst = sprintf("mysql:host=%s;dbname=%s",Config::DB_HOST,Config::DB_NAME);
	
	$db = new PDO($connst, Config::DB_USER, Config::DB_PASS );
	
	$sql = "DELETE FROM `servers` WHERE `ID` = :id";
	
	$query = $db->prepare( $sql );
	
	$query->execute( array( ":id" => $serverID ) );
	
	echo "Website Deleted";
	
	}

?>

</body>

</html>   