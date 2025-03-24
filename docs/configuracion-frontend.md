# Configuración del Frontend con Elementor

## Instalación y Configuración

### Plugins Necesarios

1. Instalar y activar los siguientes plugins:
   - Elementor
   - Elementor Pro
   - Slider Revolution
   - Essential Addons for Elementor (opcional)
   - Contact Form 7
   - WPML (para multilingüe)

### Configuración de Elementor

1. Acceder a **Elementor > Ajustes**
2. En **Ajustes generales**:
   - Activar todos los widgets necesarios
   - Activar efectos de animación
   - Configurar responsividad

3. En **Avanzado**:
   - Activar CSS generado en línea para mejor rendimiento
   - Activar aceleración de Google Fonts

## Creación de la Página de Inicio

### Cabecera con Slider Revolution

1. Crear un nuevo slider en **Slider Revolution**:
   - Dimensiones: Pantalla completa
   - Tiempo de duración: 8-10 segundos por slide
   - Efectos de transición: Fade o Slide

2. Crear dos slides principales:
   - **Slide 1: Formación Online**
     - Imagen de fondo profesional relacionada con manicura
     - Título animado: "Formación online de manicura y pedicura"
     - Subtítulo: "Métodos de autor de [Nombre del Instructor]"
     - Botón CTA: "Ver cursos"
   
   - **Slide 2: Formación Presencial**
     - Imagen de fondo de las instalaciones o sesión presencial
     - Título animado: "Formación presencial"
     - Subtítulo: "Aprende directamente de los mejores profesionales"
     - Botón CTA: "Más información"

3. Configurar animaciones para cada elemento:
   - Títulos: Entrada con fade-in desde abajo
   - Subtítulos: Entrada con delay de 0.5s
   - Botones: Entrada con delay de 1s con efecto de zoom

### Sección de Ventajas (3 columnas)

Crear una sección con Elementor:

1. Estructura: 3 columnas iguales
2. Para cada columna:
   - Icono representativo (usando iconos FontAwesome)
   - Título breve (ej. "Mejora tus habilidades", "Profesor experimentado", "Certificación")
   - Texto descriptivo breve (2-3 líneas)
   - Añadir animación de entrada al hacer scroll

### Sección de Cursos Destacados

1. Usar el widget de Tutor LMS para Elementor o crear un grid personalizado:
   - Mostrar 6-8 cursos más populares
   - Visualización en grid con 3 columnas en escritorio, 2 en tablet, 1 en móvil
   - Mostrar para cada curso:
     - Imagen destacada
     - Título
     - Instructor
     - Precio
     - Nivel de dificultad
     - Número de lecciones
     - Botón "Añadir al carrito"

2. Añadir filtros rápidos por categoría y nivel encima del grid

### Sección de Llamado a la Acción

1. Crear una sección con fondo de color o imagen:
   - Título grande: "¡Pregunta sin dudarlo!"
   - Texto explicativo sobre cómo pueden resolver dudas
   - Botón CTA: "Contactar ahora"
   - Añadir efecto parallax al fondo

### Sección "Hechos sobre nosotros"

1. Crear una sección con 4 columnas:
   - Cada columna contendrá:
     - Un contador numérico con animación (ej. "2000+" lecciones, "6500+" trabajos únicos)
     - Título descriptivo debajo del número
   - Configurar la animación para que los contadores se activen al hacer scroll

### Sección de Testimonios

1. Crear un carrusel de testimonios:
   - Usar el widget Testimonial Carousel de Elementor Pro
   - Para cada testimonio incluir:
     - Foto del alumno (si está disponible)
     - Nombre del alumno
     - Curso realizado (opcional)
     - Texto del testimonio (2-4 líneas)
   - Configurar autoplay con transición suave
   - Añadir controles de navegación (flechas y/o dots)

### Sección de Contacto Rápido

1. Insertar formulario de Contact Form 7:
   - Crear un formulario sencillo con campos para:
     - Nombre
     - Correo electrónico
     - Teléfono (opcional)
     - Mensaje
     - Botón "Enviar"
   - Estilizar el formulario con los colores corporativos

### Pie de Página

1. Crear una estructura de 4 columnas:
   - Columna 1: Logo e información de contacto
   - Columna 2: Enlaces rápidos a páginas importantes
   - Columna 3: Últimos cursos o blog posts
   - Columna 4: Formulario de suscripción a newsletter (opcional)

2. Añadir sección final con:
   - Copyright
   - Enlaces a términos y privacidad
   - Iconos de redes sociales

## Página de Listado de Cursos

### Configuración principal

1. Crear una nueva página para el archivo de cursos
2. Añadir cabecera con:
   - Título "Nuestros Cursos"
   - Breadcrumbs (migas de pan)
   - Breve descripción

3. Configurar filtros laterales:
   - Categorías de cursos
   - Niveles de dificultad
   - Rango de precios
   - Duración

4. Configurar visualización de cursos:
   - Opciones de ordenamiento (popular, reciente, precio)
   - Selector de vista (grid/lista)
   - Paginación

## Página Individual de Curso

### Elementos a incluir

1. Cabecera con:
   - Imagen destacada del curso
   - Título del curso
   - Valoración (estrellas)
   - Información del instructor

2. Barra lateral con:
   - Precio
   - Botón "Añadir al carrito"
   - Datos clave (duración, lecciones, nivel)
   - Progreso del curso (para estudiantes inscritos)

3. Contenido principal:
   - Pestañas para:
     - Descripción
     - Curriculum (lecciones)
     - Instructor
     - Reseñas

## Optimización de Animaciones y Efectos

### Mejores Prácticas

1. Utilizar animaciones sutiles:
   - Fade-in para textos e imágenes
   - Ligeros movimientos en Y (vertical) para entradas
   - Efectos de hover para botones e imágenes

2. Optimizar rendimiento:
   - Limitar el número de animaciones por página
   - Evitar animaciones complejas en dispositivos móviles
   - Utilizar `will-change` para elementos animados

3. Configuración de Slider Revolution:
   - Precargar imágenes para evitar saltos
   - Optimizar imágenes antes de subirlas
   - Utilizar transiciones simples para dispositivos móviles

4. Efectos de parallax:
   - Aplicar sólo a secciones clave
   - Reducir la intensidad en dispositivos móviles

## Adaptación Responsive

### Configuración por Dispositivos

1. Para escritorio (>1024px):
   - 3-4 columnas para cursos
   - Todos los efectos y animaciones activos

2. Para tablet (768px-1024px):
   - 2 columnas para cursos
   - Reducir tamaños de fuente grandes
   - Simplificar menús

3. Para móvil (<768px):
   - 1 columna para todos los listados
   - Menú hamburguesa
   - Ocultar elementos no esenciales
   - Simplificar animaciones

4. Probar y ajustar:
   - Verificar que todos los botones son accesibles
   - Asegurar que los formularios funcionan correctamente
   - Comprobar velocidad de carga en dispositivos reales 