# Academia Nails - Plataforma de Cursos Online

Réplica de la estructura y funcionalidad de nails-barcelona.com, una plataforma educativa para cursos de manicura y pedicura.

## Tecnologías Utilizadas

- **CMS**: WordPress
- **LMS**: Tutor LMS
- **E-commerce**: WooCommerce
- **Page Builder**: Elementor
- **Tema**: Zilom o equivalente
- **Extras**: Slider Revolution, Contact Form 7

## Estructura del Proyecto

- **public_html/**: Archivos principales de WordPress
- **docs/**: Documentación del proyecto

## Requisitos del Sistema

- PHP 8.0+ con las siguientes extensiones:
  - mysqli
  - pdo_mysql
  - xml
  - curl
  - gd
  - mbstring
  - zip
  - intl
  - opcache
  - xmlrpc
  - json
  - fileinfo
  - exif
- MySQL 8.0+
- Servidor web Apache/Nginx
- Soporte SSL

## Instalación

1. Clonar este repositorio
2. Ejecutar `./setup.sh` para iniciar el entorno Docker
   - El script verificará automáticamente las extensiones PHP requeridas
   - Configurará el entorno de desarrollo completo
3. Importar la base de datos si es necesario
4. Configurar wp-config.php
5. Activar los plugins necesarios
6. Configurar el tema y ajustes

## Funcionalidades Principales

- Registro y gestión de usuarios
- Catálogo de cursos con filtros por categoría, nivel y precio
- Sistema de pagos integrado
- Contenido multilingüe (Español/Ruso)
- Panel de administración para gestionar cursos y estudiantes
- Certificados para estudiantes al completar cursos 