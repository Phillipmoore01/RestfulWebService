<?php
function db_connect($db)
{
	$username="webuser";
	$password="(BTdiafhCVgD6sdr";
	$host="localhost";
	$dblink=new mysqli($host,$username,$password,$db);
	return $dblink;
}

function log_error($error)
{
	$dblink = db_connect("Devices"); 
	$sql ="INSERT into `ErrorLogs` (`ID`,`ErrorText`) values ('0','$error')";
	$dblink->query($sql) or die();
	echo "Error occured";
}

function log_activity($activity)
{	
	$dblink = db_connect("Devices"); 
	$sql ="INSERT into `InteractionLogs` (`ID`,`LogText`) values ('0','$activity')";
	$dblink->query($sql) or die ("Something went wrong with $sql<br>\n".$dblink->error);
}

function sqlQ(){
	$dblink=db_connect("Devices");
	$sql = "Insert into `Tech` (`device_type`,`manufacturer`,`serial_number`) values ('$did','$mid','$sn')";
	$dblink->query($sql) or $result ="Something Went Wrong Device not added";
	return $result;
}

function redirect($var){
	header("Location: https://youtube.com");
	
	
}

// convert device name to device id;
function convert_dev(){
	
}

// convert manufacturer name to id;
function convert_man(){
	
}
?>