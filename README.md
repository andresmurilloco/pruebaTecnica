Instrucciones para ejecutar el proyecto localmente

Este proyecto está construido con Laravel y proporciona una API para gestionar apuestas deportivas. A continuación, se detallan los pasos para ejecutar el proyecto localmente.

1. Clonar el repositorio

Si el proyecto está en un repositorio remoto (por ejemplo, en GitHub), clónalo en tu máquina local utilizando el siguiente comando:

git clone https://github.com/usuario/repositorio.git

Asegúrate de reemplazar https://github.com/usuario/repositorio.git por la URL del repositorio del proyecto.

2. Instalar dependencias del proyecto

Una vez clonado el repositorio, navega a la carpeta del proyecto:

cd nombre-del-proyecto

Luego, instala las dependencias necesarias utilizando Composer:

- Si no tienes Composer instalado, sigue las instrucciones en https://getcomposer.org/download/.
- Una vez que Composer esté instalado, ejecuta:

composer install

Esto descargará e instalará todas las dependencias necesarias para el proyecto.

3. Configurar el entorno

En la raíz del proyecto, encontrarás un archivo .env.example. Haz una copia de este archivo y renómbralo a .env. Puedes hacerlo ejecutando el siguiente comando:

cp .env.example .env

Ahora, abre el archivo .env y configura las siguientes variables de entorno, especialmente las relacionadas con la conexión a la base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

Asegúrate de remplazar nombre_de_tu_base_de_datos, tu_usuario, y tu_contraseña con los valores correctos de tu configuración de base de datos local.

4. Generar la clave de la aplicación

Laravel requiere una clave única para tu aplicación. Ejecuta el siguiente comando para generar y configurar esta clave automáticamente:

php artisan key:generate

5. Configurar la base de datos

Asegúrate de que el servidor de base de datos (como MySQL o PostgreSQL) esté corriendo y correctamente configurado.

Luego, puedes crear las tablas de la base de datos ejecutando las migraciones:

php artisan migrate

Si tienes semillas de base de datos para poblar la base con datos iniciales, puedes ejecutar:

php artisan db:seed

6. Servir el proyecto localmente

Una vez configurado todo lo anterior, puedes iniciar el servidor de desarrollo de Laravel utilizando el siguiente comando:

php artisan serve

Esto iniciará el servidor y podrás acceder a la aplicación en tu navegador usando la siguiente URL:

http://127.0.0.1:8000

7. Verificar el funcionamiento de la API

Puedes probar que la API está funcionando correctamente utilizando un navegador o una herramienta como Postman. Accede a la siguiente URL para ver todos los eventos deportivos registrados:

#Crear Usuario: 

Endpoint: http://127.0.0.1:8000/api/usuarios

Body: {
  "nombre": "Andres",
  "correo": "andres@example.com",
  "saldo": 10.15
}

#Actualizar Usuario:

Endpoint: http://127.0.0.1:8000/api/usuarios/1

Body: {
  "nombre": "Carlos Gómez",
  "correo": "carlos.gomez@example.com",
  "saldo": 5000
}

#Nueva apuesta: 

Endpoint: http://127.0.0.1:8000/api/apuestas

Body: {
    "usuario_id": 1,
    "evento_deportivo_id": 1,
    "monto_apostado": 1000,
    "cuota": 2.5,
    "estado": "pendiente"
}

#Actualizar estado de apuesta:

Endpoint: http://127.0.0.1:8000/api/apuestas/11

Body: {
    "estado": "ganada"
}

#Obtener todas las apuestas del usuario:
Endpoint: http://127.0.0.1:8000/api/apuestas/usuario/{id}

#Obtener todas las apuestas del usuario con filtro:
Endpoint: http://127.0.0.1:8000/api/apuestas/usuario/1?estado=ganada //Ganada, Perdida o Pendiente

#Obtener todos los eventos:
Endpoint: http://127.0.0.1:8000/api/eventos

Notas adicionales

- Base de datos: Asegúrate de que el servidor de base de datos (MariaDB) esté corriendo y configurado correctamente.
