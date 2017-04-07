<?php
require_once("Class_base.php");
class File extends Base
{


    function upload_on_server_file_blank_dtp(){
        $uploaddir = 'File/';
        $uploadfile = $uploaddir . basename($_FILES['plan_dtp']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['plan_dtp']['tmp_name'] , $uploadfile)) {
            echo "";

            $type_file = pathinfo($uploadfile , PATHINFO_EXTENSION);
            $name_file = $uploaddir . "" . uniqid() . "." . $type_file;
            rename($uploadfile , $name_file);
            return $name_file;
        } else {
            echo "";return null;
        }
    }

    function upload_on_server_file_photo_news(){
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
    }

    function upload_on_server_file_signature_blank(){
        $uploaddir = 'File/';
        $uploadfile = $uploaddir . basename($_FILES['signature_file']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['signature_file']['tmp_name'] , $uploadfile)) {
            echo "";
            $type_file = pathinfo($uploadfile , PATHINFO_EXTENSION);
            $name_file = $uploaddir . "" . uniqid() . "." . $type_file;
            rename($uploadfile , $name_file);
            return $name_file;
        } else {
            echo "";  return null;
        }
    }

    function upload_on_server_file_attachment_blank(){
        $uploaddir = 'File/';
        $uploadfile = $uploaddir . basename($_FILES['police_file']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['police_file']['tmp_name'] , $uploadfile)) {
            echo "";
            $type_file = pathinfo($uploadfile , PATHINFO_EXTENSION);
            $name_file = $uploaddir . "" . uniqid() . "." . $type_file;
            rename($uploadfile , $name_file);
            return $name_file;
        } else {
            echo "";  return null;
        }
    }



    function view_file($id_fine){
        $str="Select path_name,number,date,type_document,id_fine from Path_file_fine where id_fine like '%".$id_fine."%'";

        $res= mysql_query($str,$this->dlink);
        echo("<BR>
	<table id='acrylic' >
            <thead>
                <tr>
                    <th>Дата</th>
					<th>Тип файла</th>
					<th>Файл</th>
                </tr>
            </thead>
			<tbody>
			
			
	");
        $i=0;
        while($arr = mysql_fetch_array($res)){
            echo("
				<tr>
                    <td>".$arr['date']."</td>");

            if($arr['type_document']=="plan_dtp")
                echo("<td data-label=\"Статья\">План ДТП</td>");
            if($arr['type_document']=="docaz_dtp")
                echo("<td data-label=\"Статья\">Видео-фото доказ</td>");
            if($arr['type_document']=="blank_dtp")
                echo("<td data-label=\"Статья\">Бланк ДТП</td>");
            if($arr['type_document']=="docaz_adm")
                echo("<td data-label=\"Статья\">Видео-фото доказ</td>");
            if($arr['type_document']=="blank_adm")
                echo("<td data-label=\"Статья\">Бланк адміністративного правопорушення</td>");
            if($arr['type_document']=="signature_adm")
                echo("<td data-label=\"Статья\">Ваш пiдпис для бланку АП</td>");

            echo("
                    <td data-label=\"закачаты\">
					<form action='Download_file_fine.php' method='POST'>
					<input type='submit' value='Відкрити' id='".$arr['path_name']."' onclick='file_click();' class='id_file btn btn-warning'>
					<input type='hidden' name='id_fine' value='".$arr["path_name"]."'>
					</FORM>
					
					</td>
				</tr>
				");
            $i++;
        }

        echo("      
   
	</tbody>
        </table>
    </div>
   </div>");
    }
}
?>