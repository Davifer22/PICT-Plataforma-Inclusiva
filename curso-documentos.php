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
    ":curso" => 4
]);
if ((int) $consulta->fetchColumn() === 0) {
    http_response_code(403);
    exit("No estás inscrito en este curso. Inscríbete desde Explorar cursos.");
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Aprendo a crear documentos | PICT</title><link rel="stylesheet" href="style.css">
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
<section class="curso-intro"><h1>Aprendo a crear documentos</h1><p>Aprende a escribir, corregir, organizar y guardar textos digitales.</p><p><strong>Nivel:</strong> Inicial</p><p><strong>Lecciones:</strong> 6</p><button type="button" class="btn-primary" onclick="escucharTexto(this.parentElement.querySelector('p').textContent)">🔊 Escuchar presentación</button></section>


<!-- ===================================== -->
<!-- LECCIÓN 1: CONOZCO LOS DOCUMENTOS DIGITALES -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 1 de 6 — Posición en el recorrido: 17 %
    </p>

    <h2>Lección 1. Conozco los documentos digitales</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Comprender qué es un documento y para qué sirve.</p>

    <h3>1. ¿Qué es un documento digital?</h3>
    <p>Es un archivo que contiene información, como cartas, tareas, listas o solicitudes.</p>

    <h3>2. Programas de escritura</h3>
    <p>Herramientas como Word o LibreOffice Writer permiten crear y editar documentos.</p>

    <h3>3. Partes de un documento</h3>
    <p>Puede incluir un título, párrafos, listas e imágenes.</p>

    <h3>4. Ejemplo cotidiano</h3>
    <p>Puedes escribir una carta para solicitar información sobre un servicio.</p>

    <h3>Actividad práctica</h3>
    <p>Piensa en un documento que necesites crear y escribe su propósito.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 2: ESCRIBO MI PRIMER TEXTO -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 2 de 6 — Posición en el recorrido: 33 %
    </p>

    <h2>Lección 2. Escribo mi primer texto</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Practicar la escritura de títulos y oraciones.</p>

    <h3>1. Abrir un documento nuevo</h3>
    <p>En el programa de escritura, elige crear un documento en blanco.</p>

    <h3>2. Escribir un título</h3>
    <p>Coloca un nombre breve que explique el tema.</p>

    <h3>3. Crear párrafos</h3>
    <p>Escribe una idea y utiliza Enter para iniciar otro párrafo.</p>

    <h3>4. Revisar</h3>
    <p>Lee despacio para detectar palabras incompletas o repetidas.</p>

    <h3>Actividad práctica</h3>
    <p>Escribe un título y dos oraciones sobre una actividad que te guste.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 3: CORRIJO Y EDITO MI DOCUMENTO -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 3 de 6 — Posición en el recorrido: 50 %
    </p>

    <h2>Lección 3. Corrijo y edito mi documento</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Aprender a seleccionar, borrar y cambiar palabras.</p>

    <h3>1. Seleccionar texto</h3>
    <p>Con el mouse o el teclado puedes marcar una palabra o un párrafo.</p>

    <h3>2. Borrar</h3>
    <p>Retroceso elimina caracteres anteriores al cursor; Suprimir puede borrar lo seleccionado.</p>

    <h3>3. Copiar y pegar</h3>
    <p>Permiten duplicar texto en otra parte del documento.</p>

    <h3>4. Deshacer</h3>
    <p>La opción Deshacer permite revertir muchos cambios recientes.</p>

    <h3>Actividad práctica</h3>
    <p>Escribe una oración, corrige una palabra y practica deshacer un cambio.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 4: DOY FORMATO AL TEXTO -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 4 de 6 — Posición en el recorrido: 67 %
    </p>

    <h2>Lección 4. Doy formato al texto</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Reconocer opciones básicas para organizar la lectura.</p>

    <h3>1. Títulos y subtítulos</h3>
    <p>Ayudan a dividir el documento en partes comprensibles.</p>

    <h3>2. Negrita</h3>
    <p>Sirve para destacar palabras importantes sin usarla en exceso.</p>

    <h3>3. Tamaño y alineación</h3>
    <p>Puedes ajustar la presentación para facilitar la lectura.</p>

    <h3>4. Listas</h3>
    <p>Organizan pasos o elementos y hacen más claro el contenido.</p>

    <h3>Actividad práctica</h3>
    <p>Crea un título y una lista de tres elementos con formato sencillo.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 5: GUARDO Y ENCUENTRO MIS DOCUMENTOS -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 5 de 6 — Posición en el recorrido: 83 %
    </p>

    <h2>Lección 5. Guardo y encuentro mis documentos</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Aprender a guardar, nombrar y volver a abrir archivos.</p>

    <h3>1. Guardar por primera vez</h3>
    <p>Elige Guardar, selecciona una carpeta y escribe un nombre claro.</p>

    <h3>2. Guardar cambios</h3>
    <p>Después de editar, guarda nuevamente para conservar lo que hiciste.</p>

    <h3>3. Formatos</h3>
    <p>DOCX suele permitir edición; PDF suele usarse para compartir una versión de lectura.</p>

    <h3>4. Ubicación</h3>
    <p>Recuerda la carpeta elegida para poder encontrar el documento después.</p>

    <h3>Actividad práctica</h3>
    <p>Guarda un documento llamado Mi_practica y vuelve a abrirlo.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 6: CREO UN DOCUMENTO COMPLETO -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 6 de 6 — Posición en el recorrido: 100 %
    </p>

    <h2>Lección 6. Creo un documento completo</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Integrar escritura, formato y guardado.</p>

    <h3>1. Planear</h3>
    <p>Decide qué deseas comunicar antes de comenzar.</p>

    <h3>2. Redactar</h3>
    <p>Escribe un título, un saludo si corresponde y varios párrafos breves.</p>

    <h3>3. Revisar</h3>
    <p>Comprueba que las ideas sean claras y que no falten palabras.</p>

    <h3>4. Guardar y compartir</h3>
    <p>Guarda el archivo en una carpeta conocida. Comparte solo cuando estés seguro de su contenido.</p>

    <h3>Actividad práctica</h3>
    <p>Crea una carta corta de agradecimiento, revísala y guárdala en tu carpeta de prácticas.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>

<section class="leccion actividad"><h2>Evaluación final</h2><p>Selecciona una respuesta por pregunta y comprueba lo aprendido.</p><form id="evaluacion-curso" data-respuestas="[0, 1, 2, 0, 1]">
<fieldset><legend>1. ¿Para qué sirve un documento digital?</legend>
<label><input type="radio" name="p1" value="0"> Escribir y guardar información</label>
<label><input type="radio" name="p1" value="1"> Encender el equipo</label>
<label><input type="radio" name="p1" value="2"> Mover el mouse</label>
</fieldset>
<fieldset><legend>2. ¿Qué permite corregir un error reciente?</legend>
<label><input type="radio" name="p2" value="0"> Desconectar el teclado</label>
<label><input type="radio" name="p2" value="1"> Deshacer</label>
<label><input type="radio" name="p2" value="2"> Cerrar sin guardar</label>
</fieldset>
<fieldset><legend>3. ¿Qué ayuda a organizar los pasos de una tarea?</legend>
<label><input type="radio" name="p3" value="0"> Una contraseña</label>
<label><input type="radio" name="p3" value="1"> Un cable</label>
<label><input type="radio" name="p3" value="2"> Una lista</label>
</fieldset>
<fieldset><legend>4. ¿Qué nombre es más fácil de reconocer?</legend>
<label><input type="radio" name="p4" value="0"> Carta_familia.docx</label>
<label><input type="radio" name="p4" value="1"> archivo123456</label>
<label><input type="radio" name="p4" value="2"> sin_nombre</label>
</fieldset>
<fieldset><legend>5. ¿Qué haces después de editar un documento?</legend>
<label><input type="radio" name="p5" value="0"> Borras todo</label>
<label><input type="radio" name="p5" value="1"> Guardas los cambios</label>
<label><input type="radio" name="p5" value="2"> Apagas sin revisar</label>
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