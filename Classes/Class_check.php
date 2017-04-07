<?php
require_once("Class_base.php");
class Check extends Base
{
    //Просмотр таблицы для нахождения совппадений email
    function select_table_user_email_proverka($email){
        $str='Select email from user where email like "%'.$email.'%";';
        $res= mysql_query($str,$this->dlink);
        $sovp=null;
        while($arr = mysql_fetch_array($res)){
            $sovp=$arr['email'];
        }
        return $sovp;
    }

    //Просмотр таблицы для нахождения совпадений номера(логина)
    function select_table_user_number_proverka($number){
        $str='Select number from user where number like "%'.$number.'%";';
        $res= mysql_query($str,$this->dlink);
        $sovp=null;
        while($arr = mysql_fetch_array($res)){
            $sovp=$arr['number'];
        }
        return $sovp;
    }

}
?>