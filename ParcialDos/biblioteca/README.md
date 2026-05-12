# 📚 Parte 2 — Laravel: Migraciones, Modelos y Seeders

## ✅ Requisitos previos

Antes de empezar asegúrate de tener:
- **XAMPP** corriendo con **MySQL activo**
- **PHP 8.2+** (el que viene con XAMPP)
- **Composer** instalado
- La base de datos `biblioteca_universidad` ya creada (Parte 1)

---

## 📁 Estructura de archivos creados

```
biblioteca/
├── .env                                         ← Conexión a MySQL (ya configurado)
├── app/
│   └── Models/
│       ├── Usuario.php                          ← Modelo Eloquent
│       ├── Libro.php                            ← Modelo Eloquent
│       ├── Prestamo.php                         ← Modelo Eloquent
│       └── Multa.php                            ← Modelo Eloquent
└── database/
    ├── migrations/
    │   ├── 2026_01_01_000001_create_usuarios_table.php
    │   ├── 2026_01_01_000002_create_libros_table.php
    │   ├── 2026_01_01_000003_create_prestamos_table.php
    │   └── 2026_01_01_000004_create_multas_table.php
    └── seeders/
        ├── DatabaseSeeder.php                   ← Orquestador principal
        ├── UsuarioSeeder.php
        ├── LibroSeeder.php
        ├── PrestamoSeeder.php
        └── MultaSeeder.php
```

---

## 🚀 Paso a paso — Comandos en terminal

> Abre CMD o PowerShell y entra al proyecto:
> ```
> cd C:\Users\URIEL MAURICIO\OneDrive\Desktop\Tendencias\ParcialDos\biblioteca
> ```

---

### PASO 1 — Verificar la conexión a la BD


```

Debe mostrar `biblioteca_universidad` conectada. Si falla, revisa el `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biblioteca_universidad
DB_USERNAME=root
DB_PASSWORD=
```

---

### PASO 2 — Ejecutar las migraciones

```bash
php artisan migrate
```

Verás algo como:

```
INFO  Running migrations.
  2026_01_01_000001_create_usuarios_table ........... DONE
  2026_01_01_000002_create_libros_table ............. DONE
  2026_01_01_000003_create_prestamos_table .......... DONE
  2026_01_01_000004_create_multas_table ............. DONE
```

> ⚠️ Si las tablas ya existen del Parte 1 y da error, usa:
> ```bash
> php artisan migrate:fresh
> ```

---

### PASO 3 — Ejecutar los Seeders

```bash
php artisan db:seed
```

Inserta 3 registros en cada tabla en orden correcto.

---

### PASO 4 — Todo en un solo comando (recomendado)

```bash
php artisan migrate:fresh --seed
```

---

### PASO 5 — Verificar en phpMyAdmin

1. Abre `http://localhost/phpmyadmin`
2. Selecciona `biblioteca_universidad`
3. Verifica que las 4 tablas tienen 3 filas cada una ✅

---

## 📋 Modelos y Relaciones Eloquent

| Modelo | Tabla | Relaciones |
|--------|-------|-----------|
| `Usuario` | `usuarios` | `hasMany(Prestamo)` |
| `Libro` | `libros` | `hasMany(Prestamo)` |
| `Prestamo` | `prestamos` | `belongsTo(Usuario)` · `belongsTo(Libro)` · `hasMany(Multa)` |
| `Multa` | `multas` | `belongsTo(Prestamo)` |

### Ejemplo de uso:

```php
// Préstamos de un usuario
$usuario->prestamos;

// Usuario de un préstamo
$prestamo->usuario->Nombre;

// Multas de un préstamo
$prestamo->multas;

// Préstamos activos con eager loading
Prestamo::with(['usuario', 'libro'])->where('Estado', 'Activo')->get();
```

---

## ⚠️ Errores comunes

| Error | Causa | Solución |
|-------|-------|----------|
| `SQLSTATE[HY000] [2002]` | MySQL apagado | Inicia MySQL en XAMPP |
| `Table already exists` | Tablas del Parte 1 ya existen | Usa `migrate:fresh` |
| `Class not found` en Seeder | Autoload desactualizado | Ejecuta `composer dump-autoload` |
| `Foreign key constraint fails` | Seeders fuera de orden | DatabaseSeeder ya los llama en orden correcto |
| `Unknown database` | BD no existe | Créala en phpMyAdmin |

---

## 🔁 Comandos de referencia rápida

```bash
php artisan config:clear          # Limpiar caché de configuración
composer dump-autoload            # Recargar autoload de clases
php artisan migrate:fresh --seed  # Rehacer TODO
php artisan migrate:status        # Ver estado de migraciones
```
