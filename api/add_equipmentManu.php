<?php
$dblink=db_connect("Devices");

if ($mid==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid or missing Manufacturer name.';
    $output[]='Action: None';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

/*call to check the validity of the manufacturer name that was passed
assign a cascading id number or an error for any reason
*/
/*$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/check_man");
$data=$mid;
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

// Insert the manufacturer and the created id number into the database
/*
$sql="INSERT INTO `Manu_name`(`Manufact`, `ID`,`status`) VALUES ('$mid','ID','active')";
$result=$dblink->query($sql) or die(log_activity("Unale to add new Manufacturer type"));
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