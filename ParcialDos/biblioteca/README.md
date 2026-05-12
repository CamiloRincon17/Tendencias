# 📚 Parte 2 — Laravel: Paso a Paso Completo

Este documento explica **desde cero** cómo se creó este proyecto para cumplir con los requisitos del Parcial 2.

---

## 🚀 PASO 1: Crear el proyecto Laravel

Primero, abrimos la consola (CMD o PowerShell) en la carpeta donde queremos el proyecto y ejecutamos:

```bash
composer create-project laravel/laravel biblioteca
```
Una vez termine de descargar, entramos a la carpeta del proyecto:
```bash
cd biblioteca
```

---

## ⚙️ PASO 2: Configurar la Base de Datos (`.env`)

Abrimos el archivo `.env` que está en la raíz del proyecto y modificamos la conexión para que apunte a la base de datos que ya teníamos creada en phpMyAdmin (la de la Parte 1):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=biblioteca_universidad
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🛠️ PASO 3: Generar los archivos base (Comando Atajo)

Para no crear las cosas una por una, usamos el comando `make:model` agregando `-ms`. Esto le dice a Laravel: *"Crea el Modelo, pero también créame su Migración (m) y su Seeder (s)"*.

Ejecutamos en la terminal:
```bash
php artisan make:model Usuario -ms
php artisan make:model Libro -ms
php artisan make:model Prestamo -ms
php artisan make:model Multa -ms
```
*(Al hacer esto, Laravel genera 12 archivos en blanco listos para que los modifiquemos).*

---

## ✍️ PASO 4: Modificar los archivos manualmente

Una vez generados, debemos abrir los archivos y escribir el código:

1. **Migraciones (`database/migrations/`)**
   - Entramos a cada migración y definimos las columnas (`$table->string('Nombre')`, `$table->enum('Tipo', [...])`, etc) y las llaves foráneas (`$table->foreignId()`).

2. **Modelos (`app/Models/`)**
   - Entramos a cada modelo y definimos la tabla, la llave primaria y las variables `$fillable`.
   - Creamos las funciones de las relaciones (ej. `public function prestamos() { return $this->hasMany(...); }`).

3. **Seeders (`database/seeders/`)**
   - Entramos a cada Seeder (Usuario, Libro, Prestamo, Multa) y hacemos los `insert()` con los 3 datos de prueba obligatorios.
   - Entramos al `DatabaseSeeder.php` maestro y agregamos `$this->call([...])` para que ejecute los 4 seeders en orden (respetando las llaves foráneas).

---

## 🏃‍♂️ PASO 5: Subir todo a la Base de Datos

Ya con el código escrito, le decimos a Laravel que tome todas las migraciones y seeders y las ejecute en MySQL.

Si es la **primera vez**, ejecutamos:
```bash
php artisan migrate
php artisan db:seed
```

Si queremos **borrar todo, volver a crear y re-insertar los datos**, usamos el comando todo-en-uno:
```bash
php artisan migrate:fresh --seed
```

---

## ✅ PASO 6: Verificar en phpMyAdmin

1. Abrimos el navegador en `http://localhost/phpmyadmin`
2. Seleccionamos la base de datos `biblioteca_universidad`
3. Verificamos que ahora las 4 tablas existen y tienen 3 registros cada una, insertados correctamente por los seeders.

---

## 📋 Resumen de Relaciones Eloquent configuradas

| Modelo | Tabla | Relaciones configuradas a mano |
|--------|-------|-------------------------------|
| `Usuario` | `usuarios` | `hasMany(Prestamo)` |
| `Libro` | `libros` | `hasMany(Prestamo)` |
| `Prestamo` | `prestamos` | `belongsTo(Usuario)` · `belongsTo(Libro)` · `hasMany(Multa)` |
| `Multa` | `multas` | `belongsTo(Prestamo)` |
