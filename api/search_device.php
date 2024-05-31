<?php
$dblink=db_connect("Devices");

if ($did==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Missing Device ID for search';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}
	
// find the equipment and return a confirmation.

$sql="Select `ID` from `Dev_name` where `ID` = '$did'";
$result=$dblink->query($sql) or $result="dead on arrival";

$device = array();
while ($data=$result->fetch_array(MYSQLI_ASSOC))
	$devices[0]=$data['ID'];

$jsonDevices=json_encode($devices);
$output[]='Status: Error';
$output[]='MSG:'.$jsonDevices;
$output[]='Action: none';
$responseData=json_encode($output);
$resultArray=json_decode($responseData,true);
$payload=explode("MSG:",$resultArray[1]);
$devices=json_decode($payload[1],true);

if($did != $devices[0]){
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output[1] = 'MSG: Invalid Device ID';
$responseData=json_encode($output);
echo $responseData;
die();
}


// find the equipment and return a confirmation.
$sql="SELECT * FROM `Tech` WHERE `device_type` = $did LIMIT 500";
$result=$dblink->query($sql) or die(log_activity("Unable to query device search"));
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output[]='Status: In progress';
$jsonOutput = json_encode($result);
$output[]='MSG: '.$jsonOutput;
$output[]='Action: none';
$responseData=json_encode($output);
echo $responseData;
die();

?>