<?php
if ($mid==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid or missing Device id.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
	$activity = "Invalid modify all devices. Reason: Missing device id";
	log_error($activity);
    die();
}

if ($nmid==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid or missing New Device id.';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
	$activity = "Invalid modify all devices. Reason: Missing new device id";
	log_error($activity);
    die();
}

if ($mid == $nmid)
{
	header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Old device id and new device id cannot be the same';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
	$activity = "ERROR: Tried to change the old device id to the same device id";
	log_error($activity);
    die();
}

//check manufacturer names for validity, find valid manufacturer ID and return said ID and TRUE || FALSE
// checkif the status of the device is active and determine if it can be changed in the first place
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

// change device name in device table if it's active and return confirmation to the user
$sql = "UPDATE `Manu_name` SET `Manufact`='$nmid' WHERE `Manufact` = '$mid' AND `status`='active'";
$result=$dblink->query($sql) or die(log_activity("Unale to change all device names"));
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
$output[]='Status: In progress';
$jsonOutput = json_encode($equip[]);
$output[]='MSG: '.$jsonOutput;
$output[]='Action: none';
$responseData=json_encode($output);
echo $responseData;
die();

?>