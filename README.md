# PruebaStarWars

Este proyecto es una aplicación que se centra en la parte de las bases de datos y la conexión a la API de Star Wars. A continuación, encontrarás las instrucciones para ejecutar el proyecto y obtener información de Star Wars en un entorno Linux.

## Contenedor Docker

Se ha creado un contenedor de Docker para facilitar la ejecución del proyecto. Este contenedor creará una instancia de PHP y PostgreSQL.

### Construir el contenedor Docker

```
make build
```

iniciar los contenedores Docker:
```
make start
```

Iniciar los servicios del contenedor en un servidor de symfony:
```
make run
```

Actualizar el esquema de la base de datos:
```
sf doctrine:schema:update --force
```

Ejecutar el comando creado en la prueba puede utilizar el atajo de teclado
```
sf GetStarWarsInfCommand 
```
