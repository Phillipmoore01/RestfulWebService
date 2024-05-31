<?php
$dblink=db_connect("Devices");

if ($did==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid or missing Device ID.';
    $output[]='Action: None';
	$output[]="The Device ID you entered was $did";
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

if ($mid==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid or missing Manufacturer ID';
    $output[]='Action: None';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

if ($sn==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid or missing Serial Number.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

/* Call to check the validity of device name, manufacturer name, and serial number
	if they all come back true add them to the database and return to the site with a 
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

unset($sql);
unset($result);
unset($output);


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

if($mid != $devices[0]){
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output1[1] = 'MSG: Invalid Manufacturer ID';
$responseData=json_encode($output1);
echo $responseData;
die();
}


unset($sql);
unset($result);
unset($output);


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



$sql="INSERT INTO `Tech`(`device_type`, `manufacturer`,`serial_number`,`auto_id`) VALUES ('$did','$mid','$sn','0')";
$result=$dblink->query($sql) or die(log_activity("Unable to add new Equipment"));
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output[]='Status: Equipment added';
$jsonOutput = json_encode($result);
$output[]='MSG: '.$jsonOutput;
$output[]='Action: none';
$responseData=json_encode($output);
echo $responseData;
die();

?>
