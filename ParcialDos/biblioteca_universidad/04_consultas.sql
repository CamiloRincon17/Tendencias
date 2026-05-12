-- ============================================
-- PASO 4: Consultas requeridas
-- ============================================

USE biblioteca_universidad;

-- ─────────────────────────────────────────────────────────────
-- CONSULTA 1: Préstamos activos con nombre del usuario y título
-- ─────────────────────────────────────────────────────────────
SELECT
    p.ID_Prestamo,
    CONCAT(u.Nombre, ' ', u.Apellido) AS Usuario,
    l.Titulo                          AS Libro,
    p.FechaPrestamo
FROM prestamos p
JOIN usuarios u ON p.ID_Usuario = u.ID_Usuario
JOIN libros   l ON p.ID_Libro   = l.ID_Libro
WHERE p.Estado = 'Activo';

-- ─────────────────────────────────────────────────────────────
-- CONSULTA 2: Multas pendientes con nombre del usuario
-- ─────────────────────────────────────────────────────────────
SELECT
    m.ID_Multa,
    CONCAT(u.Nombre, ' ', u.Apellido) AS Usuario,
    m.Monto,
    m.Estado AS EstadoMulta
FROM multas m
JOIN prestamos p ON m.ID_Prestamo = p.ID_Prestamo
JOIN usuarios  u ON p.ID_Usuario  = u.ID_Usuario
WHERE m.Estado = 'Pendiente';

-- ─────────────────────────────────────────────────────────────
-- CONSULTA 3: Cantidad de préstamos por usuario
-- ─────────────────────────────────────────────────────────────
SELECT
    CONCAT(u.Nombre, ' ', u.Apellido) AS Usuario,
    u.Tipo,
    COUNT(p.ID_Prestamo)              AS TotalPrestamos
FROM usuarios u
LEFT JOIN prestamos p ON u.ID_Usuario = p.ID_Usuario
GROUP BY u.ID_Usuario, u.Nombre, u.Apellido, u.Tipo
ORDER BY TotalPrestamos DESC;
