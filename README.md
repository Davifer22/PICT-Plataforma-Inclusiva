PICT Plataforma Inclusiva de Capacitación Tecnológica

Descripción del proyecto

PICT se consolida como un prototipo de sitio educativo web. Su objetivo principal es facilitar el acceso a formación tecnológica para personas con discapacidad ya sea visual o cognitiva.

La herramienta incluye funciones de registro usuarios, inicio sesión, exploración de cursos, inscripción y también consulta de materiales. Cuenta además con opciones de accesibilidad destinadas a que mejorar la experiencia de navegación lectura sea mas sencillo.

Este proyecto se desarrolla por parte del proceso académico en Ingeniería de Sistemas dentro de la Universidad Nacional Abierta y a Distancia UNAD.

1 Tecnologías utilizadas

HTML5 estructura de paginas y contenidos educativos.

CSS3 diseño visual junto a la presentación de interfaz.

JavaScript interacciones ademas de controles de accesibilidad.

PHP procesamiento del registro, autenticación, sesiones y las inscripciones.

MySQL almacenamiento de usuarios, cursos e inscripciones.

PDO conexión PHP con MySQL y la ejecución de consultas preparadas.

XAMPP entorno local usado para ejecutar Apache y PHP.

MySQL Workbench administración de la base de datos.

Entorno de desarrollo utilizado

Sistema operativo Windows de 64 bits.

Versión de PHP 8.4.27 de 64 bits.

Servidor web Apache mediante XAMPP. Servidor de bases de datos operando en MySQL80.

Puerto para la conexión MySQL establecido en 3306.

Nombre designado a la base de datos es pict.

Ubicación local definida como http://localhost/PICT/.

La instalación demanda PHP junto a extensiones PDO y PDO_MySQL activadas, sumado a un servidor MySQL compatible para ejecutar el script incluido.

2 Archivos principales del proyecto

index html representa la página principal de PICT.

login html contiene el formulario de acceso.

cursos html funciona como catálogo público explorando los contenidos.

cursos php es el catálogo utilizado gestionar inscripciones de usuarios autenticados.

mis-cursos php consulta de cursos inscritos.

procesar_registro php encárgase del procesamiento para registro usuarios.

procesar_login php validación efectiva de credenciales.

procesar_inscripcion php procesamiento realizado para las inscripciones.

accesibilidad js añade funciones sobre la interfaz.

pict sql posee la estructura base datos y datos iniciales.

conexion-ejemplo txt funciona como ejemplo configuración conexión MySQL.

conexion php es archivo conexión local, requiere configurar en cada instalación.

El archivo conexion php debe guardarse fuera del repositorio público al contener credenciales reales.

3 Instalación del proyecto

Para instalar PICT en computadores con Windows, debe seguirse estos pasos. Paso 1. Configuración del entorno

Instala XAMPP con Apache junto a PHP, teniendo disponible un servidor MySQL compatible.

Para este desarrollo original, se utiliza Apache vía XAMPP además del servicio MySQL80 como gestor de base de datos.

Paso 2. Obtención del proyecto

Descarga el repositorio desde este enlace:

https github com Davifer22 PICT-Plataforma-Inclusiva

Extrae los archivos y mueve la carpeta principal a esta ruta:

C \xampp\htdocs\PICT

Resulta importante mantener los nombres junto a la estructura original de los archivos.

Paso 3. Puesta en marcha de servicios

Abre el panel de control XAMPP para iniciar Apache.

Verifica que el servidor MySQL se encuentre trabajando correctamente.

Si el equipo tiene activo el servicio MySQL80, no hace falta arrancar otro servidor desde XAMPP.

Evita que dos servidores utilicen al mismo tiempo el puerto 3306.

Paso 4. Creación de la base de datos

Abre MySQL Workbench o alguna herramienta similar conectándote al servidor.

Crea una base de datos nueva nombrada pict.

Paso 5. Importación del SQL

Ubica el archivo pict sql incluido dentro de la carpeta.

En MySQL Workbench haz lo siguiente:

Abre una conexión al servidor.

Selecciona File seguido de Open SQL Script.

Abre el archivo pict sql. Verificar que el script se corra sobre la base de datos que está prevista para la instalación.

Dale al botón de ejecutar para lanzar el script.

Comprobar si se ha creado las tablas correspondientes.

