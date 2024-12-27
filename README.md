# Proyecto creado en CodeIgniter 4 Framework

[Guia de Usuario](https://codeigniter4.github.io/userguide/).

## Server Requirements

PHP version 7.4 o superior es requerido con las siguientes extensiones instaladas:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Adicional, asegurarse que las siguientes extensiones están habilitadas en PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) si se usa MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) si se usa la libreria HTTP\CURLRequest

## Descargar Proyecto ubicado en master

* Instalar servidor apache XAMPP

* Configurar sin ningun puerto. 

* En caso de que se coloque un puerto especifico acudir a la ruta del proyecto: 

* app/Config/Database.php -> Linea 29 y agregar el puerto elegido. y a 
* app/Config/App.php -> Linea 19 y agregar ruta y puerto para correr en local o bien en entorno productivo

## Descargar base de datos ubicado en raíz master
autotraffic.sql, Instalar la base de datos en el gestor

* descargar el proyecto en la ruta donde se abrirá desde el servidor (htdocs)

* Comenzar su ejecución abriendolo en el navegador.

# Instrucciones de uso
## Listado de tareas
* Las tareas se muestran de inmediato en cuanto inicia el programa, si es que existen y sino el programa te notifica también.

## Agregar

* Al iniciar el proyecto se vizualizará un botón "Nueva Tarea" para agregar una nueva tarea y en listado de tareas en caso de que existan
* Al dar click al boton "Nueva tarea" podremos agregar la información de la misma a través de una ventana modal.
* Al llenar los datos completos, veremos en la lista como se ha agregado.

## Editar
* Para editar, se debe dar doble click sobre el registro de la tabla que se desea editar y se podrá visualizar el resumen junto con el boton "Editar" para habilitar los campos de edición.
* Realizar las edicines correspondientes de informar y guardar los cambios

## Eliminar
* Para eliminar un registro, dar doble click sobre el registro que se desea eliminar, se mostrara la vista de resumen y el botón de eliminar, dar click, confirmar la eliminación y listo.













