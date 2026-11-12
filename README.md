
 Conexión con la base de datos

Para conectar PICT con MySQL utilicé PHP y XAMPP. La conexión permite guardar los usuarios, consultar los cursos y gestionar las inscripciones.

El archivo `conexion.php` contiene el siguiente código de conexión, con las credenciales reemplazadas por valores de ejemplo por seguridad.

```php
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
```

### Explicación

- `localhost`: indica que la base de datos está en el computador.
- `3306`: es el puerto utilizado por MySQL.
- `pict`: es el nombre de la base de datos.
- `PDO`: permite establecer la conexión entre PHP y MySQL.
- `try/catch`: permite controlar los errores de conexión.

**Nota:** las credenciales reales no se publican por  asuntos de seguridad.
