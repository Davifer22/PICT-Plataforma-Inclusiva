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
    ":curso" => 3
]);
if ((int) $consulta->fetchColumn() === 0) {
    http_response_code(403);
    exit("No estás inscrito en este curso. Inscríbete desde Explorar cursos.");
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mis primeros pasos en Internet | PICT</title><link rel="stylesheet" href="style.css">
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
<section class="curso-intro"><h1>Mis primeros pasos en Internet</h1><p>Aprende a navegar, buscar información y reconocer sitios web.</p><p><strong>Nivel:</strong> Inicial</p><p><strong>Lecciones:</strong> 6</p><button type="button" class="btn-primary" onclick="escucharTexto(this.parentElement.querySelector('p').textContent)">🔊 Escuchar presentación</button></section>
<section class="leccion"><h2>Lección 1. ¿Qué es Internet?</h2><h3>Objetivo de aprendizaje</h3><p>Comprender qué es Internet y para qué se utiliza.</p>
<h3>1. Conociendo Internet</h3><p>Es una red mundial que conecta dispositivos y permite intercambiar información.</p>
<h3>2. Usos cotidianos</h3><p>Sirve para estudiar, comunicarse, consultar servicios y encontrar información.</p>
<h3>3. Conexión</h3><p>Puedes conectarte mediante Wi-Fi o una conexión de datos. No todas las redes tienen la misma velocidad.</p>
<h3>4. Ejemplo</h3><p>Una persona puede consultar una receta, leer noticias o participar en una clase virtual.</p>
<h3>Actividad práctica</h3><p>Menciona tres actividades que te gustaría hacer usando Internet.</p><button type="button" class="btn-primary" onclick="escucharLeccion(this)">🔊 Escuchar lección completa</button></section>
<section class="leccion"><h2>Lección 2. Conozco el navegador</h2><h3>Objetivo de aprendizaje</h3><p>Identificar el navegador y sus herramientas principales.</p>
<h3>1. ¿Qué es un navegador?</h3><p>Es un programa para visitar páginas web, como Chrome, Edge o Firefox.</p>
<h3>2. Barra de direcciones</h3><p>Allí puedes escribir una dirección web o una búsqueda.</p>
<h3>3. Pestañas</h3><p>Permiten mantener varias páginas abiertas y cambiar entre ellas.</p>
<h3>4. Atrás y adelante</h3><p>Ayudan a regresar a páginas visitadas o avanzar de nuevo.</p>
<h3>Actividad práctica</h3><p>Abre un navegador e identifica la barra de direcciones y las pestañas.</p><button type="button" class="btn-primary" onclick="escucharLeccion(this)">🔊 Escuchar lección completa</button></section>
<section class="leccion"><h2>Lección 3. Busco información</h2><h3>Objetivo de aprendizaje</h3><p>Aprender a escribir búsquedas sencillas y revisar los resultados.</p>
<h3>1. Palabras clave</h3><p>Son palabras que describen lo que necesitas encontrar. Por ejemplo: partes del computador.</p>
<h3>2. Resultados</h3><p>El buscador muestra páginas relacionadas, pero no todas tienen información confiable.</p>
<h3>3. Mejorar una búsqueda</h3><p>Agrega detalles como lugar, fecha o tema para encontrar resultados más útiles.</p>
<h3>4. Ejemplo</h3><p>En lugar de escribir solo computador, busca cómo usar el teclado de un computador.</p>
<h3>Actividad práctica</h3><p>Escribe una búsqueda sobre un tema que te interese y observa los títulos de los resultados.</p><button type="button" class="btn-primary" onclick="escucharLeccion(this)">🔊 Escuchar lección completa</button></section>
<section class="leccion"><h2>Lección 4. Entiendo enlaces y páginas web</h2><h3>Objetivo de aprendizaje</h3><p>Reconocer enlaces, direcciones y elementos comunes de una página.</p>
<h3>1. Página web</h3><p>Es un espacio digital con texto, imágenes, enlaces y otras herramientas.</p>
<h3>2. Enlace</h3><p>Es un texto, imagen o botón que permite ir a otra página o sección.</p>
<h3>3. Dirección web</h3><p>Identifica la ubicación de un sitio. Conviene revisar su escritura antes de abrirlo.</p>
<h3>4. Navegación</h3><p>Utiliza los menús y botones Atrás para orientarte sin perderte.</p>
<h3>Actividad práctica</h3><p>Visita un sitio conocido, identifica un enlace y utiliza el botón Atrás.</p><button type="button" class="btn-primary" onclick="escucharLeccion(this)">🔊 Escuchar lección completa</button></section>
<section class="leccion"><h2>Lección 5. Reconozco información confiable</h2><h3>Objetivo de aprendizaje</h3><p>Desarrollar hábitos básicos para revisar lo que encuentro.</p>
<h3>1. Revisar el origen</h3><p>Busca quién publica la información y si se trata de una entidad conocida.</p>
<h3>2. Comparar fuentes</h3><p>Consulta más de una fuente antes de confiar en datos importantes.</p>
<h3>3. Fecha y contexto</h3><p>Comprueba si la información está actualizada y corresponde a lo que necesitas.</p>
<h3>4. Ejemplo</h3><p>Para un trámite, es preferible consultar la página oficial de la entidad.</p>
<h3>Actividad práctica</h3><p>Busca información sobre un trámite y reconoce cuál es la página oficial.</p><button type="button" class="btn-primary" onclick="escucharLeccion(this)">🔊 Escuchar lección completa</button></section>
<section class="leccion"><h2>Lección 6. Practico una navegación segura</h2><h3>Objetivo de aprendizaje</h3><p>Aplicar lo aprendido al navegar por Internet.</p>
<h3>1. Antes de hacer clic</h3><p>Lee el texto del enlace y evita anuncios o mensajes engañosos.</p>
<h3>2. Datos personales</h3><p>No compartas contraseñas ni información privada en páginas desconocidas.</p>
<h3>3. Descargas</h3><p>Evita descargar archivos inesperados y pide ayuda si tienes dudas.</p>
<h3>4. Repaso</h3><p>Abre el navegador, realiza una búsqueda, revisa una fuente y vuelve al inicio.</p>
<h3>Actividad práctica</h3><p>Haz una búsqueda sencilla, visita una fuente confiable y explica por qué la elegiste.</p><button type="button" class="btn-primary" onclick="escucharLeccion(this)">🔊 Escuchar lección completa</button></section>
<section class="leccion actividad"><h2>Evaluación final</h2><p>Selecciona una respuesta por pregunta y comprueba lo aprendido.</p><form id="evaluacion-curso" data-respuestas="[0, 1, 2, 0, 1]">
<fieldset><legend>1. ¿Qué programa permite visitar páginas web?</legend>
<label><input type="radio" name="p1" value="0"> Navegador</label>
<label><input type="radio" name="p1" value="1"> Calculadora</label>
<label><input type="radio" name="p1" value="2"> Reproductor de música</label>
</fieldset>
<fieldset><legend>2. ¿Para qué sirven las pestañas?</legend>
<label><input type="radio" name="p2" value="0"> Apagar Internet</label>
<label><input type="radio" name="p2" value="1"> Abrir varias páginas</label>
<label><input type="radio" name="p2" value="2"> Borrar archivos</label>
</fieldset>
<fieldset><legend>3. ¿Qué mejora una búsqueda?</legend>
<label><input type="radio" name="p3" value="0"> Escribir sin pensar</label>
<label><input type="radio" name="p3" value="1"> Usar solo una letra</label>
<label><input type="radio" name="p3" value="2"> Añadir palabras clave</label>
</fieldset>
<fieldset><legend>4. ¿Qué conviene revisar en un sitio web?</legend>
<label><input type="radio" name="p4" value="0"> Quién publica la información</label>
<label><input type="radio" name="p4" value="1"> El color del mouse</label>
<label><input type="radio" name="p4" value="2"> El tamaño del escritorio</label>
</fieldset>
<fieldset><legend>5. ¿Qué haces ante un enlace sospechoso?</legend>
<label><input type="radio" name="p5" value="0"> Abrirlo de inmediato</label>
<label><input type="radio" name="p5" value="1"> Evitarlo y verificar su origen</label>
<label><input type="radio" name="p5" value="2"> Compartir tu contraseña</label>
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