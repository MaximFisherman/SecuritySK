<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Authorization</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        @import url("css/Authorization_page.css");
    </style>

    <script type="text/javascript">
        $( function() {
            $('form').submit(function() {
                return false;
            });
        });
    </script>

</head>
<body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.1.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form class="form-horizontal" action="Registr.php" id="form_reg" method="POST" role="form" onsubmit="return false" >
            <fieldset>

                <!-- Form Name -->
                <legend>Реєстраційна картка</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" name="second_name" placeholder="Им'я" class="form-control">
                    </div>
                </div>



                <input type="hidden" name="type_user" placeholder="" value="dai" class="form-control">


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Фамилия</label>
                    <div class="col-sm-10">
                        <input type="text" name="first_name" placeholder="Фамілія" class="form-control" >
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Місце проживання</label>
                    <div class="col-sm-10">
                        <input type="text" name="place_living" placeholder="Місце проживання" class="form-control" >
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Номер телефону</label>
                    <div class="col-sm-10">
                        <input type="text" name="number_phone" placeholder="Номер телефону" class="form-control" >
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" placeholder="E-mail" class="form-control"  required>
                        <div id="div_email"></div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="textinput">Номер водійского посвідчення</label>
                    <div class="col-sm-10">
                        <input type="text" name="identify_number" id="identify_number" placeholder="Номер водійского посвідчення" class="form-control" required>
                        <div id="div_identify_number"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <p class="text-center">Введіть пароль згідно з вимогами.</p>
                            <input type="password" name="password" class="input-lg form-control" name="password1" id="password1" placeholder="Пароль" autocomplete="off" required>
                            <div class="row">
                                <div class="col-sm-6">
                                    <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> довжина 8 символов<br>
                                    <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Один символ с верхнього регістра
                                </div>
                                <div class="col-sm-6">
                                    <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Один символ з малого регістра<br>
                                    <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> одна цифра
                                </div>
                            </div>
                            <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="повторіть пароль" autocomplete="off" required>
                            <div class="row">
                                <div class="col-sm-12">
                                    <span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> співпадають паролі
                                </div>
                            </div>
                        </div><!--/col-sm-6-->
                    </div><!--/row-->
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="pull-right">
                            <input id="SubmitButton" onclick="FoprmSubmit();" type="submit" class="btn btn-primary" value="Зарееструватися" />
                        </div>
                    </div>
                </div>

            </fieldset>
        </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<script language="javascript" type="text/javascript">

    $( "#car_count" ).change(function() {
        var value = $(this).val();
        $("#div_car_count").empty();
        for(var i=1;i<=value;i++)
            $('#div_car_count').append('Номер автомобіля '+i+': <input type="text" class="form-control" name="car_number_'+i+'" required> <br> ');
        $('#length_count_car').val(value);
    });


    $("input[type=password]").keyup(function(){
        var ucase = new RegExp("[A-Z]+");
        var lcase = new RegExp("[a-z]+");
        var num = new RegExp("[0-9]+");

        if($("#password1").val().length >= 8){
            $("#8char").removeClass("glyphicon-remove");
            $("#8char").addClass("glyphicon-ok");
            $("#8char").css("color","#00A41E");
        }else{
            $("#8char").removeClass("glyphicon-ok");
            $("#8char").addClass("glyphicon-remove");
            $("#8char").css("color","#FF0004");
        }

        if(ucase.test($("#password1").val())){
            $("#ucase").removeClass("glyphicon-remove");
            $("#ucase").addClass("glyphicon-ok");
            $("#ucase").css("color","#00A41E");
        }else{
            $("#ucase").removeClass("glyphicon-ok");
            $("#ucase").addClass("glyphicon-remove");
            $("#ucase").css("color","#FF0004");
        }

        if(lcase.test($("#password1").val())){
            $("#lcase").removeClass("glyphicon-remove");
            $("#lcase").addClass("glyphicon-ok");
            $("#lcase").css("color","#00A41E");
        }else{
            $("#lcase").removeClass("glyphicon-ok");
            $("#lcase").addClass("glyphicon-remove");
            $("#lcase").css("color","#FF0004");
        }

        if(num.test($("#password1").val())){
            $("#num").removeClass("glyphicon-remove");
            $("#num").addClass("glyphicon-ok");
            $("#num").css("color","#00A41E");
        }else{
            $("#num").removeClass("glyphicon-ok");
            $("#num").addClass("glyphicon-remove");
            $("#num").css("color","#FF0004");
        }

        if($("#password1").val() == $("#password2").val()){
            $("#pwmatch").removeClass("glyphicon-remove");
            $("#pwmatch").addClass("glyphicon-ok");
            $("#pwmatch").css("color","#00A41E");
        }else{
            $("#pwmatch").removeClass("glyphicon-ok");
            $("#pwmatch").addClass("glyphicon-remove");
            $("#pwmatch").css("color","#FF0004");
        }
    });


    function FoprmSubmit()
    {
        identify_number1 = $('input[name = identify_number]').val();
        email1 = $('input[name = email]').val();
        $.post("php/Proverka.php", {identify_number:identify_number1,email:email1}, function (str) {
            $('#div_identify_number').html(str);
            if($('#div_identify_number').html()=="" && $('#div_email').html()=="")
                $("form").attr("onsubmit","return true");
        });
    }
</script>

</body>
</html>

