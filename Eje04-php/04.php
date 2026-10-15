<?php 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información servidor</title>
</head>
<style>
        .respuesta-formulario {
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
</style>
<body>
    <div class="respuesta-formulario">
       <h1> Procesado formulario </h1>  
    </div>
    <div>
        <?php
        // Imprime directamente cada valor que envió el formulario
        echo "Nombre: " . ($_REQUEST['name'] ?? '') . "<br>";
        echo "Clave: " . ($_REQUEST['passwrd'] ?? '') . "<br>";
        echo "Semáforo: " . ($_REQUEST['drone'] ?? '') . "<br>";
        echo "Publicidad: " . (isset($_REQUEST['publi']) ? 'Sí' : 'No') . "<br>";
        
        // Si el usuario marcó varios checkboxes de idiomas, los unimos con una coma
        $idiomas = [];
        if (isset($_REQUEST['ingles'])) $idiomas[] = 'Inglés';
        if (isset($_REQUEST['frances'])) $idiomas[] = 'Francés';
        if (isset($_REQUEST['aleman'])) $idiomas[] = 'Alemán';
        echo "Idiomas: " . implode(', ', $idiomas) . "<br>";

        echo "Año de fin de estudios: " . ($_REQUEST['estudios'] ?? '') . "<br>";

        // Para las ciudades múltiples (que llegan como array)
        $ciudades = $_REQUEST['ciudades'] ?? '';
        if (is_array($ciudades)) {
            $ciudades = implode(' ', $ciudades);
        }
        echo "Lista de las ciudades: " . $ciudades . "<br>";

        echo "Comentarios: " . ($_REQUEST['comentarios'] ?? '') . "<br>";
        ?>
    </div>    
</body>
</html>