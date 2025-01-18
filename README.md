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

# Jard Software

// config.js o .env
```javascript
module.exports = {
  host: 'localhost',
  user: 'root',
  password: 'morat12345',
  database: 'projard'
};




5. *JARD SOFTWARE*:

Jard Software es una aplicación web para la gestión de equipos informáticos dentro de una organización, permitiendo el registro, control de ubicación, depreciación y generación de informes en formato PDF.

## Tecnologías Utilizadas

- **PHP**
- **HTML**
- **CSS**
- **JavaScript**
- **Hack**

## Módulos Principales

### 1. Registro de Usuarios

Permite registrar nuevos usuarios en el sistema.
- **Componentes**:
  - Formulario de registro 
  - Procesamiento del formulario 
- **Flujo**:
  - Los usuarios ingresan sus datos.
  - Los datos se procesan y se guardan en la base de datos.
  - Se confirma el registro exitoso o se muestran errores.

### 2. Inicio de Sesión

Permite a los usuarios acceder al sistema según su rol.
- **Componentes**:
  - Formulario de inicio de sesión 
  - Procesamiento del inicio de sesión 
- **Flujo**:
  - Verificación de credenciales.
  - Redirección según el rol del usuario o muestra de errores.

### 3. Hoja de Vida del Equipo

Registra la información técnica de los equipos.
- **Componentes**:
  - Interfaz de registro 
  - Procesamiento del formulario 
- **Flujo**:
  - Registra información como ID, sistema operativo, modelo, mantenimiento y más.
  - Los datos se almacenan en la base de datos.

### 4. Computadores

Permite gestionar los registros de equipos.
- **Componentes**:
  - Visualización de registros 
  - Edición y desactivación de registros.
  - Notificación de problemas y gestión de mensajes.
- **Flujo**:
  - Búsqueda, edición, activación/desactivación de registros.
  - Gestión de notificaciones de inventario.

### 5. Registro y Gestión de Ubicación

Gestión de ubicaciones de los equipos.
- **Componentes**:
  - Interfaz de ubicación 
  - Procesamiento del cambio de ubicación.
- **Flujo**:
  - Selección de equipo y ubicación.
  - Actualización en la base de datos y confirmación.

### 6. Depreciación

Calcula la depreciación anual de los equipos.
- **Componentes**:
  - Calculadora de depreciación
  - Visualización y actualización de registros de depreciación.
- **Flujo**:
  - Ingreso de valores iniciales.
  - Cálculo y almacenamiento de la depreciación.

### 7. Generación de Informes

Genera informes en PDF sobre equipos y depreciación.
- **Componentes**:
  - Informe de computadores 
  - Informe de depreciación 
  - Informe de ubicación 
- **Flujo**:
  - Consulta a la base de datos y generación de PDF.

## Instalación

1. Clonar este repositorio.
   ```bash
   git clone https://github.com/Anlly-Baleria-Zapata/Jard-software-1
   ```
2. Configurar el servidor local (e.g., XAMPP, WAMP).
3. Importar la base de datos desde el archivo `projard.sql`.
4. Configurar las rutas y credenciales de la base de datos en los archivos de configuración.
5. Iniciar el servidor y acceder desde `http://localhost/jard-software-1/index.html`.

## Contribuciones

Contribuciones, reportes de errores y sugerencias son bienvenidos. Por favor, utiliza el flujo estándar de pull requests.
