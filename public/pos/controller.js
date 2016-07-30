'use strict;'

angular.module('app')
    .controller('ctrl.pos', function($scope, $resource, $filter, appSettings){

        var vm              =   $scope;

        var Products        =   $resource(appSettings.baseUrl+'v1/products', {}, {
            query       :   {
                method  :   'GET',
                isArray :   false
            }
        });

        Products.query().$promise.then(function(data){

            vm.products             =   $filter('orderBy')(data.active_products, 'str_product_name', false);

        });

        vm.addToCart                =   function(product, $index){



        }

    });