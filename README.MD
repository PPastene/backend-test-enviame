# Envíame Backend Challenge
Este repositorio contiene la solución a los ejercicios planteados por Envíame opara el puesto de Desarrollador Backend
## Requerimientos
- Sistema operativo compatible con Docker
- Docker
- NodeJS
## Instalación y Uso
### Ejercicios 1, 2 y 4
- Entrar a carpeta ejercicio_1_2_4
- En consola ejecutar docker-compose up -d --build y espere a que se levanten los contenedores
- Copiar el archivo .env-example y renombrarlo a .env (las credenciales de acceso estan en .env-example)
- Ejecutar docker-compose run artisan key:generate para generar la llave unica de la aplicación
- Ejecutar docker-compose run artisan migrate --seed para ejecutar las migraciones
- Se incluye un archivo de importación para POSTMAN con los endpoints del API REST para el ejercicio 2, además de la ruta para ejecutar el codigo del ejercicio 4
- De ser requerido, puede ejecutar docker-compose run artisan test para ejecutar las pruebas unitarias de Empresa
### Ejercicios 3, 5 y 6
- Entrar a una de las carpetas
- Salvo en ejercicio_6, en ejercicio_3 y ejercicio_5 ejecutar previamente npm install para instalar las dependencias
- Ejecutar la solución con node index.js
### Ejercicio 7
- Con docker-compose andando en la carpeta ejercicio_1_2_4 entrar a Adminer usando la URL http://localhost:8000 u ocupar un cliente de base de datos compatible con MYSQL
- Las credenciales de acceso en Adminer son:
    - Motor de base de datos: MySQL
    - Servidor: mariadb
    - Usuario: root
    - Contraseña: mysecretpassword
    - Base de datos: dejar vacio
- En caso de ocupar un cliente MySQL son las mismas credenciales que en Adminer, salvo el campo Servidor que hay que reemplazar por localhost o 127.0.0.1
- Crear una nueva base de datos e importar el archivo ejercicio_7.sql
- En la misma base de datos importar el archivo solucion.sql para actualizar los registros acorde al ejercicio
