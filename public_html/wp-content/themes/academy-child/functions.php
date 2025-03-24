<?php
/**
 * Academia Nails - Tema Hijo
 * Funciones y definiciones
 */

// Verificar extensiones PHP críticas
function academia_nails_check_php_extensions() {
    $required_extensions = array(
        'mysqli',
        'pdo_mysql',
        'xml',
        'curl',
        'gd',
        'mbstring',
        'zip',
        'intl',
        'opcache'
    );
    
    $missing_extensions = array();
    
    foreach ($required_extensions as $ext) {
        if (!extension_loaded($ext)) {
            $missing_extensions[] = $ext;
        }
    }
    
    if (!empty($missing_extensions)) {
        add_action('admin_notices', function() use ($missing_extensions) {
            echo '<div class="error"><p>';
            echo '<strong>Academia Nails:</strong> ';
            echo __('Faltan las siguientes extensiones PHP requeridas para el funcionamiento óptimo del tema:', 'academia-nails-child') . ' ';
            echo implode(', ', $missing_extensions);
            echo '</p></div>';
        });
    }
}
add_action('admin_init', 'academia_nails_check_php_extensions');

// Cargar estilos del tema padre y del tema hijo
function academia_nails_child_enqueue_styles() {
    // Obtener versión del tema padre
    $parent_style = 'zilom-style';
    $theme = wp_get_theme();
    $version = $theme->parent() ? $theme->parent()->get('Version') : $theme->get('Version');
    
    // Registrar y encolar estilos del tema padre
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css', array(), $version);
    
    // Registrar y encolar estilos del tema hijo
    wp_enqueue_style('academia-nails-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
    
    // Cargar tipografías de Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap', array(), null);
    
    // Cargar Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4');
    
    // Cargar scripts personalizados
    wp_enqueue_script('academia-nails-custom-js', 
        get_stylesheet_directory_uri() . '/js/custom.js', 
        array('jquery'), 
        wp_get_theme()->get('Version'), 
        true
    );
}
add_action('wp_enqueue_scripts', 'academia_nails_child_enqueue_styles');

/**
 * Personalizar opciones de Tutor LMS para el tema
 */
function academia_nails_customize_tutor_options() {
    // Funciones para personalizar Tutor LMS si es necesario
}
add_action('init', 'academia_nails_customize_tutor_options');

/**
 * Traducciones personalizadas para el tema
 */
function academia_nails_load_theme_textdomain() {
    load_child_theme_textdomain('academia-nails-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'academia_nails_load_theme_textdomain');

/**
 * Registrar widgets personalizados
 */
function academia_nails_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Barra Lateral de Cursos', 'academia-nails-child'),
        'id'            => 'sidebar-courses',
        'description'   => esc_html__('Añade widgets a la barra lateral de cursos.', 'academia-nails-child'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Columna 1', 'academia-nails-child'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Añade widgets a la primera columna del pie de página.', 'academia-nails-child'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Columna 2', 'academia-nails-child'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Añade widgets a la segunda columna del pie de página.', 'academia-nails-child'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Columna 3', 'academia-nails-child'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Añade widgets a la tercera columna del pie de página.', 'academia-nails-child'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Columna 4', 'academia-nails-child'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Añade widgets a la cuarta columna del pie de página.', 'academia-nails-child'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'academia_nails_widgets_init');

/**
 * Funciones complementarias para WooCommerce
 */
function academia_nails_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'academia_nails_woocommerce_support');

/**
 * Añadir soporte personalizado para Elementor
 */
function academia_nails_elementor_support() {
    // Registrar ubicaciones para templates elementor si es necesario
}
add_action('elementor/init', 'academia_nails_elementor_support');

/**
 * Funcionalidades personalizadas para multilingüe (WPML)
 */
function academia_nails_wpml_support() {
    // Funciones adicionales para soporte WPML si es necesario
}
add_action('plugins_loaded', 'academia_nails_wpml_support');

/**
 * Añadir ajustes adicionales a la personalización del tema
 */
function academia_nails_customize_register($wp_customize) {
    // Sección para logo y branding
    $wp_customize->add_section('academia_nails_branding', array(
        'title'    => __('Branding Academia Nails', 'academia-nails-child'),
        'priority' => 30,
    ));
    
    // Logo para certificados
    $wp_customize->add_setting('academia_nails_certificate_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'academia_nails_certificate_logo', array(
        'label'    => __('Logo para Certificados', 'academia-nails-child'),
        'section'  => 'academia_nails_branding',
        'settings' => 'academia_nails_certificate_logo',
    )));
    
    // Color del tema principal
    $wp_customize->add_setting('academia_nails_primary_color', array(
        'default'           => '#e5a7b7',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'academia_nails_primary_color', array(
        'label'    => __('Color Principal', 'academia-nails-child'),
        'section'  => 'academia_nails_branding',
        'settings' => 'academia_nails_primary_color',
    )));
}
add_action('customize_register', 'academia_nails_customize_register');

/**
 * Crear carpetas necesarias para JavaScript
 */
if (!file_exists(get_stylesheet_directory() . '/js')) {
    mkdir(get_stylesheet_directory() . '/js', 0755);
}

/**
 * Crear archivo JS básico si no existe
 */
if (!file_exists(get_stylesheet_directory() . '/js/custom.js')) {
    $basic_js = "jQuery(document).ready(function($) {\n    // Código JavaScript personalizado\n});";
    file_put_contents(get_stylesheet_directory() . '/js/custom.js', $basic_js);
} 