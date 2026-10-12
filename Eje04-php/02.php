<?php
$num01 = $_POST['num01'] ?? 0;
$num02 = $_POST['num02'] ?? 0;
$tipo = $_POST['tipo'] ??'Decimal';
$resultado = "";
    function sumar($num01, $num02) { return $num01 + $num02;}
    function restar($num01, $num02) { return $num01 - $num02;}
    function multiplicar($num01, $num02){ return $num01 * $num02;}
    function dividir($num01, $num02) 
    { 
        return $num01 / $num02;
    }

    if ( isset($_POST['restar']) ) { $resultado = restar($num01, $num02);}

    if ( isset($_POST['sumar']) ) { $resultado = sumar($num01, $num02);}

    if ( isset($_POST['multiplicar']) ) { $resultado = multiplicar($num01, $num02);}

    if ( isset($_POST['dividir']) ) {
        if($num02 == 0 || $num01 == 0) {
            $resultado = "<b> multiplicate por 0 </b>";
        } else {
            $resultado = dividir($num01, $num02);
        }
       
    
    }



    if ( isset($_POST['borrar']) ) { $resultado = 0; }

    /* Pasar de Decimal a Binario  y pasar de Decimal a Hexadecimal*/
    if ($tipo == 'Binario') { $resultado = decbin($resultado);} 
    elseif ($tipo == 'Hexadecimal') { $resultado = strtoupper(dechex($resultado)); }

?>


<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />

    <title>Mini Calculadora</title>
</head>
<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .calculadora {
        border: 1px solid;
        padding: 0px;
        margin: 0px;
    }

    .calculos {
        border: 0.5px solid;
        margin-top: 15px;
    }

    .titulo-calculadora {
        display: flex;
        background-color: blue;
        color: white;
        text-shadow: 1px 2px 3px black;
        align-items: center;
        justify-content: center;
        padding: 0px 0px 0px 0px;
        margin-bottom: 20px;
        margin-left: 0px;
        width: 100%;
        font-family: arial;
    }

    .info-calculadora {
        margin: 25px;
    }

    .calculos {
        padding: 10px;

    }

    .tipo {
        border: 0.05px solid;
        padding: 10px;

    }
</style>

<body>
    <div class="calculadora">

        <div class="titulo-calculadora">
            <h1>Mini Calculadora</h1>
        </div>

        <div class="info-calculadora">

            <form action="" method="POST">
                Nº1: <input type="text" name="num01" /> <br />
                Nº2: <input type="text" name="num02" /> <br />

                <div class="calculos">
                    <input type="submit" value="+" name="sumar" />
                    <input type="submit" value="-" name="restar" />
                    <input type="submit" value="*" name="multiplicar" />
                    <input type="submit" value="/" name="dividir" />
                    <input type="submit" value="Borrar" name="borrar" />
                </div>

                <br />

                <div class="tipo">
                    <input type="radio" name="tipo" value="Decimal" checked /> Decimal
                    <input type="radio" name="tipo" value="Binario" /> Binario
                    <input type="radio" name="tipo" value="Hexadecimal" /> Haxadecimal
                </div>

                <input type="reset" value="borrar con reset">
            </form>
            <p>El resultado es <?= $resultado ?? '' ?> </p>
        </div>
    </div>

</body>

</html>