El modelo de datos del prototipo contempla la siguiente tablas:

usuarios información de las cuentas que estan registradas.

cursos detalles sobre los cursos disponibles.

inscripciones la relación que tienen los usuarios con los cursos donde se inscriben.

El archivo SQL ademas incluye los datos iniciales de los cursos.

Precaucion: se recomienda importar pict.sql en una base de datos nueva, pues no debe ejecutarse sobre una base de datos existente con informacion importante sin revisar antes sus instrucciones y hacer una copia de seguridad.

4. Configuracion de la conexion con MySQL

La conexion entre PHP y MySQL se establece por medio del archivo conexion.php, utilizando PDO.

Para facilitar la instalacion en otros equipos, el repositorio incluye el archivo conexion-ejemplo.txt.

Pasos para configurar la conexion

Abra la carpeta C:\xampp\htdocs\PICT.

Localice el archivo conexion-ejemplo.txt.

Cree un nuevo archivo llamado conexion.php dentro de esa misma carpeta.

Copie el contenido de conexion-ejemplo.txt y peguelo en conexion.php.

Reemplace los valores TU_USUARIO_MYSQL y TU_CONTRASENA_MYSQL por las credenciales que corresponden a su servidor MySQL.

Compruebe que el nombre de la base de datos es pict.

Verifique que el puerto configurado coincida con el que utiliza el servidor MySQL.

Guarde los cambios.

Ejemplo de conexion mediante PDO

El codigo siguiente muestra una configuracion de referencia, aunque no contiene credenciales reales.

<?php
$servidor = "localhost";
$puerto = "3306";
$baseDatos = "pict";
$usuario = "TU_USUARIO_MYSQL";
$contrasena = "TU_CONTRASENA_MYSQL";

try {
    $conexion = new PDO(
        "mysql:host=$servidor;port=$puerto;dbname=$baseDatos;charset=utf8mb4",
        $usuario,
        $contrasena
    );

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $error) {
    error_log($error->getMessage());
    http_response_code(500);
    exit("No se pudo conectar con la base de datos.");
}
?>


Este ejemplo emplea estos parámetros definidos:

localhost sirve como la dirección del servidor de base datos.

Para el puerto de conexión MySQL se usa 3306.

pict es el nombre de la base de datos establecida.

Se utiliza la interfaz PDO de PHP para establecer toda la conexión.

La estructura try catch se encarga gestionar los posibles errores de conexión.

El código expuesto funciona como una referencia básica de configuración. Si su proyecto emplea una implementación específica en conexion php debe conservar tanto la estructura como las variables que los archivos PHP esperan.

Seguridad es importante ya que nunca se debe publicar contraseñas reales ni credenciales de acceso dentro de GitHub.

5 Ejecución local de PICT

Tras configurar el entorno la base datos junto con el archivo de conexión haga lo siguiente:

Compruebe que Apache se encuentre iniciado.

Verifique el servidor MySQL esté activo.

Abra un navegador web cualquiera.

Ingrese a la dirección:

http://localhost/PICT/

Compruebe que la página principal se visualice correctamente.

Acceda a las opciones registro, inicio sesión y exploración de cursos.

Verifique el correcto funcionamiento de las inscripciones además del acceso a los contenidos correspondientes.

La ejecución las páginas PHP requiere utilizar siempre el servidor web. Evite abrir estos archivos directamente usando rutas locales tipo file.

6. Navegación y acceso a los cursos

PICT ofrece dos maneras para acceder a sus contenidos.

Catálogo público de demostración

Los visitantes pueden explorar cursos y ver los contenidos HTML de prueba en la página cursos.html.

Esta modalidad ayuda a conocer la plataforma previo a crear una cuenta.

Acceso mediante registro e inscripción

Gestionar la inscripción a los cursos para usuarios registrados ocurre desde cursos.php.

El proceso funcional es este:

Entrar a la página principal de PICT.

Explorar los cursos disponibles.

Registrarse o iniciar sesión.

Ir al catálogo de inscripción.

Elegir un curso para inscribirse.

Consultar sus cursos desde mis-cursos.php.

Abrir los contenidos del curso inscrito.

Las páginas PHP protegidas incluyen controles de sesión y acceso que deben probarse para verificar su eficacia.

Nota: la coherencia en los enlaces entre el catálogo público, el registro, el login y los cursos inscritos debe validarse para asegurar un recorrido consistente.

