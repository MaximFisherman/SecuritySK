<?php
session_start();
include("../Classes/Class_news.php");
$obj = new News();

if($_SESSION["page_number"]=='')
    $obj->view_blank(1,$_POST["input_search_name"]);
else {
    $obj->view_blank($_SESSION["page_number"],$_POST["input_search_name"]);
}
if(isset($_GET["page"])) {
    //unset($_GET["page"]);
    $_SESSION["page_number"]=$_GET["page"];

    echo("<script>location.replace('../Dai_blank.html')</script>");
}


if(isset($_GET["accept_news"])){
    $obj->accept_blank($_GET['id_news']);
    echo("<script>location.replace('../Dai_blank.html')</script>");
}

if(isset($_GET["delete_news"])){
    $obj->delete_blank($_GET['id_news']);
    echo("<script>location.replace('../Dai_blank.html')</script>");
}
?>