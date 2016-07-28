'use strict;'

var baseUrl     =   'http://localhost:8000/vape/api/';

angular.module('app', [
    'ngResource'
])
    .constant('appSettings', {
        baseUrl     :   baseUrl
    })
    .run(function($rootScope){



    });