<?php
$dblink=db_connect("Devices");

if ($mid==NULL)//missing serial number
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid Manufacturer ID.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

/*
echo "$sql";
$sql="Select `device_type`, `manufacturer` from `Tech` where `serial_number`='$sn'";
echo "$sql";
$result=$dblink->query($sql) or die(print_r("the dog is fast"));
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