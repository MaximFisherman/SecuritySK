<?php
header("Content-Type: text/html; charset=utf-8");
include("../Classes/Class_blank.php");
include("../Classes/Class_file.php");

session_start();
  require_once 'tcpdf/tcpdf.php'; // Подключаем библиотеку
  $_SESSION['kol_vx']+=1;//Подсчет количества  перезагрузок
  
if(isset($_POST['name_second_name_pollice'])&&$_SESSION['kol_vx']==1)
{

$obj = new Blank();
$obj->insert_param_session_adm();
$obj->add_fine_adm($_SESSION['date_prigody'],$_SESSION['number_driver'],$_SESSION["article"]);

$id_fine = $obj->id_fines($_SESSION['date_prigody'],$_SESSION['number_driver']);



$file = new File();
if(isset($_SESSION['number_driver'])) {
    $obj->add_user_file($_SESSION['number_driver'], $file->upload_on_server_file_attachment_blank(), $id_fine, "docaz_adm");
    $obj->add_user_file($_SESSION['number_driver'], $file->upload_on_server_file_signature_blank(), $id_fine, "signature_adm");
}

}

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

 $pdf->AddPage();
$pdf->SetXY(0, 0);
$pdf->Image('../images/Blank.jpg', 0, 0, 472, 600, '', '', '', false, 300, '', false, false, 0);


