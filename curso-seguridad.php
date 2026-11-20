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
    ":curso" => 5
]);
if ((int) $consulta->fetchColumn() === 0) {
    http_response_code(403);
    exit("No estás inscrito en este curso. Inscríbete desde Explorar cursos.");
}
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Me cuido en Internet | PICT</title><link rel="stylesheet" href="style.css">
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
<section class="curso-intro"><h1>Me cuido en Internet</h1><p>Aprende hábitos sencillos para proteger tu información y reconocer riesgos digitales.</p><p><strong>Nivel:</strong> Inicial</p><p><strong>Lecciones:</strong> 6</p><button type="button" class="btn-primary" onclick="escucharTexto(this.parentElement.querySelector('p').textContent)">🔊 Escuchar presentación</button></section>


<!-- ===================================== -->
<!-- LECCIÓN 1: PROTEJO MIS DATOS PERSONALES -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 1 de 6 — Posición en el recorrido: 17 %
    </p>

    <h2>Lección 1. Protejo mis datos personales</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Reconocer qué información debe compartirse con cuidado.</p>

    <h3>1. Datos personales</h3>
    <p>Son datos que pueden identificarte, como tu nombre completo, dirección o número de documento.</p>

    <h3>2. Información sensible</h3>
    <p>Contraseñas, códigos de verificación y datos bancarios requieren especial cuidado.</p>

    <h3>3. Antes de compartir</h3>
    <p>Pregúntate quién solicita los datos, para qué los necesita y si el sitio es confiable.</p>

    <h3>4. Ejemplo</h3>
    <p>Un desconocido que escribe por chat no necesita conocer tus claves de acceso.</p>

    <h3>Actividad práctica</h3>
    <p>Menciona tres datos que no compartirías con personas desconocidas.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 2: CREO CONTRASEÑAS SEGURAS -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 2 de 6 — Posición en el recorrido: 33 %
    </p>

    <h2>Lección 2. Creo contraseñas seguras</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Comprender cómo proteger las cuentas digitales.</p>

    <h3>1. Contraseña</h3>
    <p>Es una clave que ayuda a impedir que otras personas entren a tu cuenta.</p>

    <h3>2. Contraseñas largas</h3>
    <p>Una frase larga y única suele ser más resistente que una palabra corta.</p>

    <h3>3. Una por cuenta</h3>
    <p>Evita utilizar la misma contraseña en todos tus servicios.</p>

    <h3>4. Verificación adicional</h3>
    <p>Cuando esté disponible, activa un segundo factor de autenticación.</p>

    <h3>Actividad práctica</h3>
    <p>Piensa en una frase larga como ejemplo, pero no escribas ni compartas aquí una contraseña real.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 3: RECONOZCO MENSAJES SOSPECHOSOS -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 3 de 6 — Posición en el recorrido: 50 %
    </p>

    <h2>Lección 3. Reconozco mensajes sospechosos</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Aprender a identificar intentos de engaño.</p>

    <h3>1. Mensajes inesperados</h3>
    <p>Desconfía de premios, cobros urgentes o amenazas que no esperabas.</p>

    <h3>2. Enlaces falsos</h3>
    <p>Algunos mensajes llevan a páginas que imitan sitios conocidos.</p>

    <h3>3. Archivos adjuntos</h3>
    <p>No abras archivos de remitentes desconocidos sin comprobar su origen.</p>

    <h3>4. Verificación</h3>
    <p>Entra a la página oficial escribiendo tú mismo su dirección o usando un canal confiable.</p>

    <h3>Actividad práctica</h3>
    <p>Imagina un mensaje que promete un premio a cambio de tu contraseña. Explica por qué no debes responder.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 4: NAVEGO Y DESCARGO CON CUIDADO -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 4 de 6 — Posición en el recorrido: 67 %
    </p>

    <h2>Lección 4. Navego y descargo con cuidado</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Aplicar medidas básicas al visitar sitios y descargar archivos.</p>

    <h3>1. Sitios conocidos</h3>
    <p>Revisa la dirección y evita páginas que imitan servicios oficiales.</p>

    <h3>2. HTTPS</h3>
    <p>El candado o HTTPS indica conexión cifrada, pero no garantiza que un sitio sea legítimo.</p>

    <h3>3. Descargas</h3>
    <p>Descarga programas desde fuentes oficiales y evita instaladores desconocidos.</p>

    <h3>4. Permisos</h3>
    <p>Antes de permitir acceso a cámara, micrófono o ubicación, revisa si es necesario.</p>

    <h3>Actividad práctica</h3>
    <p>Identifica la dirección de un sitio oficial y revisa qué permisos solicita.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 5: CUIDO MIS DISPOSITIVOS -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 5 de 6 — Posición en el recorrido: 83 %
    </p>

    <h2>Lección 5. Cuido mis dispositivos</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Adoptar hábitos para reducir riesgos.</p>

    <h3>1. Actualizaciones</h3>
    <p>Mantén el sistema y los programas actualizados cuando sea posible.</p>

    <h3>2. Bloqueo de pantalla</h3>
    <p>Utiliza un PIN, contraseña u otro método de bloqueo.</p>

    <h3>3. Copias de seguridad</h3>
    <p>Guarda copias de tus archivos importantes en un lugar seguro.</p>

    <h3>4. Redes compartidas</h3>
    <p>Evita acceder a cuentas sensibles desde dispositivos públicos si no es necesario.</p>

    <h3>Actividad práctica</h3>
    <p>Revisa si tu dispositivo tiene activado el bloqueo de pantalla.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<!-- ===================================== -->
