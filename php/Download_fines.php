<?php
require_once("../Classes/Class_select_fines.php");

$obj = new Select_fines();

if(isset($_POST["click_change_fine"]))
{
	$obj->update_one_fines_dtp($_POST["number_fine"],$_POST["date_fine"],$_POST["article_fine"]);
}



if(isset($_SESSION['id']))
{
	$obj->select_one_fines_dtp($_SESSION['id']);
	
}

echo('
<div class="container">
    <div class="row">
        <div class="text-center">
<br><br>
Дата:
<input type="text" name="date" class="example-text-input">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Номер удостоверения: <input type="text" name="number" class="example-text-input">
<input type="button" name="article_fine" onclick="Search_fine();" class="btn btn-primary" value="Искать" >
</div>
</div>
</div>
');



$obj-> Select_fines_DTP($_POST["search_number"],$_POST["search_date"]);
if(isset($_POST['id']))
{
	$_SESSION['id']=$_POST['id'];
}



?>