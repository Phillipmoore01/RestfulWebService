<?php
$dblink=db_connect("Devices");

if ($did==NULL)//missing serial number
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid Device ID.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

$sql="Select `ID` from `Dev_name` where `ID` = '$did'";
$result=$dblink->query($sql) or $result="dead on arrival";

$device = array();
while ($data=$result->fetch_array(MYSQLI_ASSOC))
	$devices[0]=$data['ID'];

$jsonDevices=json_encode($devices);


header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output[]='Status: Success';
$output[]='MSG:'.$jsonDevices;
$output[]='Action: none';
$responseData=json_encode($output);
//echo $responseData;
$resultArray=json_decode($responseData,true);
$payload=explode("MSG:",$resultArray[1]);
//echo $payload[1];
$devices=json_decode($payload[1],true);
//echo "$devices[0]";
//print_r($payload);
echo $responseData;
die();

?>