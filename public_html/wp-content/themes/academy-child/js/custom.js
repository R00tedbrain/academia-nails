/**
 * Academia Nails - Custom JavaScript
 * 
 * Este archivo contiene scripts personalizados para mejorar la experiencia 
 * de usuario en el sitio web de Academia Nails.
 */

jQuery(document).ready(function($) {
    'use strict';
    
    // Variables globales
    var $window = $(window),
        $body = $('body');
    
    /**
     * Animación de contadores numéricos
     */
    function initCounters() {
        $('.counter-number').each(function() {
            var $this = $(this);
            
            // Solo iniciar si no ha sido animado antes
            if (!$this.hasClass('counted')) {
                $this.addClass('counted');
                
                var countTo = $this.attr('data-count');
                
                $({ countNum: 0 }).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                        
                        // Añadir + si el atributo está presente
                        if ($this.attr('data-suffix') === '+') {
                            $this.text($this.text() + '+');
                        }
                    }
                });
            }
        });
    }
    
    /**
     * Iniciar animaciones al hacer scroll
     */
    function initScrollAnimations() {
        // Elementos a animar con clase .animate-on-scroll
        $('.animate-on-scroll').each(function() {
            var $element = $(this);
            
            // Verificar si el elemento está en el viewport
            if (isElementInViewport($element) && !$element.hasClass('animated')) {
                var delay = $element.attr('data-delay') || 0;
                
                // Añadir clase animated después del delay
                setTimeout(function() {
                    $element.addClass('animated');
                    
                    // Iniciar contadores si existe dentro del elemento
                    if ($element.find('.counter-number').length) {
                        initCounters();
                    }
                }, delay);
            }
        });
    }
    
    /**
     * Verificar si un elemento está en el viewport
     */
    function isElementInViewport($element) {
        var elementTop = $element.offset().top,
            elementBottom = elementTop + $element.outerHeight(),
            viewportTop = $window.scrollTop(),
            viewportBottom = viewportTop + $window.height();
            
        // Ajustar el punto de activación (80% del elemento visible)
        var triggerPoint = (elementBottom - elementTop) * 0.2;
        
        return (elementBottom > viewportTop + triggerPoint && 
                elementTop < viewportBottom - triggerPoint);
    }
    
    /**
     * Mejorar comportamiento de filtros de cursos
     */
    function enhanceCourseFilters() {
        // Filtros laterales animados
        $('.course-filter-toggle').on('click', function(e) {
            e.preventDefault();
            
            var $sidebar = $('.tutor-course-filter-wrap');
            if ($sidebar.hasClass('open')) {
                $sidebar.removeClass('open');
                $body.removeClass('filter-is-open');
            } else {
                $sidebar.addClass('open');
                $body.addClass('filter-is-open');
            }
        });
        
        // Efecto de hover mejorado en tarjetas de cursos
        $('.tutor-course-card').hover(
            function() {
                $(this).addClass('hover');
            }, 
            function() {
                $(this).removeClass('hover');
            }
        );
    }
    
    /**
     * Mejorar usabilidad móvil
     */
    function mobileEnhancements() {
        // Ajustar menú móvil
        $('.mobile-menu-toggle').on('click', function(e) {
            e.preventDefault();
            $body.toggleClass('mobile-menu-open');
        });
        
        // Cerrar menú al hacer clic en un enlace
        $('.mobile-menu a').on('click', function() {
            $body.removeClass('mobile-menu-open');
        });
    }
    
    /**
     * Mejorar formularios
     */
    function enhanceForms() {
        // Añadir clase active a campos con valor
        $('input, textarea').each(function() {
            if ($(this).val().length > 0) {
                $(this).addClass('has-value');
            }
        });
        
        // Actualizar clase al cambiar valor
        $('input, textarea').on('blur', function() {
            if ($(this).val().length > 0) {
                $(this).addClass('has-value');
            } else {
                $(this).removeClass('has-value');
            }
        });
        
        // Mejorar selectors
        if ($.fn.select2) {
            $('.tutor-form-select, .woocommerce-ordering select').select2({
                minimumResultsForSearch: 10
            });
        }
    }
    
    /**
     * Inicializar todas las funciones
     */
    function init() {
        // Ejecutar inicialmente
        initScrollAnimations();
        enhanceCourseFilters();
        mobileEnhancements();
        enhanceForms();
        
        // Ejecutar al hacer scroll
        $window.on('scroll', function() {
            initScrollAnimations();
        });
        
        // Ejecutar al cambiar tamaño de ventana
        $window.on('resize', function() {
            // Funciones sensibles al tamaño si son necesarias
        });
    }
    
    // Iniciar todo
    init();
}); 