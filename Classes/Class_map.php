<?php
require_once("Class_base.php");
class Map extends Base
{
    function save_layers($out){
        $str="Insert into layers_map(out_layer) VALUES ('".$out."');";
        mysql_query($str,$this->dlink);
    }

    function select_layers(){
        $str="Select out_layer from layers_map";
        $res= mysql_query($str,$this->dlink);
        $mas_string_layer = null;
        while($arr = mysql_fetch_array($res)) {
            $mas_string_layer .= $arr['out_layer'].'%';
        }
        echo($mas_string_layer);
    }

    function delete_layers($name_layers_whole){
        $mas_name_layers = explode("%", $name_layers_whole);
        for($i=0;$i<count($mas_name_layers);$i++) {
            echo( $mas_name_layers[$i]."<br>");
            $str = "DELETE FROM layers_map WHERE out_layer like '%" . $mas_name_layers[$i] . "%' ";
            mysql_query($str, $this->dlink);
            mysql_query($str, $this->dlink);
        }
    }

}
?>