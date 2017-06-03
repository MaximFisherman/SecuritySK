<?php
include("Class_base.php");
class Input extends Base
{
    //Механизм авторизации
    function authorization($login,$password){
        $str='Select number,type_user,password from user where number like "%'.trim($login).'%";';
        $res= mysql_query($str,$this->dlink);
        $c = new McryptCipher($login);
        while($arr = mysql_fetch_array($res)){
            $number=$arr['number'];
            $password_bd=$c->decrypt($arr['password']);
            $type_user=$arr['type_user'];
        }

        if($login==$number&&$password==$password_bd&&$type_user=="dai")
        {
            $_SESSION["avt_user"]=$number;
            $_SESSION["type_avt_user"]=$type_user;
        }else{
        }
        if($login==$number&&$password==$password_bd&&$type_user=="police")
        {
            $_SESSION["avt_user"]=$number;
            $_SESSION["type_avt_user"]=$type_user;
        }else{
        }

        if($login==$number&&$password==$password_bd&&$type_user=="user")
        {
            $_SESSION["avt_user"]=$number;
            $_SESSION["type_avt_user"]=$type_user;
        }else{

        }
        //echo"<script>document.location.replace('Authorization.php');</script>";

    }
	
function add_blank($first_name,$second_name,$number_phone,$email){
	$str="INSERT INTO blank(first_name,second_name,number,email) VALUES('".$first_name."','".$second_name."','".$number_phone."','".$email."');";
    mysql_query($str,$this->dlink);
}
    //добавление пользователя в БД
    function add_user($type_user,$number,$email,$number_phone,$place_living,$first_name,$second_name,$password,$car_number_user,$length)
    {
        $str="INSERT INTO user (type_user,email,number_phone,place_living,first_name,second_name,number,password) VALUES('".$type_user."','".$email."','".$number_phone."','".$place_living."','".$first_name."','".$second_name."','".$number."','".$password."');";
        $rez=mysql_query($str,$this->dlink);
        if($type_user!="dai")
        for($i=1;$i<=$length;$i++)
        {
            echo("KOl ".$i.": ".$car_number_user[$i]."<br> number: ".$number."<br>");
            $str="INSERT INTO car_number (number,car_number) VALUES('".$number."','".$car_number_user[$i]."');";
            if(mysql_query($str,$this->dlink))
                echo("OK");else echo("You have some problem");
        }
    }

    //Проверка авторизирован ли пользователь или нет
    function check(){
        if($_SESSION["type_avt_user"]=="dai")
            echo"<script>document.location.replace('Dai_start_page.html');</script>";
        if($_SESSION["type_avt_user"]=="police")
            echo"<script>document.location.replace('Police_start_page_blank.html');</script>";
        if($_SESSION["type_avt_user"]=="user")
            echo"<script>document.location.replace('User_start_page_fines.html');</script>";
    }
}
?>