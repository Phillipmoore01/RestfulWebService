<?php
function check_Dev()
{
	$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/list_devices.php");
	$data="";
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
	curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form urlencoded','content-length: '.strlen($data)));
	$result=curl_exec($ch);
	curl_close($ch);
				  
	$resultArray=json_decode($result,true);
	$payload=explode("MSG",$resultArray[1]);
	$devices=json_decode($payload[1],true);
	return $devices;
}


function check_Man()
{
				  
	$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/list_manufacturers.php");
	$data="";
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
	curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form urlencoded','content-length: '.strlen($data)));
	$result=curl_exec($ch);
	curl_close($ch);			  
	$resultArray=json_decode($result,true);
	$payload=explode("MSG",$resultArray[1]);
	$manufacturers=json_decode($payload[1],true);
	return $manufacturers;
}

function check_Avail()
{
				  
	$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/list_avail.php");
	$data="";
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
	curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form urlencoded','content-length: '.strlen($data)));
	$result=curl_exec($ch);
	curl_close($ch);			  
	$resultArray=json_decode($result,true);
	$payload=explode("MSG",$resultArray[1]);
	$Avail=json_decode($payload[1],true);
	return $Avail;
}

function add_equip($did,$mid,$sn )
{
	$ch=curl_init("https://ec2-3-14-135-252.us-east-2.compute.amazonaws.com/api/add_equipment.php");
	$data="$did, $mids, $sn";
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//ignore ssl
	curl_setopt($ch, CURLOPT_POST,1);//tell curl we are using post
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//this is the data
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//prepare a response
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/x-www-form urlencoded','content-length: '.strlen($data)));
	$result=curl_exec($ch);
	curl_close($ch);
				  
	$resultArray=json_decode($result,true);
	$payload=explode("MSG",$resultArray[1]);
	$devices=json_decode($payload[1],true);
	return $devices;
}

function alert($msg){
	echo '<div class="alert alert-primary" role="alert">Site entered!</div>';
}

?>