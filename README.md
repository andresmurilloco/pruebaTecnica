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

http://127.0.0.1:8000/api/eventos

Esto debería devolver una lista de eventos deportivos si todo está funcionando correctamente.

Notas adicionales

- Base de datos: Asegúrate de que el servidor de base de datos (MySQL, PostgreSQL, etc.) esté corriendo y configurado correctamente.
- Autenticación: Si el proyecto utiliza autenticación (como JWT o Passport), sigue los pasos adicionales de configuración que se describan en la documentación del proyecto.

Problemas comunes

- Si recibes un error relacionado con la conexión a la base de datos, asegúrate de que los datos en el archivo .env son correctos y que el servidor de base de datos está en ejecución.
- Si las migraciones no se ejecutan correctamente, revisa los errores en la terminal y asegúrate de que tu base de datos esté configurada correctamente.

¡Listo! Ahora deberías poder ejecutar el proyecto localmente y empezar a trabajar en él. Si tienes alguna duda o problema, no dudes en revisar los logs de Laravel o consultar con el equipo de desarrollo.
