<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instrucciones para ejecutar el proyecto</title>
</head>
<body>
    <h1>Instrucciones para ejecutar el proyecto localmente</h1>
    <p>Este proyecto está construido con Laravel y proporciona una API para gestionar apuestas deportivas. A continuación, se detallan los pasos para ejecutar el proyecto localmente.</p>

    <h2>1. Clonar el repositorio</h2>
    <p>Si el proyecto está en un repositorio remoto (por ejemplo, en GitHub), clónalo en tu máquina local utilizando el siguiente comando:</p>
    <pre>git clone https://github.com/usuario/repositorio.git</pre>
    <p>Asegúrate de reemplazar <code>https://github.com/usuario/repositorio.git</code> por la URL del repositorio del proyecto.</p>

    <h2>2. Instalar dependencias del proyecto</h2>
    <p>Una vez clonado el repositorio, navega a la carpeta del proyecto:</p>
    <pre>cd nombre-del-proyecto</pre>
    <p>Luego, instala las dependencias necesarias utilizando Composer:</p>
    <ul>
        <li>Si no tienes Composer instalado, sigue las instrucciones en <a href="https://getcomposer.org/download/" target="_blank">https://getcomposer.org/download/</a>.</li>
        <li>Una vez que Composer esté instalado, ejecuta:</li>
    </ul>
    <pre>composer install</pre>
    <p>Esto descargará e instalará todas las dependencias necesarias para el proyecto.</p>

    <h2>3. Configurar el entorno</h2>
    <p>En la raíz del proyecto, encontrarás un archivo <code>.env.example</code>. Haz una copia de este archivo y renómbralo a <code>.env</code>. Puedes hacerlo ejecutando el siguiente comando:</p>
    <pre>cp .env.example .env</pre>
    <p>Ahora, abre el archivo <code>.env</code> y configura las siguientes variables de entorno, especialmente las relacionadas con la conexión a la base de datos:</p>
    <pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
    </pre>
    <p>Asegúrate de remplazar <code>nombre_de_tu_base_de_datos</code>, <code>tu_usuario</code>, y <code>tu_contraseña</code> con los valores correctos de tu configuración de base de datos local.</p>

    <h2>4. Generar la clave de la aplicación</h2>
    <p>Laravel requiere una clave única para tu aplicación. Ejecuta el siguiente comando para generar y configurar esta clave automáticamente:</p>
    <pre>php artisan key:generate</pre>

    <h2>5. Configurar la base de datos</h2>
    <p>Asegúrate de que el servidor de base de datos (como MySQL o PostgreSQL) esté corriendo y correctamente configurado.</p>
    <p>Luego, puedes crear las tablas de la base de datos ejecutando las migraciones:</p>
    <pre>php artisan migrate</pre>
    <p>Si tienes semillas de base de datos para poblar la base con datos iniciales, puedes ejecutar:</p>
    <pre>php artisan db:seed</pre>

    <h2>6. Servir el proyecto localmente</h2>
    <p>Una vez configurado todo lo anterior, puedes iniciar el servidor de desarrollo de Laravel utilizando el siguiente comando:</p>
    <pre>php artisan serve</pre>
    <p>Esto iniciará el servidor y podrás acceder a la aplicación en tu navegador usando la siguiente URL:</p>
    <pre>http://127.0.0.1:8000</pre>

    <h2>7. Verificar el funcionamiento de la API</h2>
    <p>Puedes probar que la API está funcionando correctamente utilizando un navegador o una herramienta como Postman. Accede a la siguiente URL para ver todos los eventos deportivos registrados:</p>

    <h3>Crear Usuario:</h3>
    <p><strong>Endpoint:</strong> <code>http://127.0.0.1:8000/api/usuarios</code></p>
    <p><strong>Body:</strong></p>
    <pre>
{
  "nombre": "Andres",
  "correo": "andres@example.com",
  "saldo": 10.15
}
    </pre>

    <h3>Actualizar Usuario:</h3>
    <p><strong>Endpoint:</strong> <code>http://127.0.0.1:8000/api/usuarios/1</code></p>
    <p><strong>Body:</strong></p>
    <pre>
{
  "nombre": "Carlos Gómez",
  "correo": "carlos.gomez@example.com",
  "saldo": 5000
}
    </pre>

    <h3>Nueva apuesta:</h3>
    <p><strong>Endpoint:</strong> <code>http://127.0.0.1:8000/api/apuestas</code></p>
    <p><strong>Body:</strong></p>
    <pre>
{
    "usuario_id": 1,
    "evento_deportivo_id": 1,
    "monto_apostado": 1000,
    "cuota": 2.5,
    "estado": "pendiente"
}
    </pre>

    <h3>Actualizar estado de apuesta:</h3>
    <p><strong>Endpoint:</strong> <code>http://127.0.0.1:8000/api/apuestas/11</code></p>
    <p><strong>Body:</strong></p>
    <pre>
{
    "estado": "ganada"
}
    </pre>

    <h3>Obtener todas las apuestas del usuario:</h3>
    <p><strong>Endpoint:</strong> <code>http://127.0.0.1:8000/api/apuestas/usuario/{id}</code></p>

    <h3>Obtener todas las apuestas del usuario con filtro:</h3>
    <p><strong>Endpoint:</strong> <code>http://127.0.0.1:8000/api/apuestas/usuario/1?estado=ganada</code> (Valores posibles para <code>estado</code>: <code>ganada</code>, <code>perdida</code>, <code>pendiente</code>)</p>

    <h3>Obtener todos los eventos:</h3>
    <p><strong>Endpoint:</strong> <code>http://127.0.0.1:8000/api/eventos</code></p>

    <h2>Notas adicionales</h2>
    <ul>
        <li><strong>Base de datos:</strong> Asegúrate de que el servidor de base de datos (MariaDB) esté corriendo y configurado correctamente.</li>
    </ul>
</body>
</html>
