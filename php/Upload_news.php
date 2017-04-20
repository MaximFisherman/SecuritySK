<?php
include("../Classes/Class_news.php");
include("../Classes/Class_file.php");
$obj = new News();
$name_file = $_POST["name_path_photo"];
        if(isset($_FILES['photo_news']['tmp_name'])) {
            $uploaddir = 'File/Photo_news/';
            $uploadfile = $uploaddir . basename($_FILES['photo_news']['name']);

            if (move_uploaded_file($_FILES['photo_news']['tmp_name'], $uploadfile)) {
                $type_file = pathinfo($uploadfile, PATHINFO_EXTENSION);
                $name_file = $uploaddir . "" . uniqid() . "." . $type_file;
                rename($uploadfile, $name_file);
            } else {
                echo "File upload not working";
            }
        }

if(isset($_POST["Title_news"])&&isset($_POST["Name_news"])&&isset($_POST["Description"])&&isset($name_file))
{
	echo("all right");
    $obj->add_new_news($_POST["Title_news"],$_POST["Name_news"],$_POST["Description"],$_POST["Type_news"],$name_file);
    echo("<script>location.replace('../Dai_news_page.html')</script>");
}
?>