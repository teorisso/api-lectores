# API Lectores

Este proyecto es una API RESTful construida con **Laravel 12** para gestionar la entidad **Lector**, cumpliendo con un Trabajo Práctico (TP) que incluye operaciones CRUD (Crear, Leer, Actualizar y Eliminar).

---

## 📋 Requisitos

- PHP >= 8.3
- Composer
- MySQL (instalado y corriendo, por ejemplo con XAMPP/LAMPP)
- Extensiones de PHP activas: `pdo_mysql`, `xml`, `mysql`, `fileinfo`
- Postman (u otra herramienta similar) para pruebas de API

---

## 🛠️ Instalación y configuración

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/teorisso/api-lectores.git
   cd api-lectores
   ```

2. **Instalar dependencias con Composer**
   ```bash
   composer install
   ```

3. **Configurar variables de entorno**
    - Copiar el archivo de ejemplo:
      ```bash
      cp .env.example .env
      ```
    - Editar `.env` y ajustar la conexión a la base de datos:
      ```ini
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=api_lectores
      DB_USERNAME=root
      DB_PASSWORD=
      ```

4. **Generar la clave de la aplicación**
   ```bash
   php artisan key:generate
   ```

5. **Ejecutar migraciones**
   ```bash
   php artisan migrate:fresh
   ```

6. **Iniciar servidor de desarrollo**
   ```bash
   php artisan serve
   ```
   La API estará disponible en `http://127.0.0.1:8000`.

---

## 🚀 Endpoints disponibles

| Método    | Ruta                        | Descripción                      |
|-----------|-----------------------------|----------------------------------|
| GET       | `/api/lectores`             | Listar todos los lectores        |
| POST      | `/api/lectores`             | Crear un nuevo lector            |
| GET       | `/api/lectores/{id}`        | Obtener un lector por su ID      |
| PUT/PATCH | `/api/lectores/{id}`        | Actualizar un lector existente   |
| DELETE    | `/api/lectores/{id}`        | Eliminar un lector               |

---

## 🧪 Pruebas con Postman

1. Configurar un **Environment** con variable:
    - `base_url = http://127.0.0.1:8000/api`

2. **GET** `{{base_url}}/lectores` → `200 OK`, Body: `[]` (si no hay datos).

3. **POST** `{{base_url}}/lectores` (JSON):
   ```json
   {
     "nombre": "Ana",
     "apellido": "Gómez",
     "email": "ana@example.com",
     "direccion": "Córdoba 123",
     "telefono": "3511234567"
   }
   ```
   → `201 Created`, devuelve el recurso.

4. **GET** `{{base_url}}/lectores/1` → `200 OK`, objeto JSON.

5. **PUT** `{{base_url}}/lectores/1` (JSON parcial):
   ```json
   { "direccion": "Salta 456" }
   ```
   → `200 OK`, objeto actualizado.

6. **DELETE** `{{base_url}}/lectores/1` → `204 No Content`.

---

## 📂 Estructura de carpetas

- `app/Models/Lector.php` – Modelo Eloquent
- `app/Http/Controllers/LectorController.php` – Controlador API
- `app/Providers/RouteServiceProvider.php` – Mapea rutas de API y web
- `routes/api.php` – Definición de rutas RESTful
- `database/migrations/` – Migraciones de la tabla `lector`

---

## 📝 Notas adicionales

- Validaciones de entrada se realizan con el método `validate()` de Laravel.
- Se emplea `Route::apiResource()` para generar automáticamente todas las rutas.

---

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Siéntete libre de usarlo y adaptarlo para tus necesidades.

