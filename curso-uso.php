<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.html");
    exit;
}
require_once "conexion.php";
$consulta = $conexion->prepare(
    "SELECT COUNT(*) FROM inscripciones WHERE id_usuario = :usuario AND id_curso = :curso"
);
$consulta->execute([
    ":usuario" => $_SESSION["id_usuario"],
    ":curso" => 2
]);
if ((int) $consulta->fetchColumn() === 0) {
    http_response_code(403);
    exit("No estás inscrito en este curso. Inscríbete desde Explorar cursos.");
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Aprendo a usar el computador | PICT</title><link rel="stylesheet" href="style.css">
<style>
/* Ajustes limitados a las páginas de aprendizaje */
.contenido-curso .leccion h3 { margin-top: 1.1rem; }
.contenido-curso .leccion p, .contenido-curso .leccion li { line-height: 1.65; }
.contenido-curso .leccion li { margin-bottom: .45rem; }
.contenido-curso fieldset { margin: 1rem 0; padding: 1rem; border: 1px solid #aebdcc; border-radius: 8px; }
.contenido-curso fieldset label { display: block; padding: .35rem 0; cursor: pointer; }
.contenido-curso fieldset input { margin-right: .5rem; }
.contenido-curso .resultado-evaluacion { margin-top: 1rem; font-weight: bold; }
</style>
</head><body>
<header class="encabezado"><div class="contenedor encabezado-contenido"><a href="index.html" class="marca"><img src="logo PICT.png" alt="Logo de PICT"><span>PICT</span></a><nav aria-label="Navegación principal"><a href="index.html">Inicio</a><a href="mis-cursos.php">Volver a mis cursos</a></nav></div></header>
<main class="contenido-curso">
<section class="curso-intro"><h1>Aprendo a usar el computador</h1><p>Aprende a manejar el escritorio, las ventanas, los programas y tus archivos.</p><p><strong>Nivel:</strong> Inicial</p><p><strong>Lecciones:</strong> 6</p><button type="button" class="btn-primary" onclick="escucharTexto(this.parentElement.querySelector('p').textContent)">🔊 Escuchar presentación</button></section>

<!-- ===================================== -->
<!-- LECCIÓN 1: CONOZCO EL ESCRITORIO -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 1 de 6 — Posición en el recorrido: 17 %
    </p>

    <h2>Lección 1. Conozco el escritorio</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Identificar las partes más comunes del escritorio y comprender para qué sirven.</p>

    <h3>1. ¿Qué es el escritorio?</h3>
    <p>Es el espacio de trabajo que aparece al iniciar el sistema. Allí puedes encontrar iconos, ventanas y accesos a programas.</p>

    <h3>2. Iconos</h3>
    <p>Son pequeñas imágenes que representan programas, carpetas o archivos. Puedes seleccionarlos con el mouse o el teclado.</p>

    <h3>3. Barra de tareas</h3>
    <p>En Windows suele estar en la parte inferior. Permite ver programas abiertos y acceder a herramientas frecuentes.</p>

    <h3>4. Ejemplo cotidiano</h3>
    <p>Si quieres abrir un programa de escritura, puedes buscarlo en el menú Inicio o en un acceso directo.</p>

    <h3>Actividad práctica</h3>
    <p>Observa el escritorio e identifica un icono, la barra de tareas y el menú Inicio.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 2: ABRO Y CIERRO PROGRAMAS -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 2 de 6 — Posición en el recorrido: 33 %
    </p>

    <h2>Lección 2. Abro y cierro programas</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Aprender a iniciar programas y cerrarlos correctamente.</p>

    <h3>1. ¿Qué es un programa?</h3>
    <p>Es una herramienta que permite realizar tareas, como escribir, dibujar, escuchar música o navegar por Internet.</p>

    <h3>2. Abrir un programa</h3>
    <p>Busca su icono o nombre, selecciónalo y espera a que aparezca la ventana.</p>

    <h3>3. Cerrar un programa</h3>
    <p>Guarda tu trabajo y utiliza el botón Cerrar de la ventana o la opción Salir del programa.</p>

    <h3>4. Ejemplo cotidiano</h3>
    <p>Abre la calculadora, realiza una suma sencilla y ciérrala cuando termines.</p>

    <h3>Actividad práctica</h3>
    <p>Abre la calculadora y realiza una suma. Después ciérrala.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 3: COMPRENDO LAS VENTANAS -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 3 de 6 — Posición en el recorrido: 50 %
    </p>

    <h2>Lección 3. Comprendo las ventanas</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Reconocer las partes de una ventana y practicar cómo cambiar su tamaño.</p>

    <h3>1. ¿Qué es una ventana?</h3>
    <p>Es un área de la pantalla donde se muestra un programa, documento o carpeta.</p>

    <h3>2. Minimizar</h3>
    <p>Oculta temporalmente la ventana sin cerrar el programa.</p>

    <h3>3. Maximizar y restaurar</h3>
    <p>Permiten ampliar la ventana o devolverla a su tamaño anterior.</p>

    <h3>4. Cambiar entre ventanas</h3>
    <p>Puedes seleccionar una ventana desde la barra de tareas o utilizar Alt + Tab en Windows.</p>

    <h3>Actividad práctica</h3>
    <p>Abre dos programas y practica minimizar, maximizar y cambiar entre ellos.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 4: CONOZCO LOS ARCHIVOS -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 4 de 6 — Posición en el recorrido: 67 %
    </p>

    <h2>Lección 4. Conozco los archivos</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Comprender qué es un archivo y reconocer ejemplos habituales.</p>

    <h3>1. ¿Qué es un archivo?</h3>
    <p>Es información guardada en el computador, como una foto, un texto o una grabación.</p>

    <h3>2. Nombres de archivos</h3>
    <p>Un nombre claro ayuda a reconocer su contenido. Por ejemplo, Carta_familia.docx.</p>

    <h3>3. Tipos de archivos</h3>
    <p>Un documento puede terminar en .docx o .pdf; una imagen, en .jpg o .png.</p>

    <h3>4. Guardar y abrir</h3>
    <p>Guardar conserva el trabajo. Abrir permite volver a consultar o modificar un archivo.</p>

    <h3>Actividad práctica</h3>
    <p>Piensa en un nombre sencillo para guardar una carta o una fotografía.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 5: ORGANIZO CARPETAS -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 5 de 6 — Posición en el recorrido: 83 %
    </p>

    <h2>Lección 5. Organizo carpetas</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Aprender a utilizar carpetas para mantener ordenados los documentos.</p>

    <h3>1. ¿Qué es una carpeta?</h3>
    <p>Es un espacio que agrupa archivos y otras carpetas, parecido a una carpeta física.</p>

    <h3>2. Crear una carpeta</h3>
    <p>En el explorador de archivos de Windows, puedes elegir Nueva carpeta y escribir un nombre.</p>

    <h3>3. Mover y copiar</h3>
    <p>Mover cambia un archivo de lugar; copiar crea otra versión en una ubicación diferente.</p>

    <h3>4. Ejemplo cotidiano</h3>
    <p>Puedes crear una carpeta Estudios y guardar allí tus tareas y apuntes.</p>

    <h3>Actividad práctica</h3>
    <p>Crea una carpeta llamada Practicas PICT y, si puedes, guarda un archivo de prueba dentro.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 6: USO EL COMPUTADOR CON AUTONOMÍA -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 6 de 6 — Posición en el recorrido: 100 %
    </p>

    <h2>Lección 6. Uso el computador con autonomía</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Repasar las tareas básicas y aprender buenas prácticas.</p>

    <h3>1. Rutina de trabajo</h3>
    <p>Enciende el equipo, abre el programa necesario, realiza la tarea y guarda el resultado.</p>

    <h3>2. Orden y cuidado</h3>
    <p>Mantén los archivos con nombres claros y evita borrar carpetas que no conozcas.</p>

    <h3>3. Pedir ayuda</h3>
    <p>Si aparece un mensaje que no comprendes, consulta antes de aceptar cambios importantes.</p>

    <h3>4. Cierre seguro</h3>
    <p>Guarda tus documentos, cierra los programas y apaga el equipo desde el sistema.</p>

    <h3>Actividad práctica</h3>
    <p>Realiza una práctica completa: abre un programa, crea un archivo, guárdalo y vuelve a abrirlo.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<section class="leccion actividad"><h2>Evaluación final</h2><p>Selecciona una respuesta por pregunta y comprueba lo aprendido.</p><form id="evaluacion-curso" data-respuestas="[0, 1, 2, 0, 1]">
<fieldset><legend>1. ¿Qué permite minimizar una ventana?</legend>
<label><input type="radio" name="p1" value="0"> Ocultarla temporalmente</label>
<label><input type="radio" name="p1" value="1"> Borrar el programa</label>
<label><input type="radio" name="p1" value="2"> Apagar el equipo</label>
</fieldset>
<fieldset><legend>2. ¿Para qué sirve una carpeta?</legend>
<label><input type="radio" name="p2" value="0"> Subir el volumen</label>
<label><input type="radio" name="p2" value="1"> Organizar archivos</label>
<label><input type="radio" name="p2" value="2"> Encender el monitor</label>
</fieldset>
<fieldset><legend>3. ¿Qué conviene hacer antes de cerrar un documento?</legend>
<label><input type="radio" name="p3" value="0"> Desconectar el equipo</label>
<label><input type="radio" name="p3" value="1"> Borrar el archivo</label>
<label><input type="radio" name="p3" value="2"> Guardar los cambios</label>
</fieldset>
<fieldset><legend>4. ¿Qué es un archivo?</legend>
<label><input type="radio" name="p4" value="0"> Información guardada</label>
<label><input type="radio" name="p4" value="1"> Una mesa</label>
<label><input type="radio" name="p4" value="2"> Un cable</label>
</fieldset>
<fieldset><legend>5. ¿Dónde puedes cambiar entre programas abiertos en Windows?</legend>
<label><input type="radio" name="p5" value="0"> En el cable de energía</label>
<label><input type="radio" name="p5" value="1"> En la barra de tareas</label>
<label><input type="radio" name="p5" value="2"> En la impresora</label>
</fieldset>
<button type="submit" class="btn-primary">Comprobar respuestas</button></form><p id="resultado-actividad" class="resultado-evaluacion" role="status" aria-live="polite"></p></section>
<section class="curso-final"><h2>¡Felicitaciones por tu esfuerzo!</h2><p>Has recorrido las seis lecciones. Puedes repasarlas cuando lo necesites.</p><a href="mis-cursos.php" class="btn-primary">Volver a mis cursos</a></section>
</main><footer><p>PICT - Plataforma Inclusiva de Capacitación Tecnológica</p></footer>
<script>
function escucharTexto(texto) {
    if (!("speechSynthesis" in window)) {
        alert("Tu navegador no permite lectura en voz alta.");
        return;
    }
    window.speechSynthesis.cancel();
    const mensaje = new SpeechSynthesisUtterance(texto);
    mensaje.lang = "es-CO";
    mensaje.rate = 0.9;
    window.speechSynthesis.speak(mensaje);
}
function escucharLeccion(boton) {
    const seccion = boton.closest(".leccion");
    if (!seccion) return;
    const copia = seccion.cloneNode(true);
    copia.querySelectorAll("button, input, textarea, script").forEach(e => e.remove());
    escucharTexto(copia.textContent.trim());
}
const evaluacion = document.getElementById("evaluacion-curso");
if (evaluacion) {
    evaluacion.addEventListener("submit", function(evento) {
        evento.preventDefault();
        const correctas = JSON.parse(this.dataset.respuestas);
        let aciertos = 0;
        let respondidas = 0;
        correctas.forEach((respuesta, i) => {
            const seleccion = this.querySelector('input[name="p' + (i + 1) + '"]:checked');
            if (seleccion) {
                respondidas++;
                if (Number(seleccion.value) === respuesta) aciertos++;
            }
        });
        const resultado = document.getElementById("resultado-actividad");
        if (respondidas !== correctas.length) {
            resultado.textContent = "Responde todas las preguntas antes de comprobar.";
        } else {
            resultado.textContent = "Obtuviste " + aciertos + " respuestas correctas de " + correctas.length + ". " + (aciertos === correctas.length ? "¡Excelente trabajo!" : "Puedes repasar las lecciones e intentarlo nuevamente.");
        }
    });
}
</script>
<!-- Botón de accesibilidad PICT -->
<div class="pict-accesibilidad">
  <button id="btn-accesibilidad" type="button" aria-label="Abrir opciones de accesibilidad" aria-expanded="false" aria-controls="menu-accesibilidad">♿</button>
  <div id="menu-accesibilidad" hidden>
    <h2>Accesibilidad</h2>
    <button type="button" id="aumentar-texto">A+ Aumentar texto</button>
    <button type="button" id="disminuir-texto">A- Disminuir texto</button>
    <button type="button" id="alto-contraste">Alto contraste</button>
    <button type="button" id="leer-pagina">🔊 Leer página</button>
    <button type="button" id="detener-lectura">Detener lectura</button>
    <button type="button" id="restablecer-accesibilidad">Restablecer</button>
  </div>
</div>
<script src="accesibilidad.js" defer></script>
</body></html>