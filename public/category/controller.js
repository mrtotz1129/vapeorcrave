'use strict;'

angular.module('app')
    .controller('ctrl.category', function($scope, $filter, $resource, appSettings){

        var vm              =   $scope;

        var Categories      =   $resource(appSettings.baseUrl+'v1/categories', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            },
            save        :   {
                method  :   'POST',
                isArray :   false
            }
        });

        var CategoriesId    =   $resource(appSettings.baseUrl+'v1/categories/:id', {}, {
            show        :   {
                method  :   'GET',
                isArray :   false
            },
            update      :   {
                method  :   'PUT',
                isArray :   false
            },
            destroy     :   {
                method  :   'DELETE',
                isArray :   false
            }
        });

    });