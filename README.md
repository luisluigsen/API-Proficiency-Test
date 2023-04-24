# Proyecto Symfony: Módulos independientes de Customer y User

Este proyecto es una aplicación Symfony basada en la arquitectura hexagonal de 3 capas ('Adapter', 'Application', y 'Domain') y una arquitectura monolítica separada en dos módulos totalmente independientes para las entidades Customer y User. Los módulos cuentan con endpoints securizados y autenticación basada en roles para garantizar la seguridad y privacidad de los datos.

## Arquitectura

- Arquitectura hexagonal de 3 capas:
  - Adapter: Capa de adaptadores e interfaces con sistemas externos
  - Application: Capa de lógica de aplicación y casos de uso
  - Domain: Capa de dominio y reglas de negocio
- Arquitectura monolítica separada en dos módulos independientes: Customer y User

## Funcionalidades

- Creación de las entidades Customer y User separada en dos módulos totalmente independientes
- Endpoints para el módulo de Customer:
  - `POST /api/customers/`: Crear un nuevo customer
  - `DELETE /api/customers/{id}`: Eliminar un customer existente
  - `GET /api/customers/{id}`: Obtener información de un customer
  - `PATCH /api/customers/{id}`: Actualizar información de un customer
- Creación de tres cliente 'customer' con todos los permisos para trabajar con la base de datos

- Endpoints para el módulo de User:
  - `POST /user/api/create`: Crear un nuevo usuario
  - `PATCH /user/api/{id}`: Actualizar información de un usuario
  - `GET /user/api/{id}`: Obtener información de un usuario
  - `DELETE /user/api/{id}`: Eliminar un usuario existente
  - `POST /user/api/search`: Realizar búsquedas avanzadas de usuarios
- Generación de datos de prueba mediante DataFixtures