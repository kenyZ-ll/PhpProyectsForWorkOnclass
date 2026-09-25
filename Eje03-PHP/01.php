<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- 1.- Rellenar un array con 20 números aleatorios entre 1 y 10 y mostrar el contenido del array  mediante una tabla 
 de una fila en HMTL. Mostrar a continuación el valor máximo, el mínimo y el  valor que mas veces se repite. 
 (Nota definir funciones para cada caso)
-->
</head>
<?php
/* Valor maximo */

/* Valor minimo */

/* Valor que mas veces se repite */

?>
<style>
    .generar-nums {
        border: 1px solid #020202;
        color: blue;
        display: flex;
    }
</style>

<body>
    <div class="generar-nums">
        <?php for ($i = 0; $i < 20; $i++): ?>
            <?php $datos[] = rand(1, 10); ?>
            <table>
                <tr>
                    <th class="tabla" style="border: 1px solid #020202; color: #2f57be;display: flex; align-items: center; justify-content: center;"> 
                        <?php echo $datos[$i]; ?>
                    </th>
                </tr>
            </table>

        <?php endfor ?>
    </div>

    <table>
        <tr>
            <th  class="tabla" style="border: 1px solid #020202; color: #2f57be;display: flex; align-items: center; justify-content: center;"> 
              <p> Valor maximo de la tabla => </p>  <?php $numMax = max($datos); echo $numMax; ?>
            </th>
        </tr>
        <tr>
            <th class="tabla" style="border: 1px solid #020202; color: #2f57be;display: flex; align-items: center; justify-content: center;"> 
                <p> Valor minimo de la tabla => </p><?php $numMin = min($datos); echo $numMin; ?>
            </th>
        </tr>
    </table>
</body>

</html>