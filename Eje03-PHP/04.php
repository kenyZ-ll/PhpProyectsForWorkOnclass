<?php 
        $medios = [
        "BASKET"=> "imgs/BASKET.jpg",
        "BOXING"=> "imgs/BOXING.png",
        "ESGRIMA"=> "imgs/ESGRIMA.png",
        "MMA"=> "imgs/MMA.png",
        "TENNIS"=> "imgs/TENNIS.png",
    ];
    $names = array_keys($medios);
    $links = array_values($medios);
    $contador = count($medios);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 
<style>
    th{
        border: 1px solid;
        align-items: center;
        justify-content: center;
    }
    table {
        border-collapse: collapse;
    }
</style>
<body>
    <table>
        <tr>
            <th>Deportes</th>
            <th>Logo</th>
        </tr>
        <?php  for ($i = 0; $i < $contador; $i++):  ?>
        <tr>
            <th><?php echo $names[$i]; ?></th>
            <th><img src="<?php echo $links[$i]?>" alt="images" style="width: 100px; height: 100px;"></th>
        </tr>
        <?php endfor?>
    </table>
</body>
</html>