
 Conexión con la base de datos

Para conectar PICT con MySQL utilicé PHP y XAMPP. Esta conexión permite guardar los usuarios, consultar los cursos y gestionar las inscripciones.

El archivo conexion.php contiene la configuración necesaria para establecer la conexión. Por seguridad, las credenciales se muestran con valores de ejemplo.

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
    echo "No se pudo conectar con la base de datos.";
}
?>

Explicación

localhost: indica que la base de datos está en el computador.

3306: es el puerto utilizado por MySQL.

pict: es el nombre de la base de datos.

PDO: permite establecer la conexión entre PHP y MySQL.

try/catch: permite controlar los errores de conexión.

Configuracion de la conexion MySQL

Para que PICT funcione bien en otro equipo, tenes que configurar el archivo conexion php que logra la vinculacion entre PHP y la base de datos MySQL.

Pasos para ajustar la conexion:

1. Baja el proyecto PICT desde el repositorio en GitHub.
2. Abre la carpeta del proyecto usando Visual Studio Code.
3. Busca el archivo conexion ejemplo txt, el cual tiene el codigo base con datos de muestra.
4. Crea un nuevo archivo nombrado conexion php adentro de la carpeta principal de PICT.
5. Copia todo el contenido del txt de ejemplo y pegalo directo en conexion php.
6. Cambia TU USUARIO MYSQL y TU CONTRASENA MYSQL por los datos de acceso reales del servidor MySQL que esta instalado en la maquina.
7. Verifica que la base de datos se llame pict y ademas que el puerto configurado sea el que usa tu MySQL.
8. Guarda los cambios hechos en el archivo conexion php.
9. Inicia Apache desde XAMPP y chequea que el servidor MySQL este funcionando correctamente.
10. Accede a http localhost PICT para probar si la plataforma levanta.

Nota importante: si el computador ya posee un servidor MySQL andando como MySQL80, no es necesario iniciar MySQL desde XAMPP. Debes usar ese servidor existente para no tener conflictos con los puertos.

Por seguridad el archivo conexion El archivo con credenciales reales se debe guardar localmente, nunca publicarlo en GitHub.

Nota: las credenciales reales no se publican por seguridad.

Instalación y ejecución de PICT

Para lograr la ejecución del prototipo PICT en tu equipo es necesario cumplir estos pasos.

1. Instala XAMPP teniendo disponible un servidor MySQL.
2. Baja el proyecto directamente de GitHub.
3. Copia la carpeta PICT dentro del directorio C xampp htdocs.
4. Inicia el servicio Apache desde el panel de control XAMPP.
5. Verifica si el servidor MySQL esta funcionando.
6. Crea una base de datos denominada pict para importar el archivo SQL incluido.
7. Ajusta el archivo conexion php con los datos de acceso MySQL usando como guía conexion example php.
8. Entra al navegador web para ingresar a la direccion http localhost PICT.

Nota importante sobre MySQL y XAMPP

Si el ordenador cuenta con un servidor MySQL funcionando previamente, caso de MySQL80, no hace falta activar el de XAMPP.

En esa situacion, simplemente debes arrancar Apache desde XAMPP y ocupar el servidor MySQL que ya tenias.

Cuando no exista otro servidor MySQL instalado, usa el que viene integrado en XAMPP.

Es crucial evitar que dos servidores MySQL intenten emplear el mismo puerto 3306, ya que esto suele provocar conflictos. Uso Apache por medio de XAMPP junto al servicio MySQL80 para la gestión de la base de datos pict y MySQL Workbench me sirve como herramienta de administración.
