
<?php
session_start();

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Método no permitido.");
}

$correo = trim($_POST["correo"] ?? "");
$contrasena = $_POST["contrasena"] ?? "";

if ($correo === "" || $contrasena === "") {
    exit("Debes completar todos los campos.");
}

try {
    $sql = "SELECT id_usuario, nombre, correo, contrasena
            FROM usuarios
            WHERE correo = :correo
            LIMIT 1";

    $consulta = $conexion->prepare($sql);

    $consulta->execute([
        ":correo" => $correo
    ]);

    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

    if (
        $usuario &&
        password_verify($contrasena, $usuario["contrasena"])
    ) {
        session_regenerate_id(true);

       $_SESSION["id_usuario"] = $usuario["id_usuario"];
       $_SESSION["nombre"] = $usuario["nombre"];

       header("Location: mis-cursos.php");
exit;
    } else {
        http_response_code(401);
        echo "Correo o contraseña incorrectos.";
    }

} catch (PDOException $error) {
    http_response_code(500);
    echo "No se pudo iniciar sesión. Inténtalo nuevamente.";
}
?>
