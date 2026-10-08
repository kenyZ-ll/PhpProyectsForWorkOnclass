<?php
// index.php
// GET  -> muestra el formulario (captura.html)
// POST -> procesa y muestra los datos del jugador

// ---------- GET: mostrar formulario ----------
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    readfile(__DIR__ . '/captura.html');
    exit;
}

// ---------- POST: procesar datos ----------

// Función contra inyección de código (XSS): elimina espacios y escapa HTML
function limpiar(string $texto): string {
    return htmlspecialchars(trim($texto), ENT_QUOTES, 'UTF-8');
}

function validarImagen(array $archivo): ?string {
    if (($archivo['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        return 'Error al subir la imagen';
    }

    if (!isset($archivo['size']) || $archivo['size'] > MAX_BYTES) {
        return 'Error al subir la imagen: supera los 10 KB';
    }

    $rutaTemporal = $archivo['tmp_name'] ?? '';
    if (!is_string($rutaTemporal) || $rutaTemporal === '') {
        return 'Error al subir la imagen';
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($rutaTemporal);

    if ($mime !== TIPO_PERMITIDO || @getimagesize($rutaTemporal) === false) {
        return 'Error al subir la imagen: solo se permiten PNG';
    }

    return null;
}

function guardarImagen(array $archivo, string $carpeta): ?string {
    $nuevoNombre = uniqid('jugador_', true) . '.png';
    if (!move_uploaded_file($archivo['tmp_name'], $carpeta . $nuevoNombre)) {
        return null;
    }

    return 'uploads/' . $nuevoNombre;
}

function procesarImagenesCarrusel(array $archivos, string $carpeta): array {
    $rutasValidas = [];
    $errores = [];
    if (!isset($archivos['name'])) {
        return ['rutas' => $rutasValidas, 'errores' => $errores];
    }

    foreach (['name', 'type', 'tmp_name', 'error', 'size'] as $campo) {
        if (!isset($archivos[$campo]) || !is_array($archivos[$campo])) {
            return [
                'rutas' => [],
                'errores' => ['Error al procesar las imágenes del carrusel.'],
            ];
        }
    }

    $total = count($archivos['name']);

    if ($total > MAX_IMAGENES) {
        return [
            'rutas' => [],
            'errores' => ['Error al subir imágenes del carrusel: máximo 4 imágenes.'],
        ];
    }

    for ($indice = 0; $indice < $total; $indice++) {
        if (($archivos['error'][$indice] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            continue;
        }

        $archivo = [
            'name' => $archivos['name'][$indice] ?? '',
            'type' => $archivos['type'][$indice] ?? '',
            'tmp_name' => $archivos['tmp_name'][$indice] ?? '',
            'error' => $archivos['error'][$indice] ?? UPLOAD_ERR_NO_FILE,
            'size' => $archivos['size'][$indice] ?? 0,
        ];

        $error = validarImagen($archivo);
        if ($error !== null) {
            $errores[] = 'Imagen ' . ($indice + 1) . ' del carrusel: ' . $error;
            continue;
        }

        $ruta = guardarImagen($archivo, $carpeta);
        if ($ruta === null) {
            $errores[] = 'Imagen ' . ($indice + 1) . ' del carrusel: Error al subir la imagen';
            continue;
        }

        $rutasValidas[] = $ruta;
    }

    return ['rutas' => $rutasValidas, 'errores' => $errores];
}

$nombre = limpiar($_POST['nombre'] ?? '');
$alias  = limpiar($_POST['alias'] ?? '');
$edad   = filter_var($_POST['edad'] ?? '', FILTER_VALIDATE_INT);

// Armas: solo se aceptan valores de la lista permitida
$armasPermitidas = ['Maza', 'Antorcha', 'Martillo', 'Látigo'];
$armas = array_intersect($_POST['armas'] ?? [], $armasPermitidas);

// Artes mágicas: solo "Sí" o "No"
$magia = (($_POST['magia'] ?? '') === 'Sí') ? 'Sí' : 'No';

// ---------- Imagen (opcional) ----------
const MAX_BYTES = 10 * 1024;          // 10 KB
const MAX_IMAGENES = 4;
const TIPO_PERMITIDO = 'image/png';
$carpeta = __DIR__ . '/uploads/';
$imagenMostrar = 'img/calavera.svg';  // por defecto, la calavera
$tituloImagen  = 'No se subió ninguna imagen.';
$mensajeError  = '';

$archivo = $_FILES['imagen'] ?? null;

if ($archivo && $archivo['error'] !== UPLOAD_ERR_NO_FILE) {
    // Se ha intentado subir algo
    $errorImagen = validarImagen($archivo);
    if ($errorImagen !== null) {
        $mensajeError = $errorImagen;
    } else {
        $rutaImagen = guardarImagen($archivo, $carpeta);
        if ($rutaImagen !== null) {
            $imagenMostrar = $rutaImagen;
            $tituloImagen  = 'Imagen subida:';
        } else {
            $mensajeError = 'Error al subir la imagen';
        }
    }
}

$resultadoCarrusel = procesarImagenesCarrusel($_FILES['imagenes'] ?? [], $carpeta);
$imagenesCarrusel = $resultadoCarrusel['rutas'];
$erroresCarrusel = $resultadoCarrusel['errores'];
// Si no se indicó ninguna imagen: calavera sin mensaje de error
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos del Jugador</title>
  <link rel="stylesheet" href="css/carrusel.css">
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4fa; padding: 20px; }
    .tarjeta { background: #ffff44; max-width: 520px; margin: 0 auto; padding: 20px; border-radius: 12px; }
    h1 { font-size: 1.3rem; text-align: center; }
    .contenido { display: flex; flex-wrap: wrap; gap: 20px; align-items: center; }
    .contenido > div { flex: 1 1 200px; }
    img { width: 190px; height: 190px; object-fit: contain; border: 1px solid #00f; }
    .titulo-imagen { font-weight: bold; }
    .error { color: #000; }
  </style>
  <script src="js/carrusel.js" defer></script>
</head>
<body>
  <div class="tarjeta">
    <h1>Datos del Jugador</h1>
    <div class="contenido">
      <div>
        <p><strong>Nombre:</strong> <?= $nombre ?></p>
        <p><strong>Alias:</strong> <?= $alias ?></p>
        <p><strong>Edad:</strong> <?= $edad !== false ? $edad : 'No válida' ?></p>
        <p><strong>Armas seleccionadas:</strong> <?= $armas ? implode(', ', $armas) : 'Ninguna' ?></p>
        <p><strong>¿Practica artes mágicas?:</strong> <?= $magia ?></p>
      </div>
      <div>
        <p class="titulo-imagen"><?= $tituloImagen ?></p>
        <img src="<?= htmlspecialchars($imagenMostrar) ?>" alt="Imagen del jugador">
        <?php if ($mensajeError): ?>
          <p class="error"><?= $mensajeError ?></p>
        <?php endif; ?>
      </div>
    </div>
    <?php if ($imagenesCarrusel): ?>
      <section
        class="carrusel"
        data-imagenes="<?= htmlspecialchars(
            json_encode($imagenesCarrusel, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT),
            ENT_QUOTES | ENT_SUBSTITUTE,
            'UTF-8'
        ) ?>"
        aria-label="Carrusel de imágenes del jugador">
        <div class="carrusel__diapositivas" aria-live="polite"></div>
        <div class="carrusel__controles"></div>
        <div class="carrusel__indicadores"></div>
      </section>
    <?php endif; ?>
    <?php foreach ($erroresCarrusel as $errorCarrusel): ?>
      <p class="error" role="alert"><?= htmlspecialchars($errorCarrusel, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endforeach; ?>
  </div>
</body>
</html>
