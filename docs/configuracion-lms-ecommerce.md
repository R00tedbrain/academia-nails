# Configuración de Tutor LMS y WooCommerce

## Instalación de Plugins

1. Instalar y activar los siguientes plugins desde el panel de WordPress:
   - WooCommerce
   - Tutor LMS
   - Tutor LMS Pro (si se ha adquirido la licencia)
   - WooCommerce Stripe Gateway (para pagos con tarjeta)
   - WooCommerce PayPal Payments

## Configuración de WooCommerce

### Configuración Básica

1. Acceder a **WooCommerce > Ajustes**
2. En la pestaña **General**:
   - Configurar la ubicación de la tienda (España)
   - Establecer las monedas (Euro - €)
   - Configurar los países de venta permitidos

3. En la pestaña **Productos**:
   - Configurar las páginas de "Mi Cuenta", "Carrito" y "Finalizar Compra"
   - Activar productos virtuales y descargables (necesarios para cursos)

4. En la pestaña **Impuestos**:
   - Configurar los impuestos según normativa española (IVA 21% por defecto)
   - Crear clases de impuestos si es necesario (por ejemplo, para productos educativos)

### Configuración de Pagos

1. En la pestaña **Pagos**:
   - Activar Stripe:
     - Introducir claves API (pública y privada)
     - Configurar los métodos de pago aceptados (tarjetas, Apple Pay, etc.)
   
   - Activar PayPal:
     - Conectar con la cuenta de PayPal
     - Configurar opciones de PayPal
   
   - Activar Transferencia Bancaria (opcional):
     - Introducir los datos bancarios para transferencias

2. Configurar correos electrónicos:
   - Personalizar las plantillas de emails de WooCommerce
   - Asegurarse de que los correos de pedidos y facturas estén correctamente configurados

## Configuración de Tutor LMS

### Configuración Básica

1. Acceder a **Tutor LMS > Ajustes**
2. En la pestaña **General**:
   - Configurar las páginas del panel de control del instructor y estudiante
   - Definir los roles permitidos para ser instructores
   - Configurar la página de registro/inicio de sesión

3. En la pestaña **Curso**:
   - Configurar la página de archivo de cursos
   - Establecer el número de cursos por página
   - Definir las opciones de visualización (grid/lista)
   - Configurar la visualización de información del curso (duración, nivel, etc.)

### Integración con WooCommerce

1. En la pestaña **Monetización**:
   - Seleccionar WooCommerce como plataforma de monetización
   - Activar la sincronización automática de productos
   - Configurar las opciones de carro de compras y checkout

2. Configuraciones avanzadas:
   - Definir la redirección después de la compra
   - Configurar la política de reembolso (si aplica)
   - Establecer la configuración de inscripción automática

### Configuración de Certificados

1. En la pestaña **Certificados**:
   - Habilitar certificados para estudiantes
   - Diseñar la plantilla de certificado con:
     - Logo de Academia Nails
     - Texto en español/ruso
     - Campos personalizados (nombre del estudiante, curso, fecha)
   - Configurar las reglas para obtener certificados (ej: 100% de finalización)

## Creación de Categorías y Niveles

### Categorías de Cursos

1. Acceder a **Cursos > Categorías**
2. Crear las categorías principales:
   - Manicura
   - Pedicura
   - Diseño de uñas
   - Técnicas avanzadas

### Niveles de Dificultad

1. Acceder a **Cursos > Niveles de Dificultad**
2. Crear los siguientes niveles:
   - Principiante
   - Intermedio
   - Avanzado
   - Experto

## Creación de un Curso de Ejemplo

1. Acceder a **Cursos > Añadir Nuevo**
2. Completar información básica:
   - Título: "Técnicas Básicas de Manicura"
   - Descripción completa con objetivos del curso
   - Imagen destacada profesional
   - Precio: 49.99€
   - Categoría: Manicura
   - Nivel: Principiante
   - Duración: 4 horas

3. Añadir contenido del curso:
   - Crear secciones (módulos)
   - Añadir lecciones con contenido multimedia
   - Crear cuestionarios de evaluación
   - Configurar requisitos para completar el curso

4. Publicar el curso y verificar su visualización en la tienda

## Configuración Multilingüe con WPML

1. Instalar y activar WPML
2. Configurar los idiomas (Español como predeterminado, Ruso como secundario)
3. Traducir todas las cadenas de texto de Tutor LMS y WooCommerce
4. Traducir categorías, niveles y metadatos de cursos
5. Crear versiones en ruso de cada curso

## Ajustes de Rendimiento y Optimización

1. Configurar caché para WooCommerce:
   - Excluir páginas dinámicas (carrito, checkout, mi cuenta)
   - Establecer tiempo de expiración de caché

2. Optimizar bases de datos:
   - Programar limpieza regular de tablas de transients
   - Optimizar tablas de WooCommerce periódicamente

3. Ajustes para Tutor LMS:
   - Configurar carga diferida de videos
   - Optimizar el registro de progreso del estudiante 