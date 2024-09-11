# Drupal User List Project

Este proyecto de Drupal está diseñado para demostrar la capacidad de filtrado y paginación de una lista de usuarios utilizando AJAX. Está destinado para una prueba técnica y muestra cómo se pueden manejar los filtros de búsqueda y la paginación en una aplicación Drupal personalizada.

## Requisitos

- PHP 8.0 o superior
- MySQL 5.7 o superior
- Composer
- Drush 13.1
- XAMPP (opcional, para un entorno local)

## Instalación

1. **Clona el repositorio**

   ```bash
   git clone https://github.com/vanemp21/Drupal-Project.git
   ```

2. **Accede a la carpeta del proyecto**

    ```bash
    cd ruta/donde/has/descomprimido/Drupal-Project
    ```

3. **Instala las dependencias**
    ```bash
    composer install
    ```

4. **Configura la base de datos**
- Importa la base de datos que se encuentra dentro del repositorio llamado drupal_prueba.sql

5. **Configura Drupal**

- Copia el archivo default.settings.php a settings.php y ajusta la configuración de la base de datos:
 ```php
 $databases['default']['default'] = array (
  'driver' => 'mysql',
  'database' => 'drupal_prueba',
  'username' => 'root',
  'password' => '',
  'host' => 'localhost',
  'port' => '',
  'prefix' => '',
);
```

6. **Si estás usando XAMPP, asegúrate de que Apache y MySQL estén en funcionamiento.**

## USO

1. **Accede al proyecto en tu navegador**

    Abre tu navegador y visita la URL:
    ```bash
    http://localhost/Drupal-Project/
    ```
2. **Navega a la página de búsqueda de usuarios**

    La página de búsqueda de usuarios estará disponible en: 
    ```bash
    http://localhost/Drupal-Project/user-list
    ```
    Aquí podrás utilizar el formulario para buscar usuarios y ver los resultados en una tabla. La búsqueda se realiza utilizando AJAX, por lo que los resultados se actualizarán dinámicamente sin recargar la página.
    
    Para mostrar los usuarios en forma de objeto como requiere la prueba se puede ver mediante el siguiente enlace:
    ```bash
    http://localhost/Drupal-Project/user-list/ajax
    ```

3. **Inicia sesión en el sistema**

    Para probar las funcionalidades administrativas, inicia sesión con las siguientes credenciales:

    - Nombre de usuario: dev.vanessa.rubio
    - Contraseña: PruebaTecnica1

¡Gracias por revisar el proyecto!


