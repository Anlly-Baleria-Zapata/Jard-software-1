## Instalación de la Base de Datos

Para configurar la base de datos de este proyecto, sigue estos pasos:

1. **Instalar el servidor de base de datos**:
   - Asegúrate de tener instalado [MySQL](https://dev.mysql.com/downloads/mysql/).
   - Sigue las instrucciones de instalación específicas para tu sistema operativo.
   - Utiliza un servidor como [XAMPP](https://www.apachefriends.org/index.html) para visualizar la página por medio del localhost.

2. **Crear la base de datos**:
   - Una vez que hayas instalado el servidor de base de datos, inicia sesión en el servidor:
     ```sh
     mysql -u usuario -p
     ```
   - Crea una nueva base de datos:
     ```sql
     CREATE DATABASE projard;
     ```
   - El script de la base de datos se encuentra en el código, en `database/projard`.

3. **Importar el script de la base de datos**:
   - En tu terminal o línea de comandos, navega hasta el directorio donde se encuentra el script `projard.sql`.
   - Ejecuta cada script uno por uno como se indica en el archivo adjunto.

4. **Configurar la conexión a la base de datos en el proyecto**:
   - Asegúrate de actualizar los archivos de configuración de tu proyecto con las credenciales de la base de datos y el nombre de la base de datos que acabas de crear. Puedes usar las credenciales ya asignadas en el código PHP de la aplicación o cambiarlas en el código fuente principal.

**Ejemplo de archivo de configuración**:

```js
// config.js o .env
module.exports = {
  host: 'localhost',
  user: 'root',
  password: 'morat12345',
  database: 'projard'
};
