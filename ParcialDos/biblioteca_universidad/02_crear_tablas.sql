-- ============================================
-- PASO 2: Crear las 4 tablas con sus relaciones
-- ============================================

USE biblioteca_universidad;

-- Tabla: usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    ID_Usuario  INT          NOT NULL AUTO_INCREMENT,
    Nombre      VARCHAR(80)  NOT NULL,
    Apellido    VARCHAR(80)  NOT NULL,
    Email       VARCHAR(120) NOT NULL UNIQUE,
    Tipo        ENUM('Estudiante', 'Docente', 'Administrativo') NOT NULL,
    PRIMARY KEY (ID_Usuario)
) ENGINE=InnoDB;

-- Tabla: libros
CREATE TABLE IF NOT EXISTS libros (
    ID_Libro    INT          NOT NULL AUTO_INCREMENT,
    ISBN        VARCHAR(20)  NOT NULL UNIQUE,
    Titulo      VARCHAR(200) NOT NULL,
    Autor       VARCHAR(150) NOT NULL,
    Disponibles INT          NOT NULL DEFAULT 0,
    PRIMARY KEY (ID_Libro)
) ENGINE=InnoDB;

-- Tabla: prestamos (depende de usuarios y libros)
CREATE TABLE IF NOT EXISTS prestamos (
    ID_Prestamo     INT  NOT NULL AUTO_INCREMENT,
    ID_Usuario      INT  NOT NULL,
    ID_Libro        INT  NOT NULL,
    FechaPrestamo   DATE NOT NULL,
    FechaDevolucion DATE,
    Estado          ENUM('Activo', 'Devuelto', 'Vencido') NOT NULL DEFAULT 'Activo',
    PRIMARY KEY (ID_Prestamo),
    CONSTRAINT fk_prestamo_usuario FOREIGN KEY (ID_Usuario)
        REFERENCES usuarios (ID_Usuario)
        ON UPDATE CASCADE ON DELETE RESTRICT,
    CONSTRAINT fk_prestamo_libro   FOREIGN KEY (ID_Libro)
        REFERENCES libros (ID_Libro)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Tabla: multas (depende de prestamos)
CREATE TABLE IF NOT EXISTS multas (
    ID_Multa    INT            NOT NULL AUTO_INCREMENT,
    ID_Prestamo INT            NOT NULL,
    Monto       DECIMAL(10,2)  NOT NULL,
    Estado      ENUM('Pendiente', 'Pagada') NOT NULL DEFAULT 'Pendiente',
    PRIMARY KEY (ID_Multa),
    CONSTRAINT fk_multa_prestamo FOREIGN KEY (ID_Prestamo)
        REFERENCES prestamos (ID_Prestamo)
        ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;
