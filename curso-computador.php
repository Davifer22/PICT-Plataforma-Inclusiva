
<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.html");
    exit;
}

require_once "conexion.php";

// Verificar inscripción en el curso 1
$consulta = $conexion->prepare(
    "SELECT COUNT(*)
     FROM inscripciones
     WHERE id_usuario = :usuario
     AND id_curso = :curso"
);

$consulta->execute([
    ":usuario" => $_SESSION["id_usuario"],
    ":curso" => 1
]);

if ((int) $consulta->fetchColumn() === 0) {
    http_response_code(403);
    exit(
        "No estás inscrito en este curso. " .
        "Primero debes inscribirte desde Explorar cursos."
    );
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Mi primer computador | PICT</title>

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
            <a href="mis-cursos.php">Volver a mis cursos</a>
        </nav>

    </div>
</header>

<main class="contenido-curso">

    <section class="curso-intro">
        <h1>Mi primer computador</h1>

        <p>
            Bienvenido a tu espacio de aprendizaje.
            En este curso conocerás las partes básicas
            del computador y aprenderás a utilizarlo
            mediante explicaciones sencillas y
            actividades prácticas.
        </p>

        <p><strong>Nivel:</strong> Inicial</p>
        <p><strong>Lecciones:</strong> 6</p>

        <button class="btn-primary" type="button"
            onclick="escucharTexto(
                'Bienvenido al curso Mi primer computador. Aprenderás qué es un computador, cuáles son sus partes, cómo encenderlo y apagarlo, cómo utilizar el mouse y cómo escribir con el teclado.'
            )">
            🔊 Escuchar presentación
        </button>
    </section>

    <!-- LECCIÓN 1 -->
    <section class="leccion">
        <h2>Lección 1. ¿Qué es un computador?</h2>

        <h3>Objetivo de aprendizaje</h3>
        <p>
            Comprender qué es un computador, para qué
            sirve y cómo puede ayudarnos en nuestras
            actividades diarias.
        </p>

        <h3>1. Conociendo el computador</h3>
        <p>
            Un computador es un dispositivo electrónico
            que recibe, procesa, almacena y muestra
            información.
        </p>

        <p>
            Podemos utilizarlo para escribir documentos,
            estudiar, trabajar, comunicarnos, escuchar
            música, ver videos y buscar información.
        </p>

        <h3>2. ¿Para qué sirve?</h3>

        <ul>
            <li>
                <strong>Estudiar:</strong>
                realizar tareas y participar en cursos.
            </li>
            <li>
                <strong>Trabajar:</strong>
                escribir documentos y organizar datos.
            </li>
            <li>
                <strong>Comunicarse:</strong>
                enviar mensajes y realizar videollamadas.
            </li>
            <li>
                <strong>Entretenimiento:</strong>
                escuchar música, ver videos y jugar.
            </li>
        </ul>

        <h3>3. Tipos de computadores</h3>

        <p>
            <strong>Computador de escritorio:</strong>
            normalmente permanece en un lugar fijo
            y puede tener monitor, teclado y mouse
            separados.
        </p>

        <p>
            <strong>Computador portátil:</strong>
            integra pantalla, teclado y otros
            componentes en un equipo que podemos
            transportar.
        </p>

        <h3>4. Ejemplo cotidiano</h3>

        <p>
            Imagina que necesitas escribir una carta.
            Puedes utilizar un computador para
            redactarla, corregir errores, guardarla
            y enviarla por correo electrónico.
        </p>

        <h3>5. Actividad práctica</h3>

        <p>
            Piensa en tres actividades que te gustaría
            aprender a realizar con un computador.
        </p>

        <button class="btn-primary" type="button"
            onclick="escucharLeccion(this)">
            🔊 Escuchar lección completa
        </button>
    </section>

    <!-- LECCIÓN 2 -->
    <section class="leccion">
        <h2>Lección 2. Partes principales del computador</h2>

        <h3>Objetivo de aprendizaje</h3>
        <p>
            Identificar las partes principales del
            computador y reconocer sus funciones.
        </p>

        <h3>1. Monitor</h3>

        <p>
            El monitor es la pantalla donde podemos
            observar textos, imágenes, videos,
            programas y documentos.
        </p>

        <p>
            Por ejemplo, cuando escribimos una carta,
            el monitor nos permite ver las palabras
            que estamos escribiendo.
        </p>

        <h3>2. Teclado</h3>

        <p>
            El teclado contiene letras, números,
            símbolos y teclas especiales que
            utilizamos para escribir y dar
            instrucciones al computador.
        </p>

        <h3>3. Mouse o ratón</h3>

        <p>
            El mouse permite mover el puntero
            que aparece en la pantalla.
            También sirve para seleccionar,
            abrir y desplazar elementos.
        </p>

        <h3>4. Torre o unidad central</h3>

        <p>
            En muchos computadores de escritorio
            existe una torre que contiene componentes
            internos importantes, como el procesador,
            la memoria y el almacenamiento.
        </p>

        <p>
            Algunos computadores integran estos
            componentes detrás del monitor.
        </p>

        <h3>5. Otros dispositivos</h3>

        <ul>
            <li>
                <strong>Parlantes:</strong>
                permiten escuchar sonidos.
            </li>
            <li>
                <strong>Micrófono:</strong>
                permite grabar nuestra voz.
            </li>
            <li>
                <strong>Cámara:</strong>
                permite participar en videollamadas.
            </li>
            <li>
                <strong>Impresora:</strong>
                permite imprimir documentos.
            </li>
        </ul>

        <h3>6. Actividad práctica</h3>

        <p>
            Observa un computador e identifica
            el monitor, el teclado y el mouse.
            Después explica para qué sirve cada uno.
        </p>

        <button class="btn-primary" type="button"
            onclick="escucharLeccion(this)">
            🔊 Escuchar lección completa
        </button>
    </section>

    <!-- LECCIÓN 3 -->
    <section class="leccion">
        <h2>
            Lección 3. ¿Cómo comenzar a utilizar
            el computador?
        </h2>

        <h3>Objetivo de aprendizaje</h3>

        <p>
            Aprender a preparar el espacio de trabajo
            e identificar los primeros pasos para
            utilizar un computador.
        </p>

        <h3>1. Preparar el espacio</h3>

        <p>
            Antes de utilizar un computador debemos
            buscar un lugar cómodo, iluminado
            y seguro.
        </p>

        <ul>
            <li>Utiliza una mesa estable.</li>
            <li>Siéntate de manera cómoda.</li>
            <li>Mantén la pantalla frente a ti.</li>
            <li>Evita colocar líquidos cerca del equipo.</li>
            <li>Procura mantener las manos limpias y secas.</li>
        </ul>

        <h3>2. Reconocer los dispositivos</h3>

        <p>
            Identifica el monitor, el teclado,
            el mouse y el botón de encendido.
        </p>

        <h3>3. Primeros pasos</h3>

        <ol>
            <li>Ubícate frente al computador.</li>
            <li>Identifica sus partes principales.</li>
            <li>Comprueba que esté conectado de forma segura.</li>
            <li>Enciende el equipo.</li>
            <li>Espera a que aparezca la pantalla principal.</li>
        </ol>

        <h3>4. ¿Qué es el escritorio?</h3>

        <p>
            El escritorio es una de las pantallas
            principales que podemos encontrar
            después de iniciar el sistema operativo.
        </p>

        <p>
            Allí podemos observar iconos, ventanas,
            accesos a programas y una barra de tareas,
            dependiendo del sistema utilizado.
        </p>

        <h3>5. Ejemplo cotidiano</h3>

        <p>
            Si deseas escribir un documento,
            primero enciendes el computador,
            esperas a que inicie y después
            abres un programa de escritura.
        </p>

        <h3>6. Actividad práctica</h3>

        <p>
            Practica sentarte correctamente,
            identificar los dispositivos
            y reconocer el escritorio del equipo.
        </p>

        <button class="btn-primary" type="button"
            onclick="escucharLeccion(this)">
            🔊 Escuchar lección completa
        </button>
    </section>

    <!-- LECCIÓN 4 -->
    <section class="leccion">
        <h2>
            Lección 4. ¿Cómo encender y apagar
            el computador?
        </h2>

        <h3>Objetivo de aprendizaje</h3>

        <p>
            Aprender a encender y apagar
            correctamente un computador
            para utilizarlo de manera segura.
        </p>

        <h3>1. ¿Cómo encenderlo?</h3>

        <ol>
            <li>Localiza el botón de encendido.</li>
            <li>Presiónalo una sola vez.</li>
            <li>Espera mientras inicia el sistema.</li>
            <li>Si aparece una pantalla de acceso, inicia sesión.</li>
            <li>Espera a que aparezca el escritorio.</li>
        </ol>

        <h3>2. ¿Cómo apagarlo?</h3>

        <p>
            En un computador con Windows,
            normalmente podemos seguir estos pasos:
        </p>

        <ol>
            <li>Guarda los documentos abiertos.</li>
            <li>Cierra los programas que no necesites.</li>
            <li>Abre el menú Inicio.</li>
            <li>Selecciona el botón de energía.</li>
            <li>Elige la opción Apagar.</li>
            <li>Espera hasta que termine el apagado.</li>
        </ol>

        <h3>3. ¿Por qué debemos apagarlo correctamente?</h3>

        <p>
            Apagar el equipo mediante las opciones
            del sistema ayuda a evitar la pérdida
            de información y permite que los
            programas terminen sus procesos.
        </p>

        <h3>4. Errores que debemos evitar</h3>

        <ul>
            <li>
                Desconectar el computador mientras
                está trabajando.
            </li>
            <li>
                Apagarlo sin guardar los documentos.
            </li>
            <li>
                Presionar repetidamente el botón
                de encendido sin necesidad.
            </li>
        </ul>

        <h3>5. Actividad práctica</h3>

        <p>
            Con acompañamiento si lo necesitas,
            practica encender el computador,
            esperar a que inicie y apagarlo
            utilizando el menú del sistema.
        </p>

        <button class="btn-primary" type="button"
            onclick="escucharLeccion(this)">
            🔊 Escuchar lección completa
        </button>
    </section>

    <!-- LECCIÓN 5 -->
    <section class="leccion">
        <h2>Lección 5. ¿Cómo utilizar el mouse?</h2>

        <h3>Objetivo de aprendizaje</h3>

        <p>
            Reconocer las funciones principales
            del mouse y practicar movimientos
            básicos con el puntero.
        </p>

        <h3>1. ¿Qué es el mouse?</h3>

        <p>
            El mouse es un dispositivo que permite
            controlar el puntero de la pantalla
            mediante movimientos de la mano.
        </p>

        <h3>2. Clic izquierdo</h3>

        <p>
            Consiste en presionar una vez
            el botón principal del mouse.
            Generalmente permite seleccionar
            elementos o activar botones.
        </p>

        <h3>3. Doble clic</h3>

        <p>
            Consiste en presionar dos veces
            rápidamente el botón principal.
            En muchos escritorios permite
            abrir archivos o programas.
        </p>

        <h3>4. Clic derecho</h3>

        <p>
            Consiste en presionar el botón
            secundario del mouse.
            Normalmente muestra un menú
            con opciones adicionales.
        </p>

        <h3>5. Rueda de desplazamiento</h3>

        <p>
            Permite subir o bajar dentro
            de documentos y páginas web.
        </p>

        <h3>6. Arrastrar elementos</h3>

        <p>
            Para arrastrar un elemento,
            mantenemos presionado el botón
            principal mientras movemos el mouse.
            Después soltamos el botón.
        </p>

        <h3>7. Actividad práctica</h3>

        <ol>
            <li>Mueve el puntero por la pantalla.</li>
            <li>Selecciona un icono con un clic.</li>
            <li>Practica el doble clic.</li>
            <li>Desplázate por una página con la rueda.</li>
            <li>Practica arrastrar un elemento cuando sea seguro hacerlo.</li>
        </ol>

        <p>
            Si utilizas otro dispositivo de entrada,
            como un panel táctil, puedes practicar
            las acciones equivalentes.
        </p>

        <button class="btn-primary" type="button"
            onclick="escucharLeccion(this)">
            🔊 Escuchar lección completa
        </button>
    </section>

    <!-- LECCIÓN 6 -->
    <section class="leccion">
        <h2>Lección 6. ¿Cómo escribir con el teclado?</h2>

        <h3>Objetivo de aprendizaje</h3>

        <p>
            Identificar las teclas principales
            y realizar ejercicios básicos
            de escritura.
        </p>

        <h3>1. ¿Qué es el teclado?</h3>

        <p>
            El teclado es un dispositivo
            que contiene teclas para introducir
            letras, números, símbolos
            y diferentes instrucciones.
        </p>

        <h3>2. Letras y números</h3>

        <p>
            Las teclas de letras permiten
            escribir palabras y oraciones.
            Las teclas numéricas permiten
            escribir cantidades.
        </p>

        <h3>3. Barra espaciadora</h3>

        <p>
            Es una tecla larga que normalmente
            se encuentra en la parte inferior.
            Sirve para separar palabras.
        </p>

        <h3>4. Tecla Enter</h3>

        <p>
            Permite confirmar algunas acciones
            y crear nuevas líneas
            en muchos programas de escritura.
        </p>

        <h3>5. Tecla Retroceso</h3>

        <p>
            Permite borrar el carácter
            que se encuentra antes del cursor.
        </p>

        <h3>6. Tecla Shift</h3>

        <p>
            Permite escribir letras mayúsculas
            mientras la mantenemos presionada
            junto con una letra.
        </p>

        <h3>7. Tecla Bloq Mayús</h3>

        <p>
            Permite activar o desactivar
            la escritura de letras mayúsculas.
        </p>

        <h3>8. Actividad de escritura</h3>

        <p>
            Escribe tu nombre y una oración
            sencilla en el siguiente espacio.
            Puedes practicar con el teclado.
        </p>

        <label for="practica-teclado">
            Mi práctica de escritura:
        </label>

        <textarea
            id="practica-teclado"
            rows="5"
            style="display:block; width:100%;
                   max-width:600px; padding:12px;
                   margin:12px 0; font:inherit;"
            placeholder="Escribe aquí tu nombre y una oración...">
        </textarea>

        <p>
            Ejemplo: Me llamo Ana.
            Estoy aprendiendo a utilizar
            un computador.
        </p>

        <p>
            Esta práctica no se guarda
            en la base de datos.
        </p>

        <button class="btn-primary" type="button"
            onclick="escucharLeccion(this)">
            🔊 Escuchar lección completa
        </button>
    </section>

    <!-- EVALUACIÓN FINAL -->
    <section class="leccion actividad"
             aria-labelledby="titulo-evaluacion">

        <h2 id="titulo-evaluacion">
            Evaluación final
        </h2>

        <p>
            Responde las siguientes preguntas
            para comprobar lo que aprendiste.
        </p>

        <form id="evaluacion-curso">

            <fieldset>
                <legend>
                    1. ¿Qué dispositivo utilizamos
                    principalmente para escribir?
                </legend>

                <label>
                    <input type="radio" name="p1" value="monitor">
                    Monitor
                </label>

                <label>
                    <input type="radio" name="p1" value="teclado">
                    Teclado
                </label>

                <label>
                    <input type="radio" name="p1" value="mouse">
                    Mouse
                </label>
            </fieldset>

            <fieldset>
                <legend>
                    2. ¿Qué parte permite observar
                    imágenes y textos?
                </legend>

                <label>
                    <input type="radio" name="p2" value="teclado">
                    Teclado
                </label>

                <label>
                    <input type="radio" name="p2" value="monitor">
                    Monitor
                </label>

                <label>
                    <input type="radio" name="p2" value="parlantes">
                    Parlantes
                </label>
            </fieldset>

            <fieldset>
                <legend>
                    3. ¿Qué debemos hacer antes
                    de apagar el computador?
                </legend>

                <label>
                    <input type="radio" name="p3" value="desconectar">
                    Desconectarlo inmediatamente
                </label>

                <label>
                    <input type="radio" name="p3" value="guardar">
                    Guardar los documentos
                </label>

                <label>
                    <input type="radio" name="p3" value="reiniciar">
                    Reiniciarlo varias veces
                </label>
            </fieldset>

            <fieldset>
                <legend>
                    4. ¿Qué acción permite abrir
                    algunos programas del escritorio?
                </legend>

                <label>
                    <input type="radio" name="p4" value="doble">
                    Doble clic
                </label>

                <label>
                    <input type="radio" name="p4" value="rueda">
                    Mover la rueda
                </label>

                <label>
                    <input type="radio" name="p4" value="apagar">
                    Apagar el equipo
                </label>
            </fieldset>

            <fieldset>
                <legend>
                    5. ¿Qué tecla permite separar palabras?
                </legend>

                <label>
                    <input type="radio" name="p5" value="enter">
                    Enter
                </label>

                <label>
                    <input type="radio" name="p5" value="espacio">
                    Barra espaciadora
                </label>

                <label>
                    <input type="radio" name="p5" value="retroceso">
                    Retroceso
                </label>
            </fieldset>

            <button type="submit" class="btn-primary">
                Comprobar respuestas
            </button>

        </form>

        <p id="resultado-actividad"
           role="status"
           aria-live="polite"></p>
    </section>

    <section class="curso-final">
        <h2>¡Felicitaciones por tu esfuerzo!</h2>

        <p>
            Has recorrido las seis lecciones
            de Mi primer computador.
            Puedes volver a repasarlas
            cuando lo necesites.
        </p>

        <a href="mis-cursos.php" class="btn-primary">
            Volver a mis cursos
        </a>
    </section>

