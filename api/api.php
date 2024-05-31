<?php
include("../functions.php");
$url=$_SERVER['REQUEST_URI'];
$path = parse_url($url, PHP_URL_PATH);
$pathComponents = explode("/", trim($path, "/"));
$endPoint=$pathComponents[1];
switch($endPoint)
{
    case "add_equipment":
        $did=$_REQUEST['did'];
		$mid=$_REQUEST['mid'];
		$sn=$_REQUEST['sn'];
        include("add_equipment.php");
        break;
	case "add_equipmentDevice":
		$did=$_REQUEST['did'];
		include("add_equipmentDevice.php");
		break;
	case "add_equipmentManu":
		$mid=$_REQUEST['mid'];
		include("add_equipmentManu.php");
		break;
	case "search_device":
		$did=$_REQUEST['did'];
		include("search_device.php");
		break;
	case "search_manufacturer":
		$mid=$_REQUEST['mid'];
		include("search_manufacturer.php");
		break;
	case "search_serial":
		$sn=$_REQUEST['sn'];
		include("search_serial.php");
		break;
	case "modify_equipment":
		$sn=$_REQUEST['sn'];
		$ndid=$_REQUEST['ndid'];
        $nmid=$_REQUEST['nmid'];
		$nsn=$_REQUEST['nsn'];
		include("modify_equipment.php");
		break;
	case "modify_serial":
		$sn=$_REQUEST['sn'];
		$nsn=$_REQUEST['nsn'];
		include("modify_serial.php");
		break;
	case "modify_DevType":
		$ndid=$_REQUEST['ndid'];
		$sn=$_REQUEST['sn'];
		include("modify_DevType.php");
		break;
	case "modify_manufacturer":
		$nmid=$_REQUEST['nmid'];
		$sn=$_REQUEST['sn'];
		include("modify_manufacturer.php");
		break;
	case "modify_Alldev":
		$did=$_REQUEST['did'];
		$ndid=$_REQUEST['ndid'];
		include("modify_Alldev.php");
		break;
	case "modify_Allman":
		$mid=$_REQUEST['mid'];
		$nmid=$_REQUEST['nmid'];
		include("modify_Allman.php");
		break;
	case "modify_manAvail":
		$mid=$_REQUEST['mid'];
		$act=$_REQUEST['act'];
		include("modify_manAvail.php");
		break;
	case "modify_devAvail":
		$did=$_REQUEST['did'];
		$act=$_REQUEST['act'];
		include("modify_devAvail.php");
		break;
	case "view_equipment":
		$sn=$_REQUEST['sn'];
		include("view_equipment.php");
		break;
	case "list_devices":
		include("list_devices.php");
		break;
	case "list_manufacturers":
		include("list_manufacturers.php");
		break;
	case "list_avail":
		include("list_avail.php");
		break;
	case "check_did":
		$did=$_REQUEST['did'];
		include("check_did.php");
		break;
	case "check_man":
		$mid=$_REQUEST['mid'];
		include("check_man.php");
		break;
	case "check_serial":
		$sn=$_REQUEST['sn'];
		include("check_serial.php");
		break;
	case "check_status":
		$stat=$_REQUEST['stat'];
		include("check_status.php");
		break;
	case "error_cast":
		include("error_cast.php");
		break;
	case "log_activ":
		include("log_activ.php");
		break;
    default:
        header('Content-Type: application/json');
        header('HTTP/1.1 200 OK');
        $output[]='Status: ERROR';
        $output[]='MSG: Invalid or missing endpoint';
        $output[]='Action: None';
        $responseData=json_encode($output);
        echo $responseData;
        break;
}
die();
?>