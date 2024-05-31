<?php
$dblink=db_connect("Devices");

if ($mid==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Missing Manufacturer for search';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}
	
// find the equipment and return a confirmation.
$sql="Select `ID` from `Manu_name` where `ID` = '$mid'";
$result=$dblink->query($sql) or print($sql);

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
print_r($payload);

if($mid != $devices[0]){
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output1[1] = 'MSG: Invalid Manufacturer ID';
$responseData=json_encode($output1);
echo $responseData;
die();
}

echo("jumped");
?>