</main>

<footer>
    <p>
        PICT - Plataforma Inclusiva
        de Capacitación Tecnológica
    </p>
</footer>

<script>
function escucharTexto(texto) {
    if (!("speechSynthesis" in window)) {
        alert("Tu navegador no permite reproducir audio.");
        return;
    }

    window.speechSynthesis.cancel();

    const mensaje = new SpeechSynthesisUtterance(texto);
    mensaje.lang = "es-CO";
    mensaje.rate = 0.9;

    window.speechSynthesis.speak(mensaje);
}

// Leer el texto completo de una lección
function escucharLeccion(boton) {
    const leccion = boton.closest(".leccion");

    if (!leccion) return;

    const copia = leccion.cloneNode(true);

    copia.querySelectorAll(
        "button, textarea, input, script"
    ).forEach(elemento => elemento.remove());

    escucharTexto(copia.textContent.trim());
}

// Comprobar las cinco respuestas
document.getElementById("evaluacion-curso")
    .addEventListener("submit", function(evento) {

        evento.preventDefault();

        const respuestas = {
            p1: "teclado",
            p2: "monitor",
            p3: "guardar",
            p4: "doble",
            p5: "espacio"
        };

        let correctas = 0;
        let respondidas = 0;

        for (const pregunta in respuestas) {
            const seleccion = document.querySelector(
                'input[name="' + pregunta + '"]:checked'
            );

            if (seleccion) {
                respondidas++;

                if (seleccion.value === respuestas[pregunta]) {
                    correctas++;
                }
            }
        }

        const resultado = document.getElementById(
            "resultado-actividad"
        );

        if (respondidas < 5) {
            resultado.textContent =
                "Responde las cinco preguntas antes de comprobar.";
            return;
        }

        resultado.textContent =
            "Obtuviste " + correctas +
            " respuestas correctas de 5. " +
            (correctas === 5
                ? "¡Excelente trabajo!"
                : "Puedes repasar las lecciones e intentarlo nuevamente.");
    });
</script>

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
