<?php
include("../functions.php");
$dblink=db_connect("Devices");
$sql="Select `Manufact`,`ID` from `Manu_name` where `status`='active'";
$result=$dblink->query($sql) or
  die("<p>Something went wrong with $sql<br>".$dblink->error); // add in call to error handler
$devices=array();
while ($data=$result->fetch_array(MYSQLI_ASSOC))
	$devices[$data['ID']]=$data['Manufact'];
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output[]='Status: Success';
$jsonDevices=json_encode($devices);
$output[]='MSG '.$jsonDevices;
$output[]='Action: None';
$responseData=json_encode($output);
echo $responseData;
die();
?>