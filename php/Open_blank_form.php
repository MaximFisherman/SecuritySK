<?php
session_start();
unset($_SESSION['kol_vx']);
//Проверка нажатия на кнопку открыть бланк ДТП
if(isset($_POST['blank_dtp']))
$_SESSION['blank_dtp']=$_POST['blank_dtp'];

//Нажатие на кнопку открыть обычный бланк
if(isset($_POST['blank']))
    $_SESSION['blank']=$_POST['blank'];

//Проверка нажатия нажатия клавиши выйти в бланке ДТП
if(isset($_POST['blank_exit_dtp']))
    unset($_SESSION['blank_dtp']);

//Проверка нажатия нажатия клавиши выйти в обычном бланке
if(isset($_POST['blank_exit']))
    unset($_SESSION['blank']);


if(isset($_SESSION['blank']))
{
    readfile('Blank.html');
    //Возврат со странички бланка
    echo("<script>
$('#h1_type_document').html(\" Протокол административного правонарушения\");
    function click_exit_blank() {
        var exit1 = \"exit\";
        $.post(\"php/Open_blank_form.php\", {blank_exit: exit1}, function (str) {
            $('#div_blank').html(str);
        });
    }
</script>");
unset($_SESSION['blank_dtp']);
}

//Проверка входа в бланк ДТП
if(isset($_SESSION['blank_dtp']))
{
    readfile('Blank_DTP.html');
    //Возврат со странички бланка
echo("<script>
$('#h1_type_document').html(\" Протокол ДТП\");
    function click_exit_blank_dtp() {
        var exit1 = \"exit\";
        $.post(\"php/Open_blank_form.php\", {blank_exit_dtp: exit1}, function (str) {
            $('#div_blank').html(str);
        });
    }
</script>");
unset($_SESSION['blank']);
}

//Выход из бланка
if(($_SESSION['blank']==null)&&($_SESSION['blank_dtp']==null))
{
    echo("<script>
$('#h1_type_document').html(\"Тип протокола\");
        </script>");

    echo('
  <div class="container-fluid" id="div_blank">
          <div class="row" >
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display display">Протокол ДТП</h2>
                </div>
                <div class="card-block">
                  <form>
                    <a class="btn btn-lg btn-primary blanki" style="" onclick="click_blank_DTP();">
                      <img src="/images/Blank_DTP.jpg" style="width:400px;height:550px;" class="img_blank img-fluid" >
                    </a>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h2 class="h5 display">Бланк правонарушения</h2>
                </div>
                <div class="card-block">
                  <form class="form-horizontal">
                    <a class="btn btn-lg btn-primary blanki" style="" onclick="click_prosto_blank();">
                      <img src="/images/Blank.jpg" style="width:400px;height:550px;" class="img_blank img-fluid">
                    </a>
                  </form>
                </div>
              </div>
            </div>
        </div>
   ');
}

?>