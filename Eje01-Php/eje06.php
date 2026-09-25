<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>

<body>
    <!-- Si quieres cambiar el numero guapeton-->
    <?php $num = 5; ?>

    <style>
        body{
            background-color: rgb(144, 144, 143);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .tabla-multiplicar{
            
            background-color: white;
            font-family: arial;
            font-size: 1.4rem;
            padding: 0px;
            margin: 0px;
            

        }
        .logo{
            color: white;
            background-color: rgb(0, 128, 255) !important;
            border:1px solid;
            margin: 0%;
            padding: 0%;
            display: block;
        }
        .logo h1{
            margin: 0;
            padding: 0;
        }
        .numeros{
            margin: 10px;
            padding: 10px;
            
        }
        table {
            border-collapse: collapse;
        }
        th {
            border: 1px solid;
            border-color: black;
        }
    </style>

    <div class="tabla-multiplicar">
        <span class="logo">
            <h1>TABLA DE MULTIPLICAR</h1>
        </span>
        <div class="numeros">
            <table>
                <tr>
                    <th><b>Tabla del 5</b></th>
                    <th></th>
                </tr>
                <?php
                    for ($i = 1; $i < 11; $i++) {
                        echo "<tr> <th>" . $num . " x " . $i . "=  </th>";
                        $mult = $num * $i;
                        echo "<th>" . $mult . " </th> </tr>";
                    }
                ?>
            </table>
        </div>
    </div>

</body>

</html>