$pdf->SetFont('dejavusans', '', 10);
$pdf->writeHTMLCell(0, 0, 3.3, 21, $_SESSION['day'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 15, 21, $_SESSION['month'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 31, 20.5, substr($_SESSION['year'],2,4), 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 45, 20.5, $_SESSION['hours'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 60, 20.5, $_SESSION['minutes'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 72, 20.5, $_SESSION['place_writting_protokol'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 6, 27.5, $_SESSION['name_second_name_pollice'], 1, 1, 0, true, 'J');
$pdf->SetFont('dejavusans', '', 10);

$Full_name_offender= $_SESSION['second_name']." ". $_SESSION['name_offender']." ". $_SESSION['middlename'];
$pdf->writeHTMLCell(0, 0, 62, 35, $Full_name_offender, 1, 1, 0, true, 'J');

$pdf->SetFont('dejavusans', '', 9);
$pdf->writeHTMLCell(0, 0, 40, 43, $_SESSION['place_of_birth'], 1, 1, 0, true, 'J');

$pdf->writeHTMLCell(0, 0, 165, 43, $_SESSION['itizenship'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 45, 49.5, $_SESSION['place_of_work'], 1, 1, 0, true, 'J');


$str_place_of_living = $_SESSION["place_of_living"]; 
$str_1 = substr($str_place_of_living,0,38);
$str_1 =$str_1."-";
$str_2 = substr($str_place_of_living,38, strlen($str_place_of_living));

$pdf->writeHTMLCell(0, 0, 150, 49.5,$str_1 , 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 3, 57,$str_2 , 1, 1, 0, true, 'J');


$pdf->writeHTMLCell(0, 0, 78, 56, $_SESSION['telephone_offender'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 130, 56, $_SESSION['offender'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 125, 63.4, $_SESSION['number_car'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 37, 63.4, $_SESSION['name_car'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 172, 63.4, $_SESSION['car_owner'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 20, 72, $_SESSION['place_owner'], 1, 1, 0, true, 'J');

//Разделение строки
$str_what_happend = $_SESSION['what_happened']; 
$str_1 = substr($str_what_happend,0,181);
$str_1 =$str_1."-";
$str_2 = substr($str_what_happend,181, 193);
$str_2 =$str_2;
$str_3 = substr($str_what_happend,193, 213);

$pdf->writeHTMLCell(0, 0, 2, 78, $str_1, 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 2, 85, $str_2, 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 2, 92, $str_3, 1, 1, 0, true, 'J');

$pdf->writeHTMLCell(0, 0, 38, 100, $_SESSION['article'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 165, 99.5, $_SESSION['part_article'], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 187, 99, $_SESSION['paragraph_article'], 1, 1, 0, true, 'J');

//Разделение строки
$str_witness = $_SESSION['witness_1']; 
$str_1 = substr($str_witness,0,152);
$str_1 =$str_1."-";
$str_2 = substr($str_witness,181, 193);

$pdf->writeHTMLCell(0, 0, 30, 106.5,$str_1 , 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 2, 112,$str_2 , 1, 1, 0, true, 'J');

$str_witness = $_SESSION['witness_2']; 
$str_1 = substr($str_witness,0,152);
$str_1 =$str_1."-";
$str_2 = substr($str_witness,181, 193);

$pdf->writeHTMLCell(0, 0, 30, 118,$str_1 , 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 2, 125,$str_2 , 1, 1, 0, true, 'J');


$ini_1=$_SESSION["second_name"];
$ini_1 = substr($ini_1,0, 1);

$name = $_SESSION["first_name"];

$ini_2=$_SESSION["middlename"];
$ini_2 = substr($ini_2,0, 1);

$str= $name."".$ini_1.".".$ini_2.".";
$pdf->writeHTMLCell(0, 0, 10, 140,$str , 1, 1, 0, true, 'J');


$pdf->writeHTMLCell(0, 0, 82, 139,$_SESSION["day_incident"] , 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 90, 139,$_SESSION["month_incident"] , 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 103, 138.5, substr($_SESSION['year_incident'],2,4), 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 120, 138.5, $_SESSION["hour_incident"], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 132, 138.5, $_SESSION["minutes_incident"], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 142, 138.5, $_SESSION["place_read_incident"], 1, 1, 0, true, 'J');

$pdf->writeHTMLCell(0, 0, 138, 167, $_SESSION["Document"], 1, 1, 0, true, 'J');

$pdf->writeHTMLCell(0, 0, 69, 204, $_SESSION["inspection"], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 100, 212, $_SESSION["tool_inspection"], 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 50, 220, $_SESSION["result_inspection"], 1, 1, 0, true, 'J');


$str_witness = $_SESSION['witness_inspection_1'];
$str_1 = substr($str_witness,0,152);
$str_1 =$str_1."-";
$str_2 = substr($str_witness,181, 193);

$pdf->writeHTMLCell(0, 0, 32, 231,$str_1 , 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 2, 238.5,$str_2 , 1, 1, 0, true, 'J');



$str_witness = $_SESSION['witness_inspection_2'];
$str_1 = substr($str_witness,0,152);
$str_1 =$str_1."-";
$str_2 = substr($str_witness,181, 193);

$pdf->writeHTMLCell(0, 0, 32, 245,$str_1 , 1, 1, 0, true, 'J');
$pdf->writeHTMLCell(0, 0, 2, 252,$str_2 , 1, 1, 0, true, 'J');


$pdf->Output(__DIR__ . '/File/'.$id_fine.'.pdf', 'F');
if($_SESSION['kol_vx']==1)
{
	$file_pdf='File/'.$id_fine.'.pdf';
	if(isset($id_fine))
	$obj->add_user_file($_SESSION["number_driver"],$file_pdf,$id_fine,"blank_adm");
}
//Просмотр данных 
if(isset($_POST['view'])){
$pdf->Output(__DIR__ . 'File/'.$id_fine.'.pdf', 'I');
}
//Переход на главную страницу 
if(isset($_POST['exit']))
{
	unset($_SESSION['kol_vx']);
	unset($_SESSION['blank_adm']);
	echo('<SCRIPT>
document.location.replace("../Police_start_page_blank.html");
</SCRIPT>
');
}
echo('
<form action="download_blank_adm.php" method="post" enctype="multipart/form-data"> 
ваш файл успішно створений щоб його переглянути натисніть "Переглянути"
<input name="exit" type="submit" value="На попередню сторінку">
<input name="view" type="submit" value="Перегляд">
</form>
');
?>