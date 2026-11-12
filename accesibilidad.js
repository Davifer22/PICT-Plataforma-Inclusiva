
/* ==================================
   ACCESIBILIDAD PICT
================================== */

document.addEventListener("DOMContentLoaded", () => {

  const boton = document.getElementById("btn-accesibilidad");
  const menu = document.getElementById("menu-accesibilidad");

  if (!boton || !menu) return;

  let escala = 100;

  // Abrir y cerrar el menú
  boton.addEventListener("click", () => {
    const abrir = menu.hidden;

    menu.hidden = !abrir;
    boton.setAttribute("aria-expanded", String(abrir));

    if (abrir) {
      menu.querySelector("button")?.focus();
    }
  });

  // Aumentar o disminuir texto
  function cambiarTexto(cantidad) {
    escala = Math.max(80, Math.min(150, escala + cantidad));
    document.documentElement.style.fontSize = escala + "%";
  }

  document.getElementById("aumentar-texto")
    .addEventListener("click", () => cambiarTexto(10));

  document.getElementById("disminuir-texto")
    .addEventListener("click", () => cambiarTexto(-10));

  // Activar y desactivar alto contraste
  document.getElementById("alto-contraste")
    .addEventListener("click", () => {
      document.body.classList.toggle("pict-alto-contraste");
    });

  // Detener lectura
  function detenerLectura() {
    if ("speechSynthesis" in window) {
      window.speechSynthesis.cancel();
    }
  }

  // Leer el contenido de la página
  document.getElementById("leer-pagina")
    .addEventListener("click", () => {

      if (!("speechSynthesis" in window)) {
        alert("Este navegador no permite lectura en voz alta.");
        return;
      }

      detenerLectura();

      const contenido = document.querySelector("main") || document.body;
      const copia = contenido.cloneNode(true);

      copia.querySelectorAll(
        "script, style, nav, button, form, .pict-accesibilidad"
      ).forEach(elemento => elemento.remove());

      const texto = copia.textContent.trim();

      if (!texto) return;

      const voz = new SpeechSynthesisUtterance(texto);
      voz.lang = "es-CO";
      voz.rate = 0.9;

      window.speechSynthesis.speak(voz);
    });

  document.getElementById("detener-lectura")
    .addEventListener("click", detenerLectura);

  // Restablecer accesibilidad
  document.getElementById("restablecer-accesibilidad")
    .addEventListener("click", () => {

      escala = 100;
      document.documentElement.style.fontSize = "";
      document.body.classList.remove("pict-alto-contraste");

      detenerLectura();
    });

  // Cerrar menú con tecla Escape
  document.addEventListener("keydown", (evento) => {

    if (evento.key === "Escape" && !menu.hidden) {
      menu.hidden = true;
      boton.setAttribute("aria-expanded", "false");
      boton.focus();
    }

  });

});
