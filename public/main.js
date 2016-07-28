'use strict;'

var baseUrl     =   'http://localhost:8000/vapeorcrave/api/v1';

angular.module('app', [
    'ngResource'
])
    .constant('appSettings', {
        baseUrl     :   baseUrl
    })
    .run(function($rootScope){



    });