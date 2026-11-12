
<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Método no permitido.");
}

require_once "conexion.php";

$idUsuario = (int) $_SESSION["id_usuario"];
$idCurso = filter_input(
    INPUT_POST,
    "id_curso",
    FILTER_VALIDATE_INT
);

if (!$idCurso) {
    http_response_code(400);
    exit("Curso no válido.");
}

try {
    $consulta = $conexion->prepare(
        "SELECT id_curso FROM cursos WHERE id_curso = :id"
    );
    $consulta->execute([":id" => $idCurso]);

    if (!$consulta->fetch()) {
        http_response_code(404);
        exit("El curso no existe.");
    }

    $consulta = $conexion->prepare(
        "INSERT IGNORE INTO inscripciones
        (id_usuario, id_curso)
        VALUES (:usuario, :curso)"
    );

    $consulta->execute([
        ":usuario" => $idUsuario,
        ":curso" => $idCurso
    ]);

    header("Location: mis-cursos.php");
    exit;

} catch (PDOException $error) {
    http_response_code(500);
    exit("No se pudo completar la inscripción.");
}
?>
