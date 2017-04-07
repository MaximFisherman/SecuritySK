<?php
require_once("Class_base.php");
class Blank extends Base
{
    function add_fine_adm($date,$number,$article){
        $str="INSERT INTO `fines_dtp`(`number`, `date`, type,article) VALUES ('".$number."','".$date."','adm','".$article."')";
        mysql_query($str,$this->dlink);
    }

    function insert_param_session_adm(){
        $_SESSION['name_second_name_pollice'] = $_POST['name_second_name_pollice'];
        $_SESSION['number_driver'] = $_POST['number_driver'];

        $_SESSION['date_prigody'] = $_POST["day"]."/".$_POST["month"]."/".$_POST["year"];
        $_SESSION['day'] = $_POST["day"];
        $_SESSION["month"]=$_POST["month"];
        $_SESSION["year"]=$_POST["year"];
        $_SESSION["hours"]=$_POST["hours"];
        $_SESSION["minutes"]=$_POST["minutes"];

        $_SESSION["place_writting_protokol"]=$_POST["place_writting_protokol"];
        $_SESSION["name_second_name_pollice"]=$_POST["name_second_name_pollice"];
        $_SESSION["second_name"]=$_POST["second_name"];
        $_SESSION["name_offender"]=$_POST["name_offender"];
        $_SESSION["middlename"]=$_POST["middlename"];
        $_SESSION["place_of_birth"]=$_POST["place_of_birth"];

        $_SESSION["itizenship"]=$_POST["itizenship"];
        $_SESSION["place_of_work"]=$_POST["place_of_work"];
        $_SESSION["place_of_living"]=$_POST["place_of_living"];
        $_SESSION["telephone_offender"]=$_POST["telephone_offender"];
        $_SESSION["offender"]=$_POST["offender"];
        $_SESSION["number_driver"]=$_POST["number_driver"];

        $_SESSION["number_car"]=$_POST["number_car"];
        $_SESSION["name_car"]=$_POST["name_car"];
        $_SESSION["car_owner"]=$_POST["car_owner"];
        $_SESSION["place_owner"]=$_POST["place_owner"];
        $_SESSION["what_happened"]=$_POST["what_happened"];

        $_SESSION["article"]=$_POST["article"];
        $_SESSION["part_article"]=$_POST["part_article"];
        $_SESSION["paragraph_article"]=$_POST["paragraph_article"];
        $_SESSION["witness_1"]=$_POST["witness_1"];
        $_SESSION["witness_2"]=$_POST["witness_2"];

        $_SESSION["day_incident"]=$_POST["day_incident"];
        $_SESSION["month_incident"]=$_POST["month_incident"];
        $_SESSION["year_incident"]=$_POST["year_incident"];
        $_SESSION["hour_incident"]=$_POST["hour_incident"];
        $_SESSION["minutes_incident"]=$_POST["minutes_incident"];

        $_SESSION["place_read_incident"]=$_POST["place_read_incident"];
        $_SESSION["Document"]=$_POST["Document"];
        $_SESSION["series_pasport"]=$_POST["series_pasport"];
        $_SESSION["number_pasport"]=$_POST["number_pasport"];

        $_SESSION["inspection"]=$_POST["inspection"];
        $_SESSION["tool_inspection"]=$_POST["tool_inspection"];
        $_SESSION["result_inspection"]=$_POST["result_inspection"];
        $_SESSION["witness_inspection_1"]=$_POST["witness_inspection_1"];
        $_SESSION["witness_inspection_2"]=$_POST["witness_inspection_2"];
    }

