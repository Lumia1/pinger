<?php

include 'pinger.php';

include 'connect.php';


foreach ($result as $server) {
	
	if(ping($server['address'])) { ?>
		
		<table width=\"716\" border=\"1\">
  		<tr>
    	<th width=\"201\" scope=\"col\"><?php echo $server['name'] ?></th>
    	<th width=\"203\" scope=\"col\"><?php echo $server['address'] ?></th>
		<th width=\"206\" scope=\"col\">Online</th>
  		</tr>
		</table>
		
	<?php	} else {  ?>
			
	<table width=\"716\" border=\"1\">
  		<tr>
    	<th width=\"201\" scope=\"col\"><?php echo $server['name'] ?></th>
    	<th width=\"203\" scope=\"col\"><?php echo $server['address'] ?></th>
		<th width=\"206\" scope=\"col\">Offline</th>
  		</tr>
		</table>
			
<?php		

}
	
	}
	






/*if(pingD("www.google.com")){
	echo "It works";
	} else {
		echo "OPS!";
		}  */  // This function works just fine

?>