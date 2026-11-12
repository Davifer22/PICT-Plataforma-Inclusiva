

<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.html");
    exit;
}

require_once "conexion.php";

$nombre = htmlspecialchars(
    $_SESSION["nombre"] ?? "Estudiante",
    ENT_QUOTES,
    "UTF-8"
);

$consulta = $conexion->prepare(
    "SELECT c.nombre, c.descripcion, c.archivo
     FROM inscripciones i
     INNER JOIN cursos c ON i.id_curso = c.id_curso
     WHERE i.id_usuario = :usuario
     ORDER BY i.fecha_inscripcion DESC"
);

$consulta->execute([
    ":usuario" => $_SESSION["id_usuario"]
]);

$cursosInscritos = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Mis cursos | PICT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="encabezado">
    <div class="contenedor encabezado-contenido">
        <a href="index.html" class="marca">
            <img src="logo PICT.png" alt="Logo de PICT">
            <span>PICT</span>
        </a>

        <nav aria-label="Navegación principal">
           <a href="cursos.php">Explorar cursos</a>
        </nav>
    </div>
</header>

<main class="catalogo">

    <section class="catalogo-intro">
        <h1>¡Bienvenido a PICT, <?php echo $nombre; ?>!</h1>

        <p>
            Este es tu espacio de aprendizaje.
            Aquí podrás encontrar los cursos
            en los que te inscribas.
        </p>
    </section>

    <section aria-labelledby="titulo-mis-cursos">

        <h2 id="titulo-mis-cursos">Mis cursos</h2>

        <?php if (empty($cursosInscritos)): ?>

            <p>
                Todavía no tienes cursos inscritos.
                Explora nuestro catálogo y descubre
                lo que puedes aprender.
            </p>

        <?php else: ?>

            <div class="cursos-grid">

                <?php foreach ($cursosInscritos as $curso): ?>

                    <article class="curso-card">

                        <div class="curso-icono"
                             aria-hidden="true">
                            📚
                        </div>

                        <h2>
                            <?php echo htmlspecialchars(
                                $curso["nombre"],
                                ENT_QUOTES,
                                "UTF-8"
                            ); ?>
                        </h2>

                        <p>
                            <?php echo htmlspecialchars(
                                $curso["descripcion"],
                                ENT_QUOTES,
                                "UTF-8"
                            ); ?>
                        </p>

                        <?php
$archivoCurso = $curso["archivo"];

$versionesPHP = [
    "curso-computador.html" => "curso-computador.php",
    "curso-uso.html" => "curso-uso.php",
    "curso-internet.html" => "curso-internet.php",
    "curso-documentos.html" => "curso-documentos.php",
    "curso-seguridad.html" => "curso-seguridad.php"
];

$archivoCurso = $versionesPHP[$archivoCurso] ?? $archivoCurso;
?>

<a
    href="<?php echo htmlspecialchars(
        $archivoCurso,
        ENT_QUOTES,
        "UTF-8"
    ); ?>"
    class="btn-primary"
>
    Comenzar a aprender
</a>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <p style="margin-top: 30px;">
            <a href="cursos.php" class="btn-primary">
                Explorar cursos
            </a>
        </p>

    </section>

</main>

<footer>
    <p>
        PICT - Plataforma Inclusiva
        de Capacitación Tecnológica
    </p>
</footer>

<!-- Botón de accesibilidad PICT -->
<div class="pict-accesibilidad">

  <button id="btn-accesibilidad"
          type="button"
          aria-label="Abrir opciones de accesibilidad"
          aria-expanded="false"
          aria-controls="menu-accesibilidad">
    ♿
  </button>

  <div id="menu-accesibilidad" hidden>
    <h2>Accesibilidad</h2>

    <button type="button" id="aumentar-texto">
      A+ Aumentar texto
    </button>

    <button type="button" id="disminuir-texto">
      A- Disminuir texto
    </button>

    <button type="button" id="alto-contraste">
      Alto contraste
    </button>

    <button type="button" id="leer-pagina">
      🔊 Leer página
    </button>

    <button type="button" id="detener-lectura">
      Detener lectura
    </button>

    <button type="button" id="restablecer-accesibilidad">
      Restablecer
    </button>

  </div>
</div>

<script src="accesibilidad.js" defer></script>

</body>
</html>

