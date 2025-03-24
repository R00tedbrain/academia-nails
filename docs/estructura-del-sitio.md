# Estructura del Sitio Academia Nails

## Páginas Principales

1. **Inicio (Home)**
   - Slider principal con llamadas a la acción
   - Bloques de ventajas (3 columnas)
   - Sección de cursos destacados
   - Sección "Hechos sobre nosotros" con cifras
   - Testimonios de estudiantes
   - Formulario de contacto/consulta

2. **Sobre Nosotros**
   - Historia y misión de la academia
   - Perfil del instructor principal
   - Certificaciones y reconocimientos

3. **Cursos**
   - Listado de cursos con filtros (categoría, nivel, precio)
   - Sistema de búsqueda
   - Visualización en grid/lista

4. **Página Individual de Curso**
   - Imagen destacada del curso
   - Descripción y objetivos
   - Contenido/curriculum
   - Instructor
   - Precio y botón de compra
   - Testimonios específicos del curso

5. **Blog**
   - Artículos relacionados con manicura y pedicura
   - Categorías y etiquetas
   - Búsqueda de contenido

6. **Contacto**
   - Formulario de contacto
   - Información de dirección y teléfono
   - Mapa de ubicación
   - Enlaces a redes sociales

7. **Área de Miembro**
   - Dashboard del estudiante
   - Cursos en progreso
   - Cursos completados
   - Certificados obtenidos
   - Ajustes de perfil

8. **Carrito/Checkout**
   - Resumen de cursos seleccionados
   - Opciones de pago
   - Formulario de facturación

## Plugins Necesarios

### Esenciales
- **WordPress** (última versión)
- **Tutor LMS Pro** - Sistema de gestión de aprendizaje
- **WooCommerce** - Plataforma de e-commerce
- **Elementor Pro** - Constructor de páginas
- **Tema Zilom** (o equivalente compatible con Tutor LMS)

### Complementarios
- **WPML** - Multilingüe (Español/Ruso)
- **Slider Revolution** - Para slider animado en homepage
- **Yoast SEO** - Optimización para motores de búsqueda
- **UpdraftPlus** - Copias de seguridad
- **WP Super Cache** - Sistema de caché
- **Smush Pro** - Optimización de imágenes
- **Contact Form 7** - Formularios de contacto
- **MailChimp para WP** - Integración con newsletter

## Estructura de Roles

1. **Administrador** - Acceso completo
2. **Instructor** - Puede crear y gestionar cursos
3. **Estudiante** - Puede comprar e inscribirse en cursos
4. **Suscriptor** - Acceso básico a contenido público

## Esquema de Base de Datos

Además de las tablas estándar de WordPress, se utilizarán:

- Tablas de WooCommerce para pedidos y productos
- Tablas de Tutor LMS para cursos, lecciones y progreso
- Tablas WPML para traducciones

## Requisitos Técnicos

- PHP 8.0+
- MySQL 8.0+
- Servidor con mínimo 2GB RAM
- Certificado SSL
- Caché habilitada
- GZIP activado 