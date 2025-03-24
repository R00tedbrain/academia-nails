# Guía de Estilo - Academia Nails

## Paleta de Colores

### Colores Principales

| Color | Hex | RGB | Uso |
|-------|-----|-----|-----|
| Rosa Principal | #e5a7b7 | rgb(229, 167, 183) | Color principal de la marca, botones, acentos, enlaces |
| Gris Oscuro | #5a5a5a | rgb(90, 90, 90) | Textos principales, footers, barras de navegación |
| Rosa Claro | #f7cfd6 | rgb(247, 207, 214) | Fondos suaves, hover de botones, elementos secundarios |
| Blanco | #ffffff | rgb(255, 255, 255) | Fondos principales, textos sobre fondos oscuros |

### Colores Secundarios

| Color | Hex | RGB | Uso |
|-------|-----|-----|-----|
| Gris Claro | #f9f9f9 | rgb(249, 249, 249) | Fondos alternativos, separadores, bloques de contenido |
| Gris Medio | #e0e0e0 | rgb(224, 224, 224) | Bordes, separadores, líneas |
| Verde | #6bbf59 | rgb(107, 191, 89) | Mensajes de éxito, confirmaciones, elementos completados |
| Rojo | #e94b35 | rgb(233, 75, 53) | Mensajes de error, alertas, notificaciones importantes |

## Tipografía

### Fuentes Principales

1. **Títulos y Encabezados**: Playfair Display
   - Familia: Serif
   - Pesos utilizados: 700 (Bold)
   - Usos: Títulos de sección, encabezados, nombres de cursos

2. **Cuerpo de Texto**: Poppins
   - Familia: Sans-serif
   - Pesos utilizados: 300 (Light), 400 (Regular), 500 (Medium), 600 (Semi-bold)
   - Usos: Contenido general, descripciones, menús, botones

### Tamaños de Fuente

| Elemento | Tamaño | Peso | Uso |
|----------|--------|------|-----|
| H1 | 36px / 2.25rem | 700 | Títulos principales de página |
| H2 | 30px / 1.875rem | 700 | Títulos de sección |
| H3 | 24px / 1.5rem | 700 | Subtítulos, títulos de cursos |
| H4 | 20px / 1.25rem | 700 | Encabezados menores, nombres de instructores |
| H5 | 18px / 1.125rem | 700 | Títulos de widgets, categorías |
| H6 | 16px / 1rem | 700 | Subtítulos pequeños |
| Texto cuerpo | 16px / 1rem | 400 | Texto general |
| Texto pequeño | 14px / 0.875rem | 400 | Metadatos, etiquetas, pies de foto |
| Botones | 14px / 0.875rem | 600 | Texto en botones (en mayúsculas) |

### Implementación

```css
/* Importar fuentes desde Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap');

/* Definición de variables de tipografía */
:root {
  --font-primary: 'Poppins', sans-serif;
  --font-secondary: 'Playfair Display', serif;
  
  --font-size-xs: 12px;
  --font-size-sm: 14px;
  --font-size-base: 16px;
  --font-size-lg: 18px;
  --font-size-xl: 20px;
  --font-size-2xl: 24px;
  --font-size-3xl: 30px;
  --font-size-4xl: 36px;
  
  --font-weight-light: 300;
  --font-weight-regular: 400;
  --font-weight-medium: 500;
  --font-weight-semibold: 600;
  --font-weight-bold: 700;
}
```

## Iconografía

### Sistema de Iconos

Se utilizará FontAwesome 5 como biblioteca principal de iconos.

### Iconos Comunes

| Contexto | Icono | Clase FontAwesome | Uso |
|----------|-------|-------------------|-----|
| Cursos | Libro | `fas fa-book` | Representar cursos, materiales educativos |
| Duración | Reloj | `far fa-clock` | Indicar duración de cursos o lecciones |
| Lecciones | Lista | `fas fa-list` | Mostrar número de lecciones |
| Instructor | Usuario | `fas fa-user` | Representar instructores o perfiles |
| Nivel | Medidor | `fas fa-signal` | Indicar nivel de dificultad |
| Carrito | Carrito | `fas fa-shopping-cart` | Botón de añadir al carrito o ver carrito |
| Certificado | Medalla | `fas fa-medal` | Representar certificaciones o logros |
| Categoría | Carpeta | `fas fa-folder` | Indicar categorías de cursos |
| Email | Sobre | `fas fa-envelope` | Contacto por correo electrónico |
| Teléfono | Teléfono | `fas fa-phone` | Contacto telefónico |
| Ubicación | Marcador | `fas fa-map-marker-alt` | Indicar ubicación física |
| Búsqueda | Lupa | `fas fa-search` | Botón o campo de búsqueda |
| Comentarios | Bocadillo | `fas fa-comment` | Sección de comentarios o reseñas |
| Éxito | Verificado | `fas fa-check-circle` | Indicar completado o confirmación |
| Error | Alerta | `fas fa-exclamation-triangle` | Mostrar errores o advertencias |

## Elementos UI

### Botones

| Tipo | Clase | Uso |
|------|-------|-----|
| Primario | `.btn-primary` | Acciones principales (Comprar, Inscribirse) |
| Secundario | `.btn-secondary` | Acciones secundarias (Ver más, Detalles) |
| Éxito | `.btn-success` | Confirmaciones, acciones positivas |
| Peligro | `.btn-danger` | Eliminaciones, cancelaciones |
| Enlace | `.btn-link` | Navegación sutil, sin énfasis visual |

### Espaciado y Bordes

- **Radios de borde**: 4px para elementos pequeños, 8px para tarjetas y contenedores
- **Espaciado interno (padding)**: Múltiplos de 5px (5px, 10px, 15px, 20px, etc.)
- **Espaciado externo (margin)**: Múltiplos de 8px (8px, 16px, 24px, 32px, etc.)
- **Sombras**: 
  - Leve: `box-shadow: 0 2px 5px rgba(0,0,0,0.05);`
  - Media: `box-shadow: 0 5px 15px rgba(0,0,0,0.08);`
  - Fuerte: `box-shadow: 0 10px 25px rgba(0,0,0,0.1);` 