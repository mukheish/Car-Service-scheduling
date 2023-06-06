<?php
ob_start();
$action = $_GET['action'];
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
$crud = new Action();

if($action == 'delete_booking'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}


ob_end_flush();
?>
