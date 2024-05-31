<?php

$dblink = db_connect("Devices"); 
$sql ="INSERT into `ErrorLogs` (`ID`,`ErrorText`) values ('0','$error')";
$dblink->query($sql);
die();
?>