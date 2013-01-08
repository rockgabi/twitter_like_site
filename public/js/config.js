require.config({
    baseUrl     : 'js', // Url base de los scripts (Carpeta)
    deps        : ['/js/main.js'],  // Dependencia a cargar antes de este archivo

    paths       : {
        jquery      : '/js/vendor/jquery-1.8.2.min',
        backbone    : '/js/vendor/backbone-0.9.2',
        modernizr   : '/js/vendor/modernizr-2.6.2.min',
        underscore  : '/js/vendor/underscore-1.4.3',
        tpl         : '/js/utils'
    },

    shim        : {
        backbone    : {
            deps    : ['underscore', 'jquery'],
            exports : 'Backbone'
        }
    }
});
