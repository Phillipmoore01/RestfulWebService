<?php
$dblink=db_connect("Devices");
if ($did==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid or missing Device name.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

if ($act==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid or missing New Device status.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}


//check device name and status for validity
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
///////////////////////////
$sql="Select `ID` from `Dev_name` where `ID` = '$did'";
$result=$dblink->query($sql) or $result="dead on arrival";

$device = array();
while ($data=$result->fetch_array(MYSQLI_ASSOC))
	$devices[0]=$data['ID'];

$jsonDevices=json_encode($devices);
$output[]='Status: Error';
$output[]='MSG: Ivalid Device ID, The ID provided was not in the database';
$output[]='Action: none';
$responseData=json_encode($output);
$resultArray=json_decode($responseData,true);
$payload=explode("MSG:",$resultArray[1]);
$devices=json_decode($payload[1],true);

if($did != $devices[0]){
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
echo $responseData;
die();
}



?>