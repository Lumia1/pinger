<?php

require_once 'pinger.php';
require_once 'connect.php';
require_once 'config.inc.php';

if(isset($_POST['name']) && isset($_POST['address'])){
	
	$insert = array(
    "name" => $_POST['name'],
    "address" => $_POST['address'],
	);
	
	$db->insert("servers", $insert);
	
	}
	?>
	
<!DOCTYPE html>
<html>

<head><title>Pinger Admin | Add and Delete Websites</title></head>

<body>

<form action="admin.php" method="post">

<input type="text" name="name" id="name" placeholder="Enter Website Name" required />

<input type="text" name="address" id="address" placeholder="Enter Server Address, Do not Add http:// in url" required />

<button type="submit">Add Website !</button>

</form>

<br />

<br />

<h2>Delete A Website :</h2>

<br />

<?php $result = $db->select("servers"); ?>

<?php foreach($result as $server) { ?>

		<table width=\"716\" border=\"1\">
  		<tr>
    	<th width=\"201\" scope=\"col\"><?php echo $server['name'] ?></th>
    	<th width=\"203\" scope=\"col\"><?php echo $server['address'] ?></th>
        <th width=\"201\" scope=\"col\"><?php echo (ping($server['address']) ? 'Online' : 'Offline') ?></th>
		<th width=\"206\" scope=\"col\"><a href="admin.php?del=<?php echo $server['ID'] ?>">Delete</a></th>
  		</tr>
		</table>
		
<?php		} ?>

<?php  

if(isset($_GET['del'])) {
	
	$serverID = $_GET['del'];
	
	$bind = array(
    ":id" => $serverID
	);
	
	$db->delete("servers", "ID = :id", $bind);
	
	echo "Website Deleted";
	
	header("refresh: 2;");
	
	}
?>

</body>

</html>   