<?php
session_start();

$sesionIniciada = isset($_SESSION["id_usuario"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos | PICT</title>
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
                <a href="index.html">Inicio</a>
                <a href="login.html">Iniciar sesión</a>
            </nav>
        </div>
    </header>

    <main class="catalogo">
        <section class="catalogo-intro">
            <h1>Explora nuestros cursos</h1>
            <p>
                Aprende tecnología paso a paso con contenidos sencillos,
                actividades prácticas y explicaciones que puedes escuchar.
            </p>
        </section>

        <section class="cursos-grid" aria-label="Lista de cursos">

            <article class="curso-card">
                <div class="curso-icono" aria-hidden="true">💻</div>
                <h2>Mi primer computador</h2>
                <p>
                    Conoce las partes del computador y aprende sus
                    funciones básicas.
                </p>
                <?php if ($sesionIniciada): ?>

    <form action="procesar_inscripcion.php" method="POST">
        <input type="hidden" name="id_curso" value="1">

        <button type="submit" class="btn-primary">
            Inscribirme
        </button>
    </form>

<?php else: ?>

    <a href="login.html" class="btn-primary">
        Inicia sesión para inscribirte
    </a>

<?php endif; ?>
            </article>

            <article class="curso-card">
                <div class="curso-icono" aria-hidden="true">🖥️</div>
                <h2>Aprendo a usar el computador</h2>
                <p>
                    Aprende a manejar el escritorio, abrir programas
                    y organizar archivos y carpetas.
                </p>
                
<?php if ($sesionIniciada): ?>
    <form action="procesar_inscripcion.php" method="POST">
        <input type="hidden" name="id_curso" value="2">
        <button type="submit" class="btn-primary">
            Inscribirme
        </button>
    </form>
<?php else: ?>
    <a href="login.html" class="btn-primary">
        Inicia sesión para inscribirte
    </a>
<?php endif; ?>

            </article>

            <article class="curso-card">
                <div class="curso-icono" aria-hidden="true">🌐</div>
                <h2>Mis primeros pasos en Internet</h2>
                <p>
                    Descubre cómo navegar por Internet y buscar
                    información de manera sencilla.
                </p>
                <?php if ($sesionIniciada): ?>
    <form action="procesar_inscripcion.php" method="POST">
        <input type="hidden" name="id_curso" value="3">
        <button type="submit" class="btn-primary">
            Inscribirme
        </button>
    </form>
<?php else: ?>
    <a href="login.html" class="btn-primary">
        Inicia sesión para inscribirte
    </a>
<?php endif; ?>
            </article>

            <article class="curso-card">
                <div class="curso-icono" aria-hidden="true">📝</div>
                <h2>Aprendo a crear documentos</h2>
                <p>
                    Aprende a escribir, editar y guardar documentos
                    de texto.
                </p>
                
<?php if ($sesionIniciada): ?>
    <form action="procesar_inscripcion.php" method="POST">
        <input type="hidden" name="id_curso" value="4">
        <button type="submit" class="btn-primary">
            Inscribirme
        </button>
    </form>
<?php else: ?>
    <a href="login.html" class="btn-primary">
        Inicia sesión para inscribirte
    </a>
<?php endif; ?>

            </article>

            <article class="curso-card">
                <div class="curso-icono" aria-hidden="true">🔒</div>
                <h2>Me cuido en Internet</h2>
                <p>
                    Aprende a proteger tus datos personales y a
                    reconocer situaciones de riesgo en Internet.
                </p>
                
<?php if ($sesionIniciada): ?>
    <form action="procesar_inscripcion.php" method="POST">
        <input type="hidden" name="id_curso" value="5">
        <button type="submit" class="btn-primary">
            Inscribirme
        </button>
    </form>
<?php else: ?>
    <a href="login.html" class="btn-primary">
        Inicia sesión para inscribirte
    </a>
<?php endif; ?>

            </article>

        </section>
    </main>

    <footer>
        <p>PICT - Plataforma Inclusiva de Capacitación Tecnológica</p>
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


