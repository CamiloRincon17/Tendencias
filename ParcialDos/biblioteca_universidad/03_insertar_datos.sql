-- ============================================
-- PASO 3: Insertar datos de prueba
-- ============================================

USE biblioteca_universidad;

-- ── Usuarios (3 registros) ──────────────────
INSERT INTO usuarios (Nombre, Apellido, Email, Tipo) VALUES
    ('Carlos',   'Ramírez',  'carlos.ramirez@uni.edu',   'Estudiante'),
    ('Laura',    'Gómez',    'laura.gomez@uni.edu',      'Docente'),
    ('Andrés',   'Morales',  'andres.morales@uni.edu',   'Administrativo');

-- ── Libros (3 registros) ───────────────────
INSERT INTO libros (ISBN, Titulo, Autor, Disponibles) VALUES
    ('978-958-771-100-1', 'Introducción a las Bases de Datos', 'Ramez Elmasri',   4),
    ('978-958-771-200-8', 'Estructuras de Datos en Java',      'Mark Allen Weiss', 2),
    ('978-958-771-300-5', 'Sistemas Operativos Modernos',      'Andrew Tanenbaum', 1);

-- ── Préstamos (3 registros) ────────────────
INSERT INTO prestamos (ID_Usuario, ID_Libro, FechaPrestamo, FechaDevolucion, Estado) VALUES
    (1, 1, '2026-04-01', NULL,          'Activo'),
    (2, 2, '2026-03-15', '2026-04-15',  'Devuelto'),
    (3, 3, '2026-02-01', NULL,          'Vencido');

-- ── Multas (3 registros) ──────────────────
INSERT INTO multas (ID_Prestamo, Monto, Estado) VALUES
    (3, 15000.00, 'Pendiente'),
    (2,  5000.00, 'Pagada'),
    (1,  8500.00, 'Pendiente');
