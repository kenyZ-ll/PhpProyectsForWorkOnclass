<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periodicos</title>
</head>

    <?php 
        $medios = ["El Pais" => "https://www.elpais.com", 
                   "El Mundo" => "https://www.elmundo.es",
                   "The Economist" => "https://www.economist.com/",
                   "La Razon" => "https://www.larazon.es/",
                   "Marca" => "https://www.marca.com/"              ];
    ?>

<body>
        <nav>
            <ul>
                <li>
                    <a href="<?php echo $medios["El Pais"];?>">El Pais</a>                
                </li>
                <li>
                    <a href="<?php echo $medios["El Mundo"];?>">El Mundo</a>                
                </li>
                <li>
                    <a href="<?php echo $medios["The Economist"];?>">The Economist</a>                
                </li>

                <li>
                    <a href="<?php echo $medios["La Razon"];?>">La Razón</a>                
                </li>

                <li>
                    <a href="<?php echo $medios["Marca"];?>">Marca</a>                
                </li>

            </ul>
        </nav>
</body>
</html>