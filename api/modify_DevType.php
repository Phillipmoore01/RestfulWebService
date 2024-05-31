<?php
$dblink=db_connect("Devices");
if ($ndid==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Missing New Device ID.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

if ($sn==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Missing Serial Number.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

/* check new device for a valid entry
check serial number for a valid existing entry
*/
/*$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/check_did");
$data=$did;
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form-urlencoded','content-length: '.strlen($data)));
$result=curl_exec($ch);
curl_close($ch);
echo "Response from nothin: ";
echo $result;
*/

//change device type for the given serial number and return a confirmation to the user
/*
$sql = "UPDATE `Tech` SET `device_type`='$ndid' WHERE `serial_number`='$sn'";
$result=$dblink->query($sql) or die(log_activity("Unale to change device type"));
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