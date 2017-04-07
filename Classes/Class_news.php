<?php
require_once("Class_base.php");
class News extends Base
{
    function edit_news($id_news,$name,$title,$description,$path_photo,$type_news){
            $str="UPDATE `News` SET `Name`='".$name."',`Article`='".$title."',`Description`='".$description."',`Path_photo`='".$path_photo."',`type_news`='".$type_news."' WHERE id_news=".$id_news."; ";
            $res=mysql_query($str,$this->dlink);
            //if($res)echo("Ok!");else echo("No ok!");
    }

    function add_new_news($title,$name,$description,$type_news,$path_file){
        $str="Insert into News(Name,Article,Description,Path_photo,type_news) VALUES ('".$name."','".$title."','".$description."','".$path_file."','".$type_news."');";
        mysql_query($str,$this->dlink);
    }

    function delete_news($id_news){
        $str="DELETE FROM News WHERE id_news=".$id_news." ";
        mysql_query($str,$this->dlink);
    }

    function view_table_news_police($number_page,$search_word){
        //Поиск по базе
        if($search_word!=""){
            $str="Select id_news,Name,Article,Description,Path_photo,type_news from News where Name like '%".$search_word."%' or Article like '%" . $search_word . "%' or description like '%" . $search_word . "%'";

            $res= mysql_query($str,$this->dlink);

            while($arr = mysql_fetch_array($res)) {
                if (trim($arr["type_news"]) == "Угон автомобiля") echo("<tr class=\"Car_wanted\">");
                if (trim($arr["type_news"]) == "Людина в розшуку") echo("<tr class=\"Criminals_wanted\">");
                if (trim($arr["type_news"]) == "Зниклий безвiсти") echo("<tr class=\"Missing_people\">");
                $sub_description_1 =  substr($arr["Description"],0,50);
                $sub_description = $sub_description_1." ...";
                echo(" 
                                    <td class=\"avatar\"><img src=\"php/" . $arr["Path_photo"] . "\"></td>
                                    <td>" . $arr["Name"] . "</td>
                                    <td>" . $arr["Article"] . "</td>
                                    <td>" .$sub_description. "</td>
                                    <td align=\"center\">                                       
                                        <a href=\"php/View_news_article_police.php?path_photo=".$arr["Path_photo"]."&&file=2&&id_news=".$arr['id_news']."&&description_news=".$arr["Description"]."&&name_news=". $arr["Name"]."&&title_news=". $arr["Article"]."\" class=\"btn btn-warning\" title=\"Прочитати\"><i class=\"glyphicon glyphicon-folder-open\"></i></a>                                        
                                    </td>
                                </tr>");
                ECHO("<SCRIPT>$('#position_page').empty();</SCRIPT>");
            }
        }else{
            $str="Select id_news,Name,Article,Description,Path_photo,type_news from News";
            $res= mysql_query($str,$this->dlink);
            $col_rows=mysql_num_rows($res);        //Высчитываем общее количество страниц


            //Постраничное отображение
            $count = 10;// Количество записей на странице.
            $shift = $count * ($number_page - 1);// Смещение в LIMIT. Те записи, порядковый номер которого больше этого числа, будут выводиться.
            $str="Select id_news,Name,Article,Description,Path_photo,type_news from News limit ".$shift.",".$count.";";
            $res= mysql_query($str,$this->dlink);

            $param_get_type=null;
            while($arr = mysql_fetch_array($res)) {
                if (trim($arr["type_news"]) == "Угон автомобiля"){ echo("<tr class=\"Car_wanted\">");$param_get_type=1;}
                if (trim($arr["type_news"]) == "Людина в розшуку") {echo("<tr class=\"Criminals_wanted\">");$param_get_type=2;}
                if (trim($arr["type_news"]) == "Зниклий безвiсти") {echo("<tr class=\"Missing_people\">");$param_get_type=3;}
                $sub_description_1 =  substr($arr["Description"],0,50);
                $sub_description = $sub_description_1." ...";
                echo(" 
                                    <td class=\"avatar rows\"><img src=\"php/" . $arr["Path_photo"] . "\"></td>
                                    <td class='rows'>" . $arr["Name"] . "</td>
                                    <td class='rows'>" . $arr["Article"] . "</td>
                                    <td class='rows'>" .$sub_description. "</td>
                                    <td class='rows' align=\"center\">                                       
                                        <a href=\"php/View_news_article_police.php?path_photo=".$arr["Path_photo"]."&&file=2&&id_news=".$arr['id_news']."&&description_news=".$arr["Description"]."&&name_news=". $arr["Name"]."&&title_news=". $arr["Article"]."&&type_news=".$param_get_type."\" class=\"btn btn-warning button_news_view\" title=\"Прочитати\"	id='" . $arr["id_news"] . "' ><i class=\"glyphicon glyphicon-folder-open\"   ></i></a>
                                        </td>
                                </tr>");
            }
//Дополнителные условия для нумерации страниц
            $col_page = $col_rows / 10;
            $col_page=ceil($col_page);


            //Если в начале
            if($number_page==1&&$number_page!=$col_page) {
                for ($i = 0; $i <= $col_page-1; $i++) {
                    $count_page = $i + 1;
                    echo("<script>$('#position_page').append('<li id=\"" . $count_page . "\" class=\"li_news_page\"> <a  href=\"php/Table_view_news_police.php?page=" . $count_page . " \">" . $count_page . "</a></li>');</script>");
                }
                $number_page_change =$number_page + 1;
                echo("<script>$('#position_page').append('<li><a href=\"php/Table_view_news_police.php?page=" . $number_page_change. " \">»</a></li>');</script>");
            }

            //Если в конце

            if($number_page!=1&&$number_page==$col_page) {
                $number_page_change =$number_page - 1;
                echo("<script>$('#position_page').append('<li><a href=\"php/Table_view_news_police.php?page=" . $number_page_change. " \">	&#171;</a></li>');</script>");

                for ($i = 0; $i <= $col_page-1; $i++) {
                    $count_page = $i + 1;
                    echo("<script>$('#position_page').append('<li id=\"" . $count_page . "\" class=\"li_news_page\"> <a  href=\"php/Table_view_news_police.php?page=" . $count_page . " \">" . $count_page . "</a></li>');</script>");
                }
            }

            //Если в середине
            if($number_page!=1&&$number_page!=$col_page) {
                $number_page_change =$number_page - 1;
                echo("<script>$('#position_page').append('<li><a href=\"php/Table_view_news_police.php?page=" . $number_page_change. " \">	&#171;</a></li>');</script>");

                for ($i = 0; $i <= $col_page-1; $i++) {
                    $count_page = $i + 1;
                    echo("<script>$('#position_page').append('<li id=\"" . $count_page . "\" class=\"li_news_page\"> <a  href=\"php/Table_view_news_police.php?page=" . $count_page . " \">" . $count_page . "</a></li>');</script>");
                }
                $number_page_change =$number_page + 1;
                echo("<script>$('#position_page').append('<li><a href=\"php/Table_view_news_police.php?page=" . $number_page_change. " \"> &#187;</a></li>');</script>");
            }


            /// Подсветка выбранной страницы
            echo(" 
        <script> 
            $('#".$number_page."').addClass('active');
        </script>
        ");

        }
    }


    function view_table_news($number_page,$search_word){
        //Поиск по базе
        if($search_word!=""){
            $str="Select id_news,Name,Article,Description,Path_photo,type_news from News where Name like '%".$search_word."%' or Article like '%" . $search_word . "%' or description like '%" . $search_word . "%'";

            $res= mysql_query($str,$this->dlink);

            while($arr = mysql_fetch_array($res)) {
                if (trim($arr["type_news"]) == "Угон автомобiля") echo("<tr class=\"Car_wanted\">");
                if (trim($arr["type_news"]) == "Людина в розшуку") echo("<tr class=\"Criminals_wanted\">");
                if (trim($arr["type_news"]) == "Зниклий безвiсти") echo("<tr class=\"Missing_people\">");
                $sub_description_1 =  substr($arr["Description"],0,50);
                $sub_description = $sub_description_1." ...";
                echo(" 
                                    <td class=\"avatar rows\"><img src=\"php/" . $arr["Path_photo"] . "\"></td>
                                    <td class='rows'>" . $arr["Name"] . "</td>
                                    <td class='rows'>" . $arr["Article"] . "</td>
                                    <td class='rows'>" .$sub_description. "</td>
                                    <td align=\"center rows\">
                                        <a href=\"php/View_news_article.php?path_photo=".$arr["Path_photo"]."&&file=1&&id_news=".$arr['id_news']."&&description_news=".$arr["Description"]."&&name_news=". $arr["Name"]."&&title_news=". $arr["Article"]."\" class=\"btn btn-primary\" title=\"Edit\"><i class=\"fa fa-pencil\"></i></a>
                                        <a href=\"php/View_news_article.php?path_photo=".$arr["Path_photo"]."&&file=2&&id_news=".$arr['id_news']."&&description_news=".$arr["Description"]."&&name_news=". $arr["Name"]."&&title_news=". $arr["Article"]."\" class=\"btn btn-warning\" title=\"Прочитати\"><i class=\"glyphicon glyphicon-folder-open\"></i></a>
                                        <a href=\"php/Table_view_news.php?delete_news=1&&id_news=".$arr['id_news']."\" class=\"btn btn-danger button_news_delete\"  title=\"delete\" id='" . $arr["id_news"] . "' ><i class=\"fa fa-trash\" >		</i></a>
                                    </td>
                                </tr>");
                ECHO("<SCRIPT>$('#position_page').empty();</SCRIPT>");
            }
        }else{
            $str="Select id_news,Name,Article,Description,Path_photo,type_news from News";
            $res= mysql_query($str,$this->dlink);
            $col_rows=mysql_num_rows($res);        //Высчитываем общее количество страниц


            //Постраничное отображение
            $count = 10;// Количество записей на странице.
            $shift = $count * ($number_page - 1);// Смещение в LIMIT. Те записи, порядковый номер которого больше этого числа, будут выводиться.
            $str="Select id_news,Name,Article,Description,Path_photo,type_news from News limit ".$shift.",".$count.";";
            $res= mysql_query($str,$this->dlink);

            $param_get_type=null;
            while($arr = mysql_fetch_array($res)) {
                if (trim($arr["type_news"]) == "Угон автомобiля"){ echo("<tr class=\"Car_wanted\">");$param_get_type=1;}
                if (trim($arr["type_news"]) == "Людина в розшуку") {echo("<tr class=\"Criminals_wanted\">");$param_get_type=2;}
                if (trim($arr["type_news"]) == "Зниклий безвiсти") {echo("<tr class=\"Missing_people\">");$param_get_type=3;}
                $sub_description_1 =  substr($arr["Description"],0,50);
                $sub_description = $sub_description_1." ...";
                echo(" 
                                    <td class=\"avatar\"><img src=\"php/" . $arr["Path_photo"] . "\"></td>
                                    <td>" . $arr["Name"] . "</td>
                                    <td>" . $arr["Article"] . "</td>
                                    <td>" .$sub_description. "</td>
                                    <td align=\"center\">
                                        <a href=\"php/View_news_article.php?path_photo=".$arr["Path_photo"]."&&file=1&&id_news=".$arr['id_news']."&&description_news=".$arr["Description"]."&&name_news=". $arr["Name"]."&&title_news=". $arr["Article"]." &&type_news=".$param_get_type."\" class=\"btn btn-primary\" title=\"Edit\"><i class=\"fa fa-pencil\"></i></a>
                                        <a href=\"php/View_news_article.php?path_photo=".$arr["Path_photo"]."&&file=2&&id_news=".$arr['id_news']."&&description_news=".$arr["Description"]."&&name_news=". $arr["Name"]."&&title_news=". $arr["Article"]."&&type_news=".$param_get_type."\" class=\"btn btn-warning button_news_view\" title=\"Прочитати\"	id='" . $arr["id_news"] . "' ><i class=\"glyphicon glyphicon-folder-open\"   ></i></a>
                                        <a href=\"php/Table_view_news.php?delete_news=1&&id_news=".$arr['id_news']."\" class=\"btn btn-danger button_news_delete\"  title=\"delete\" ><i class=\"fa fa-trash\" >		</i></a>
                                    </td>
                                </tr>");
            }
//Дополнителные условия для нумерации страниц
            $col_page = $col_rows / 10;
            $col_page=ceil($col_page);


            //Если в начале
            if($number_page==1&&$number_page!=$col_page) {
                for ($i = 0; $i <= $col_page-1; $i++) {
                    $count_page = $i + 1;
                    echo("<script>$('#position_page').append('<li id=\"" . $count_page . "\" class=\"li_news_page\"> <a  href=\"php/Table_view_news.php?page=" . $count_page . " \">" . $count_page . "</a></li>');</script>");
                }
                $number_page_change =$number_page + 1;
                echo("<script>$('#position_page').append('<li><a href=\"php/Table_view_news.php?page=" . $number_page_change. " \">»</a></li>');</script>");
            }

            //Если в конце

            if($number_page!=1&&$number_page==$col_page) {
                $number_page_change =$number_page - 1;
                echo("<script>$('#position_page').append('<li><a href=\"php/Table_view_news.php?page=" . $number_page_change. " \">	&#171;</a></li>');</script>");

                for ($i = 0; $i <= $col_page-1; $i++) {
                    $count_page = $i + 1;
                    echo("<script>$('#position_page').append('<li id=\"" . $count_page . "\" class=\"li_news_page\"> <a  href=\"php/Table_view_news.php?page=" . $count_page . " \">" . $count_page . "</a></li>');</script>");
                }
            }

            //Если в середине
            if($number_page!=1&&$number_page!=$col_page) {
                $number_page_change =$number_page - 1;
                echo("<script>$('#position_page').append('<li><a href=\"php/Table_view_news.php?page=" . $number_page_change. " \">	&#171;</a></li>');</script>");

                for ($i = 0; $i <= $col_page-1; $i++) {
                    $count_page = $i + 1;
                    echo("<script>$('#position_page').append('<li id=\"" . $count_page . "\" class=\"li_news_page\"> <a  href=\"php/Table_view_news.php?page=" . $count_page . " \">" . $count_page . "</a></li>');</script>");
                }
                $number_page_change =$number_page + 1;
                echo("<script>$('#position_page').append('<li><a href=\"php/Table_view_news.php?page=" . $number_page_change. " \"> &#187;</a></li>');</script>");
            }


            /// Подсветка выбранной страницы
            echo(" 
        <script> 
            $('#".$number_page."').addClass('active');
        </script>
        ");

        }
    }
}
?>