    function insert_param_session_dtp(){
        $_SESSION['date_prigody'] = $_POST['date_prigody'];
        $_SESSION['time_prigody'] = $_POST['time_prigody'];
        $_SESSION['country_prigody'] = $_POST['country_prigody'];
        $_SESSION['place_prigody'] = $_POST['place_prigody'];
        $_SESSION['demage_health'] = $_POST['demage_health'];
        $_SESSION['krim_car_A_B'] = $_POST['krim_car_A_B'];
        $_SESSION['krim_car'] = $_POST['krim_car'];
        $_SESSION['any_people'] = $_POST['any_people'];
        $_SESSION['surname_strax_a'] = $_POST['surname_strax_a'];
        $_SESSION['name_strax_a'] = $_POST['name_strax_a'];
        $_SESSION['address_strax_a'] = $_POST['address_strax_a'];
        $_SESSION['pochta_index_strax_a'] = $_POST['pochta_index_strax_a'];
        $_SESSION['country_strax_a'] = $_POST['country_strax_a'];
        $_SESSION['tel_email_strax_a'] = $_POST['tel_email_strax_a'];
        $_SESSION['type_car_a'] = $_POST['type_car_a'];
        $_SESSION['number_car_a'] = $_POST['number_car_a'];
        $_SESSION['country_reg_car_a'] = $_POST['country_reg_car_a'];
        $_SESSION['number_trailer_a'] = $_POST['number_trailer_a'];
        $_SESSION['country_reg_trailer_a'] = $_POST['country_reg_trailer_a'];
        $_SESSION['Strax_com_name_a'] = $_POST['Strax_com_name_a'];
        $_SESSION['Strax_com_number_blank_a'] = $_POST['Strax_com_number_blank_a'];
        $_SESSION['Strax_com_number_green_card_a'] = $_POST['Strax_com_number_green_card_a'];
        $_SESSION['Strax_com_green_card_date_start_a'] = $_POST['Strax_com_green_card_date_start_a'];
        $_SESSION['Strax_com_green_card_date_end_a'] = $_POST['Strax_com_green_card_date_end_a'];
        $_SESSION['Strax_com_agen_a'] = $_POST['Strax_com_agen_a'];
        $_SESSION['Strax_com_name_agen_a'] = $_POST['Strax_com_name_agen_a'];
        $_SESSION['Strax_com_address_a'] = $_POST['Strax_com_address_a'];
        $_SESSION['Strax_com_country_a'] = $_POST['Strax_com_country_a'];
        $_SESSION['Strax_com_tel_email_a'] = $_POST['Strax_com_tel_email_a'];
        $_SESSION['Strax_com_pokritie_a'] = $_POST['Strax_com_pokritie_a'];
        $_SESSION['driver_surname_a'] = $_POST['driver_surname_a'];
        $_SESSION['driver_name_a'] = $_POST['driver_name_a'];
        $_SESSION['driver_address_a'] = $_POST['driver_address_a'];
        $_SESSION['driver_country_a'] = $_POST['driver_country_a'];
        $_SESSION['driver_birthday_a'] = $_POST['driver_birthday_a'];
        $_SESSION['driver_tel_email_a'] = $_POST['driver_tel_email_a'];
        $_SESSION['driver_number_a'] = $_POST['driver_number_a'];
        $_SESSION['driver_category_a'] = $_POST['driver_category_a'];
        $_SESSION['driver_date_end_a'] = $_POST['driver_date_end_a'];
        $_SESSION['crach_car_a'] = $_POST['crach_car_a'];
        $_SESSION['notatki_a'] = $_POST['notatki_a'];
        $_SESSION['surname_strax_b'] = $_POST['surname_strax_b'];
        $_SESSION['name_strax_b'] = $_POST['name_strax_b'];
        $_SESSION['address_strax_b'] = $_POST['address_strax_b'];
        $_SESSION['pochta_index_strax_b'] = $_POST['pochta_index_strax_b'];
        $_SESSION['country_strax_b'] = $_POST['country_strax_b'];
        $_SESSION['tel_email_strax_b'] = $_POST['tel_email_strax_b'];
        $_SESSION['type_car_b'] = $_POST['type_car_b'];
        $_SESSION['number_car_b'] = $_POST['number_car_b'];
        $_SESSION['country_reg_car_b'] = $_POST['country_reg_car_b'];
        $_SESSION['number_trailer_b'] = $_POST['number_trailer_b'];
        $_SESSION['country_reg_trailer_b'] = $_POST['country_reg_trailer_b'];
        $_SESSION['Strax_com_name_b'] = $_POST['Strax_com_name_b'];
        $_SESSION['Strax_com_number_blank_b'] = $_POST['Strax_com_number_blank_b'];
        $_SESSION['Strax_com_number_green_card_b'] = $_POST['Strax_com_number_green_card_b'];
        $_SESSION['Strax_com_green_card_date_start_b'] = $_POST['Strax_com_green_card_date_start_b'];
        $_SESSION['Strax_com_green_card_date_end_b'] = $_POST['Strax_com_green_card_date_end_b'];
        $_SESSION['Strax_com_agen_b'] = $_POST['Strax_com_agen_b'];
        $_SESSION['Strax_com_name_agen_b'] = $_POST['Strax_com_name_agen_b'];
        $_SESSION['Strax_com_address_b'] = $_POST['Strax_com_address_b'];
        $_SESSION['Strax_com_country_b'] = $_POST['Strax_com_country_b'];
        $_SESSION['Strax_com_tel_email_b'] = $_POST['Strax_com_tel_email_b'];
        $_SESSION['Strax_com_pokritie_b'] = $_POST['Strax_com_pokritie_b'];
        $_SESSION['driver_surname_b'] = $_POST['driver_surname_b'];
        $_SESSION['driver_name_b'] = $_POST['driver_name_b'];
        $_SESSION['driver_address_b'] = $_POST['driver_address_b'];
        $_SESSION['driver_country_b'] = $_POST['driver_country_b'];
        $_SESSION['driver_birthday_b'] = $_POST['driver_birthday_b'];
        $_SESSION['driver_tel_email_b'] = $_POST['driver_tel_email_b'];
        $_SESSION['driver_number_b'] = $_POST['driver_number_b'];
        $_SESSION['driver_category_b'] = $_POST['driver_category_b'];
        $_SESSION['driver_date_end_b'] = $_POST['driver_date_end_b'];
        $_SESSION['crach_car_b'] = $_POST['crach_car_b'];
        $_SESSION['notatki_b'] = $_POST['notatki_b'];
    }

    function add_fine_dtp($date,$number){
        $str="INSERT INTO `fines_dtp`(`number`, `date`, type) VALUES ('".$number."','".$date."','dtp')";
        mysql_query($str,$this->dlink);
    }

    function id_fines($date,$number){
        $str="Select id_fine,number,date from fines_dtp where number like '%".$number."%' and date like '%".$date."%';";
        $res= mysql_query($str,$this->dlink);
        while($arr = mysql_fetch_array($res)){
            return  $arr['id_fine'];
        }
    }

    //Функция которая сохраняет информацию о местонахождении файлов пользователя
    function add_user_file($user_number,$path_file,$id_fine,$type_document)
    {
        $str="INSERT INTO Path_file_fine (number, path_name,id_fine,type_document) VALUES ('".$user_number."','".$path_file."',".$id_fine.",'".$type_document."');";
        mysql_query($str,$this->dlink);
    }

}
?>