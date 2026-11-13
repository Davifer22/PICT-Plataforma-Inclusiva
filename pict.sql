
-- Base de datos PICT
-- Estructura y cursos iniciales
-- Importar en una base de datos nueva y vacía.

CREATE TABLE usuarios (
    id_usuario INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    tipo_documento VARCHAR(30) NOT NULL,
    numero_documento VARCHAR(30) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    correo VARCHAR(150) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_usuario),
    UNIQUE KEY (numero_documento),
    UNIQUE KEY (correo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE cursos (
    id_curso INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT,
    archivo VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_curso)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE inscripciones (
    id_inscripcion INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_curso INT NOT NULL,
    fecha_inscripcion TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_inscripcion),
    UNIQUE KEY uq_usuario_curso (id_usuario, id_curso),
    CONSTRAINT fk_inscripcion_usuario
        FOREIGN KEY (id_usuario)
        REFERENCES usuarios(id_usuario)
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Cinco cursos iniciales de PICT

INSERT INTO cursos (id_curso, nombre, descripcion, archivo)
VALUES
(1, 'Mi primer computador',
 'Conoce las partes del computador y sus funciones básicas.',
 'curso-computador.html'),

(2, 'Aprendo a usar el computador',
 'Aprende a manejar el escritorio, programas y archivos.',
 'curso-uso.html'),

(3, 'Mis primeros pasos en Internet',
 'Aprende a navegar y buscar información en Internet.',
 'curso-internet.html'),

(4, 'Aprendo a crear documentos',
 'Aprende a escribir, editar y guardar documentos.',
 'curso-documentos.html'),

(5, 'Me cuido en Internet',
 'Aprende a proteger tus datos personales en Internet.',
 'curso-seguridad.html');
