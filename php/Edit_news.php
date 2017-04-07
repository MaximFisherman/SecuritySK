<?php
include("../Classes/Class_news.php");
include("../Classes/Class_file.php");
$obj = new News();
$file=new File();
$file->upload_on_server_file_photo_news();
$obj->edit_news($_POST['name_id_news'],$_POST["name_news"],$_POST["title_news"],$_POST["description_news"],$name_file,$_POST['type_news']);
echo("<script>location.replace('../Dai_news_page.html')</script>");
//echo($_POST['name_id_news']."   ".$_POST["name_news"]."  ".$_POST["title_news"]."  ".$_POST["description_news"]."  ".$name_file."   ".$_POST['type_news']);

?>