<!-- LECCIÓN 6: SITUACIONES DE RIESGO -->
<!-- ===================================== -->
<section class="leccion">
    <p class="indicador-avance">
        Lección 6 de 6 — Posición en el recorrido: 100 %
    </p>

    <h2>Lección 6. Sé qué hacer ante una situación de riesgo</h2>

    <h3>Objetivo de aprendizaje</h3>
    <p>Reconocer pasos sencillos para responder con calma.</p>

    <h3>1. Si recibes un mensaje sospechoso</h3>
    <p>No abras enlaces ni compartas información. Verifica por un canal oficial.</p>

    <h3>2. Si compartiste una contraseña</h3>
    <p>Cámbiala desde el sitio oficial y cierra otras sesiones si la opción existe.</p>

    <h3>3. Si instalaste algo desconocido</h3>
    <p>Deja de utilizarlo y busca ayuda técnica confiable.</p>

    <h3>4. Pedir apoyo</h3>
    <p>Consulta a una persona de confianza o al soporte oficial antes de continuar.</p>

    <h3>Actividad práctica</h3>
    <p>Explica qué harías si alguien te pide por mensaje un código de verificación.</p>

    <button type="button" class="btn-primary" onclick="escucharLeccion(this)">
        🔊 Escuchar lección completa
    </button>
</section>


<section class="leccion actividad"><h2>Evaluación final</h2><p>Selecciona una respuesta por pregunta y comprueba lo aprendido.</p><form id="evaluacion-curso" data-respuestas="[1, 0, 2, 1, 0]">
<fieldset><legend>1. ¿Qué dato no debes compartir por chat con desconocidos?</legend>
<label><input type="radio" name="p1" value="0"> Tu color favorito</label>
<label><input type="radio" name="p1" value="1"> Tu contraseña</label>
<label><input type="radio" name="p1" value="2"> El nombre de una película</label>
</fieldset>
<fieldset><legend>2. ¿Cómo debe ser una buena contraseña?</legend>
<label><input type="radio" name="p2" value="0"> Larga y única</label>
<label><input type="radio" name="p2" value="1"> La misma en todas las cuentas</label>
<label><input type="radio" name="p2" value="2"> Solo 1234</label>
</fieldset>
<fieldset><legend>3. ¿Qué haces con un enlace sospechoso?</legend>
<label><input type="radio" name="p3" value="0"> Lo abres de inmediato</label>
<label><input type="radio" name="p3" value="1"> Lo reenvías</label>
<label><input type="radio" name="p3" value="2"> Verificas su origen sin abrirlo</label>
</fieldset>
<fieldset><legend>4. ¿HTTPS garantiza que un sitio es legítimo?</legend>
<label><input type="radio" name="p4" value="0"> Sí, siempre</label>
<label><input type="radio" name="p4" value="1"> No, solo indica conexión cifrada</label>
<label><input type="radio" name="p4" value="2"> Significa que no tiene anuncios</label>
</fieldset>
<fieldset><legend>5. ¿Qué haces si compartiste una contraseña?</legend>
<label><input type="radio" name="p5" value="0"> Cambiarla desde el sitio oficial</label>
<label><input type="radio" name="p5" value="1"> Esperar sin hacer nada</label>
<label><input type="radio" name="p5" value="2"> Compartirla con más personas</label>
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