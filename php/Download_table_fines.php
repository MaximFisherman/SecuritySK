<?php
session_start();
include("../Classes/Class_select_fines.php");
$obj = new Select_fines();
$obj->Select_user_fines($_SESSION["avt_user"]);
?>