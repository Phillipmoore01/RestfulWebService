<?php
$dblink=db_connect("Devices");

if ($sn==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Missing serial number for search';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}
	
// find the equipment and return a confirmation.
/*
$sql="SELECT * FROM `Tech` WHERE `serial_number` = $sn";
echo "$sql";
$result=$dblink->query($sql) or die(log_activity("Unale to add new Device type"));
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output[]='Status: In progress';
$jsonOutput = json_encode($equip[]);
$output[]='MSG: '.$jsonOutput;
$output[]='Action: none';
$responseData=json_encode($output);
echo $responseData;
die();
*/
?>