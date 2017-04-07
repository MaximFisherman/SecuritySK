<?php
require_once("Class_base.php");
class Police_edit extends Base
{



    function Change_police_user($number){
        $str="Select type_user,email,number_phone,first_name,number,password,police_department,position,path_user_police_photo from user where type_user like '%police%' and number like '%".$number."%'";
        $res= mysql_query($str,$this->dlink);
        while($arr = mysql_fetch_array($res)) {
            echo("<script> $('#email').text('".$arr["email"]."');</script>");
        }
    }

/////////////////////////////////////Police_user//////////////////////////////////////////////////////////////////////////////////////
    function add_police_user($position,$name,$number_phone,$email,$police_department,$number_cheton,$password,$name_file){
        $str="INSERT INTO user (type_user,email,number_phone,first_name,number,password,police_department,position,path_user_police_photo) VALUES('police','".$email."','".$number_phone."','".$name."','".$number_cheton."','".$password."','".$police_department."','".$position."','".$name_file."');";
        mysql_query($str,$this->dlink);
    }

    function remove_police_user($number){
        $str="Delete from user where number like '".$number."'";
        mysql_query($str,$this->dlink);
    }

    function view_police_user($position,$name,$email,$police_department,$number_cheton){
        $str="Select type_user,email,number_phone,first_name,number,password,police_department,position,path_user_police_photo from user where type_user like '%police%' ";

        if($position!="")
            $str="Select type_user,email,number_phone,first_name,number,password,police_department,position,path_user_police_photo from user where type_user like '%police%' and position like '%".$position."%' ";
        if($name!="")
            $str="Select type_user,email,number_phone,first_name,number,password,police_department,position,path_user_police_photo from user where type_user like '%police%' and first_name like '%".$name."%' ";
        if($email!="")
            $str="Select type_user,email,number_phone,first_name,number,password,police_department,position,path_user_police_photo from user where type_user like '%police%' and email like '%".$email."%' ";
        if($police_department!="")
            $str="Select type_user,email,number_phone,first_name,number,password,police_department,position,path_user_police_photo from user where type_user like '%police%' and police_department like '%".$police_department."%' ";
        if($number_cheton!="")
            $str="Select type_user,email,number_phone,first_name,number,password,police_department,position,path_user_police_photo from user where type_user like '%police%' and number like '%".$number_cheton."%' ";

        $res= mysql_query($str,$this->dlink);
        echo(' 
 <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12"  >
                        <table class="table table-hover table-striped">
                        <tbody> ');

        while($arr = mysql_fetch_array($res)) {
            echo('          <tr>
                            <td>
                                <h4>
                                    <b>' . $arr['position'] . '</b>
                                </h4>
                                <p></p>
                            </td>
                            <td>
                                <IMG SRC="php/'.$arr['path_user_police_photo'].'" class="img-circle" width="60">
                            </td>
                            <td>
                                <h4>
                                    <b>' . $arr['first_name'] . '</b>
                                </h4>
                                <a href="#"> ' . $arr['email'] . '</a>
                            </td>
                            <td> <h4>Номер жетона:' . $arr['number'] . '</h4></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-default id_class" value="left" type="button" onclick="Delete_user_police();" id="'.$arr['number'].'">
                                        <i class="fa fa-fw s fa-remove"></i>Удалить</button>
                                    
                                    <a class="btn btn-primary id_class" data-toggle="modal" data-target="#usuario" onclick="Change_user_police();" id="'.$arr['number'].'"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Правка</a>

                                </div>
                            </td>
                        </tr>
            ');
        }
        echo('</tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
');
    }

}
?>