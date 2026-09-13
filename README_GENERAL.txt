======================================================================
INSTRUCCIONES GENERALES DE DESPLIEGUE - ACTIVIDAD 4
======================================================================

Este paquete comprimido contiene la estructura necesaria para montar tanto
el ambiente de Desarrollo como el ambiente de Staging (Pruebas) de forma local.

----------------------------------------------------------------------
1. CONTENIDO DEL PAQUETE Y DESPLIEGUE
----------------------------------------------------------------------
Los siguientes directorios y archivos incluidos deben ser copiados y 
desplegados directamente dentro de la carpeta raíz de su instalación 
de Apache (por defecto: C:\Apache24\):

   * conf/       -> Contiene los archivos de configuración de Apache 
                    (incluyendo el mapeo de Virtual Hosts y puertos).
   * htdocs/     -> Directorio correspondiente al Ambiente de Desarrollo.
   * Pruebas/    -> Directorio correspondiente al Ambiente de Staging.
   * modules/    -> Módulos complementarios necesarios para el servidor.

El archivo php.ini deberá ser ubicado en la carpeta donde la instalación de PHP
haya sido realizada en su máquina (por defect C:\php\):
   * php.ini     -> Archivo de configuración global de PHP.

----------------------------------------------------------------------
2. EXCLUSIÓN DE DEPENDENCIAS DESCARGABLES Y DATOS SENSIBLES
----------------------------------------------------------------------
Siguiendo las directrices de la actividad y las buenas prácticas de 
ingeniería de software, este entregable aplica los siguientes filtros:

   * Sin Conexión a Base de Datos: Al tratarse de una aplicación autónoma,
     el sistema no realiza conexiones a servidores externos ni bases de 
     datos (MySQL/MariaDB, etc.). Por lo tanto, no se incluyen scripts 
     .sql, archivos de credenciales ni contraseñas que comprometan la 
     seguridad del código fuente.
     
   * Exclusión de Extensiones: El proyecto está desarrollado utilizando
     las funciones nativas de PHP y las librerías base del servidor. No 
     se han añadido extensiones adicionales ni módulos externos, lo que 
     garantiza que el entorno funcione inmediatamente sin configuraciones 
     de dependencias pesadas.

----------------------------------------------------------------------
3. CONFIGURACIÓN DEL ENTORNO PHP (php.ini)
----------------------------------------------------------------------
Para facilitar las tareas de revisión, depuración y auditoría durante 
la evaluación de esta actividad, el archivo 'php.ini' adjunto ha sido 
configurado explícitamente con las siguientes directivas de rastreo:

   * display_errors = On
     Permite visualizar los errores directamente en el navegador en 
     caso de fallos de sintaxis o ejecución.
     
   * display_startup_errors = On
     Muestra los errores que ocurren específicamente durante la secuencia
     de inicio de PHP.
     
   * log_errors = On
     Garantiza que todos los eventos y fallos queden registrados en el
     historial de logs del servidor para un análisis detallado.

----------------------------------------------------------------------
4. PASOS PARA LA EJECUCIÓN LOCAL
----------------------------------------------------------------------
1. Copie y reemplace las carpetas indicadas dentro de 'C:\Apache24\'.
2. Inicie o reinicie el servicio de Apache desde la consola de comandos 
   como Administrador (net start Apache2.4 o Restart-Service Apache2.4).
3. Acceso a los entornos desde el navegador:
   - Ambiente Desarrollo: http://localhost:80/index.html
   - Ambiente de Staging:  http://localhost:8080/index.html
======================================================================