7. Funcionalidades de accesibilidad

PICT integra diversas alternativas enfocadas a optimizar la interacción de usuarios con distintas capacidades.

Dentro de los elementos contemplados figuran:

Navegación sencilla mediante el uso del teclado.

Soporte total con lectores de pantalla.

Controles destinados a ajustar la presentación del texto.

Alternativas para modificar el contraste visual.

Estructura de contenidos basada en títulos y secciones claras.

Descripciones textuales alternativas en elementos visuales, donde aplica.

Materiales educativos organizados que facilita su comprensión.

El archivo accesibilidad js contiene las funciones asociadas a estas configuraciones de accesibilidad.

Ampliar el tamaño del texto precisa de una revisión extra en los estilos CSS para que los cambios se aplican de manera uniforme en la interfaz.


8. Pruebas y validación

El prototipo se evalúa mediante pruebas técnicas, funcionales además de accesibilidad.

Evaluación técnica de accesibilidad

Se efectuaron revisiones usando:

WAVE.

Google Lighthouse.

NVDA.

Navegación con teclado.

Revisión manual de interfaz.

En los reportes, WAVE no arrojó errores automáticos ni tampoco de contraste en la home. Sobre el catálogo público, se encontró una advertencia por enlace redundante.

Lighthouse alcanzó puntajes de 100/100 en todas las categorías analizadas.

Las pruebas manuales junto a NVDA y el teclado resultaron favorables para los elementos revisados.

Dichos resultados pertenecen a las páginas evaluadas; no constituye una certificación completa de cumplimiento WCAG 2.2.

Pruebas funcionales previstas

Para comprobar el funcionamiento integral mediante PHP y MySQL, documentar los siguientes casos:

Registro de usuario con datos validos.

Intento de registro usando un correo ya existente.

Inicio de sesión ingresando una contraseña incorrecta.

Intento de inscribirse repetidamente al mismo curso.

Intento de acceso a un curso protegido sin estar inscrito. Montaje y ejecución desde cero dentro de un entorno listo para testear.

Todo caso registra:

Procedimiento del test.

Resultado que se espera.

Resultado obtenido.

Estado del test.

La evidencia correspondiente.

Los resultados obtenidos se incorporan al documento maestro del proyecto.

Evaluación mediante participantes

Se contempla la evaluación de la plataforma por los usuarios, con el fin de observar cómo comprenden instrucciones, navegación, autonomía y uso de los contenidos.

Resultados individuales y evidencias autorizadas deben documentarse en instrumentos del proyecto.

9. Seguridad y protección de datos

El prototipo incluye medidas como:

Uso de consultas preparadas por PDO.

Verificación de contraseñas almacenadas vía hash.

Controles de sesión en funcionalidades que requieren acceso.

Validaciones relacionadas a la inscripción en cursos.

Medidas que deben complementarse con pruebas de funcionamiento y revisión a los controles.

Credenciales reales de conexión no deben estar en el repositorio público.

10. Estado actual del prototipo

PICT cuenta con avances en la interfaz web, registro, autenticación, gestión de cursos, inscripciones y funciones de accesibilidad. Aún faltan por consolidar y documentar los siguientes aspectos:

Resulta necesario lograr la coherencia completa en el recorrido de navegación.

Se debe asegurar la ampliación efectiva del texto sobre los componentes importantes.

Es preciso verificar la integridad referencial entre las tablas que vinculan cursos con inscripciones.

Hace falta la ejecución documentada respecto a los casos de prueba funcionales.

Queda pendiente la validación sobre la instalación desde cero.

Se requiere consolidar las evidencias de evaluación hechas con los participantes.

Estos trabajos permiten que se fortalezca la validación del prototipo y sustentar su nivel de madurez tecnológica de acuerdo a los resultados obtenidos.

11 Proyecto académico

Nombre Plataforma Inclusiva de Capacitación Tecnológica PICT

Programa Ingeniería de Sistemas

Institución Universidad Nacional Abierta y a Distancia UNAD

Metodología de desarrollo CDIO Concebir Diseñar Implementar y Operar

Referentes de accesibilidad WCAG 2 2 además de recomendaciones del W3C sobre accesibilidad cognitiva

El proyecto busca contribuir para el desarrollo en herramientas educativas digitales que son más inclusivas y accesibles.
