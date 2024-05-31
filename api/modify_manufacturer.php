<?php
$dblink=db_connect("Devices");

if ($nmid==NULL)
{
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $output[]='Status: ERROR';
    $output[]='MSG: Invalid Manufacturer ID';
    $output[]='Action: none';
    $responseData=json_encode($output);
    echo $responseData;
    die();
}

?>