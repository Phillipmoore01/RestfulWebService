<?php
$dblink=db_connect("Devices");

if ($sn==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Missing Serial number.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

if ($nsn==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Missing New Serial number.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

if ($sn == $nsn)
{
	header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Old Serial number and New Serial number cannot be the same';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

if($ndid == NULL){
	header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: Error';
    $output[]='MSG: Failed Modify Equipment no new Device ID';
    $output[]='Action: None';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

if($nmid == NULL){
	header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: Error';
    $output[]='MSG: Failed Modify Equipment no new Manufacturer ID';
    $output[]='Action: None';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

// call to change the piece of equipment based on the serial number provided  
$sql = "UPDATE `Tech` SET `device_type`='$ndid',`manufacturer`='$nmid',`serial_number`='$nsn',`auto_id`='' WHERE `serial_number` = $sn";
$result=$dblink->query($sql) or die(log_activity("Unable to modify device"));
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output[]='Status: Success';
$output[]='MSG: ';
$output[]='Action: None';
$responseData=json_encode($output);
echo $responseData;
die();
?>