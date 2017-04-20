<?php
session_start();
require_once("Class_base.php");
class Select_fines extends Base
{
    //Вывод списка штрафов
    function Select_fines_dtp($search_number,$search_date)
    {
        $str="Select number,date,article,id_fine from fines_dtp";


        if($search_number!="")
            $str="Select number,date,article from fines_dtp where number like '%".$search_number."%'";
        if($search_date!="")
            $str="Select number,date,article from fines_dtp where date like '%".$search_date."%'";
        $res= mysql_query($str,$this->dlink);
        echo("<BR>
	<table id='acrylic' >
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Статья</th>
                    <th>Номер посвідчення</th>
					<th>Справа</th>
                </tr>
            </thead>
			<tbody>
	");
        $i=0;
        while($arr = mysql_fetch_array($res)){
            echo("
				<tr>
                    <td data-label=\"Дата\">".$arr['date']."</td>");
            if($arr['article']==null)
                echo("<td data-label=\"Статья\">(статья не визначена)</td>");else
                echo("<td data-label=\"Статья\">".$arr['article']."</td>");
            echo("
                    <td data-label=\"number\">".$arr['number']."</td>
                    <td data-label=\"Подробнее\">
					<form action='php/Download_files_dai.php' method='POST'>
					<submit type='button' id='".$arr['number']."' onclick=\"Read_more();\" class=\"id_class btn btn-default \">Змінити</submit>
					
					<input type='submit' value='Файли по справі' class='btn btn-primary'>
					<input type='hidden' name='id_fine' value='".$arr["id_fine"]."'>
					</form>
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

    function select_one_fines_dtp($number){
        $str="Select number,article,date from fines_dtp where number like '%".$number."%';";
        $res= mysql_query($str,$this->dlink);
        while($arr = mysql_fetch_array($res)){
            echo("
				<br><br><br><br><br>
					Номер водійского посвідчення: <input type='text' name='number_fine' class='form-control' value='".$arr['number']."' /><br><br>
					Дата події       			: <input type='text' name='date_fine' class='form-control' value='".$arr['date']."' /><br><br>
					Статья          			: <input type='text' name='article_fine' class='form-control' value='".$arr['article']."' /><br>
				");
            echo("<input type='button' onclick='Change_fine();' class='btn btn-primary' value='Змінити данні'/>");
        }
    }


    function update_one_fines_dtp($number,$date,$article){
        $str="UPDATE `fines_dtp` SET `article`='".$article."',`number`='".$number."',`date`='".$date."' WHERE number like '%".$number."%'";
        mysql_query($str,$this->dlink);
    }

    //Функция вывода на экран пользователю его правонарушений
    function Select_user_fines($number)
    {
        $str="Select email,number_phone,place_living,first_name,second_name,number from user where number like '%".$number."%' and type_user like 'user';";
        $res= mysql_query($str,$this->dlink);
        while($arr = mysql_fetch_array($res)){

            echo("
					<script type='text/javascript'>
					$('#first_name').text('Им\'я: ".$arr["first_name"]."');
					$('#second_name').text('Фамілія: ".$arr["second_name"]."');
					$('#driver_number').text('Номер ВУ: ".$arr["number"]."');
					$('#number_phone').text('Номер телефону: ".$arr["number_phone"]."');
					</script>
					");
        }

        $str="Select number,car_number from car_number where number like '%".$number."%';";
        $res= mysql_query($str,$this->dlink);
        $i=0;
        while($arr = mysql_fetch_row($res)){
            $i++;
            echo("
					<script type='text/javascript'>
					$('#number_car_user').append('<br>Автомобиль ".$i.": &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$arr[1]."');
					</script>
					");
        }


        $str="Select number,date,article,type,id_fine from fines_dtp where number like '%".$number."%' ";
        $res= mysql_query($str,$this->dlink);
        echo("<BR>
	<table id='acrylic' >
            <thead>
                <tr>
                    <th>Дата</th>
					<th>Тип правонарушения</th>
                    <th>Статья</th>
                    <th>Номер посвідчення</th>
					<th>Файли по справі</th>
                </tr>
            </thead>
			<tbody>
			
			
	");
        $i=0;
        while($arr = mysql_fetch_array($res)){
            echo("
				<tr>
                    <td data-label=\"Дата\">".$arr['date']."</td>");
            if($arr['type']=="dtp")
                echo("<td data-label=\"Статья\">ДТП</td>");else
                echo("<td data-label=\"Статья\">Адміністративне правопорушення</td>");

            if($arr['article']==null)
                echo("<td data-label=\"Статья\">(статья не визначена)</td>");else
                echo("<td data-label=\"Статья\">".$arr['article']."</td>");
            echo("
                    <td data-label=\"number\">".$arr['number']."</td>
                    <td data-label=\"Подробнее\">
					<form action='php/Download_files_user.php' method='POST'>
					<input type='submit' value='Файли по справі' class='btn btn-warning'>
					<input type='hidden' name='id_fine' value='".$arr["id_fine"]."'>
					</form> 
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