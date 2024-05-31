<?php

$dblink=db_connect("Devices");

$sql ="INSERT into `InteractionLogs` (`ID`,`LogText`) values ('0','$activity')";
$dblink->query($sql);
die();
?>