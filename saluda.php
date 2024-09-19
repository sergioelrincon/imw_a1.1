<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'horarios_db';
$username = 'horarios_db';  // Cambiar según tu configuración
$password = 'ClaveDeHorariosDB';      // Cambiar según tu configuración

try {
    // Crear una conexión PDO a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

// Obtener la hora actual
$horaActual = date("H");

// Definir el mensaje y la franja horaria según la hora
if ($horaActual >= 6 && $horaActual < 12) {
    $momento = 'mañana';
    $mensaje = 'Buenos días';
} elseif ($horaActual >= 12 && $horaActual < 18) {
    $momento = 'tarde';
    $mensaje = 'Buenas tardes';
} else {
    $momento = 'noche';
    $mensaje = 'Buenas noches';
}

// Consultar el nombre de la imagen según el momento del día
$sql = "SELECT imagen FROM imagenes_horario WHERE momento = :momento";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':momento', $momento);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    $nombreImagen = $resultado['imagen'];
} else {
    $nombreImagen = 'default.jpg';  // Imagen por defecto en caso de error
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo según la hora</title>
</head>
<body>

<h1><?php echo $mensaje; ?></h1>

<!-- Mostrar la imagen correspondiente -->
<img src="imagenes/<?php echo $nombreImagen; ?>" alt="<?php echo $mensaje; ?>">

</body>
</html>
