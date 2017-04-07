<?php
session_start();
include("../Classes/Class_help.php");
$obj = new Help();
$obj->interception_request_post();

?>
