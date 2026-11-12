
<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Método no permitido.");
}

$nombre = trim($_POST["nombre"] ?? "");
$tipo = $_POST["tipo-documento"] ?? "";
$documento = trim($_POST["documento"] ?? "");
$fecha = $_POST["fecha"] ?? "";
$correo = trim($_POST["correo"] ?? "");
$contrasena = $_POST["contrasena"] ?? "";

$tiposPermitidos = ["CC", "TI", "CE"];
$fechaValida = DateTimeImmutable::createFromFormat("!Y-m-d", $fecha);

if (
    $nombre === "" ||
    !in_array($tipo, $tiposPermitidos, true) ||
    !preg_match('/^[0-9]{4,20}$/', $documento) ||
    !$fechaValida ||
    $fechaValida->format("Y-m-d") !== $fecha ||
    $fechaValida > new DateTimeImmutable("today") ||
    !filter_var($correo, FILTER_VALIDATE_EMAIL) ||
    strlen($contrasena) < 12
) {
    exit("Datos inválidos. Revisa los campos y utiliza una contraseña de al menos 12 caracteres.");
}

$hash = password_hash($contrasena, PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO usuarios
            (nombre, tipo_documento, numero_documento,
             fecha_nacimiento, correo, contrasena)
            VALUES
            (:nombre, :tipo, :documento,
             :fecha, :correo, :contrasena)";

    $consulta = $conexion->prepare($sql);

    $consulta->execute([
        ":nombre" => $nombre,
        ":tipo" => $tipo,
        ":documento" => $documento,
        ":fecha" => $fecha,
        ":correo" => $correo,
        ":contrasena" => $hash
    ]);

    header("Location: login.html?registro=exitoso");
exit;

} catch (PDOException $error) {
    if ($error->getCode() === "23000") {
        http_response_code(409);
        exit("El correo o documento ya está registrado.");
    }

    http_response_code(500);
    echo "No se pudo completar el registro.";
}
?>
