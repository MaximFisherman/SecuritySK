<?php
include("../Classes/Class_news.php");
include("../Classes/Class_file.php");
$obj = new News();
$file = new File();
$file->upload_on_server_file_photo_news();

if(isset($_POST["Title_news"])&&isset($_POST["Name_news"])&&isset($_POST["Description"])&&isset($name_file))
{
    $obj->add_new_news($_POST["Title_news"],$_POST["Name_news"],$_POST["Description"],$_POST["Type_news"],$name_file);
    echo("<script>location.replace('../Dai_news_page.html')</script>");
}
?>