<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>

<body>
    <style>
        .title {
            background-color: #535353;
            color: #3a61fa;
        }

        th {
            border: 1px solid;
            border-color: black;
        }

        table {
            border-collapse: collapse;
        }
    </style>
    <div class="tabla">

        <?php
        //crear funciones con numeros aleatorios
        $num1 = 5;
        $num2 = 2;
        //calculos
        /*
        echo "<";
        echo $num1 . "+" . $num2 . " = " . $num1 + $num2 . "<br>";
        echo $num1 . "-" . $num2 . " = " . $num1 - $num2 . "<br>";
        echo $num1 . "*" . $num2 . " = " . $num1 * $num2 . "<br>";
        echo $num1 . "/" . $num2 . " = " . $num1 / $num2 . "<br>";
        echo $num1 . "%" . $num2 . " = " . $num1 % $num2 . "<br>";
        echo $num1 . "**" . $num2 . " = " . $num1 ** $num2 . "<br>";
        echo"";
        */
        echo "
        <table> 
        <tr class='title'> 
            <th> Operación </th> 
            <th> Resultado </th> 
        </tr>

        <tr> 
            <th>" . $num1 . "+" . $num2 . "</th> 
            <th> " . $num1 + $num2 . "</th> 
        </tr> 

        <tr> 
            <th>" . $num1 . "-" . $num2 . "</th> 
            <th> " . $num1 - $num2 . "</th>
        </tr>

        <tr> 
            <th>" . $num1 . "*" . $num2 . "</th> 
            <th> " . $num1 * $num2 . "</th>
        </tr>

        <tr> 
            <th>" . $num1 . "/" . $num2 . "</th> 
            <th> " . $num1 / $num2 . "</th>
        </tr>

        <tr> 
            <th>" . $num1 . "%" . $num2 . "</th> 
            <th> " . $num1 % $num2 . "</th>
        </tr>

        <tr> 
            <th>" . $num1 . "**" . $num2 . "</th> 
            <th> " . $num1 ** $num2 . "</th>
        </tr>

        </table>";

        ?>
    </div>

</body>

</html>