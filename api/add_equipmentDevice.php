<?php
$dblink=db_connect("Devices");

if ($did==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid or missing Device name.';
    $output[]='Action: None';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

/*call to check the validity of the device name that was passed
assign a cascading id number or an error for any reason
*/

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

// Insert into the device table the created device ID and the verified device name
// output a message to pass to the user as an alert
/*
$sql="INSERT INTO `Dev_name`(`ID`, `DeviceN`,`status`) VALUES ('ID','$did','active')";
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