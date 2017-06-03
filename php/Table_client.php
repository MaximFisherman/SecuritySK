<?php
session_start();
include("../Classes/Class_news.php");
$obj = new News();

if($_SESSION["page_number"]=='')
    $obj->view_client(1,$_POST["input_search_name"]);
else {
    $obj->view_client($_SESSION["page_number"],$_POST["input_search_name"]);
}
if(isset($_GET["page"])) {
    //unset($_GET["page"]);
    $_SESSION["page_number"]=$_GET["page"];

    echo("<script>location.replace('../Dai_client.html')</script>");
}

if(isset($_GET["delete_news"])){
    $obj->delete_client($_GET['id_news']);
    echo("<script>location.replace('../Dai_client.html')</script>");
}
?>