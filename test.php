<?php
include("functions.php");
$dblink=db_connect("Devices");
$sql="Select * from `Tech`";
$result=$dblink->query($sql) or
	log_error("Something went wrong with $sql<br>".$dblink->error);
if ($result->num_rows<=0)
		echo "<p>n There are not rows in the table Tech!<br>Please try again</p>";
else
{
	while($data=$result->fetch_array(MYSQLI_ASSOC))
	{
		echo '<p>Device Type: '.$data['device_type'].' Manufacturer: '.$data['manufacturer'].'Serial Number: '.$data['serial_number'].'</p>';
	}
}
?>