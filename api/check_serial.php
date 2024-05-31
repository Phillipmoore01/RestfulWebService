<?php
$dblink=db_connect("Devices");
if ($sn==NULL)//missing serial number
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid or missing serial number.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

$sql="Select `serial_number` from `Tech` where `serial_number` = '$sn'";
$result=$dblink->query($sql) or print($sql);

$devices = array();
while ($data=$result->fetch_array(MYSQLI_ASSOC))
	$devices[0]=$data['serial_number'];

$jsonDevices=json_encode($devices);
$output[]='Status: Error';
$output[]='MSG:'.$jsonDevices;
$output[]='Action: none';
$responseData=json_encode($output);
$resultArray=json_decode($responseData,true);
$payload=explode("MSG:",$resultArray[1]);
$devices=json_decode($payload[1],true);

if($sn != $devices[0]){
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output1[1] = 'MSG: Invalid Serial Number';
$responseData=json_encode($output1);
echo $responseData;
die();
}


echo("Jumped");
?>