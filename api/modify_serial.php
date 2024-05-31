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
    $output[]='MSG: Missing new Serial Number.';
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
    $output[]='MSG: Old Serial Number and New Serial Number cannot be the same';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

/* check the provied serial numbers to see if they are valid
and if they aren't tell the user log the error and exit*/
/*$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/check_serial?$sn");
$data=$sn;
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


//change the serial number in the Tech table 
/*
$sql = "UPDATE `Tech` SET `serial_number`='$nsn' WHERE `serial_number` = '$sn'";
$result=$dblink->query($sql) or die(log_activity("Unale to change serial number type"));
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